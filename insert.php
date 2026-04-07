<?php

require_once "db.php";

$json = file_get_contents('./public/bookdata.json');
$datas = json_decode($json, true);
foreach( $datas as $data ) {
  $title = addslashes($data['서명']);
  $author = addslashes($data['저자']);
  $img = $data['이미지'];
  $relase = $data['발행년'];
  $price = $data['가격'];
  DB::exec("insert into bookdata (title,author,img,relase,price) values ('$title','$author','$img',$relase,$price)");
}