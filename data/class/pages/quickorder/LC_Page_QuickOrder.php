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
require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';

class LC_Page_QuickOrder extends LC_Page_Ex
{
    private $mode;
    private $objFormParam;
    
    /**
     * Page Init
     *
     * @return void
     */
    public function init()
    {
        parent::init();
        $this->tpl_title = "クイックオーダー画面";
    }

    /**
     * Override, always return true.
     * @param bool $is_admin
     * @return true
     */
    public function doValidToken($is_admin = false)
    {
        //Don't need check token
        return true;
    }

    /**
     * Page Process.
     *
     * @return void
     */
    public function process()
    {
        parent::process();
            $this->action();
            $this->sendResponse();
    }

    /**
     * page Action
     * @return void
     */
    public function action()
    {
        $this->mode = $this->getMode();
        if ($this->mode === "cart") {
            $this->doCart();
        }
    }

    /**
     * Add product(s) into the cart.
     *
     * @return void
     */
    public function doCart()
    {
        // パラメーター管理クラス
        $this->objFormParam = new SC_FormParam_Ex();
        $this->objFormParam->addParam('商品リスト', 'product');
        $this->objFormParam->setParam($_REQUEST);
        $productList = $this->objFormParam->arrValue['product'];
        //check productList exist
        if (!is_null($productList)) {
            //convert quantity of product in productList full size -> half size
            $productList = $this->convertToHalfSize($productList);

            foreach ($productList as $key => &$product) {
                if (isset($product['code']) && $product['code'] && strlen(trim($product['code'])) > 0) {
                    $product['code'] = trim($product['code']);
                    if ($this->ValidateData($product)) {
                        //check quantity = 0
                        if ($product['quantity'] == 0)
                            unset($productList[$key]);
                    } else {
                        SC_Response_Ex::sendRedirect(HTTP_URL . "error.php");
                    }
                } else {
                    unset($productList[$key]);
                }
            }
            if (!is_null($productList)) {
                foreach ($productList as $product) {
                    //add product to cart
                    $cartSession = new SC_CartSession();
                    $cartSession->addProduct($product['id'], $product['quantity']);
                }
            }
        }
        // カート「戻るボタン」用に保持
        $netURL = new Net_URL();
        $_SESSION['cart_referer_url'] = $netURL->getURL();
        //Redirect to Cart Page
        SC_Response_Ex::sendRedirect(CART_URL);
    }

    /**
     * Do not caching at client on Quick Order page
     */
    public function allowClientCache()
    {
        $this->httpCacheControl('nocache');
    }

    /**
     * check product can add to cart
     * @param $product
     * @return bool
     */
    protected function ValidateData(&$product)
    {
        //check quantity is exist
        if (!isset($product['quantity'])) {
            return false; // quantity  error
        } else {
            //check quantity is null
            if (trim($product['quantity']) === "") {
                $product['quantity'] = 0; //set quantity is zero
            }
            //check quantity is numeric
            if (!preg_match('/^\d+$/', $product['quantity'])) {
                return false; //quantity error
            }
            $objProduct = new SC_Product_Ex();
            //get product class information
            $productClasses = $objProduct->getProductDetailByCode($product['code']);
            if(isset($productClasses))
            {
                //check duplicate product code
                if(count($productClasses) > 1)
                    return false;
                $productClass = $productClasses[0];
                //set product id
                $product['id'] = $productClass['product_class_id'];
            }
            //check product class exist
            if (isset($productClass)) {
                // check stock
                if (intval($productClass['stock_unlimited']) !== 1 && intval($productClass['stock']) === 0)
                    return false; // product Out of stock

                // check quantity with product number of stock
                if (intval($productClass['stock_unlimited']) !== 1 && $product['quantity'] > $productClass['stock'])
                    return false; //quantity bigger than product number in stock

                // check quantity with sale_limit
                if ($productClass['sale_limit'] && $product['quantity'] > $productClass['sale_limit']) {
                    return false; // quantity bigger than sale limit
                }

                // check quantity with amount len
                if (AMOUNT_LEN <= 0 || $product['quantity'] >= pow(10, intval(AMOUNT_LEN)))
                    return false; //quantity bigger than Amount_len
            } else {
                return false; //product class does not exist
            }
        }
        return true;
    }

    /**
     * Convert quantity full size to half size
     * @param $productList
     * @return $productList
     */
    protected function convertToHalfSize($productList)
    {
        $numberOfProduct = count($productList);
        for ($key = 0; $key < $numberOfProduct; $key++) {
            if (isset($productList[$key]['quantity']))
                $productList[$key]['quantity'] = mb_convert_kana($productList[$key]['quantity'], 'n');
        }
        return $productList;
    }
}