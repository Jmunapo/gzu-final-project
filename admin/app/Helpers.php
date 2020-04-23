<?php

function sendWelcome($name, $programme, $phone, $reg_number){
  $username = 'joemags';

  // Webservices token for above Webservice username
  $token = '82004aaee57b5cf49e6c098004ca0613';

  // BulkSMS Webservices URL
  $bulksms_ws = 'http://portal.bulksmsweb.com/index.php?app=ws';

  // SMS Message to send
  $message = "Dear ".$name."\nCongratulations on your admission to study ".$programme." at the GZU. Login to our mobile application or visit studentporta.gzu.ac.zw to download your acceptance letter  \nReg No: ".$reg_number."\nPassword: ".$phone;
  
  //return $message;

  $ws_str = $bulksms_ws . '&u=' . $username . '&h=' . $token . '&op=pv';
  $ws_str .= '&to=' . urlencode($phone) . '&msg='.urlencode($message);
  $ws_response = @file_get_contents($ws_str);
  //echo $ws_response;
}

function veryUrgentSms($params) {
  return dd($params);
}


function unique_multidim_array($array, $key) { 
  $temp_array = array(); 
  $i = 0; 
  $key_array = array(); 
  
  foreach($array as $val) { 
      if (!in_array($val[$key], $key_array)) { 
          $key_array[$i] = $val[$key]; 
          //$temp_array[$i] = $val;
          array_push($temp_array, $val); 
      } 
      $i++; 
  } 
  return $temp_array; 
} 