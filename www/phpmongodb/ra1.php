<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ra profile</title>
<link rel='stylesheet' a href="style1.css"/>
</head>
<body>
<?php
$host = "localhost";
$user = "postgres";
$pass = "assassinwifi";
$db = "postgres";
$flag=false;
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Could not connect to server\n");
$query1="select * from log;";
$result1=pg_query($query1);
$name=$_GET['username'];
$email=$_GET['email'];
$password=$_GET['password'];
$flag1=0;
pg_query("select auto_cancell();");
pg_query("call update_year()");
while($row=pg_fetch_row($result1)){
    if($row[0]==$name && $row[1]==$email && $row[2]==$password){
        $flag=true;
    }
}
if(!$flag){
    header('Location:aa.php');
}
echo "<br>";
require_once __DIR__ . '/vendor/autoload.php';

$client= new MongoDB\Client("mongodb://localhost:27017");
$collection=$client->test->test;

if(isset($_GET['edb'])){
    $bac=$_GET['bac'];
    $collection->updateone(['id'=>$email],['$set'=>['background'=>$bac]]);
}elseif(isset($_GET['adp'])){
    $pub=$_GET['pub'];
    $collection->updateone(['id'=>$email],['$push'=>['publications'=>$pub]]);
}elseif(isset($_GET['dep'])){
    $pub=$_GET['pub'];
    $collection->updateone(['id'=>$email],['$pull'=>['publications'=>$pub]]);
}elseif(isset($_GET['adc'])){
    $cou=$_GET['cou'];
    $collection->updateone(['id'=>$email],['$push'=>['courses'=>$cou]]);
}elseif(isset($_GET['dec'])){
    $cou=$_GET['cou'];
    $collection->updateone(['id'=>$email],['$pull'=>['courses'=>$cou]]);
}
$book = $collection->findone(['name'=>'ra']);              //Check EDIT
if($name==$book->name){
    echo "<p style='text-align:right;'><a href='portal.php?username=$name&email=$email&password=$password&login=Sign+in'>Apply for leave Here<br></a></p>";
    }
echo "<img src='$book->name.jpg' alt='$book->name' width='160; height='200'><br>";
echo "<h2>Name : ";
echo $book->name;
echo "</h2>";
echo "<h3>Background : ";
echo $book->background;
echo "</h3>";
if($name==$book->name){
    //EDIT
    $name1=$name."1";
    echo"<form action='$name1.php' method=\"get\"> 
    <input type='hidden' name='username' value='$name'>
    <input type='hidden' name='email' value='$email'>
    <input type='hidden' name='password' value='$password'>
    <input type='text' name='bac' placeholder='Edit Background' required>
    <input type=\"submit\" name='edb' value=\"Edit\">
    </form>
    ";
    }
echo "<h4>Contact id : ";
echo $book->id;
echo "</h4>";
echo "<h3>Publications : <br></h3><h4>";
foreach($book->publications as $i){
    echo $i;
    echo "<br>";
}
if($name==$book->name){
     //EDIT
     $name1=$name."1";
     echo"<form action='$name1.php' method=\"get\"> 
     <input type='hidden' name='username' value='$name'>
     <input type='hidden' name='email' value='$email'>
     <input type='hidden' name='password' value='$password'>
     <input type='text' name='pub' placeholder='Publication to add' required>
     <input type=\"submit\" name='adp' value=\"Add\">
     </form>
     <form action='$name1.php' method=\"get\"> 
     <input type='hidden' name='username' value='$name'>
     <input type='hidden' name='email' value='$email'>
     <input type='hidden' name='password' value='$password'>
     <input type='text' name='pub' placeholder='Publication to delete' required>
     <input type=\"submit\" name='dep' value=\"Delete\">
     </form>
     ";
    }
echo "</h4>";
echo "<h3>Courses taught : <br></h3><h4>";
foreach($book->courses as $i){
    echo $i;
    echo "<br>";
}
if($name==$book->name){
     //EDIT
     $name1=$name."1";
     echo"<form action='$name1.php' method=\"get\"> 
     <input type='hidden' name='username' value='$name'>
     <input type='hidden' name='email' value='$email'>
     <input type='hidden' name='password' value='$password'>
     <input type='text' name='cou' placeholder='Course to add' required>
     <input type=\"submit\" name='adc' value=\"Add\">
     </form>
     <form action='$name1.php' method=\"get\"> 
     <input type='hidden' name='username' value='$name'>
     <input type='hidden' name='email' value='$email'>
     <input type='hidden' name='password' value='$password'>
     <input type='text' name='cou' placeholder='Course to delete' required>
     <input type=\"submit\" name='dec' value=\"Delete\">
     </form>
     ";
    }
echo "</h4>";
echo "<h3>Other faculty:</h3>";
$infos=$collection->find([]);
foreach($infos as $info){
    if($info->name==$book->name){
        continue;
    }
    $name1=$info->name."1";
    echo "<p style='text-align:left;'><a href='$name1.php?username=$name&email=$email&password=$password'>$info->name<br></a></p>";
}
echo "<form action='$book->name.php' method=\"get\">
    <input type=\"submit\" class='btn' name='log' value=\"Logout\">
    </form>";
//updating
//$collection->updateone(['id'=>$book->id],['$set'=>['publications'=>[$book->publications[1],$book->publications[0]]]]);
//echo $book->publications[0];
?>
</body>
</html>