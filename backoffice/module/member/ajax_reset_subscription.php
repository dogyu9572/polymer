<?
session_start();
header("Content-Type: application/json; charset=utf-8");
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/member.lib.php";

// 관리자 권한 확인
if (!in_array("member_manage", $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) &&
	$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"] != "ROOT") {
	echo json_encode(array("status" => "error", "message" => "권한이 없습니다."));
	exit;
}

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

// SQL 초기화
$sql = "UPDATE members SET subscription = 0";
$whereClause = "";

// 특정 회원 제외 처리
if (isset($_POST['excludeMemcodes']) && !empty($_POST['excludeMemcodes'])) {
	$excludeMemcodes = mysqli_real_escape_string($dblink, $_POST['excludeMemcodes']);
	$excludeArray = explode(',', $excludeMemcodes);
	$excludeConditions = array();

	foreach ($excludeArray as $code) {
		$excludeConditions[] = "memcode != '".trim($code)."'";
	}

	$whereClause = " WHERE " . implode(' AND ', $excludeConditions);
	$sql .= $whereClause;
}
// 특정 회원만 처리
else if (isset($_POST['memberIds']) && !empty($_POST['memberIds'])) {
	$memberIds = mysqli_real_escape_string($dblink, $_POST['memberIds']);
	$whereClause = " WHERE memberid IN ({$memberIds})";
	$sql .= $whereClause;
}
// 조건 없으면 오류
else {
	echo json_encode(array("status" => "error", "message" => "초기화할 회원 조건이 지정되지 않았습니다."));
	exit;
}

// 구독 초기화 쿼리 실행
$result = mysqli_query($dblink, $sql);

if ($result) {
	$affected = mysqli_affected_rows($dblink);
	echo json_encode(array(
		"status" => "success",
		"message" => "{$affected}명의 회원 구독 상태가 초기화되었습니다."
	));
} else {
	echo json_encode(array(
		"status" => "error",
		"message" => "구독 초기화 중 오류가 발생했습니다: " . mysqli_error($dblink)
	));
}

//DB해제
SetDisConn($dblink);
?>