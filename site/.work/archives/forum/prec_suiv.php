<?
  if ($nb_p > 1)
    {
      echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr>";
      echo "<td valign='middle' align='left'>";
      echo ($page!=1)?"<a href='index.php?page=".($page-1)."'><img src='' alt='Pécédent'></a>":"<img src='' alt='Précédent'>";
      echo "</td><td width='100%' align='center' valign='middle'>";
      for ($n = 0; $n < $nb_p; $n++)
        if ($n == $page - 1)
	  echo " <font color='#ff0000'>$page</font> ";
	else
	  echo " <a href='index.php?page=".($n+1)."'>".($n+1)."</a> ";
      echo "</td><td align='right' valign='middle'>";
      echo ($nb_p-$page > 0)?"<a href='index.php?page=".($page+1)."'><img src='' alt='Suivant'></a>":"<img src='' alt='Suivant'>";
      echo "</td></tr></table>\n";
    }
?>