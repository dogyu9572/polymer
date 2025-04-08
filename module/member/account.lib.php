<?php
// 회원 학력 및 경력 정보 조회
function getCareerMember($id, $career) {
	if ($career == "acareer") {
		$tbl = $GLOBALS["_conf_tbl"]["member_acareer_poly"];
		$orderby = "   ORDER BY FIELD(degree, '학사', '석사수료', '석사', '박사수료', '박사')";
	} else if ($career == "scareer") {
		$tbl = $GLOBALS["_conf_tbl"]["member_scareer_poly"];
		$orderby = " ORDER BY fyear, tyear";
	} else {
		return array('total' => 0); // 잘못된 career 값 방지
	}

	// 회원 ID 필터링 (보안 강화)
	$id = intval($id);

	// SQL 실행
	$sql = "SELECT * FROM {$tbl} WHERE memberid = $id $orderby";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);
	$list = array();

	if ($total_rs > 0) {
		$list['total'] = $total_rs;
		$list['list'] = mysqli_fetch_all($rs, MYSQLI_ASSOC);
	} else {
		$list['total'] = 0;
	}

	return $list;
}
// 회원 납부 내역 조회
function getAccountTransaction($id) {
	// 트랜잭션 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["account_transaction_poly"];

	// ID 보안 처리
	$id = intval($id);

	// SQL 쿼리 작성
	$sql = "SELECT * FROM $tbl WHERE t_mid = $id ORDER BY t_inserted DESC";

	// 쿼리 실행
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	// 결과 배열 초기화
	$list = array();

	if ($total_rs > 0) {
		$list['total'] = $total_rs;
		$list['list'] = mysqli_fetch_all($rs, MYSQLI_ASSOC);
	} else {
		$list['total'] = 0;
	}

	return $list;
}
// 회원 납부 내역 조회
function getAccountPaid($id) {
	// 납부 내역 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["account_paid_poly"];

	// ID 보안 처리
	$id = intval($id);

	// SQL 쿼리 작성
	$sql = "SELECT * FROM $tbl WHERE p_mid = $id ORDER BY p_id DESC";

	// 쿼리 실행
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	// 결과 배열 초기화
	$list = array();

	if ($total_rs > 0) {
		$list['total'] = $total_rs;
		$list['list'] = mysqli_fetch_all($rs, MYSQLI_ASSOC);
	} else {
		$list['total'] = 0;
	}

	return $list;
}
// 회원 아이템 정보 조회
function getAccountItems (){
	// 아이템 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["account_items_poly"];

	// SQL 쿼리 작성
	$sql = "SELECT * FROM $tbl where i_active = true and i_member <= 2 ORDER BY i_item, i_sub, i_memtype, i_cost";

	// 쿼리 실행
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	// 결과 배열 초기화
	$list = array();

	if ($total_rs > 0) {
		$list['total'] = $total_rs;
		$list['list'] = mysqli_fetch_all($rs, MYSQLI_ASSOC);
	} else {
		$list['total'] = 0;
	}

	return $list;
}

// 회원 계좌 정보 조회
function getAccountBank() {
	// 은행 계좌 정보 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["account_banks_poly"];

	// SQL 쿼리 작성 - 활성화된 은행 계좌만 조회
	$sql = "SELECT * FROM $tbl ";

	// 쿼리 실행
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	// 결과 배열 초기화
	$list = array();

	if ($total_rs > 0) {
		$list['total'] = $total_rs;
		$list['list'] = mysqli_fetch_all($rs, MYSQLI_ASSOC);
	} else {
		$list['total'] = 0;
	}

	return $list;
}

