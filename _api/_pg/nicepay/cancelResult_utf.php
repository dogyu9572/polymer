<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
header("Content-Type:text/html; charset=utf-8;"); 

$merchantKey = $_SITE["NICE"]["MERCHEN_KEY"];
$mid = $_SITE["NICE"]["MID"];
$moid = $_POST['oid'];
$cancelMsg = "고객요청에 의한 관리자의 취소요청";
$tid = $_POST['tid'];			
$cancelAmt = $_POST['amount']; 
$partialCancelCode = 0;
$RefundAcctNo = $_POST["refund_bnum"];
$RefundBankCd = $_POST["refund_bank"];
$RefundAcctNm = iconv("EUC-KR", "UTF-8", $_POST["refund_name"]);
/*  
****************************************************************************************
* Signature : 요청 데이터에 대한 무결성 검증을 위해 전달하는 파라미터로 허위 결제 요청 등 결제 및 보안 관련 이슈가 발생할 만한 요소를 방지하기 위해 연동 시 사용하시기 바라며 
* 위변조 검증 미사용으로 인해 발생하는 이슈는 당사의 책임이 없음 참고하시기 바랍니다.
****************************************************************************************
 */

$ediDate = date("YmdHis");
$signData = bin2hex(hash('sha256', $mid . $cancelAmt . $ediDate . $merchantKey, true));

try{
	$data = Array(
		'TID' => $tid,
		'MID' => $mid,
		'Moid' => $moid,
		'CancelAmt' => $cancelAmt,
		'CancelMsg' => iconv("UTF-8", "EUC-KR", $cancelMsg),
		'PartialCancelCode' => $partialCancelCode,
		'EdiDate' => $ediDate,
		'SignData' => $signData,
		'CharSet' => 'utf-8',
		'RefundAcctNo' => $RefundAcctNo,
		'RefundBankCd' => $RefundBankCd,
		'RefundAcctNm' => $RefundAcctNm
	);	
	$response = reqPost($data, "https://pg-api.nicepay.co.kr/webapi/cancel_process.jsp"); //취소 API 호출
	
	$arrResData = json_decode($response,true);

	// 여기서부터 자체제작 코드 적용
	$arrData = array();
	if($arrResData["ResultCode"] == "2001" || $arrResData["ResultCode"] == "2211"){ // 성공
		
		//DB연결
		$dblink = SetConn($_conf_db["main_db"]);
		
		$sql = " UPDATE tbl_board_accept set order_state = '3', is_refund = 'Y', refund_date = now() where order_no = '$moid' ";
		//echo $sql;
		$rs = mysqli_query($dblink, $sql);
		if($rs){
			$arrData["success"] = true;
			$arrData["msg"] = $arrResData["ResultMsg"];
		}else{
			$arrData["success"] = true;
			$arrData["msg"] = $arrResData["ResultMsg"]." DB에 환불 완료 처리 되지 않음";
		}

		//DB해제
		SetDisConn($dblink);
	}else{
		$arrData["success"] = false;
		$arrData["msg"] = $arrResData["ResultMsg"];
	}

	echo json_encode($arrData);
	
}catch(Exception $e){
	$e->getMessage();
	$ResultCode = "9999";
	$ResultMsg = "통신실패";
}

// API CALL foreach 예시
function jsonRespDump($resp){
	//global $mid, $merchantKey;
	$respArr = json_decode($resp);
	foreach ( $respArr as $key => $value ){
		/*if($key == "CancelAmt"){
			$cancelAmt = $value;
		}
		*if($key == "TID"){
			$tid = $value;
		}
		// 취소 응답으로 받은 Signature 검증을 통해 무결성 검증을 진행하여야 합니다.
		if($key == "Signature"){
			$cancelSignature = bin2hex(hash('sha256', $tid. $mid. $cancelAmt. $merchantKey, true));
			if($value != $cancelSignature){
				echo '비정상 거래!</br>';
				echo '취소 응답 Signature : '. $value. '</br>';
				echo '취소 생성 Signature : '. $cancelSignature. '</br>';
			}
		}*/
		echo "$key=". $value."<br />";
	}
}

//Post api call
function reqPost(Array $data, $url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);					//connection timeout 15 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));	//POST data
	curl_setopt($ch, CURLOPT_POST, true);
	$response = curl_exec($ch);
	curl_close($ch);	 
	return $response;
}
?>