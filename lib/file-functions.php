<?php

function fetch_data_uploads($conn, $ids)
{
    $ret = [];
    $exp = explode(',', $ids);
    $ids_arr = array_values(array_unique(array_filter($exp)));
    $ids_str = '';
    $urls = [];
    if (sizeof($ids_arr) > 0) {
        foreach ($ids_arr as $key => $value) {
            if (!is_numeric($value)) {
                unset($ids_arr[$key]);
                $urls[] = $value;
            }
        }
        $ids_str = implode(',', $ids_arr);
    }
    //print_r($urls);
    $i = 0;

    if ($ids_str != '') {
        //echo $ids; echo "hihi";
        $arr = get_data(
            $conn,
            'uploads',
            'id IN (' . $ids_str . ')',
            'all',
            '',
            ''
        );

        foreach ($arr as $key => $value) {
            $ret[$i]['id'] = $value['id'];
            $ret[$i]['title'] = $value['title'];
            $ret[$i]['brief'] = $value['brief'];
            $ret[$i]['module'] = $value['module'];
            $ret[$i]['module_id'] = $value['module_id'];
            $ret[$i]['name'] = $value['name'];
            $ret[$i]['thumb'] = $value['thumb'];
            $ret[$i]['small'] = $value['small'];
            $ret[$i]['type'] = $value['type'];
            $ret[$i]['size'] = $value['size'];
            $i++;
        }
    }

    if (sizeof($urls) > 0) {
        foreach ($urls as $key => $value) {
            $ret[$i]['id'] = 'url-' . $i;
            $ret[$i]['name'] = $value;
            $ret[$i]['thumb'] = $value;
            $ret[$i]['small'] = $value;
            $i++;
        }
    }

    //print_arr($ret);

    return $ret;
}

function manage_upload_module(
    $conn,
    $affected_ids,
    $id,
    $attachment_ids,
    $module
) {
    // Manage module details in attachment

    $module_id = '';

    if (sizeof($affected_ids['updated']) > 0 && $id != '') {
        if ($id == $affected_ids['updated'][0][0]) {
            $module_id = $affected_ids['updated'][0][0];
        }
    } elseif (sizeof($affected_ids['inserted']) > 0 && $id == '') {
        $module_id = $affected_ids['inserted'][0];
    }
    //echo $module_id;

    // Update Module and Module Id for attachments
    $upload_ids = $attachment_ids;

    $updatedata = [];
    $updatedata[0]['module'] = $module;
    $updatedata[0]['module_id'] = $module_id;

    if (strlen($upload_ids) > 0) {
        $exp = array_values(
            array_unique(array_filter(explode(',', $upload_ids)))
        );
        if (sizeof($exp) > 0) {
            $impstr = implode(',', $exp);
            $condition = 'id IN (' . $impstr . ')';
            $affected_ids = insert_update_data(
                $conn,
                'uploads',
                $updatedata,
                '',
                $condition,
                'update'
            );
            /*if(sizeof($affected_ids["updated"]) > 0){
				$ret["success"] = true;
				$ret["msg"] = $msg;
			}*/
        }
    }
    return $module_id;
}

function get_image_info($conn, $value, $fieldid = '', $default = '')
{
    if ($fieldid != '') {
        $attachment = $value[$fieldid];
    } else {
        $attachment = $value['attachment'];
    }

    $image_id = '';
    $image = [];
    if ($default != 'empty') {
        $image = ['name' => 'images/user-bg.jpg'];
    }
    $exp = [];

    if (strlen($attachment) > 0) {
        $exp = array_values(
            array_unique(array_filter(explode(',', trim($attachment))))
        );
    }
    if (sizeof($exp) > 0) {
        // Get first image of attachment array as cover image
        $image_id = $exp[0];
    }

    if ($image_id != '') {
        $get_image = fetch_data_uploads($conn, $image_id);
        if (sizeof($get_image) > 0) {
            $image = $get_image[0];
        }
    }

    return $image;
}

