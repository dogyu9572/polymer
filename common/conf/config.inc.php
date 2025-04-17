<?php
header("Content-Type: text/html; charset=UTF-8");
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/dbconfig.inc.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrSetInfo = getShopsetInfo($GLOBALS["_conf_tbl"]["shop_set"]);

//DB해제
SetDisConn($dblink);

/*********************************************************************/
// 사이트 기본정보
/*********************************************************************/
$_SITE["NAME"]		= $arrSetInfo["list"][0]['shop_name'];
$_SITE["DOMAIN"]	= $arrSetInfo["list"][0]['shop_url'];
$_SITE["EMAIL"]		= $arrSetInfo["list"][0]['admin_email'];

$_SITE["TXT1"]		= $arrSetInfo["list"][0]['shop_title'];
$_SITE["TXT2"]		= $arrSetInfo["list"][0]['shop_keyword'];
$_SITE["OGIMAGE"]	= "/pub/images/og_image.png";

$_SITE["SHOPSEARCH"]		= $arrSetInfo["list"][0]['shop_search'];

$_SITE["SHOP_CONTENT"]		= $arrSetInfo["list"][0]['shop_content'];				## 구매 정보
$_SITE["SHOP_DEF_PRICE"]	= $arrSetInfo["list"][0]['shop_delivery_price'];		## 주문금액 얼마 미만 배송비 설정
$_SITE["SHOP_SHIPPING"]		= $arrSetInfo["list"][0]['shop_delivery_default'];		## 주문 배송비
$_SITE["SHOP_SALE_YN"]		= $arrSetInfo["list"][0]['shop_sale_yn'];				## 기본할인 사용여부
$_SITE["SHOP_SALE_DEF"]		= $arrSetInfo["list"][0]['shop_sale_default'];			## 기본할인 퍼센트
$_SITE["SHOP_POINT_YN"]		= $arrSetInfo["list"][0]['shop_point_yn'];				## 기본적립 사용여부

$_SITE["ORDER"]['서울']		= $arrSetInfo["list"][0]['shop_point_default'];			## 최소주문비용 
$_SITE["ORDER"]['경기']		= $arrSetInfo["list"][0]['shop_point_min'];				## 최소주문비용
$_SITE["ORDER"]['그외']		= $arrSetInfo["list"][0]['shop_point_max'];				## 최소주문비용

$_SITE["SHOP_SHIPOUT_YN"]	= $arrSetInfo["list"][0]['shop_shipout_yn'];				## 도서산간 사용여부
$_SITE["SHOP_SHIPOUT_DEF"]	= $arrSetInfo["list"][0]['shop_shipout_default'];			## 도서산간 배송비

$_SITE["SHOP_JOIN_YN"]	 	= $arrSetInfo["list"][0]['shop_point_member_yn'];		## 회원가입시 적립금 지금 사용여부
$_SITE["SHOP_JOIN_POINT"]	= $arrSetInfo["list"][0]['shop_point_member'];			## 회원가입시 적립금액

$_SITE["MEMBER_LEVEL"]["0"]	= "신청";			## 회원등급
$_SITE["MEMBER_LEVEL"]["1"]	= "승인대기";		## 회원등급
$_SITE["MEMBER_LEVEL"]["2"]	= "승인거절";		## 회원등급
$_SITE["MEMBER_LEVEL"]["3"]	= "승인";			## 회원등급


$_SITE["MEMBER_CATE"]["m1"]	= "전문가회원";			## 회원구분
$_SITE["MEMBER_CATE"]["m2"]	= "기업회원";			## 회원구분
$_SITE["MEMBER_CATE"]["m3"]	= "일반회원";			## 회원구분


$_SITE["MEMBER_TYPE"]["homepage"]	= "일반";			## 회원구분
$_SITE["MEMBER_TYPE"]["kakao"]	= "카카오";			## 회원구분
$_SITE["MEMBER_TYPE"]["naver"]	= "네이버";			## 회원구분

