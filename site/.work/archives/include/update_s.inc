<?
function update_date_s($nb_pere, $date)
{
  if (!$nb_pere)
    return(0);
  $res = mysql_query("SELECT nb_pere FROM forum WHERE nb_mess='$nb_pere'");
  mysql_query("UPDATE forum SET date_s='$date' WHERE nb_mess='$nb_pere'");
  update_date_s(mysql_result($res, 0, 'nb_pere'), $date);
}
?>