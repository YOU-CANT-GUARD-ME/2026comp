<?php
require_once 'lib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $username = $_POST['username'];
    $name = $_POST['name'] ?? '';
    $pw = $_POST['password'];

    if ($type === 'signup') {
        if (DB::fetch("select * from users where username = '$username'")) {
            alert("이미 가입된 회원입니다");
            move();
        } else {
            $hash = password_hash($pw, PASSWORD_DEFAULT);
            DB::exec("insert into users (username, name, password) values ('$username', '$name', '$hash')");
            alert("회원가입 완료");
            move();
        }
    } else {
        $user = DB::fetch("select * from users where username = '$username'");
        if (!$user) {
            back("아이디 또는 비밀번호가 일치하지 않습니다");
        } else {
            password_verify($pw, $user->password);
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;
            $_SESSION['name'] = $user->name;
            $_SESSION['role'] = $user->role;
            alert("로그인 완료");
            move();
        }
    }
}