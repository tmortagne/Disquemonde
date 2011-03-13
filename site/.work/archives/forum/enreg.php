<html>
<head>
<title>Enregistr&eacute;</title>
<script language=javascript>
function refresh()
{
  window.opener.location.href=window.opener.location.href;
}
</script>
</head>
<body <?=(($identify=="1")?"onLoad='refresh();'":"")?>>
Vous �tes enregistr�<br />
<a href="javascript:window.close()">Fermer la fenetre</a>
</body>
</html>