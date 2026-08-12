<<<<<<< HEAD
<?php
// define('ppk', "0109S003");
define('ppk', "0110R005");
define('WS_BPJS', 'on');

function print_arr($arr)
{
	echo "<h4>data : </h4>";
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

// $consid = "22632";
// $secretKey = "8sF48C3BD3";
//$base_url = "http://dvlp.bpjs-kesehatan.go.id:8888/";
// $base_url_vclaim = "https://new-api.bpjs-kesehatan.go.id:8080/";

function base_vclaim2()
{
	return "http://dvlp.bpjs-kesehatan.go.id:8888/";
}
function base_aplicares()
{
	return "https://new-api.bpjs-kesehatan.go.id/";
}

function base_vclaim()
{

	//return "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/";
	return "https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev/";
	// return "https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/";
}
function base_antrean()
{
	// return "https://apijkn.bpjs-kesehatan.go.id/antreanrs/";
	return "https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev/";

}


function generate_headers()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";
	$userkey = "e3322eaa2fb45fcc3c432568d268b28a";
	// $base_url = "http://api.bpjs-kesehatan.go.id/";

	// Computes the timestamp
	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	// Computes the signature by hashing the salt with the secret key as the key
	$signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);
	// base64 encode…
	$encodedSignature = base64_encode($signature);

	$headers = array(
		'X-cons-id: ' . $consid . '',
		'X-timestamp: ' . $tStamp . '',
		'X-signature: ' . $encodedSignature . '',
		'user_key: ' . $userkey . '',
		'Content-Type: Application/JSON',
		'Accept: Application/JSON'
	);
	return $headers;
}
function generate_headers1()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";
	$userkey = "e3322eaa2fb45fcc3c432568d268b28a";
	//$userkey ="0d9220013fe373b918c27bdf4e3b9a7e";
	// $base_url = "http://api.bpjs-kesehatan.go.id/";

	// Computes the timestamp
	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	// Computes the signature by hashing the salt with the secret key as the key
	$signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);
	// base64 encode…
	$encodedSignature = base64_encode($signature);

	$headers = array(
		'X-cons-id: ' . $consid . '',
		'X-timestamp: ' . $tStamp . '',
		'X-signature: ' . $encodedSignature . '',
		'user_key: ' . $userkey . '',
		'Content-Type: Application/x-www-form-urlencoded',

	);
	return $headers;
}
function generate_headers_icare()
{

	$consid = "30218";
	$secretKey = "2eH7B629E1";
	// Computes the timestamp
	date_default_timezone_set('UTC');
	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	// Computes the signature by hashing the salt with the secret key as the key
	$signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);

	// base64 encode…
	$encodedSignature = base64_encode($signature);

	// urlencode…
	// $encodedSignature = urlencode($encodedSignature);

	// echo "X-cons-id: " . $data . " ";
	echo "X-timestamp:" . $tStamp . " ";
	echo "X-signature: " . $encodedSignature;
	$headers = array(
		"Content-Type:application/json",
		'X-cons-id: ' . $consid . '',
		'X-timestamp: ' . $tStamp . '',
		'X-signature: ' . $encodedSignature,
		'user_key:e3322eaa2fb45fcc3c432568d268b28a',
		'Accept: Application/JSON'
	);
	return $headers;
}
function generate_headers_antrean()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";
	$userkey = "ff7dd75cdc92c359ba0eeefc39adf31e";
	// $base_url = "http://api.bpjs-kesehatan.go.id/";

	// Computes the timestamp
	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	// Computes the signature by hashing the salt with the secret key as the key
	$signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);
	// base64 encode…
	$encodedSignature = base64_encode($signature);

	$headers = array(
		'X-cons-id: ' . $consid . '',
		'X-timestamp: ' . $tStamp . '',
		'X-signature: ' . $encodedSignature . '',
		'user_key: ' . $userkey . '',
		'Content-Type: Application/JSON',
		'Accept: Application/JSON'
		// 'Content-Type: Application/x-www-form-urlencoded'
	);
	return $headers;
}
function generate_headers_antrean_json()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";
	$userkey = "ff7dd75cdc92c359ba0eeefc39adf31e";
	// $base_url = "http://api.bpjs-kesehatan.go.id/";

	// Computes the timestamp
	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	// Computes the signature by hashing the salt with the secret key as the key
	$signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);
	// base64 encode…
	$encodedSignature = base64_encode($signature);

	$headers = array(
		'X-cons-id: ' . $consid . '',
		'X-timestamp: ' . $tStamp . '',
		'X-signature: ' . $encodedSignature . '',
		'user_key: ' . $userkey . '',
		// 'Content-Type: Application/JSON',          
		// 'Accept: Application/JSON'
		'Content-Type: Application/x-www-form-urlencoded'
	);
	return $headers;
}
// echo $signature;
function stringDecrypt($key, $string)
{


	$encrypt_method = 'AES-256-CBC';

	// hash
	$key_hash = hex2bin(hash('sha256', $key));

	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	$iv = substr(hex2bin(hash('sha256', $key)), 0, 16);

	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);

	return $output;
}
function generate_key()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";

	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	return $consid . $secretKey . $tStamp;
}
function generate_key_icare()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";

	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	return $consid . $secretKey . $tStamp;
}
function get($url, $headers)
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$content = curl_exec($ch);
		$err = curl_error($ch);
		curl_close($ch);
		//   print_r($err);
		//   print_arr($content);

		return json_decode($content, true);
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
function post($url, $headers, $data)
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$content = curl_exec($ch);
		$err = curl_error($ch);
		curl_close($ch);
		//   print_r($err);


		return json_decode($content, true);
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
function put_api($url, $headers, $data)
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$content = curl_exec($ch);
		$err = curl_error($ch);
		curl_close($ch);
		//   print_r($err);


		return json_decode($content, true);
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
function delete_api($url, $headers, $data)
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, "https://www.khayalan.net");
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$content = curl_exec($ch);
		$err = curl_error($ch);

		curl_close($ch);


		return json_decode($content, true);
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
function decompress($string)
{

	return \LZCompressor\LZString::decompressFromEncodedURIComponent($string);
}
function update_bed()
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$CI = get_instance();
		$CI->load->model('M_Pencarian_Pasien');

		$rows = $CI->M_Pencarian_Pasien->get_room();
		foreach ($rows as $row) {
			$data = json_encode($row);
			$headers = generate_headers();
			// print_arr($headers);
			/**
	 Sending record to API Aplicares (for UPDATE)
			 */
			$ch = curl_init();
			// curl_setopt($ch, CURLOPT_URL, "https://www.khayalan.net");
			curl_setopt($ch, CURLOPT_URL, base_aplicares() . "aplicaresws/rest/bed/update/0110R005");
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$content = curl_exec($ch);
			$err = curl_error($ch);
			//echo "Response : " . $content;
			// print_arr($err);
			//print_arr($content);

			// close cURL resource, and free up system resources
			curl_close($ch);
		}
		$out['status'] = "success";
		echo json_encode($out);
		exit;
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
function create_bed()
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$CI = get_instance();
		$CI->load->model('Aplicares_model');

		$rows = $CI->Aplicares_model->create_room();
		foreach ($rows as $row) {
			$data = json_encode($row);
			$headers = generate_headers();
			// print_arr($headers);
			/**
	 Sending record to API Aplicares (for UPDATE)
			 */
			$url = base_aplicares() . "aplicaresws/rest/bed/create/0110R005";
			$content = post($url, $headers, $data);
			print_arr($content);
		}
		echo "Create Success";
		exit;
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
=======
<?php
// define('ppk', "0109S003");
define('ppk', "0110R005");
define('WS_BPJS', 'on');

