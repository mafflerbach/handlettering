<?php

function generateGridSVG($size) {
  $cx = 0;
  $cy = 0;

  $template = '<svg version="1.1" baseProfile="full" xmlns="http://www.w3.org/2000/svg" style="position: absolute; width: 100%; height: 100%; overflow: hidden;" id="printSvg">';

  for ($i = 0; $i < 43; $i++) {
    for ($k = 0; $k < 30; $k++) {
      $cx = $cx + $size;
      $template .= '<circle cx="' . $cx . 'mm" cy="' . $cy . 'mm" r="0.3mm" fill="#ccc"></circle>';
    }
    $cy = $cy + $size;
    $cx = 0;
  }
  $template .= '</svg>';
  return $template;
}


function getstartDay($year, $month){$dateString = $year . "-" . $month . '-1';
  $time = new DateTime($dateString);

  $start = 1;

  if ($start > 0) {
    $start--;
  } else {
    $start = 6;
  }
  return $start;
}

function getEndDay($year, $month) {

  $stop = 31;
  if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
    --$stop;
  }


  if ($month == 2) {
    $stop = $stop - 3;
    if ($year % 4 == 0) {
      $stop++;
    }
    if ($year % 100 == 0) {
      $stop--;
    }
    if ($year % 400 == 0) {
      $stop++;
    }
  }

  return $stop;
}


function Monthly($month, $year) {

  $monthName = [
    "jan",
    "feb",
    "mar",
    "apr",
    "mai",
    "jun",
    "jul",
    "aug",
    "sep",
    "oct",
    "nov",
    "dec"
  ];

  $monthClass = $monthName[$month];



  $monthName = [
    "Januar",
    "Februar",
    "März",
    "April",
    "Mai",
    "Juni",
    "Juli",
    "August",
    "September",
    "Oktober",
    "November",
    "Dezember"
  ];
  $day = [
    "Montag",
    "Dienstag",
    "Mittwoch",
    "Donnerstag",
    "Freitag",
    "Samstag",
    "Sonntag"
  ];

  $monthhead = $monthName[$month - 1] + " " + $year;
  $ret = calendarTemplate();


  $counter = 1;
  $currentDay = 1;

  $stop = getEndDay($year, $month);
  $start = getstartDay($year, $month);

    for ($i = 0; $i <= 5; $i++) {
      for ($j = 0; j <= 6; $j++) {
        if ((($i == 0) && ($j <= 5) && ($j < $start)) || ($currentDay > $stop)) {
          $("." + $monthClass + " .sp_" + counter) . append(' ') . addClass('empty');
        } else {
          $("." + $monthClass + " .sp_" + counter) . append(Tageszahl);
          $currentDay++;
        }
        $counter++;
      }
    }

  $content = '<div class="monthlySpread pageA5 page even ' . $monthClass . '"><div class="monthlyLeft">'.$ret['left'].'</div></div>' . '<div class="monthlySpread pageA5 page odd ' . $monthClass . '"><div class="monthlyRight">'.$ret['right'].'</div><div class="monthlyHead">'.$monthhead.'</div></div>';

  }




function calendarTemplate() {

  $left = '<span class="sp_8"></span><span class="sp_9"></span><span class="sp_10"></span><span class="sp_11"></span>' .
    '<span class="sp_15"></span><span class="sp_16"></span><span class="sp_17"></span><span class="sp_18"></span>' .
    '<span class="sp_22"></span><span class="sp_23"></span><span class="sp_24"></span><span class="sp_25"></span>' .
    '<span class="sp_29"></span><span class="sp_30"></span><span class="sp_31"></span><span class="sp_32"></span>' .
    '<span class="sp_36"></span><span class="sp_37"></span><span class="sp_38"></span><span class="sp_39"></span>';


  $right = '<span class="sp_5"></span><span class="sp_6"></span><span class="sp_7"></span>' .
    '<span class="sp_12"></span><span class="sp_13"></span><span class="sp_14"></span>' .
    '<span class="sp_19"></span><span class="sp_20"></span><span class="sp_21"></span>' .
    '<span class="sp_26"></span><span class="sp_27"></span><span class="sp_28"></span>' .
    '<span class="sp_33"></span><span class="sp_34"></span><span class="sp_35"></span>' .
    '<span class="sp_40"></span><span class="sp_41"></span><span class="sp_42"></span>';

  return array('left'=> $left, 'right'=> $right);


}


?>

