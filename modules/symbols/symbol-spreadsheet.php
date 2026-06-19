<?php
if (isset($_GET['data_type']) && $_GET['data_type'] == 'symbols') {

  include ROOT_DIR . '/modules/symbols/symbol-functions.php';

  $filename = 'symbols_' . $date->format('dmYHis');
  $header_row_range = 'A' . $i . ':Q' . $i;
  $col_width = [
      'A' => 5,
      'B' => 12,
      'C' => 12,
      'D' => 12,
      'E' => 12,
      'F' => 20,
  ];
  $col_align = [
      'A' => 'center',
      'B' => 'left',
      'C' => 'left',
      'D' => 'left',
      'E' => 'center',
      'F' => 'center',
  ];
  $data = symbols_list('download');

  // echo "<pre>"; print_r($data); echo "</pre>";
  // die;

  $sheet->setCellValue('A' . $i, 'Org. ID');
  $sheet->setCellValue('B' . $i, 'Name');
  $sheet->setCellValue('C' . $i, 'Type');
  $sheet->setCellValue('D' . $i, 'Counter');
  $sheet->setCellValue('E' . $i, 'Timezone');
  $sheet->setCellValue('F' . $i, 'Detail');

  $alt = true;
  display_symbols_data($i, $data, $alt, $spreadsheet, $sheet, $report);
}


function display_symbols_data($i, $data, $alt, $spreadsheet, $sheet, $report)
{
  $count = 0;
  foreach ($data as $k => $v) {
    $i++;
    if ($v['row_id'] != '') {
      $count++;
    }
    $sheet->setCellValue('A' . $i, $v['row_id']);
    $sheet->setCellValue('B' . $i, $v['name']);
    $sheet->setCellValue('C' . $i, $v['type']);
    $sheet->setCellValue('D' . $i, $v['counter']);
    $sheet->setCellValue('E' . $i, $v['timezone']);
    $sheet->setCellValue('F' . $i, $v['detail']);

    if ($alt) {
      $spreadsheet
        ->getActiveSheet()
        ->getStyle('A' . $i . ':Q' . $i . '')
        ->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()
        ->setARGB('FFEEEEEE');
    }

    $alt = !$alt;
  }
  return $i;
}
?>