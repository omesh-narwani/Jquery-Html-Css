<?php $address = get_the_term_list( get_the_ID(), 'location', '', ', ', '' ); ?>
<?php
    $api = "AIzaSyBGmrdpAfP60bsLln8_3jPT6A2HJvJE_-k";
    $prepAddr = str_replace(' ','+',$address);
   $details_url= 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $prepAddr. '&key=' . $api . '&sensor=false';
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $details_url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $geoloc = json_decode(curl_exec($ch), true);
    $step1 = $geoloc['results'];
   $step2 = $step1['geometry'];
   $coords = $step2['location'];
$lat = $geoloc['results'][0]['geometry']['location']['lat'];
$lang = $geoloc['results'][0]['geometry']['location']['lng'];