$sidoCode['서울'] = "1";
$sidoCode['인천'] = "2";
$sidoCode['대전'] = "3";
$sidoCode['대구'] = "4";
$sidoCode['광주'] = "5";
$sidoCode['부산'] = "6";
$sidoCode['울산'] = "7";
$sidoCode['세종특별자치시'] = "8";
$sidoCode['경기도'] = "31";
$sidoCode['강원특별자치도'] = "32";
$sidoCode['충청북도'] = "33";
$sidoCode['충청남도'] = "34";
$sidoCode['경상북도'] = "35";
$sidoCode['경상남도'] = "36";
$sidoCode['전북특별자치도'] = "37";
$sidoCode['전라남도'] = "38";
$sidoCode['제주도'] = "39";
$sidoText['1'] = "서울";
$sidoText['2'] = "인천";
$sidoText['3'] = "대전";
$sidoText['4'] = "대구";
$sidoText['5'] = "광주";
$sidoText['6'] = "부산";
$sidoText['7'] = "울산";
$sidoText['8'] = "세종특별자치시";
$sidoText['9'] = "경기";
$sidoText['10'] = "강원";
$sidoText['11'] = "충북";
$sidoText['12'] = "충남";
$sidoText['13'] = "경북";
$sidoText['14'] = "경남";
$sidoText['15'] = "전북";
$sidoText['16'] = "전남";
$sidoText['17'] = "제주도";

$sidoNumCode['1'] = "1";
$sidoNumCode['2'] = "10";
$sidoNumCode['3'] = "9";
$sidoNumCode['4'] = "14";
$sidoNumCode['5'] = "13";
$sidoNumCode['6'] = "5";
$sidoNumCode['7'] = "4";
$sidoNumCode['8'] = "3";
$sidoNumCode['9'] = "6";
$sidoNumCode['10'] = "8";
$sidoNumCode['11'] = "7";
$sidoNumCode['12'] = "2";
$sidoNumCode['13'] = "16";
$sidoNumCode['14'] = "15";
$sidoNumCode['15'] = "17";
$sidoNumCode['16'] = "12";
$sidoNumCode['17'] = "11";

/*********************************************************************/
// 업로드 파일 위치
/*********************************************************************/
$_SITE["UPLOADED_DATA"] = $_SERVER['DOCUMENT_ROOT'] . "/uploaded";
/*********************************************************************/
// 게시판 설정 정보
/*********************************************************************/
$_SITE["BOARD_PREWORD"] = "tbl_board_";
$_SITE["BOARD_DATA"] = $_SITE["UPLOADED_DATA"] . "/board";
$_SITE["BOARD_PATH"] = $_SERVER['DOCUMENT_ROOT'] . "/module/board";
$_SITE["BOARD_SKIN"] = $_SITE["BOARD_PATH"] . "/skin/";
$_SITE["BOARD_SKIN_URL"] = "/module/board/skin";
/*********************************************************************/
// 게시판 설정 정보 - 모바일
/*********************************************************************/
$_SITE["BOARD_PATH_M"] = $_SERVER['DOCUMENT_ROOT'] . "/m/module/board";
$_SITE["BOARD_SKIN_M"] = $_SITE["BOARD_PATH_M"] . "/skin/";
/*********************************************************************/
// 가입금지 아이디
/*********************************************************************/
$_SITE["MEMBER"]["DONT_USE_ID"][] = "admin";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "master";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "webmaster";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "administrator";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "guest";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "help";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "sex";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "fuck";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "barbie";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "barbiestyle";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "barbiecurl";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "barbiecurlstyle";
/*********************************************************************/
// 연락처
/*********************************************************************/
$_SITE["DATA"]["PHOME_FIRST"]["1"]	= "070";
$_SITE["DATA"]["PHOME_FIRST"]["2"]	= "02";
$_SITE["DATA"]["PHOME_FIRST"]["3"]	= "031";
$_SITE["DATA"]["PHOME_FIRST"]["4"]	= "032";
$_SITE["DATA"]["PHOME_FIRST"]["5"]	= "033";
$_SITE["DATA"]["PHOME_FIRST"]["6"]	= "041";
$_SITE["DATA"]["PHOME_FIRST"]["7"]	= "042";
$_SITE["DATA"]["PHOME_FIRST"]["8"]	= "043";
$_SITE["DATA"]["PHOME_FIRST"]["9"]	= "044";
$_SITE["DATA"]["PHOME_FIRST"]["10"]	= "051";
$_SITE["DATA"]["PHOME_FIRST"]["11"]	= "052";
$_SITE["DATA"]["PHOME_FIRST"]["12"]	= "053";
$_SITE["DATA"]["PHOME_FIRST"]["13"]	= "054";
$_SITE["DATA"]["PHOME_FIRST"]["14"]	= "055";
$_SITE["DATA"]["PHOME_FIRST"]["15"]	= "061";
$_SITE["DATA"]["PHOME_FIRST"]["16"]	= "062";
$_SITE["DATA"]["PHOME_FIRST"]["17"]	= "063";
$_SITE["DATA"]["PHOME_FIRST"]["18"]	= "064";
$_SITE["DATA"]["PHOME_FIRST"]["19"]	= "010";
$_SITE["DATA"]["PHOME_FIRST"]["20"]	= "011";
$_SITE["DATA"]["PHOME_FIRST"]["21"]	= "016";
$_SITE["DATA"]["PHOME_FIRST"]["22"]	= "017";
$_SITE["DATA"]["PHOME_FIRST"]["22"]	= "018";
$_SITE["DATA"]["PHOME_FIRST"]["23"]	= "019";
/*********************************************************************/
// 제품 관련(product 모듈) 변수 설정
/*********************************************************************/
//카테고리 뎊스 : 최대 5까지
$_SITE["PRODUCT"]["CATEGORY_DEPTH"] = 3;

