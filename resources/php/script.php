<?php


function getCalendarDate($DATE)
{
  if ($DATE) 
  {
    $DATE_ARRAY = explode('-', $DATE);

    $YEAR = $DATE_ARRAY[0];

    if      ($DATE_ARRAY[1] == '01') { $MONTH = 'JAN'; }
    else if ($DATE_ARRAY[1] == '02') { $MONTH = 'FEB'; }
    else if ($DATE_ARRAY[1] == '03') { $MONTH = 'MRZ'; }
    else if ($DATE_ARRAY[1] == '04') { $MONTH = 'APR'; }
    else if ($DATE_ARRAY[1] == '05') { $MONTH = 'MAI'; }
    else if ($DATE_ARRAY[1] == '06') { $MONTH = 'JUN'; }
    else if ($DATE_ARRAY[1] == '07') { $MONTH = 'JUL'; }
    else if ($DATE_ARRAY[1] == '08') { $MONTH = 'AUG'; }
    else if ($DATE_ARRAY[1] == '09') { $MONTH = 'SEP'; }
    else if ($DATE_ARRAY[1] == '10') { $MONTH = 'OKT'; }
    else if ($DATE_ARRAY[1] == '11') { $MONTH = 'NOV'; }
    else if ($DATE_ARRAY[1] == '12') { $MONTH = 'DEZ'; }

    $DAY = $DATE_ARRAY[2];

    $NEW_DATE = array('YEAR' => $YEAR, 'MONTH' => $MONTH, 'DAY' => $DAY);

    return $NEW_DATE;
  }
  else
  {
    return $NEW_DATE = array('YEAR' => '0000', 'MONTH' => '00', 'DAY' => '00');
  }

}




?>
