
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스북도서관</title>
    <link rel="stylesheet" href="./css/sub05.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
</head>
<body>
    <?php require_once 'header.php' ?>

    <div class="regSection">
        <div class="regBox">
            <div class="title">
                <div class="en">NEW BOOK REGISTRATION</div>
                <div class="ko">신규도서등록</div>
            </div>
            <form action="./authBook.php" method="post" class="bookmaker" enctype="multipart/form-data">
                <div class="form-con">
                    <input type="text" class="btitle" name="title" placeholder="도서명" required>
                </div>
                <div class="form-con">
                    <input type="text" placeholder="저자명" name="author" required>
                    <input type="text" placeholder="출판사" name="publisher" required>
                </div>
                <div class="form-con">
                    <input type="number" placeholder="발행년" name="year" required>
                    <input type="number" placeholder="가격" name="price" required>
                </div>
                <div class="form-box">
                    <label for="img"><i class="fa fa-upload fa-2x"></i><span>이미지 업로드</span></label>
                    <input type="file" id="img" name="img" accept=".jpg, .png, .jpeg" hidden>
                </div>
                <div class="form-con s"><button type="submit">등록</button></div>
            </form>
        </div>
    </div>
</body>
</html>