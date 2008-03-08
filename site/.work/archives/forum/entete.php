<? require_once ("aff_popup.inc") ?>

<h1 align='center'>Forum du Disque-Monde</h1>
<?
  if (isset($LOGIN))
    {
      echo "<p align='center'><b>$LOGIN</b> \n<a ";
	  aff_popup("options.php", "", "", 300, 500, "00001100");
	  echo ">Pr�f�rances</a> \n<a ";
	  aff_popup("unidentify.php", "", "", 50, 1, "00000000");
	  echo ">Se d�connecter</a>\n</p>\n";
    }
?>

<br />

<!-- <p align='left'><?=(($site)?"N'afficher que le forum":"Afficher dans le site")?></p> -->

<p align="center">
  <a <? aff_popup("identify.php", "", "", 200, 200, "00001100") ?>><?=((!empty($LOGIN))?"Changer d'utilisateur":"S'identifier")?></a>&nbsp; &nbsp;
  <a <? aff_popup("inscription.php", "", "", 400, 300, "00001100") ?>>S'inscrire comme membre</a> &nbsp; &nbsp;
  <a href="recherche.php">Recherche</a> &nbsp; &nbsp;
  <a <? aff_popup("faq.php", "", "", "", "", "00001100") ?> title="Toute la doc utile pour ce forum">FAQ</a> &nbsp; &nbsp;
</p>

<br />
<a href='index.php'>Accueil</a> 
<a href='post.php?pere=0'>Nouveau sujet</a> 