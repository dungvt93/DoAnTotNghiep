<?php
/*
 * ExportCatalogue
 * Copyright(c) 2015 IDS Co., Ltd. All Rights Reserved.
 * http://www.ids.co.jp
 */
require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';
require_once CLASS_EX_REALDIR . 'page_extends/products/LC_Page_Products_List_Ex.php';
require_once PLUGIN_UPLOAD_REALDIR . 'plg_ExportCatalogue/class/helper/plg_ExportCatalogue_Helper_FPDI.php';
require_once PLUGIN_UPLOAD_REALDIR . 'plg_ExportCatalogue/class/plg_ExportCatalogue_SC_ProductPdfExport.php';

class plg_ExportCatalogue_LC_Page_Products_PdfExport extends LC_Page_Products_List_Ex
{
    /**
     *
     */
    public function init()
    {
        $this->skip_load_page_layout = true;
        parent::init();
    }

    /**
     *
     */
    public function process()
    {
        $this->createPdf();
        $this->sendResponse();
    }

    /**
     *
     * @return boolean
     */
    public function createPdf()
    {
        try {
            $listProduct = $this->getCatalogueData();
            $header = $this->buildHeader($listProduct);
            $objFpdf = new plg_ExportCatalogue_Helper_FPDI();
            $headerTitles = array('', '商品', '商品コード', '規格', '販売価格');
            $data = array();
            // echo "<pre>";var_dump($listProduct);exit();
            foreach ($listProduct as $product) {
                $numberOfStandard = count($product);
                $temp = array();
                if (file_exists('../upload/save_image/' . $product[0]["main_list_image"])) {
                    $temp[0] = $product[0]["main_list_image"];
                } else {
                    $temp[0] = NULL;
                }
                $temp[] = !empty($product[0]['name']) ? $product[0]['name'] : '';
                for ($rowNumber = 0; $rowNumber < $numberOfStandard; $rowNumber++) {
                    $temp[2][] = $product[$rowNumber]['product_code'];
                    if (isset($product[$rowNumber]['customer_price']) && $product[$rowNumber]['customer_price'] != '') {
                        $temp[4][$rowNumber] = '\\' . $product[$rowNumber]['customer_price'] . PHP_EOL . '(通常価格\\' . $product[$rowNumber]['incTax_price02'] . ')';
                    } else if (isset($product[$rowNumber]['incTax_price02'])) {
                        $temp[4][$rowNumber] = '\\' . $product[$rowNumber]['incTax_price02'];
                    }
                    $temp[3][] = $this->mergeClassCategoryName($product[$rowNumber]['name1'], $product[$rowNumber]['name2']);
                }
                $temp[5] = $product[0]["product_id"];
                array_push($data, $temp);
            }
            $w = array('13', '69', '25', '35', '28');

            $objFpdf->createPdf($header,$headerTitles, $data, $w);
            $objFpdf->Output('ProductCatalogue.pdf',"I");
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Get all Product of Catalogue
     * @return array
     */
    private function getCatalogueData()
    {
        $scProductPdfExport = new plg_ExportCatalogue_SC_ProductPdfExport();
        $displayNumber = -1;
        $startno = 0;
        $this->arrForm = $_REQUEST;
        $this->orderby = $_REQUEST['orderby'];
        $arrSearchCondition = $this->lfGetSearchCondition($this->arrForm);
        $arrProducts = $this->lfGetProductsList($arrSearchCondition, $displayNumber, $startno, $scProductPdfExport);
        return $arrProducts;
    }

    /**
     * get product list
     * @param array $searchCondition
     * @param int $disp_number
     * @param int $startno
     * @param plg_ExportCatalogue_SC_ProductPdfExport $scProductExportPdf
     * @return array
     */
    public function lfGetProductsList($searchCondition, $disp_number, $startno, &$scProductExportPdf)
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $arrOrderVal = array();
        switch ($this->orderby) {
            case 'price':
                $scProductExportPdf->setProductsOrder('price02', 'dtb_products_class', 'ASC');
                break;
            case 'date':
                $scProductExportPdf->setProductsOrder('create_date', 'dtb_products', 'DESC');
                break;
            default:
                if (strlen($searchCondition['where_category']) >= 1) {
                    $dtb_product_categories = "(SELECT * FROM dtb_product_categories WHERE {$searchCondition['where_category']})";
                    $arrOrderVal = $searchCondition['arrvalCategory'];
                } else {
                    $dtb_product_categories = 'dtb_product_categories';
                }
                $col = 'T3.rank * 2147483648 + T2.rank';
                $from = "{$dtb_product_categories} T2 JOIN dtb_category T3 ON T2.category_id = T3.category_id";
                $where = 'T2.product_id = alldtl.product_id ';
                $objQuery->setOrder('T3.rank DESC, T2.rank DESC');
                $sub_sql = $objQuery->getSql($col, $from, $where);
                $sub_sql = $objQuery->dbFactory->addLimitOffset($sub_sql, 1);

                $objQuery->setOrder("({$sub_sql}) DESC ,product_id DESC");
                break;
        }
        $objQuery->setLimitOffset($disp_number, $startno);
        $objQuery->setWhere($searchCondition['where']);
        $arrProductId = $scProductExportPdf->findProductIdsOrder($objQuery, array_merge($searchCondition['arrval'], $arrOrderVal));
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $arrProducts = $scProductExportPdf->getListByProductIds($objQuery, $arrProductId);
        return $arrProducts;
    }

    /**
     * build data for pdf
     * @param $data
     * @return array
     */
    private function buildHeader($data)
    {
        // Convert logo in case: image is not jpg file
        $logo = $this->getLogoImage();
        if($logo===false)
            SC_Response_Ex::sendRedirect(HTTP_URL . "error.php");

        // Data for header
        $header = array(
            'logo' => $logo,
            'shopName' => !is_null($this->getShopName()) ? $this->getShopName() . ' 商品カタログ' : '',
            'catalog' => $this->getCategoryName(),
            'number' => count($data),
            'key' => $this->getKeySearch(),
            'maker' => $this->getMaker()
        );
        // Data return
        return $header;
    }

    /**
     * get name of shop in DB
     * @return string
     */
    private function getShopName()
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $data = $objQuery->get('shop_name', 'dtb_baseinfo');
        return $data;
    }

