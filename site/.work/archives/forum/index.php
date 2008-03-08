<? 
(isset($PHPSESSID))?session_start():0;
require ("aff_table.inc");
require ("d_convert.inc");
?>
<html>
<head>
<title></title>
<style type="text/css">
<!--
a:link,a:active,a:visited { color : #000099; }
a:hover		{ text-decoration: underline; color : #DD6900; }
-->
</STYLE>
</head>
<body bgcolor="#f9eec3">
<? 
//echo $PHP_SELF;
?>
<table width="100%" height="100%" bgcolor="#ffffff">
<tr><td valign="top">
  <? include ("entete.php")?>
</td></tr>
<tr><td align="center" valign="top" height="100%">
  <? (!empty($recherche))?include("traite_recherche.php"):0 ?>
  <?
	include ("bd_connect.php");

	if (isset($ao) && (!empty($r_login) || !empty($r_date)))
	  {
	    if (!empty($r_login))
	      $where = "WHERE login='$r_login'".((!empty($r_date))?" $ao date='".d_convert($r_date)."'":"");
	    else
	      $where = "WHERE ".((!empty($r_login))?"login='$r_login' $ao ":"")."date='".d_convert($r_date)."'";
		$abs = 1;
	  }
	if ($abs == 1 || isset($where))
	  aff_abs_table($mess, $page, stripslashes($where));
	else
	  aff_table($mess, $page);
    
	include ("bd_close.php");
  ?>
</td></tr>
</table>
</body>
</html>