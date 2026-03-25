<?php 
$books = json_decode(file_get_contents('./도서정보.json'));
$rentels = $renales ?? [];

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
</head>
<body>
    <?php require_once 'header.php' ?>

    <div class="libSection">
        <div class="libCon">
            <div class="title">
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
                                $title = $b->서명;
                                $rented = isset($rentels[$title]);
                            ?>
                            <div class="book">
                                <div class="book-left">
                                    <div><?= ($page-1)*$booksPerPage + $i + 1 ?></div>
                                    <img src="./rec/<?= $b->이미지 ?>" alt="<?= $i+1 ?>">
                                    <div class="booktitle"><?= $title ?></div>
                                </div>
                                <div class="book-right">
                                    <div class="book-rightA">
                                        <div><?= $b->저자?></div>
                                        <div><?= $b->발행년 ?></div>
                                        <div><?= number_format($b->가격) ?></div>
                                        <div class="<?= $rented ? 'not-avaible' : 'avaible' ?>">
                                            <?= $rented ? '대출중' : '대출가능' ?>
                                        </div>
                                    </div>
                                    <div class="book-rightB">
                                        <div><?= $rented ? $rentels[$title] : '－' ?></div>
                                        <div>
                                            <?php if(!$rented): ?>
                                                <form method="post">
                                                    <input type="hidden" name="book" value="<?= $title ?>">
                                                    <button class="rent">대출하기</button>
                                                </form>
                                            <?php else: ?>
                                                <button disabled>대출불가</button>
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
    <script>
    fetch('./도서정보.json')
    .then(res => res.json())
    .then(books => {
        let values = [];
        books.forEach(b => values.push(`('${b.이미지}', '${b.서명}', '${b.저자}',' ${b.발행년}', '${b.가격}')`));
        const sql = "INSERT INTO books (img, title, author, year, price) VALUES " + values.join(',');
        console.log(sql);
    });
    </script>
</body> 
</html>