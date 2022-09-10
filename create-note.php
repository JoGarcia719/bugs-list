<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
$client = new Client();
$headers = [
  'Authorization' => 'NNvUsizLa6C3ZYHZgby67iLpT07q0Mnd',
  'Content-Type' => 'application/json'
];
$body = '{
  "garcia.josephandrew@auf.edu.ph": "test note",
  "view_state": {
    "name": "public"
  }
}';
$request = new Request('POST', 'https://ipt10-2022.mantishub.io/api/rest/users/', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