//사진이미지 추가가능 갯수
$_SITE["PRODUCT"]["IMAGE_COUNT"] = 2;
/*********************************************************************/
// 쇼핑몰 관련 변수 설정
/*********************************************************************/
//쇼핑몰 사용여부
$_SITE["SHOP"]["USE_SHOP"] = "Y";

//장바구니 이미지 크기
$_SITE["SHOP"]["IMAGE_S_WIDTH"] = "80";
//목록 이미지 크기
$_SITE["SHOP"]["IMAGE_M_WIDTH"] = "270";
//상세보기 이미지 크기
$_SITE["SHOP"]["IMAGE_L_WIDTH"] = "430";
//목록에서 이미지 가로갯수
$_SITE["SHOP"]["IMAGE_DIVISION"] = "4";

//PG사 설정
$_SITE["SHOP"]["PG"]["SERVICE"] = "test";//테스트 일 경우에만 test 
$_SITE["SHOP"]["PG"]["COMPANY"] = "dacom";//올더게이트
$_SITE["SHOP"]["PG"]["MALLID"] = $arrSetInfo["list"][0]['shop_pg_id'];//올더게이트 테스트 아이디(aegis)

//===========================================================
//휴대폰결제 관련 정보// 올더게이트 사용시 휴대폰아디 추가 발급
// 20100729
//===========================================================
$_SITE["SHOP"]["PG"]["HP_SUBID"] = "";// SUB_CP아이디
//## 업체에 따라 하단 값을 넣지 않다도 작동세팅이 된 업체도 있슴

$_SITE["SHOP"]["PG"]["HP_UNITType"] = "";//상품구분 1:디지털 2:일반
$_SITE["SHOP"]["PG"]["ProdCode"] = "";//상품코드
$_SITE["SHOP"]["PG"]["HP_ID"] = "";//CP 아이디
$_SITE["SHOP"]["PG"]["HP_PWD"] = "";//비밀번호// 엑셀파일에는 없음
//===========================================================


//계좌번호 설정
$arrBank = explode("\n", $arrSetInfo["list"][0]['shop_bankinfo']);
for($i=0; $i<count($arrBank); $i++) {
	$_SITE["SHOP"]["BANK"][]	= $arrBank[$i];
}

//회원가입시 포인트
$_SITE["SHOP"]["POINT"]["JOIN"]	= 2000;

//포인트 사용시 포인트가 이 금액 이상 있어야지만 사용가능
if($arrSetInfo["list"][0]['shop_point_min_yn']=="N"){	## 제한 없음
	$_SITE["SHOP"]["POINT"]["LOW_ACCOUNT"]	= 0;
}else{
	$_SITE["SHOP"]["POINT"]["LOW_ACCOUNT"]	= $arrSetInfo["list"][0]['shop_point_min'];
}

//포인트 사용시 총액이 이 금액 이상이어야지만 사용가능
if($arrSetInfo["list"][0]['shop_point_max_yn']=="N"){	## 제한 없음
	$_SITE["SHOP"]["POINT"]["LOW_PRICE"]	= 0;
}else{
	$_SITE["SHOP"]["POINT"]["LOW_PRICE"]	= $arrSetInfo["list"][0]['shop_point_max'];
}

