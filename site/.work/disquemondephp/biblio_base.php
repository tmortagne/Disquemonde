<?php

$flag = array(
'en_en' => 'france',
'fr_fr' => 'england');

include('infos/' . $_GET['book'] . '.php');


?>

<html>
<head>
	
<title>C'est quoi le Disque-monde de Terry Pratchett? -- <? print $title[$_GET['lang']] ?></title>
	<meta name="auteur" content="Tuska M.">
	<meta name="date" content="25 Novembre 2000">

	<link rel="stylesheet" href="../../biblio/biblio_pages.css">

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
<link rel="stylesheet" href="../../general/p.css" type="text/css">
</head>

<body onLoad="MM_preloadImages('../../biblio/images/<? print $flag[$_GET['lang']] ?>2.gif')">
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%">

	<tr>	
		
    <td width="40" height="40"><img src="../../biblio/images/backul.jpg" width="40" height="40"></td>
		
    <td background=../../biblio/images/backup.jpg width="100%">&nbsp;</td>
		
    <td width="40"><img src="../../biblio/images/backur.jpg" width="40" height="40"></td>
	</tr>

	<tr>	
		
    <td background=../../biblio/images/backleft.jpg height="100%">&nbsp;</td>
		
    <td background=../../biblio/images/back.jpg valign="top" align="center"> 
      <table width="670">
        <tr> 
          <td width="100%"><a href="../../biblio/the_last_continent_fr.html"><img src="../../biblio/images/precedent.gif" border="0" alt="Le dernier continent" width="50" height="51"></a> 
            <a href="../../biblio/biblio.php"><img src="../../biblio/images/songbook.gif" width="82" height="51" border="0" alt="Retour � la page Bibliographie"></a> 
            <a href="../../biblio/the_fifth_elephant_fr.html"><img src="../../biblio/images/suivant.gif" border="0" alt="Le cinqui&egrave;me &eacute;l&eacute;phant"></a></td>
          <td align="right"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image11','','../../biblio/images/<? print $flag[$_GET['lang']] ?>2.gif',1)"><img name="Image11" border="0" src="../../biblio/images/<? print $flag[$_GET['lang']] ?>.gif" alt="Version anglaise"></a></td>
        </tr>
        <tr valign="middle" align="center"> 
          <td colspan="2"> <img src="../../biblio/<? print $cover1[$_GET['lang']] ?>" align="left" height="200"> 
            <img src="../../biblio/<? print $cover2[$_GET['lang']] ?>" alt="Arri&egrave;re du livre" height="200" align="right"> 
            <div><br />
              <br />
              <br />
			  <?
			  print '<h1>' . $title[$_GET['lang']] . '</h1>';
			  
			  if ($_GET['lang'] != 'en_en')
			    print '<p>' . $title['en_en'] . '</p>';
			  ?>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2"><br /><? include('infos/' . $_GET['book'] . '_' . $_GET['lang'] . '.html') ?><br />
            </td>
        </tr>
      </table>
    </td>

		
    <td background=../../biblio/images/backright.jpg>&nbsp;</td>
  </tr>

	<tr>	
		
    <td background=../../biblio/images/backbl.jpg height="40"><img src="../../biblio/images/backbl.jpg" width="40" height="40"></td>
		
    <td background=../../biblio/images/backbot.jpg width="100%">&nbsp;</td>
		
    <td><img src="../../biblio/images/backbr.jpg" width="40" height="40"></td>
	</tr>

	</table>

</body>
</html>
