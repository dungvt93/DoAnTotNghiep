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
    <img src="<!--{$smarty.const.ROOT_URLPATH}-->user_data/packages/default/img/ajax/loading.gif" alt="icon-loading"/>
</div>
<iframe id="myIframe" src="<!--{$srcIframe}-->"></iframe>
<script type="text/javascript">
    window.onload = function(){
        // hidden icon loading and show iframe contain pdf file
        document.getElementById('loading').style.display = "none";
        document.getElementById('myIframe').style.display = "block";
    }
</script>
</body>
</html>