//총액이 이 금액 이상이면 배송료 무료
$_SITE["SHOP"]["SHIP"]["FREE_PRICE"]	= $arrSetInfo["list"][0]['shop_delivery_price'];

//기본 배송료
$_SITE["SHOP"]["SHIP"]["SHIP_PRICE"]	= $arrSetInfo["list"][0]['shop_delivery_default'];


//심사상태
$_SITE["SHOP"]["STATE"]["1"]	= "심사중";
$_SITE["SHOP"]["STATE"]["2"]	= "심사지연중(2순위지연)";
$_SITE["SHOP"]["STATE"]["3"]	= "심사지연중(진짜)";
$_SITE["SHOP"]["STATE"]["4"]	= "최종미선정";
$_SITE["SHOP"]["STATE"]["5"]	= "최종선정";
//주문상태
$_SITE["SHOP"]["ORDER_STATE"]["1"]	= "입금대기";
$_SITE["SHOP"]["ORDER_STATE"]["3"]	= "등록취소";
$_SITE["SHOP"]["ORDER_STATE"]["6"]	= "등록완료";		
/***************
$_SITE["SHOP"]["ORDER_STATE"]["11"]	= "주문확인";
$_SITE["SHOP"]["ORDER_STATE"]["7"]	= "배송준비중";
$_SITE["SHOP"]["ORDER_STATE"]["8"]	= "배송중";
$_SITE["SHOP"]["ORDER_STATE"]["9"]	= "배송완료";
//	$_SITE["SHOP"]["ORDER_STATE"]["19"]	= "구매확정";

$_SITE["SHOP"]["ORDER_STATE"]["3"]	= "주문취소";
//$_SITE["SHOP"]["ORDER_STATE"]["2"]	= "교환완료";
$_SITE["SHOP"]["ORDER_STATE"]["4"]	= "환불완료";
$_SITE["SHOP"]["ORDER_STATE"]["5"]	= "부분환불/교환";
*****************/
$_SITE["SHOP"]["ORDER_STATE"]["10"]	= " - ";	## 미결제(개발용)


$_SITE["SHOP"]["REASON"]["C001"] = "단순변심";
$_SITE["SHOP"]["REASON"]["C002"] = "상태불량";
$_SITE["SHOP"]["REASON"]["C003"] = "하자 미고지";
$_SITE["SHOP"]["REASON"]["C004"] = "기타";

//결제방법
$arrPay = explode(",", $arrSetInfo["list"][0]['shop_payment']);
for($i=0; $i<count($arrPay); $i++) {
	$arrPayType = explode("|", $arrPay[$i]);

	$_SITE["SHOP"]["PAY_TYPE"][$arrPayType[0]] = $arrPayType[1];
}
//$_SITE["SHOP"]["PAY_TYPE_MOBILE"]["cardnormal"]	= "신용카드(일반)";
//$_SITE["SHOP"]["PAY_TYPE_MOBILE"]["virtualnormal"]	= "가상계좌(일반)";
//$_SITE["SHOP"]["PAY_TYPE_MOBILE"]["cardescrow"]	= "신용카드(에스크로)";
//$_SITE["SHOP"]["PAY_TYPE_MOBILE"]["virtualescrow"]	= "가상계좌(에스크로)";
//$_SITE["SHOP"]["PAY_TYPE_MOBILE"]["hp"]	= "휴대폰";


//성별
$_SITE["SHOP"]["SEX"]["M"]	= "남";
$_SITE["SHOP"]["SEX"]["F"]	= "여";
$_SITE["SHOP"]["SEX"]["N"]	= "모름";

//요일
$_SITE["SHOP"]["WEEK"]["0"]	= "일";
$_SITE["SHOP"]["WEEK"]["1"]	= "월";
$_SITE["SHOP"]["WEEK"]["2"]	= "화";
$_SITE["SHOP"]["WEEK"]["3"]	= "수";
$_SITE["SHOP"]["WEEK"]["4"]	= "목";
$_SITE["SHOP"]["WEEK"]["5"]	= "금";
$_SITE["SHOP"]["WEEK"]["6"]	= "토";
$_SITE["SHOP"]["WEEK"]["7"]	= "일";

