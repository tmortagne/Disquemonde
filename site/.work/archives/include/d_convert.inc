<?
function d_convert($date)
{
  $tab = split(" ", $date);
  $tab2 = split("-", ($tab[0]));
  return ("$tab2[2]-$tab2[1]-$tab2[0]".((!empty($tab[1]))?" $tab[1]":""));
}
?>