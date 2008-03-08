<?
function translate_sql_in_php($sql)
{
  $res = mysql_query($sql);

  for (; $tab2 = mysql_fetch_array($res); $tab[$tab2[0]] = $tab2);

  return ($tab);
}
?>