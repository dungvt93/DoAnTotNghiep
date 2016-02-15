<?php /* Smarty version 2.6.27, created on 2016-01-12 00:14:21
         compiled from C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/mypage/delivery.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/mypage/delivery.tpl', 26, false),array('modifier', 'h', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/mypage/delivery.tpl', 26, false),)), $this); ?>

<div id="mypagecolumn">
    <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_navi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div id="mycontents_area">
        <h3><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h3>
        <p class="inforamtion">登録住所以外への住所へ送付される場合等にご利用いただくことができます。<br />
        ※最大<span class="attention"><?php echo ((is_array($_tmp=((is_array($_tmp=@DELIV_ADDR_MAX)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
件</span>まで登録できます。</p>

        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_linemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) < ((is_array($_tmp=@DELIV_ADDR_MAX)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <p class="add_address">
                    <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/delivery_addr.php" onclick="eccube.openWindow('./delivery_addr.php','delivadd','600','640',{menubar:'no'}); return false;" target="_blank"><img class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_add_address.jpg" alt="新しいお届け先を追加" /></a>
                </p>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_linemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
            <form name="form1" id="form1" method="post" action="?" >
                <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                <input type="hidden" name="mode" value="" />
                <input type="hidden" name="other_deliv_id" value="" />
                <input type="hidden" name="pageno" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_pageno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />

                <table summary="お届け先">
                <col width="5%" />
                <col width="25%" />
                <col width="50%" />
                <col width="10%" />
                <col width="10%" />
                    <tr>
                        <th colspan="5">お届け先</th>
                    </tr>
                    <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <?php $this->assign('OtherPref', ($this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['pref'])); ?>
                        <?php $this->assign('OtherCountry', ($this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['country_id'])); ?>
                        <tr>
                            <td class="alignC"><?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                            <td><label for="add<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">お届け先住所</label></td>
                            <td>
                                <?php if (((is_array($_tmp=@FORM_COUNTRY_ENABLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCountry'][$this->_tpl_vars['OtherCountry']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br/>
                                <?php endif; ?>
                                〒<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['zip02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['OtherPref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                            </td>
                            <td class="alignC">
                                <a href="./delivery_addr.php" onclick="eccube.openWindow('./delivery_addr.php?other_deliv_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['other_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
','deliv_disp','600','640'); return false;">変更</a>
                            </td>
                            <td class="alignC">
                                <a href="#" onclick="eccube.setModeAndSubmit('delete','other_deliv_id','<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['other_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false;">削除</a>
                            </td>
                        </tr>
                    <?php endfor; endif; ?>
                </table>
            </form>
        <?php else: ?>
            <p class="delivempty"><strong>新しいお届け先はありません。</strong></p>
        <?php endif; ?>
    </div>
</div>