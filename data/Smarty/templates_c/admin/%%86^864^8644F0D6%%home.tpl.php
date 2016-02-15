<?php /* Smarty version 2.6.27, created on 2016-01-11 22:44:36
         compiled from home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'home.tpl', 29, false),array('modifier', 'sfDispDBDate', 'home.tpl', 31, false),array('modifier', 'h', 'home.tpl', 31, false),array('modifier', 'default', 'home.tpl', 71, false),array('modifier', 'n2s', 'home.tpl', 71, false),)), $this); ?>

<div id="home">

        <div id="home-info">
        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrInfo'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
            <dl class="home-info-item">
                <dt class="date"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['info']['disp_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp, false) : SC_Utils_Ex::sfDispDBDate($_tmp, false)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</dt>
                <dt class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</dt>
                <dd class="body"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['body'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</dd>
            </dl>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    
        <div id="home-main">
        <form name="form1" id="form1" method="post" action="#">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />

                        <h2>システム情報</h2>
            <table summary="システム情報" class="shop-info">
                <tr>
                    <th>EC-CUBEバージョン</th>
                    <td><?php echo ((is_array($_tmp=@ECCUBE_VERSION)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                </tr>
                <tr>
                    <th>PHPバージョン</th>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['php_version'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                </tr>
                <tr>
                    <th>DBバージョン</th>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['db_version'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                </tr>
                <tr>
                    <th>詳細</th>
                    <td><a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
system/system.php">システム設定＞システム情報</a></td>
                </tr>
            </table>
            
                        <h2>ショップの状況</h2>
            <table summary="ショップの状況" class="shop-info">
                <tr>
                    <th>現在の会員数</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['customer_cnt'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
名</td>
                </tr>
                <tr>
                    <th>昨日の売上高</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order_yesterday_amount'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</td>
                </tr>
                <tr>
                    <th>昨日の売上件数</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order_yesterday_cnt'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
件</td>
                </tr>
                <tr>
                    <th><span>今月の売上高</span><span>(昨日まで) </span></th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order_month_amount'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</td>
                </tr>
                <tr>
                    <th><span>今月の売上件数 </span><span>(昨日まで) </span></th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['order_month_cnt'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
件</td>
                </tr>
                <tr>
                    <th>昨日のレビュー書き込み数</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['review_yesterday_cnt'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
件</th>
                </tr>
                <tr>
                    <th>会員の保持ポイント合計</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['customer_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
pt</td>
                </tr>
                <tr>
                    <th>レビュー書き込み非表示数</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['review_nondisp_cnt'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
件</td>
                </tr>
                <tr>
                    <th>品切れ商品</th>
                    <td>
                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrSoldout'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['arrSoldout'][$this->_sections['i']['index']]['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSoldout'][$this->_sections['i']['index']]['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
                    <?php endfor; endif; ?>
                    </td>
                </tr>
            </table>
            
                        <h2>新規受付一覧</h2>
            <table summary="新規受付一覧" id="home-order">
                <tr>
                    <th class="center">受注日</th>
                    <th class="center">お名前</th>
                    <th class="center">購入商品</th>
                    <th class="center">支払方法</th>
                    <th class="center">購入金額(円)</th>
                </tr>
                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrNewOrder'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                <tr>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['arrNewOrder'][$this->_sections['i']['index']]['create_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNewOrder'][$this->_sections['i']['index']]['name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNewOrder'][$this->_sections['i']['index']]['name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNewOrder'][$this->_sections['i']['index']]['product_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNewOrder'][$this->_sections['i']['index']]['payment_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                    <td class="right"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNewOrder'][$this->_sections['i']['index']]['total'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</td>
                </tr>
                <?php endfor; endif; ?>
            </table>
            
        </form>
    </div>
    
</div>