<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if(!$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]) {
    echo "error_auth";
    exit;
}

$idx = isset($_POST['idx']) ? $_POST['idx'] : '';
$boardid = isset($_POST['boardid']) ? $_POST['boardid'] : '';

if(empty($idx) || empty($boardid)) {
    echo "error_param";
    exit;
}

// 비밀번호 초기화 - poly123! (암호화 필요)
$password = "poly123!";
$encrypted_password = password_hash($password, PASSWORD_DEFAULT);

// DB 업데이트
$query = "UPDATE board_".$boardid." SET password='".$encrypted_password."' WHERE idx='".$idx."'";
$result = $db->query($query);

if($result) {
    echo "success";
} else {
    echo "error_db";
}

//DB해제
SetDisConn($dblink);
?>