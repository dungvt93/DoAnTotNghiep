
<?php
/*
 * ExportCatalogue
 * Copyright(c) 2015 IDS Co., Ltd. All Rights Reserved.
 * http://www.ids.co.jp
 */
require_once '../require.php';
require_once PLUGIN_UPLOAD_REALDIR . 'plg_ExportCatalogue/class/page_extends/plg_ExportCatalogue_LC_Page_Products_PdfExport_Show_Ex.php';

$objPage = new plg_ExportCatalogue_LC_Page_Products_PdfExport_Show_Ex();
$objPage->init();
$objPage->process();