<?php

$uri = 'http://api.compose-project.eu:8010/thngs/1377515972748279ff7a4b8ee4b27ba6f6db0412227ba/streams/temperature';
$ch = curl_init($uri);
curl_setopt_array($ch, array(
    CURLOPT_HTTPHEADER  => array('authorization: N2U0ZGNmN2YtZDA1Ny00NzhhLTllZjctNDQ2NGEwN2U2ODU4Mzk5NDg5MTYtZTc4YS00OWZiLThlZjctMzVjNTY1ZTNkMDk0'),
    CURLOPT_RETURNTRANSFER  =>true,
    CURLOPT_VERBOSE     => 1
));
$json = curl_exec($ch);
curl_close($ch);
// echo response output
//echo $out;

//var_dump(json_decode($json, true));
$obj = json_decode($json, true);
//print $obj->{'current-value'}; 


$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator($obj),
    RecursiveIteratorIterator::SELF_FIRST);

$counter = 0;
foreach ($jsonIterator as $key => $val) {
	if(is_array($val)) {
	if(is_numeric(substr($key,0,-1)))
		$counter = $key;
    } else {
    }
}

echo $val;
?>
