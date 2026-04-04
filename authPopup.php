<?php
require_once 'lib.php';
$updated = null;
if (isset($_GET['update_id'])) {
    $id = $_GET['update_id'];
    $updated = DB::fetch("select * from popups where id = $id");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_id'])) {
        $id = $_POST['delete_id'];
        DB::exec("delete from popups where id = $id");
        alert("삭제 완료");
        move('sub07.php');
        exit;
    }
    if (isset($_POST['title'])) {
        $id = $_POST['id'] ?? null;
        $title = $_POST['title'];
        $content = $_POST['content'];
        $start_day = $_POST['start_day'];
        $end_day = $_POST['end_day'];

        $img = $_FILES['img'];

        if ($img['name']) {
            $imgname = time()."_".$img['name'];
            move_uploaded_file($img['tmp_name'], './images/'.$imgname);            
        } else {
            $imgname = $_POST['old_img'] ?? '';
        }


        if ($start_day > $end_day) {
            back('종료일은 시작일보다 늦어야 합니다');
            exit;
        }
        
        if ($id) {
            DB::exec("update popups set
                title = '$title', 
                content = '$content',
                start_day = '$start_day',
                end_day = '$end_day',
                img = '$imgname'
                where id = $id");
            alert("수정완료");
        } else {
            DB::exec("insert into popups (title, content, start_day, end_day, img)
            values ('$title', '$content', '$start_day', '$end_day', '$imgname')");
            alert("등록 성공");   
        }
        move("sub07.php"); 
    }
}   
$popups = DB::fetchAll("select * from popups");