<?php 
/*****
 * This is an open source project should not be sold or misused
 * Author:Dismas Ndadila
 * Author Email: ndadilladismas@gmail.com
 * Created Date: 9/9/2022
 * Feel free to donate @paypal email:ndadilladismas@gmail.com
 * version:1.2
 * 
 */

 /// begin getRealIpUser functions ///

function getRealIpUser(){

    switch(true){

        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_X_CLIENT_IP'])) : return $_SERVER['HTTP_X_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default : return $_SERVER['REMOTE_ADDR'];
    }


}
/// finish getRealIpUser functions ///


 //clean the IP

 $visitor_ip = getRealIpUser();
    
 // Collect IP Information
 $response = file_get_contents('http://ip-api.com/json/'.$visitor_ip);
  $response = json_decode($response);

  
 
  $country = $response->country;
  $city = $response->city;
  $network = $response->isp;
  $timezone = $response->timezone;
  $code = $response->countryCode;
  $region = $response->regionName;
  $status = $response->status;

   echo " $country  $city  $network  $timezone  $code  $timezone";


?>