<?php
require_once __DIR__."/vendor/autoload.php";
require_once  __DIR__."/migrations.php";

use MongoDB\Client;

$client = new \MongoDB\Client("mongodb://127.0.0.1/");
$customer = $client->network->customer;
$statistic = $client->network->statistic;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src = "script.js"></script>
    <title>Mongo Lab</title>
</head>
<body>
<?php
if (isset($_POST["clients"])) {
    findMessages($customer, $_POST["clients"]);
} elseif (isset($_POST["traffic"])) {
    findTraffic($statistic);
} elseif (isset($_POST["balance"])) {
    findBalances($customer);
}
?>
<br>
<div id="toLoad"></div><br>

<form action="" method="post">
    <select name="clients">
        <?php
        showClients($customer);
        ?>
    </select>
    <input type="submit" value="Enter"><br>
</form>
<br>
<form action="" method="post">
    <input type="submit" value="Check traffic" name="traffic"><br>
</form>
<br>
<form action="" method="post">
    <input type="submit" value="Check balance" name="balance"><br>
</form>
<button onclick="Save()">Save</button>
<button onclick="Load()">Load</button>
</body>
</html>