// 주문번호 생성
function getNextOrderNo() {
	// 학회 영문 약자
	$societyAbbr = "PSK";

	// 현재 날짜 정보
	$today = date("Ymd");
	$currentYear = date("Y");

	// 현재 연도를 기준으로 최대 주문번호 조회
	$sql_next_id = "SELECT MAX(CAST(SUBSTRING_INDEX(t_orderno, '_', -1) AS UNSIGNED)) AS max_id
                    FROM {$GLOBALS['_conf_tbl']['account_transaction_poly']}
                    WHERE t_orderno LIKE '{$societyAbbr}_{$currentYear}%\\_0%'";

	$rs_next_id = mysqli_query($GLOBALS['dblink'], $sql_next_id);
	$nextId = 1;

	if($rs_next_id && mysqli_num_rows($rs_next_id) > 0) {
		$row_next_id = mysqli_fetch_assoc($rs_next_id);
		if($row_next_id['max_id'] > 0) {
			$nextId = $row_next_id['max_id'] + 1;
		}
	}

	// 주문번호 생성: PSK_YYYYMMDD_00001 형식 (5자리 숫자로 패딩)
	$orderNo = $societyAbbr . "_" . $today . "_" . str_pad($nextId, 5, "0", STR_PAD_LEFT);

	return $orderNo;
}

// 회원 아이템 정보 조회
function getPolyMemberOfficer($id, $subQuery = ""){
	$tbl_officer = $GLOBALS["_conf_tbl"]["member_officer_poly"];

	$id_safe = mysqli_real_escape_string($GLOBALS['dblink'], $id);
	$sql = "SELECT o.* 
            FROM {$tbl_officer} o
            WHERE o.o_mid = '{$id_safe}' 
            {$subQuery}
            ORDER BY o.o_id DESC";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	// 결과 배열 초기화
	$list = array('total' => $total_rs);

	if($total_rs > 0){
		for($i=0; $i < $total_rs; $i++){
			$list['list'][$i] = mysqli_fetch_assoc($rs);
		}
	} else {
		$list['list'] = array();
	}

	return $list;
}

// 회원 납부 내역 조회
function infoOfficerMember($id, $o_id){
	$tbl_officer = $GLOBALS["_conf_tbl"]["member_officer_poly"];

	$id_safe = mysqli_real_escape_string($GLOBALS['dblink'], $id);
	$o_id_safe = mysqli_real_escape_string($GLOBALS['dblink'], $o_id);

	$sql = "SELECT * FROM {$tbl_officer} 
            WHERE o_mid = '{$id_safe}' 
            AND o_id = '{$o_id_safe}'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	if($total_rs > 0){
		$list['total'] = $total_rs;
		$list['list'] = mysqli_fetch_assoc($rs);
	} else {
		$list['total'] = 0;
	}

	return $list;
}

// 회원 납부 내역 조회
function infoPaidMember($id, $p_id){
	$tbl = $GLOBALS["_conf_tbl"]["account_paid_poly"];

	$id_safe = mysqli_real_escape_string($GLOBALS['dblink'], $id);
	$p_id_safe = mysqli_real_escape_string($GLOBALS['dblink'], $p_id);

	$sql = "SELECT * FROM {$tbl}
            WHERE p_mid = '{$id_safe}'
            AND p_id = '{$p_id_safe}'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	if($total_rs > 0){
		$list['total'] = $total_rs;
		$list['list'] = mysqli_fetch_assoc($rs);
	} else {
		$list['total'] = 0;
	}

	return $list;
}

function infoTransactionMember($id, $orderno) {
	$tbl = $GLOBALS["_conf_tbl"]["account_transaction_poly"];

	$id_safe = mysqli_real_escape_string($GLOBALS['dblink'], $id);
	$orderno_safe = mysqli_real_escape_string($GLOBALS['dblink'], $orderno);

	$sql = "SELECT * FROM {$tbl}
            WHERE t_mid = '{$id_safe}'
            AND t_orderno = '{$orderno_safe}'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	$list = array();

	if($total_rs > 0) {
		$list['total'] = $total_rs;
		$list['list'] = mysqli_fetch_assoc($rs);
	} else {
		$list['total'] = 0;
	}

	return $list;
}
// 회원 학력 및 경력 정보 삽입
function insertAcareerMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["member_acareer_poly"];

	$sql = "INSERT INTO {$tbl} SET
        memberid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."',
        degree = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['degree'])."',
        dyear = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['dyear'])."',
        univ = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['univ'])."',
        department = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['department'])."',
        major = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['major'])."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