function print_arr($arr)
{
	echo "<h4>data : </h4>";
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

// $consid = "22632";
// $secretKey = "8sF48C3BD3";
//$base_url = "http://dvlp.bpjs-kesehatan.go.id:8888/";
// $base_url_vclaim = "https://new-api.bpjs-kesehatan.go.id:8080/";

function base_vclaim2()
{
	return "http://dvlp.bpjs-kesehatan.go.id:8888/";
}
function base_aplicares()
{
	return "https://new-api.bpjs-kesehatan.go.id/";
}

function base_vclaim()
{

	//return "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/";
	return "https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev/";
	// return "https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/";
}
function base_antrean()
{
	// return "https://apijkn.bpjs-kesehatan.go.id/antreanrs/";
	return "https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev/";

}


function generate_headers()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";
	$userkey = "e3322eaa2fb45fcc3c432568d268b28a";
	// $base_url = "http://api.bpjs-kesehatan.go.id/";

	// Computes the timestamp
	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	// Computes the signature by hashing the salt with the secret key as the key
	$signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);
	// base64 encode…
	$encodedSignature = base64_encode($signature);

	$headers = array(
		'X-cons-id: ' . $consid . '',
		'X-timestamp: ' . $tStamp . '',
		'X-signature: ' . $encodedSignature . '',
		'user_key: ' . $userkey . '',
		'Content-Type: Application/JSON',
		'Accept: Application/JSON'
	);
	return $headers;
}
function generate_headers1()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";
	$userkey = "e3322eaa2fb45fcc3c432568d268b28a";
	//$userkey ="0d9220013fe373b918c27bdf4e3b9a7e";
	// $base_url = "http://api.bpjs-kesehatan.go.id/";

	// Computes the timestamp
	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	// Computes the signature by hashing the salt with the secret key as the key
	$signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);
	// base64 encode…
	$encodedSignature = base64_encode($signature);

	$headers = array(
		'X-cons-id: ' . $consid . '',
		'X-timestamp: ' . $tStamp . '',
		'X-signature: ' . $encodedSignature . '',
		'user_key: ' . $userkey . '',
		'Content-Type: Application/x-www-form-urlencoded',

	);
	return $headers;
}
function generate_headers_icare()
{

	$consid = "30218";
	$secretKey = "2eH7B629E1";
	// Computes the timestamp
	date_default_timezone_set('UTC');
	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	// Computes the signature by hashing the salt with the secret key as the key
	$signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);

	// base64 encode…
	$encodedSignature = base64_encode($signature);

	// urlencode…
	// $encodedSignature = urlencode($encodedSignature);

	// echo "X-cons-id: " . $data . " ";
	echo "X-timestamp:" . $tStamp . " ";
	echo "X-signature: " . $encodedSignature;
	$headers = array(
		"Content-Type:application/json",
		'X-cons-id: ' . $consid . '',
		'X-timestamp: ' . $tStamp . '',
		'X-signature: ' . $encodedSignature,
		'user_key:e3322eaa2fb45fcc3c432568d268b28a',
		'Accept: Application/JSON'
	);
	return $headers;
}
function generate_headers_antrean()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";
	$userkey = "ff7dd75cdc92c359ba0eeefc39adf31e";
	// $base_url = "http://api.bpjs-kesehatan.go.id/";

	// Computes the timestamp
	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	// Computes the signature by hashing the salt with the secret key as the key
	$signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);
	// base64 encode…
	$encodedSignature = base64_encode($signature);

	$headers = array(
		'X-cons-id: ' . $consid . '',
		'X-timestamp: ' . $tStamp . '',
		'X-signature: ' . $encodedSignature . '',
		'user_key: ' . $userkey . '',
		'Content-Type: Application/JSON',
		'Accept: Application/JSON'
		// 'Content-Type: Application/x-www-form-urlencoded'
	);
	return $headers;
}
function generate_headers_antrean_json()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";
	$userkey = "ff7dd75cdc92c359ba0eeefc39adf31e";
	// $base_url = "http://api.bpjs-kesehatan.go.id/";

	// Computes the timestamp
	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	// Computes the signature by hashing the salt with the secret key as the key
	$signature = hash_hmac('sha256', $consid . "&" . $tStamp, $secretKey, true);
	// base64 encode…
	$encodedSignature = base64_encode($signature);

	$headers = array(
		'X-cons-id: ' . $consid . '',
		'X-timestamp: ' . $tStamp . '',
		'X-signature: ' . $encodedSignature . '',
		'user_key: ' . $userkey . '',
		// 'Content-Type: Application/JSON',          
		// 'Accept: Application/JSON'
		'Content-Type: Application/x-www-form-urlencoded'
	);
	return $headers;
}
// echo $signature;
function stringDecrypt($key, $string)
{


	$encrypt_method = 'AES-256-CBC';

	// hash
	$key_hash = hex2bin(hash('sha256', $key));

	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	$iv = substr(hex2bin(hash('sha256', $key)), 0, 16);

	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);

	return $output;
}
function generate_key()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";

	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	return $consid . $secretKey . $tStamp;
}
function generate_key_icare()
{
	date_default_timezone_set('UTC');
	$consid = "30218";
	$secretKey = "2eH7B629E1";

	$tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
	return $consid . $secretKey . $tStamp;
}
function get($url, $headers)
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$content = curl_exec($ch);
		$err = curl_error($ch);
		curl_close($ch);
		//   print_r($err);
		//   print_arr($content);

		return json_decode($content, true);
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
function post($url, $headers, $data)
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$content = curl_exec($ch);
		$err = curl_error($ch);
		curl_close($ch);
		//   print_r($err);


		return json_decode($content, true);
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
function put_api($url, $headers, $data)
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$content = curl_exec($ch);
		$err = curl_error($ch);
		curl_close($ch);
		//   print_r($err);


		return json_decode($content, true);
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
function delete_api($url, $headers, $data)
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, "https://www.khayalan.net");
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$content = curl_exec($ch);
		$err = curl_error($ch);

		curl_close($ch);


		return json_decode($content, true);
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
function decompress($string)
{

	return \LZCompressor\LZString::decompressFromEncodedURIComponent($string);
}
function update_bed()
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$CI = get_instance();
		$CI->load->model('M_Pencarian_Pasien');

		$rows = $CI->M_Pencarian_Pasien->get_room();
		foreach ($rows as $row) {
			$data = json_encode($row);
			$headers = generate_headers();
			// print_arr($headers);
			/**
	 Sending record to API Aplicares (for UPDATE)
			 */
			$ch = curl_init();
			// curl_setopt($ch, CURLOPT_URL, "https://www.khayalan.net");
			curl_setopt($ch, CURLOPT_URL, base_aplicares() . "aplicaresws/rest/bed/update/0110R005");
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$content = curl_exec($ch);
			$err = curl_error($ch);
			//echo "Response : " . $content;
			// print_arr($err);
			//print_arr($content);

			// close cURL resource, and free up system resources
			curl_close($ch);
		}
		$out['status'] = "success";
		echo json_encode($out);
		exit;
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
function create_bed()
{
	if (defined('WS_BPJS') && WS_BPJS != 'off') {
		$CI = get_instance();
		$CI->load->model('Aplicares_model');

		$rows = $CI->Aplicares_model->create_room();
		foreach ($rows as $row) {
			$data = json_encode($row);
			$headers = generate_headers();
			// print_arr($headers);
			/**
	 Sending record to API Aplicares (for UPDATE)
			 */
			$url = base_aplicares() . "aplicaresws/rest/bed/create/0110R005";
			$content = post($url, $headers, $data);
			print_arr($content);
		}
		echo "Create Success";
		exit;
	} else {
		$ret['metaData']['code'] = 500;
		$ret['metaData']['message'] = 'Fitur WS BPJS disabled!';
		return $ret;
	}
}
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
