<?php
session_start();
require_once 'db.php';
require_once 'lib.php';  // Assuming alert() and move() are in lib.php

// POST 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seats'])) {
    if (!isset($_SESSION['user_id'])) {
        alert("로그인이 필요합니다.");
        move();
        exit;
    }

    // Get integer user_id from DB (not username string)
    $user = DB::fetch("SELECT id FROM users WHERE username = '{$_SESSION['user_id']}'");
    if (!$user) {
        alert("잘못된 사용자입니다.");
        move();
        exit;
    }
    $user_id = (int)$user['id'];

    $seats        = $_POST['seats'];            
    $reserve_date = $_POST['reserveDate'];
    $start_time   = $_POST['startTime'];
    $end_time     = $_POST['endTime'];

    if (empty($seats) || empty($reserve_date) || empty($start_time) || empty($end_time)) {
        alert("모든 항목을 입력해주세요.");
    } elseif ($start_time >= $end_time) {
        alert("종료시간은 시작시간보다 늦어야 합니다.");
    } else {
        $seatArr = array_map('intval', explode(',', $seats));

        foreach ($seatArr as $seat) {
            $seatNumber = (int)$seat;
            $reserveDate = date('Y-m-d', strtotime($reserve_date));
            $startTime   = date('H:i:s', strtotime($start_time));
            $endTime     = date('H:i:s', strtotime($end_time));

            $sql = "INSERT INTO reservations (user_id, seat_number, reserve_date, start_time, end_time)
                    VALUES ($user_id, $seatNumber, '$reserveDate', '$startTime', '$endTime')";
            DB::exec($sql);
        }

        alert("예약이 완료되었습니다.");
        move();  // Redirect back to index.php or you can change to sub03.php
        exit;
    }
}

// 현재 예약된 좌석 가져오기
$reservedSeats = [];
$rows = DB::fetchAll("SELECT seat_number FROM reservations WHERE reserve_date >= CURDATE() AND end_time >= CURTIME()");
foreach ($rows as $row) {
    $reservedSeats[] = $row['seat_number'];
}

require 'sub03.php';