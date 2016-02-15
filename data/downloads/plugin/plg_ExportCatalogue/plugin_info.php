<?php

/*
 * ExportCatalogue
 * Copyright(c) 2015 IDS Co., Ltd. All Rights Reserved.
 * http://www.ids.co.jp
 */

class plugin_info
{
    static $PLUGIN_CODE = "plg_ExportCatalogue";
    static $PLUGIN_NAME = "商品カタログPDFダウンロードプラグイン";
    static $PLUGIN_VERSION = "1.0";
    static $COMPLIANT_VERSION = "EC-Cube BtoB";
    static $AUTHOR = "株式会社アイディーエス";
    static $DESCRIPTION = "商品カタログPDFダウンロードプラグイン";
    static $PLUGIN_SITE_URL = "http://www.ids.co.jp";
    static $AUTHOR_SITE_URL = "http://www.ids.co.jp";
    // The class name is very important. You will write your code in the class you define here.
    static $CLASS_NAME = "plg_ExportCatalogue";
    // ***Add hook points here***
    // Hook: array(hook_point,callback)
    static $HOOK_POINTS = array(
        array(
            "prefilterTransform",
            'prefilterTransform'
        )
    );
    static $LICENSE = "LGPL";
}