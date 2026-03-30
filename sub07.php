
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/sub07.css">
</head>
<body>
    <?php require_once 'header.php' ?>

    <div class="popupSection">
        <div class="popupBox">
            <div class="title">
                <div class="en">POPUP MANAGEMENT</div>
                <div class="Bt">팝업관리</div>
            </div>
            <form method="post" class="popupMaker" enctype="multipart/form-data">
                <div class="form-box">
                    <label for="">제목</label>
                    <input type="text" id="ptitle" name="title">
                </div>
                <div class="form-box">
                    <label for="">내용</label>
                    <input type="text" id="content" name="content">
                </div>
                <div class="form-box">
                    <label for="">이미지</label>
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png">
                </div>
                <div class="form-box">
                    <label for="">팝업시작일</label>
                    <input type="date" id="startTime" name="startTime">
                </div>
                <div class="form-box">
                    <label for="">팝업종료시간</label>
                    <input type="date" id="endTime" name="endTime">
                </div>
                <button type="submit">등록하기</button>
            </form>
            <div class="popupList" style="margin-top: 50px;">
                <div class="title">
                    <div class="en">POPUP REGISTERED</div>
                    <div class="Bt">팝업등록</div>
                </div>                
                <table style="width:100%; text-align:center;">
                    <thead>
                        <tr>
                            <th>이미지</th>
                            <th>제목</th>
                            <th>기간</th>
                            <th>관리</th>
                        </tr>                       
                    </thead>
                    <tbody>
                        <?php foreach($popups as $p): ?>
                        <tr>
                            <td><img src="./<?= $p->image ?>" width="80"></td>
                            <td><?= $p->title ?></td>
                            <td><?= $p->start_time ?> ~ <?= $p->end_time ?></td>
                            <td>
                                <a href="?delete_id=<?= $p->id ?>" onclick="return confirm('삭제하시겠습니까?')">삭제</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>                        
                    </tbody>
                </table>
            </div>
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