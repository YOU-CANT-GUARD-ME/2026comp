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
                        <button class="all">전제</button>
                        <button class="r-able">대출가능</button>
                        <button class="r-notable">대출중</button>
                    </div>
                    <div class="total">총 <span>10</span>권</div>
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
                                <div>댜줄성태</div>
                            </div>
                            <div class="B-rightB">
                                <div>대출기간</div>
                                <div>대출</div>
                            </div>
                        </div>
                    </div>
                    <div class="books-body">
                        <div class="book">
                            <div class="book">
                                
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>