<?php

require 'vendor/autoload.php';
/*if(extension_loaded("mongodb")){
   try{
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $query = new MongoDB\Driver\Query([]);

    $cursor = $manager->executeQuery('test',$query);

    foreach($cursor as $document){
        var_dump($document);
    }
} catch(MongoConnectionException $e){
    var_dump($e);
}
}*/
$client= new MongoDB\Client("mongodb://localhost:27017");
$collection=$client->test->test;

?>
