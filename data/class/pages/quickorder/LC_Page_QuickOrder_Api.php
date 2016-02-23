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

class LC_Page_QuickOrder_Api extends LC_Page_Ex
{

    /**
     * Page を初期化する.
     *
     * @return void
     */
    public function init()
    {
        /** ページレイアウトを読み込ません */
        $this->skip_load_page_layout = true;
        parent::init();
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    public function process()
    {
        parent::process();
        $this->sendResponse($this->action());
    }

    /**
     * Page のレスポンス送信.
     *
     * @return void
     */
    public function sendResponse($arrResponse){
        header('Content-Type: application/json; charset=UTF-8');
        echo SC_Utils_Ex::jsonEncode($arrResponse);
    }

    /**
     * Page のAction.
     *
     * @return void
     */
    public function action()
    {
        $objProduct = new SC_Product_Ex();
        $productCode = $_REQUEST['ProductCode'];
        if(!$productCode) return array();
        $productCode = urldecode($productCode);
        $data = $objProduct->getProductDetailByCode($productCode);
        if(!$data){
            return array();
        } else{
            $result = array();
            foreach($data as &$dataRow){
                $resultRow = array();
                $resultRow['id'] = $dataRow['product_class_id'];
                $resultRow['name'] = $dataRow['name'];
                $resultRow['stockUnlimited'] = $dataRow['stock_unlimited'];
                $resultRow['stock'] = $dataRow['stock'];
                $resultRow['price'] = $dataRow['price02'];
                $resultRow['customerPrice'] = $dataRow['customer_price'];
                $resultRow['productClass'] = $this->mergeClassCategoryName($dataRow['name1'],$dataRow['name2']);
                if($dataRow["main_list_image"])
                {
                    $resultRow['mainListImage'] = HTTP_URL . 'upload/save_image/' . $dataRow["main_list_image"];
                } else{
                    $resultRow['mainListImage'] = HTTP_URL . 'upload/save_image/' . 'noimage_main_list.jpg';
                }
                $resultRow['url'] = HTTP_URL . 'products/detail.php?product_id=' . $dataRow['product_id'];
                $resultRow['saleLimit'] = $dataRow['sale_limit'];
                $result[] = $resultRow;
            }
            return $result;
        }
    }

    /**
     * merge two name of class category
     * @param $name1
     * @param $name2
     * @return string
     */
    private function mergeClassCategoryName($name1, $name2)
    {
        $classCategorysName = array();
        if ($name1)
            array_push($classCategorysName, $name1);
        if ($name2)
            array_push($classCategorysName, $name2);
        return implode('/', $classCategorysName);
    }

}