<?php /* Smarty version 2.6.27, created on 2016-01-09 19:27:12
         compiled from C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/admin/ownersstore/subnavi.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/admin/ownersstore/subnavi.tpl', 29, false),)), $this); ?>

<ul class="level1">
    <li class="on_level2">
        <div><span>プラグイン管理</span></div>
        <ul class="level2">
            <li id="navi-ownersstore-index" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'index'): ?>on<?php endif; ?>">
                <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
ownersstore/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><span>プラグイン管理</span></a></li>
            <li id="navi-ownersstore-plugin-hookpoint-list" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'plugin-hookpoint-list'): ?>on<?php endif; ?>">
                <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
ownersstore/plugin_hookpoint_list.php"><span>フックポイント管理</span></a></li>            
        </ul>
    </li>
    <li id="navi-ownersstore-module" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'module'): ?>on<?php endif; ?>">
        <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
ownersstore/module.php"><span>モジュール管理</span></a></li>
    <li id="navi-ownersstore-settings" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'settings'): ?>on<?php endif; ?>">
        <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
ownersstore/settings.php"><span>認証キー設定</span></a></li>
    <li id="navi-ownersstore-log" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'log'): ?>on<?php endif; ?>">
        <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
ownersstore/log.php"><span>ログ管理</span></a></li>
</ul>