<?php

//SET THE GET ENDPOINT FOR THE COMPOSE SO
$uri = 'http://api.compose-project.eu:8010/thngs/1377515972748279ff7a4b8ee4b27ba6f6db0412227ba/streams/temperature';
$ch = curl_init($uri);

//ADD AUTHORIZATION TOKEN INTO HEADER REQUEST
curl_setopt_array($ch, array(
    CURLOPT_HTTPHEADER  => array('authorization: PUT_YOUR_AUTHORIZATION_TOKEN_HERE'),
    CURLOPT_RETURNTRANSFER  =>true,
    CURLOPT_VERBOSE     => 1
));

//STORE THE OUTPUT (JSON FILE)
$json = curl_exec($ch);
curl_close($ch);


//PARSE THE JSON OUTPUT
$obj = json_decode($json, true);



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

//DISPLAY THE LATEST VALUE
echo $val;
?>
