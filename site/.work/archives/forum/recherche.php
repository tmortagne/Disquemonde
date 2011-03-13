<?
  (isset($PHPSESSID))?session_start():0;
?>
<html>
<head>
<title>Recherche</title>
<style type="text/css">
<!--
a:link,a:active,a:visited { color : #000099; }
a:hover		{ text-decoration: underline; color : #DD6900; }
-->
</style>
</head>
<body bgcolor="#f9eec3">
<table width="100%" height="100%" bgcolor="#ffffff">
<tr><td valign="top">
<? include ("entete.php") ?>
<center><form action="index.php">
<table width="80%">
<tr>
<td bgcolor="#eeffee" nowrap>
Auteur <br />
Titre <br />
Texte <br />
</td>
<td bgcolor="#eeeeff" nowrap>
<input type="text" name="r_login"><br />
<input type="text" name="r_sujet"><br />
<input type="text" name="r_texte"><br />
</td>
</tr><tr>
<td bgcolor="#eeffee" nowrap>
Date <br />
Depuis <br />
</td>
<td bgcolor="#eeeeff" nowrap>
<input type="text" name="r_date"> format AAAA-MM-JJ<br />
<input type="text" name="r_nb" size="4"> 
<select name="r_depuis">
<option value="heure">Heures</option>
<option value="jour">Jours</option>
<option value="semaine">Semaines</option>
<option value="moi">Mois</option>
<option value="an">An</option>
</select> <font color="red">DEPUIS a la priorit� sur DATE</font>
</td>
</tr><tr>
<td nowrap bgcolor="#eeffee">
Affichage par 
</td>
<td bgcolor="#eeeeff" nowrap>
<input type="radio" name="aff" value="sujet" checked>Sujet 
<input type="radio" name="aff" value="mess">Message 
</td>
</tr><tr>
<td bgcolor="#eeffee" nowrap>
Trier par<br />
Ordre
</td>
<td bgcolor="#eeeeff" nowrap>
<select name="sort">
<option value="date">Date</option>
<option value="login">Auteur</option>
<option value="sujet">Titre</option>
</select><br />
<input type="radio" name="ord" value="dc" checked>D�croissant 
<input type="radio" name="ord" value="c">Croissant 
</td>
</tr>
<tr><td colspan="2"><input type="submit" value="Rechercher"></td></tr>
</table>
</form></center>

</td></tr>
</table>
</body>
</html>