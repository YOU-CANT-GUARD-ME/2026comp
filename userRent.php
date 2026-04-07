<?php
require_once 'lib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        back("로그인이 필요합니다");
    }

    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];

    $rent_date = date('Y-m-d');
    $return_date = date('Y-m-d', strtotime("+9 days"));

    DB::exec("insert into rent (book_id, user_id, rent_date, return_date)
    values ($book_id, $user_id, '$rent_date', '$return_date')");
    alert("대출 완료");
    move("sub02.php");
}
$rentedIds = [];
$rows = DB::fetchAll("select * from rent where return_date >= curdate()");
foreach($rows as $r) {
    $rentedIds[] = $r->book_id;
}