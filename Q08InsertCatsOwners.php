<?php
        require_once 'loginZoo.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $query  = "INSERT INTO cats VALUES(NULL, 'Lynx2', 'Stumpy2', 5)";
        $result = $conn->query($query);
        $insertID = $conn->insert_id;
        if (!$result) die ("Database access failed: " . $conn->error);

        $query  = "INSERT INTO owners VALUES($insertID, 'Ann', 'Smith', 1)";
        $result = $conn->query($query);
        if (!$result) die ("Database access failed: " . $conn->error);

        $conn->close();
?>
