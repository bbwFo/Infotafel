<?php



echo proz('345345', '10');

function proz($WERT, $PROZENT)
{
 $SUM1 = $WERT / 100 * $PROZENT;

 $SUM2 = $WERT - $SUM1;


 return $SUM2;
}






?>