// 회원 경력 정보 삽입
function insertScareerMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["member_scareer_poly"];

	$sql = "INSERT INTO {$tbl} SET
            memberid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."',
            fyear = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['fyear'])."',
            tyear = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['tyear'])."',
            affiliation = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['affiliation'])."',
            description = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['description'])."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

// 회원 임원 정보 삽입
function insertExecutiveMember($id)
{
	$tbl = $GLOBALS["_conf_tbl"]["member_officer_poly"];

	$sql = "INSERT INTO {$tbl} SET
            o_mid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."',
            o_group = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_group'])."',
            o_sub = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_sub'])."',
            o_role = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_role'])."',
            o_biography = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_biography'])."',
            o_dutyfrom = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_dutyfrom'])."',
            o_dutyto = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_dutyto'])."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

// 회원 납부 내역 삽입
function insertPaidMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["account_paid_poly"];

	// 현재 가장 큰 p_id 값을 조회
	$sql_max = "SELECT MAX(p_id) as max_id FROM {$tbl}";
	$rs_max = mysqli_query($GLOBALS['dblink'], $sql_max);
	$row = mysqli_fetch_assoc($rs_max);
	$next_id = ($row['max_id'] > 0) ? $row['max_id'] + 1 : 1;

	// i_item 값과 i_sub 값을 조합하여 저장
	$itemText = $_POST['i_item'];
	if (!empty($_POST['i_sub'])) {
		$itemText .= "({$_POST['i_sub']})";
	}

	$sql = "INSERT INTO {$tbl} SET
        p_id = '".$next_id."',
        p_mid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."',
        p_item = '".mysqli_real_escape_string($GLOBALS['dblink'], $itemText)."',      
        p_paid = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_paid'])."',
        p_pay = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_pay'])."',
        p_validfrom = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_validfrom'])."',
        p_validto = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_validto'])."',
        p_remark = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_remark'])."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

function insertTransactionMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["account_transaction_poly"];

	// JSON 데이터 파싱 (웹방화벽 우회용)
	$items = array();
	if(isset($_POST['items_data']) && !empty($_POST['items_data'])) {
		$items = json_decode($_POST['items_data'], true);
	}

	// 총 금액과 납부 금액 계산
	$totalAmount = 0;
	$totalPaid = 0;
	foreach($items as $item) {
		$totalAmount += intval($item['Amount']);
		$totalPaid += intval($item['Paid']);
	}

	// XML 생성
	$xml = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL;
	$xml .= '<Items>' . PHP_EOL;

	foreach($items as $item) {
		$xml .= "\t<Item>" . PHP_EOL;
		$xml .= "\t\t<ItemId>" . htmlspecialchars($item['ItemId']) . "</ItemId>" . PHP_EOL;
		$xml .= "\t\t<ItemName>" . htmlspecialchars($item['ItemName']) . "</ItemName>" . PHP_EOL;
		$xml .= "\t\t<Cost>" . htmlspecialchars($item['Cost']) . "</Cost>" . PHP_EOL;
		$xml .= "\t\t<Quantity>" . htmlspecialchars($item['Quantity']) . "</Quantity>" . PHP_EOL;
		$xml .= "\t\t<Amount>" . htmlspecialchars($item['Amount']) . "</Amount>" . PHP_EOL;
		$xml .= "\t\t<Paid>" . htmlspecialchars($item['Paid']) . "</Paid>" . PHP_EOL;
		$xml .= "\t\t<From>" . htmlspecialchars($item['From']) . "</From>" . PHP_EOL;
		$xml .= "\t\t<To>" . htmlspecialchars($item['To']) . "</To>" . PHP_EOL;
		$xml .= "\t\t<For>" . PHP_EOL;
		$xml .= "\t\t\t<MemberId>" . htmlspecialchars($item['For']['MemberId']) . "</MemberId>" . PHP_EOL;
		$xml .= "\t\t\t<Name>" . htmlspecialchars($item['For']['Name']) . "</Name>" . PHP_EOL;
		$xml .= "\t\t\t<Affiliation>" . htmlspecialchars($item['For']['Affiliation']) . "</Affiliation>" . PHP_EOL;
		$xml .= "\t\t</For>" . PHP_EOL;
		$xml .= "\t</Item>" . PHP_EOL;
	}

	$xml .= "</Items>";

	// 결제 날짜와 시간 조합
	$payDateTime = $_POST['pay_date'] . ' ' . $_POST['pay_time'];

	// SQL 쿼리 작성
	$sql = "INSERT INTO {$tbl} SET
        t_orderno = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_orderno'])."',
        t_amount = '".intval($totalAmount)."',
        t_paid = '".intval($totalPaid)."',
        t_mid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."',
        t_name = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_name'])."',
        t_affiliation = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_affiliation'])."',
        t_phone = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_phone'])."',
        t_cphone = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_cphone'])."',
        t_email = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_email'])."',
        t_method = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_method_text'])."',
        t_account = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_account_hidden'])."',
        t_remark = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_remark'])."',
        t_itemxml = '".mysqli_real_escape_string($GLOBALS['dblink'], $xml)."',
        t_inserted = '".$payDateTime."',
        t_updated = NOW()";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}


//회원정보 수정
function editInfoMember($id){
	$tbl = $GLOBALS["_conf_tbl"]["member_poly"];

	$sql = "UPDATE {$tbl} SET
        namec = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['namec'])."',
        namee = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['namee'])."',
        memcode = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['memcode'])."',
        mstatus = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['mstatus'])."',
        gender = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['gender'])."',
        hphone = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['hphone'])."',
        cphone = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['cphone'])."',
        email = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['email'])."',
        homepage = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['homepage'])."',
        country = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['country'])."',
        hzonecode = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['hzonecode'])."',
        haddress1 = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['haddress1'])."',
        haddress2 = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['haddress2'])."',
        remark = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['remark'])."',
        updated = NOW()
        WHERE memberid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	}else{
		return false;
	}
}

