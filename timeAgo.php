<?php
function ago($time){
  $periods = [
    'second',
    'minute',
    'hour',
    'day',
    'week',
    'month',
    'year',
    'decade',
  ];

  $lengths = [
    '60',
    '60',
    '24',
    '7',
    '4.35',
    '12',
    '10',
  ];


  $now = time();
  if($time > $now)return "Date not yet reached";

  $difference = $now - $time;
  $tense = 'ago';

  for($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1;$j++){
    $difference /= $lengths[$j];
  }
  $difference = round($difference);

  if($difference != 1){
    $periods[$j] .= "s";
  }
  return "$difference $periods[$j] ago";
}