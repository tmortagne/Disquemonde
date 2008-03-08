
<tr>
  <td align="center" colspan="2"><br />
  <br />
  <h1><? print $title[$_GET['lang']]; ?></h1>
  <?
  if ($_GET['lang'] != 'en_en' && isset($translator))
  {
    print 'traduit par ' . $translator[$_GET['lang']] . '<br />';
  }

  if (isset($infos['author']))
  {
    print '<br /><i>' . $i10n['with'][$_GET['lang']] . ' : ' . $infos['author'] . '</i>' . '<br />';
  }
  ?> <br />
  <? print $intro[$_GET['lang']];	?> <br />
  <br />
  </td>
</tr>
  <?
  foreach ($books as $book)
  {
    $infos = getBookInfos($book);

    if ($infos != FALSE)
    {
      include('biblio_multi_book.php');
    }
  }
  ?>