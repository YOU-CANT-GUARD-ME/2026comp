<?php
require_once 'db.php';
require_once 'lib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seats'])) {
    // 1. Login Check (implicitly required for "Member" status)
    if (!isset($_SESSION['user_id'])) {
        alert("로그인이 필요합니다.");
        move();
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $seats = $_POST['seats'];
    $reserve_date = $_POST['reserveDate'];
    $start_time = $_POST['startTime'];
    $end_time = $_POST['endTime'];

    // 2. Empty Field & Time Order Check
    if (!$seats || !$reserve_date || !$start_time || !$end_time) {
        alert("모든 항목을 입력해주세요.");
    } elseif ($start_time >= $end_time) {
        alert("종료시간은 시작시간보다 늦어야 합니다.");
    } else {
        $seatArr = explode(',', $seats);
        
        // 3. Overlap Check (Requirement: 예약중복 메시지 보여준다)
        $isDuplicate = false;
        foreach ($seatArr as $seat) {
            $check = DB::fetch("SELECT * FROM reservation 
                                WHERE seat_number = $seat 
                                AND reserve_date = '$reserve_date' 
                                AND NOT (end_time <= '$start_time' OR start_time >= '$end_time')");
            if ($check) {
                $isDuplicate = true;
                break;
            }
        }

        if ($isDuplicate) {
            alert("예약일 및 이용시간이 다른예약과 중복됩니다.");
        } else {
            // 4. Database Registration
            foreach ($seatArr as $seat) {
                DB::exec("INSERT INTO reservation (user_id, seat_number, reserve_date, start_time, end_time)
                          VALUES ($user_id, $seat, '$reserve_date', '$start_time', '$end_time')");
            }
            alert("예약이 완료되었습니다.");
            move();
            exit;
        }
    }
}

$reservedSeats = []; 
$rows = DB::fetchAll("SELECT * FROM reservation WHERE reserve_date >= CURDATE()");
foreach ($rows as $r) {
    $rowArr = (array)$r; 
    $sn = (int)$rowArr['seat_number']; 
    $label = $rowArr['reserve_date'] . " " . substr($rowArr['start_time'], 0, 5) . "~" . substr($rowArr['end_time'], 0, 5);
    $reservedSeats[$sn][] = $label;
}
require 'sub03.php';