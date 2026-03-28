<?php
require_once 'db.php';
require_once 'lib.php';

if (!isset($_SESSION['user_id'])) {
    alert("로그인 필요합니다");
    move();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['return_id'])) {
    $id = $_POST['return_id'];
    DB::exec("delete from rentals where id = $id and user_id = $user_id");
    alert("반납 완료");
    move('userMypage.php');
}

if (isset($_POST['cancel_id'])) {
    $seat_id = $_POST['cancel_id'];
    DB::exec("delete from reservation where id = $seat_id and user_id = $user_id");
    alert("예약 취소 완료");
    move('userMypage.php');
}

$rentedBooks = DB::fetchAll("select r.id, r.book_id, r.rent_date, r.return_date, b.title, b.author, b.img
    from rentals r 
    join books b on r.book_id = b.id
    where r.user_id = $user_id order by r.rent_date desc
");

$reservedSeats = DB::fetchAll("
    SELECT s.*, u.username 
    FROM reservation s
    LEFT JOIN users u ON s.user_id = u.id
    WHERE s.user_id = $user_id
    AND s.end_time >= CURTIME() -- only future or ongoing
    ORDER BY s.reserve_date ASC, s.start_time ASC
");

require 'sub04.php';