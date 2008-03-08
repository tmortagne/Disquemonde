<? require ("filtrer.inc") ?>
<html>
<head><title><?=$title?></title></head>
<body>
<h1><?=stripslashes($title)?></h1>
<p><?=stripslashes($message)?>.</p>
<input type="button" onclick="javascript:window.close()" value="ok">
</body>
</html>