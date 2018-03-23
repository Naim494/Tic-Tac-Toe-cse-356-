<?php

include '/etc/php/vendor/autoload.php'; // include Composer's autoloader
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->testdb->movies;
$result = $collection->insertOne( [ 'name' => 'Avengers'] );
echo "Inserted with Object ID '{$result->getInsertedId()}'";

?>
