<?php

Class Statistic {

  public static function amchartsDisplay($data, $field) {

    $str = '[';

    $date = array();
    foreach ($data as $d) {
      $xpl = explode(' ', $d['date']);
      @$date[$xpl[0]] ++;
    }

    ksort($date);
    
    foreach ($date as $d => $v) {
      $str .= "{'date': '" . $d . "','" . $field . "': " . (int) $v . "},";
    }

    return substr($str, 0, -1) . ']';
  }

}
