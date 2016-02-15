<?php /* Smarty version 2.6.27, created on 2016-01-11 22:45:51
         compiled from order/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'order/edit.tpl', 28, false),array('modifier', 'escape', 'order/edit.tpl', 91, false),array('modifier', 'default', 'order/edit.tpl', 107, false),array('modifier', 'h', 'order/edit.tpl', 107, false),array('modifier', 'sfDispDBDate', 'order/edit.tpl', 144, false),array('modifier', 'sfGetErrorColor', 'order/edit.tpl', 151, false),array('modifier', 'nl2br', 'order/edit.tpl', 347, false),array('modifier', 'n2s', 'order/edit.tpl', 353, false),array('modifier', 'sfCalcIncTax', 'order/edit.tpl', 432, false),array('modifier', 'sfMultiply', 'order/edit.tpl', 437, false),array('modifier', 'count', 'order/edit.tpl', 546, false),array('function', 'html_options', 'order/edit.tpl', 153, false),array('function', 'html_radios', 'order/edit.tpl', 257, false),)), $this); ?>

<script type="text/javascript">
<!--
    function fnEdit(customer_id) {
        document.form1.action = '<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
customer/edit.php';
        document.form1.mode.value = "edit"
        document.form1['customer_id'].value = customer_id;
        document.form1.submit();
        return false;
    }

    function fnCopyFromOrderData() {
        df = document.form1;

        // お届け先名のinputタグのnameを取得
        var shipping_data = $('input[name^=shipping_name01]').attr('name');
        var shipping_slt  = shipping_data.split("shipping_name01");

        var shipping_key = "[0]";
        if(shipping_slt.length > 1) {
            shipping_key = shipping_slt[1];
        }

        df['shipping_name01'+shipping_key].value = df.order_name01.value;
        df['shipping_name02'+shipping_key].value = df.order_name02.value;
        df['shipping_kana01'+shipping_key].value = df.order_kana01.value;
        df['shipping_kana02'+shipping_key].value = df.order_kana02.value;
        df['shipping_company_name'+shipping_key].value = df.order_company_name.value;
        df['shipping_zip01'+shipping_key].value = df.order_zip01.value;
        df['shipping_zip02'+shipping_key].value = df.order_zip02.value;
        df['shipping_tel01'+shipping_key].value = df.order_tel01.value;
        df['shipping_tel02'+shipping_key].value = df.order_tel02.value;
        df['shipping_tel03'+shipping_key].value = df.order_tel03.value;
        df['shipping_fax01'+shipping_key].value = df.order_fax01.value;
        df['shipping_fax02'+shipping_key].value = df.order_fax02.value;
        df['shipping_fax03'+shipping_key].value = df.order_fax03.value;
        <?php if (((is_array($_tmp=@FORM_COUNTRY_ENABLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            df['shipping_country_id'+shipping_key].value = df.order_country_id.value;
            df['shipping_zipcode'+shipping_key].value = df.order_zipcode.value;
        <?php endif; ?>
        df['shipping_addr01'+shipping_key].value = df.order_addr01.value;
        df['shipping_addr02'+shipping_key].value = df.order_addr02.value;
        df['shipping_pref'+shipping_key].value = df.order_pref.value;
    }

    function fnFormConfirm() {
        if (eccube.doConfirm()) {
            document.form1.submit();
        }
    }

    function fnMultiple() {
        eccube.openWindow('<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
order/multiple.php', 'multiple', '600', '500', {menubar:'no'});
        document.form1.anchor_key.value = "shipping";
        document.form1.mode.value = "multiple";
        document.form1.submit();
        return false;
    }

    function fnAppendShipping() {
        document.form1.anchor_key.value = "shipping";
        document.form1.mode.value = "append_shipping";
        document.form1.submit();
        return false;
    }

    $(document).ready(function() {
        var shipping_quantity = '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_shipping_quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
        if (shipping_quantity > 1){
            $("input[name^='quantity[']").attr("disabled","disabled");
        }
    });

    function quantityCopyForSingleShipping(product_index){
        var product_index = parseInt(product_index);
        var input_quantity = $('input[name^="quantity[' + product_index + ']"]').val();
        $('input[name^="shipment_quantity[<?php echo ((is_array($_tmp=$this->_tpl_vars['top_shipping_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][' + product_index + ']"]').val(input_quantity);
    }

//-->
</script>
<form name="form1" id="form1" method="post" action="?">
    <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
    <input type="hidden" name="mode" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 'edit') : smarty_modifier_default($_tmp, 'edit')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
    <input type="hidden" name="order_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
    <input type="hidden" name="edit_customer_id" value="" />
    <input type="hidden" name="anchor_key" value="" />
    <input type="hidden" id="add_product_id" name="add_product_id" value="" />
    <input type="hidden" id="add_product_class_id" name="add_product_class_id" value="" />
    <input type="hidden" id="select_shipping_id" name="select_shipping_id" value="" />
    <input type="hidden" id="edit_product_id" name="edit_product_id" value="" />
    <input type="hidden" id="edit_product_class_id" name="edit_product_class_id" value="" />
    <input type="hidden" id="no" name="no" value="" />
    <input type="hidden" id="delete_no" name="delete_no" value="" />
    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrSearchHidden'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
        <?php if (is_array ( ((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
            <?php $_from = ((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c_item']):
?>
            <input type="hidden" name="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
[]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['c_item'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
            <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
            <input type="hidden" name="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>

    <div id="order" class="contents-main">

        <!--▼お客様情報ここから-->
        <table class="form">
            <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != 'add'): ?>
            <tr>
                <th>帳票出力</th>
                <td><a class="btn-normal" href="javascript:;" onclick="eccube.openWindow('pdf.php?order_id=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
','pdf_input','615','650'); return false;">帳票出力</a></td>
            </tr>
            <?php endif; ?>
            <tr>
                <th>注文番号</th>
                <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
            </tr>
            <tr>
                <th>受注日</th>
                <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['create_date']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<input type="hidden" name="create_date" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['create_date']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" /></td>
            </tr>
            <tr>
                <th>対応状況<span class="attention"> *</span></th>
                <td>
                    <?php $this->assign('key', 'status'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <option value="">選択してください</option>
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrORDERSTATUS'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select><br />
                    <?php if (((is_array($_tmp=$_GET['mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != 'add'): ?>
                        <span class="attention">※ <?php echo ((is_array($_tmp=$this->_tpl_vars['arrORDERSTATUS'][@ORDER_CANCEL])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
に変更時には、在庫数を手動で戻してください。</span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>入金日</th>
                <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['payment_date']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "未入金") : smarty_modifier_default($_tmp, "未入金")))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
            </tr>
            <tr>
                <th>発送日</th>
                <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['commit_date']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "未発送") : smarty_modifier_default($_tmp, "未発送")))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
            </tr>
        </table>

        <h2>注文者情報
            <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'add'): ?>
                <a class="btn-normal" href="javascript:;" name="address_input" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
customer/search_customer.php','search','600','650',{resizable:'no',focus:false}); return false;">会員検索</a>
            <?php endif; ?>
        </h2>
        <table class="form">
            <tr>
                <th>会員ID</th>
                <td>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['customer_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['customer_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                        <input type="hidden" name="customer_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['customer_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                    <?php else: ?>
                        (非会員)
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>お名前<span class="attention"> *</span></th>
                <td>
                    <?php $this->assign('key1', 'order_name01'); ?>
                    <?php $this->assign('key2', 'order_name02'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="15" class="box15" />
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="15" class="box15" />
                </td>
            </tr>
            <tr>
                <th>お名前(フリガナ)</th>
                <td>
                    <?php $this->assign('key1', 'order_kana01'); ?>
                    <?php $this->assign('key2', 'order_kana02'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="15" class="box15" />
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="15" class="box15" />
                </td>
            </tr>
            <tr>
                <th>会社名</th>
                <td>
                    <?php $this->assign('key1', 'order_company_name'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="30" class="box30" />
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    <?php $this->assign('key1', 'order_email'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="30" class="box30" />
                </td>
            </tr>
            <tr>
                <th>TEL</th>
                <td>
                    <?php $this->assign('key1', 'order_tel01'); ?>
                    <?php $this->assign('key2', 'order_tel02'); ?>
                    <?php $this->assign('key3', 'order_tel03'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['keyname'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" /> -
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['keyname'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" /> -
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key3']]['keyname'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key3']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key3']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                </td>
            </tr>
            <tr>
                <th>FAX</th>
                <td>
                    <?php $this->assign('key1', 'order_fax01'); ?>
                    <?php $this->assign('key2', 'order_fax02'); ?>
                    <?php $this->assign('key3', 'order_fax03'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['keyname'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" /> -
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['keyname'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" /> -
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key3']]['keyname'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key3']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key3']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <?php $this->assign('key1', 'order_sex'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <span style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <?php echo smarty_function_html_radios(array('name' => ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'options' => ((is_array($_tmp=$this->_tpl_vars['arrSex'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </span>
                </td>
            </tr>
            <tr>
                <th>職業</th>
                <td>
                    <?php $this->assign('key1', 'order_job'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <span style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
	                    <option value="" selected="selected">選択してください</option>
	                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrJob'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>
                    </span>
                </td>
            </tr>
            <tr>
                <th>生年月日</th>
                <td>
                    <?php $this->assign('key1', 'order_birth_year'); ?>
                    <?php $this->assign('key2', 'order_birth_month'); ?>
                    <?php $this->assign('key3', 'order_birth_day'); ?>
                    <?php $this->assign('errBirth', ($this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']]).($this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']]).($this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']])); ?>
	                <?php if (((is_array($_tmp=$this->_tpl_vars['errBirth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
	                    <div class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['errBirth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</div>
	                <?php endif; ?>
                    <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['errBirth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrBirthYear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))), $this);?>

                    </select>年
                    <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['errBirth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrBirthMonth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))), $this);?>

                    </select>月
                    <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key3'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['errBirth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrBirthDay'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key3']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))), $this);?>

                    </select>日
                </td>
            </tr>

            <?php $this->assign('key1', 'order_country_id'); ?>
            <?php $this->assign('key2', 'order_zipcode'); ?>
            <?php if (! ((is_array($_tmp=@FORM_COUNTRY_ENABLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=@DEFAULT_COUNTRY_ID)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <?php else: ?>
                <tr>
                    <th>国</th>
                    <td>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                                <option value="" selected="selected">国を選択</option>
                                <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrCountry'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, ((is_array($_tmp=@DEFAULT_COUNTRY_ID)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : smarty_modifier_default($_tmp, ((is_array($_tmp=@DEFAULT_COUNTRY_ID)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <th>ZIP CODE</th>
                    <td>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
;" size="15" class="box15"/>
                    </td>
                </tr>
            <?php endif; ?>

            <tr>
                <th>住所</th>
                <td>
                    <?php $this->assign('key1', 'order_zip01'); ?>
                    <?php $this->assign('key2', 'order_zip02'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    〒
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                    -
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                    <a class="btn-normal" href="javascript:;" name="address_input" onclick="eccube.getAddress('<?php echo ((is_array($_tmp=@INPUT_ZIP_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', 'order_zip01', 'order_zip02', 'order_pref', 'order_addr01'); return false;">住所入力</a><br />
                    <?php $this->assign('key', 'order_pref'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <select class="top" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <option value="" selected="">都道府県を選択</option>
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrPref'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select><br />
                    <?php $this->assign('key', 'order_addr01'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="60" class="box60 top" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" /><br />
                    <?php $this->assign('key', 'order_addr02'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="60" class="box60" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" />
                </td>
            </tr>
            <tr>
                <th>備考</th>
                <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['message']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
            </tr>
            <tr>
                <th>現在ポイント</th>
                <td>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['customer_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['customer_point']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>

                        pt
                    <?php else: ?>
                        (非会員)
                <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>端末種別</th>
                <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrDeviceType'][$this->_tpl_vars['arrForm']['device_type_id']['value']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
            </tr>

        </table>
        <!--▲お客様情報ここまで-->

        <!--▼受注商品情報ここから-->
        <a name="order_products"></a>
        <h2 id="order_products">
            受注商品情報
            <a class="btn-normal" href="javascript:;" name="recalculate" onclick="eccube.setModeAndSubmit('recalculate','anchor_key','order_products');">計算結果の確認</a>
            <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_shipping_quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) <= 1): ?>
                <a class="btn-normal" href="javascript:;" name="add_product" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
order/product_select.php?order_id=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&amp;shipping_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['top_shipping_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', 'search', '615', '500', {menubar:'no'}); return false;">商品の追加</a>
            <?php endif; ?>
        </h2>

        <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <span class="attention">※ 商品が選択されていません。</span>
        <?php endif; ?>

        <table class="list order-edit-products">
            <tr>
                <th class="id">商品コード</th>
                <th class="name">商品名/規格1/規格2</th>
                <th class="price">単価</th>
                <th class="qty">数量</th>
                <th class="price">税込み価格</th>
                <th class="price">小計</th>
            </tr>
            <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrForm']['quantity']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
$this->_sections['cnt']['start'] = $this->_sections['cnt']['step'] > 0 ? 0 : $this->_sections['cnt']['loop']-1;
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = $this->_sections['cnt']['loop'];
    if ($this->_sections['cnt']['total'] == 0)
        $this->_sections['cnt']['show'] = false;
} else
    $this->_sections['cnt']['total'] = 0;
if ($this->_sections['cnt']['show']):

            for ($this->_sections['cnt']['index'] = $this->_sections['cnt']['start'], $this->_sections['cnt']['iteration'] = 1;
                 $this->_sections['cnt']['iteration'] <= $this->_sections['cnt']['total'];
                 $this->_sections['cnt']['index'] += $this->_sections['cnt']['step'], $this->_sections['cnt']['iteration']++):
$this->_sections['cnt']['rownum'] = $this->_sections['cnt']['iteration'];
$this->_sections['cnt']['index_prev'] = $this->_sections['cnt']['index'] - $this->_sections['cnt']['step'];
$this->_sections['cnt']['index_next'] = $this->_sections['cnt']['index'] + $this->_sections['cnt']['step'];
$this->_sections['cnt']['first']      = ($this->_sections['cnt']['iteration'] == 1);
$this->_sections['cnt']['last']       = ($this->_sections['cnt']['iteration'] == $this->_sections['cnt']['total']);
?>
            <?php $this->assign('product_index', ($this->_sections['cnt']['index'])); ?>
                <tr>
                    <td class="center">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['product_code']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                        <input type="hidden" name="product_code[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['product_code']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="product_code_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                    </td>
                    <td class="center">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['product_name']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
/<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['classcategory_name1']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "(なし)") : smarty_modifier_default($_tmp, "(なし)")))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
/<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['classcategory_name2']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "(なし)") : smarty_modifier_default($_tmp, "(なし)")))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                        <input type="hidden" name="product_name[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['product_name']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="product_name_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                        <input type="hidden" name="classcategory_name1[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['classcategory_name1']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="classcategory_name1_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                        <input type="hidden" name="classcategory_name2[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['classcategory_name2']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="classcategory_name2_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                        <br />
                        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_shipping_quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) <= 1): ?>
                            <a class="btn-normal" href="javascript:;" name="change" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
order/product_select.php?no=<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
&amp;order_id=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&amp;shipping_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['top_shipping_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', 'search', '615', '500', {menubar:'no'}); return false;">変更</a>
                            <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrForm']['quantity']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 1): ?>
                                <a class="btn-normal" href="javascript:;" name="delete" onclick="eccube.setValue('delete_no', <?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
, 'form1'); eccube.setValue('select_shipping_id', '<?php echo ((is_array($_tmp=$this->_tpl_vars['top_shipping_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', 'form1'); eccube.setModeAndSubmit('delete_product','anchor_key','order_products'); return false;">削除</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <input type="hidden" name="product_type_id[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['product_type_id']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="product_type_id_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                    <input type="hidden" name="product_id[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['product_id']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="product_id_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                    <input type="hidden" name="product_class_id[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['product_class_id']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="product_class_id_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                    <input type="hidden" name="point_rate[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['point_rate']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="point_rate_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                    </td>
                    <td class="center">
                        <?php $this->assign('key', 'price'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="6" class="box6" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" /> 円
                    </td>
                    <td class="center">
                        <?php $this->assign('key', 'quantity'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="3" class="box3" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"  onChange="quantityCopyForSingleShipping('<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
')" />
                    </td>
                    <?php $this->assign('price', ($this->_tpl_vars['arrForm']['price']['value'][$this->_tpl_vars['product_index']])); ?>
                    <?php $this->assign('quantity', ($this->_tpl_vars['arrForm']['quantity']['value'][$this->_tpl_vars['product_index']])); ?>
                    <?php $this->assign('tax_rate', ($this->_tpl_vars['arrForm']['tax_rate']['value'][$this->_tpl_vars['product_index']])); ?>
                    <?php $this->assign('tax_rule', ($this->_tpl_vars['arrForm']['tax_rule']['value'][$this->_tpl_vars['product_index']])); ?>
                    <input type="hidden" name="tax_rule[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['tax_rule']['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="tax_rule_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
    
                    <td class="right">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['price'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfCalcIncTax', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['tax_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Helper_DB_Ex::sfCalcIncTax($_tmp, ((is_array($_tmp=$this->_tpl_vars['tax_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
 円<br />
                        <?php $this->assign('key', 'tax_rate'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        税率<input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="3" class="box3" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['product_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['product_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />%
                    </td>
                    <td class="right"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['price'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfCalcIncTax', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['tax_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Helper_DB_Ex::sfCalcIncTax($_tmp, ((is_array($_tmp=$this->_tpl_vars['tax_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('sfMultiply', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Utils_Ex::sfMultiply($_tmp, ((is_array($_tmp=$this->_tpl_vars['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</td>
                </tr>
            <?php endfor; endif; ?>
            <tr>
                <th colspan="5" class="column right">小計</th>
                <td class="right"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['subtotal']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</td>
            </tr>
            <tr>
                <th colspan="5" class="column right">値引き</th>
                <td class="right">
                    <?php $this->assign('key', 'discount'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="5" class="box6" />
                    円
                </td>
            </tr>
            <tr>
                <th colspan="5" class="column right">送料</th>
                <td class="right">
                    <?php $this->assign('key', 'deliv_fee'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="5" class="box6" />
                    円
                </td>
            </tr>
            <tr>
                <th colspan="5" class="column right">手数料</th>
                <td class="right">
                    <?php $this->assign('key', 'charge'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="5" class="box6" />
                    円
                </td>
            </tr>
            <tr>
                <th colspan="5" class="column right">合計</th>
                <td class="right">
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['total'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['total']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
 円
                </td>
            </tr>
            <tr>
                <th colspan="5" class="column right">お支払い合計</th>
                <td class="right">
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['payment_total'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['payment_total']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>

                    円
                </td>
            </tr>
            <?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                <tr>
                    <th colspan="5" class="column right">使用ポイント</th>
                    <td class="right">
                        <?php $this->assign('key', 'use_point'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="5" class="box6" />
                        pt
                    </td>
                </tr>
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['birth_point']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                    <tr>
                        <th colspan="5" class="column right">お誕生日ポイント</th>
                        <td class="right">
                            <?php $this->assign('key', 'birth_point'); ?>
                            <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"/>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['birth_point']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>

                            pt
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th colspan="5" class="column right">加算ポイント</th>
                    <td class="right">
                        <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['add_point']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>

                        pt
                    </td>
                </tr>
            <?php endif; ?>
        </table>
        <!--▼お届け先情報ここから-->
        <a name="shipping"></a>
        <h2>お届け先情報
            <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_shipping_quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) <= 1): ?>
                <a class="btn-normal" href="javascript:;" onclick="fnCopyFromOrderData();">お客様情報へお届けする</a>
            <?php endif; ?>
            <?php if (((is_array($_tmp=@USE_MULTIPLE_SHIPPING)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                <a class="btn-normal" href="javascript:;"  onclick="fnAppendShipping();">お届け先を新規追加</a>
                <a class="btn-normal" href="javascript:;" onclick="fnMultiple();">複数のお届け先を指定する</a>
            <?php endif; ?>
        </h2>

        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrAllShipping'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['shipping'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipping']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shipping_index'] => $this->_tpl_vars['arrShipping']):
        $this->_foreach['shipping']['iteration']++;
?>
            <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_shipping_quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 1): ?>
                <h3>お届け先<?php echo ((is_array($_tmp=$this->_foreach['shipping']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</h3>
            <?php endif; ?>
            <?php $this->assign('key', 'shipping_id'); ?>
            <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_shipping_quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 1): ?>
                <h2>届け先商品情報&nbsp;<a class="btn-normal" href="javascript:;" name="add_product" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
order/product_select.php?order_id=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&shipping_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', 'search', '615', '500', {menubar:'no'}); return false;">商品の追加</a>
                </h2>

                <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrShipping']['shipment_product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
                    <table class="list order-edit-products">
                        <tr>
                            <th class="id">商品コード</th>
                            <th class="name">商品名/規格1/規格2</th>
                            <th class="price">単価</th>
                            <th class="qty">数量</th>
                        </tr>
                        <?php unset($this->_sections['item']);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['loop'] = is_array($_loop=count(((is_array($_tmp=$this->_tpl_vars['arrShipping']['shipment_product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['item']['show'] = true;
$this->_sections['item']['max'] = $this->_sections['item']['loop'];
$this->_sections['item']['step'] = 1;
$this->_sections['item']['start'] = $this->_sections['item']['step'] > 0 ? 0 : $this->_sections['item']['loop']-1;
if ($this->_sections['item']['show']) {
    $this->_sections['item']['total'] = $this->_sections['item']['loop'];
    if ($this->_sections['item']['total'] == 0)
        $this->_sections['item']['show'] = false;
} else
    $this->_sections['item']['total'] = 0;
if ($this->_sections['item']['show']):

            for ($this->_sections['item']['index'] = $this->_sections['item']['start'], $this->_sections['item']['iteration'] = 1;
                 $this->_sections['item']['iteration'] <= $this->_sections['item']['total'];
                 $this->_sections['item']['index'] += $this->_sections['item']['step'], $this->_sections['item']['iteration']++):
$this->_sections['item']['rownum'] = $this->_sections['item']['iteration'];
$this->_sections['item']['index_prev'] = $this->_sections['item']['index'] - $this->_sections['item']['step'];
$this->_sections['item']['index_next'] = $this->_sections['item']['index'] + $this->_sections['item']['step'];
$this->_sections['item']['first']      = ($this->_sections['item']['iteration'] == 1);
$this->_sections['item']['last']       = ($this->_sections['item']['iteration'] == $this->_sections['item']['total']);
?>
                            <?php $this->assign('item_index', ($this->_sections['item']['index'])); ?>

                            <tr>
                                <td class="center">
                                    <?php $this->assign('key', 'shipment_product_class_id'); ?>
                                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                                    <?php $this->assign('key', 'shipment_product_code'); ?>
                                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                                </td>
                                <td class="center">
                                    <?php $this->assign('key1', 'shipment_product_name'); ?>
                                    <?php $this->assign('key2', 'shipment_classcategory_name1'); ?>
                                    <?php $this->assign('key3', 'shipment_classcategory_name2'); ?>
                                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key2']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key3'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key3']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
/<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key2']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "(なし)") : smarty_modifier_default($_tmp, "(なし)")))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
/<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key3']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "(なし)") : smarty_modifier_default($_tmp, "(なし)")))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                                    <br />
                                    <a class="btn-normal" href="javascript:;" name="change" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
order/product_select.php?no=<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
&amp;order_id=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_id']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&amp;shipping_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', 'search', '615', '500', {menubar:'no'}); return false;">変更</a>
                                    <?php if (count(((is_array($_tmp=$this->_tpl_vars['arrShipping']['shipment_product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) > 1): ?>
                                    <a class="btn-normal" href="javascript:;" name="delete" onclick="eccube.setValue('delete_no', <?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
, 'form1'); eccube.setValue('select_shipping_id', <?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
, 'form1'); eccube.setModeAndSubmit('delete_product','anchor_key','order_products'); return false;">削除</a>
                                    <?php endif; ?>
                                </td>
                                <td class="right">
                                    <?php $this->assign('key', 'shipment_price'); ?>
                                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円
                                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                                </td>
                                <td class="center">
                                    <?php $this->assign('key', 'shipment_quantity'); ?>
                                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['shipping_index']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="3" class="box3" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                                </td>
                            </tr>
                        <?php endfor; endif; ?>
                    </table>
                <?php endif; ?>
            <?php else: ?>
                <!-- 配送先が１つでも、shipment_itemを更新するために必要 -->

                <?php unset($this->_sections['item']);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['loop'] = is_array($_loop=count(((is_array($_tmp=$this->_tpl_vars['arrShipping']['shipment_product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['item']['show'] = true;
$this->_sections['item']['max'] = $this->_sections['item']['loop'];
$this->_sections['item']['step'] = 1;
$this->_sections['item']['start'] = $this->_sections['item']['step'] > 0 ? 0 : $this->_sections['item']['loop']-1;
if ($this->_sections['item']['show']) {
    $this->_sections['item']['total'] = $this->_sections['item']['loop'];
    if ($this->_sections['item']['total'] == 0)
        $this->_sections['item']['show'] = false;
} else
    $this->_sections['item']['total'] = 0;
if ($this->_sections['item']['show']):

            for ($this->_sections['item']['index'] = $this->_sections['item']['start'], $this->_sections['item']['iteration'] = 1;
                 $this->_sections['item']['iteration'] <= $this->_sections['item']['total'];
                 $this->_sections['item']['index'] += $this->_sections['item']['step'], $this->_sections['item']['iteration']++):
$this->_sections['item']['rownum'] = $this->_sections['item']['iteration'];
$this->_sections['item']['index_prev'] = $this->_sections['item']['index'] - $this->_sections['item']['step'];
$this->_sections['item']['index_next'] = $this->_sections['item']['index'] + $this->_sections['item']['step'];
$this->_sections['item']['first']      = ($this->_sections['item']['iteration'] == 1);
$this->_sections['item']['last']       = ($this->_sections['item']['iteration'] == $this->_sections['item']['total']);
?>
                    <?php $this->assign('item_index', ($this->_sections['item']['index'])); ?>
                    <?php $this->assign('key', 'shipment_product_class_id'); ?>
                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                    <?php $this->assign('key', 'shipment_product_code'); ?>
                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                    <?php $this->assign('key1', 'shipment_product_name'); ?>
                    <?php $this->assign('key2', 'shipment_classcategory_name1'); ?>
                    <?php $this->assign('key3', 'shipment_classcategory_name2'); ?>
                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key2']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key3'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key3']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                    <?php $this->assign('key', 'shipment_price'); ?>
                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                    <?php $this->assign('key', 'shipment_quantity'); ?>
                    <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
][<?php echo ((is_array($_tmp=$this->_tpl_vars['item_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']][$this->_tpl_vars['item_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
                <?php endfor; endif; ?>
            <?php endif; ?>

            <table class="form">
                <tr>
                    <th>お名前</th>
                    <td>
                        <?php $this->assign('key1', 'shipping_name01'); ?>
                        <?php $this->assign('key2', 'shipping_name02'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="15" class="box15" />
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="15" class="box15" />
                    </td>
                </tr>
                <tr>
                    <th>お名前(フリガナ)</th>
                    <td>
                        <?php $this->assign('key1', 'shipping_kana01'); ?>
                        <?php $this->assign('key2', 'shipping_kana02'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="15" class="box15" />
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="15" class="box15" />
                    </td>
                </tr>
                <tr>
                    <th>会社名</th>
                    <td>
                        <?php $this->assign('key1', 'shipping_company_name'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="30" class="box30" />
                    </td>
                </tr>
                <tr>
                    <th>TEL</th>
                    <td>
                        <?php $this->assign('key1', 'shipping_tel01'); ?>
                        <?php $this->assign('key2', 'shipping_tel02'); ?>
                        <?php $this->assign('key3', 'shipping_tel03'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" /> -
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" /> -
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key3'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key3']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key3']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                    </td>
                </tr>
                <tr>
                    <th>FAX</th>
                    <td>
                        <?php $this->assign('key1', 'shipping_fax01'); ?>
                        <?php $this->assign('key2', 'shipping_fax02'); ?>
                        <?php $this->assign('key3', 'shipping_fax03'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" /> -
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" /> -
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key3'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key3']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key3']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                    </td>
                </tr>
                <?php $this->assign('key1', 'shipping_country_id'); ?>
                <?php $this->assign('key2', 'shipping_zipcode'); ?>
                <?php if (! ((is_array($_tmp=@FORM_COUNTRY_ENABLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=@DEFAULT_COUNTRY_ID)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                <?php else: ?>
                <tr>
                    <th>国</th>
                    <td>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                                <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrCountry'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, ((is_array($_tmp=@DEFAULT_COUNTRY_ID)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : smarty_modifier_default($_tmp, ((is_array($_tmp=@DEFAULT_COUNTRY_ID)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <th>ZIP CODE</th>
                    <td>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
;" size="15" class="box15"/>
                    </td>
                </tr>
                <?php endif; ?>
                <tr>
                    <th>住所</th>
                    <td>
                        <?php $this->assign('key1', 'shipping_zip01'); ?>
                        <?php $this->assign('key2', 'shipping_zip02'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        〒
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                        -
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                        <a class="btn-normal" href="javascript:;" name="address_input" onclick="eccube.getAddress('<?php echo ((is_array($_tmp=@INPUT_ZIP_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', 'shipping_zip01[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]', 'shipping_zip02[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]', 'shipping_pref[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]', 'shipping_addr01[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]'); return false;">住所入力</a><br />
                        <?php $this->assign('key', 'shipping_pref'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <select class="top" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                            <option value="" selected="">都道府県を選択</option>
                            <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrPref'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                        </select><br />
                        <?php $this->assign('key', 'shipping_addr01'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="60" class="box60 top" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" /><br />
                        <?php $this->assign('key', 'shipping_addr02'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="60" class="box60" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" />
                    </td>
                </tr>
                <tr>
                    <th>お届け時間</th>
                    <td>
                        <?php $this->assign('key', 'time_id'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                            <option value="">指定無し</option>
                            <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrDelivTime'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <th>お届け日</th>
                    <td>
                        <?php $this->assign('key1', 'shipping_date_year'); ?>
                        <?php $this->assign('key2', 'shipping_date_month'); ?>
                        <?php $this->assign('key3', 'shipping_date_day'); ?>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                            <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrYearShippingDate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))), $this);?>

                        </select>年
                        <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                            <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrMonthShippingDate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))), $this);?>

                        </select>月
                        <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key3'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
[<?php echo ((is_array($_tmp=$this->_tpl_vars['shipping_index'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
]" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key3']][$this->_tpl_vars['shipping_index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                            <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrDayShippingDate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrShipping'][$this->_tpl_vars['key3']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))), $this);?>

                        </select>日
                    </td>
                </tr>

            </table>
        <?php endforeach; endif; unset($_from); ?>
        <!--▲お届け先情報ここまで-->

        <a name="deliv"></a>
        <table class="form">
            <tr>
                <th>配送業者<span class="attention"> *</span><br /><span class="attention">(配送業者の変更に伴う送料の変更は手動にてお願いします。)</span></th>
                <td>
                    <?php $this->assign('key', 'deliv_id'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" onchange="eccube.setModeAndSubmit('deliv','anchor_key','deliv');">
                        <option value="" selected="">選択してください</option>
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrDeliv'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>
                </td>
            </tr>
            <tr>
                <th>お支払方法<span class="attention"> *</span><br /><span class="attention">(お支払方法の変更に伴う手数料の変更は手動にてお願いします。)</span></th>
                <td>
                    <?php $this->assign('key', 'payment_id'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" onchange="eccube.setModeAndSubmit('payment','anchor_key','deliv');">
                        <option value="" selected="">選択してください</option>
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrPayment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>
                </td>
            </tr>

            <?php if (count(((is_array($_tmp=$this->_tpl_vars['arrForm']['payment_info'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) > 0): ?>
            <tr>
                <th><?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['payment_type'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
情報</th>
                <td>
                    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrForm']['payment_info'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != 'title'): ?><?php if (((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br/><?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </td>
            </tr>
            <?php endif; ?>

            <tr>
                <th>メモ</th>
                <td>
                    <?php $this->assign('key', 'note'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <textarea name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" cols="80" rows="6" class="area80" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" ><?php echo "\n"; ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</textarea>
                </td>
            </tr>
        </table>
        <!--▲受注商品情報ここまで-->

        <div class="btn-area">
            <ul>
                <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrSearchHidden'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
                <li><a class="btn-action" href="javascript:;" onclick="eccube.changeAction('<?php echo ((is_array($_tmp=@ADMIN_ORDER_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); eccube.setModeAndSubmit('search','',''); return false;"><span class="btn-prev">検索画面に戻る</span></a></li>
                <?php endif; ?>
                <li><a class="btn-action" href="javascript:;" onclick="return fnFormConfirm(); return false;"><span class="btn-next">この内容で登録する</span></a></li>
            </ul>
        </div>
    </div>
    <div id="multiple"></div>
</form>