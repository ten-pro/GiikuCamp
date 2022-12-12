<?php


//CROSエラーの解消
header("Access-Control-Allow-Origin: *");
//JSON形式で返却すること、文字形式がUTF-8だということの宣言
header('Content-Type: application/json; charset=UTF-8');

//DAOの読み込み
require './DAO.php';

try {
    //get_userの引数がある場合user情報を返す
    if (isset($_POST['get_user']) == true) {
        $class = new Cal();
        $data = $class->get_user($_POST['user_id']);
    }


    //login_userの引数がある場合はtrueを返す
    if (isset($_POST['login_user']) == true) {
        $class = new Cal();
        $data = $class->login_user($_POST['user_name'], $_POST['user_pass']);
    }


    //create_userの引数がある時の処理
    if (isset($_POST['create_user']) == true) {
        $class = new Cal();
        $data = $class->insert_user($_POST['name'], $_POST['pass']);
    }


    //update_userの引数がある時の処理
    if (isset($_POST['update_user']) == true) {
        $class = new Cal();
        $data = $class->update_user($_POST['user_id'],$_POST['user_name'], $_POST['alert_date1'], $_POST['alert_date3'], $_POST['alert_date5'], $_POST['alert_date7'], $_POST['alert_time'], $_POST['alert']);
    }


    //get_nameの引数がある時の処理
    if (isset($_GET['get_name']) == true) {
        $class = new Cal();
        $data = $class->get_name($_POST['name']);
    }


    //delete_annivarsaryの引数がある時の処理
    if (isset($_POST['delete_annivarsary']) == true) {
        $class = new Cal();
        $data = $class->delete_annivarsary($_POST['annivarsary_id']);
    }


    //insert_annivarsaryの引数がある時の処理
    if (isset($_POST['insert_annivarsary']) == true) {
        $class = new Cal();
        $data = $class->insert_annivarsary($_POST['annivarsary_day'], $_POST['user_id'], $_POST['annivarsary_title'], $_POST['annivarsary_detail']);
    }

    //update_annivarsaryの引数がある時の処理
    if (isset($_POST['update_annivarsary']) == true) {
        $class = new Cal();
        $data = $class->update_annivarsary($_POST['annivarsary_day'], $_POST['annivarsary_id'], $_POST['$annivarsary_title'], $_POST['annivarsary_detail']);
    }

    //annivarsary_listの引数がある時の処理
    if (isset($_POST['get_list']) == true) {
        $class = new Cal();
        $data = $class->annivarsary_list($_POST['user_id']);
    }
} catch (Exception $ex) {
    $time=date('Y/m/d H:i:s');
    error_log($time.' '.$ex->getMessage() . "\n", 3, "error_log.txt");
} catch (Error $err) {
    $time=date('Y/m/d H:i:s');
    error_log($time.' '.$err->getMessage() . "\n", 3, "error_log.txt");
}

//arrayの中身をJSON形式に変換している
$json_array = json_encode($data);

print $json_array;
