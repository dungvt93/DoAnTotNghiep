<?php /* Smarty version 2.6.27, created on 2016-02-15 22:59:13
         compiled from ownersstore/plugin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'ownersstore/plugin.tpl', 119, false),array('modifier', 'sfGetErrorColor', 'ownersstore/plugin.tpl', 132, false),array('modifier', 'h', 'ownersstore/plugin.tpl', 132, false),array('modifier', 'default', 'ownersstore/plugin.tpl', 168, false),)), $this); ?>

<script type="text/javascript">//<![CDATA[
    $(function() {
        /**
         * 「有効/有効にする」チェックボタン押下時
         */
        $('input[id^=plugin_enable]').change(function(event) {
            // モード(有効 or 無効)
            var mode = event.target.name;

            if(mode === 'disable') {
                result = window.confirm('プラグインを無効にしても宜しいですか？');
                if(result === false) {
                    $(event.target).attr("checked", "checked");
                }
            } else if(mode === 'enable') {
                result = window.confirm('プラグインを有効にしても宜しいですか？');
                if(result === false) {
                    $(event.target).attr("checked", "");
                }
            }
            if(result === true){
                // プラグインID
                var plugin_id = event.target.value;
                eccube.setModeAndSubmit(mode, 'plugin_id', plugin_id);
            }
        });

    /**
     * 通信エラー表示.
     */
    function remoteException(XMLHttpRequest, textStatus, errorThrown) {
        alert('通信中にエラーが発生しました。');
    }

    /**
     * アップデートリンク押下時の処理.
     */
    $('.update_link').click(function(event) {
        var plugin_id = event.target.name;
        $('div[id="plugin_update_' + plugin_id + '"]').toggle("slow");
        });
    });

    /**
     * アプデートボタン押下時の処理.
     * アップデート対象ファイル以外はPOSTされない様にdisabled属性を付与
     */
    function removeUpdateFile(select_id) {
        $('input[name="update_plugin_file"]').attr("disabled", "disabled");
        $('input[id="' + select_id + '"]').removeAttr("disabled");
    }

    /**
     * インストール
     */
    function install() {
        if (window.confirm('プラグインをインストールしても宜しいでしょうか？')){
            eccube.setModeAndSubmit('install','','');
        }
    }

    /**
     * アンインストール(削除)
     */
    function uninstall(plugin_id, plugin_code) {
        if (window.confirm('一度削除したデータは元に戻せません。\nプラグインを削除しても宜しいですか？')){
            eccube.setValue('plugin_id', plugin_id);
            eccube.setModeAndSubmit('uninstall', 'plugin_code', plugin_code);
        }
    }

    /**
     * アップデート処理
     */
    function update(plugin_id, plugin_code) {
        if (window.confirm('プラグインをアップデートしても宜しいですか？')){
            removeUpdateFile('update_file_' + plugin_id);
            eccube.setValue('plugin_id', plugin_id);
            eccube.setModeAndSubmit('update','plugin_code', plugin_code);
        }
    }

    /**
     * 優先度変更.
     */
    function update_priority(plugin_id, plugin_code) {
        var priority = $("*[name=priority_" + plugin_code +"]").val();
        eccube.setValue('priority', priority);
        eccube.setModeAndSubmit('priority','plugin_id',plugin_id);
    }

//]]></script>

