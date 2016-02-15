<?php /* Smarty version 2.6.27, created on 2016-01-11 22:43:37
         compiled from C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/deliv.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/deliv.tpl', 26, false),array('modifier', 'h', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/deliv.tpl', 28, false),)), $this); ?>

<div id="undercolumn">
    <div id="undercolumn_shopping">
        <p class="flow_area">
            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/picture/img_flow_01.jpg" alt="購入手続きの流れ" />
        </p>
        <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>

        <div id="address_area" class="clearfix">
            <div class="information">
                <p>下記一覧よりお届け先住所を選択して、「選択したお届け先に送る」ボタンをクリックしてください。</p>
                <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_addrmax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) < ((is_array($_tmp=@DELIV_ADDR_MAX)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <p>一覧にご希望の住所が無い場合は、「新しいお届け先を追加する」より追加登録してください。</p>
                <?php endif; ?>
                <p class="mini attention">※最大<?php echo ((is_array($_tmp=((is_array($_tmp=@DELIV_ADDR_MAX)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
件まで登録できます。</p>
            </div>
            <?php if (((is_array($_tmp=@USE_MULTIPLE_SHIPPING)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                <div class="add_multiple">
                    <p>この商品を複数の<br />お届け先に送りますか？</p>
                    <a href="javascript:;" onclick="eccube.setModeAndSubmit('multiple', '', ''); return false">
                        <img class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_several_address.jpg" alt="お届け先を複数指定する" />
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_addrmax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) < ((is_array($_tmp=@DELIV_ADDR_MAX)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <p class="addbtn">
                <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/delivery_addr.php" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/delivery_addr.php?page=<?php echo ((is_array($_tmp=((is_array($_tmp=$_SERVER['SCRIPT_NAME'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
','new_deiv','600','640'); return false;">
                    <img class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_add_address.jpg" alt="新しいお届け先を追加する" />
                </a>
            </p>
        <?php endif; ?>

        <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <input type="hidden" name="mode" value="customer_addr" />
            <input type="hidden" name="uniqid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_uniqid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <input type="hidden" name="other_deliv_id" value="" />
            <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['deli'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                <p class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['deli'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
            <?php endif; ?>
            <table summary="お届け先の指定">
                <col width="10%" />
                <col width="20%" />
                <col width="50%" />
                <col width="10%" />
                <col width="10%" />
                <tr>
                    <th class="alignC">選択</th>
                    <th class="alignC">住所種類</th>
                    <th class="alignC">お届け先</th>
                    <th class="alignC">変更</th>
                    <th class="alignC">削除</th>
                </tr>
                <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrAddr'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <tr>
                        <td class="alignC">
                            <?php if (((is_array($_tmp=$this->_sections['cnt']['first'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <input type="radio" name="deliv_check" id="chk_id_<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="-1" <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['deliv_check']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == "" || ((is_array($_tmp=$this->_tpl_vars['arrForm']['deliv_check']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == -1): ?> checked="checked"<?php endif; ?> />
                            <?php else: ?>
                                <input type="radio" name="deliv_check" id="chk_id_<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['other_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"<?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['deliv_check']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['other_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?> checked="checked"<?php endif; ?> />
                            <?php endif; ?>
                        </td>
                        <td class="alignC">
                            <label for="chk_id_<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                                <?php if (((is_array($_tmp=$this->_sections['cnt']['first'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                    会員登録住所
                                <?php else: ?>
                                    追加登録住所
                                <?php endif; ?>
                            </label>
                        </td>
                        <td>
                            <?php $this->assign('key1', ((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['pref'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
                            <?php $this->assign('key2', ((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['country_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
                            <?php if (((is_array($_tmp=@FORM_COUNTRY_ENABLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCountry'][$this->_tpl_vars['key2']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br/>
                            <?php endif; ?>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['key1']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                        </td>
                        <td class="alignC">
                            <?php if (! ((is_array($_tmp=$this->_sections['cnt']['first'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/delivery_addr.php" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/delivery_addr.php?page=<?php echo ((is_array($_tmp=((is_array($_tmp=$_SERVER['SCRIPT_NAME'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&amp;other_deliv_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['other_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
','new_deiv','600','640'); return false;">変更</a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                        </td>
                        <td class="alignC">
                            <?php if (! ((is_array($_tmp=$this->_sections['cnt']['first'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <a href="?" onclick="eccube.setModeAndSubmit('delete', 'other_deliv_id', '<?php echo ((is_array($_tmp=$this->_tpl_vars['arrAddr'][$this->_sections['cnt']['index']]['other_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false">削除</a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                        </td>
                    </tr>
                <?php endfor; endif; ?>
            </table>

            <div class="btn_area">
                <ul>
                    <li>
                        <a href="<?php echo ((is_array($_tmp=@CART_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                            <img class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_back.jpg" alt="戻る" />
                        </a>
                    </li>
                    <li>
                        <input type="image" class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_next.jpg" alt="選択したお届け先に送る" name="send_button" id="send_button" />
                    </li>
                </ul>
            </div>

        </form>
    </div>
</div>