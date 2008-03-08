<?
function is_equaln($str1, $str2, $a, $b)
{
  for ($n == 0; !strcasecmp($str1[$a], $str2[$n]); $n++, $a++)
    if ($n == $b - 1)
	  return (0);
  return (1);
}

function is_filtre($str, $n)
{
  for ($i = 0, include("filtre.inc"); $filtre[$i]; $i++)
    if (!is_equaln($str, $filtre[$i]." ", $n, strlen($filtre[$i]) + 1) || !is_equaln($str, $filtre[$i].">", $n, strlen($filtre[$i]) + 1) || !is_equaln($str, "/".$filtre[$i].">", $n, strlen($filtre[$i]) + 2))
	  return ($i + 1);
  return (0);
}

function filtrer_a($str, $n)
{
  for (; $str[$n] == " "; $n++);
  $str = substr_replace($str, " target=\"_blank\" ", $n, 0);
  $n += 17;
  for (; $str[$n] && $str[$n] != ">"; $n++)
	{
	  if (!is_equaln($str, "href=", $n, 5))
		{
		  $c = $str[$n + 5];
		  if ($c == "\"" || $c == "'")
			for ($n += 6; $str[$n] && ($str[$n - 1] == "\\" || $str[$n] != $c); $n++);
		  else
			for ($n += 5; $str[$n + 1] && $str[$n + 1] != ">" && $str[$n] !== " "; $n++);
	    }
	  else
		{
		  for ($i == 0; $str[$n + $i] && $str[$n + $i] != ">" && $str[$n + $i] != " "; $i++)
			if ($str[$n + $i] == "\"" || $str[$n + $i] == "'")
			  for ($c = $str[$n + $i], $i++; $str[$n + $i] != $c; $i++);
		  $str = substr_replace($str, "", $n, $i + (($str[$n+$i]==" ")?1:0));
		  $n--;
		}
	  for (; $str[$n + 1] == " "; $n++);
    }
  return ($str);
}

function filtrer($str)
{
  include("filtre.inc");
  for ($n = 0; $str[$n]; $n++)
    if ($str[$n] == "<" && ($balise = is_filtre($str, $n + 1)))
	  {
	    if ($balise == 1 && $str[$n + 1] != "/")
		  $str = filtrer_a($str, $n + 2);
	    for ($n++; $str[$n] != ">" && $str[$n + 1]; $n++);
	  }
	else
	  if ($str[$n] && ($str[$n] == "\"" || $str[$n] == "'" || $str[$n] == "<" || $str[$n] == ">"))
		$str = substr_replace($str, htmlspecialchars($str[$n], ENT_QUOTES), $n, 1);
 return ($str);
}

function clean_str($str)
{
  for ($n = 0; $str[$n]; $n++)
	{
	  if ($str[$n] == "\\")
		$str = substr_replace($str, htmlspecialchars($str[$n + 1], ENT_QUOTES), $n, 2);
	  if ($str[$n] == "<")
	    for ($n++; $str[$n] != ">" && $str[$n]; $n++);
	  if (($var = $str[$n]) == "\"" || ($var = $str[$n]) == "'")
	    {
		  $str = substr_replace($str, "", $n, 1);
	      for (; $str[$n] != $var && $str[$n]; $n += $i)
			{
			  $i = strlen(($s = htmlspecialchars($str[$n], ENT_QUOTES)));
			  $str = substr_replace($str, $s, $n, 1);
			}
		  $str = substr_replace($str, "", $n, 1);
	    }
    }
  return ($str);
}
?>