<form name="form1" id="form1" method="post" action="?" enctype="multipart/form-data">
    <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
    <input type="hidden" name="mode" value="" />
    <input type="hidden" name="plugin_id" value="" />
    <input type="hidden" name="plugin_code" value="" />
    <input type="hidden" name="priority" value="" />
    <div id="system" class="contents-main">
        <h2>プラグイン登録</h2>
        <table class="form">
            <tr>
                <th>プラグイン<span class="attention"> *</span></th>
                <td>
                    <?php $this->assign('key', 'plugin_file'); ?>
                    <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    <input type="file" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="box45" size="43"  style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
 <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?> background-color:<?php echo ((is_array($_tmp=((is_array($_tmp=@ERR_COLOR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php endif; ?>" />
                    <a class="btn-action" href="javascript:;" onclick="install(); return false;"><span class="btn-next">インストール</span></a>
                </td>
            </tr>
        </table>

        <!--▼プラグイン一覧ここから-->
        <h2>プラグイン一覧</h2>
        <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['plugins'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
            <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['plugin_error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
            <table class="system-plugin" width="900">
                <col width="10%" />
                <col width="77" />
                <col width="13%" />
                <tr>
                    <th colspan="2">機能説明</th>
                    <th>優先度</th>
                </tr>
                <?php unset($this->_sections['data']);
$this->_sections['data']['name'] = 'data';
$this->_sections['data']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['plugins'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['data']['show'] = true;
$this->_sections['data']['max'] = $this->_sections['data']['loop'];
$this->_sections['data']['step'] = 1;
$this->_sections['data']['start'] = $this->_sections['data']['step'] > 0 ? 0 : $this->_sections['data']['loop']-1;
if ($this->_sections['data']['show']) {
    $this->_sections['data']['total'] = $this->_sections['data']['loop'];
    if ($this->_sections['data']['total'] == 0)
        $this->_sections['data']['show'] = false;
} else
    $this->_sections['data']['total'] = 0;
if ($this->_sections['data']['show']):

            for ($this->_sections['data']['index'] = $this->_sections['data']['start'], $this->_sections['data']['iteration'] = 1;
                 $this->_sections['data']['iteration'] <= $this->_sections['data']['total'];
                 $this->_sections['data']['index'] += $this->_sections['data']['step'], $this->_sections['data']['iteration']++):
$this->_sections['data']['rownum'] = $this->_sections['data']['iteration'];
$this->_sections['data']['index_prev'] = $this->_sections['data']['index'] - $this->_sections['data']['step'];
$this->_sections['data']['index_next'] = $this->_sections['data']['index'] + $this->_sections['data']['step'];
$this->_sections['data']['first']      = ($this->_sections['data']['iteration'] == 1);
$this->_sections['data']['last']       = ($this->_sections['data']['iteration'] == $this->_sections['data']['total']);
?>
                <?php $this->assign('plugin', ((is_array($_tmp=$this->_tpl_vars['plugins'][$this->_sections['data']['index']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
                <tr <?php if (((is_array($_tmp=$this->_tpl_vars['plugin']['enable'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=@PLUGIN_ENABLE_FALSE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?> style="background:#C9C9C9;" <?php endif; ?>>
                    <!--ロゴ-->
                    <td class="center plugin_img">
                        <?php if (((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_site_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ''): ?>
                            <a href="?" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_site_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
','plugin_site_url','620','760',{menubar:'no'}); return false;"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['logo'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" width="65" height="65" /></a>&nbsp;
                        <?php else: ?>
                            <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['logo'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" width="65" height="65"/>
                        <?php endif; ?>

                    </td>
                    <!--機能説明-->
                    <td class="plugin_info">
                            <!-- プラグイン名 -->
                                <!-- ▼plugin_site_urlが設定されている場合はリンクとして表示 -->
                                <span class="plugin_name">
                                <?php if (((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_site_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ''): ?>
                                    <a href="?" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_site_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
','plugin_site_url','620','760',{menubar:'no'}); return false;"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : smarty_modifier_default($_tmp, ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a>&nbsp;
                                <?php else: ?>
                                    <span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : smarty_modifier_default($_tmp, ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&nbsp;</span>
                                <?php endif; ?>
                                </span>
                            <!-- プラグインバージョン -->
                                <?php if (((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_version'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ''): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_version'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php endif; ?>&nbsp;
                            <!-- 作者 -->
                                <?php if (((is_array($_tmp=$this->_tpl_vars['plugin']['author'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ''): ?>
                                    <!-- ▼author_site_urlが設定されている場合はリンクとして表示 -->
                                    <?php if (((is_array($_tmp=$this->_tpl_vars['plugin']['author_site_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ''): ?>
                                        <span>(by <a href="?" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['author_site_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
','author_site_url','620','760',{menubar:'no'}); return false;"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['author'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '-') : smarty_modifier_default($_tmp, '-')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a>)</span>
                                    <?php else: ?>
                                        <span>(by <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['author'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '-') : smarty_modifier_default($_tmp, '-')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
)</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <br />
                            <!-- 説明 -->
                                <p class="description"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_description'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '-') : smarty_modifier_default($_tmp, '-')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                            <div>
                                <span class="ec_cube_version">対応EC-CUBEバージョン ：<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['compliant_version'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '-') : smarty_modifier_default($_tmp, '-')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span><br/>
                                <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['plugin']['plugin_code']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                                <!-- 設定 -->
                                    <?php if (((is_array($_tmp=$this->_tpl_vars['plugin']['config_flg'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == true && ((is_array($_tmp=$this->_tpl_vars['plugin']['status'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ((is_array($_tmp=@PLUGIN_STATUS_UPLOADED)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                        <a href="?" onclick="eccube.openWindow('../load_plugin_config.php?plugin_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
', 'load', 615, 400);return false;">プラグイン設定</a>&nbsp;|&nbsp;
                                    <?php else: ?>
                                        <span>プラグイン設定&nbsp;|&nbsp;</span>
                                    <?php endif; ?>
                                <!-- アップデート -->
                                    <a class="update_link" href="javascript:;" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">アップデート</a>&nbsp;|&nbsp;
                                <!-- 削除 -->
                                    <a  href="javascript:;" name="uninstall" onclick="uninstall(<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
, '<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false;">削除</a>&nbsp;|&nbsp;
                                <!-- 有効/無効 -->
                                    <?php if (((is_array($_tmp=$this->_tpl_vars['plugin']['enable'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=@PLUGIN_ENABLE_TRUE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                        <label><input id="plugin_enable" type="checkbox" name="disable" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" checked="checked" />有効</label><br/>
                                    <?php else: ?>
                                        <label><input id="plugin_enable" type="checkbox" name="enable" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />有効にする</label><br/>
                                    <?php endif; ?>

                                    <!-- アップデートリンク押下時に表示する. -->
                                    <div id="plugin_update_<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="display: none">
                                        <input id="update_file_<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" type="file" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" class="box30" size="30" <?php if (((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>style="background-color:<?php echo ((is_array($_tmp=((is_array($_tmp=@ERR_COLOR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
"<?php endif; ?> />
                                        <a class="btn-action" href="javascript:;" onclick="update(<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
, '<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false;"><span class="btn-next">アップデート</span></a>
                                    </div>
                            </div>
                    </td>
                    <!--優先順位-->
                    <td class="center">
                        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['priority'][$this->_tpl_vars['plugin']['plugin_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                        <input type="text" class="center" name="priority_<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['plugin']['priority'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" size="1" />
                        <a class="btn-action" href="javascript:;" onclick="update_priority(<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
, '<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['plugin_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false;"><span class="btn-next">変更</span></a><br/>
                        <span><?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['priority_message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                    </td>
                </tr>
                <!--競合アラート-->
                <?php if (((is_array($_tmp=$this->_tpl_vars['plugin']['conflict_message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                <tr>
                    <td class="attention_fookpoint" colspan="3">
                        <p class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['conflict_message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endfor; endif; ?>
            </table>
        <?php else: ?>
            <span>登録されているプラグインはありません。</span>
        <?php endif; ?>
    </div>
</form>