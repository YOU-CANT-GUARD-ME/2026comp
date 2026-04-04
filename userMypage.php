<?php
require_once 'lib.php';
if (!isset($_SESSION['user_id'])) {
    back("로그인이 필요합니다");
} 

$user_id = $_SESSION['user_id'];

if (isset($_POST['return_id'])) {
    $id = $_POST['return_id'];
    DB::exec("delete from rent where id = $id and user_id = $user_id");
    alert("반납 완료");
    move('sub04.php');
}

if (isset($_POST['cancel_id'])) {
    $id = $_POST['cancel_id'];
    DB::exec("delete from seats where seat_number = $id and user_id = $user_id");
    alert("취소 완료");
    move("sub04.php");
}

$rentedbooks = DB::fetchAll("select r.*, b.title,  b.img, b.author from rent r join books b on r.book_id = b.id
where r.user_id = $user_id order by r.rent_date desc");

$reservedseats = DB::fetchAll("select s.*, u.username from seats s join users u  on s.user_id = u.id
where s.user_id = $user_id order by s.reserve_date desc, s.start_time desc");