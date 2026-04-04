<?php require_once 'userReserve.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스북도서관</title>
    <link rel="stylesheet" href="./css/sub03.css">
</head>
<body>
    <?php require_once 'header.php' ?>
    <div class="seatsSection">
        <div class="seatsBox">
            <div class="title">
                <div class="en">READING ROOM RESERVATION</div>
                <div class="ko">열람실예약</div>
            </div>
            <div class="seatcon">
                <div class="seats" >
                    <?php for($i = 1; $i <= 75; $i++) { ?>
                        <div class="seat"><?= $i ?></div>
                    <?php } ?>                    
                </div>
            </div>
            <div class="seatdata">
                <span>좌석번호: 없음</span>
                <form action="./userReserve.php" method="post">
                    <div class="formbox">
                        <input type="hidden" name="selected_seats" id="selvalue">
                        <label for="">예약일</label>
                        <input type="date" name="reserve_date" min="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="formbox">
                        <label for="">시작시간</label>
                        <input type="time" name="start_time" required>
                    </div>
                    <div class="formbox">
                        <label for="">종료시간</label>
                        <input type="time" name="end_time" required>
                    </div>
                    <button type="submit" class="reservebtn">예약하기</button>
                </form>
            </div>
        </div>
    </div>
    <script src="./script/sub02.js"></script>
</body>
</html>