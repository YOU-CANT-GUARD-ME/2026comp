<?php require_once 'db.php' ?>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; color: #333; list-style: none; text-decoration: none; }
    body { background-color: #f4f1eb; }
    /* 헤더 */
    .header { position: fixed; display: flex; justify-content: center; align-items: center; width: 100%; height: 64px; background-color: #1a1a2e; z-index: 1; }
    .nav { width: 1400px; height: 64px; display: flex; justify-content: space-between; align-items: center; }
    .logo { width: 200px; height: 50px;overflow: hidden;  display: flex; flex-direction: row; justify-content: space-between; }
    .logo img { width: 100%; height: 100%; object-fit: cover; }
    .nav-a > ul { display: flex; list-style: none; }
    .nav-a > ul > li { position: relative; }
    .focus { position: absolute; inset: 0; opacity: 0; cursor: pointer; z-index: 2; }
    .nav-a > ul > li > a { display: flex; align-items: center; gap: 6px; padding: 0 18px; height: 64px; color: #ccc; position: relative; transition: .2s ease; }
    .nav-a > ul > li:hover > a { background-color: #272747; }
    .underline { position: absolute; bottom: 0; left: 18px; right: 18px; height: 2px; background-color: #e8d5a3; transform: scaleX(0); transition: .3s ease; }
    .np { position: relative; width: 18px; height: 18px; color: #ccc; }
    .np::before { content: ''; position: absolute; width: 10px; height: 1.5px; top: 50%; left: 50%; background-color: #ccc; transform: translate(-50%, -50%); color: #ccc; }
    .np::after { content: ''; position: absolute; width: 1.5px; height: 10px; top: 50%; left: 50%; background-color: #ccc; transform: translate(-50%, -50%) rotate(0deg); transition: .3s ease-in-out; color: #ccc; }
    .dropdown { position: absolute; top: 100%; left: 0; width: 160px; background-color: #16213e; border-radius: 0 0 8px 8px; max-height: 0; opacity: 0; overflow: hidden; transform: translateY(-8px); transition: .3s ease; }
    .dropdown li { cursor: pointer; }
    .dropdown li a { color: #aaa; display: block; padding: 11px 20px; }
    .dropdown li:hover { background-color: #1f2e58; }
    .dropdown li:hover a { color: #e8d5a3; }
    .focus:focus ~ .dropdown { max-height: 300px; opacity: 1; transform: translateY(0); pointer-events: auto; }
    .focus:focus ~ a .np::after { transform: translate(-50%, -50%) rotate(90deg); }
    .focus:focus ~ a .underline { transform: scaleX(1); }
    .nav-a > ul > li:not(:hover) .focus { animation: kill 0.001s forwards; }
    @keyframes kill {
        from { display: none; }
        to { display: block; }
    }
    .nav-b ul { display: flex; left: none; }
    .nav-b ul li { color: #ccc; padding: 0 18px; height: 64px; display: flex; align-items: center; cursor: pointer; }
    .nav-b ul li a { color: #ccc; }
    .nav-b ul li:hover { background-color: #272747; }
    .loginbox, .signupbox {  position: absolute; top: 64px; right: 120px; padding: 20px 8px 8px 8px; border-top: 3px solid #e8d5a3; background-color: #fff; width: 300px; height: 250px; display: none; flex-direction: column; justify-content: space-between; }
    .signupbox { height: 300px; }
    .ltop { width: 100%; }
    .closel { width: 80px; height: 30px; background-color: #16213e; display: flex; justify-content: center; align-items: center; border-radius: 10px; color: #ccc; }
    .lbottom, .sbottom { display: flex; width: 100%; height: 150px; flex-direction: column; justify-content: space-between; align-items: center; }
    .sbottom { height: 200px; }
    .lbottom input, .sbottom input { padding: 10px; width: 100%; }
    .lbottom button, .sbottom button { width: 100%; border: none; background-color: #16213e; color: #ccc; padding: 10px; }
    .active { display: flex; }
</style>
<div class="header">
    <div class="nav">
        <a href="index.php" class="logo"><img src="./images/logo.png" alt=""></a>
        <div class="nav-a">
            <ul>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 1): ?>
                <li>
                    <input class="focus">
                    <a>도서관소개
                        <span class="np"></span>
                        <span class="underline"></span>
                    </a>
                    <ul class="dropdown">
                        <li><a href="#">도서관소개</a></li>
                        <li><a href="#">도서관현황</a></li>
                    </ul>
                </li>
                <li>
                    <input class="focus">
                    <a>도서자료실
                        <span class="np"></span>
                        <span class="underline"></span>
                    </a>
                    <ul class="dropdown">
                        <li><a href="sub02.php">자료실</a></li>
                        <li><a href="sub03.php">열람실예약</a></li>
                    </ul>
                </li>
                <li>
                    <input class="focus">
                    <a>회원서비스
                        <span class="np"></span>
                        <span class="underline"></span>
                    </a>
                    <ul class="dropdown">
                        <?php if(!isset($_SESSION['user_id'])): ?>
                            <li><a href="#">회원가입</a></li>
                        <?php endif; ?>
                        <li><a href="sub04.php">마이페이지</a></li>
                    </ul>
                </li>
                <li><a href="#">도서검색</a></li>
                <li>
                    <input class="focus">
                    <a>도서관리자
                        <span class="np"></span>
                        <span class="underline"></span>
                    </a>
                    <ul class="dropdown">
                        <li><a href="sub05.php">신규도서등록</a></li>
                        <li><a href="sub06.php">대출/열람실 업무조회</a></li>
                        <li><a href="sub07.php">팝업관리</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li>
                    <input class="focus">
                    <a>도서관소개
                        <span class="np"></span>
                        <span class="underline"></span>
                    </a>
                    <ul class="dropdown">
                        <li><a href="#">도서관소개</a></li>
                        <li><a href="#">도서관현황</a></li>
                    </ul>
                </li>
                <li>
                    <input class="focus">
                    <a>도서자료실
                        <span class="np"></span>
                        <span class="underline"></span>
                    </a>
                    <ul class="dropdown">
                        <li><a href="sub02.php">자료실</a></li>
                        <li><a href="sub03.php">열람실예약</a></li>
                    </ul>
                </li>
                <li>
                    <input class="focus">
                    <a>회원서비스
                        <span class="np"></span>
                        <span class="underline"></span>
                    </a>
                    <ul class="dropdown">
                        <?php if(!isset($_SESSION['user_id'])): ?>
                            <li><a href="#">회원가입</a></li>
                            <?php endif; ?>
                        <li><a href="sub04.php">마이페이지</a></li>
                    </ul>
                </li>
                <li><a href="#">도서검색</a></li>
                <li><a href="#">도서관리자</a></li>
            <?php endif; ?>
            </ul>
        </div>
        <div class="nav-b">
            <ul>
            <?php if(isset($_SESSION['user_id'])): ?>
                <li class="users">< <?= $_SESSION['username'] ?> >(< <?= $_SESSION['name'] ?> >)</li>
                <li class=""><a href="logout.php">로그아웃</a></li>                    
            <?php else: ?>
                <li class="olog">로그인</li>
                <li class="osign">회원가입</li>                    
            <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="loginbox">
        <div class="ltop">
            <h2>로그인</h2>
        </div>
        <form class="lbottom" method="post" action="./userAction.php">
            <input type="hidden" name="type" value="login">
            <input type="text" name="username" placeholder="아이디" required>
            <input type="password" name="password" placeholder="비밀번호" required>
            <button type="submit" class="loginbtn">Login</button>
        </form>
    </div>
    <div class="signupbox">
        <div class="ltop">
            <h2>회원가입</h2>
        </div>
        <form class="sbottom" method="post" action="./userAction.php">
            <input type="hidden" name="type" value="signup">
            <input type="text" name="username" placeholder="아이디" required>
            <input type="text" name="name" placeholder="이름" required>
            <input type="password" name="password" placeholder="비밀번호" required>
            <button type="submit" class="signupbtn">SignUp</button>
        </form>
    </div>
</div>

<script>
    const lPanel = document.querySelector('.loginbox');
    const rPanel = document.querySelector('.signupbox');
    const lbtn = document.querySelector('.olog');
    const rbtn = document.querySelector('.osign');

    rbtn.onclick = (e) => {
        e.preventDefault();
        rPanel.classList.toggle('active');
        lPanel.classList.remove('active');
    }

    lbtn.onclick = (e) => {
        e.preventDefault();
        lPanel.classList.toggle('active');
        rPanel.classList.remove('active');
    }
</script>