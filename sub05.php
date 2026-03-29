<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스북도서관</title>
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <link rel="stylesheet" href="./css/sub05.css">
</head>
<body>
    <?php require_once 'header.php' ?>


    <div class="bookmakeSeaction">
        <div class="booksmakeBox">
            <div class="title">
                <div class="en">NEW BOOK REGISTRATION</div>
                <div class="Bt">신규도서등록</div>
            </div>
            <form method="post" class="bookmaker">
                <div class="form-box">
                    <label for="">도서명</label>
                    <input type="text" id="bookName" name="bookName">
                </div>
                <div class="form-box">
                    <label for="">저자명</label>
                    <input type="text" id="authorName" name="authorName">
                </div>
                <div class="form-box">
                    <label for="">출판사</label>
                    <input type="text" id="publisher" name="publisher">
                </div>
                <div class="form-box">
                    <label for="">도서사진</label>
                    <input type="file" id="bookImage" name="bookImage" accept="images/*">
                </div>
                <div class="form-box">
                    <label for="">발행년</label>
                    <input type="text" id="publishYear" name="publishYear">
                </div>
                <div class="form-box">
                    <label for="">가격</label>
                    <input type="text" id="price" name="price">
                </div>
                <button type="submit">등록하기</button>
            </form>
        </div>
    </div>
</body>
</html>