// 은행코드 (나이스페이먼츠)
$_SITE["SHOP"]["BANK"] = array(
"001" => "한국은행",
"002" => "산업은행",
"003" => "기업은행",
"004" => "국민은행",
"005" => "외환은행",
"007" => "수협은행",
"008" => "수출입은행",
"011" => "농협은행",
"012" => "농협회원조합",
"020" => "우리은행",
"023" => "SC제일은행",
"026" => "서울은행",
"027" => "한국씨티은행",
"031" => "대구은행",
"032" => "부산은행",
"034" => "광주은행",
"035" => "제주은행",
"037" => "전북은행",
"039" => "경남은행",
"045" => "새마을금고연합회",
"048" => "신협중앙회",
"050" => "상호저축은행",
"051" => "기타 외국계은행",
"052" => "모건스탠리은행",
"054" => "HSBC은행",
"055" => "도이치은행",
"056" => "알비에스피엘씨은행",
"057" => "제이피모간체이스은행",
"058" => "미즈호코퍼레이트은행",
"059" => "미쓰비시도쿄UFJ은행",
"060" => "BOA",
"061" => "비엔피파리바은행",
"062" => "중국공상은행",
"063" => "중국은행",
"064" => "산림조합",
"065" => "대화은행",
"071" => "우체국",
"076" => "신용보증기금",
"077" => "기술신용보증기금",
"081" => "하나은행",
"088" => "신한은행",
"089" => "케이뱅크",
"090" => "카카오뱅크",
"092" => "토스뱅크",
"093" => "한국주택금융공사",
"094" => "서울보증보험",
"095" => "경찰청",
"099" => "금융결제원",
"209" => "동양종합금융증권",
"218" => "현대증권",
"230" => "미래에셋증권",
"238" => "대우증권",
"240" => "삼성증권",
"243" => "한국투자증권",
"247" => "NH투자증권",
"261" => "교보증권",
"262" => "하이투자증권",
"263" => "에이치엠씨투자증권",
"264" => "키움증권",
"265" => "이트레이드증권",
"266" => "SK증권",
"267" => "대신증권",
"268" => "솔로몬투자증권",
"269" => "한화증권",
"270" => "하나대투증권",
"278" => "신한금융투자",
"279" => "동부증권",
"280" => "유진투자증권",
"287" => "메리츠증권",
"289" => "엔에이치투자증권",
"290" => "부국증권",
"291" => "신영증권",
"292" => "엘아이지투자증권"
);

//나이스 상점 키
//$_SITE["NICE"]["MERCHEN_KEY"] = "EYzu8jGGMfqaDEp76gSckuvnaHHu+bC4opsSN6lHv3b2lurNYkVXrZ7Z1AoqQnXI3eLuaUFyoRNC6FkrzVjceg==";
//$_SITE["NICE"]["MID"] = "nicepay00m";

$_SITE["NICE"]["MERCHEN_KEY"] = "RNAmdvtZ9TyduIesg4IXh3NAZkcCSdpAuUTpL11+UOlv0F0c+IIprr+T4ajBsW+bxIFPnwdPMC+MkWtfvB+aeA==";
$_SITE["NICE"]["MID"] = "kcakca777m";

// 카카오 api 및 문자 사용여부 체크

$_SITE["SMS_USE"] = true;
$_SITE["ARLIMTALK_USE"] = true;

/*********************************************************************/
// 페이징 관련 변수 설정
/*********************************************************************/
//페이징 관련 변수(기본설정이며 각 페이지에서 재 설정 가능)
$scale = 10;
$pagescale = 10;

/*********************************************************************/
// 고분자학회 추가 변수 설정
/*********************************************************************/
//관리자 권한
$arrAdminGrade = array(
	"ADMIN" => "총괄 관리자",
	"ROOT" => "일반 관리자"
);

//관리자 등급
$arrMemberGrade = array(
	"1" => "정상회원",
	"0" => "권한정지",
	"-1" => "삭제회원",
	"-2" => "보류회원",
);

//결제방법
$arrPayType = array(
	"A_PAY_METHOD_CASH" => "현금",
	"A_PAY_METHOD_BANKONLINE" => "온라인입금",
	"A_PAY_METHOD_GIRO" => "지로",
	"A_PAY_METHOD_DIRECTCARD" => "신용카드직접결제",
	"A_PAY_METHOD_ADMINDIRECT" => "직접입력"
);

