<tr>
  <td colspan="2"><br />
  <a name="<? print $book; ?>"></a> <strong><? print $infos['title']; ?></strong>
  <?
  if ($_GET['lang'] != 'en_en')
  {
    print ' (' . $infos['original'] . ')';
    if (!isset($translator))
    {
      print ' traduit par ' . $infos['translator'];
    }
  }
   
  if (isset($infos['author']))
  {
    print '<br /><i>' . $i10n['with'][$_GET['lang']] . ' : ' . $infos['author'] . '</i>';
  }
  ?> <br />
  <img src="<? print $infos['img']; ?>" align="left" height="200"> <?
  if (isset($infos['img_back']))
  {
    print '<img src="' . $infos['img_back'] . '" align="right" height="200">';
  }
  ?> <? @include($infos['body']) ?></td>
</tr>
