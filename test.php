<!DOCTYPE html>
<html>
<head>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


</head>

<body>
<script type="text/javascript" src="/static/js/jquery.qrcode.js"></script>
<script type="text/javascript" src="/static/js/qrcode.js"></script>
<p>Render in table</p>
<div id="qrcodeTable"></div>
<p>Render in canvas</p>
<div id="qrcodeCanvas"></div>
<script>
    //jQuery('#qrcode').qrcode("this plugin is great");
    jQuery('#qrcodeTable').qrcode({
        render	: "table",
        text	: "http://www.fandle.net/index.php/path/project_detail/projects_ko/projects_num/2"
    });
    jQuery('#qrcodeCanvas').qrcode({
        text	: "http://www.fandle.net/index.php/path/project_detail/projects_ko/projects_num/2"
    });
</script>
</body>
</html>
