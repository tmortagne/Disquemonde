<?
  require_once ("variables_error.inc");
  require_once ("variables_inf.inc");
  require_once ("aff_popup.inc");
?>
<?
if (!empty($login) && !empty($pass) && !empty($pass2) && $pass == $pass2)
{
  include ("bd_connect.php");
  if (mysql_num_rows(mysql_query("SELECT login FROM users WHERE login='$login'")))
	{
      $message .= $ERR_LOGIN_USE;
	  $login = "";
	}
  if (!empty($image) && mysql_num_rows($res = mysql_query("SELECT image, login FROM users WHERE image='$image'")))
	{
      $message .= $ERR_IMG_USE;
	  $image = "";
	}
  if (!isset($message))
    {
	  mysql_query("INSERT INTO users (login, pass, image, mail, site) VALUES ('".htmlentities($login, ENT_NOQUOTES)."', '$pass', '$image', '$mail', '$site')");
	  include ("bd_close.php");
	  if ($identify == "1")
	    {
	      session_start();
		  $LOGIN = $login;
		  $PASS = $pass;
		  session_register("LOGIN");
		  session_register("PASS");
	    }
	  header("Location: enreg.php?identify=$identify");
	  exit();
    }
  include ("bd_close.php");
}
?>
<html>
<head>
<title>Inscription</title>
<script language=javascript>
function verif_form()
{
  var mess="";
  if (!this.document.enreg.login.value)
	mess += "Il faut un login.\n";
  if (!this.document.enreg.pass.value)
	mess += "Il faut un mot de passe.\n";
  else
    if (this.document.enreg.pass.value != this.document.enreg.pass2.value)
	  mess += "Vous avez mal retap� le mot de passe.\n";
  if (this.document.enreg.image.value && this.document.enreg.image.value.indexOf(".jpg") == -1 && this.document.enreg.image.value.indexOf(".gif") == -1 && this.document.enreg.image.value.indexOf(".pnj") == -1)
	mess += "Format d'image incorrect, il faut du gif, du jpg ou du pnj.\n"
  if (this.document.enreg.login.value && (this.document.enreg.login.value.indexOf(" ") != -1 || this.document.enreg.login.value.indexOf("-") != -1 || this.document.enreg.login.value.indexOf("'") != -1 || this.document.enreg.login.value.indexOf("\"") != -1))
	mess += "Vous avez mit un caract�re interdit dans le login.\n"
  if (mess)
    alert(mess);
  else
	this.document.enreg.submit();
}
</script>
</head>
<body>
<font color='#ff0000'><?=$message?></font>
<form name="enreg" action="inscription.php" method="POST">

<table width="100%">
<tr><td nowrap bgcolor="#eeffee"><strong><u>Indispensables</u></strong><br /><br />
<b>Login:</b><br />
<input type="text" name ="login" value="<?=stripslashes($login)?>" maxlength="20"><br />
<script>document.enreg.login.focus();</script>
<b>Mot de pass:</b><br />
<input type="password" name="pass" maxlength="10"><br />
<b>Retaper le mot de passe:</b><br />
<input type="password" name="pass2" maxlength="10"><br />
</td>
<td nowrap bgcolor="#eeeeff"><strong><u>Obtionnels</u></strong><br /><br />
<b>Adresse de l'image:</b><br />
<input type="text" name="image" value="<?=stripslashes($image)?>" maxlength="100"> <a <? aff_popup("inf.php", "Image", $INF_IMG, 300, 300, "00000100") ?>>?</a><br />
<b>Mail:</b><br />
<input type="text" name="mail" value="<?=stripslashes($mail)?>" maxlength="42"> <a <? aff_popup("inf.php", "Mail", $INF_MAIL, 300, 300, "00000100") ?>>?</a><br />
<b>Site web:</b><br />
<input type="text" name="site" value="<?=stripslashes($site)?>" maxlength="100"> <a <? aff_popup("inf.php", "Site+web", $INF_SITE, 300, 300, "00000100") ?>>?</a><br />
</td></tr></table>
<input type="checkbox" name="identify" value="1" checked> S'identifier apr�s l'inscription.<br />
<input type="button" accesskey="c" value="Enregistrer" onclick="verif_form()">
</form>
<input type="button" onclick="javascript:window.close()" value="Annuler">
</body>
</html>