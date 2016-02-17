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

require_once CLASS_EX_REALDIR . 'page_extends/frontparts/bloc/LC_Page_FrontParts_Bloc_Ex.php';

class LC_Page_FrontParts_Bloc_QuickOrder extends LC_Page_FrontParts_Bloc_Ex
{

    public $isDisplayQuickOrder;

    /**
     * Page を初期化する.
     *
     * @return void
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    public function process()
    {
        // カート権限check
        $this->checkPermissionToDisplay();
        $this->sendResponse();
    }

    /**
     * カート権限check
     * @return void
     */
    private function checkPermissionToDisplay(){
        $objCustomer = new SC_Customer_Ex();
        $this->isDisplayQuickOrder = true;
        $isLogin = $objCustomer->isLoginSuccess(true);
        // ログイン状態でチェック
        if (($isLogin && CART_CLOSE_TYPE === 2 && intval($objCustomer->getValue('status')) !== 2)
            || ($isLogin && CART_CLOSE_TYPE == 3)
        ) {
            $this->isDisplayQuickOrder = false;
        }
        //未ログイン状態とCART_CLOSE_TYPE：公開ではない
        if (!$isLogin && CART_CLOSE_TYPE > 0) {
            $this->isDisplayQuickOrder = false;
        }
    }
}