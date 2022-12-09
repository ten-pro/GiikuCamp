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
            array_push($data, array('id' => $row['user_id'], 'name' => $row['user_name'], 'alert' => $row['alert'], 'alert_time' => $row['alert_time'], 'alert_date' => $row['alert_date']));
        }
        return $data;
    }


    function login_user($user_name, $user_pass)
    {

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
            $data = true;
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
        
        $ps->execute();

        return true;
    }


    function get_name($name)
    {

        $pdo = $this->get_pdo();
        $sql = 'SELECT COUNT(user_name) FROM user_tbl WHERE user_name = ?';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->execute();
        $search = $ps->fetchAll();
        if ($search > 0) {
            $data = 'この名前は既に使用されています';
        } else {
            $data = 'OK';
        }
        
        return $data;
    }


    function insert_annivarsary($annivarsary_day,$user_id,$annivarsary_title,$annivarsary_detail){
        
        $pdo = $this->get_pdo();
        $sql = 'INSERT INTO annivarsary_tbl (annivarsary_day,user_id,annivarsary_title,annivarsary_detail) VALUE (?,?,?,?)';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $annivarsary_day, PDO::PARAM_STR);
        $ps->bindValue(2, $user_id, PDO::PARAM_STR);
        $ps->bindValue(3, $annivarsary_title, PDO::PARAM_STR);
        $ps->bindValue(4, $annivarsary_detail, PDO::PARAM_STR);
        $ps->execute();

        return true;
    }

    function update_annivarsary($annivarsary_id,$annivarsary_day,$annivarsary_title,$annivarsary_detail){
        
        $pdo = $this->get_pdo();
        $sql = 'UPDATE annivarsary_tbl (annivarsary_id,annivarsary_day,annivarsary_title,annivarsary_detail) VALUE (?,?,?,?)';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $annivarsary_id, PDO::PARAM_STR);
        $ps->bindValue(2, $annivarsary_day, PDO::PARAM_STR);
        $ps->bindValue(3, $annivarsary_title, PDO::PARAM_STR);
        $ps->bindValue(4, $annivarsary_detail, PDO::PARAM_STR);
        $ps->execute();

        return true;
    }

    function delete_annivarsary($annivarsary_id){
        
        $pdo = $this->get_pdo();
        $sql = 'DELETE FROM annivarsary_tbl WHERE annivarsary_id = ?';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $annivarsary_id, PDO::PARAM_STR);
        $ps->execute();

        return true;
    }

}
