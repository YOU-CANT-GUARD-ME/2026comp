<?php
require_once 'lib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $authot = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    $img = $_FILES['img'];
    $imgname = time()."_".$img['name'];
    move_uploaded_file($Img['tmp_name'], './images/'.$imgname);

    DB::exec("insert into books (title, author, publisher, year, price, img)
    values ('$title', '$author', '$publisher', '$year', ''$price', '$imgname')");

    alert("등록 성공");
    move('sub05.php');
    $books = DB::fetchAll("select * from books");
}