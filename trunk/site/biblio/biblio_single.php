<?
if (!isset($has_back))
  $has_back = TRUE;
  
if (!isset($cover1))
  $cover1 = 'images/disc/' . $_GET['lang'] . '/' . $_GET['book'] . '1.jpg';
if (!isset($cover3))
  $cover3 = 'images/disc/' . $_GET['lang'] . '/' . $_GET['book'] . '3.jpg';
?>

<tr valign="middle" align="center"> 
          <td colspan="2"> <img src="<? print $cover1; ?>" align="left" height="200"> 
            <img src="<? print $cover3; ?>" alt="Arri&egrave;re du livre" height="200" align="right"> 
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
          <td colspan="2"><br /><? @include('infos/' . $_GET['book'] . '_' . $_GET['lang'] . '.html') ?><br />
            </td>
        </tr>