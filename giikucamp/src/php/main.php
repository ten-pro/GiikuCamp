<?php


//CROSエラーの解消
header("Access-Control-Allow-Origin: *");
//JSON形式で返却すること、文字形式がUTF-8だということの宣言
header('Content-Type: application/json; charset=UTF-8');

//DAOの読み込み
require './DAO.php';


//get_userの引数がある場合user情報を返す
if (isset($_POST['get_user']) == true) {
    $class = new Cal();
    $data = $class->get_user($_POST['user_id']);
}


//login_userの引数がある場合はtrueを返す
if(isset($_POST['login_user'])==true){
    $class = new Cal();
    $data = $class->login_user($_POST['user_name'],$_POST['user_pass']);
}


//create_userの引数がある時の処理
if(isset($_POST['create_user'])==true){
    $class = new Cal();
    $data = $class->insert_user($_POST['name'],$_POST['pass']);
}


//get_nameの引数がある時の処理
if(isset($_GET['get_name'])==true){
    $class = new Cal();
    $data = $class->get_name($_POST['name']);
}


//delete_annivarsaryの引数がある時の処理
if(isset($_GET['delete_annivarsary'])==true){
    $class = new Cal();
    $data = $class->delete_annivarsary($_POST['annivarsary_id']);
}


//insert_annivarsaryの引数がある時の処理
if(isset($_POST['insert_annivarsary'])==true){
    $class = new Cal();
    $data = $class->insert_annivarsary($_POST['annivarsary_day'],$_POST['user_id'],$_POST['annivarsary_title'],$_POST['annivarsary_detail']);
}

//update_annivarsaryの引数がある時の処理
if(isset($_POST['update_annivarsary'])==true){
    $class = new Cal();
    $data = $class->update_annivarsary($POST_['annivarsary_day'],$POST_['annivarsary_id'],$POST_['$annivarsary_title'],$POST_['annivarsary_detail']);
}

//annivarsary_listの引数がある時の処理
if(isset($_POST['get_list'])==true){
    $class = new Cal();
    $data = $class->annivarsary_list($_POST['user_id']);
}

//arrayの中身をJSON形式に変換している
$json_array = json_encode($data);

print $json_array;