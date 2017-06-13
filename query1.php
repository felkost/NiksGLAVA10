/**
 * Встановити з'єднання з БД.
 * Створити запит до БД.
 * По масиву записів, отриманих з запиту, в циклі оримати кожен запис.
 * fetch_assoc() - дозволяє по назві поля отримати значення.
 * Після циклу обов'язково закрити об'єкт запиту та з'єднання.
 */
<?php // query1.php
    require_once 'login.php';
    $conn = new mysqli ($hn, $un, $pw, $db );
    if ($conn->connect_error) die($conn->connect_error);

    $query = "SELECT * FROM classics";
    $result = $conn->query($query);
    if (!$result) die ($conn->error);

    $rows = $result->num_rows;
    echo '<br>';
    for ($j = 0 ; $j < $rows ; ++$j)
    {
        $result->data_seek($j);
        echo 'Author: ' . $result->fetch_assoc()['author'] . '<br>';
        $result->data_seek($j);
        echo 'Title: ' . $result->fetch_assoc()['title'] . '<br>';
        $result->data_seek($j);
        echo 'Category: ' . $result->fetch_assoc()['category'] . '<br>';
        $result->data_seek($j);
        echo 'Year: ' .$result->fetch_assoc()['year'] . '<br>';
        $result->data_seek($j);
        echo 'ISBN: ' . $result->fetch_assoc()['isbn'] . '<br><br>';
    }
    $result->close();
    $conn->close();
?>