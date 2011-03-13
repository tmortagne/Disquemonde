<?
  function aff_popup($page, $title, $inf, $w, $h, $opt)
  {
      echo "href='#' onClick=\"window.open('$page".((empty($title) && empty($inf))?"":"?title=$title&message=$inf")."','_blank','toolbar=$opt[0], location=$opt[1], directories=$opt[2], status=$opt[3], scrollbars=$opt[4], resizable=$opt[5], copyhistory=$opt[6], menuBar=$opt[7]".((empty($w))?"":", width=$w").((empty($h))?"":", height=$h")."');return(false)\"";
  }
?>