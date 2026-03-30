<?php
require_once 'db.php';
require_once 'lib.php';

// --- ONLY run this if the user clicked the Submit button ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title     = addslashes($_POST['title']);
    $author    = addslashes($_POST['author']);
    $publisher = addslashes($_POST['publisher']);
    $year      = $_POST['year'];
    $price     = $_POST['price'];

    $file      = $_FILES['image'];
    $ext       = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed   = ['jpg', 'jpeg', 'png'];

    if(!in_array($ext, $allowed)) {
        // Use the combined back('msg') function we made
        back('JPG, JPEG, PNG 파일만 업로드 가능합니다.');
        exit;
    }

    $filename = time().'.'.$ext;
    
    // Ensure the folder 'public' exists!
    move_uploaded_file($file['tmp_name'], './'.$filename);

    DB::exec("insert into books (title, author, publisher, img, year, price)
              values ('$title','$author','$publisher','$filename','$year','$price')");

    // After success, move to the list page
    move('userBooks.php', '도서가 등록되었습니다.');
    exit;
}

// --- If it's NOT a POST request, just show the HTML ---
require 'sub05.php'; 
?>