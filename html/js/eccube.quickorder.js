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

(function ($) {
    jQuery.fn.quickOrder = function (options) {
        var ENTER_KEY_CODE = 13;
        var TAB_KEY_CODE = 9;
        var STOCK_UNLIMITED = 1;
        var NUMBER_OF_ROW = 5;

        // Default settings:
        var defaults = {
            productCodeSelector: '.productCode',        // css class of product code
            quantitySelector: '.productQuantity',       // css class of product quantity
            quickOrderErrorSelector: '.quickOrderError',// css class of quickOrderError form
            addMoreButton: '.addMoreBtn',
            addToCartButton: '.addToCartBtn',
            template: '.quickOrderTemplate',
            tableId: '#QuickOrder',
            quickOrderFormID: '#QuickOrderForm',
            api: "./api.php",
            errorPage: '',
            logInPage: '',
            dataSaleLimit: 'data-sale-limit',
            dataStockLimit: 'data-stock-limit',
            dataRowNumber: 'data-row-number',
            amountLength: 6,
            errorMessage: {
                CK001: '※ {0}が入力されていません。',
                CK002: '※ {0}選択されていません。',
                CK003: '※ {0}は{1}字以下で入力してください。',
                CK004: '※ {0}は{1}字以内で入力してください。',
                CK005: '※ {0}は{1}字以上で入力してください。',
                CK006: '※ {0}は[範囲値From]桁～[範囲値To]桁で入力して下さい。',
                CK007: '※ {0}は{1}桁で入力して下さい。',
                CK008: '※ {0}スペース、タブ、改行は含めないで下さい。',
                CK009: '※ {0}に使用する文字を正しく入力してください。',
                CK010: '※ {0}は入力できません。',
                CK011: '※ {0}は半角英字で入力してください。',
                CK012: '※ {0}はは英数字で入力してください。',
                CK013: '※ {0}はは英数記号で入力してください。',
                CK014: '※ {0}はカタカナで入力してください。',
                CK015: '※ {0}は数字で入力してください。',
                CK016: '※ {0}が正しくありません。',
                CK017: '※ {0}の形式が不正です。',
                CK018: '※ {0}は{1}より大きい値を入力できません。',
                CK019: '※ [項目名1]との[項目名2]の期間指定が不正です。',
                CK020: '※ {0}は1以上を入力してください。',
                CK021: '※ [項目名1]と[項目名2]が一致しません。',
                CK022: '※ [項目名1]と[項目名2]は同じ値を使用できません。',
                CK023: '※ すでに会員登録で使用されている{0}です。',
                CK024: '※ {0}が入力されていません。',
                CK025: '※ {0}は全ての項目を入力して下さい。',
                SALE_LIMIT: '※ こちらの商品は{0}個までしかご購入頂けません。',
                PRODUCT_NAME: '※ 入力した商品コードの商品が存在しません。商品コードを確認してください。',
                STOCK_LIMITED: '※ こちらの商品はただいま在庫がございません。',
                CANT_ORDER: '※ こちらの商品はクイックオーダーでの注文はできません。',
                QUICK_ORDER_ERROR: '※ エラーの注文がございます。エラーメッセージを確認してください。'
            }
        };
        this.options = $.extend({}, defaults, options);
        var _this = this;

        /**
         * Get Product by Product Code
         * @returns {jQuery.fn}
         */
        _this.getProductByCode = function () {
            var productCode = $(this).val().trim();
            // If product code is null, dot not anything
            if (productCode.length === 0) {
                // Remove all product detail if any
                _this.removeProductDetail(this);
                // Display html on Mobile
                if (eccube.isSmartPhone()) {
                    _this.hasError($(this).parent().parent().next().next().find('.productCodeErrorArea'), '');
                    _this.clearAllHasError($(this));
                } else {
                    _this.hasError($(this).parent().next().next().find('.productCodeErrorArea'), '');
                    _this.clearAllHasError($(this));
                }
                return _this;
            }
            // Process html on Mobile or PC
            var quantityObj = eccube.isSmartPhone() ? $(this).parent().parent().next().find("input")[0] : $(this).parent().next().find("input")[0];

            var products = [];
            var ajaxResponseStatus;
            var requireLogin = false;
            // call ajax to get product detail
            $.ajax(
                {
                    url: _this.options.api,
                    type: "GET",
                    async: false,
                    cache: false,
                    dataType: 'json',
                    data: {
                        'ProductCode': encodeURIComponent(productCode)
                    },
                    success: function (result) {
                        products = result;
                        // set ajax status response is true
                        ajaxResponseStatus = true;
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        // set ajax response status is false
                        ajaxResponseStatus = false;
                        //set require logIn
                        if(XMLHttpRequest.status === 401){
                            requireLogin = true;
                        }
                    }
                });

            // return if ajax is error
            if(ajaxResponseStatus === false){
                if(requireLogin){
                    // redirect to login page
                    window.location.href = _this.options.logInPage;
                    return;
                } else{
                    // redirect to error page
                    window.location.href = _this.options.errorPage;
                    return;
                }
            }
            // Validate product
            if (_this.validateProduct(this, products, quantityObj) === true) {
                // Enable quantity text field
                _this.switchEnableMode(quantityObj, true);

                // Display html on Mobile
                var trObject = eccube.isSmartPhone() ? $(this).parent().parent() : $(this).parent();
                // Show product detail information
                _this.showProductDetail(trObject, products[0]);

                // Validate product quantity if any
                _this.validateProductQuantity(quantityObj);
            }
            return _this;
        };

        /**
         * Validate product
         * @param obj
         * @param products
         * @param quantityObj
         * @returns {boolean}
         */
        _this.validateProduct = function (obj, products, quantityObj) {
            // Display html on Mobile
            var errorLabel = eccube.isSmartPhone() ? $(obj).parent().parent().next().next().find('label.productCodeErrorArea') : $(obj).parent().next().next().find('label.productCodeErrorArea');

            // Validate record count
            if (products.length > 1) {
                _this.hasError(errorLabel, _this.options.errorMessage.CANT_ORDER);
                // Remove product detail information if any
                _this.removeProductDetail(obj);
                return false;
            }

            // Check product exists or not
            if (products.length === 0) {
                _this.hasError(errorLabel, _this.options.errorMessage.PRODUCT_NAME);
                // Remove product detail information if any
                _this.removeProductDetail(obj);
                return false;
            }

            // Get current product
            var product = products[0];

            // Validate stock
            if (parseInt(product.stockUnlimited) !== STOCK_UNLIMITED && parseInt(product.stock) === 0) {
                // Show product detail information on Mobile or PC
                _this.showProductDetail(eccube.isSmartPhone() ? $(obj).parent().parent() : $(obj).parent(), product);
                _this.hasError(errorLabel, "");

                // Process html on Mobile or PC
                var errorLabelQuantity = eccube.isSmartPhone() ? $(obj).parent().parent().next().next().find('label.quantityErrorArea') : $(obj).parent().next().next().find('label.quantityErrorArea');
                _this.hasError(errorLabelQuantity, _this.options.errorMessage.STOCK_LIMITED);

                //Clear data quantity input field
                eccube.isSmartPhone() ? $(obj).parent().parent().next().find("input").val('') : $(obj).parent().next().find("input").val('');

                // Disable quantity text field
                _this.switchEnableMode(quantityObj, false);

                // Move focus
                _this.moveFocus(obj);

                return false;
            }
            _this.hasError(errorLabel, "");
            return true;
        };

        /**
         * Show error message if any and update has error information
         * @param obj
         * @param message
         * @returns {jQuery.fn}
         */
        _this.hasError = function (obj, message) {
            $(obj).text(message);
            // Check has error or not
            if (message.length > 0) {
                $(obj).parent().addClass('hasError');
            } else {
                var tdObject = $(obj).parent();
                $(tdObject[0]).removeClass('hasError');
            }

            return _this;
        };

        /**
         * Process web lost focus on product quantity text field
         * @returns {jQuery.fn}
         */
        _this.processProductQuantity = function () {
            _this.validateProductQuantity(this);
            return _this;
        };

        /**
         * Validate Product Quantity
         * @returns {jQuery.fn}
         */
        _this.validateProductQuantity = function (obj) {
            var productQuantity = $(obj).val();
            // Process html on Mobile or PC
            var errorLabel = eccube.isSmartPhone() ? $(obj).parent().parent().next().find('label.quantityErrorArea') : $(obj).parent().next().find('label.quantityErrorArea');

            //remove space
            productQuantity = productQuantity.trim();
            // If product quantity is null, dot not any thing
            if (productQuantity.length === 0 && $(obj).attr("disabled") !== "disabled") {
                _this.hasError(errorLabel, "");
                return _this;
            }

            //convert full size to half Size
            productQuantity = productQuantity.convertNumberToHalfSize();
            $(obj).val(productQuantity);

            // Process html on Mobile or PC
            var productCodeObj = eccube.isSmartPhone() ? $(obj).parent().parent().parent().find("td:first-child").find("input") : $(obj).parent().parent().find("td:first-child").find("input");
            var saleLimit = productCodeObj[0].getAttribute(_this.options.dataSaleLimit);
            var stockLimit = productCodeObj[0].getAttribute(_this.options.dataStockLimit);

            // Check numeric
            if (Number(productQuantity) !== parseInt(productQuantity) || Math.floor(productQuantity) < 0) {
                _this.hasError(errorLabel, _this.options.errorMessage.CK015.format("数量"));
                return _this;
            }

            productQuantity = Number(productQuantity);
            $(obj).val(productQuantity);

            // Validate max length
            if (productQuantity.toString().length > _this.options.amountLength) {
                _this.hasError(errorLabel, _this.options.errorMessage.CK004.format("数量", _this.options.amountLength));
                return _this;
            }

            // Check sale limit is null and stock limit not null
            if (_this.isNull(saleLimit) && !_this.isNull(stockLimit)) {
                if (Math.floor(productQuantity) > parseInt(stockLimit)) {
                    _this.hasError(errorLabel, _this.options.errorMessage.SALE_LIMIT.format(stockLimit));
                    return _this;
                }
            }

            // Check sale limit is not null and stock limit is null
            if (!_this.isNull(saleLimit) && _this.isNull(stockLimit)) {
                if (Math.floor(productQuantity) > parseInt(saleLimit)) {
                    _this.hasError(errorLabel, _this.options.errorMessage.SALE_LIMIT.format(saleLimit));
                    return _this;
                }
            }

            // Check sale limit and stock limit is not null
            if (!_this.isNull(saleLimit) && !_this.isNull(stockLimit)) {
                if (Math.floor(productQuantity) > parseInt(saleLimit) || Math.floor(productQuantity) > parseInt(stockLimit)) {
                    // compare stock limit with sale limit to show message error
                    if (parseInt(stockLimit) > parseInt(saleLimit)) {
                        _this.hasError(errorLabel, _this.options.errorMessage.SALE_LIMIT.format(saleLimit));
                    }
                    else {
                        _this.hasError(errorLabel, _this.options.errorMessage.SALE_LIMIT.format(stockLimit));
                    }
                    return _this;
                }
            }

            _this.hasError(errorLabel, "");
            return _this;
        };

        /**
         * Replace Enter Key by Tab Key on the Product Code and Product Quantity text field
         * @returns {jQuery.fn}
         */
        _this.processEnterAndTabKey = function (e) {
            if (e.keyCode === ENTER_KEY_CODE) {
                var inputs = $("input.quickorder-input");
                for (var x = 0; x < inputs.length; x++) {
                    if (inputs[x] == this) {
                        // If this is not last input item, move to next item
                        if ((x + 1) < inputs.length) {
                            //Enable quantity input field
                            _this.switchEnableMode(inputs[x + 1], true);
                            $(inputs[x + 1]).focus();
                            //Focus next if quantity is disabled
                            if ($(inputs[x + 1]).attr('disabled')) {
                                $(inputs[x + 2]).focus();
                            }
                        } else {
                            // Add more 5 rows
                            _this.addMoreRow();

                            // Process move to next focus
                            $(this).trigger(e);
                        }
                    }
                }
                e.preventDefault();
            }
            return _this;
        };

        /**
         * Show product detail information
         * @param obj
         * @param product
         * @returns {jQuery.fn}
         */
        _this.showProductDetail = function (obj, product) {
            // Add sale Limit
            var productCodeInputField = $(obj).find('input')[0];
            var productIdInputField = $(obj).find('input')[1];

            // Add product ID
            $(productIdInputField).val(product.id);

            // Remove hasError class if any
            _this.hasError(productCodeInputField, "");

            $(productCodeInputField).attr('data-sale-limit', product.saleLimit);
            $(productCodeInputField).attr('data-stock-limit', product.stock);

            // show product information
            var productInfoHtml = "";

            // Check to show image
            if (product.mainListImage !== null) {
                productInfoHtml += "<img class='productImage picture' src='" + product.mainListImage + "'>";
            }

            productInfoHtml += "<div class='productInfo'>";
            // Check to show name
            if (product.name !== null) {
                productInfoHtml += "<a target='_blank' href='" + product.url + "'>" + product.name + "</a>";
            }

            // Check to show productClass
            // Check to show name
            if (product.productClass !== null) {
                productInfoHtml += "<label>" + product.productClass + "</label>";
            }

            // Process to show product price
            var priceHtml = "";
            priceHtml += "<label>";
            if (product.customerPrice !== null) {
                if(eccube.isSmartPhone()){
                    priceHtml += "販売価格(税込)： " + product.customerPrice + "円";
                    if (product.price !== null) {
                        priceHtml += "(通常価格：" + product.price + "円)";
                    }
                }
                else{
                    priceHtml += "" + product.customerPrice + "円";
                    if (product.price !== null) {
                        priceHtml += "<br>(通常価格：" + product.price + "円)";
                    }
                }

            } else {
                if (product.price !== null) {
                    // Show text with smart phone
                    if(eccube.isSmartPhone()){
                        priceHtml += "販売価格(税込)： " + product.price + "円";
                    }
                    else{
                        priceHtml += product.price + "円";
                    }
                }
            }
            priceHtml += "</label>";

            // Display html on Mobile
            if (eccube.isSmartPhone()) {
                productInfoHtml += priceHtml;
            }
            // Display html on PC
            else {
                $(obj).next().next().next().html(priceHtml);
            }

            productInfoHtml += "</div>";

            // Display html
            $(obj).next().next().find(".productInfoArea").html(productInfoHtml);

            return _this;
        };

        /**
         * Remove product detail information
         * @param obj
         * @returns {jQuery.fn}
         */
        _this.removeProductDetail = function (obj) {
            // Display html on Mobile
            var firstTd = eccube.isSmartPhone() ? $(obj).parent().parent() : $(obj).parent();

            // Process html on Mobile or PC
            var quantityObj = eccube.isSmartPhone() ? $(obj).parent().parent().next().find("input")[0] : $(obj).parent().next().find("input")[0];

            // Remove product id hidden
            $(firstTd).find('input[type=hidden]').val('');

            // Remove product information
            $(firstTd).next().next().find(".productInfoArea").text("");

            // Remove product price
            $(firstTd).next().next().next().text("");

            // Remove data limit
            $(obj).removeAttr('data-sale-limit');

            // Remove data stock
            $(obj).removeAttr('data-stock-limit');

            //Remove error message
            $(firstTd).next().find("label").text('');
            //Enable input field
            _this.switchEnableMode($(firstTd).next().find("input"), true);

            // Validate product quantity if any
            _this.validateProductQuantity(quantityObj);

            return _this;
        };

        /**
         * switch Enable/Disable mode of text field
         * @param textField
         * @param isEnableMode
         * @returns {jQuery.fn}
         */
        _this.switchEnableMode = function (textField, isEnableMode) {
            if (isEnableMode === false) {
                $(textField).attr('disabled', 'disabled');
            } else {
                $(textField).removeAttr('disabled');
            }
            return _this;
        };

        /**
         * Add more row
         * @returns boolean
         */
        _this.addMoreRow = function () {
            var orderTable = $(_this.options.tableId)[0];
            // Get current row number
            var currentRowNumber = parseInt(orderTable.getAttribute(_this.options.dataRowNumber));
            // Add 5 rows
            var trTemplate = $(_this.options.template).html();
            for (var index = 0; index < NUMBER_OF_ROW; index++) {
                currentRowNumber += 1;
                $(_this.options.tableId).append("<tr>" + trTemplate.replace(/row-number/g, currentRowNumber) + "</tr>");
            }

            // Update current row number
            $(orderTable).attr('data-row-number', currentRowNumber);
            // Bind event
            _this.bindEvent();
            return false;
        };

        /**
         * Process adding to cart
         * @returns boolean
         */
        _this.processAddingToCart = function () {
            if (_this.validateQuickOrderForm() === true) {
                // Submit form
                $(_this.options.quickOrderFormID).submit();
            }
            return false;
        };

        /**
         * Validate quick Order form before submit
         * @returns {boolean}
         */
        _this.validateQuickOrderForm = function () {
            var productCodeErrors = $(document).find('label.productCodeErrorArea');
            var isSubmitToCart = true;
            $.each(productCodeErrors, function(index, value){
                if($(value).text().trim().length > 0 || $(value).next().text().trim().length > 0){
                    isSubmitToCart = false;
                    return;
                }
            });
            if (!isSubmitToCart) {
                $(_this.options.quickOrderErrorSelector).text(_this.options.errorMessage.QUICK_ORDER_ERROR);
                return false;
            } else {
                $(_this.options.quickOrderErrorSelector).text("");
                return true;
            }
        };

        /**
         * Bind event for DOM object
         * @returns {jQuery.fn}
         */
        _this.bindEvent = function () {
            // Bind cursor out event into Product Code text field
            $(_this.options.productCodeSelector).unbind('focusout').focusout(_this.getProductByCode);

            // Bind cursor out event into Product Quantity text field
            $(_this.options.quantitySelector).unbind('focusout').focusout(_this.processProductQuantity);

            // Bind Enter key event into Product Code and Product Quantity text field
            $(_this.options.productCodeSelector).unbind('keydown').keydown(_this.processEnterAndTabKey);
            $(_this.options.quantitySelector).unbind('keydown').keydown(_this.processEnterAndTabKey);

            // Bind on click event into add more button
            $(_this.options.addMoreButton).unbind('click').click(_this.addMoreRow);

            // Bind on click event into "add to cart" button
            $(_this.options.addToCartButton).unbind('click').click(_this.processAddingToCart);

            return _this;
        };

        /**
         * Check value is null on PC or SmartPhone
         * @param val
         * @returns {boolean}
         */
        _this.isNull = function (val) {
            if (eccube.isSmartPhone()) {
                return Boolean(val === null);
            }
            else {
                return Boolean(val === "null");
            }
        };

        /**
         * Clear all has error class in children element of object
         * @returns {jQuery.fn}
         */
        _this.clearAllHasError = function (obj) {
            var objTr =$(obj).closest('tr')
            $(obj).closest('tr').find('.hasError').each(function () {
                $(this).removeClass("hasError");
            });
            return _this;
        };

        /**
         * Move focus
         * @param obj
         */
        _this.moveFocus = function (obj) {
            // Process to move
            var $input = $('input.productCode');
            var ind = $input.index(obj);
            if (ind + 1 === $input.length) {
                // add more row
                _this.addMoreRow();
                $input = $('input.productCode');
            }
            $input.eq(ind + 1).focus();
        };

        /**
         * Initial function begin to run quick order plugin
         * @returns {jQuery.fn}
         */
        _this.init = function () {
            //focus first Input Product Code
            $($(".productCode")[1]).focus();
            _this.bindEvent();
            return _this;
        };

        return _this;
    };
})(jQuery);

/**
 * Format string
 * @returns {String}
 */
String.prototype.format = function () {
    var str = this;
    for (var i = 0; i < arguments.length; i++) {
        var reg = new RegExp("\\{" + i + "\\}", "gm");
        str = str.replace(reg, arguments[i]);
    }
    return str;
};

/**
 * convert full size to half size
 * @returns {String}
 */
String.prototype.convertNumberToHalfSize = function () {
    var str = this;
    var halfSizeNumbers = '1234567890';
    var fullSizeNumbers = '１２３４５６７８９０';
    for (var i = 0, n = fullSizeNumbers.length; i < n; i++) {
        str = str.replace(new RegExp(fullSizeNumbers[i], 'gm'), halfSizeNumbers[i]);
    }
    return str;
};