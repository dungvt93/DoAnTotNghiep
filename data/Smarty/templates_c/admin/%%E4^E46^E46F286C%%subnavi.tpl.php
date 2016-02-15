<?php /* Smarty version 2.6.27, created on 2016-01-09 19:27:12
         compiled from C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/admin/order/subnavi.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/admin/order/subnavi.tpl', 26, false),)), $this); ?>

<ul class="level1">
    <li id="navi-order-index" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_mainno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'order' && ((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'index'): ?>on<?php endif; ?>"><a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
order/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><span>受注管理</span></a></li>
    <li id="navi-order-add" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_mainno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'order' && ((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'add'): ?>on<?php endif; ?>"><a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
order/edit.php?mode=add&amp;<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
=<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><span>受注登録</span></a></li>
    <li id="navi-order-status"
        class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_mainno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'order' && ((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'status'): ?>on<?php endif; ?>"
    ><a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
order/status.php"><span>対応状況管理</span></a></li>
</ul>