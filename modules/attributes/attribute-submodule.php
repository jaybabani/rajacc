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
    "id_prefix" => "ATR-",
  ],
  "product_category" => [
    "page_title" => "Product Category",
    "column_title" => "Product Category",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
    "id_prefix" => "PC-",
  ],
  "product_quality" => [
    "page_title" => "Product Quality",
    "column_title" => "Product Quality",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
    "id_prefix" => "PQ-",
  ],
  "raw_material_category" => [
    "page_title" => "Raw material Category",
    "column_title" => "Raw material Category",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
    "id_prefix" => "RMC-",
  ],
  "folder_category" => [
    "page_title" => "Folder Category",
    "column_title" => "Folder Category",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
    "id_prefix" => "FLDC-",
  ],
  "vendor_category" => [
    "page_title" => "Vendor Category",
    "column_title" => "Vendor Category",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
    "id_prefix" => "VC-",
  ],
  "customer_category" => [
    "page_title" => "Customer Category",
    "column_title" => "Customer Category",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
    "id_prefix" => "CC-",
  ],
  "document_type" => [
    "page_title" => "Document Type",
    "column_title" => "Document Type",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
    "id_prefix" => "DOCT-",
  ],
  "bank_account" => [
    "page_title" => "Bank account",
    "column_title" => "Bank account",
    "column_name" => "category",
    "query" => "category = '" . $parent . "' ",
    "url_param" => "module=" . $parent . "",
    "id_prefix" => "BNK-",
  ],
];

$submod = $submodule[$parent];
