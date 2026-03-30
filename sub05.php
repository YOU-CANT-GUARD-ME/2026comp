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
            <form method="post" class="bookmaker" enctype="multipart/form-data">
                <div class="form-box">
                    <label for="">도서명</label>
                    <input type="text" id="btitle" name="title">
                </div>
                <div class="form-box">
                    <label for="">저자명</label>
                    <input type="text" id="author" name="author">
                </div>
                <div class="form-box">
                    <label for="">출판사</label>
                    <input type="text" id="publisher" name="publisher">
                </div>
                <div class="form-box">
                    <label for="">도서사진</label>
                    <input type="file" id="bookImage" name="image" accept=".jpg, .jpeg, .png">
                </div>
                <div class="form-box">
                    <label for="">발행년</label>
                    <input type="number" id="year" name="year">
                </div>
                <div class="form-box">
                    <label for="">가격</label>
                    <input type="number" id="price" name="price">
                </div>
                <button type="submit">등록하기</button>
            </form>
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