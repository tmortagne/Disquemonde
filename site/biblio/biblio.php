<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?
include ('include/common.php');

$editors_table = array ();

$editors_table['fr_fr'] = array (
	'P' => 'Pocket',
	'A' => 'L\'Atalante',
	'JL' => 'J\'ai lu',
	'C' => 'City',
	'ADV' => 'Au Diable Vauvert'
);

$editors_table['en_en'] = array (
	'C' => '$Corgi',
	'CS' => 'Colin Smythe',
	'D' => 'Doubleday',
	'EOS' => 'EOS',
	'TP' => 'Transworld Publ.',
	'E' => 'Ebury',
	'G' => 'GollancZ',
	'H' => 'HarperCollins',
	'O' => 'OriON'
);

function strFromArray($editors)
{
	if (!isset ($editors))
		return '';

	$str = '';

	foreach ($editors as $ed)
	{
		if ($str != '')
			$str .= ', ';
		$str .= $ed;
	}

	return $str;
}

function printBookEnFr($book)
{
	include ('infos/' . $book . '.php');

	$str = '';

	if (isset ($book_number))
	{
		if ($book_number == 0)
			$str = '-- - ';
		else
		{
			$str = $book_number . ' - ';
			if ($book_number < 10)
				$str = '0' . $str;
		}
	}
	
	if (isset($title))
		$str .= $title['en_en'];

	$ed = '';

	if (isset ($editors))
		$ed = strFromArray($editors['en_en']);

	if ($ed != '')
		$str .= ' <span class="ed-en">(' . $ed . ')</span>';

	if (isset ($title['fr_fr']) && $title['fr_fr'] != '' && $title['fr_fr'] != '---')
	{
		$ed = strFromArray($editors['en_en']);

		$str .= ' / ';
		$str .= $title['fr_fr'];

		$ed = '';

		if (isset ($editors))
			$ed = strFromArray($editors['fr_fr']);

		if ($ed != '')
			$str .= ' <span class="ed">(' . $ed . ')</span>';
	}

	if (isset ($author))
	{
		$str .= ' (' . $author . ')';
	}

	print $str;
}

function printBookEnFrLink($book)
{
	include ('infos/' . $book . '.php');

	$str = '';

	if (isset ($book_number))
	{
		if ($book_number == 0)
			$str = '-- - ';
		else
		{
			$str = $book_number . ' - ';
			if ($book_number < 10)
				$str = '0' . $str;
		}
	}

	$str .= '<a href="' . getBookLink($book, 'en_en') . '">' . $title['en_en'] . '</a>';

	$ed = '';

	if (isset ($editors))
		$ed = strFromArray($editors['en_en']);

	if ($ed != '')
		$str .= ' <span class="ed-en">(' . $ed . ')</span>';

	if (isset ($title['fr_fr']))
	{
		$ed = strFromArray($editors['en_en']);

		$str .= ' / ';
		$str .= '<a href="' . getBookLink($book, 'fr_fr') . '">' . $title['fr_fr'] . '</a>';

		$ed = '';

		if (isset ($editors))
			$ed = strFromArray($editors['fr_fr']);

		if ($ed != '')
			$str .= ' <span class="ed">(' . $ed . ')</span>';
	}

	if (isset ($author))
	{
		$str .= ' (' . $author . ')';
	}

	print $str;
}
?>

<html>
	<head>
  	<title>C'est quoi le Disque-monde de Terry Pratchett? -- Bibliographie</title>
  	<meta name="auteur" content="Tuska M." />
  	<meta name="date" content="25 Novembre 2000" />
  	<meta name="DESCRIPTION" content="Liste et description des bouquins de Terry Pratchett" />

  	<link rel="stylesheet" href="biblio.css" />
  	<link rel="stylesheet" href="../general/mail.css" type="text/css" />
	<link href="../general/souris.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
		<a name="haut"></a>
		<table width="50" align="left">
  		<tr>
				<td width="42">&nbsp;</td>
  		</tr>
	</table>
  	
