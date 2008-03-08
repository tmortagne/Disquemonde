<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?

include('include/common.php');

$flag = array(
'fr_fr' => 'france',
'en_en' => 'england');

$lang_target = array(
'en_en' => 'fr_fr',
'fr_fr' => 'en_en');

$has_prev = TRUE;
$has_next = TRUE;

$type = 'single';

include('infos/' . $_GET['book'] . '.php');

function getFlag()
{
  global $flag, $lang_target;

  return $flag[$lang_target[$_GET['lang']]];
}

function getPrevLink()
{
  global $prev_book;
  global $title;

  return getBookLink($prev_book[$_GET['lang']], $_GET['lang']);
}

function getPrevName()
{
  global $prev_book;

  if (!isset($prev_book[$_GET['lang']]))
  {
    return FALSE;
  }

  $book_id = $prev_book[$_GET['lang']];

  $tmp = $prev_book;
  include('infos/' . $book_id . '.php');
  $prev_book = $tmp;

  return $title[$_GET['lang']];
}

function getNextLink()
{
  global $next_book;

  return getBookLink($next_book[$_GET['lang']], $_GET['lang']);
}

function getNextName()
{
  global $next_book;

  if (!isset($next_book[$_GET['lang']]))
  return FALSE;

  $book_id = $next_book[$_GET['lang']];

  $tmp = $next_book;
  include('infos/' . $book_id . '.php');
  $next_book = $tmp;

  return $title[$_GET['lang']];
}
?>

<html>
<head>

<title>C'est quoi le Disque-monde de Terry Pratchett? -- <? print $title[$_GET['lang']] ?></title>
<meta name="auteur" content="Tuska M." />
<meta name="date" content="25 Novembre 2000" />

<link rel="stylesheet" href="biblio_pages.css" />

<script language="JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link rel="stylesheet" href="../general/p.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body onload="MM_preloadImages('images/<? print getFlag() ?>2.gif')">
<table border="0" cellspacing="0" cellpadding="0" width="100%">

  <tr>

    <td width="40" height="40"><img src="images/backul.jpg" width="40"
      height="40" /></td>

    <td background="images/backup.jpg" width="100%">&nbsp;</td>

    <td width="40"><img src="images/backur.jpg" width="40" height="40" /></td>
  </tr>

  <tr>

    <td background="images/backleft.jpg" height="100%">&nbsp;</td>

    <td background="images/back.jpg" valign="top" align="center"><a
      name="top"></a>
    <table width="670">
      <tr>
        <td width="100%"><?
        if ($has_prev == TRUE && getPrevName() != FALSE)
        print '<a href="'. getPrevLink() . '"><img src="images/precedent.gif" border="0" alt="' . htmlentities(getPrevName()) . '" width="50" height="51"></a>';
        else
        print '<img src="images/precedenti.gif" border="0" width="50" height="51">';
        ?> <a href="biblio.php"><img src="images/songbook.gif"
          width="82" height="51" border="0"
          alt="Retour à la page Bibliographie" /></a> <?
          if ($has_next == TRUE && getNextName() != FALSE)
          print '<a href="'. getNextLink() . '"><img src="images/suivant.gif" border="0" alt="' . htmlentities(getNextName()) . '" width="50" height="51"></a>';
          else
          print '<img src="images/precedenti.gif" border="0" width="50" height="51">';
          ?></td>
          <?
          if (hasLang($_GET['book'], $lang_target[$_GET['lang']]) == TRUE)
          {
            print '<td align="right"><a href="' . getBookLink($_GET['book'], $lang_target[$_GET['lang']]) . '" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage(\'Image11\',\'\',\'images/' . getFlag() . '2.gif\',1)"><img name="Image11" border="0" src="images/' . getFlag() . '.gif" alt="Version anglaise"></a></td>';
          }
          ?>
      </tr>
      <? include('biblio_' . $type . '.php'); ?>
    </table>
    <div align="right"><a href="#top">Haut de la page</a></div>
    </td>


    <td background="images/backright.jpg">&nbsp;</td>
  </tr>

  <tr>

    <td height="40"><img src="images/backbl.jpg" width="40" height="40" /></td>

    <td background="images/backbot.jpg" width="100%">&nbsp;</td>

    <td><img src="images/backbr.jpg" width="40" height="40" /></td>
  </tr>

</table>

<script src="http://www.google-analytics.com/urchin.js"
  type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-1810468-1";
urchinTracker();
</script>
</body>
</html>