function single_file_upload($conn, $POST, $FILES, $fieldid)
{
    $save_uploads = [];
    $attachments = '';
    //print_arr($FILES);

    // If any file is uploaded then run this
    if (isset($FILES[$fieldid])) {
        // print_arr($FILES);
        if (0 < $FILES[$fieldid]['error']) {
            // echo 'Error: ' . $FILES[$fieldid]['error'] . ' ';
        } else {
            //$filename = "uploads/".rand()."-".$FILES[$fieldid]['name'];
            // move_uploaded_file($FILES[$fieldid]['tmp_name'], "../../".$filename);
            $allowed_file = check_allowed_file(
                $FILES[$fieldid]['type'],
                $FILES[$fieldid]['size'],
                $FILES[$fieldid]['tmp_name']
            );
            if ($allowed_file) {
                $randno = rand() . '-';
                $filename =
                    'uploads/' . $randno . '' . $FILES[$fieldid]['name'];
                $thumbname =
                    'uploads/' . $randno . 'thumb-' . $FILES[$fieldid]['name'];
                $smallname =
                    'uploads/' . $randno . 'small-' . $FILES[$fieldid]['name'];
                $type = $FILES[$fieldid]['type'];
                $tmp_name = $FILES[$fieldid]['tmp_name'];

                $thumb = ImageResize(
                    100,
                    100,
                    '../../' . $thumbname,
                    $tmp_name,
                    $type,
                    false
                );
                if (!$thumb) {
                    $thumbname = '';
                }

                $small = ImageResize(
                    200,
                    200,
                    '../../' . $smallname,
                    $tmp_name,
                    $type,
                    true
                );
                if (!$small) {
                    $smallname = '';
                }

                move_uploaded_file($tmp_name, '../../' . $filename);

                // compress image
                compress_image('../../' . $filename);


                $save_uploads[0]['name'] = $filename;
                $save_uploads[0]['thumb'] = $thumbname;
                $save_uploads[0]['small'] = $smallname;
                $save_uploads[0]['type'] = $type;
                $save_uploads[0]['size'] = $FILES[$fieldid]['size'];
                $save_uploads[0]['auth_user'] = $_SESSION["user_id"];
            } // end file allowed
        }
        //print_arr($save_uploads);
        // Right now Files are not updated, files are inserted and their new ids are updated in the module table.

        // print_arr($save_uploads);

        $uploaded_ids = insert_update_data('uploads', $save_uploads, 'id');
        // print_arr($uploaded_ids);

        if (sizeof($uploaded_ids['inserted']) > 0) {
            $attachments = implode(',', $uploaded_ids['inserted']);
        }
        //echo $attachments;

        //$savedata[0][$fieldid] = $attachments; //$uploaded_ids;
        //echo $POST["old_attachment"];
    }
    // If not file is uploaded, then check if any old_attachement value is already present or not.
    // If old value is present, then attach it.
    elseif (isset($POST['old_' . $fieldid])) {
        $attachments = $POST['old_' . $fieldid];
    }

    return $attachments;
}

