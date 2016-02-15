<?php /* Smarty version 2.6.27, created on 2016-01-09 18:40:38
         compiled from install_frame.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'install_frame.tpl', 25, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo ((is_array($_tmp=@CHAR_CODE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
<link rel="stylesheet" href="css/admin_contents.css" type="text/css" media="all" />
<link rel="stylesheet" href="../js/jquery.colorbox/colorbox.css" type="text/css" media="all" />
<!--[if lt IE 9]>
<script src="../js/jquery-1.11.1.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="../js/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="../js/eccube.js"></script>
<script type="text/javascript" src="../js/jquery.colorbox/jquery.colorbox-min.js"></script>

<style type="text/css">
#loading{
  width: 100%;
  height: 100%;
  background-color:#FFFFFF;
  filter:alpha(opacity=85);
  -moz-opacity:0.85;
  -khtml-opacity: 0.85;
  opacity:0.85;
  position: fixed;
  _position: absolute; /* forIE6 */
  display: none;
  top: 0;
  left: 0;
  z-index: 10000;
}
#loading img {
  width: 48px;
  height: 48px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -24px;
  margin-left: -24px;
}
</style>
<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_mainpage'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != 'complete.tpl'): ?>
<script type="text/javascript">//<![CDATA[
$(function(){
    $('.btn-next').click(function(e) {
      e.preventDefault();
      $('form').submit();
      $('#loading').show();
    });
});
//]]></script>
<?php endif; ?>
<title>EC-CUBEインストール</title>
</head>
<body>
<?php echo ((is_array($_tmp=$this->_tpl_vars['GLOBAL_ERR'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

<noscript>
  <p>JavaScript を有効にしてご利用下さい。</p>
</noscript>
<div id="loading"><img src="../js/jquery.colorbox/loading.gif" width="48" height="48" alt="Loading..." /></div>
<div id="outside">
  <div id="out-wrap">
    <div class="logo">
      <img src="img/logo_resize.jpg" width="99" height="15" alt="EC-CUBE" />
    </div>
    <div id="out-area">
      <div class="out-top"></div>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_mainpage'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['install_info_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) != 0): ?>
    <div id="info-area">
      <iframe src="<?php echo ((is_array($_tmp=$this->_tpl_vars['install_info_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" width="562" height="550" frameborder="no" scrolling="no">
        こちらはEC-CUBEからのお知らせです。この部分は iframe対応ブラウザでご覧下さい。
      </iframe>
    </div>
    <?php endif; ?>
  </div>
</div>
</body>
</html>