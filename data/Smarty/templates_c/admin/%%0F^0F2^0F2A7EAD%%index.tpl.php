<?php /* Smarty version 2.6.27, created on 2016-01-11 22:45:01
         compiled from order/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'order/index.tpl', 117, false),array('modifier', 'h', 'order/index.tpl', 129, false),array('modifier', 'sfGetErrorColor', 'order/index.tpl', 129, false),array('modifier', 'sfDispDBDate', 'order/index.tpl', 383, false),array('modifier', 'n2s', 'order/index.tpl', 387, false),array('modifier', 'default', 'order/index.tpl', 388, false),array('modifier', 'strlen', 'order/index.tpl', 396, false),array('function', 'html_options', 'order/index.tpl', 139, false),array('function', 'html_checkboxes', 'order/index.tpl', 207, false),)), $this); ?>

<script type="text/javascript">
<!--
    function fnSelectCheckSubmit(action){

        var fm = document.form1;

        if (!fm["pdf_order_id[]"]) {
            return false;
        }

        var checkflag = false;
        var max = fm["pdf_order_id[]"].length;

        if (max) {
            for (var i=0; i<max; i++) {
                if(fm["pdf_order_id[]"][i].checked == true){
                    checkflag = true;
                }
            }
        } else {
            if(fm["pdf_order_id[]"].checked == true) {
                checkflag = true;
            }
        }

        if(!checkflag){
            alert('チェックボックスが選択されていません');
            return false;
        }

        fnOpenPdfSettingPage(action);
    }

    function fnOpenPdfSettingPage(action){
        var fm = document.form1;
        eccube.openWindow("about:blank", "pdf_input", "620","650");

        // 退避
        tmpTarget = fm.target;
        tmpMode = fm.mode.value;
        tmpAction = fm.action;

        fm.target = "pdf_input";
        fm.mode.value = 'pdf';
        fm.action = action;
        fm.submit();

        // 復元
        fm.target = tmpTarget;
        fm.mode.value = tmpMode;
        fm.action = tmpAction;
    }


    function fnSelectMailCheckSubmit(action){

        var fm = document.form1;

        if (!fm["mail_order_id[]"]) {
            return false;
        }

        var checkflag = false;
        var max = fm["mail_order_id[]"].length;

        if (max) {
            for (var i=0; i<max; i++) {
                if(fm["mail_order_id[]"][i].checked == true){
                    checkflag = true;
                }
            }
        } else {
            if(fm["mail_order_id[]"].checked == true) {
                checkflag = true;
            }
        }

        if(!checkflag){
            alert('チェックボックスが選択されていません');
            return false;
        }

        fm.mode.value="mail_select";
        fm.action=action;
        fm.submit();
    }


//-->
</script>
<div id="order" class="contents-main">
    <form name="search_form" id="search_form" method="post" action="?">
        <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
        <input type="hidden" name="mode" value="search" />
        <h2>検索条件設定</h2>
                <table>
            <tr>
                <th>注文番号</th>
                <td>
                    <?php $this->assign('key1', 'search_order_id1'); ?>
                    <?php $this->assign('key2', 'search_order_id2'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                    ～
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                </td>
                <th>対応状況</th>
                <td>
                    <?php $this->assign('key', 'search_order_status'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">選択してください</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrORDERSTATUS'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>
                </td>
            </tr>
            <tr>
                <th>お名前</th>
                <td>
                <?php $this->assign('key', 'search_order_name'); ?>
                <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="30" class="box30" />
                </td>
                <th>お名前(フリガナ)</th>
                <td>
                <?php $this->assign('key', 'search_order_kana'); ?>
                <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="30" class="box30" />
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    <?php $this->assign('key', 'search_order_email'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="30" class="box30" />
                </td>
                <th>TEL</th>
                <td>
                    <?php $this->assign('key', 'search_order_tel'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="30" class="box30" />
                </td>
            </tr>
            <tr>
                <th>生年月日</th>
                <td colspan="3">
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['search_sbirthyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['search_ebirthyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <select name="search_sbirthyear" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_sbirthyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">----</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrBirthYear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_sbirthyear']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>年
                    <select name="search_sbirthmonth" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_sbirthyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">--</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrMonth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_sbirthmonth']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>月
                    <select name="search_sbirthday" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_sbirthyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">--</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrDay'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_sbirthday']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>日～
                    <select name="search_ebirthyear" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_ebirthyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">----</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrBirthYear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_ebirthyear']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>年
                    <select name="search_ebirthmonth" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_ebirthyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">--</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrMonth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_ebirthmonth']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>月
                    <select name="search_ebirthday" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_ebirthyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">--</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrDay'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_ebirthday']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>日
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td colspan="3">
                <?php $this->assign('key', 'search_order_sex'); ?>
                <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                <?php echo smarty_function_html_checkboxes(array('name' => ($this->_tpl_vars['key']),'options' => ((is_array($_tmp=$this->_tpl_vars['arrSex'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                </td>
            </tr>
            <tr>
                <th>支払方法</th>
                <td colspan="3">
                <?php $this->assign('key', 'search_payment_id'); ?>
                <span class="attention"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span>
                <?php echo smarty_function_html_checkboxes(array('name' => ($this->_tpl_vars['key']),'options' => ((is_array($_tmp=$this->_tpl_vars['arrPayments'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                </td>
            </tr>
            <tr>
                <th>受注日</th>
                <td colspan="3">
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['search_sorderyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['search_sorderyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['search_eorderyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['search_eorderyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
                    <select name="search_sorderyear" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_sorderyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">----</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrRegistYear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_sorderyear']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>年
                    <select name="search_sordermonth" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_sorderyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">--</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrMonth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_sordermonth']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>月
                    <select name="search_sorderday" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_sorderyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">--</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrDay'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_sorderday']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>日～
                    <select name="search_eorderyear" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_eorderyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">----</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrRegistYear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_eorderyear']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>年
                    <select name="search_eordermonth" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_eorderyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">--</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrMonth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_eordermonth']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>月
                    <select name="search_eorderday" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_eorderyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                    <option value="">--</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrDay'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_eorderday']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>日
                </td>
            </tr>
            <tr>
                <th>更新日</th>
                <td colspan="3">
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['search_supdateyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['search_supdateyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['search_eupdateyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['search_eupdateyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
                    <select name="search_supdateyear" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_supdateyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <option value="">----</option>
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrRegistYear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_supdateyear']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>年
                    <select name="search_supdatemonth" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_supdateyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <option value="">--</option>
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrMonth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_supdatemonth']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>月
                    <select name="search_supdateday" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_supdateyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <option value="">--</option>
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrDay'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_supdateday']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>日～
                    <select name="search_eupdateyear" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_eupdateyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <option value="">----</option>
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrRegistYear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_eupdateyear']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>年
                    <select name="search_eupdatemonth" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_eupdateyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <option value="">--</option>
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrMonth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_eupdatemonth']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>月
                    <select name="search_eupdateday" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['search_eupdateyear'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                        <option value="">--</option>
                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrDay'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['search_eupdateday']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                    </select>日
                </td>
            </tr>
            <tr>
                <th>購入金額</th>
                <td>
                    <?php $this->assign('key1', 'search_total1'); ?>
                    <?php $this->assign('key2', 'search_total2'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key1']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                    円 ～
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key2']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box6" />
                    円
                </td>
                <th>購入商品名</th>
                <td>
                    <?php $this->assign('key', 'search_product_name'); ?>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><?php endif; ?>
                    <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" size="6" class="box30" />
                </td>
            </tr>
        </table>

        <div class="btn">
            <p class="page_rows">検索結果表示件数
            <?php $this->assign('key', 'search_page_max'); ?>
            <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
            <select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['keyname'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
            <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrPageMax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

            </select> 件</p>
            <div class="btn-area">
                <ul>
                    <li><a class="btn-action" href="javascript:;" onclick="eccube.fnFormModeSubmit('search_form', 'search', '', ''); return false;"><span class="btn-next">この条件で検索する</span></a></li>
                </ul>
            </div>
        </div>
        <!--検索条件設定テーブルここまで-->
    </form>

    <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrErr'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) == 0 && ( ((is_array($_tmp=$_POST['mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'search' || ((is_array($_tmp=$_POST['mode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'delete' )): ?>

        <!--★★検索結果一覧★★-->
        <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <input type="hidden" name="mode" value="search" />
            <input type="hidden" name="order_id" value="" />
            <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrHidden'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
            <h2>検索結果一覧</h2>
                <div class="btn">
                <span class="attention"><!--検索結果数--><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_linemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
件</span>&nbsp;が該当しました。
                <?php if (((is_array($_tmp=@ADMIN_MODE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '1'): ?>
                <a class="btn-normal" href="javascript:;" onclick="eccube.setModeAndSubmit('delete_all','',''); return false;"><span>検索結果を全て削除</span></a>
                <?php endif; ?>
                <a class="btn-normal" href="javascript:;" onclick="eccube.setModeAndSubmit('csv','',''); return false;">CSV ダウンロード</a>
                <a class="btn-normal" href="../contents/csv.php?tpl_subno_csv=order">CSV 出力項目設定</a>
                <a class="btn-normal" href="javascript:;" onclick="fnSelectCheckSubmit('pdf.php'); return false;"><span>PDF一括出力</span></a>
                <a class="btn-normal" href="javascript:;" onclick="fnSelectMailCheckSubmit('mail.php'); return false;"><span>メール一括通知</span></a>
            </div>
            <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrResults'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>

                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_pager'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                                <table class="list">
                    <col width="10%" />
                    <col width="8%" />
                    <col width="15%" />
                    <col width="8%" />
                    <col width="10%" />
                    <col width="10%" />
                    <col width="10%" />
                    <col width="10%" />
                    <col width="5%" />
                    <col width="9%" />
                    <col width="5%" />
                                        <?php $this->assign('path', (@MODULE_REALDIR)."mdl_paygent/paygent_order_index.tpl"); ?>
                    <?php if (file_exists ( ((is_array($_tmp=$this->_tpl_vars['path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php else: ?>
                        <tr>
                            <th>受注日</th>
                            <th>注文番号</th>
                            <th>お名前</th>
                            <th>支払方法</th>
                            <th>購入金額(円)</th>
                            <th>全商品発送日</th>
                            <th>対応状況</th>
                            <th><label for="pdf_check">帳票</label> <input type="checkbox" name="pdf_check" id="pdf_check" onclick="eccube.checkAllBox(this, 'input[name=\'pdf_order_id[]\']')" /></th>
                            <th>編集</th>
                            <th>メール <input type="checkbox" name="mail_check" id="mail_check" onclick="eccube.checkAllBox(this, 'input[name=\'mail_order_id[]\']')" /></th>
                            <th>削除</th>
                        </tr>

                        <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrResults'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <?php $this->assign('status', ($this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['status'])); ?>
                            <tr style="background:<?php echo ((is_array($_tmp=$this->_tpl_vars['arrORDERSTATUS_COLOR'][$this->_tpl_vars['status']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
;">
                                <td class="center"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['create_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)); ?>
</td>
                                <td class="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                                <td class="center"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                                <td class="center"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['payment_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                                <td class="right"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['total'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
</td>
                                <td class="center"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['commit_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "未発送") : smarty_modifier_default($_tmp, "未発送")); ?>
</td>
                                <td class="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrORDERSTATUS'][$this->_tpl_vars['status']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                                <td class="center">
                                    <input type="checkbox" name="pdf_order_id[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" id="pdf_order_id_<?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"/><label for="pdf_order_id_<?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">一括出力</label><br />
                                    <a href="./" onClick="eccube.openWindow('pdf.php?order_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
','pdf_input','620','650'); return false;"><span class="icon_class">個別出力</span></a>
                                </td>
                                <td class="center"><a href="?" onclick="eccube.changeAction('<?php echo ((is_array($_tmp=@ADMIN_ORDER_EDIT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); eccube.setModeAndSubmit('pre_edit', 'order_id', '<?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false;"><span class="icon_edit">編集</span></a></td>
                                <td class="center">
                                    <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_email'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                                        <input type="checkbox" name="mail_order_id[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" id="mail_order_id_<?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"/><label for="mail_order_id_<?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">一括通知</label><br />
                                        <a href="?" onclick="eccube.changeAction('<?php echo ((is_array($_tmp=@ADMIN_ORDER_MAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); eccube.setModeAndSubmit('pre_edit', 'order_id', '<?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false;"><span class="icon_mail">個別通知</span></a>
                                    <?php endif; ?>
                                </td>
                                <td class="center"><a href="?" onclick="eccube.setModeAndSubmit('delete', 'order_id', <?php echo ((is_array($_tmp=$this->_tpl_vars['arrResults'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
); return false;"><span class="icon_delete">削除</span></a></td>
                            </tr>
                        <?php endfor; endif; ?>
                    <?php endif; ?>
                </table>
                
            <?php endif; ?>

        </form>
    <?php endif; ?>
</div>