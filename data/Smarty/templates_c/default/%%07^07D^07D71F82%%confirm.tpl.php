<?php /* Smarty version 2.6.27, created on 2016-01-11 22:44:09
         compiled from C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/confirm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/confirm.tpl', 39, false),array('modifier', 'h', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/confirm.tpl', 40, false),array('modifier', 'strlen', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/confirm.tpl', 86, false),array('modifier', 'sfNoImageMainList', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/confirm.tpl', 86, false),array('modifier', 'n2s', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/confirm.tpl', 103, false),array('modifier', 'default', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/confirm.tpl', 119, false),array('modifier', 'regex_replace', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/confirm.tpl', 232, false),array('modifier', 'nl2br', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/shopping/confirm.tpl', 355, false),)), $this); ?>

<script type="text/javascript">//<![CDATA[
    var sent = false;

    function fnCheckSubmit() {
        if (sent) {
            alert("只今、処理中です。しばらくお待ち下さい。");
            return false;
        }
        sent = true;
        return true;
    }
//]]></script>

<!--CONTENTS-->
<div id="undercolumn">
    <div id="undercolumn_shopping">
        <p class="flow_area"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/picture/img_flow_03.jpg" alt="購入手続きの流れ" /></p>
        <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>

        <p class="information">下記ご注文内容で送信してもよろしいでしょうか？<br />
            よろしければ、「<?php if (((is_array($_tmp=$this->_tpl_vars['use_module'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>次へ<?php else: ?>ご注文完了ページへ<?php endif; ?>」ボタンをクリックしてください。</p>

        <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <input type="hidden" name="mode" value="confirm" />
            <input type="hidden" name="uniqid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_uniqid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />

            <div class="btn_area">
                <ul>
                    <li>
                        <a href="./payment.php">
                            <img class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_back.jpg" alt="戻る" />
                        </a>
                    </li>
                        <?php if (((is_array($_tmp=$this->_tpl_vars['use_module'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <li>
                        <input type="image" onclick="return fnCheckSubmit();" class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_next.jpg" alt="次へ" name="next-top" id="next-top" />
                    </li>
                        <?php else: ?>
                    <li>
                        <input type="image" onclick="return fnCheckSubmit();" class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_order_complete.jpg" alt="ご注文完了ページへ" name="next-top" id="next-top" />
                    </li>
                    <?php endif; ?>
                </ul>
            </div>

            <table summary="ご注文内容確認">
                <col width="10%" />
                <col width="40%" />
                <col width="20%" />
                <col width="10%" />
                <col width="20%" />
                <tr>
                    <th scope="col">商品写真</th>
                    <th scope="col">商品名</th>
                    <th scope="col">単価</th>
                    <th scope="col">数量</th>
                    <th scope="col">小計</th>
                </tr>
                <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrCartItems'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                    <tr>
                        <td class="alignC">
                            <a
                                <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?> href="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" class="expansion" target="_blank"
                                <?php endif; ?>
                            >
                                <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="max-width: 65px;max-height: 65px;" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" /></a>
                        </td>
                        <td>
                            <ul>
                                <li><strong><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</strong></li>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                <li><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</li>
                                <?php endif; ?>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                <li><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</li>
                                <?php endif; ?>
                            </ul>
                        </td>
                        <td class="alignR">
                            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['price_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円
                        </td>
                        <td class="alignR"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
</td>
                        <td class="alignR"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['total_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</td>
                    </tr>
                <?php endforeach; endif; unset($_from); ?>
                <tr>
                    <th colspan="4" class="alignR" scope="row">小計</th>
                    <td class="alignR"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_total_inctax'][$this->_tpl_vars['cartKey']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</td>
                </tr>
                <?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['use_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                    <tr>
                        <th colspan="4" class="alignR" scope="row">値引き（ポイントご使用時）</th>
                        <td class="alignR">
                            <?php $this->assign('discount', ($this->_tpl_vars['arrForm']['use_point']*@POINT_VALUE)); ?>
                            -<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['discount'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
円</td>
                    </tr>
                    <?php endif; ?>
                <?php endif; ?>
                <tr>
                    <th colspan="4" class="alignR" scope="row">送料</th>
                    <td class="alignR"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['deliv_fee'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</td>
                </tr>
                <tr>
                    <th colspan="4" class="alignR" scope="row">手数料</th>
                    <td class="alignR"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['charge'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</td>
                </tr>
                <tr>
                    <th colspan="4" class="alignR" scope="row">合計</th>
                    <td class="alignR"><span class="price"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['payment_total'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</span></td>
                </tr>
            </table>

                        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 && ((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                <table summary="ポイント確認" class="delivname">
                <col width="30%" />
                <col width="70%" />
                    <tr>
                        <th scope="row">ご注文前のポイント</th>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_user_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
Pt</td>
                    </tr>
                    <tr>
                        <th scope="row">ご使用ポイント</th>
                        <td>-<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['use_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
Pt</td>
                    </tr>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['birth_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                    <tr>
                        <th scope="row">お誕生月ポイント</th>
                        <td>+<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['birth_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
Pt</td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th scope="row">今回加算予定のポイント</th>
                        <td>+<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['add_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
Pt</td>
                    </tr>
                    <tr>
                    <?php $this->assign('total_point', ($this->_tpl_vars['tpl_user_point']-$this->_tpl_vars['arrForm']['use_point']+$this->_tpl_vars['arrForm']['add_point'])); ?>
                        <th scope="row">加算後のポイント</th>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['total_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
Pt</td>
                    </tr>
                </table>
            <?php endif; ?>
            
                        <h3>ご注文者</h3>
            <table summary="ご注文者" class="customer">
                <col width="30%" />
                <col width="70%" />
                <tbody>
                    <tr>
                        <th scope="row">お名前</th>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <th scope="row">お名前(フリガナ)</th>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_kana01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_kana02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <th scope="row">会社名</th>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    </tr>
                    <?php if (((is_array($_tmp=@FORM_COUNTRY_ENABLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <tr>
                        <th scope="row">国</th>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCountry'][$this->_tpl_vars['arrForm']['order_country_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <th scope="row">ZIPCODE</th>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_zipcode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th scope="row">郵便番号</th>
                        <td>〒<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_zip02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <th scope="row">住所</th>
                        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['arrForm']['order_pref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <th scope="row">電話番号</th>
                        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <th scope="row">FAX番号</th>
                        <td>
                            <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['order_fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_fax02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_fax03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">メールアドレス</th>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_email'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <th scope="row">性別</th>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSex'][$this->_tpl_vars['arrForm']['order_sex']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <th scope="row">職業</th>
                        <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrJob'][$this->_tpl_vars['arrForm']['order_job']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '(未登録)') : smarty_modifier_default($_tmp, '(未登録)')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    </tr>
                    <tr>
                        <th scope="row">生年月日</th>
                        <td>
                            <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_birth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/ .+/", "") : smarty_modifier_regex_replace($_tmp, "/ .+/", "")))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/-/", "/") : smarty_modifier_regex_replace($_tmp, "/-/", "/")))) ? $this->_run_mod_handler('default', true, $_tmp, '(未登録)') : smarty_modifier_default($_tmp, '(未登録)')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                        </td>
                    </tr>
                </tbody>
            </table>

                        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrShipping'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['shippingItem'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shippingItem']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shippingItem']):
        $this->_foreach['shippingItem']['iteration']++;
?>
                <h3>お届け先<?php if (((is_array($_tmp=$this->_tpl_vars['is_multiple'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ((is_array($_tmp=$this->_foreach['shippingItem']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php endif; ?></h3>
                <?php if (((is_array($_tmp=$this->_tpl_vars['is_multiple'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <table summary="ご注文内容確認">
                        <col width="10%" />
                        <col width="60%" />
                        <col width="20%" />
                        <col width="10%" />
                        <tr>
                            <th scope="col">商品写真</th>
                            <th scope="col">商品名</th>
                            <th scope="col">数量</th>
                            <th scope="col">小計</th>
                        </tr>
                        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipment_item'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                            <tr>
                                <td class="alignC">
                                    <a
                                        <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?> href="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" class="expansion" target="_blank"
                                        <?php endif; ?>
                                    >
                                        <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="max-width: 65px;max-height: 65px;" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" /></a>
                                </td>
                                <td><strong><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</strong><br />
                                    <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />
                                    <?php endif; ?>
                                    <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

                                    <?php endif; ?>
                                </td>
                                <td class="alignC"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                                <td class="alignR">
                                    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['total_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円
                                </td>
                            </tr>
                        <?php endforeach; endif; unset($_from); ?>
                    </table>
                <?php endif; ?>

                <table summary="お届け先確認" class="delivname">
                    <col width="30%" />
                    <col width="70%" />
                    <tbody>
                        <tr>
                            <th scope="row">お名前</th>
                            <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                        </tr>
                        <tr>
                            <th scope="row">お名前(フリガナ)</th>
                            <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_kana01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_kana02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                        </tr>
                        <tr>
                            <th scope="row">会社名</th>
                            <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                        </tr>
                        <?php if (((is_array($_tmp=@FORM_COUNTRY_ENABLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <tr>
                            <th scope="row">国</th>
                            <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCountry'][$this->_tpl_vars['shippingItem']['shipping_country_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                        </tr>
                        <tr>
                            <th scope="row">ZIPCODE</th>
                            <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_zipcode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th scope="row">郵便番号</th>
                            <td>〒<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_zip02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                        </tr>
                        <tr>
                            <th scope="row">住所</th>
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['shippingItem']['shipping_pref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                        </tr>
                        <tr>
                            <th scope="row">電話番号</th>
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                        </tr>
                        <tr>
                            <th scope="row">FAX番号</th>
                            <td>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                                    <?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php if (((is_array($_tmp=$this->_tpl_vars['cartKey'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ((is_array($_tmp=@PRODUCT_TYPE_DOWNLOAD)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                            <tr>
                                <th scope="row">お届け日</th>
                                <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "指定なし") : smarty_modifier_default($_tmp, "指定なし")))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                            </tr>
                            <tr>
                                <th scope="row">お届け時間</th>
                                <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_time'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "指定なし") : smarty_modifier_default($_tmp, "指定なし")))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php endforeach; endif; unset($_from); ?>
            
            <h3>配送方法・お支払方法・その他お問い合わせ</h3>
            <table summary="配送方法・お支払方法・その他お問い合わせ" class="delivname">
                <col width="30%" />
                <col width="70%" />
                <tbody>
                <tr>
                    <th scope="row">配送方法</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrDeliv'][$this->_tpl_vars['arrForm']['deliv_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
                <tr>
                    <th scope="row">お支払方法</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['payment_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
                <tr>
                    <th scope="row">その他お問い合わせ</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
                </tr>
                </tbody>
            </table>

            <div class="btn_area">
                <ul>
                    <li>
                        <a href="./payment.php"><img class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_back.jpg" alt="戻る" name="back<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" /></a>
                    </li>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['use_module'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <li>
                        <input type="image" onclick="return fnCheckSubmit();" class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_next.jpg" alt="次へ" name="next" id="next" />
                    </li>
                    <?php else: ?>
                    <li>
                        <input type="image" onclick="return fnCheckSubmit();" class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_order_complete.jpg" alt="ご注文完了ページへ"  name="next" id="next" />
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </form>
    </div>
</div>