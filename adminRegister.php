<?php
require_once 'db.php';
require_once 'lib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title     = addslashes($_POST['title']);
    $author    = addslashes($_POST['author']);
    $publisher = addslashes($_POST['publisher']);
    $year      = $_POST['year'];
    $price     = $_POST['price'];

    $file      = $_FILES['image'];
    $ext       = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    $filename = time().'.'.$ext;
    move_uploaded_file($file['tmp_name'], './'.$filename);

    DB::exec("insert into books (title, author, publisher, img, year, price)
              values ('$title','$author','$publisher','$filename','$year','$price')");

    move('userBooks.php', '도서가 등록되었습니다.');
    exit;
}

require 'sub05.php'; 
?>