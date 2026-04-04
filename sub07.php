<?php require_once 'authPopup.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스킬스북도서관</title>
    <link rel="stylesheet" href="./css/sub07.css">
</head>
<body>
    <?php require_once 'header.php' ?>
    
    <div class="popupSection">
        <div class="popupBox">
            <div class="title">
                <div class="en">POPUP MANANGER</div>
                <div class="ko">팝업관리</div>
            </div>
            <form action="./authpopup.php" method="post" class="popupmaker" enctype="multipart/form-data">
            <?php if($updated): ?>
                <input type="hidden" name="id" value="<?= $updated->id ?>">
                <input type="hidden" name="old_img" value="<?= $updated->img ?>">
            <?php endif; ?>    
            <div class="form-con">
                    <input type="text" placeholder="제목" name="title" value="<?= $updated ? $updated->title : '' ?>" required>
                    <input type="text" placeholder="내용" name="content" value="<?= $updated ? $updated->content : '' ?>" required>
                </div>
                <div class="form-con">
                    <input type="date" placeholder="시작일" name="start_day" value="<?= $updated ? $updated->start_day : '' ?>" required>
                    <input type="date" placeholder="종료일" name="end_day" value="<?= $updated ? $updated->end_day : '' ?>" required>
                </div>
                <div class="form-box">
                    <label for="img"><i class="fa fa-upload fa-2x"></i><span>이미지 업로드</span></label>
                    <input type="file" id="img" name="img" accept=".jpg, .png, .jpeg" hidden>
                </div>
                <div class="form-con s"><button type="submit"><?= $updated ? '수정완료' : '등록' ?></button></div>
                <?php if($updated): ?><a href="sub07.php">취소</a><?php endif; ?>
            </form>        
            <div class="title">
                <div class="en">POPUP LIST</div>
                <div class="ko">팝업 목록</div>
            </div>
            <?php if(!$popups): ?>
                <h3>등록된 팝업이 없읍니다</h3>
            <?php else: ?>
                <div class="popupscon">
                    <?php foreach($popups as $p): ?>
                        <div class="popup">
                            <div class="ptop">
                                <h4><?= $p->title ?></h4>
                            </div>
                            <div class="popupimg"><img src="./images/<?= $p->img ?>" alt=""></div>
                            <form class="form-btns" action="./authPopup.php" method="post">
                                <div class="form-btn">
                                    <a class="update" href="sub07.php?update_id=<?= $p->id ?>">수정</a>                                    
                                </div>
                                <div class="form-btn">
                                    <input type="hidden" name="delete_id" value="<?= $p->id ?>">
                                    <button class="delete" type="submit">삭제</button>                                    
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>            
        </div>
    </div>
</body>
</html>