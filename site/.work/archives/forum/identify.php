<?
if (!empty($login) && !empty($pass))
{
  include ("bd_connect.php");
  if (!mysql_num_rows(mysql_query("SELECT login, pass FROM users WHERE login='$login' AND pass='$pass'")))
	$message .= "D�sol� mais le mot de passe ou le login sont incorrects.<br />\n";
  include ("bd_close.php");
  if (!isset($message))
    {
	  session_start();
	  $LOGIN = $login;
	  $PASS = $pass;
	  session_register("LOGIN");
	  session_register("PASS");
    }
}
?>
<html>
<head>
<title>Identification</title>
<script language=javascript>
function refresh()
{
  window.opener.location.href=window.opener.location.href;
  window.close();
}

function verif_form()
{
  var mess="";
  if (!this.document.indentify.login.value)
	mess += "Vous n'avez pas saisi de Login.\n";
  if (!this.document.indentify.pass.value)
	mess += "Vous n'avez pas saisi de mot de passe.\n";
  if (mess)
    alert(mess);
  else
	this.document.indentify.submit();
}
</script>
</head>
<body <?=((!empty($login) && !empty($pass) && !isset($message))?"onLoad='refresh();'":"")?>>
<font color='#ff0000'><?=$message?></font>
<form name="indentify" action="identify.php" method="POST">
<b>Login:</b> <br /><input type="text" name ="login" <?="value='$login'"?> maxlength="20"><br />
<script>document.indentify.login.focus();</script>
<b>Mot de pass:</b> <br /><input type="password" name="pass" maxlength="10"><br /><br />
<input type="submit" value="Valider" onclick="verif_form()">
</form>
<input type="button" onclick="javascript:window.close()" value="Annuler">
</body>
</html>