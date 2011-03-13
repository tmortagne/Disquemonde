<?
(isset($PHPSESSID))?session_start():0;
require ("variables_inf.inc");
require ("filtrer.inc");
require ("update_s.inc");
require ("d_convert.inc");
require ("test_valid.inc");
?>
<?
if (!empty($texte) && !empty($sujet))
{
  if (test_valid($texte, 0))
	$message .= "Il y a une erreur html dans ce texte. Si j'affiche �a, ce sera le bordel.<br />\n";
  $texte = stripslashes($texte);
  $sujet = htmlspecialchars(stripslashes($sujet), ENT_QUOTES);
  if (isset($LOGIN) && (empty($login) || empty($pass)))
	{
	  $login = $LOGIN;
	  $pass = $PASS;
	}
  include ("bd_connect.php");
  if (empty($login) || empty($pass) || !mysql_num_rows(mysql_query("SELECT login FROM users WHERE login='$login' AND pass='$pass'")))
	$message .= "D�sol� mais le mot de passe ou le login sont incorrects.<br />\n";
  if (!isset($message))
    {
	  $time = date("H:i:s");
	  $date = date("Y/m/d");
	  $date_s = $date." ".$time;
	  update_date_s($pere, $date_s);

	  echo filtrer(clean_str($texte))."<br />\n";
/*
	  mysql_query("INSERT INTO forum (nb_pere, login, sujet, texte, date, time, date_s) VALUES ('$pere', '$login', '$sujet', '".addslashes(nl2br(filtrer(clean_str($texte))))."', '$date', '$time', '$date_s')");
	  include ("bd_close.php");
	  */
	  header("Location: index.php#$pere");
	  exit();
    }
  include ("bd_close.php");
}
?>
<html>
<head>
<style type="text/css">
<!--
a:link,a:active,a:visited { color : #000099; }
a:hover		{ text-decoration: underline; color : #DD6900; }
-->
</style>
<script language=javascript>
function verif_form()
{
  var mess="";
  if (!this.document.message.sujet.value)
	mess += "Il faut un sujet.\n";
  if (!this.document.message.texte.value)
	mess += "Vous �tes sur que vous ne voulez pas �crire un petit quelque chose?\n";
  if (mess)
    alert(mess);
  else
	this.document.message.submit();
}
</script>
</head>
<body bgcolor="#f9eec3">
<table width="100%" height="100%" bgcolor="#ffffff">
<tr><td valign="top">
<? include ("entete.php") ?>
<?
if (!empty($pere))
{
  include ("bd_connect.php");
  $res = mysql_query("SELECT texte, sujet, login, date, time FROM forum WHERE nb_mess='$pere'");
  echo "<table border='1' width='100%'>";
  $p_sujet = mysql_result($res, 0, 'sujet');
  echo "<tr><td><b>Titre:</b> $p_sujet</td></tr>";
  echo "<tr><td>Auteur: ".mysql_result($res, 0, 'login')."<br />";
  echo "Date: ".d_convert(mysql_result($res, 0, 'date'))." ".mysql_result($res, 0, 'time')."<br />";
  echo "<br />".mysql_result($res, 0, 'texte')."</td></tr>";
  echo "</table><br /><br />";
  include ("bd_close.php");
  $sujet = "RE: $p_sujet";
}
?>
<font color="#ff0000"><?=$message?></font>

<form name="message" action="post.php">
<b>Titre:</b> <input type="text" name ="sujet" size="50" value="<?=$sujet?>"><br />
<script>document.message.sujet.focus()</script>
<textarea name="texte" rows="10" cols="60"><?=$texte?></textarea><br />
Vous avez le droit a certaines balises html mais attention � la syntaxe: 
<a <? aff_popup("inf.php", "Balises+html+accept�es", $INF_BALISES, 300, 300, "00000100") ?>>liste des balises accept�es et des inibiteurs</a>.
<br />
<input type="button" value="Envoyer" onclick="verif_form()"> 
<input type="reset" value="Effacer">
<input type="hidden" name="pere" value="<?=$pere?>"><br /><br /><hr>
login: <input type="text" name="login" value="<?=$login?>"> mail: <input type="password" name="pass"> Si vous n'�tes pas identifi�.
</form>
</td></tr>
</table>
</body>
</html>