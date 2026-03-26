<?php
session_start();
require_once 'db.php';
require_once 'lib.php';

$type = $_POST['type'] ?? '';
$id = $_POST['id'] ?? '';
$pw = $_POST['pw'] ?? '';
$name = $_POST['name'] ?? '';

if ($type === "signup") {
    if (DB::fetch("SELECT * FROM users WHERE username='$id'")) {
        alert("이미 사용중인 아이디입니다");
    } else {
        $hashed = password_hash($pw, PASSWORD_DEFAULT);
        DB::exec("INSERT INTO users (username, password, name) VALUES ('$id', '$hashed', '$name')");
        alert("회원가입 성공");
    }
    move();
} else { // login
    $user = DB::fetch("SELECT * FROM users WHERE username='$id'");
    if (!$user) {
        alert("존재하지 않는 사용자입니다");
    } else if (!password_verify($pw, $user->password)) {
        alert("비밀번호 일치하지 않습니다");
    } else {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['name'] = $user->name;
        alert("로그인 성공");
    }
    move();
}