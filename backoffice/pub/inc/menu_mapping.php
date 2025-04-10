<?php
// 현재 실행 중인 PHP 파일 이름 가져오기
$thisPHPname = basename($_SERVER['PHP_SELF']);

/**
 * 메뉴 매핑 시스템
 * 상단 메뉴와 하위 메뉴의 매핑 관계를 정의하고 현재 활성화된 메뉴를 처리합니다.
 */

// 메뉴 인덱스를 상수로 정의
define('MENU_ADMIN', 1);
define('MENU_MEMBER', 2);
define('MENU_MAIL', 3);
define('MENU_ACCOUNTING', 4);
define('MENU_ELECTION', 5);
define('MENU_DOM_CONF', 6);
define('MENU_CONF_SUBMIT', 7);
define('MENU_ABSTRACT', 8);
define('MENU_PAPER_AWARD', 9);
define('MENU_INTL_CONF', 10);
define('MENU_SEMINAR', 11);
define('MENU_BOOTH', 12);
define('MENU_AWARD', 13);
define('MENU_PUBLISH', 14);
define('MENU_NOTICE', 15);
define('MENU_INQUIRY', 16);
define('MENU_HOMEPAGE', 17);
define('MENU_SITE', 18);
define('MENU_LOG', 19);

// 상단 메뉴 매핑 - 메뉴 인덱스와 관련 파일 연결
$topMenuMapping = [
	MENU_ADMIN => [
		'admin.php', 'admin_info.php', 'admin_set_point.php',
		'admin_set_search.php', 'admin_grade.php', 'admin_unlock.php',
		'category.php', 'category_info.php'
	],
	MENU_MEMBER => [
		'member.php', 'member_info.php', 'member_add.php',
		'member_outlist.php', 'member_standby.php', 'member_standby_info.php',
		'executive.php', 'non_member.php', 'non_member_info.php', 'member_info_work.php',
		'member_info_other.php', 'member_info_additional.php',
		'member_info_executive.php', 'member_info_payment.php'
	],
	MENU_HOMEPAGE => ['admin_set.php'],
	MENU_SITE => ['popup_list.php', 'popup_info.php', 'popup_add.php'],
	MENU_LOG => [
		'log_hourly_view.php', 'log_daily_view.php', 'log_monthly_view.php',
		'log_os_view.php', 'log_browser_view.php', 'log_ip_view.php',
		'log_domain_view.php', 'log_referer_view.php', 'log_page_view.php'
	],
	MENU_ACCOUNTING => [
		'payment_history.php', 'payment_info.php', 'payment_request.php'
	],
];

// 하위 메뉴 매핑 - 메뉴 코드와 관련 파일명 연결
$subMenuMapping = [
	'admin_manage_01' => ['admin_info.php'],
	'member_manage_01' => [
		'member_info.php', 'member_info_work.php', 'member_info_other.php',
		'member_info_additional.php', 'member_info_executive.php',
		'member_info_payment.php'
	],
	'member_manage_04' => ['non_member_info.php'],
	// 필요시 다른 서브메뉴 매핑 추가
];

// 메뉴 관리 코드 관계 매핑
$menuCodeMapping = [
	MENU_ADMIN => 'admin_manage',
	MENU_MEMBER => 'member_manage',
	MENU_MAIL => 'mail_manage',
	MENU_ACCOUNTING => 'accounting_manage',
	MENU_ELECTION => 'election_manage',
	MENU_DOM_CONF => 'dom_conf_manage',
	MENU_CONF_SUBMIT => 'conf_submit_manage',
	MENU_ABSTRACT => 'abstract_manage',
	MENU_PAPER_AWARD => 'paper_award_manage',
	MENU_INTL_CONF => 'intl_conf_manage',
	MENU_SEMINAR => 'seminar_manage',
	MENU_BOOTH => 'booth_manage',
	MENU_AWARD => 'award_manage',
	MENU_PUBLISH => 'publish_manage',
	MENU_NOTICE => 'notice_manage',
	MENU_INQUIRY => 'inquiry_manage',
	MENU_HOMEPAGE => 'homepage_manage',
	MENU_SITE => 'site_manage'
];

// 게시판 ID에 따른 메뉴 매핑
$boardIdMenuMapping = [
	'emailsms' => MENU_MAIL,
	'emailsend' => MENU_MAIL,
	'address' => MENU_MAIL,
	'notice' => MENU_NOTICE,
	'news' => MENU_NOTICE,
	'gallery' => MENU_NOTICE,
	'gallery_year' => MENU_NOTICE,
	'branch' => MENU_NOTICE,
	'members' => MENU_NOTICE,
	'events' => MENU_NOTICE,
	'inforum' => MENU_NOTICE,
	'jobs' => MENU_NOTICE,
	'donation' => MENU_NOTICE,
	'newsletter' => MENU_NOTICE,
	'qna' => MENU_INQUIRY,
	'history' => MENU_HOMEPAGE
];

