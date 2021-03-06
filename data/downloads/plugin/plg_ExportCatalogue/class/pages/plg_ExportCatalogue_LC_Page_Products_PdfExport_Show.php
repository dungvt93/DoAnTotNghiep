<?php
/*
 * ExportCatalogue
 * Copyright(c) 2015 IDS Co., Ltd. All Rights Reserved.
 * http://www.ids.co.jp
 */
require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';

class plg_ExportCatalogue_LC_Page_Products_PdfExport_Show extends LC_Page_Ex
{
    public $srcIframe;

    /**
     * Page Init
     *
     * @return void
     */
    public function init()
    {
        $this->srcIframe = HTTP_URL."products/export_catalogue.php?";
        $this->skip_load_page_layout = true;
        parent::init();
    }

    /**
     * Page Process.
     *
     * @return void
     */
    public function process()
    {
        // get params on URL to add for link iframe
        if(!empty($_GET) && is_array($_GET)){
            foreach ($_GET as $k => $v) {
                $this->srcIframe .= $k."=".$v."&";
            }
        }
        $this->template = PLUGIN_UPLOAD_REALDIR . 'plg_ExportCatalogue/templates/plg_ExportCatalogue_show_export.tpl';
        $this->sendResponse();
    }

}