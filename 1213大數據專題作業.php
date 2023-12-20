<?php

/*
// 前置作業 確認連線:
require_once 'function/DBConnectionHandler.php';

$serverName = "140.127.74.201:9001";
$userName = "root";
$password = "root";
$db = 'bigdata';

try {
    DBConnectionHandler::setConnection(
        $serverName,
        $userName,
        $password,
        $db
    );
    $connection = DBConnectionHandler::getConnection();
    echo "success";
}catch(Exception $e) {
    echo " ERROR ". $sql . "<br>" . $e->getMessage();
}
*/

// 實作:
/*
// (1.上課時,伺服器開著才能用)
require_once 'function/DBConnectionHandler.php';

$serverName = "140.127.74.201:9001";
$userName = "root";
$password = "root";
$db = 'bigdata';

DBConnectionHandler::setConnection(
    $serverName,
    $userName,
    $password,
    $db
);
$connection = DBConnectionHandler::getConnection();
*/
// (2.下課回來自己用,伺服器沒開,所以只能用前面的方法,上傳sql檔到phpmyadmin,其中因檔案太大要從php.ini調整上傳時間.檔案大小的上限)
require_once("C:/xampp/htdocs/Connection/connection.php");

// 1.1
$sql = "SELECT COUNT(DISTINCT dp001_review_sn) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',39);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);    // 把結果結構化
print_r($r);
echo '</br>';

// 1.2
$sql = "SELECT COUNT(DISTINCT dp001_question_sn) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID AND dp001_question_sn != :VAL;";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',39);
$stmt->bindValue(':VAL','NA');
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);
echo '</br>';

// 2.1
$sql = "SELECT DISTINCT dp001_video_item_sn, dp001_indicator FROM edu_bigdata_imp1 WHERE PseudoID=:ID GROUP BY dp001_video_item_sn;";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',281);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);
echo '</br>';

// 2.2
$sql = "SELECT COUNT(dp001_prac_score_rate) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID AND dp001_prac_score_rate=100;";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',281);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);
echo '</br>';

// 3.1
$sql = "SELECT COUNT( dp001_record_plus_view_action) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID AND dp001_record_plus_view_action='paused';";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',71);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);
echo '</br>';

// 3.2
$sql = "SELECT DISTINCT LEFT(dp001_review_start_time,10), LEFT(dp001_review_end_time,10) FROM edu_bigdata_imp1 WHERE PseudoID=:ID GROUP BY dp001_review_start_time, dp001_review_end_time;";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',71);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);
echo '</br>';

// 4.1
$sql = "SELECT dp001_review_sn, COUNT(dp001_review_sn) AS FREQ FROM edu_bigdata_imp1 GROUP BY dp001_review_sn LIMIT 1;";
$stmt = $connection->prepare($sql);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);
echo '</br>';

// 4.2
$sql = "SELECT COUNT(dp002_extensions_alignment) AS result FROM edu_bigdata_imp1 WHERE dp002_extensions_alignment='[\"十二年國民基本教育類\"]';";
$stmt = $connection->prepare($sql);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);
echo '</br>';

// 4.3
$sql = "SELECT dp002_verb_display_zh_TW AS result FROM edu_bigdata_imp1 WHERE dp002_verb_display_zh_TW != :VAL GROUP BY dp002_verb_display_zh_TW ORDER BY COUNT(dp002_verb_display_zh_TW) DESC LIMIT 3;";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':VAL','NA');
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);
echo '</br>';

// 4.4
$sql = "SELECT COUNT(dp002_extensions_alignment) AS result FROM edu_bigdata_imp1 WHERE dp002_extensions_alignment='[\"校園職業安全\"]';";
$stmt = $connection->prepare($sql);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);
echo '</br>';

?>
