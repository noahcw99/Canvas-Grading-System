<?php include "conf.php";?>
<?php
	$str_json = file_get_contents('php://input'); 
	$response = json_decode($str_json, true); // decoding received JSON to array
	$res_proejct=question_project($response);
	echo $res_proejct;

function question_project($response){
	$data=$response;
//	$data = array('id'=>$id,'name'=>$name,'description'=>$description,'level' => $level);
	$url = $GLOBALS['BACK_PATH']."questionadd_back.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	$response = curl_exec($ch);
	curl_close ($ch);
	return $response;
}

?>