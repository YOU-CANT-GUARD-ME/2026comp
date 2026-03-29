<?php
require_once 'db.php';
require_once 'lib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_SESSION['user_id'])) {
        alert("로그인이 필요합니다");
        move('sub03.php');
    }

    $user_id = $_SESSION['user_id'];

    $seats = $_POST['seats'];
    $reserve_date = $_POST['reserveDate'];
    $start_time = $_POST['startTime'];
    $end_time = $_POST['endTime'];

    if (!$seats || !$reserve_date || !$start_time || !$end_time) {
        alert("모든 항목을 입력해주세요");
        move("sub03.php");
    }

    $seatArr = explode(',', $seats);

    if (count($seatArr) > 4) {
        alert("좌석은 최대 4개까지");
        move("sub03.php");
    }

    $reserveDate = date('Y-m-d', strtotime($reserve_date));
    $startTime = date('H:i:s', strtotime($start_time));
    $endTime = date('H:i:s', strtotime($end_time));

    if ($reserveDate < date('Y-m-d')) {
        alert("예약일은 오늘 이전일 수 없습니다");
        move('sub03.php');
    }

    if ($startTime >= $endTime) {
        alert("종료시간은 시작시간보다 늦어야 합니다");
        move('sub03.php');
    }

    foreach ($seatArr as $seat) {
        $exists = DB::fetch("
            select * from reservation
            where seat_number = $seatNumber
            and reserve_date = '$reserveDate'
            and (start_time < '$endTime' and end_time > '$startTime')
        ");

        if ($exists) {
            alert("이미 예약된 좌석입니다");
            move("sub03.php");
        }

        DB::exec("
            insert into resevation (user_id, seat_number, reserve_date, start_time, end_time)
            values ($user_id, $seatNumber, '$reserveDate', '$startTime', '$endTime')
        ");
    }

    alert("예약 완료");
    move("sub03.php");
}

$rows = DB::fetchAll("
    select seat_number, reserve_date, start_time, end_time
    from reserevation
    where reserve_date >= curdate()
    order by reserve_date desc, start_time desc
");

$reservedSeats = [];
foreach ($rows as $r) {
    $seat = $r->seat_number;

    if (!isset($reservedSeats[$seat])) {
        $reservedSeats[$seat] = [];
    }

    $reservedSeats[$seat][] =
        
}