<?
function test_valid2($str, $n)
{
  for (; $str[$n] != "\"" && $str[$n] != "'"; $n++)
	{
	  if ($str[$n] == ">")
	    return (0);
	  if (!$str[$n])
	    return (1);
	}
  for ($var = $str[$n], $n++; $str[$n] != $var; $n++)
	if (!$str[$n] || $str[$n] == ">")
	  return(1);
  return(test_valid2($str, $n + 1));
}

function test_valid($str, $n)
{
  for (; $str[$n] != "<"; $n++)
	if (!$str[$n])
	  return(0);
  if (test_valid2($str, $n))
	return (1);
  for ($n++; $str[$n] != ">"; $n++)
	if (!$str[$n] || $str[$n] == "<")
	  return (1);
  return (test_valid($str, $n));
}
?>