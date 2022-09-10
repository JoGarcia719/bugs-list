<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

define('TOKEN', 'NNvUsizLa6C3ZYHZgby67iLpT07q0Mnd');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');
$client = new Client();
$headers = [
  'Authorization' => TOKEN
];
$request = new Request('GET', MANTISHUB_URL.'api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();


$bugs_list = json_decode($bugs);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1> IPT10 Bugs List </h1>
    <h2> Joseph Andrew Caparas Garcia </h2>
    
    
  <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Summary</th>
          <th scope="col">Severity</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>

        <?php
      foreach ($bugs_list->issues as $bug)
      {
        ?>  
        <tr>
        <th scope="row"><?php echo $bug->id;  ?></th>
          <td><?php echo $bug->summary; ?> </td>
          <td><?php echo $bug->severity->name ?> </td>
          <td><?php echo $bug->status->name ?> </td>
          </tr>
          <?php
      }
      ?>
      </tbody>
    </table>


      
      </table>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>