    /**
     * get category name
     * @return string
     */
    private function getCategoryName()
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $data = $objQuery->get('category_name', 'dtb_category', 'category_id =' . $this->arrForm['category_id']);
        return $data;
    }

    /**
     * get Maker (manufacture)
     * @return string
     */
    private function getMaker()
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $data = $objQuery->get('name', 'dtb_maker', 'maker_id =' . $this->arrForm['maker_id']);
        return $data;
    }

    /**
     *
     * @return string
     */
    private function getKeySearch()
    {
        $search = array();
        if ($this->arrForm['name'] !== "")
            array_push($search, $this->arrForm['name']);
        if ($this->arrForm['product_code'] !== "")
            array_push($search, $this->arrForm['product_code']);
        return implode(' / ', $search);
    }

    /**
     * avoid require authentication when using plugin
     * return void
     */
//    public function checkSiteOpen()
//    {
//        if (!defined('SITE_CLOSE_TYPE') || SITE_CLOSE_TYPE == '0' || php_sapi_name() == 'cli') {
//            return;
//        } else if (SITE_CLOSE_TYPE >= 3 && SITE_CLOSE_TYPE < 8) {
//            return;
//        } else {
//            parent::checkSiteOpen();
//        }
//    }

    /**
     * merge two name of class category
     * @param $name1
     * @param $name2
     * @return string
     */
    private function mergeClassCategoryName($name1, $name2)
    {
        $classCategoryNames = array();
        if ($name1)
            array_push($classCategoryNames, $name1);
        if ($name2)
            array_push($classCategoryNames, $name2);
        return implode('/', $classCategoryNames);
    }

    /**
     * Get correct logo of this site
     * If logo is jpeg correct file, Will use this logo for export pdf
     *    logo is png file, will create new logo.png file and use this logo for export pdf
     * With all other, will be return false (to handle show error page)
     * @return bool|string
     */
    private function getLogoImage()
    {
        $jpgLogo = USER_REALDIR . 'packages/default/img/common/logo.jpg';
        $logo = USER_REALDIR . 'packages/default/img/common/logo.png';
        $size = getimagesize($jpgLogo);
        switch ($size["mime"]) {
            case "image/jpeg": //jpeg file
                $logo = $jpgLogo;
                break;
            case "image/png":  //png file
                unlink($logo);
                copy($jpgLogo,$logo);
                break;
            default:
                $logo = false;
                break;
        }
        if($logo === false){
            return false;
        }
        return array('link' => $logo, 'width' => $size[0], 'height' => $size[1]);
    }

}