function editWorkMember($id){
	$tbl = $GLOBALS["_conf_tbl"]["member_poly"];

	$sql = "UPDATE {$tbl} SET
        affiliation = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['affiliation'])."',
        affiliatione = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['affiliatione'])."',
        jobcode = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['jobcode'])."',
        department = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['department'])."',
        pos = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['pos'])."',
        aphone = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['aphone'])."',
        fax = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['fax'])."',
        azonecode = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['azonecode'])."',
        aaddress1 = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['aaddress1'])."',
        aaddress2 = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['aaddress2'])."',
        postal = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['postal'])."',
        updated = NOW()
        WHERE memberid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	}else{
		return false;
	}
}

function editAdditionalMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["member_poly"];

	$divcodeStr = !empty($_POST['divcode']) ? implode("|", $_POST['divcode']) : '';

	$sql = "UPDATE {$tbl} SET
	   divcode = '".mysqli_real_escape_string($GLOBALS['dblink'], $divcodeStr)."',
        brncode = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['brncode'])."',
        inserted = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['inserted'])."',
        updated = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['updated'])."',
        subscription = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['subscription'])."',
        contactable = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['contactable'])."',
         formno = '".mysqli_real_escape_string($GLOBALS['dblink'], empty($_POST['formno']) ? '0' : $_POST['formno'])."',
        custom5 = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['custom5'])."',
        custom4 = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['custom4'])."',        
        infolevel = '".mysqli_real_escape_string($GLOBALS['dblink'], empty($_POST['infolevel']) ? '0' : $_POST['infolevel'])."',
        custom1 = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['custom1'])."',
        custom2 = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['custom2'])."'
        WHERE memberid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs) {
		return true;
	} else {
		return false;
	}
}


function editAcareerMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["member_acareer_poly"];

	// 기존 데이터를 찾기 위한 조건
	$old_degree = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['old_degree']);
	$old_dyear = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['old_dyear']);
	$old_univ = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['old_univ']);
	$old_department = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['old_department']);
	$old_major = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['old_major']);

	// 수정할 데이터
	$new_degree = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['degree']);
	$new_dyear = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['dyear']);
	$new_univ = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['univ']);
	$new_department = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['department']);
	$new_major = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['major']);

	// 기존 데이터를 찾고 수정하는 쿼리
	$sql = "UPDATE {$tbl} SET
                degree = '{$new_degree}',
                dyear = '{$new_dyear}',
                univ = '{$new_univ}',
                department = '{$new_department}',
                major = '{$new_major}'
            WHERE memberid = '{$id}'
                AND degree = '{$old_degree}'
                AND dyear = '{$old_dyear}'
                AND univ = '{$old_univ}'
                AND department = '{$old_department}'
                AND major = '{$old_major}'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

function editExecutiveMember($id, $o_id){
	$tbl_officer = $GLOBALS["_conf_tbl"]["member_officer_poly"];

	$sql = "UPDATE {$tbl_officer} SET
            o_group = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_group'])."',
            o_sub = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_sub'])."',
            o_role = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_role'])."',
            o_biography = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_biography'])."',
            o_dutyfrom = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_dutyfrom'])."',
            o_dutyto = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_dutyto'])."'
            WHERE o_mid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."'
            AND o_id = '".mysqli_real_escape_string($GLOBALS['dblink'], $o_id)."'";
//echo "echo:"; print_r($sql); echo "<br>" ;
//exit;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

function editPaidMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["account_paid_poly"];

	// i_item 값과 i_sub 값을 조합하여 저장
	$itemText = $_POST['i_item'];
	if (!empty($_POST['i_sub'])) {
		$itemText .= "({$_POST['i_sub']})";
	}

	$sql = "UPDATE {$tbl} SET
            p_item = '".mysqli_real_escape_string($GLOBALS['dblink'], $itemText)."',
            p_paid = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_paid'])."',
            p_pay = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_pay'])."',
            p_validfrom = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_validfrom'])."',
            p_validto = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_validto'])."',
            p_remark = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_remark'])."'
            WHERE p_id = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_id'])."'
            AND p_mid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

function editTransactionMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["account_transaction_poly"];

	// JSON 데이터 파싱 (웹방화벽 우회용)
	$items = array();
	if(isset($_POST['items_data']) && !empty($_POST['items_data'])) {
		$items = json_decode($_POST['items_data'], true);
	}

	// 총 금액과 납부 금액 계산
	$totalAmount = 0;
	$totalPaid = 0;
	foreach($items as $item) {
		$totalAmount += intval($item['Amount']);
		$totalPaid += intval($item['Paid']);
	}

	// XML 생성
	$xml = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL;
	$xml .= '<Items>' . PHP_EOL;

	foreach($items as $item) {
		$xml .= "\t<Item>" . PHP_EOL;
		$xml .= "\t\t<ItemId>" . htmlspecialchars($item['ItemId']) . "</ItemId>" . PHP_EOL;
		$xml .= "\t\t<ItemName>" . htmlspecialchars($item['ItemName']) . "</ItemName>" . PHP_EOL;
		$xml .= "\t\t<Cost>" . htmlspecialchars($item['Cost']) . "</Cost>" . PHP_EOL;
		$xml .= "\t\t<Quantity>" . htmlspecialchars($item['Quantity']) . "</Quantity>" . PHP_EOL;
		$xml .= "\t\t<Amount>" . htmlspecialchars($item['Amount']) . "</Amount>" . PHP_EOL;
		$xml .= "\t\t<Paid>" . htmlspecialchars($item['Paid']) . "</Paid>" . PHP_EOL;
		$xml .= "\t\t<From>" . htmlspecialchars($item['From']) . "</From>" . PHP_EOL;
		$xml .= "\t\t<To>" . htmlspecialchars($item['To']) . "</To>" . PHP_EOL;
		$xml .= "\t\t<For>" . PHP_EOL;
		$xml .= "\t\t\t<MemberId>" . htmlspecialchars($item['For']['MemberId']) . "</MemberId>" . PHP_EOL;
		$xml .= "\t\t\t<Name>" . htmlspecialchars($item['For']['Name']) . "</Name>" . PHP_EOL;
		$xml .= "\t\t\t<Affiliation>" . htmlspecialchars($item['For']['Affiliation']) . "</Affiliation>" . PHP_EOL;
		$xml .= "\t\t</For>" . PHP_EOL;
		$xml .= "\t</Item>" . PHP_EOL;
	}
	$xml .= "</Items>";

	// SQL 쿼리 작성
	$sql = "UPDATE {$tbl} SET            
            t_method = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_method_text'])."',
            t_account = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_account_hidden'])."',
            t_amount = '".intval($totalAmount)."',
            t_paid = '".intval($totalPaid)."',
            t_name = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_name'])."',
            t_affiliation = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_affiliation'])."',
            t_phone = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_phone'])."',
            t_cphone = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_cphone'])."',
            t_email = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_email'])."',
            t_remark = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['p_remark'])."',
            t_itemxml = '".mysqli_real_escape_string($GLOBALS['dblink'], $xml)."',
            t_updated = NOW()
            WHERE t_orderno = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['t_orderno'])."'
            AND t_mid = '".mysqli_real_escape_string($GLOBALS['dblink'], $id)."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

function editScareerMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["member_scareer_poly"];

	// 기존 데이터를 찾기 위한 조건
	$old_fyear = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['old_fyear']);
	$old_tyear = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['old_tyear']);
	$old_affiliation = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['old_affiliation']);
	$old_description = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['old_description']);

	// 수정할 데이터
	$new_fyear = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['fyear']);
	$new_tyear = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['tyear']);
	$new_affiliation = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['affiliation']);
	$new_description = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['description']);

	// 기존 데이터를 찾고 수정하는 쿼리
	$sql = "UPDATE {$tbl} SET
                fyear = '{$new_fyear}',
                tyear = '{$new_tyear}',
                affiliation = '{$new_affiliation}',
                description = '{$new_description}'
            WHERE memberid = '{$id}'
                AND fyear = '{$old_fyear}'
                AND tyear = '{$old_tyear}'
                AND affiliation = '{$old_affiliation}'
                AND description = '{$old_description}'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}


function deleteAcareerMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["member_acareer_poly"];

	// 기존 데이터를 찾기 위한 조건
	$degree = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['degree']);
	$dyear = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['dyear']);
	$univ = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['univ']);
	$department = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['department']);
	$major = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['major']);

	// 기존 데이터를 찾고 삭제하는 쿼리
	$sql = "DELETE FROM {$tbl}
            WHERE memberid = '{$id}'
                AND degree = '{$degree}'
                AND dyear = '{$dyear}'
                AND univ = '{$univ}'
                AND department = '{$department}'
                AND major = '{$major}'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

function deleteScareerMember($id) {
	$tbl = $GLOBALS["_conf_tbl"]["member_scareer_poly"];

	// 기존 데이터를 찾기 위한 조건
	$fyear = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['fyear']);
	$tyear = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['tyear']);
	$affiliation = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['affiliation']);
	$description = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['description']);

	// 기존 데이터를 찾고 삭제하는 쿼리
	$sql = "DELETE FROM {$tbl}
            WHERE memberid = '{$id}'
                AND fyear = '{$fyear}'
                AND tyear = '{$tyear}'
                AND affiliation = '{$affiliation}'
                AND description = '{$description}'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

function deleteExecutiveMember($o_mid, $o_id){
	$tbl_officer = $GLOBALS["_conf_tbl"]["member_officer_poly"];

	$sql = "DELETE FROM {$tbl_officer}
            WHERE o_mid = '{$o_mid}'  
                AND o_id = '{$o_id}'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}

function deletePaidMember($p_mid, $p_id){
	$tbl = $GLOBALS["_conf_tbl"]["account_paid_poly"];

	$sql = "DELETE FROM {$tbl}
        WHERE p_mid = '".mysqli_real_escape_string($GLOBALS['dblink'], $p_mid)."'
        AND p_id = '".mysqli_real_escape_string($GLOBALS['dblink'], $p_id)."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	} else {
		return false;
	}
}
