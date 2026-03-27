<?php 
$booksPerPage = 5;
$totalBooks = count($books);
$totalPages = ceil($totalBooks / $booksPerPage);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($totalPages, $page));

$booksToShow = array_slice($books, ($page - 1) * $booksPerPage, $booksPerPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스북도서관</title>
    <link rel="stylesheet" href="./css/sub02.css">
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <?php require_once 'header.php' ?>

    <div class="libSection">
        <div class="libCon">
            <div class="title">
                <div class="en">BOOK LIST</div>
                <div class="Bt">도서목록</div>
            </div>

            <div class="libbox">
                <div class="libtop">
                    <div class="libsearch">
                        <input type="text" placeholder="도서명">
                        <button class="all">전체</button>
                        <button class="r-able">대출가능</button>
                        <button class="r-notable">대출중</button>
                    </div>
                    <div class="total">총 <span><?= count($books) ?></span>권</div>
                </div>

                <div class="libbottom">
                    <div class="books-header">
                        <div class="B-left">
                            <div>No.</div>
                            <div>도서사진</div>
                            <div>도서명</div>
                        </div>
                        <div class="B-right">
                            <div class="B-rightA">
                                <div>저자명</div>
                                <div>발행년</div>
                                <div>가격</div>
                                <div>대출상태</div>
                            </div>
                            <div class="B-rightB">
                                <div>대출기간</div>
                                <div>대출</div>
                            </div>
                        </div>
                    </div>

                    <div class="books-body">
                        <div class="book-page page1">

                            <?php foreach($booksToShow as $i => $b): 
                                // 임시 book_id (JSON에 id 없을 경우)
                                $book_id = $b->id ?? (($page - 1) * $booksPerPage + $i + 1);

                                $rented = in_array($book_id, $rentedIds);
                            ?>

                            <div class="book">
                                <div class="book-left">
                                    <div><?= $book_id ?></div>
                                    <img src="./rec/<?= $b->이미지 ?>" alt="<?= $book_id ?>">
                                    <div class="booktitle"><?= $b->서명 ?></div>
                                </div>

                                <div class="book-right">
                                    <div class="book-rightA">
                                        <div><?= $b->저자 ?></div>
                                        <div><?= $b->발행년 ?></div>
                                        <div><?= number_format($b->가격) ?></div>

                                        <div class="<?= $rented ? 'not-available' : 'available' ?>">
                                            <?= $rented ? '대출중' : '대출가능' ?>
                                        </div>
                                    </div>

                                    <div class="book-rightB">
                                        <div>
                                            <?= $rented ? '대출중' : '－' ?>
                                        </div>

                                        <div>
                                            <?php if(!$rented): ?>
                                                <form method="post">
                                                    <input type="hidden" name="book_id" value="<?= $book_id ?>">
                                                    <button class="rent">대출하기</button>
                                                </form>
                                            <?php else: ?>
                                                <button disabled class="n-rent">대출불가</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>

                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?= $page - 1 ?>" class="prev">&lt;</a>
                    <?php endif; ?>

                    <span><?= $page ?>/<?= $totalPages ?></span>

                    <?php if($page < $totalPages): ?>
                        <a href="?page=<?= $page + 1 ?>" class="next">&gt;</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

</body> 
</html>