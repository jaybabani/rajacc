<?php

$parent = $_GET["module"] ?? "default";
// "category = '".$_GET["category"]."' "

$submodule = [
  "default" => [
    "page_title" => "Attribute",
    "column_title" => "Attribute",
    "column_name" => "",
    "query" => "",
    "url_param" => "",
  ],
  "product_category" => [
    "page_title" => "Product Category",
    "column_title" => "Product Category",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
  ],
  "product_quality" => [
    "page_title" => "Product Quality",
    "column_title" => "Product Quality",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
  ],
  "raw_material_category" => [
    "page_title" => "Raw material Category",
    "column_title" => "Raw material Category",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
  ],
  "vendor_category" => [
    "page_title" => "Vendor Category",
    "column_title" => "Vendor Category",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
  ],
  "customer_category" => [
    "page_title" => "Customer Category",
    "column_title" => "Customer Category",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
  ],
];

$submod = $submodule[$parent];
