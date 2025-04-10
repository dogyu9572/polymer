<?PHP
$thisPHPname = basename($_SERVER['PHP_SELF']);
switch($thisPHPname){
	case 'admin.php' : case 'admin_info.php' : case 'admin_set_point.php' : case 'admin_set_search.php' : case  'admin_grade.php' : case  'admin_unlock.php' :
	$topMenuClass[1] = "on"; break;
	case 'member.php' : case 'member_info.php' : case 'member_add.php' : case 'member_outlist.php' : case 'member_standby.php' : case 'member_standby_info.php' : case  'executive.php' : case  'non_member.php' :
	case  'non_member_info.php' :
	case 'member_info_work.php' : case 'member_info_other.php' : case 'member_info_additional.php' : case 'member_info_executive.php' : case 'member_info_payment.php' :
	$topMenuClass[2] = "on"; break;
	case 'payment_history.php' : case 'payment_record.php' : case 'payment_record.php' : case 'payment_item.php' : case 'bank_account.php' :  case 'payment_duplicate_check.php' :
	$topMenuClass[4] = "on"; break;
	case 'popup_list.php' : case 'popup_info.php' : case 'popup_add.php' :
	$topMenuClass[18] = "on"; break;
	case 'admin_set.php' :
		$topMenuClass[17] = "on"; break;
	case 'log_hourly_view.php' : case 'log_daily_view.php' : case 'log_monthly_view.php' : case 'log_os_view.php' : case 'log_browser_view.php' : case 'log_ip_view.php' : case 'log_domain_view.php' :
	case 'log_referer_view.php' : case 'log_page_view.php' :
	$topMenuClass[19] = "on"; break;
}

unset($thisPHPname);

if ($_REQUEST['boardid']) {
	switch ($_REQUEST['boardid']) {
		case 'emailsms' : case 'emailsend' : case 'address' :
		$topMenuClass[3] = "on";
		break;
		case 'notice' : case 'news' : case 'gallery' : case 'gallery_year' :
		case 'branch' : case 'members' : case 'events' :
		case 'inforum' : case 'jobs' : case 'donation' :
		case 'newsletter' :
			$topMenuClass[15] = "on";
			break;
		case 'qna' :
			$topMenuClass[16] = "on";
			break;
		case 'history' :
			$topMenuClass[17] = "on";
			break;
	}
}

if ($_REQUEST['b_type']) {
	switch ($_REQUEST['b_type']) {
		case '2' :
			$topMenuClass[17] = "on";
			break;
		case '1' :
			$topMenuClass[18] = "on";
			break;
	}
}
?>
<div class="header">
    <a href="/backoffice/" class="logo">관리자모드</a>
    <a href="javascript:void(0);" class="btn_menu">
        <p class="t"></p>
        <p class="m"></p>
        <p class="b"></p>
    </a>
    <div class="gnb">
        <div class="black"></div>
        <ul>
			<?
			for($i=0;$i<$arrMenuList["total"];$i++){
				if($arrMenuList["list"][$i]['m_code']!="board_manage"){
					if( in_array($arrMenuList["list"][$i]['m_code'],$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT" ){
						if($arrMenuList["list"][$i]['m_code']=="log_manage"){
							$menuNum = "09";
						}else{
							$menuNum = sprintf('%02d', $i);
						}
						echo '<li class="'.$topMenuClass[$i].'"><a href="'.$arrMenuList["list"][$i]['purl'].'"><img src="/backoffice/pub/images/icon_gnb'.$menuNum.'.svg" alt="icon"><p>'.$arrMenuList["list"][$i]['m_name'].'</p></a></li>';
					}
				}
			}
			?>
        </ul>
    </div>
    <div class="mem_set">
        <div class="name"><i><img src="/backoffice/pub/images/icon_mem.svg" alt=""></i><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?>(<?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["NAME"]?>)님</div>
        <!--		<a href="/backoffice/">HOME</a>-->
        <a href="/" target="_blank">내 홈페이지</a>
        <a href="/backoffice/auth/logout.php">로그아웃</a>
    </div>
</div>