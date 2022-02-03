<?php



echo proz('345345', '10');

 function proz($WERT, $PROZENT)
 {
   $zehn_prozent = $WERT / 100 * $PROZENT;
   return $zehn_prozent;
 }

?>
