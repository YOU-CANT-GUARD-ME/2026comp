<?php if (!isset($rentals)) $rentals = []; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스북도서관</title>
    <link rel="stylesheet" href="./css/sub06.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
</head>
<body>
    <?php require_once 'header.php' ?>

    <div class="booksSection">
        <div class="booksBox">
            <div class="title">
                <div class="en">LOAN REPOSITORY</div>
                <div class="Bt">대출도서복록</div>
            </div>
            <div class="bookstable">
                <div class="t-top">
                    <div class="t-topr">
                        <div class="btitletop">도서명</div>
                        <div class="authortop">저자명</div>
                        <div class="publishera t">출판사</div>                        
                    </div>
                    <div class="t-topl">
                        <div class="rent-date t">대출일자</div>
                        <div class="return-date t">반납일</div>
                        <div class="remaining t">남은기간</div>
                        <div class ="username t">아이디</div> 
                        <div class="return">반납</div>                       
                    </div>
                </div>
                <div class="t-bottom">
                    <?php foreach ($rentals as $r):
                        $today = new DateTime();
                        $returnDate = new DateTime($r->return_date);
                        $diff = $today->diff($returnDate);
                        $isOverdue = $today > $returnDate;
                        
                        // "연체" means Overdue in Korean
                        $remaining = $isOverdue ? "연체" : $diff->days . "일";
                    ?>
                    <div class="row">
                        <div class="t-topr">
                            <div class="btitle"><?= $r->title ?></div>
                            <div class="author"><?= $r->author ?></div>
                            <div class="publisher"><?= $r->publisher ?></div>
                        </div>
                        <div class="t-topl">
                            <div class="rent-date"><?= $r->rent_date ?></div>
                            <div class="return-date"><?= $r->return_date ?></div>
                            <div class="remaining"><?= $remaining ?></div>
                            <div class="username"><?= $r->username ?></div>
                            <div>
                                <?php if ($isOverdue): ?>
                                    <a href="?return_id=<?= $r->id ?>" class="btn-return">반납</a>
                                <?php else: ?>
                                    －
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="seatsSection">
        <div class="seatsBox">
            <div class="title">
                <div class="en">READING ROOM RESERVATION</div>
                <div class="Bt">열람실예약현황</div>
            </div>
            <div class="seatstable">
                <div class="st-top">
                    <div class="seat-number">좌석번호</div>
                    <div class="reserve-datet">예약일</div>
                    <div class="start-timet">시작시간</div>                        
                    <div class="end-timet">종료시간</div>
                    <div class="namet">예약자</div>
                    <div class="time-remaining">남은기간</div>
                    <div class ="usernamet">아이디</div> 
                    <div class="cancel">취소</div>                       
                </div>
                <div class="st-bottom">
                    <?php 
                    if (isset($reservation) && !empty($reservation)):
                        foreach ($reservation as $res): 
                            // 1. Combine Date and End Time to get the exact expiration moment
                            $endDateTime = new DateTime($res->reserve_date . ' ' . $res->end_time);
                            $now = new DateTime();
                            
                            // 2. Compare and Calculate
                            if ($now > $endDateTime) {
                                $timeRemaining = "종료됨"; // "Ended"
                            } else {
                                $diff = $now->diff($endDateTime);
                                // format: 02:30:05 (Hours:Minutes:Seconds)
                                $timeRemaining = $diff->format('%H:%I:%S'); 
                            }
                    ?>
                    <div class="srow">
                        <div class="seat"><?= $res->seat_number ?>번</div>
                        <div class="reserve-date"><?= $res->reserve_date ?></div>
                        <div class="start-time"><?= $res->start_time ?></div>
                        <div class="end-time"><?= $res->end_time ?></div>
                        <div class="name"><?= $res->name ?></div>
                        
                        <div class="time-remaining"><?= $timeRemaining ?></div>
                        
                        <div class="username"><?= $res->username ?></div>
                        <div>
                            <a href="?cancel_res_id=<?= $res->id ?>" 
                            class="btn-cancel" 
                            onclick="return confirm('예약을 취소하시겠습니까?')">취소</a>
                        </div>
                    </div>
                    <?php 
                        endforeach; 
                    else: 
                    ?>
                        <div class="row" style="justify-content: center;">예약 내역이 없습니다.</div>
                    <?php endif; ?>
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
</body>
</html>