/*
 *
 */
<?php
require_once 'loginZoo.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "CREATE TABLE owners (
    id SMALLINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    second_name VARCHAR(32) NOT NULL,
    org TINYINT NOT NULL,
    PRIMARY KEY (id)
  )";

$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);

$conn->close();
?>
