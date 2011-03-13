<?
$INF_MAIL = urlencode("Si vous en mettez un, il apparaitra dans le forum sous forme de lien sur votre login");
$INF_IMG = urlencode("Pas plus de 100&times;100 et assayez de l&acute;obtimiser au mieu... Et surtout pas de bmp mais j&acute;espere que ce n&acute;est pas la peine de le dire. Dans l&acute;id�al y faudrait pas qu&acute;elle fasse plus de 5 ou 6ko environ. Les formats accept�s sont jpg, gif et pnj");
$INF_SITE = urlencode("Ca c&acute;est de la pub pour vous");
require ("filtre.inc");
$INF_BALISES = urlencode("<font color='#ff0000'>&lt".implode("&gt</font>, <font color='#ff0000'>&lt", $filtre)."&gt</font><br /><br />Tout ce que vous placez entre <font color='#ff0000'>\"</font> ou <font color='#ff0000'>'</font> ou tout caract�re pr�c�d� de <font color='#ff0000'>\\</font> sera consid�r� comme du texte et non du code (y compris ', \" et \\)");
?>