<?php
require_once 'db.php';
require_once 'lib.php';

// 1. Fixed Delete Logic (Fixed typo: delte_id -> delete_id)
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    // Fixed: Added table name 'popup' and matched the id
    DB::exec("delete from popup where id = $id");
    move('adminPopup.php', '팝업이 삭제되었습니다');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $start_time = $_POST['startTime'];
    $end_time = $_POST['endTime'];

    $file    = $_FILES['image'];
    $ext     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png'];

    if(!in_array($ext, $allowed)) {
        back('JPG, JPEG, PNG 파일만 가능합니다.');
        exit;
    }

    $image_name = time().'.'.$ext;

    move_uploaded_file($file['tmp_name'], "./images/".$image_name);

    if(!$title || !$content || !$start_time || !$end_time) {
        alert("모든 항목을 입력해주세요");
    } else {
        // Fixed: Changed '$image' to '$image_name' to match your variable above
        DB::exec("
        insert into popup (title, content, image, start_time, end_time) 
        values('$title', '$content', '$image_name', '$start_time', '$end_time')
        ");
        move('adminPopup.php', '팝업이 등록되었습니다');
        exit;
    }
}

$popups = DB::fetchAll("select * from popup order by id desc");

require 'sub07.php';