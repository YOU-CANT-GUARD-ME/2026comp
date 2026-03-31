<?php
require_once 'db.php';
require_once 'lib.php';


$books = DB::fetchAll("SELECT id, title AS 서명, author AS 저자, img AS 이미지, year AS 발행년, price AS 가격 FROM books ORDER BY id ASC");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        back("로그인이 필요합니다");
    }

    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];

    $rent_date = date('Y-m-d');
    $return_date = date('Y-m-d', strtotime('+14 days'));

    DB::exec("insert into rentals (book_id, user_id, rent_date, return_date) values ($book_id, $user_id, '$rent_date', '$return_date')");
    alert("대출 완료");
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