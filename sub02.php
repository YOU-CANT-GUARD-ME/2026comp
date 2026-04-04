<?php require 'userRent.php' ?>
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

    <div class="booksSection">
        <div class="booksBox">
            <div class="title">
                <div class="en">BOOK LIST</div>
                <div class="ko">도서목록</div>
            </div> 
            <table class="booktable">
                <thead>
                    <tr>
                        <th>도서사진</th>
                        <th class="btitle">도서명</th>
                        <th class="author">저자명</th>
                        <th>발행년</th>
                        <th>가격</th>
                        <th>대출가능한상테</th>
                        <th>대출기간</th>
                    </tr>
                </thead>
                <tbody>
                <?php $books = DB::fetchAll("
                            select b.*, r.rent_date, r.return_date
                            from books b
                            left join rent r on b.id = r.book_id ");
                        foreach($books as $book):
                            $rented = in_array($book->id, $rentedIds);
                    ?>
                    <tr>
                        <td><img class="bimg" src="./images/<?= $book->img ?>" alt=""></td>
                        <td class="btitle"><?= $book->title ?></td>
                        <td class="author"><?= $book->author ?></td>
                        <td><?= $book->year ?></td>
                        <td><?= $book->price ?></td>
                        <td><?= $rented ? '<span style="color:red;">대출중</span>' : '대출가능' ?></td>
                        <td>
                        <?php if(!$rented): ?>
                            <form action="userRent.php" method="post">
                                <input type="hidden" name="book_id" value="<?= $book->id ?>">
                                <button class="borrow">대출하기</button>                                
                            </form>
                        <?php else: ?>
                            <span><?= $book->rent_date ?> ~ <?= $book->return_date ?></span>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>