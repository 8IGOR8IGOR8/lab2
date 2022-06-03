<?php
function findMessages($db, $client)
{
    $statement = $db->distinct("messages", ["login"=>$client]);
    echo "<div id='toSave'>Client: $client<br>";
    foreach ($statement as $data) {
        echo "Message: $data<br>";
    }
    echo "</div>";
}


function findTraffic(MongoDB\Collection $db)
{
    $statement = $db->aggregate([['$group'=>["_id"=>null, "totalAmount"=>['$sum'=>'$traffic_in']]]]);
    echo "<div id='toSave'>Traffic In: {$statement->toArray()[0]['totalAmount']}<br>";
    $statement = $db->aggregate([['$group'=>["_id"=>null, "totalAmount"=>['$sum'=>'$traffic_out']]]]);
    echo "Traffic Out: {$statement->toArray()[0]['totalAmount']}<br></div>";
}


function findBalances($db)
{
    $statement = $db->find(["balance" => ['$lt' => 0]]);
    echo "<div id='toSave'>";
    foreach ($statement as $data) {
        echo "Debtor: {$data['login']}<br>";
    }
    echo "</div>";
}

function showClients($db)
{
    $statement = $db->distinct("login", []);
    echo "<div id='toSave'>";
    foreach ($statement as $data) {
        echo "<option value='$data'>$data</option>";
    }
    echo "</div>";
}
