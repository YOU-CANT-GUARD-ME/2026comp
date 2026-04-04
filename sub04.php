<?php require_once 'userMypage.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스북도서관</title>
    <link rel="stylesheet" href="./css/sub04.css">
</head>
<body>
    <?php require_once 'header.php' ?>

    <div class="booksSection">
        <div class="booksBox">
            <div class="title">
                <div class="en">RENTED BOOKS</div>
                <div class="ko">도서대출목록</div>
            </div>
            <div class="bookscont">
                <div class="booksCon">
                <?php if(!$rentedbooks): ?>
                    <h3>대출한 도서가 없습니다</h3>
                <?php else: ?>
                    <?php foreach($rentedbooks as $book):
                    
                    $today = strtotime(date('Y-m-d'));
                    $return = strtotime($book->return_date);
                    $diff = $return - $today;
                    $days = ceil($diff / (60 * 60 * 24));
                    ?>
                    <div class="bookcard">
                        <div class="imgcon"><img src="./images/<?= $book->img ?>" alt=""></div>
                        <div class="bookinfo">
                            <div class="info">
                                <div class="btitle"><?= $book->title ?></div>
                                <div class="author"><?= $book->author ?></div>
                                <div class="rent-date"><span>대출일자:</span><span><?= $book->rent_date ?></span></div>
                                <div class="return-date"><span>반납일:</span><span><?= $book->return_date ?></span></div>
                                <div class="daysleft"><span>남은기간:</span><span>
                                    <?php 
                                    echo ($return - $today)/86400;
                                    ?>일
                                </span></div>                            
                            </div>
                            <form action="./userMypage.php" method="post" class="bookbtn">
                                <input type="hidden" name="return_id" value="<?= $book->id ?>">
                                <button type="submit">반납하기</button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>                
            </div>
        </div>
    </div>
    <div class="seatsSection">
        <div class="seatsBox">
            <div class="title">
                <div class="en">RESERVED SEATS</div>
                <div class="ko">예람실예약</div>
            </div>
            <?php if (!$reservedseats): ?>
                <h3>예약한 좌석이 없습니다</h3>
            <?php else: ?>
                <table class="seatcon">
                    <thead>
                        <tr>
                            <th>좌석번호</th>
                            <th>예약일</th>
                            <th>시작시간</th>
                            <th>종료시간</th>
                            <th>아이디</th>
                            <th>취소</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($reservedseats as $seat): ?>
                        <tr>
                            <td><?= $seat->seat_number ?></td>
                            <td><?= $seat->reserve_date ?></td>
                            <td><?= $seat->start_time ?></td>
                            <td><?= $seat->end_time ?></td>
                            <td><?= $_SESSION['username']  ?></td>
                            <td>
                                <form action="./userMypage.php" method="post" class="seatbtn">
                                    <input type="hidden" name="cancel_id" value="<?= $seat->seat_number ?>">
                                    <button type="submit" class="reservebtn">취소</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>            
            <?php endif; ?>
        </div>
    </div>
</body>
</html>