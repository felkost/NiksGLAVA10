<?php
    require_once 'loginZoo.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "SELECT * FROM owners";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed: " . $conn->error);

    $rows = $result->num_rows;
    echo "<table><tr> <th>Id</th> <th>Name</th> <th>Second_Name</th> <th>Org</th> </tr>";

    for ($j = 0 ; $j < $rows ; ++$j)
    {
     $result->data_seek($j);
     $row = $result->fetch_array(MYSQLI_NUM);

     echo "<tr>";
     for ($k = 0 ; $k < 4 ; ++$k) echo "<td>$row[$k]</td>";
     echo "</tr>";
    }

    echo "</table>";

    $result->close();
    $conn->close();
?>
