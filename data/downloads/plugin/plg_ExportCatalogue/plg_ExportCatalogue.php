<?php

/*
 * ExportCatalogue
 * Copyright(c) 2015 IDS Co., Ltd. All Rights Reserved.
 * http://www.ids.co.jp
 */

class plg_ExportCatalogue extends SC_Plugin_Base
{
    /**
     * Install
     * Executed when plug-in is installed.
     * Information is automatically written to the table dtb_plugin.
     *
     * @param array $arrPlugin plugin_info - from the dtb_plugin
     * @return void
     */
    function install($arrPlugin)
    {
        copy(PLUGIN_UPLOAD_REALDIR . "plg_ExportCatalogue/logo.png", PLUGIN_HTML_REALDIR . "plg_ExportCatalogue/logo.png");
        mkdir(HTML_REALDIR . "user_data/packages/default/img/exportPdf");
        mkdir(HTML_REALDIR . "user_data/packages/default/js/exportPdf");
        copy(PLUGIN_UPLOAD_REALDIR . "plg_ExportCatalogue/resources/img/plg_ExportCatalogue_export_button.png", HTML_REALDIR . "user_data/packages/default/img/exportPdf/plg_ExportCatalogue_export_button.png");
        copy(PLUGIN_UPLOAD_REALDIR . "plg_ExportCatalogue/resources/img/plg_ExportCatalogue_export_button_hover.png", HTML_REALDIR . "user_data/packages/default/img/exportPdf/plg_ExportCatalogue_export_button_hover.png");
        copy(PLUGIN_UPLOAD_REALDIR . "plg_ExportCatalogue/resources/js/plg_ExportCatalogue_exportPdf.js", HTML_REALDIR . "user_data/packages/default/js/exportPdf/plg_ExportCatalogue_exportPdf.js");
    }

    /**
     * Uninstall
     *
     * Executed when plug-in is uninstalled.
     * @param array $arrPlugin
     * @return void
     */
    function uninstall($arrPlugin)
    {
        unlink(PLUGIN_HTML_REALDIR . "plg_ExportCatalogue/logo.png");
        unlink(HTML_REALDIR . "user_data/packages/default/img/exportPdf/plg_ExportCatalogue_export_button.png");
        unlink(HTML_REALDIR . "user_data/packages/default/img/exportPdf/plg_ExportCatalogue_export_button_hover.png");
        unlink(HTML_REALDIR . "user_data/packages/default/js/exportPdf/plg_ExportCatalogue_exportPdf.js");
        rmdir(HTML_REALDIR . "user_data/packages/default/img/exportPdf");
        rmdir(HTML_REALDIR . "user_data/packages/default/js/exportPdf");
    }

    /**
     * Enable plug-in
     *
     * When enabled, the plug-in will start.
     *
     * @param array $arrPlugin
     * @return void
     */
    function enable($arrPlugin)
    {
        copy(PLUGIN_UPLOAD_REALDIR . "plg_ExportCatalogue/html/export_catalogue.php", HTML_REALDIR . "products/export_catalogue.php");
        copy(PLUGIN_UPLOAD_REALDIR . "plg_ExportCatalogue/html/export_catalogue_show.php", HTML_REALDIR . "products/export_catalogue_show.php");
    }

    /**
     * Disable  plug-in
     *
     * When disabled, the plug-in will turn off.
     *
     * @param array $arrPlugin
     * @return void
     */
    function disable($arrPlugin)
    {
        unlink(HTML_REALDIR . "products/export_catalogue.php");
        unlink(HTML_REALDIR . "products/export_catalogue_show.php");
    }

    /**
     * PrefilterTransform hookpoint
     *
     * Modifies the template
     *
     * @param string &$source Template html source
     * @param LC_Page_Ex $objPage Page object
     * @param string $filename Template filename
     * @return void
     */
    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename)
    {
        // SC_Helper_Transform
        $objTransform = new SC_Helper_Transform($source);
        switch ($objPage->arrPageLayout['device_type_id']) {
            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_SMARTPHONE:
                break;
            case DEVICE_TYPE_PC: // PC
                if (strpos($filename, 'products/list.tpl') !== false) {
                    $template_dir = PLUGIN_UPLOAD_REALDIR . $this->arrSelfInfo['plugin_code'] . '/templates/';
                    $objTransform->select('#page_navi_top')->insertBefore('<script type="text/javascript" src="' . ROOT_URLPATH . 'user_data/packages/default/js/exportPdf/plg_ExportCatalogue_exportPdf.js"></script>');
                    $objTransform->select('#page_navi_top')->insertBefore(file_get_contents($template_dir . 'plg_ExportCatalogue_link_export.tpl'));
                    $objTransform->select('#page_navi_top')->insertBefore(file_get_contents($template_dir . 'plg_ExportCatalogue_button_export.tpl'));
                    $objTransform->select('#page_navi_bottom')->insertBefore(file_get_contents($template_dir . 'plg_ExportCatalogue_button_export.tpl'));
                }
                break;
            case DEVICE_TYPE_ADMIN:
                break;
            default:
                break;
        }

        $source = $objTransform->getHTML();
    }
}