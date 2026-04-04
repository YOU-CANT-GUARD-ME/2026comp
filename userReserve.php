<?php
require_once 'lib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        back("로그인이 필요합니다");
    }

    $user_id = $_SESSION['user_id'];
    $seats = $_POST['selected_seats'];
    $reserve_date = $_POST['reserve_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    if ($start_time >= $end_time) {
        back("종료시간은 시작시간보다 늦어야 합니다");
    } else {
        $seatArr = json_decode($seats, true);
        $isDupli = false;
        echo $seatArr;
        foreach($seatArr as $seat) {
            $check = DB::fetch("select * from seats where seat_number = '$seat'
            and reserve_date= '$reserve_date' 
            and not (end_time <= '$start_time' or start_time >= '$end_time')");

            if ($check) {
                $isDupli = true;
                break;
            }
        }

        if ($isDupli) {
            back("이미 예약된 시간입니다");
            exit;
        } else {
            foreach($seatArr as $seat) {
                DB::exec("insert into seats (user_id, seat_number, reserve_date, start_time, end_time)
                values ('$user_id', '$seat', '$reserve_date', '$start_time', '$end_time')");                
            }
        }
        alert("예약 완료");
        move();
    }
}