// b_type에 따른 메뉴 매핑
$bTypeMenuMapping = [
	'1' => MENU_SITE,
	'2' => MENU_HOMEPAGE
];

/**
 * 상단 메뉴 활성화 상태 초기화
 */
function initializeTopMenuClass($menuCount = 20) {
	$topMenuClass = [];
	for ($i = 0; $i < $menuCount; $i++) {
		$topMenuClass[$i] = "";
	}
	return $topMenuClass;
}

/**
 * 데이터베이스에서 URL 매핑 정보를 가져오는 함수
 * @return array URL과 메뉴 인덱스를 매핑한 배열
 */
function getDbMenuMapping() {
	$dbMapping = [];

	// 현재 실행 중인 스크립트의 전체 경로
	$currentScriptPath = $_SERVER['PHP_SELF'];

	// tbl_admin_menu_code_sub 테이블에서 메뉴 매핑 정보 조회
	$sql = "SELECT m_code, p_code, p_url FROM ".$GLOBALS["_conf_tbl"]["admin_menu_code_sub"]."
            WHERE is_use = 'Y' AND p_url != ''";
	$result = mysqli_query($GLOBALS['dblink'], $sql);

	if ($result && mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$menuCode = $row['m_code'];
			$parentCode = $row['p_code'];
			$pageUrl = $row['p_url'];

			// 전체 경로 비교를 위한 매핑 추가
			if (strpos($currentScriptPath, $pageUrl) !== false) {
				// 부모 코드에 해당하는 메뉴 인덱스 찾기
				global $menuCodeMapping;
				foreach ($menuCodeMapping as $menuIndex => $code) {
					if ($code == $parentCode) {
						$dbMapping[basename($currentScriptPath)] = $menuIndex;
						break;
					}
				}
			}

			// 기존 파일명 비교 로직도 유지
			$filename = basename($pageUrl);
			global $menuCodeMapping;
			foreach ($menuCodeMapping as $menuIndex => $code) {
				if ($code == $parentCode) {
					$dbMapping[$filename] = $menuIndex;
					break;
				}
			}

			// 서브메뉴 코드 매핑 추가
			global $subMenuMapping;
			if (!isset($subMenuMapping[$menuCode])) {
				$subMenuMapping[$menuCode] = [];
			}
			if (!in_array($filename, $subMenuMapping[$menuCode])) {
				$subMenuMapping[$menuCode][] = $filename;
			}
		}
	}

	return $dbMapping;
}

// 상단 메뉴 활성화 클래스 초기화
$topMenuClass = initializeTopMenuClass();


// 데이터베이스에서 메뉴 매핑 정보 가져오기
$dbMenuMapping = getDbMenuMapping();

// DB 매핑 기반 메뉴 활성화
if (isset($dbMenuMapping[$thisPHPname])) {
	$topMenuClass[$dbMenuMapping[$thisPHPname]] = "on";
} else {
	// 하드코딩된 매핑 기반 메뉴 활성화
	foreach ($topMenuMapping as $menuIndex => $files) {
		if (in_array($thisPHPname, $files)) {
			$topMenuClass[$menuIndex] = "on";
			break;
		}
	}
}

// 하드코딩된 매핑 기반 메뉴 활성화 (DB에 없는 경우에만 적용)
if (empty($topMenuClass[$dbMenuMapping[$thisPHPname]])) {
	foreach ($topMenuMapping as $menuIndex => $files) {
		if (in_array($thisPHPname, $files)) {
			$topMenuClass[$menuIndex] = "on";
		}
	}
}
// 게시판 ID에 따른 메뉴 활성화
if (isset($_REQUEST['boardid']) && !empty($_REQUEST['boardid'])) {
	$boardId = $_REQUEST['boardid'];
	if (isset($boardIdMenuMapping[$boardId])) {
		$topMenuClass[$boardIdMenuMapping[$boardId]] = "on";
	}
}

// b_type에 따른 메뉴 활성화
if (isset($_REQUEST['b_type']) && !empty($_REQUEST['b_type'])) {
	$bType = $_REQUEST['b_type'];
	if (isset($bTypeMenuMapping[$bType])) {
		$topMenuClass[$bTypeMenuMapping[$bType]] = "on";
	}
}

/**
 * 상단 메뉴 기반으로 서브메뉴를 가져오는 함수
 * @param array $topMenuClass 활성화된 상단 메뉴 클래스 배열
 * @return array|null 서브 메뉴 목록
 */
function getSubMenuFromTopMenu($topMenuClass) {
	global $menuCodeMapping;

	// 활성화된 메뉴 찾기
	foreach ($menuCodeMapping as $menuIndex => $menuCode) {
		if (isset($topMenuClass[$menuIndex]) && $topMenuClass[$menuIndex] == "on") {
			return getAdminMenuSub($menuCode);
		}
	}

	return null;
}
?>