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
}
