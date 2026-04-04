<?php require_once 'authStatus.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스북도서관</title>
    <link rel="stylesheet" href="./css/sub06.css">
</head>
<body>
    <?php require_once 'header.php' ?>
    <div class="booksSection">
        <div class="booksBox">
            <div class="title">
                <div class="en">BOOK LIST</div>
                <div class="ko">도서목록</div>
            </div> 
            <?php if(!$rentals): ?>
                <h3>대출한 도서가 없습니다</h3>
            <?php else: ?>
                <table class="booktable">
                    <thead>
                        <tr>
                            <th class="btitle">도서명</th>
                            <th class="author">저자명</th>
                            <th>출판사</th>
                            <th>대출일자</th>
                            <th>반납일</th>
                            <th>아이디</th>
                            <th>남은기간</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rentals as $r): ?>
                            <?php 
                                $return = strtotime($r->rent_date."+9 days");
                                $returnDate = date('Y-m-d', $return);
                                $diff = ceil(($return - $today) / 86400);
                            ?>
                            <tr>
                                <td class="btitle"><?= $r->title ?></td>
                                <td class="author"><?= $r->author ?></td>
                                <td>
                                    <?php if($r->publisher === ""): ?>
                                        출판사 없음
                                    <?php else: ?>
                                        <?= $r->publisher ?>
                                    <?php endif; ?>
                                </td>
                                <td><?= $r->rent_date ?></td>
                                <td><?= $r->return_date?></td>
                                <td><?= $r->username?></td>
                                <td>
                                    <?php if($diff < 0): ?>
                                        <form action="./authStatus.php" method="post">
                                            <input type="hidden" name="return_id" value="<?= $r->id ?>">
                                            <button class="return">반납</button>
                                        </form>
                                    <?php else: ?>
                                        <span><?= $diff ?>일 남음</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
        <div class="seatsSection">
        <div class="seatsBox">
            <div class="title">
                <div class="en">RESERVED SEATS</div>
                <div class="ko">열람실예약</div>
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