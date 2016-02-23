<!--{*
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
*}-->
<div id="undercolumn" class="clearfix">
<h2 class="title QuickOrderTitle ">クイックオーダー</h2>
<form name="quickOrderForm" id="QuickOrderForm" method="post" action="?">
    <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->"/>
    <input type="hidden" name="mode" value="cart"/>
    <table id="QuickOrder" data-row-number="10">
        <tr>
            <th width="20%" class="alignC">商品コード</th>
            <th width="15%" class="alignC quantityAmount">数量</th>
            <th width="50%" class="alignC">商品名</th>
            <th width="15%" class="alignC">販売価格<br>(税込)</th>
        </tr>
        <tr class="quickOrderTemplate">
            <td class="productCodeInput">
                <input type="text" name="product[row-number][code]" value="" class="alignC productCode quickorder-input">
                <input type="hidden" name="product[row-number][id]" value="">
            </td>
            <td class="numberInput">
                <input name="product[row-number][quantity]" type="text" value="" class="alignR productQuantity quickorder-input">
            </td>
            <td>
                <div class="productInfoArea"></div>
                <div style="clear: both"></div>
                <label class="productCodeErrorArea errorArea"></label>
                <label class="quantityErrorArea errorArea"></label>
            </td>
            <td class="alignC"></td>
        </tr>
        <!--{section name=item start=1 loop=11 }-->
        <tr>
            <td class="productCodeInput">
                <input type="text" name="product[<!--{$smarty.section.item.index}-->][code]" value="" class="alignC productCode quickorder-input">
                <input type="hidden" name="product[<!--{$smarty.section.item.index}-->][id]" value="">
            </td>
            <td class="numberInput">
                <input type="text" name="product[<!--{$smarty.section.item.index}-->][quantity]" value=""
                       class="alignR productQuantity quickorder-input">
            </td>
            <td>
                <div class="productInfoArea"></div>
                <div style="clear: both"></div>
                <label class="productCodeErrorArea errorArea"></label>
                <label class="quantityErrorArea errorArea"></label>
            </td>
            <td class="alignC"></td>
        </tr>
        <!--{/section}-->
    </table>

    <div class="quickOrderButton">
        <div class="quickOrderError"></div>
        <a href="" class="addMoreBtn">
            <image src="<!--{$TPL_URLPATH}-->img/button/btn_add_more.png"></image>
        </a>
        <a href="" class="addToCartBtn">
            <image src="<!--{$TPL_URLPATH}-->img/button/btn_cartin.jpg"></image>
        </a>
    </div>

</form>
<script>
    $(document).ready(function () {
        var amountLength = <!--{if is_numeric($smarty.const.AMOUNT_LEN)}--><!--{$smarty.const.AMOUNT_LEN}--><!--{else}-->0<!--{/if}-->;
        var QuickOrder = $(document).quickOrder({
            amountLength: parseInt(amountLength),
            api: "<!--{$smarty.const.ROOT_URLPATH}-->quickorder/api.php",
            errorPage: "<!--{$smarty.const.ROOT_URLPATH}-->error.php",
            logInPage: "<!--{$smarty.const.HTTPS_URL}--><!--{$smarty.const.MYPAGE_LOGIN_URLPATH}-->"
        }).init();
    });
</script>

</div>