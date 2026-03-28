<?php
require_once 'db.php';
require_once 'lib.php';

$books = json_decode(file_get_contents('./도서정보.json'));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id'])) {
        alert("로그인 필요합니다");
        move();
    }

    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];

    $rent_date = date('Y-m-d');
    $return_date = date('Y-m-d', strtotime('+14 days'));

    DB::exec("insert into rentals (book_id, user_id, rent_date, return_date) values ($book_id, $user_id, '$rent_date', '$return_date')");
    alert("대출 완료");
}