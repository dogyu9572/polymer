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

// 임원  정보 조회
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

function getTransactionCard() {
    $tbl = $GLOBALS["_conf_tbl"]["account_transaction_poly"];

    // 중복 제거하여 계좌/카드사 정보 조회 - t_method가 '신용카드'인 경우와 t_account가 비어있지 않은 경우만
    $sql = "SELECT DISTINCT t_account FROM {$tbl} WHERE (t_method='신용카드' OR t_method='신용카드직접결제') AND t_account IS NOT NULL AND t_account != '' ORDER BY t_account ASC";

    // 쿼리 실행
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

    // 결과 배열 초기화 (키-값 형태로 변환)
    $list = array();

    if ($total_rs > 0) {
        while ($row = mysqli_fetch_assoc($rs)) {
            $cardName = $row['t_account'];
            // 카드명을 키와 값 모두로 사용
            $list[$cardName] = $cardName;
        }
    }

    return $list;
}
// 임원 정보 조회 (페이징 기능 추가 및 검색 조건 적용)
function listPolyMemberOfficer($id, $subQuery = "", $scale, $offset=0){
    $tbl_officer = $GLOBALS["_conf_tbl"]["member_officer_poly"];

    // offset 유효성 검사
    if(!isset($offset) || $offset < 0 || $offset === '' || !is_numeric($offset)) {
        $offset = 0;
    }

    // scale 유효성 검사
    if(!isset($scale) || !is_numeric($scale)) {
        $scale = 10; // 기본값 설정
    }

    // WHERE 절 구성
    $whereClause = "";
    $conditions = [];

    if(!empty($id)) {
        $id_safe = mysqli_real_escape_string($GLOBALS['dblink'], $id);
        $conditions[] = "o.o_mid = '{$id_safe}'";
    }

    // 검색 조건 추가
    // 임원 그룹 필터링
    if(isset($_GET['o_group']) && !empty($_GET['o_group'])) {
        $o_group = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['o_group']);
        $conditions[] = "o.o_group = '{$o_group}'";
    }

    // 임원 역할 필터링
    if(isset($_GET['o_role']) && !empty($_GET['o_role'])) {
        $o_role = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['o_role']);
        $conditions[] = "o.o_role = '{$o_role}'";
    }

    // 이름 검색
    if(isset($_GET['o_name']) && !empty($_GET['o_name'])) {
        $o_name = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['o_name']);
        $conditions[] = "o.o_name LIKE '%{$o_name}%'";
    }

    // 소속 검색
    if(isset($_GET['o_affiliation']) && !empty($_GET['o_affiliation'])) {
        $o_affiliation = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['o_affiliation']);
        $conditions[] = "o.o_affiliation LIKE '%{$o_affiliation}%'";
    }

    // 날짜 범위 검색
    $s_date = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['s_date']);
    $e_date = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['e_date']);
    if(isset($_GET['s_date']) && !empty($_GET['s_date']) && isset($_GET['e_date']) && !empty($_GET['e_date'])) {
        $conditions[] = "(o.o_dutyfrom <= '{$e_date}' AND (o.o_dutyto >= '{$s_date}' OR o.o_dutyto = ''))";
    }
    else if(isset($_GET['s_date']) && !empty($_GET['s_date'])) {
        $conditions[] = "(o.o_dutyfrom >= '{$s_date}' OR o.o_dutyto >= '{$s_date}')";
    }
    else if(isset($_GET['e_date']) && !empty($_GET['e_date'])) {
         $conditions[] = "(o.o_dutyfrom <= '{$e_date}')";
    }

    // 조건들을 WHERE 절로 결합
    if(!empty($conditions)) {
        $whereClause = "WHERE " . implode(" AND ", $conditions);
    }

    // 정렬 옵션
    $orderClause = "ORDER BY o.o_id DESC";
    if(isset($_GET['orderby1']) && !empty($_GET['orderby1'])) {
        $orderby1 = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['orderby1']);
        $orderClause = "ORDER BY o.{$orderby1}";

        if(isset($_GET['orderby2']) && !empty($_GET['orderby2'])) {
            $orderby2 = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['orderby2']);
            $orderClause .= ", o.{$orderby2}";
        }
    }

    // 전체 레코드 수 조회를 위한 쿼리
    $countSql = "SELECT COUNT(*) as cnt
                FROM {$tbl_officer} o
                {$whereClause}
                {$subQuery}";

    $countRs = mysqli_query($GLOBALS['dblink'], $countSql);
    $countRow = mysqli_fetch_assoc($countRs);
    $total_rs = $countRow['cnt'];

    // 페이징 처리가 적용된 메인 쿼리
    $sql = "SELECT o.*
            FROM {$tbl_officer} o
            {$whereClause}
            {$subQuery}
            {$orderClause}";

    // 결과 배열 초기화
    $list = array('total' => $total_rs);

    if($total_rs > 0) {
        // offset이 전체 레코드 수보다 크면 조정
        if($total_rs <= $offset) {
            $offset = max(0, $total_rs - ($scale > 0 ? $scale : $total_rs));
        }

        // LIMIT 적용
        $limitSql = $sql . " LIMIT $offset, $scale";

        // 결과 조회
        $rs = mysqli_query($GLOBALS['dblink'], $limitSql);
        $list['list'] = array();
        $list['list']['total'] = mysqli_num_rows($rs);

        // 결과 데이터 처리
        $i = 0;
        while($row = mysqli_fetch_assoc($rs)) {
            $list['list'][$i] = $row;
            $i++;
        }
    } else {
        $list['list']['total'] = 0;
        $list['list'] = array();
    }

    return $list;
}

