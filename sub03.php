<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스북도서관</title>
    <link rel="stylesheet" href="./css/sub03.css">
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <?php require_once 'header.php' ?>

    <div class="reserveSection">
        <div class="reserveBox">
            <div class="title">
                <div class="en">READING ROOM RESERVATION</div>
                <div class="Bt">열람실예약</div>
            </div>
            <div class="seatBox">
            <?php for ($i = 1; $i <= 75; $i++): ?>
                <?php
                    $isReserved = isset($reservedSeats[$i]);
                    $class = $isReserved ? 'seat occupied' : 'seat';
                    $tooltip = $isReserved ? implode(", ", $reservedSeats[$i]) : '예약가능';
                ?>
                <div class="<?= $class ?>" title="<?= $tooltip ?>"><?= $i ?></div>
            <?php endfor; ?>
            </div>
            <div class="reserve">
                <div class="r-top">
                    <div class="selc-seat">선택 좌석:<span>없음</span></div>
                    <form method="post" id="reserveForm">
                        <input type="hidden" name="seats" id="selectedSeats">
                        <div class="input-group">
                            <label for="reserveDate" name="reserveDate">예약일</label>
                            <input type="date" id="reserveDate" name="reserveDate" min="<?= date("Y-m-d"); ?>">
                        </div>
                        <div class="input-group">
                            <label for="startTime">시작시간</label>
                            <input type="time" id="startTime" name="startTime">
                        </div>
                        <div class="input-group">
                            <label for="endTime">종료시간</label>
                            <input type="time" id="endTime" name="endTime">
                        </div>
                    </form>
                </div>
                <div class="r-bottom">
                    <div class="reserve-btn" id="btnReserve">예약하기</div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="f-top">
            <div class="f-left">
                <div class="logo f-logo">스킬스북도서관</div>
                <i class="fab fa-youtube fa-2x"></i>
                <i class="fab fa-twitter fa-2x"></i>
                <i class="fab fa-facebook fa-2x"></i>
            </div>
            <div class="f-middle">
                <div>문의전화안내</div>
                <div>1644-8000</div>
                <div>운영시간(평일) 09:00~18:00</div>
            </div>
            <div class="f-right">
                <div>인천시 부평구 무네미로 448번길 77</div>
                <div>한국산업인력공단 글로벌숙련기술진흥원</div>
            </div>
        </div>
        <div class="f-bottom">
            <div>COPYRIGHTⓒ 2016 HRDKOREA</div>
        </div>
    </div>
    <script src="./script/sub03.js"></script>
</body>
</html>