<table width="760">
  <tr>
      	<td align="center" colspan="2"><img src="images/biblio_titre.gif" width=300 /><br />
    <br /></td>
  </tr>
  		<tr>
		  	
    <td colspan="2"> <p class="p1">Vous voil&agrave; dans la bibliographie du 
        Sieur Pratchett (<span class="souris">ça se voit pas?</span>). Il y a ici toute la série des Disque-Monde 
        ainsi que d'autres livres écrits par le Maître. Vous pourez aussi trouver 
        des ouvrages qui, bien que n'étant pas écrits par Pratchett (il a tout 
        de même participé un peu), font référence au monde loufoque peuplé de 
        magiciens ratés, de nains, de trolls... </p>
        	
      <p class="p">J'ai mis les titres en VO et en Français pour ceux qui sont 
        traduits ainsi que les &eacute;ditions o&ugrave; vous les trouverez en 
        fran&ccedil;ais (<span class="ed">P : Pocket // A : L'Atalante // JL : 
        J'ai lu // C : City // ADV : Au Diable Vauvert</span>) et celles, non-exhaustives et parfois aproximatives, en anglais (<span class="ed-en">C : Corgi // CS : Colin Smythe // D : Doubleday // EOS : EOS // TP : Transworld Publ. // E: Ebury  // G : GollancZ   // H : HarperCollins  // O : OriON </span>). </p>
      <ul>
        <li><strong><u>The Discworld Novels / Les Annales du Disque-Monde</u></strong> 
          <ul>
		    <li><? printBookEnFrLink('the_colour_of_magic') ?></li>
            <li><? printBookEnFrLink('the_light_fantastic') ?></li>
            <li><? printBookEnFrLink('equal_rites') ?></li>
            <li><? printBookEnFrLink('mort') ?></li>
            <li><? printBookEnFrLink('sourcery') ?></li>
            <li><? printBookEnFrLink('wyrd_sisters') ?></li>
            <li><? printBookEnFrLink('pyramids') ?></li>
            <li><? printBookEnFrLink('guards_guards') ?></li>
            <li><? printBookEnFrLink('faust_eric') ?></li>
            <li><? printBookEnFrLink('moving_pictures') ?></li>
            <li><? printBookEnFrLink('reaper_man') ?></li>
            <li><? printBookEnFrLink('witches_abroad') ?></li>
            <li><? printBookEnFrLink('small_gods') ?></li>
            <li><? printBookEnFrLink('lords_and_ladies') ?></li>
            <li><? printBookEnFrLink('men_at_arms') ?></li>
            <li><? printBookEnFrLink('soul_music') ?></li>
            <li><? printBookEnFrLink('interesting_times') ?></li>
            <li><? printBookEnFrLink('maskerade') ?></li>
            <li><? printBookEnFrLink('feet_of_clay') ?></li>
            <li><? printBookEnFrLink('hogfather') ?></li>
            <li><? printBookEnFrLink('jingo') ?></li>
            <li><? printBookEnFrLink('the_last_continent') ?></li>
            <li><? printBookEnFrLink('carpe_jugulum') ?></li>
            <li><? printBookEnFrLink('the_fifth_elephant') ?></li>
            <li><? printBookEnFrLink('the_truth') ?></li>
            <li><? printBookEnFrLink('thief_of_time') ?></li>
            <li><span class="ed-error">(28)</span> <? printBookEnFrLink('night_watch') ?></li>
            <li><span class="ed-error">(29</span>) <? printBookEnFrLink('monstruous_regiment') ?></li>
            <li><span class="ed-error">(30</span>) <? printBookEnFrLink('going_postal') ?></li>
            <li><span class="ed-error">(31</span>) <? printBookEnFrLink('thud') ?></li>
			<li><span class="ed-error">(32</span>) <? printBookEnFrLink('making_money') ?></li>
            <br />
			<li><span class="ed-error">(27)</span> <? printBookEnFrLink('the_last_hero') ?></li>
            <li><? printBookEnFrLink('where_s_my_cow') ?></li>
            <p class="ed-error">(Bon apparemment Atalante s'est un peu mélangé les pinceaux à cause de Le dernier Héro et on retrouve des numérotations décalées à partir de Ronde de nuit et donc Le Dernier Héro à été estampillé tome 27)</p>
            <li><? printBookEnFrLink('_discworld_children_s_novel') ?>
              <ul>
			    <li><? printBookEnFr('_discworld_children_s_novel/the_amazing_maurice_and_his_educated_rodents') ?></li>
				<li><? printBookEnFr('_discworld_children_s_novel/the_wee_free_men') ?></li>
				<li><? printBookEnFr('_discworld_children_s_novel/a_hat_full_of_sky') ?></li>
				<li><? printBookEnFr('_discworld_children_s_novel/wintersmith') ?></li>
				<li><? printBookEnFr('_discworld_children_s_novel/when_i_am_old_i_shall_wear_midnight') ?></li>
              </ul>
            </li>
            <br />
			<li><? printBookEnFrLink('_disc_compiles') ?>
              <ul>
			    <li><? printBookEnFr('_disc_compiles/the_first_discworld_novels') ?></li>
				<li><? printBookEnFr('_disc_compiles/the_witches_trilogy') ?></li>
				<li><? printBookEnFr('_disc_compiles/death_trilogy') ?></li>
				<li><? printBookEnFr('_disc_compiles/the_rincewind_trilogy') ?></li>
				<li><? printBookEnFr('_disc_compiles/city_watch_trilogy') ?></li>
				<li><? printBookEnFr('_disc_compiles/the_gods_trilogy') ?></li>
              </ul>
            </li>
          </ul>
          <p class="p1"><b>*Les Annales du Disque-Monde sont traduites par Patrick 
            Couton.*</b></p>
        </li>
		<li><strong><? printBookEnFrLink('_johnny_maxwell') ?></strong>
          <ul>
		    <li><? printBookEnFr('_johnny_maxwell/only_you_can_save_mankind') ?></li>
			<li><? printBookEnFr('_johnny_maxwell/johnny_and_the_dead') ?></li>
			<li><? printBookEnFr('_johnny_maxwell/johnny_and_the_bomb') ?></li>
			<li><? printBookEnFr('_johnny_maxwell/the_johnny_maxwell_trilogy') ?></li>
          </ul>
        </li>
        <br />
		<li><strong><? printBookEnFrLink('_gnomes') ?></strong>
          <ul>
		    <li><? printBookEnFr('_gnomes/truckers') ?></li>
			<li><? printBookEnFr('_gnomes/diggers') ?></li>
			<li><? printBookEnFr('_gnomes/wings') ?></li>
			<li><? printBookEnFr('_gnomes/the_bromeliad_trilogie') ?></li>
          </ul>
        </li>
        <br />
		<li><strong><? printBookEnFrLink('_others') ?></strong>
          <ul>
		    <li><? printBookEnFr('_others/good_omens') ?></li>
			<li><? printBookEnFr('_others/strata') ?></li>
			<li><? printBookEnFr('_others/the_dark_side_of_the_sun') ?></li>
			<li><? printBookEnFr('_others/the_carpet_people') ?></li>
			<li><? printBookEnFr('_others/the_unadulterated_cat') ?></li>
          </ul>
        </li>
        <br />
        <li><strong><u>Short stories / Nouvelles</u></strong> 
          <ul>
            <li>The Hades Business</li>
            <li>Twenty Pence with Envelope and Seasonal Greetings</li>
            <li>Final Reward</li>
            <li>Sphinx</li>
            <li>Turntables of the Night</li>
            <li># ifdefDEBUG + &quot;world/enough&quot; + &quot;time&quot;</li>
            <li>Hollywood Chickens</li>
            <li>Troll Bridge / Drame de Troll (dans la section <a href="../histoires/troll.html">Histoires</a>)</li>
            <li>Theatre of Cruelty / Le Theatre de la Cruaut&eacute; (dans la 
              section <a href="../histoires/cruaute.html">Histoires</a>)</li>
            <li>The Sea and Little Fishes</li>
            <br />
            <li>Once More* with Footnotes</li>
          </ul>
        </li>
      </ul>
      		
      <p class="p1"><font color="#FF0000">En dehors des livres &eacute;crits par 
        Terry Pratchett, il existe de nombreux ouvrages &agrave; partir des romans 
        de Terry. En voici une liste qui n'est certainement pas exhaustive... 
        </font> </p>
      		
      <ul>
	    <li><strong><? printBookEnFrLink('_theatre') ?></strong> (adapt&eacute;es par Stephen Briggs)
          <ul>
		    <li><? printBookEnFr('_theatre/wyrd_systers') ?></li>
			<li><? printBookEnFr('_theatre/mort') ?></li>
			<li><? printBookEnFr('_theatre/guards_guards') ?></li>
			<li><? printBookEnFr('_theatre/men_at_arms') ?></li>
			<li><? printBookEnFr('_theatre/maskerade') ?></li>
			<li><? printBookEnFr('_theatre/carpe_jugulum') ?></li>
			<li><? printBookEnFr('_theatre/the_fifth_elephant') ?></li>
			<li><? printBookEnFr('_theatre/the_truth') ?></li>
          </ul>
        </li>
        <br />
		<li><strong><? printBookEnFrLink('_resources') ?></strong>
          <ul>
		    <li><? printBookEnFr('_resources/the_discworld_companion') ?></li>
			<li><? printBookEnFr('_resources/the_new_discworld_companion') ?></li>
            <br />
			<li><? printBookEnFr('_resources/the_science_of_discworld') ?></li>
			<li><? printBookEnFr('_resources/the_science_of_discworld_ii') ?></li>
			<li><? printBookEnFr('_resources/the_science_of_discworld_iii') ?></li>
			<li><? printBookEnFr('_resources/the_streets_of_ankh-morpork') ?></li>
			<li><? printBookEnFr('_resources/the_discworld_mapp') ?></li>
			<li><? printBookEnFr('_resources/a_tourist_guide_to_lancre') ?></li>
			<li><? printBookEnFr('_resources/death_s_domain') ?></li>
			<li><? printBookEnFr('_resources/nanny_ogg_s_cook_book') ?></li>
			<li><? printBookEnFr('_resources/unseen_university_challenge') ?></li>
			<li><? printBookEnFr('_resources/the_wyrdest_link') ?></li>
			<li><? printBookEnFr('_resources/unseen_university_cut_out_book') ?></li>
          </ul>
        </li>
        <br />
		<li><strong><? printBookEnFrLink('_diarys') ?></strong>
          <ul>
		    <li><? printBookEnFr('_diarys/1998') ?></li>
		    <li><? printBookEnFr('_diarys/1999') ?></li>
		    <li><? printBookEnFr('_diarys/2000') ?></li>
		    <li><? printBookEnFr('_diarys/2001') ?></li>
		    <li><? printBookEnFr('_diarys/2002') ?></li>
		    <li><? printBookEnFr('_diarys/2003') ?></li>
		    <li><? printBookEnFr('_diarys/2005') ?></li>
		    <li><? printBookEnFr('_diarys/2007') ?></li>
            <li><? printBookEnFr('_diarys/2008') ?></li>
          </ul>
        </li>
        <br />
		<li><strong><? printBookEnFrLink('_drawings') ?></strong>
          <ul>
		    <li><? printBookEnFr('_drawings/mort') ?></li>
            <li><? printBookEnFr('_drawings/guards_guards') ?></li>
		    <li><? printBookEnFr('_drawings/the_josh_kirby_discworld_portfolio') ?></li>
		    <li><? printBookEnFr('_drawings/the_pratchett_portfolio') ?></li>
		    <li><? printBookEnFr('_drawings/the_art_of_discworld') ?></li>
		    <li><? printBookEnFr('_drawings/the_second_discworld_portfolio') ?></li>
          </ul>
        </li>
      </ul>
	  			<div align="right"><a href="#haut">Haut de la page</a></div><hr />
		  </td>
  </tr>
			<tr>
      	<td align="center"><a href="<?php echo 'mailto:'.$mail; ?>"><img src="../general/mail.gif" border="0" width="65" height="35" /><br />
        	<h5 class="mail">N'hésitez-pas !</h5></a>
      	</td>	
      	<td align="center" width="100%"><a href="../home.php"><img src="../general/home.gif" alt="Retour à la page d'accueil" width="93" height="80" border="0" /></a></td>
			</tr>
  	</table>
	
	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1810468-1";
urchinTracker();
</script>
	</body>
</html>