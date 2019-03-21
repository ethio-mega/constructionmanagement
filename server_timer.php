<?php
      $timer = 60*800; // seconds
      $timestamp_file = 'end_timestamp.txt';
      if(!file_exists($timestamp_file))
      {
        file_put_contents($timestamp_file, time()+$timer);
      }
      $end_timestamp = file_get_contents($timestamp_file);
      $current_timestamp = time();
      $difference = $end_timestamp - $current_timestamp;

      
      $days = floor($difference/(60 * 60 * 24));
      $hours = floor(($difference / (60 * 60)) % 24);
      $minutes = floor(($difference / (60 * 60 * 60)) % (60));
      $seconds = floor($difference % 60);

      if($difference <= 0)
      {
        echo 'time is up, BOOOOOOM';
           //execute your function here
           //reset timer by writing new timestamp into file
        
      } else {
            file_put_contents($timestamp_file, time()+$timer);
        $converted = secondsToTime($difference);
        echo $converted['d']."d ".$converted['h']."h ".$converted['m']."m ".$converted['s']."s";
      }


      //convertor 
      function secondsToTime($inputSeconds) {
        $secondsInAMinute = 60;
        $secondsInAnHour  = 60 * $secondsInAMinute;
        $secondsInADay    = 24 * $secondsInAnHour;
    
        // extract days
        $days = floor($inputSeconds / $secondsInADay);
    
        // extract hours
        $hourSeconds = $inputSeconds % $secondsInADay;
        $hours = floor($hourSeconds / $secondsInAnHour);
    
        // extract minutes
        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = floor($minuteSeconds / $secondsInAMinute);
    
        // extract the remaining seconds
        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = ceil($remainingSeconds);
    
        // return the final array
        $obj = array(
            'd' => (int) $days,
            'h' => (int) $hours,
            'm' => (int) $minutes,
            's' => (int) $seconds,
        );
        return $obj;
    }
?>
