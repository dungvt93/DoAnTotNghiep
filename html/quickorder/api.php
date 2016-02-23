<?php
/*
 * This file is part of EC-CUBE B2B
 *
 * Copyright(c) 2000-2014 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is NOT free software.
 * LICENSE: See also LICENCE.txt file.
 */

require_once '../require.php';
require_once CLASS_EX_REALDIR . 'page_extends/quickorder/LC_Page_QuickOrder_Api_Ex.php';

$objPage = new LC_Page_QuickOrder_Api_Ex();
$objPage->init();
$objPage->process();