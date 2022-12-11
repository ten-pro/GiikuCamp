<?php
class Cal
{

    function get_pdo()
    {
        $pdo = new PDO('mysql:host=mysql207.phy.lolipop.lan;dbname=LAA1418138-calendar;charset=utf8', 'LAA1418138', 'apstdnb');
        return $pdo;
    }

    function get_user($user_id)
    {
        //配列の宣言（無いとエラーが発生した）
        $data = array();

        $pdo = $this->get_pdo();
        $sql = "SELECT * FROM user_tbl WHERE user_id = $user_id";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            array_push($data, array('id' => $row['user_id'], 'name' => $row['user_name'], 'alert_day1' => $row['alert_day1'], 'alert_day3' => $row['alert_day3'], 'alert_day5' => $row['alert_day5'], 'alert_day7' => $row['alert_day7'], 'alert_time' => $row['alert_time'], 'alert_date' => $row['alert_date']));
        }
        return $data;
    }


    function login_user($user_name, $user_pass)
    {
        //配列の宣言（無いとエラーが発生した）
        $data = array();

        $pdo = $this->get_pdo();
        $sql = "SELECT * FROM user_tbl WHERE user_name = ? AND user_pass = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_name, PDO::PARAM_STR);
        $ps->bindValue(2, $user_pass, PDO::PARAM_STR);
        $ps->execute();
        $search = $ps->fetchAll();
        if ($search == null) {
            $data = false;
        } else {
            foreach ($search as $row) {
                array_push($data, array('id' => $row['user_id'], 'chk' => true));
            }
            // $data = true;
        }
        return $data;
    }

    function insert_user($name, $pass)
    {

        $pdo = $this->get_pdo();
        $sql = 'INSERT INTO user_tbl (user_name,user_pass) VALUE (?,?)';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->bindValue(2, $pass, PDO::PARAM_STR);

        $chkname = $this->get_name($name);
        $data = 'unkown';
        if ($chkname == 'OK') {
            $ps->execute();
            $data = true;
        } else {
            $data = false;
        }
        return $chkname;
    }


    function get_name($name)
    {

        $pdo = $this->get_pdo();
        $sql = 'SELECT * FROM user_tbl WHERE user_name = ?';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->execute();
        $search = $ps->fetchAll();
        if ($search == null) {
            $data = 'OK';
        } else {
            $data = 'NG';
        }

        return $data;
    }


    function insert_annivarsary($annivarsary_day, $user_id, $annivarsary_title, $annivarsary_detail)
    {

        $pdo = $this->get_pdo();
        $sql = 'INSERT INTO annivarsary_tbl (annivarsary_day,user_id,annivarsary_title,annivarsary_detail) VALUE (?,?,?,?)';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $annivarsary_day, PDO::PARAM_STR);
        $ps->bindValue(2, $user_id, PDO::PARAM_INT);
        $ps->bindValue(3, $annivarsary_title, PDO::PARAM_STR);
        $ps->bindValue(4, $annivarsary_detail, PDO::PARAM_STR);
        $ps->execute();

        return true;
    }

    function update_annivarsary($annivarsary_id, $annivarsary_day, $annivarsary_title, $annivarsary_detail)
    {

        $pdo = $this->get_pdo();
        $sql = 'UPDATE annivarsary_tbl (annivarsary_id,annivarsary_day,annivarsary_title,annivarsary_detail) VALUE (?,?,?,?)';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $annivarsary_id, PDO::PARAM_STR);
        $ps->bindValue(2, $annivarsary_day, PDO::PARAM_INT);
        $ps->bindValue(3, $annivarsary_title, PDO::PARAM_STR);
        $ps->bindValue(4, $annivarsary_detail, PDO::PARAM_STR);
        $ps->execute();

        return true;
    }

    function delete_annivarsary($annivarsary_id)
    {

        $pdo = $this->get_pdo();
        $sql = 'DELETE FROM annivarsary_tbl WHERE annivarsary_id = ?';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $annivarsary_id, PDO::PARAM_INT);
        $ps->execute();

        return true;
    }


    function annivarsary_list($user_id)
    {
        //配列の宣言（無いとエラーが発生した）
        $data = array();

        $pdo = $this->get_pdo();
        $sql = "SELECT * FROM annivarsary_tbl WHERE user_id=?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_id, PDO::PARAM_INT);
        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            array_push($data, array('annivarsary_id' => $row['annivarsary_id'], 'annivarsary_day' => $row['annivarsary_day'], 'annivarsary_title' => $row['annivarsary_title'], 'annivarsary_detail' => $row['annivarsary_detail'],));
        }

        return $data;
    }


    function update_user($user_id, $user_name, $alert_day1, $alert_day3, $alert_day5, $alert_day7, $alert_time, $alert_date)
    {

        $pdo = $this->get_pdo();
        $sql = 'UPDATE user_tbl SET user_name=?,alert_day1=?,alert_day3=?,alert_day5=?,alert_day7=?,alert_time=?,alert_date=? WHERE user_id = ?';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_name, PDO::PARAM_STR);
        $ps->bindValue(2, $alert_day1, PDO::PARAM_INT);
        $ps->bindValue(3, $alert_day3, PDO::PARAM_INT);
        $ps->bindValue(4, $alert_day5, PDO::PARAM_INT);
        $ps->bindValue(5, $alert_day7, PDO::PARAM_INT);
        $ps->bindValue(6, $alert_time, PDO::PARAM_STR);
        $ps->bindValue(7, $alert_date, PDO::PARAM_STR);
        $ps->bindValue(8, $user_id, PDO::PARAM_INT);
        $ps->execute();

        $data = array();
        array_push($data, array('id' => $user_id, 'name' => $user_name, 'alert_day1' => $alert_day1, 'alert_day3' => $alert_day3, 'alert_day5' => $alert_day5, 'alert_day7' => $alert_day7, 'alert_time' => $alert_time, 'alert_date' => $alert_date));

        return $data;
    }

    function user_list(){
        //配列の宣言（無いとエラーが発生した）
        $data = array();

        $pdo = $this->get_pdo();
        $sql = "SELECT * FROM user_tbl";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            array_push($data, array('id' => $row['user_id'], 'name' => $row['user_name'], 'alert' => $row['alert'], 'alert_time' => $row['alert_time'], 'alert_date' => $row['alert_date']));    
        }

        return $data;
    }
}
