<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/sub04.css">
</head>
<body>
    <?php require_once 'header.php' ?>

    <div class="bookSection">
        <div class="booksBox">
            <div class="title">
                <div class="en">LOAN REPOSITORY</div>
                <div class="Bt">대출도서복록</div>
            </div>
            <div class="Bcardbox">
                <?php if (empty($rentedBooks)): ?>
                    <h3>대출한 도서가 없습니다.</h3>
                <?php else: ?>
                    <?php foreach($rentedBooks as $book): 

                        $today = new DateTime();
                        $returnDate = new DateTime($book->return_date);
                        $days = (int)$today->diff($returnDate)->format('%r%a');

                    ?>
                    <div class="cardbox">
                        <div class="card">
                            <img src="./rec/<?= $book->img ?>">

                            <div class="book-de">
                                <div class="book-title"><?= $book->title ?></div>
                                <div class="book-author">저자: <?= $book->author ?></div>
                                <div class="book-rent">대출일: <?= $book->rent_date ?></div>
                                <div class="book-return">반납일: <?= $book->return_date ?></div>
                                <div class="daysleft">남은기간: <?= $days ?>일</div>

                                <form method="post">
                                    <input type="hidden" name="return_id" value="<?= $book->id ?>">
                                    <button class="return-btn">반납</button>
                                </form>
                            </div>
                        </div>                    
                    </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="seatSection">
        <div class="seatBox">
            <div class="title">
                <div class="en">READING ROOM RESERVATION</div>
                <div class="Bt">열람실예약현황</div>
            </div>
            <div class="seattable">
                <?php if(empty($reservedSeats)): ?>
                    <h3>예약한 좌석이 없습니다</h3>
                <?php else: ?>
                    <table class="seatTable">
                        <thead>
                            <tr>
                                <th>좌석번호</th>
                                <th>예약일</th>
                                <th>시작시간</th>
                                <th>종료시간</th>
                                <th>예약자</th>
                                <th>취소</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($reservedSeats as $seat): ?>
                            <tr>
                                <td><?= $seat->seat_number ?></td>
                                <td><?= $seat->reserve_date ?></td>
                                <td><?= $seat->start_time ?></td>
                                <td><?= $seat->end_time ?></td>
                                <td><?= $seat->username ?? $seat->user->id ?></td>
                                <td>
                                    <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $seat->user_id): ?>
                                        <form method="post">
                                            <input type="hidden" name="cancel_id" value="<?= $seat->id ?>">
                                            <button class="cancel-btn">취소</button>
                                        </form>
                                    <?php else: ?>
                                        －
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>