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

require_once realpath(dirname(__FILE__)) . '/../../require.php';
require_once CLASS_EX_REALDIR . 'page_extends/frontparts/bloc/LC_Page_FrontParts_Bloc_QuickOrder_Ex.php';

$objPage = new LC_Page_FrontParts_Bloc_QuickOrder_Ex();
$objPage->blocItems = $params['items'];
$objPage->init();
$objPage->process();