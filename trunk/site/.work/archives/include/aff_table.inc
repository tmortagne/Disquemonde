<?
require ("translate_sql_in_php.inc");

function aff_group($tab, $inc, $users_inf)
{
  global $mess;

  echo "<tr><td>";
  for ($i = 0; $i < $inc; $i++)
	  echo "<img src='' height='1' width='10' border='0'>";
  echo "<img src='' width='10' height='15' border='0'> ";
  echo "<a name='".$tab["nb_mess"]."' href='index.php?";
	echo "mess=".urlencode($tab["nb_mess"]);
	echo "#".$tab["nb_mess"]."'>";
  echo $tab["sujet"]."</a> ";
  echo "-- <a".(($users_inf[$tab["login"]]["mail"])?" href=mailto:".$users_inf[$tab["login"]]["mail"]:"").">";
  echo "<font size='-1'><i>".$tab["login"]."</i></font></a>";
  echo "</td><td align='right' nowrap>".d_convert($tab["date"])."</td>";
  echo "</tr>\n";

  if ($mess == $tab["nb_mess"])
	{
	  echo "<tr><td colspan='2'><br />\n";
	  echo $tab["texte"];
	  echo "<br /><br />\n";
	  echo "<table cellspacing='0' cellpadding='0' border='0'><tr>\n";
	  echo "<td><form action='index.php#".$tab["nb_mess"]."'>\n<input type='submit' value='Fermer'></form></td>\n";
      echo "<td><form action='post.php'>\n";
	  echo "<input type='submit' value='R&eacute;pondre'>\n";
	  echo "<input type='hidden' name='pere' value=".$tab["nb_mess"]."></form></td>\n";
	  echo "</tr></table>\n</td></tr>\n";
	}

  $res = mysql_query("SELECT nb_mess, sujet, login, date, time, texte, nb_pere FROM forum WHERE nb_pere=".$tab["nb_mess"]." ORDER BY date_s DESC");

  if (mysql_num_rows($res))
    while ($tab2 = mysql_fetch_array($res))
      aff_group($tab2, $inc + 1, $users_inf);
}

function aff_info($tab)
{
  echo "<b>&nbsp;".$tab["sujet"]."</b><br />\n";
  echo "Dernier message: <i>".d_convert($tab["date_s"])."</i><br />";
}

function aff_table($mess, $page)
{ 
  $page = (empty($page))?1:$page;
  $nb_p = mysql_num_rows(mysql_query("SELECT nb_mess FROM forum WHERE nb_pere='0'")) / 20;
  
  $res = mysql_query("SELECT * FROM forum WHERE nb_pere='0' ORDER BY date_s DESC LIMIT ".(($page-1)*20).", ".($page*20));

  $users_inf = translate_sql_in_php("SELECT login, mail, site FROM users");

  include ("prec_suiv.php");
  
  echo "\n<table border='0' width='99%'>\n";
  for ($n = 0, $c = 0; $tab = mysql_fetch_array($res); $n++, $c = 0)
	{
	  echo "<tr bgcolor='".(($n%2)?"eeffee":"eeeeff")."'><td width='300' valign='top'>";
	  aff_info($tab);
	  echo "</td><td><table cellpadding='0' cellspacing='0' border='0' width='100%'>\n";
	  aff_group($tab, 0, $users_inf);
	  echo "\n</table></td></tr>\n";
	}
  echo "\n</table>\n";
  echo "</form>";

  include ("prec_suiv.php");
}

function aff_abs_table($mess, $page, $where)
{
  $page = (empty($page))?1:$page;
  $nb_p = mysql_num_rows(mysql_query("SELECT nb_mess FROM forum")) / 30;

  $res = mysql_query("SELECT * FROM forum $where ORDER BY date,time DESC LIMIT ".(($page-1)*30).", ".($page*30));
  $users_inf = translate_sql_in_php("SELECT login, mail, site FROM users");

  include ("prec_suiv.php");

  echo "\n<table border='0' width='100%'>\n";
  echo "<tr bgcolor='#ffcccc'>";
  echo "<td nowrap><b>Sujet</b></td>";
  echo "<td align='center'nowrap><b>Login</b></td>";
  echo "<td nowrap><b>Date</b></td></tr>\n";
  for ($n = 0, $c = 0; $tab = mysql_fetch_array($res); $n++, $c = 0)
	{
	  echo "<tr bgcolor='".(($n%2)?"eeffee":"eeeeff")."'>\n";
	   echo "<td nowrap>";
		echo "<a name='".$tab["nb_mess"]."' href='index.php?";
		echo "where=".urlencode($where);
		echo "&mess=".urlencode($tab["nb_mess"]);
		echo "#".$tab["nb_mess"]."'>".$tab["sujet"]."</a>";
	   echo "</td>\n";
	   echo "<td nowrap align='center'>";
		echo "<a".(($users_inf[$tab["login"]]["mail"])?" href=mailto:".$users_inf[$tab["login"]]["mail"]:"").">";
		echo $tab["login"]."</a>";
	   echo "</td>\n";
	   echo "<td nowrap>".d_convert($tab["date"])." ".$tab["time"]."</td>\n";
	  echo "\n</tr>\n";
	  if ($mess == $tab["nb_mess"])
		{
		  echo "<tr bgcolor='".(($n%2)?"eeffee":"eeeeff")."'><td colspan='3'><br />\n";
		  echo $tab["texte"];
		  echo "<br /><br />\n";
		  echo "<table cellspacing='0' cellpadding='0' border='0'><tr>\n";
		  echo "<td><form action='index.php#".$tab["nb_mess"]."'>\n";
		  echo "<input type='hidden' name='where' value=\"$where\">";
		  echo "<input type='submit' value='Fermer'></form></td>\n";
		  echo "<td><form action='message.php'>\n";
		  echo "<input type='submit' value='R�pondre'>\n";
		  echo "<input type='hidden' name='pere' value=".$tab["nb_mess"]."></form></td>\n";
		  echo "</tr></table>\n</td></tr>\n";
	}

	}
  echo "\n</table>\n";

  include ("prec_suiv.php");
}
?>