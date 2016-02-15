<?php
/*
 * ExportCatalogue
 * Copyright(c) 2015 IDS Co., Ltd. All Rights Reserved.
 * http://www.ids.co.jp
 */
require_once CLASS_EX_REALDIR . 'SC_Product_Ex.php';

class plg_ExportCatalogue_SC_ProductPdfExport extends SC_Product_Ex
{
    /**
     *
     * get info of listproduct by productIds
     * @param SC_Query_Ex $objQuery
     * @param array $arrProductId
     * @return array
     */
    public function getListByProductIds(&$objQuery, $arrProductId = array())
    {
        if (empty($arrProductId)) {
            return array();
        }
        $where = 'alldtl.product_id IN (' . SC_Utils_Ex::repeatStrWithSeparator('?', count($arrProductId)) . ')';
        $where .= ' AND alldtl.del_flg = 0';
        $objQuery->setWhere($where, $arrProductId);
        $objQuery->setOrder('product_code ASC');
        $objCustomer = new SC_Customer_Ex();
        if ($objCustomer->isLoginSuccess(true)) {
//            $customer_id = $objCustomer->getValue('customer_id');
//            $company_id = $objCustomer->getValue('company_id');
//            $company_rank = $objCustomer->getValue('company_rank');
            $is_login = true;
        }
        $isGetPrice = PRICE_VIEW_TYPE == 0 || (PRICE_VIEW_TYPE == 2 && $is_login === true);
        $arrProducts = $this->lists($objQuery, $isGetPrice);
        $arrTmp = array();
        foreach ($arrProductId as $product_id) {
            $arrTmp[$product_id] = array();
        }
        foreach ($arrProducts as $product) {
            if ($isGetPrice) {
                $product['incTax_price02'] = isset($product['price02']) && !is_null($product['price02']) ?
                    number_format(SC_Helper_TaxRule_Ex::sfCalcIncTax($product['price02'], $product['product_id'])) :
                    null;
                if ($is_login === true) {
//                    $this->setCustomerPrice($product, $customer_id, $company_id, $company_rank);
                } else {
                    $product['discount_price'] = null;
                    $product['customer_price'] = null;
                }
            }
            $arrTmp[$product['product_id']][] = $product;
        }
        return $arrTmp;
    }

    /**
     * get customer price for product
     * @param array $product
     * @param string $customer_id
     * @param string $company_id
     * @param string $company_rank
     */
//    public function setCustomerPrice(&$product, $customer_id, $company_id, $company_rank)
//    {
//        $objCustomerPrice = new SC_Helper_CustomerPrice();
//        $product['discount_price'] = $objCustomerPrice->getProductPrice($product['product_class_id']
//            , $customer_id, $company_id, $company_rank, $product['price02']);
//        if (!is_null($product['discount_price'])) {
//            $product['customer_price'] = strlen($product['discount_price'])
//                ? number_format(SC_Helper_TaxRule_Ex::sfCalcIncTax($product['discount_price'], $product['product_id'], $product['product_class_id']))
//                : '';
//        } else {
//            $product['discount_price'] = null;
//            $product['customer_price'] = null;
//        }
//    }

    /**
     * get some cols from query
     * @param SC_Query_Ex $objQuery
     * @return array
     */
    public function lists(&$objQuery, $isGetPrice)
    {
        $colPrice02 = '';
        if ($isGetPrice)
            $colPrice02 = ',price02';
        $col = <<< __EOS__
             product_id
            ,name
			,main_list_comment
            $colPrice02
            ,main_list_image
            ,name1
            ,name2
            ,product_code
			,product_class_id
__EOS__;
        $res = $objQuery->select($col, $this->alldtlSQL());
        return $res;
    }

    /**
     * build query string
     * @param string $where_products_class
     * @return array
     */
    public function alldtlSQL($where_products_class = '')
    {
        if (!SC_Utils_Ex::isBlank($where_products_class)) {
            $where_products_class = 'AND (' . $where_products_class . ')';
        }
        $sql = <<< __EOS__
            (
                SELECT
                     dtb_products.product_id
                    ,dtb_products.name
                    ,dtb_products.main_list_comment
                    ,classCategorys.price02
                    ,dtb_products.main_list_image
                    ,classCategorys.name1
                    ,classCategorys.name2
                    ,classCategorys.product_code
                    ,dtb_products.del_flg
                    ,classCategorys.product_class_id
                FROM dtb_products
                    LEFT JOIN (
                        SELECT product_id,
                        	product_class_id,
                            product_code,
                            price02,
                            cc1.name AS name1,
                            cc2.name AS name2
                        FROM dtb_products_class AS pc
                        LEFT JOIN (SELECT * FROM dtb_classcategory WHERE del_flg = 0 ) AS cc1
                        	ON pc.classcategory_id1 = cc1.classcategory_id
                        LEFT JOIN (SELECT * FROM dtb_classcategory WHERE del_flg = 0 ) AS cc2
                        	ON pc.classcategory_id2 = cc2.classcategory_id
                        WHERE pc.del_flg = 0 $where_products_class
                    ) AS classCategorys
                        ON dtb_products.product_id = classCategorys.product_id
                    LEFT JOIN dtb_maker
                        ON dtb_products.maker_id = dtb_maker.maker_id
            ) AS alldtl
__EOS__;
        return $sql;
    }
}