$arrCardType = array(
	"BC카드" => "BC카드",
	"LG카드" => "LG카드",
	"삼성카드" => "삼성카드",
	"현대카드" => "현대카드",
	"국민카드" => "국민카드",
	"외환카드" => "외환카드",
	"신한카드" => "신한카드",
	"씨티카드" => "씨티카드",
	"조흥카드" => "조흥카드",
	"롯데카드" => "롯데카드",
	"우리카드" => "우리카드",
	"광주은행" => "광주은행",
	"VISA" => "VISA",
	"MASTER" => "MASTER",
	"AMEX" => "AMEX",
	"JCB" => "JCB",
	"기타카드" => "기타카드"
);

// 임원 검색 필드 옵션
$arrSortFeld = array(
	"o_group" => "구분",
	"o_role" => "직책",
	"o_name" => "이름",
	"o_affiliation" => "소속",
	"o_dutyfrom" => "임기"
);

$arrTransactionSortFeld = array(
	"t_orderno" => "주문번호",
	"t_name" => "성명",
	"t_affiliation" => "소속",
	"t_method" => "납부방법",
	"t_amount" => "결제금액"
);

// 회원관리 정렬 필드 옵션
$arrMemberSortField = array(
	"memberid" => "일련번호",
	"namek" => "이름",
	"affiliation" => "소속",
	"memcode" => "회원구분",
	"maxdue" => "최종연회비",
	"maxfee" => "최종구독회비",
	"hzonecode" => "우편번호",
	"socnum" => "주민번호"
);

//학위
$arrDegree = array(
	"학사" => "학사",
	"석사수료" => "석사수료",
	"석사" => "석사",
	"박사수료" => "박사수료",
	"박사" => "박사"
);


