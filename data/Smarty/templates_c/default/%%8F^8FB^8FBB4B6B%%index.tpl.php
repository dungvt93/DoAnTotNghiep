<?php /* Smarty version 2.6.27, created on 2016-01-12 00:20:16
         compiled from C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/abouts/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/abouts/index.tpl', 25, false),array('modifier', 'h', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/abouts/index.tpl', 55, false),array('modifier', 'escape', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/abouts/index.tpl', 98, false),array('modifier', 'nl2br', 'C:/xampp/htdocs/eccube-2.13.5/html/../data/Smarty/templates/default/abouts/index.tpl', 112, false),)), $this); ?>

<?php if (((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['latitude'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) && ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['longitude'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
    <script type="text/javascript">//<![CDATA[
        $(function() {
            $("#maps").css({
                'margin-top': '15px',
                'margin-left': 'auto',
                'margin-right': 'auto',
                'width': '98%',
                'height': '300px'
            });
            var lat = <?php echo ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['latitude'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

            var lng = <?php echo ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['longitude'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

            if (lat && lng) {
                var latlng = new google.maps.LatLng(lat, lng);
                var mapOptions = {
                    zoom: 15,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map($("#maps").get(0), mapOptions);
                var marker = new google.maps.Marker({map: map, position: latlng});
            } else {
                $("#maps").remove();
            }
        });
    //]]></script>
<?php endif; ?>
<div id="undercolumn">

    <div id="undercolumn_aboutus">
        <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>

        <table summary="当サイトについて">
            <col width="20%" />
            <col width="80%" />
            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>店名</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>会社名</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>所在地</th>
                    <td>〒<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['zip02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br /><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['arrSiteInfo']['pref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>電話番号</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>FAX番号</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['fax02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['fax03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>メールアドレス</th>
                    <td><a href="mailto:<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'hexentity') : smarty_modifier_escape($_tmp, 'hexentity')); ?>
</a></td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['business_hour'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>営業時間</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['business_hour'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['good_traded'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>取扱商品</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['good_traded'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

            <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>
                <tr>
                    <th>メッセージ</th>
                    <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
                </tr>
            <?php endif; ?>

        </table>

        <div id="maps"></div>
    </div>
</div>