function listTransactionMember($id, $subQuery = "", $scale, $offset=0){
    $tbl = $GLOBALS["_conf_tbl"]["account_transaction_poly"];
    $tbl_bank = $GLOBALS["_conf_tbl"]["account_banks_poly"];

    // offset 유효성 검사
    if(!isset($offset) || $offset < 0 || $offset === '' || !is_numeric($offset)) {
        $offset = 0;
    }

    // scale 유효성 검사
    if(!isset($scale) || !is_numeric($scale)) {
        $scale = 10; // 기본값 설정
    }

    // WHERE 절 구성
    $whereClause = "";
    $conditions = [];

    // 회원 ID 조건
    if(!empty($id)) {
        $id_safe = mysqli_real_escape_string($GLOBALS['dblink'], $id);
        $conditions[] = "t_mid = '{$id_safe}'";
    }

    // 회원 여부 필터링 (회원/비회원)
    if(isset($_GET['t_mid']) && $_GET['t_mid'] !== '') {
        $t_mid = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['t_mid']);
        $conditions[] = "t_mid " . ($t_mid == '0' ? "= 0 OR t_mid IS NULL" : "> 0");
    }

    // 주문번호 검색
    if(isset($_GET['t_orderno']) && !empty($_GET['t_orderno'])) {
        $t_orderno = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['t_orderno']);
        $conditions[] = "t_orderno LIKE '%{$t_orderno}%'";
    }

    // 승인번호 검색
    if(isset($_GET['t_apprvno']) && !empty($_GET['t_apprvno'])) {
        $t_apprvno = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['t_apprvno']);
        $conditions[] = "t_apprvno LIKE '%{$t_apprvno}%'";
    }

    // 이름 검색
    if(isset($_GET['t_name']) && !empty($_GET['t_name'])) {
        $t_name = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['t_name']);
        $conditions[] = "t_name LIKE '%{$t_name}%'";
    }

    // 소속 검색
    if(isset($_GET['t_affiliation']) && !empty($_GET['t_affiliation'])) {
        $t_affiliation = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['t_affiliation']);
        $conditions[] = "t_affiliation LIKE '%{$t_affiliation}%'";
    }

    // 이메일 검색
    if(isset($_GET['email']) && !empty($_GET['email'])) {
        $email = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['email']);
        $conditions[] = "t_email LIKE '%{$email}%'";
    }

    // 결제방법 검색 (신용카드, 온라인입금 등)
    if(isset($_GET['t_method']) && !empty($_GET['t_method'])) {
        $t_method = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['t_method']);
        $conditions[] = "t_method = '{$t_method}'";
    }

    // 결제카드/계좌 검색 - 카드인 경우
    if(isset($_GET['t_account']) && !empty($_GET['t_account'])) {
        // t_account 값이 정확��� 일치하는 거래 검색 (카드사명 등)
        $t_account = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['t_account']);
        $conditions[] = "t_account = '{$t_account}'";
    }

    // 입금 계좌 검색
    if(isset($_GET['account_banks']) && !empty($_GET['account_banks'])) {
        $account_banks = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['account_banks']);
        $conditions[] = "t_account = '{$account_banks}'";
    }

    // 납부상태 검색 (완납/일부납/미납)
    if(isset($_GET['t_complete']) && !empty($_GET['t_complete'])) {
        $t_complete = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['t_complete']);
        if($t_complete == 'A') {
            // 완납: 총 금액과 납부 금액이 같은 경우
            $conditions[] = "t_amount = t_paid AND t_amount > 0";
        } else if($t_complete == 'P') {
            // 일부납: 납부 ��액이 0보다 크고 총 금액보다 작은 경우
            $conditions[] = "t_paid > 0 AND t_paid < t_amount";
        } else if($t_complete == 'N') {
            // 미납: 납부 금액이 0인 경우
            $conditions[] = "t_paid = 0 AND t_amount > 0";
        }
    }

    // 회원코드 (memcode) 검색
    if(isset($_GET['memcode']) && !empty($_GET['memcode'])) {
        $memcode = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['memcode']);
        // JOIN 구문을 추가하는 변수 생성
        if (!isset($joinClause) || strpos($joinClause, "member_poly") === false) {
            $joinClause = " LEFT JOIN {$GLOBALS['_conf_tbl']['member_poly']} m ON t_mid = m.memberid ";
        }
        $conditions[] = "m.memcode = '{$memcode}'";
    }

    // 지부코드 (brncode) 검색
    if(isset($_GET['brncode']) && !empty($_GET['brncode'])) {
        $brncode = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['brncode']);
        $conditions[] = "t_brncode = '{$brncode}'";
    }

    // 트랜잭션 날짜 범위 검색
    if(isset($_GET['tsdate']) && !empty($_GET['tsdate'])) {
        $tsdate = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['tsdate']);
        $conditions[] = "DATE(t_inserted) >= '{$tsdate}'";
    }

    if(isset($_GET['tedate']) && !empty($_GET['tedate'])) {
        $tedate = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['tedate']);
        $conditions[] = "DATE(t_inserted) <= '{$tedate}'";
    }

    if(isset($_GET['psdate']) && !empty($_GET['psdate'])) {
        $psdate = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['psdate']);
        $conditions[] = "DATE(t_updated) >= '{$psdate}'";
    }

    if(isset($_GET['pedate']) && !empty($_GET['pedate'])) {
        $pedate = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['pedate']);
        $conditions[] = "DATE(t_updated) <= '{$pedate}'";
    }

    // 조건들을 WHERE 절로 결합
    if(!empty($conditions)) {
        $whereClause = "WHERE " . implode(" AND ", $conditions);
    }

    // 정렬 옵션
    $orderClause = "ORDER BY t_inserted DESC";

    // 정렬 조건 1
    if(isset($_GET['orderby1']) && !empty($_GET['orderby1'])) {
        $orderby1 = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['orderby1']);
        $orderClause = "ORDER BY {$orderby1}";

        // 정렬 조건 2
        if(isset($_GET['orderby2']) && !empty($_GET['orderby2'])) {
            $orderby2 = mysqli_real_escape_string($GLOBALS['dblink'], $_GET['orderby2']);
            $orderClause .= ", {$orderby2}";
        }
    }

    // 전체 레코드 수 조회
    $countSql = "SELECT COUNT(*) as cnt
            FROM {$tbl}
            {$joinClause}
            {$whereClause}
            {$subQuery}";

    $countRs = mysqli_query($GLOBALS['dblink'], $countSql);
    $countRow = mysqli_fetch_assoc($countRs);
    $total_rs = $countRow['cnt'];

    // 결과 배열 초기화
    $list = array('total' => $total_rs);

    if($total_rs > 0) {
        // offset 조정
        if($total_rs <= $offset) {
            $offset = max(0, $total_rs - ($scale > 0 ? $scale : $total_rs));
        }

        // 메인 쿼리
        $sql = "SELECT t.*
        FROM {$tbl} t
        {$joinClause}
        {$whereClause}
        {$subQuery}
        {$orderClause}
        LIMIT $offset, $scale";

        // 결과 조회
        $rs = mysqli_query($GLOBALS['dblink'], $sql);
        $list['list'] = array();
        $list['list']['total'] = mysqli_num_rows($rs);

        // 결과 데이터 처리
        $i = 0;
        while($row = mysqli_fetch_assoc($rs)) {
            $list['list'][$i] = $row;
            $i++;
        }
    } else {
        $list['list']['total'] = 0;
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
            o_name = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_name'])."',
            o_affiliation = '".mysqli_real_escape_string($GLOBALS['dblink'], $_POST['o_affiliation'])."',
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

function deleteTransactionMember($t_mid, $t_orderno){
    $tbl = $GLOBALS["_conf_tbl"]["account_transaction_poly"];

    $sql = "DELETE FROM {$tbl}
            WHERE t_mid = '".mysqli_real_escape_string($GLOBALS['dblink'], $t_mid)."'
            AND t_orderno = '".mysqli_real_escape_string($GLOBALS['dblink'], $t_orderno)."'";

    $rs = mysqli_query($GLOBALS['dblink'], $sql);

    if($rs){
        return true;
    } else {
        return false;
    }
}
