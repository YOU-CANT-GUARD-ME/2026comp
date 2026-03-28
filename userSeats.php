<?php
require_once 'db.php';
require_once 'lib.php';

// POST 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seats'])) {

    if (!isset($_SESSION['user_id'])) {
        alert("로그인이 필요합니다.");
        move();
        exit;
    }

    $user_id = (int)$_SESSION['user_id']; // no DB query needed

    $seats = $_POST['seats'];
    $reserve_date = $_POST['reserveDate'];
    $start_time = $_POST['startTime'];
    $end_time = $_POST['endTime'];

    // validation
    if (!$seats || !$reserve_date || !$start_time || !$end_time) {
        alert("모든 항목을 입력해주세요.");
    } elseif ($start_time >= $end_time) {
        alert("종료시간은 시작시간보다 늦어야 합니다.");
    } else {

        $seatArr = explode(',', $seats);

        // format once (not inside loop)
        $reserveDate = date('Y-m-d', strtotime($reserve_date));
        $startTime   = date('H:i:s', strtotime($start_time));
        $endTime     = date('H:i:s', strtotime($end_time));

        foreach ($seatArr as $seat) {
            $seatNumber = (int)$seat;

            DB::exec("
                INSERT INTO reservation (user_id, seat_number, reserve_date, start_time, end_time)
                VALUES ($user_id, $seatNumber, '$reserveDate', '$startTime', '$endTime')
            ");
        }

        alert("예약이 완료되었습니다.");
        move();
        exit;
    }
}

// 예약된 좌석 가져오기
$rows = DB::fetchAll("
    SELECT seat_number 
    FROM reservation 
    WHERE reserve_date >= CURDATE() 
    AND end_time >= CURTIME()
");

$reservedSeats = array_column($rows, 'seat_number');

require 'sub03.php';