<?
$i10n = array();

$i10n['with'] = array(
'en_en' => 'other(s) author(s)',
'fr_fr' => 'autre(s) auteur(s)');

function getBookLink($book, $lang)
{
  return 'biblio_base.php?' . 'book=' . $book . '&' . 'lang=' . $lang;
}

function getBookInfos($book)
{
  $infos = array();

  $infos['body'] = 'infos/' . $_GET['book'] . '/' . $book . '_' . $_GET['lang'] . '.html';

  $has_back = FALSE;

  include('infos/' . $_GET['book'] . '/' . $book . '.php');

  if (!isset($title[$_GET['lang']]))
  {
    return FALSE;
  }

  if (!isset($infos['img']))
  {
    $infos['img'] = 'images/' . $_GET['book'] . '/' . $_GET['lang'] . '/' . $book . ($has_back == TRUE ? '1' : '') . '.jpg';
  }

  if ($has_back == TRUE && !isset($infos['img_back']))
  {
    $infos['img_back'] = 'images/' . $_GET['book'] . '/' . $_GET['lang'] . '/' . $book . '3.jpg';
  }

  $infos['title'] = $title[$_GET['lang']];
  $infos['original'] = $title['en_en'];
  if (isset($translator))
  {
    $infos['translator'] = $translator[$_GET['lang']];
    $infos['has_back'] = $has_back;
  }

  if (isset($author))
  {
    $infos['author'] = $author;
  }

  return $infos;
}

function hasLang($book, $lang)
{
  include('infos/' . $book . '.php');

  if (!isset($title[$lang]) || $title[$lang] == '' || $title[$lang] == '---')
  return FALSE;

  return TRUE;
}
?>