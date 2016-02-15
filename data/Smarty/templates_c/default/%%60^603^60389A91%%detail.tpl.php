<?php /* Smarty version 2.6.27, created on 2016-01-11 22:14:11
         compiled from C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 36, false),array('modifier', 'strlen', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 42, false),array('modifier', 'h', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 44, false),array('modifier', 'n2s', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 105, false),array('modifier', 'sfPrePoint', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 135, false),array('modifier', 'nl2br_html', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 180, false),array('modifier', 'sfGetErrorColor', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 196, false),array('modifier', 'default', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 225, false),array('modifier', 'sfDispDBDate', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 341, false),array('modifier', 'nl2br', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 342, false),array('modifier', 'u', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 357, false),array('modifier', 'sfNoImageMainList', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 358, false),array('function', 'html_options', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/products/detail.tpl', 197, false),)), $this); ?>

<script type="text/javascript">//<![CDATA[
    // 規格2に選択肢を割り当てる。
    function fnSetClassCategories(form, classcat_id2_selected) {
        var $form = $(form);
        var product_id = $form.find('input[name=product_id]').val();
        var $sele1 = $form.find('select[name=classcategory_id1]');
        var $sele2 = $form.find('select[name=classcategory_id2]');
        eccube.setClassCategories($form, product_id, $sele1, $sele2, classcat_id2_selected);
    }
//]]></script>

<div id="undercolumn">
    <form name="form1" id="form1" method="post" action="?">
        <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
        <div id="detailarea" class="clearfix">
            <div id="detailphotobloc">
                <div class="photo">
                    <?php $this->assign('key', 'main_image'); ?>
                    <!--★画像★-->
                    <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['main_large_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                        <a
                            href="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['main_large_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"
                            class="expansion"
                            target="_blank"
                        >
                    <?php endif; ?>
                        <img src="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrFile'][$this->_tpl_vars['key']]['filepath'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" width="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrFile'][$this->_tpl_vars['key']]['width'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" height="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrFile'][$this->_tpl_vars['key']]['height'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" class="picture" />
                    <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['main_large_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                        </a>
                    <?php endif; ?>
                </div>
                <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['main_large_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                    <span class="mini">
                            <!--★拡大する★-->
                            <a
                                href="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['main_large_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"
                                class="expansion"
                                target="_blank"
                            >
                                画像を拡大する</a>
                    </span>
                <?php endif; ?>
            </div>

            <div id="detailrightbloc">
                <!--▼商品ステータス-->
                <?php $this->assign('ps', ((is_array($_tmp=$this->_tpl_vars['productStatus'][$this->_tpl_vars['tpl_product_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
                <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['ps'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
                    <ul class="status_icon clearfix">
                        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['ps'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['status']):
?>
                        <li>
                            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrSTATUS_IMAGE'][$this->_tpl_vars['status']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" width="60" height="17" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrSTATUS'][$this->_tpl_vars['status']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" id="icon<?php echo ((is_array($_tmp=$this->_tpl_vars['status'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                <?php endif; ?>
                <!--▲商品ステータス-->

                <!--★商品コード★-->
                <dl class="product_code">
                    <dt>商品コード：</dt>
                    <dd>
                        <span id="product_code_default">
                            <?php if (((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_code_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_code_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_code_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                            <?php else: ?>
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_code_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
～<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_code_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                            <?php endif; ?>
                        </span><span id="product_code_dynamic"></span>
                    </dd>
                </dl>

                <!--★商品名★-->
                <h2><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>

                <!--★通常価格★-->
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrProduct']['price01_min_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                    <dl class="normal_price">
                        <dt><?php echo ((is_array($_tmp=@NORMAL_PRICE_TITLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
(税込)：</dt>
                        <dd class="price">
                            <span id="price01_default"><?php echo ''; ?><?php if (((is_array($_tmp=$this->_tpl_vars['arrProduct']['price01_min_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['arrProduct']['price01_max_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price01_min_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price01_min_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?><?php echo '～'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price01_max_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</span><span id="price01_dynamic"></span>
                            円
                        </dd>
                    </dl>
                <?php endif; ?>

                <!--★販売価格★-->
                <dl class="sale_price">
                    <dt><?php echo ((is_array($_tmp=@SALE_PRICE_TITLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
(税込)：</dt>
                    <dd class="price">
                        <span id="price02_default"><?php echo ''; ?><?php if (((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_max_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?><?php echo '～'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_max_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</span><span id="price02_dynamic"></span>
                        円
                    </dd>
                </dl>

                <!--★ポイント★-->
                <?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                    <div class="point">ポイント：
                        <span id="point_default"><?php echo ''; ?><?php if (((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfPrePoint', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Utils_Ex::sfPrePoint($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfPrePoint', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Utils_Ex::sfPrePoint($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) == ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfPrePoint', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Utils_Ex::sfPrePoint($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))): ?><?php echo ''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfPrePoint', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Utils_Ex::sfPrePoint($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfPrePoint', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Utils_Ex::sfPrePoint($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?><?php echo '～'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['price02_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfPrePoint', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Utils_Ex::sfPrePoint($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrProduct']['point_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</span><span id="point_dynamic"></span>
                        Pt
                    </div>
                <?php endif; ?>

                                <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['maker_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                    <dl class="maker">
                        <dt>メーカー：</dt>
                        <dd><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['maker_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</dd>
                    </dl>
                <?php endif; ?>
                
                <!--▼メーカーURL-->
                <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['comment1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                    <dl class="comment1">
                        <dt>メーカーURL：</dt>
                        <dd><a href="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['comment1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['comment1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a></dd>
                    </dl>
                <?php endif; ?>
                <!--▼メーカーURL-->

                <!--★関連カテゴリ★-->
                <dl class="relative_cat">
                    <dt>関連カテゴリ：</dt>
                    <?php unset($this->_sections['r']);
$this->_sections['r']['name'] = 'r';
$this->_sections['r']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrRelativeCat'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['r']['show'] = true;
$this->_sections['r']['max'] = $this->_sections['r']['loop'];
$this->_sections['r']['step'] = 1;
$this->_sections['r']['start'] = $this->_sections['r']['step'] > 0 ? 0 : $this->_sections['r']['loop']-1;
if ($this->_sections['r']['show']) {
    $this->_sections['r']['total'] = $this->_sections['r']['loop'];
    if ($this->_sections['r']['total'] == 0)
        $this->_sections['r']['show'] = false;
} else
    $this->_sections['r']['total'] = 0;
if ($this->_sections['r']['show']):

            for ($this->_sections['r']['index'] = $this->_sections['r']['start'], $this->_sections['r']['iteration'] = 1;
                 $this->_sections['r']['iteration'] <= $this->_sections['r']['total'];
                 $this->_sections['r']['index'] += $this->_sections['r']['step'], $this->_sections['r']['iteration']++):
$this->_sections['r']['rownum'] = $this->_sections['r']['iteration'];
$this->_sections['r']['index_prev'] = $this->_sections['r']['index'] - $this->_sections['r']['step'];
$this->_sections['r']['index_next'] = $this->_sections['r']['index'] + $this->_sections['r']['step'];
$this->_sections['r']['first']      = ($this->_sections['r']['iteration'] == 1);
$this->_sections['r']['last']       = ($this->_sections['r']['iteration'] == $this->_sections['r']['total']);
?>
                        <dd>
                            <?php unset($this->_sections['s']);
$this->_sections['s']['name'] = 's';
$this->_sections['s']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrRelativeCat'][$this->_sections['r']['index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['s']['show'] = true;
$this->_sections['s']['max'] = $this->_sections['s']['loop'];
$this->_sections['s']['step'] = 1;
$this->_sections['s']['start'] = $this->_sections['s']['step'] > 0 ? 0 : $this->_sections['s']['loop']-1;
if ($this->_sections['s']['show']) {
    $this->_sections['s']['total'] = $this->_sections['s']['loop'];
    if ($this->_sections['s']['total'] == 0)
        $this->_sections['s']['show'] = false;
} else
    $this->_sections['s']['total'] = 0;
if ($this->_sections['s']['show']):

            for ($this->_sections['s']['index'] = $this->_sections['s']['start'], $this->_sections['s']['iteration'] = 1;
                 $this->_sections['s']['iteration'] <= $this->_sections['s']['total'];
                 $this->_sections['s']['index'] += $this->_sections['s']['step'], $this->_sections['s']['iteration']++):
$this->_sections['s']['rownum'] = $this->_sections['s']['iteration'];
$this->_sections['s']['index_prev'] = $this->_sections['s']['index'] - $this->_sections['s']['step'];
$this->_sections['s']['index_next'] = $this->_sections['s']['index'] + $this->_sections['s']['step'];
$this->_sections['s']['first']      = ($this->_sections['s']['iteration'] == 1);
$this->_sections['s']['last']       = ($this->_sections['s']['iteration'] == $this->_sections['s']['total']);
?>
                                <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
products/list.php?category_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['arrRelativeCat'][$this->_sections['r']['index']][$this->_sections['s']['index']]['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrRelativeCat'][$this->_sections['r']['index']][$this->_sections['s']['index']]['category_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a>
                                <?php if (! ((is_array($_tmp=$this->_sections['s']['last'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ((is_array($_tmp=@SEPA_CATNAVI)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php endif; ?>
                            <?php endfor; endif; ?>
                        </dd>
                    <?php endfor; endif; ?>
                </dl>

                <!--★詳細メインコメント★-->
                <div class="main_comment"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['main_comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('nl2br_html', true, $_tmp) : smarty_modifier_nl2br_html($_tmp)); ?>
</div>

                <!--▼買い物カゴ-->
                <div class="cart_area clearfix">
                    <input type="hidden" name="mode" value="cart" />
                    <input type="hidden" name="product_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                    <input type="hidden" name="product_class_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" id="product_class_id" />
                    <input type="hidden" name="favorite_product_id" value="" />

                    <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_stock_find'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_classcat_find1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                            <div class="classlist">
                                <!--▼規格1-->
                                <ul class="clearfix">
                                    <li><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：</li>
                                    <li>
                                        <select name="classcategory_id1" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['classcategory_id1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                                        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrClassCat1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm']['classcategory_id1']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                                        </select>
                                        <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['classcategory_id1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                        <br /><span class="attention">※ <?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
を入力して下さい。</span>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                                <!--▲規格1-->
                                <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_classcat_find2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <!--▼規格2-->
                                <ul class="clearfix">
                                    <li><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_class_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：</li>
                                    <li>
                                        <select name="classcategory_id2" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['classcategory_id2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
">
                                        </select>
                                        <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['classcategory_id2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                        <br /><span class="attention">※ <?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_class_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
を入力して下さい。</span>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                                <!--▲規格2-->
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <!--★数量★-->
                        <dl class="quantity">
                            <dt>数量：</dt>
                            <dd><input type="text" class="box60" name="quantity" value="<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['quantity']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=@INT_LEN)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" />
                                <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                    <br /><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                                <?php endif; ?>
                            </dd>
                        </dl>

                        <div class="cartin">
                            <div class="cartin_btn">
                                <div id="cartbtn_default">
                                    <!--★カゴに入れる★-->
                                    <a href="javascript:void(document.form1.submit())">
                                        <img class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_cartin.jpg" alt="カゴに入れる" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="attention" id="cartbtn_dynamic"></div>
                    <?php else: ?>
                        <div class="attention">申し訳ございませんが、只今品切れ中です。</div>
                    <?php endif; ?>

                    <!--★お気に入り登録★-->
                    <?php if (((is_array($_tmp=@OPTION_FAVORITE_PRODUCT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 && ((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) === true): ?>
                        <div class="favorite_btn">
                            <?php $this->assign('add_favorite', "add_favorite".($this->_tpl_vars['product_id'])); ?>
                            <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['add_favorite']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <div class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['add_favorite']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</div>
                            <?php endif; ?>
                            <?php if (! ((is_array($_tmp=$this->_tpl_vars['is_favorite'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <a href="javascript:eccube.changeAction('?product_id=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
'); eccube.setModeAndSubmit('add_favorite','favorite_product_id','<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
');"><img class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_add_favorite.jpg" alt="お気に入りに追加" /></a>
                            <?php else: ?>
                                <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_add_favorite_on.jpg" title="お気に入りに登録済み" alt="お気に入りに登録済み" id="add_favorite_product" />
                                <script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/jquery.ui/jquery.ui.core.min.js"></script>
                                <script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/jquery.ui/jquery.ui.widget.min.js"></script>
                                <script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/jquery.ui/jquery.ui.position.min.js"></script>
                                <script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/jquery.ui/jquery.ui.tooltip.min.js"></script>
                                <script type="text/javascript">
                                    var favoriteButton = $("#add_favorite_product");
                                    favoriteButton.tooltip();

                                    <?php if (((is_array($_tmp=$this->_tpl_vars['just_added_favorite'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == true): ?>
                                    favoriteButton.load(function(){ $(this).tooltip("open") });
                                    $(function(){
                                        var tid = setTimeout('favoriteButton.tooltip("close")',5000);
                                    });
                                    <?php endif; ?>
                                </script>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <!--▲買い物カゴ-->
            </div>
        </div>
    </form>

    <!--詳細ここまで-->

    <!--▼サブコメント-->
    <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=@PRODUCTSUB_MAX)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <?php $this->assign('key', "sub_title".($this->_sections['cnt']['index']+1)); ?>
        <?php $this->assign('ikey', "sub_image".($this->_sections['cnt']['index']+1)); ?>
        <?php if (((is_array($_tmp=$this->_tpl_vars['arrProduct'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != "" || ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct'][$this->_tpl_vars['ikey']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
            <div class="sub_area clearfix">
                <h3><!--★サブタイトル★--><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h3>
                <?php $this->assign('ckey', "sub_comment".($this->_sections['cnt']['index']+1)); ?>
                <!--▼サブ画像-->
                <?php $this->assign('lkey', "sub_large_image".($this->_sections['cnt']['index']+1)); ?>
                <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct'][$this->_tpl_vars['ikey']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                    <div class="subtext"><!--★サブテキスト★--><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct'][$this->_tpl_vars['ckey']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('nl2br_html', true, $_tmp) : smarty_modifier_nl2br_html($_tmp)); ?>
</div>
                    <div class="subphotoimg">
                        <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct'][$this->_tpl_vars['lkey']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                            <a href="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct'][$this->_tpl_vars['lkey']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" class="expansion" target="_blank" >
                        <?php endif; ?>
                        <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrFile'][$this->_tpl_vars['ikey']]['filepath'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" width="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrFile'][$this->_tpl_vars['ikey']]['width'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" height="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrFile'][$this->_tpl_vars['ikey']]['height'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                        <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct'][$this->_tpl_vars['lkey']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                            </a>
                            <span class="mini">
                                <a href="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct'][$this->_tpl_vars['lkey']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" class="expansion" target="_blank">
                                    画像を拡大する</a>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <p class="subtext"><!--★サブテキスト★--><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct'][$this->_tpl_vars['ckey']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('nl2br_html', true, $_tmp) : smarty_modifier_nl2br_html($_tmp)); ?>
</p>
                <?php endif; ?>
                <!--▲サブ画像-->
            </div>
        <?php endif; ?>
    <?php endfor; endif; ?>
    <!--▲サブコメント-->

    <!--この商品に対するお客様の声-->
    <div id="customervoice_area">
        <h2><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/title/tit_product_voice.png" alt="この商品に対するお客様の声" /></h2>

        <div class="review_bloc clearfix">
            <p>この商品に対するご感想をぜひお寄せください。</p>
            <div class="review_btn">
                <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrReview'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) < ((is_array($_tmp=@REVIEW_REGIST_MAX)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <!--★新規コメントを書き込む★-->
                    <a href="./review.php"
                        onclick="eccube.openWindow('./review.php?product_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
','review','600','640'); return false;"
                        target="_blank">
                        <img class="hover_change_image" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_comment.jpg" alt="新規コメントを書き込む" />
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrReview'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
            <ul>
                <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrReview'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <li>
                        <p class="voicetitle"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrReview'][$this->_sections['cnt']['index']]['title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                        <p class="voicedate"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrReview'][$this->_sections['cnt']['index']]['create_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp, false) : SC_Utils_Ex::sfDispDBDate($_tmp, false)); ?>
　投稿者：<?php if (((is_array($_tmp=$this->_tpl_vars['arrReview'][$this->_sections['cnt']['index']]['reviewer_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrReview'][$this->_sections['cnt']['index']]['reviewer_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" target="_blank"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrReview'][$this->_sections['cnt']['index']]['reviewer_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a><?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrReview'][$this->_sections['cnt']['index']]['reviewer_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php endif; ?>　おすすめレベル：<span class="recommend_level"><?php $this->assign('level', ((is_array($_tmp=$this->_tpl_vars['arrReview'][$this->_sections['cnt']['index']]['recommend_level'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrRECOMMEND'][$this->_tpl_vars['level']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span></p>
                        <p class="voicecomment"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrReview'][$this->_sections['cnt']['index']]['comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
                    </li>
                <?php endfor; endif; ?>
            </ul>
        <?php endif; ?>
    </div>
    <!--お客様の声ここまで-->

    <!--▼関連商品-->
    <?php if (((is_array($_tmp=$this->_tpl_vars['arrRecommend'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
        <div id="whobought_area">
            <h2><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/title/tit_product_recommend.png" alt="その他のオススメ商品" /></h2>
            <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrRecommend'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['arrRecommend'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['arrRecommend']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['arrItem']):
        $this->_foreach['arrRecommend']['iteration']++;
?>
                <div class="product_item">
                    <div class="productImage">
                        <a href="<?php echo ((is_array($_tmp=@P_DETAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItem']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('u', true, $_tmp) : smarty_modifier_u($_tmp)); ?>
">
                            <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItem']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="max-width: 65px;max-height: 65px;" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItem']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" /></a>
                    </div>
                    <?php $this->assign('price02_min', ($this->_tpl_vars['arrItem']['price02_min_inctax'])); ?>
                    <?php $this->assign('price02_max', ($this->_tpl_vars['arrItem']['price02_max_inctax'])); ?>
                    <div class="productContents">
                        <h3><a href="<?php echo ((is_array($_tmp=@P_DETAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItem']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('u', true, $_tmp) : smarty_modifier_u($_tmp)); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItem']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a></h3>
                        <p class="sale_price"><?php echo ((is_array($_tmp=@SALE_PRICE_TITLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
(税込)：<span class="price">
                            <?php if (((is_array($_tmp=$this->_tpl_vars['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['price02_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>

                            <?php else: ?>
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['price02_min'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
～<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['price02_max'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>

                            <?php endif; ?>円</span></p>
                        <p class="mini"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrItem']['comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
                    </div>
                </div>                <?php if (((is_array($_tmp=$this->_foreach['arrRecommend']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) % 2 === 0): ?>
                    <div class="clear"></div>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </div>
    <?php endif; ?>
    <!--▲関連商品-->

</div>