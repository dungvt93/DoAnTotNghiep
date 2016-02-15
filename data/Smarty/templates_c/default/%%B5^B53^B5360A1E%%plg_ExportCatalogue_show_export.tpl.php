<?php /* Smarty version 2.6.27, created on 2016-01-09 19:27:21
         compiled from C:/xampp/htdocs/eccube-2.13.5/html/../data/downloads/plugin/plg_ExportCatalogue/templates/plg_ExportCatalogue_show_export.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/downloads/plugin/plg_ExportCatalogue/templates/plg_ExportCatalogue_show_export.tpl', 26, false),)), $this); ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
    <title>Export Catalogue</title>
    <style type="text/css">
        body{
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
        }
        #myIframe {
            display:none;
            border: 0;
            width:100%;
            height: 100%
        }
        #loading{
            margin-top: 25%;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="loading">
    <img src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
user_data/packages/default/img/ajax/loading.gif" alt="icon-loading"/>
</div>
<iframe id="myIframe" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['srcIframe'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"></iframe>
<script type="text/javascript">
    window.onload = function(){
        // hidden icon loading and show iframe contain pdf file
        document.getElementById('loading').style.display = "none";
        document.getElementById('myIframe').style.display = "block";
    }
</script>
</body>
</html>