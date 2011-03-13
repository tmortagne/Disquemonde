<?
  require_once ("variables_bd.inc");
  $bd_connect = mysql_connect($mysql_host, $mysql_login, $mysql_pass);
  mysql_select_db($mysql_dbnom);
?>