//국가 코드
$arrCountry = array(
	"Korea" => "Korea, Republic of",
	"Afghanistan" => "Afghanistan",
	"Albania" => "Albania",
	"Algeria" => "Algeria",
	"American Samoa" => "American Samoa",
	"Andorra" => "Andorra",
	"Angola" => "Angola",
	"Anguilla" => "Anguilla",
	"Antarctica" => "Antarctica",
	"Antigua and Barbuda" => "Antigua and Barbuda",
	"Argentina" => "Argentina",
	"Armenia" => "Armenia",
	"Aruba" => "Aruba",
	"Australia" => "Australia",
	"Austria" => "Austria",
	"Azerbaijan" => "Azerbaijan",
	"Bahamas" => "Bahamas",
	"Bahrain" => "Bahrain",
	"Bangladesh" => "Bangladesh",
	"Barbados" => "Barbados",
	"Belarus" => "Belarus",
	"Belgium" => "Belgium",
	"Belize" => "Belize",
	"Benin" => "Benin",
	"Bermuda" => "Bermuda",
	"Bhutan" => "Bhutan",
	"Bolivia" => "Bolivia",
	"Bosnia and Herzegowina" => "Bosnia and Herzegowina",
	"Botswana" => "Botswana",
	"Bouvet Island" => "Bouvet Island",
	"Brazil" => "Brazil",
	"British Indian Ocean Territory" => "British Indian Ocean Territory",
	"Brunei Darussalam" => "Brunei Darussalam",
	"Bulgaria" => "Bulgaria",
	"Burkina Faso" => "Burkina Faso",
	"Burundi" => "Burundi",
	"Cambodia" => "Cambodia",
	"Cameroon" => "Cameroon",
	"Canada" => "Canada",
	"Cape Verde" => "Cape Verde",
	"Cayman Islands" => "Cayman Islands",
	"Central African Republic" => "Central African Republic",
	"Chad" => "Chad",
	"Chile" => "Chile",
	"China" => "China",
	"Christmas Island" => "Christmas Island",
	"Cocos (Keeling) Islands" => "Cocos (Keeling) Islands",
	"Colombia" => "Colombia",
	"Comoros" => "Comoros",
	"Congo" => "Congo",
	"Cook Islands" => "Cook Islands",
	"Costa Rica" => "Costa Rica",
	"Cote D'Ivoire" => "Cote D'Ivoire",
	"Croatia" => "Croatia (local name: Hrvatska)",
	"Cuba" => "Cuba",
	"Cyprus" => "Cyprus",
	"Czech Republic" => "Czech Republic",
	"Denmark" => "Denmark",
	"Djibouti" => "Djibouti",
	"Dominica" => "Dominica",
	"Dominican Republic" => "Dominican Republic",
	"East Timor" => "East Timor",
	"Ecuador" => "Ecuador",
	"Egypt" => "Egypt",
	"El Salvador" => "El Salvador",
	"Equatorial Guinea" => "Equatorial Guinea",
	"Eritrea" => "Eritrea",
	"Estonia" => "Estonia",
	"Ethiopia" => "Ethiopia",
	"Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)",
	"Faroe Islands" => "Faroe Islands",
	"Fiji" => "Fiji",
	"Finland" => "Finland",
	"France" => "France",
	"France, Metropolitan" => "France, Metropolitan",
	"French Guiana" => "French Guiana",
	"French Polynesia" => "French Polynesia",
	"French Southern Territories" => "French Southern Territories",
	"Gabon" => "Gabon",
	"Gambia" => "Gambia",
	"Georgia" => "Georgia",
	"Germany" => "Germany",
	"Ghana" => "Ghana",
	"Gibraltar" => "Gibraltar",
	"Greece" => "Greece",
	"Greenland" => "Greenland",
	"Grenada" => "Grenada",
	"Guadeloupe" => "Guadeloupe",
	"Guam" => "Guam",
	"Guatemala" => "Guatemala",
	"Guinea" => "Guinea",
	"Guinea-Bissau" => "Guinea-Bissau",
	"Guyana" => "Guyana",
	"Haiti" => "Haiti",
	"Heard and Mc Donald Islands" => "Heard and Mc Donald Islands",
	"Honduras" => "Honduras",
	"Hong Kong" => "Hong Kong",
	"Hungary" => "Hungary",
	"Iceland" => "Iceland",
	"India" => "India",
	"Indonesia" => "Indonesia",
	"Iran (Islamic Republic of)" => "Iran (Islamic Republic of)",
	"Iraq" => "Iraq",
	"Ireland" => "Ireland",
	"Israel" => "Israel",
	"Italy" => "Italy",
	"Jamaica" => "Jamaica",
	"Japan" => "Japan",
	"Jordan" => "Jordan",
	"Kazakhstan" => "Kazakhstan",
	"Kenya" => "Kenya",
	"Kiribati" => "Kiribati",
	"Kuwait" => "Kuwait",
	"Kyrgyzstan" => "Kyrgyzstan",
	"Lao People's Democratic Republic" => "Lao People's Democratic Republic",
	"Latvia" => "Latvia",
	"Lebanon" => "Lebanon",
	"Lesotho" => "Lesotho",
	"Liberia" => "Liberia",
	"Libyan Arab Jamahiriya" => "Libyan Arab Jamahiriya",
	"Liechtenstein" => "Liechtenstein",
	"Lithuania" => "Lithuania",
	"Luxembourg" => "Luxembourg",
	"Macau" => "Macau",
	"Macedonia, the former Yugoslav Republic of" => "Macedonia, the former Yugoslav Republic of",
	"Madagascar" => "Madagascar",
	"Malawi" => "Malawi",
	"Malaysia" => "Malaysia",
	"Maldives" => "Maldives",
	"Mali" => "Mali",
	"Malta" => "Malta",
	"Marshall Islands" => "Marshall Islands",
	"Martinique" => "Martinique",
	"Mauritania" => "Mauritania",
	"Mauritius" => "Mauritius",
	"Mayotte" => "Mayotte",
	"Mexico" => "Mexico",
	"Micronesia, Federated States of" => "Micronesia, Federated States of",
	"Moldova, Republic of" => "Moldova, Republic of",
	"Monaco" => "Monaco",
	"Mongolia" => "Mongolia",
	"Montserrat" => "Montserrat",
	"Morocco" => "Morocco",
	"Mozambique" => "Mozambique",
	"Myanmar" => "Myanmar",
	"Namibia" => "Namibia",
	"Nauru" => "Nauru",
	"Nepal" => "Nepal",
	"Netherlands" => "Netherlands",
	"Netherlands Antilles" => "Netherlands Antilles",
	"New Caledonia" => "New Caledonia",
	"New Zealand" => "New Zealand",
	"Nicaragua" => "Nicaragua",
	"Niger" => "Niger",
	"Nigeria" => "Nigeria",
	"Niue" => "Niue",
	"Norfolk Island" => "Norfolk Island",
	"Northern Mariana Islands" => "Northern Mariana Islands",
	"Norway" => "Norway",
	"Oman" => "Oman",
	"Pakistan" => "Pakistan",
	"Palau" => "Palau",
	"Panama" => "Panama",
	"Papua New Guinea" => "Papua New Guinea",
	"Paraguay" => "Paraguay",
	"Peru" => "Peru",
	"Philippines" => "Philippines",
	"Pitcairn" => "Pitcairn",
	"Poland" => "Poland",
	"Portugal" => "Portugal",
	"Puerto Rico" => "Puerto Rico",
	"Qatar" => "Qatar",
	"Reunion" => "Reunion",
	"Romania" => "Romania",
	"Russian Federation" => "Russian Federation",
	"Rwanda" => "Rwanda",
	"Saint Kitts and Nevis" => "Saint Kitts and Nevis",
	"Saint Lucia" => "Saint Lucia",
	"Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines",
	"Samoa" => "Samoa",
	"San Marino" => "San Marino",
	"Sao Tome and Principe" => "Sao Tome and Principe",
	"Saudi Arabia" => "Saudi Arabia",
	"Senegal" => "Senegal",
	"Seychelles" => "Seychelles",
	"Sierra Leone" => "Sierra Leone",
	"Singapore" => "Singapore",
	"Slovakia (Slovak Republic)" => "Slovakia (Slovak Republic)",
	"Slovenia" => "Slovenia",
	"Solomon Islands" => "Solomon Islands",
	"Somalia" => "Somalia",
	"South Africa" => "South Africa",
	"Spain" => "Spain",
	"Sri Lanka" => "Sri Lanka",
	"St. Helena" => "St. Helena",
	"St. Pierre and Miquelon" => "St. Pierre and Miquelon",
	"Sudan" => "Sudan",
	"Suriname" => "Suriname",
	"Svalbard and Jan Mayen Islands" => "Svalbard and Jan Mayen Islands",
	"Swaziland" => "Swaziland",
	"Sweden" => "Sweden",
	"Switzerland" => "Switzerland",
	"Syrian Arab Republic" => "Syrian Arab Republic",
	"Taiwan" => "Taiwan",
	"Tajikistan" => "Tajikistan",
	"Tanzania, United Republic of" => "Tanzania, United Republic of",
	"Thailand" => "Thailand",
	"Togo" => "Togo",
	"Tokelau" => "Tokelau",
	"Tonga" => "Tonga",
	"Trinidad and Tobago" => "Trinidad and Tobago",
	"Tunisia" => "Tunisia",
	"Turkey" => "Turkey",
	"Turkmenistan" => "Turkmenistan",
	"Turks and Caicos Islands" => "Turks and Caicos Islands",
	"Tuvalu" => "Tuvalu",
	"Uganda" => "Uganda",
	"Ukraine" => "Ukraine",
	"United Arab Emirates" => "United Arab Emirates",
	"United Kingdom" => "United Kingdom",
	"United States" => "United States",
	"United States Minor Outlying Islands" => "United States Minor Outlying Islands",
	"Uruguay" => "Uruguay",
	"Uzbekistan" => "Uzbekistan",
	"Vanuatu" => "Vanuatu",
	"Vatican City State (Holy See)" => "Vatican City State (Holy See)",
	"Venezuela" => "Venezuela",
	"Vietnam" => "Vietnam",
	"Virgin Islands (British)" => "Virgin Islands (British)",
	"Virgin Islands (U.S.)" => "Virgin Islands (U.S.)",
	"Wallis And Futuna Islands" => "Wallis And Futuna Islands",
	"Western Sahara" => "Western Sahara",
	"Yemen" => "Yemen",
	"Yugoslavia" => "Yugoslavia",
	"Zaire" => "Zaire",
	"Zambia" => "Zambia",
	"Zimbabwe" => "Zimbabwe"
);


include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/html.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/util.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/navigation.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/smtpclass.inc.php";
?>