function multi_file_uploader(
    $conn,
    $FILES,
    $POST,
    $savedata,
    $module = '',
    $fieldid = '',
    $retfileinfo = ''
) {
    // Multiple Files Uploader
    //print_arr($FILES['attachment']);
    //print_r($FILES);
    //print_arr($POST);

    if ($fieldid == '') {
        $fieldid = 'attachment';
    }

    $save_uploads = [];
    $attachments = '';

    $has_files = false;
    $no_files = 0;
    $upload_method = 'multiple'; // html type multiple files uploader
    if (!isset($FILES[$fieldid]) && isset($_POST[$fieldid . '-fileIds'])) {
        echo 'Our ids:' . $_POST[$fieldid . '-fileIds'];
        $fieldid_arr = array_values(
            array_filter(explode(',', $_POST[$fieldid . '-fileIds']))
        );
        print_r($fieldid_arr);
        $has_files = true;
        $no_files = sizeof($fieldid_arr);
        $upload_method = 'individual'; // files uploaded individually
    } else {
        if (isset($FILES[$fieldid]) && !empty($FILES[$fieldid])) {
            $has_files = true;
            $no_files = count($FILES[$fieldid]['name']);
        }
    }

    //$savedata[0][$fieldid] = "";
    if ($has_files) {
        $savedata[0][$fieldid] = '';
        for ($i = 0; $i < $no_files; $i++) {
            // Individual file uploader
            if ($upload_method == 'individual') {
                $file = $FILES[$fieldid_arr[$i]];

                $i_name = $file['name'];
                $i_type = $file['type'];
                $i_size = $file['size'];
                $i_error = $file['error'];
                $i_tmp_name = $file['tmp_name'];
            } else {
                $file = $FILES[$fieldid];

                $i_name = $file['name'][$i];
                $i_type = $file['type'][$i];
                $i_size = $file['size'][$i];
                $i_error = $file['error'][$i];
                $i_tmp_name = $file['tmp_name'][$i];
            }

            if ($i_error > 0) {
                //echo "Error: " . $file["error"][$i] . "<br>";
            } else {
                $allowed_file = check_allowed_file(
                    $i_type,
                    $i_size,
                    $i_tmp_name
                );
                if ($allowed_file) {
                    $randno = rand() . '-';
                    $filename = 'uploads/' . $randno . '' . $i_name;
                    $thumbname = 'uploads/' . $randno . 'thumb-' . $i_name;
                    $smallname = 'uploads/' . $randno . 'small-' . $i_name;

                    $type = $i_type;
                    $tmp_name = $i_tmp_name;

                    // thumb does not maintain aspect ratio
                    $thumb = ImageResize(
                        100,
                        100,
                        '../../' . $thumbname,
                        $tmp_name,
                        $type,
                        false
                    );
                    if (!$thumb) {
                        $thumbname = '';
                    }

                    // small maintain aspect ratio
                    $small = ImageResize(
                        200,
                        200,
                        '../../' . $smallname,
                        $tmp_name,
                        $type,
                        true
                    );
                    if (!$small) {
                        $smallname = '';
                    }

                    move_uploaded_file($tmp_name, '../../' . $filename);

                    // compress image
                    compress_image('../../' . $filename);


                    $save_uploads[$i]['name'] = $filename;
                    $save_uploads[$i]['thumb'] = $thumbname;
                    $save_uploads[$i]['small'] = $smallname;
                    $save_uploads[$i]['type'] = $type;
                    $save_uploads[$i]['size'] = $i_size;
                    $save_uploads[$i]['auth_user'] = $POST['auth_user'];
                    if ($module != '') {
                        $save_uploads[$i]['module'] = $module;
                    }
                } // end file allowed
            }
        }
        //print_arr($save_uploads);
        $uploaded_ids = insert_update_data(
            $conn,
            'uploads',
            $save_uploads,
            'id'
        );
        //print_arr($uploaded_ids);

        // Right now Files are not updated, files are inserted and their new ids are updated in the module table.
        if (sizeof($uploaded_ids['inserted']) > 0) {
            $attachments = implode(',', $uploaded_ids['inserted']);
        }
        //echo $attachments;

        $savedata[0][$fieldid] = $attachments; //$uploaded_ids;
        //echo $POST["old_".$fieldid];

        if (isset($POST['old_' . $fieldid])) {
            $savedata[0][$fieldid] .= ',' . $POST['old_' . $fieldid];
        }
        //echo $savedata[0][$fieldid];
    } else {
        // if no attachment is changed
        if (isset($POST['old_' . $fieldid])) {
            $savedata[0][$fieldid] = $POST['old_' . $fieldid];
        }
    }

    if ($retfileinfo == 'true') {
        $savedata['save_uploads'] = $save_uploads;
    }

    return $savedata;
}

