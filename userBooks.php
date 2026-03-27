<?php
require_once 'db.php';
require_once 'lib.php';

$books = json_decode(file_get_contents('./도서정보.json'));

// POST 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        alert("로그인 필요합니다");
        move();
    }

    $book_id = (int)$_POST['book_id'];
    $user_id = (int)$_SESSION['user_id'];

    $rent_date   = date('Y-m-d');
    $return_date = date('Y-m-d', strtotime('+14 days'));

    $check = DB::fetch("SELECT id FROM rentals 
                        WHERE book_id = $book_id 
                        AND return_date >= CURDATE()");

    if ($check) {
        alert("이미 대출 중인 도서입니다");
    } else {
        DB::exec("INSERT INTO rentals (book_id, user_id, rent_date, return_date)
                VALUES ($book_id, $user_id, '$rent_date', '$return_date')");
        alert("대출 완료");
    }move();
}

$rentedIds = [];
$rows = DB::fetchAll("SELECT book_id FROM rentals WHERE return_date >= CURDATE()");
foreach ($rows as $row) {
    $rentedIds[] = $row->book_id;
}

$page = $_GET['page'] ?? 1;
$booksPerPage = 5;
$booksToShow = array_slice($books, ($page - 1) * $booksPerPage, $booksPerPage);

require 'sub02.php';