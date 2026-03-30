<?php
require_once 'db.php';
require_once 'lib.php';

if (isset($_GET['return_id'])) {
    $id = $_GET['return_id'];
    DB::exec("delete from rentals where id = '$id'");
    move('adminStatus.php', '반납 처리가 완료되었습니다');
}

if (isset($_GET['cancel_res_id'])) {
    $id = $_GET['canel_res_id'];
    DB::exec("delete from reservation where id = '$id'");
    move('adminStatus.php', '예약이 위소되었습니다');
}

$rentals = DB::fetchAll("
    SELECT r.*, b.title, b.author, b.publisher, u.username 
    FROM rentals r 
    JOIN books b ON r.book_id = b.id 
    JOIN users u ON r.user_id = u.id
    ");
$reservation = DB::fetchAll("
    SELECT r.*, u.name, u.username 
    FROM reservation r 
    JOIN users u ON r.user_id = u.id 
    ORDER BY r.reserve_date DESC
");

require 'sub06.php';