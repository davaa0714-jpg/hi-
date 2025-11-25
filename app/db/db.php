<?php
// session зөвхөн нэг удаа эхлүүлэх
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Хөгжлийн үеийн debug функц
if (!function_exists('display')) {
    function display($value)
    {
        echo "<pre>", print_r($value, true), "</pre>";
        die();
    }
}

// MySQL холболт
require_once('connect.php'); // connect.php-г зөвхөн нэг удаа дуудаж байна

// ====== Үндсэн CRUD функцууд ======

function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";

    if (!empty($conditions)) {
        $i = 0;
        foreach ($conditions as $key => $value) {
            $sql .= $i === 0 ? " WHERE $key=?" : " AND $key=?";
            $i++;
        }
    }

    $stmt = $conn->prepare($sql);
    if (!empty($conditions)) {
        $values = array_values($conditions);
        $types = str_repeat('s', count($values));
        $stmt->bind_param($types, ...$values);
    }
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    $i = 0;
    foreach ($conditions as $key => $value) {
        $sql .= $i === 0 ? " WHERE $key=?" : " AND $key=?";
        $i++;
    }
    $sql .= " LIMIT 1";

    $stmt = $conn->prepare($sql);
    $values = array_values($conditions);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function create($table, $data)
{
    global $conn;
    $sql = "INSERT INTO $table SET ";
    $i = 0;
    foreach ($data as $key => $value) {
        $sql .= $i === 0 ? " $key=?" : ", $key=?";
        $i++;
    }

    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt->insert_id;
}

function update($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET ";
    $i = 0;
    foreach ($data as $key => $value) {
        $sql .= $i === 0 ? " $key=?" : ", $key=?";
        $i++;
    }
    $sql .= " WHERE id=?";
    $data['id'] = $id;

    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt->affected_rows;
}

function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    return $stmt->affected_rows;
}

// Жишээ нэмэлт функцууд
function getHeadline()
{
    global $conn;
    $query = "SELECT * FROM post ORDER BY id DESC LIMIT 5";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getLast22Tush()
{
    global $conn;
    $query = "SELECT * FROM tushaal WHERE year='2023' ORDER BY id DESC LIMIT 10";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
