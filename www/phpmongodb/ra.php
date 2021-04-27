<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ra profile</title>
<link rel='stylesheet' a href="style1.css"/>
</head>
<body>
<?php

//echo "<input type='hidden' name='per' value=1>";
require_once __DIR__ . '/vendor/autoload.php';
$client= new MongoDB\Client("mongodb://localhost:27017");
$collection=$client->test->test;
$book = $collection->findone(['name'=>'ra']);
$name1=$book->name."1";
echo "<p style='text-align:right;'><a href='login.php?per=$name1'>Login Here<br></a></p>";
echo "<img src='$book->name.jpg' alt='$book->name' width='160; height='200'><br>";
//$infos = $collection->find([]);
//foreach($infos as $info){
//    echo $info->publications[0];
//    echo "<br>";
//}
echo "<h2>Name : ";
echo $book->name;
echo "</h2>";
echo "<h3>Background : ";
echo $book->background;
echo "</h3>";
echo "<h4>Contact id : ";
echo $book->id;
echo "</h4>";
echo "<h3>Publications : <br></h3><h4>";
foreach($book->publications as $i){
    echo $i;
    echo "<br>";
}
echo "</h4>";
echo "<br>";
echo "<h3>Courses taught : <br></h3><h4>";
foreach($book->courses as $i){
    echo $i;
    echo "<br>";
}
echo "</h4>";
echo "<h3>Other faculty:</h3>";
//updating
//$collection->updateone(['id'=>$book->id],['$set'=>['publications'=>[$book->publications[1],$book->publications[0]]]]);
//echo $book->publications[0];
$infos=$collection->find([]);
foreach($infos as $info){
    if($info->name==$book->name){
        continue;
    }
    echo "<p style='text-align:left;'><a href='$info->name.php'>$info->name<br></a></p>";
}
?>
</body>
</html>
