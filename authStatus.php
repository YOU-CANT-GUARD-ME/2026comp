<?php
require_once 'lib.php';

if (isset($_POST['return_id'])) {
    $id = $_POST['return_id'];
    DB::exec("delete from rent where id = $id");
    alert("반납 완료");
    move('sub06.php');
}

if (isset($_POST['cancel_id'])) {
    $id = $_POST['cancel_id'];
    DB::exec("delete from seats where id = $id");
    alert("예약 취소");
    move('sub06.php');
}

$rentals = DB::fetchAll("select r.*, b.title, b.author, b.publisher, u.username
    from rent r
    join books b on r.book_id = b.id 
    join users u on r.user_id = u.id
    order by r.rent_date desc
");

$reservedseats =DB::fetchAll("select s.*, u.username
    from seats s
    join users u on s.user_id = u.id
    order by s.reserve_date desc"
);

$today = strtotime(date('Y-m-d'));