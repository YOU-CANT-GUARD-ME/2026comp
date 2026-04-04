<?php
require_once 'lib.php';

$books = DB::fetchAll("select * from books order by id asc");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        back("로그인이 필요합니다");
    }

    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];

    $rent_date = date('Y-m-d');
    $return_date = date('Y-m-d', strtotime('+9 days'));

    DB::exec("insert into rent (book_id, user_id, rent_date, return_date)
    values ($book_id, $user_id, '$rent_date', '$return_date')");
    alert("대출 완료");
    move('/sub02.php');
}
$rented = DB::fetchAll("
    select b.*, r.rent_date
    from books b
    join rent r on b.id = r.book_id
");
$rentedIds = [];
$rows = DB::fetchAll("select book_id from rent where return_date >= curdate()");
if ($rows) {
    foreach($rows as $r) {
        $rentedIds[] = $r->book_id;
    }
}