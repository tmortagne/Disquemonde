		<tr> 
          <td align="center" colspan="2"><br />
            <br />
            <h1><? print $title[$_GET['lang']]; ?></h1>
			<?
			if ($_GET['lang'] != 'en_en' && isset($translator))
			  print 'traduit par ' . $translator[$_GET['lang']] . '<br />';
			?>
            <br />
			<? print $intro[$_GET['lang']];	?>
            <br />
            <br />
          </td>
		</tr>
		<?
		$count = count($books);
		
		$i = 0;
		foreach ($books as $book)
		{
		  $infos = getBookInfos($book);
		
		  if ($infos == FALSE)
		    continue;
		  
		  if ($i % 2 == 0)
		  {
		    if ($i > 0)
			  print '<tr><td colspan="2"><hr></td></tr>';
			  
		    print '<tr>';
		  }
			
		  include('biblio_theatre_book.php');
		  
		  if ($i % 2 == 1)
		    print '</tr>';
			
		  $i++;
		}
		?>