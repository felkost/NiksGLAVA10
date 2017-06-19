<?php
$InputData=preg_split('/\s+/', trim(file_get_contents('DataForInsert.txt')));
$cnt = count($InputData);

require_once 'loginZoo.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

 $i=0;
 while($i<$cnt){
  $query  = "INSERT INTO cats VALUES(NULL, '".$InputData[$i]."', '".$InputData[$i+1]."', ".$InputData[$i+2].")";
  $result = $conn->query($query);
  if (!$result) die ("Помилка під час доступу до бази даних: " . $conn->error);
  $i += 3;
 }


$conn->close();
?>