function ImageResize(
    $width,
    $height,
    $img_name,
    $tmp_name,
    $type,
    $maintain_ratio = false
) {
    /* Get original file size */
    list($w, $h) = getimagesize($tmp_name);

    // to maintain aspect ratio of image
    if ($maintain_ratio) {
        $ratio = $w / $h;
        $size = $width;

        $width = $height = min($size, max($w, $h));

        if ($ratio < 1) {
            $width = $height * $ratio;
        } else {
            $height = $width / $ratio;
        }
    }

    /* Calculate new image size */
    $ratio = max($width / $w, $height / $h);
    $h = ceil($height / $ratio);
    $x = ($w - $width / $ratio) / 2;
    $w = ceil($width / $ratio);
    /* set new file name */
    $path = $img_name;

    $width = ceil($width);
    $height = ceil($height);
    $x = ceil($x);

    /* Save image */
    if ($type == 'image/jpeg' || $type == 'image/jpg') {
        /* Get binary data from image */
        $imgString = file_get_contents($tmp_name);
        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
        imagejpeg($tmp, $path, 100);
    } elseif ($type == 'image/png') {
        $image = imagecreatefrompng($tmp_name);
        $tmp = imagecreatetruecolor($width, $height);
        imagealphablending($tmp, false);
        imagesavealpha($tmp, true);
        imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
        imagepng($tmp, $path, 0);
    } elseif ($type == 'image/gif') {
        $image = imagecreatefromgif($tmp_name);

        $tmp = imagecreatetruecolor($width, $height);
        $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
        imagefill($tmp, 0, 0, $transparent);
        imagealphablending($tmp, true);

        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $width, $height, $w, $h);
        imagegif($tmp, $path);
    } else {
        return false;
    }

    return true;
    //imagedestroy($image);
    //imagedestroy($tmp);
}

function check_allowed_file($type, $size, $tmp_name)
{
    $ret = false;
    global $ALLOW_UPLOAD_TYPE;
    //print_r($ALLOW_UPLOAD_TYPE);
    //echo mime_content_type($tmp_name); //die();
    if ($type != '') {
        $exp = explode('/', mime_content_type($tmp_name));
        if (
            in_array($exp[0] . '/*', $ALLOW_UPLOAD_TYPE) ||
            in_array($type, $ALLOW_UPLOAD_TYPE)
        ) {
            $ret = true;
            //echo "Allowed: ".$type . ' '; echo $size;
        } else {
            //echo 'not allowed';
            $ret = false;
        }
    }
    return $ret;
}




function compress_image($source_file)
{
    $info = getimagesize($source_file);

    if ($info === false) {
        return false; // Invalid image file
    }

    $path_info = pathinfo($source_file);
    $directory = $path_info['dirname'];
    $filename = $path_info['filename'];
    $extension = $path_info['extension'];

    // Rename original file
    $original_file = "" . $directory . "/" . $filename . "-original." . $extension . "";
    if (!file_exists($original_file)) {
        rename($source_file, $original_file);
    }

    switch ($info['mime']) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($original_file);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($original_file);
            break;
        case 'image/png':
            $image = imagecreatefrompng($original_file);
            break;
        default:
            return false; // Unsupported file type
    }

    /*
	if ($info['mime'] == 'image/jpeg') {
		$image = imagecreatefromjpeg($source_file);
		$destination_file = "image-" . rand() . ".jpg";
	} elseif ($info['mime'] == 'image/gif') {
		$image = imagecreatefromgif($source_file);
		$destination_file = "image-" . rand() . ".gif";
	} elseif ($info['mime'] == 'image/png') {
		$image = imagecreatefrompng($source_file);
		$destination_file = "image-" . rand() . ".png";
	}*/

    /*
        ob_start(); // Turn on output buffering
        imagejpeg($image, NULL, 75); // Output the image
        $compressed_image = ob_get_contents(); // Get the image data
        ob_end_clean(); // Turn off output buffering
        imagedestroy($image);
        return $compressed_image;
    */

    // Save the compressed image to the destination file
    imagejpeg($image, $source_file, 75);
    imagedestroy($image);
    return $source_file;
}
