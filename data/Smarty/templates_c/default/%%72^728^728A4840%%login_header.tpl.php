<?php /* Smarty version 2.6.27, created on 2016-01-09 19:27:16
         compiled from C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/frontparts/bloc/login_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/frontparts/bloc/login_header.tpl', 1, false),array('modifier', 'h', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/frontparts/bloc/login_header.tpl', 47, false),array('modifier', 'n2s', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/frontparts/bloc/login_header.tpl', 53, false),array('modifier', 'default', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/frontparts/bloc/login_header.tpl', 53, false),array('modifier', 'sfGetChecked', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/frontparts/bloc/login_header.tpl', 65, false),)), $this); ?>
<?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
<script type="text/javascript">//<![CDATA[
    $(function(){
        var $login_email = $('#header_login_area input[name=login_email]');

        if (!$login_email.val()) {
            $login_email
                .val('メールアドレス')
                .css('color', '#AAA');
        }

        $login_email
            .focus(function() {
                if ($(this).val() == 'メールアドレス') {
                    $(this)
                        .val('')
                        .css('color', '#000');
                }
            })
            .blur(function() {
                if (!$(this).val()) {
                    $(this)
                        .val('メールアドレス')
                        .css('color', '#AAA');
                }
            });

        $('#header_login_form').submit(function() {
            if (!$login_email.val()
                || $login_email.val() == 'メールアドレス') {
                if ($('#header_login_area input[name=login_pass]').val()) {
                    alert('メールアドレス/パスワードを入力して下さい。');
                }
                return false;
            }
            return true;
        });
    });
//]]></script>
<?php endif; ?>
<?php echo '<div class="block_outer"><div id="header_login_area" class="clearfix"><form name="header_login_form" id="header_login_form" method="post" action="'; ?><?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'frontparts/login_check.php"'; ?><?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ' onsubmit="return eccube.checkLoginFormInputted(\'header_login_form\')"'; ?><?php endif; ?><?php echo '><input type="hidden" name="mode" value="login" /><input type="hidden" name="'; ?><?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" value="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" /><input type="hidden" name="url" value="'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$_SERVER['REQUEST_URI'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo '" /><div class="block_body clearfix">'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<p class="btn">ようこそ <span class="user_name">'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo ' '; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo ' 様</span>'; ?><?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?><?php echo '/ 所持ポイント: <span class="point"> '; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_user_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?><?php echo ' pt</span>&nbsp;&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php if (! ((is_array($_tmp=$this->_tpl_vars['tpl_disable_logout'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<input type="image" class="hover_change_image" src="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'img/common/btn_header_logout.jpg" onclick="eccube.fnFormModeSubmit(\'header_login_form\', \'logout\', \'\', \'\'); return false;" alt="ログアウト" />'; ?><?php endif; ?><?php echo '</p>'; ?><?php else: ?><?php echo '<ul class="formlist clearfix"><li class="mail"><input type="text" class="box150" name="login_email" value="'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_login_email'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo '" style="ime-mode: disabled;" title="メールアドレスを入力して下さい" /></li><li class="login_memory"><input type="checkbox" name="login_memory" id="header_login_memory" value="1" '; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_login_memory'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetChecked', true, $_tmp, 1) : SC_Utils_Ex::sfGetChecked($_tmp, 1)); ?><?php echo ' /><label for="header_login_memory"><span>記憶</span></label></li><li class="password"><input type="password" class="box100" name="login_pass" title="パスワードを入力して下さい" /></li><li class="btn"><input type="image" class="hover_change_image" src="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'img/common/btn_header_login.jpg" /></li><li class="forgot"><a href="'; ?><?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'forgot/'; ?><?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" onclick="eccube.openWindow(\''; ?><?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'forgot/'; ?><?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '\',\'forget\',\'600\',\'400\',{scrollbars:\'no\',resizable:\'no\'}); return false;" target="_blank">パスワードを忘れた方</a></li></ul>'; ?><?php endif; ?><?php echo '</div></form></div></div>'; ?>
