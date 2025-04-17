<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/admin_top.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/module/admin/menu.php";

include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/account.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/board/board.lib.php";

if (! in_array ( "member_manage", $_SESSION [$_SITE ["DOMAIN"]] ["ADMIN"] ["AUTH"] ) && $_SESSION [$_SITE ["DOMAIN"]] ["ADMIN"] ["GRADE"] != "ROOT") :
	jsMsg ( "권한이 없습니다." );
	jsHistory ( "-1" );
endif;

if ($_GET['page_size']) {
	$scale = $_GET['page_size'];
} elseif ($_GET['page_size'] === '0') {
	$scale = 0;
} else {
	$scale = 20;
}

if (isset($_GET['mstatus']) && $_GET['mstatus'] !== '') {
	$mstatus = $_GET['mstatus'];
} else {
	$mstatus = 1; // 기본값 설정
}
// DB연결
$dblink = SetConn ( $_conf_db ["main_db"] );

$arrListPaid = listPaid("", "", $scale, $_REQUEST['offset']);

$arrCodeCategory = getPolyCategoryOption("회원구분");
$arrBranchCategory = getPolyCategoryOption("지부");
$arrAccountBank = getAccountBank();
$chDate = date('Y-m-d H:i:s',strtotime(date("Y-m-d")."-30 day"));   // 한달
$arrAccountCard = getTransactionCard();

// DB해제
//SetDisConn ( $dblink );
?>

	<div class="container">
		<div class="title">결제내역</div>
		<form name="frmSort" method="get" action="paid.php">
			<div class="inbox top_search">
				<dl>
					<dt>정렬조건1</dt>
					<dd>
						<select name="orderby1" class="text"  style="width:120px;">
							<option value="">선택</option>
                            <option value="p_paid DESC" selected>납부일자
						</select>
					</dd>
				</dl>
				<dl>
					<dt>정렬조건2</dt>
					<dd>
						<select name="orderby2" class="text" style="width:120px;">
							<option value="">선택</option>
                            <option value="t_name" selected>이름
						</select>
					</dd>
				</dl>
                <dl class="search_wrap">
                </dl>

                <dl class="search_wrap">
                    <dt>회원여부</dt>
                    <dd>
                        <select name="p_mid" class="text" style="width:120px;">
                            <option value="">전체</option>
                            <option value="1" <?= isset($_GET['p_mid']) && $_GET['p_mid'] === '1' ? "selected" : "" ?>>회원</option>
                            <option value="0" <?= isset($_GET['p_mid']) && $_GET['p_mid'] === '0' ? "selected" : "" ?>>비회원</option>
                        </select>
                    </dd>
                </dl>
				<dl class="search_wrap">
					<dt>회원구분</dt>
					<dd>
						<select name="memcode" class="text"  style="width:120px;">
							<option value="">선택</option>
							<?php foreach($arrCodeCategory as $code => $name): ?>
								<option value="<?=$code?>" <?=$code==$_GET['memcode']?" selected":""?>><?=$name?></option>
							<?php endforeach; ?>
						</select>
					</dd>
				</dl>
				<dl class="search_wrap">
				</dl>
				<dl>
					<dt>이름</dt>
					<dd>
						<input type="text"  name="t_name" value="<?=$_GET['t_name']?>" />
					</dd>
				</dl>
				<dl>
					<dt>소속</dt>
					<dd>
						<input type="text"  name="t_affiliation" value="<?=$_GET['t_affiliation']?>" />
					</dd>
				</dl>
				<dl>
					<dt>이메일</dt>
					<dd>
						<input type="text"  name="email" value="<?=$_GET['email']?>" />
					</dd>
				</dl>
				<dl class="search_wrap">
				</dl>
                <dl>
                    <dt>납부키</dt>
                    <dd>
                        <input type="text"  name="p_id" value="<?=$_GET['p_id']?>" />
                    </dd>
                </dl>
				<dl>
					<dt>주문번호</dt>
					<dd>
						<input type="text"  name="p_orderno" value="<?=$_GET['p_orderno']?>" />
					</dd>
				</dl>
				<dl class="search_wrap">
				</dl>
				<dl>
					<dt>결제항목</dt>
					<dd>
						<select name="aa" class="text"  style="width:120px;">
							<option value="">전체</option>
						</select>
					</dd>
				</dl>
				<dl>
					<dt>결제세부항목</dt>
					<dd>
						<select name="aa" class="text"  style="width:120px;">
							<option value="">전체</option>
						</select>
                        <button type="submit" class="btn date_btn">검색</button>
                        <a href="/backoffice/module/accounting/payment_record.php" class="btn date_btn" style="width: 110px;background:#777;display:inline-block;text-decoration:none;cursor:pointer;text-align:center;">검색조건 초기화</a>
					</dd>
				</dl>
			</div>
			<div class="inbox">
				<div class="bdr_top">
					<div class="left">
						<div class="total">Total : <strong><?=number_format($arrListPaid["total"])?></strong></div>
						<div class="down">
						</div>
					</div>
					<div class="bdr_right">
						<div class="btns">
							<a href="/backoffice/module/member/member_to_xls.php?user_level=<?=urlencode($_REQUEST['user_level'])?>&join_type=<?=urlencode($_REQUEST['join_type'])?>&email_accept=<?=urlencode($_REQUEST['email_accept'])?>&sms_accept=<?=urlencode($_REQUEST['sms_accept'])?>&s_date=<?=urlencode($_REQUEST['s_date'])?>&e_date=<?=urlencode($_REQUEST['e_date'])?>&login_last=<?=urlencode($_REQUEST['login_last'])?>&sw=<?=urlencode($_REQUEST['sw'])?>&sk=<?=urlencode($_REQUEST['sk'])?>&page_size=<?=$scale?>&offset=<?=urlencode($_REQUEST['offset'])?>" class="excel" download>엑셀파일로 저장<span class="pc_vw"></span></a>
						</div>
						<div class="count">
							<select name="page_size" onchange="document.frmSort.submit()" style="width:100px;">
								<option value="0" <?if($scale=="0"){echo 'selected="selected"';}?>>전체</option>
								<option value="500" <?if($scale=="500"){echo 'selected="selected"';}?>>500</option>
								<option value="400" <?if($scale=="400"){echo 'selected="selected"';}?>>400</option>
								<option value="300" <?if($scale=="300"){echo 'selected="selected"';}?>>300</option>
								<option value="200" <?if($scale=="200"){echo 'selected="selected"';}?>>200</option>
								<option value="100" <?if($scale=="100"){echo 'selected="selected"';}?>>100</option>
								<option value="50" <?if($scale=="50"){echo 'selected="selected"';}?>>50</option>
								<option value="40" <?if($scale=="40"){echo 'selected="selected"';}?>>40</option>
								<option value="30" <?if($scale=="30"){echo 'selected="selected"';}?>>30</option>
								<option value="20" <?if($scale=="20"){echo 'selected="selected"';}?>>20</option>
								<option value="15" <?if($scale=="15"){echo 'selected="selected"';}?>>15</option>
								<option value="10" <?if($scale=="10"){echo 'selected="selected"';}?>>10</option>
							</select>
							개씩 보기
						</div>
					</div>
				</div>
		</form>
		<!-- over_tbl : 테이블을 좌우로 스크롤 할 때 사용합니다. -->
		<!-- mo_break_tbl : 767px 이하에서 테이블 구조를 깰 때 사용합니다. -->
		<div class="over_tbl mo_break_tbl">
			<div class="bdr_list tac">
				<table>
					<colgroup class="pc_vw">
						<col class="check">
						<col class="w8p">
						<col class="w10p">
						<col class="w10p">
						<col class="w8p">
						<col class="w8p">
						<col class="w12p">
						<col class="w12p">
						<col class="w12p">
						<col class="w12p">
                        <col class="w12p">
					</colgroup>
					<thead>
					<tr>
						<th><label class="check notxt"><input type="checkbox" name="" id="allCheck"><i></i></label></th>
						<th class="pc_vw">No.</th>
						<th class="pc_vw">납부키</th>
						<th class="pc_vw">주문번호</th>
						<th class="pc_vw">회원여부</th>
						<th class="pc_vw">이름</th>
						<th class="pc_vw">소속</th>
						<th class="pc_vw">납부항목</th>
						<th class="pc_vw">납부금액</th>
						<th class="pc_vw">유효기간(시작)</th>
						<th class="pc_vw">유효기간(종료)</th>
					</tr>
					</thead>
					<tbody>
					<?
					if($arrListPaid['list']['total'] > 0){
						for ($i=0;$i<$arrListPaid['list']['total'];$i++){
							?>
                            <tr>
                                <td class="chkbox"><label class="check notxt"><input type="checkbox" value="<?=$arrListPaid["list"][$i]['p_id']?>" data-memberid="<?=$arrListPaid["list"][$i]['p_mid']?>" name="chk_list"><i></i></label></td>
                                <td><i class="mo_vw">No.</i><?=$arrListPaid['total']-$i-$_REQUEST['offset']?></td>
                                <td><i class="mo_vw">납부키</i><?=$arrListPaid['list'][$i]['p_id']?></td>
                                <td><i class="mo_vw">주문번호</i><?=$arrListPaid['list'][$i]['p_orderno']?></td>
                                <td><i class="mo_vw">회원여부</i><?=$arrListPaid['list'][$i]['p_mid'] > 0 ? '회원' : '비회원'?></td>
                                <td><i class="mo_vw">이름</i><?=$arrListPaid['list'][$i]['t_name']?></td>
                                <td><i class="mo_vw">소속</i><?=$arrListPaid['list'][$i]['t_affiliation']?></td>
                                <td><i class="mo_vw">납부항목</i><?=$arrListPaid['list'][$i]['p_item']?></td>
                                <td><i class="mo_vw">납부금액</i><?=number_format($arrListPaid['list'][$i]['p_amount'])?>원</td>
                                <td><i class="mo_vw">유효기간(시작)</i><?=$arrListPaid['list'][$i]['p_validfrom'] ? date('Y-m-d', strtotime($arrListPaid['list'][$i]['p_validfrom'])) : '-'?></td>
                                <td><i class="mo_vw">유효기간(종료)</i><?=$arrListPaid['list'][$i]['p_validto'] ? date('Y-m-d', strtotime($arrListPaid['list'][$i]['p_validto'])) : '-'?></td>
                            </tr>
							<?
						}
					}else{
						?>
						<tr height="100">
							<td colspan="14">등록된 데이터가 없습니다.</td>
						</tr>
					<?}?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="bdr_btm">
			<div class="paging">
				<?
				############### paging ############### ST
				$queryString = explode("&",$_SERVER['QUERY_STRING']);
				$reQueryString = "";
				$comma = "";
				for($i=0;$i<count($queryString);$i++){
					if(strpos($queryString[$i],"offset=")===false){
						$reQueryString .= $comma.$queryString[$i];
						$comma = "&";
					}
				}
				echo pageNavigationBackoffice($arrListPaid["total"],$scale,10,$_GET['offset'],$reQueryString);
				############### paging ############### ED
				?>
			</div>
			<div class="btns" style="right:unset;">
				<a href="javascript:void(0);" onclick="deleteSelectedTransactions()" class="btn btn_del">선택 삭제</a>
			</div>
		</div>
	</div>
    <form name="frmContentsHidden" method="post" action="/backoffice/module/member/member_evn.php">
        <input type="hidden" name="evnMode" value="delete">
        <input type="hidden" name="evnSubMode" value="batch_payment">
        <input type="hidden" name="p_ids" value="">
        <input type="hidden" name="p_ordernos" value="">
        <input type="hidden" name="memberids" value="">
        <input type="hidden" name="returnURL" value="<?=$_SERVER['REQUEST_URI']?>">
    </form>
<?######################################### iframe fancybox ######################################### ST?>
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<style type="text/css">
        .fancybox__content { padding: 5px 0;border-radius: 4px; }
        .fancybox__slide {padding-bottom:20px;}
        .ui-datepicker { z-index: 9999 !important; }
        .date-picker { width: 100px; text-align: center; }
	</style>
<?######################################### iframe fancybox ######################################### ED?>
	<style>
        .date_btn {
            font-size: 12px;
            color: #fff;
            font-weight: 700;
            line-height: 30px;
            height: 30px;
            width: 70px;
            text-align: center;
            background: #3e4450;
            border-radius: 3px;
            margin-right: 8px;
        }
	</style>
	<script>
        $(document).ready(function() {
            // Override the niceSelect function to do nothing
            $.fn.niceSelect = function() {
                return this;
            };

            // If you need to remove the existing niceSelect elements
            $('.nice-select').remove();
            $('select').show();
        });

        function deleteSelectedTransactions() {
            var selectedItems = $('input:checkbox[name=chk_list]:checked');

            if (selectedItems.length === 0) {
                alert('삭제할 결제 내역을 선택해주세요.');
                return;
            }

            if (confirm('선택한 ' + selectedItems.length + '개 결제 내역을 삭제하시겠습니까?\n삭제 후에는 복구할 수 없습니다.')) {
                // 선택된 결제 ID, 주문번호, 회원ID 수집
                var selectedIds = [];
                var selectedOrderNos = [];
                var selectedMemberIds = [];

                selectedItems.each(function() {
                    var pid = $(this).val();
                    var memberid = $(this).data('memberid');
                    var row = $(this).closest('tr');
                    var orderNoCell = row.find('td:eq(3)');
                    var orderNo = orderNoCell.clone().children('i').remove().end().text().trim();

                    selectedIds.push(pid);
                    selectedOrderNos.push(orderNo);
                    selectedMemberIds.push(memberid);
                });

                // 폼 데이터 설정 및 제출
                var form = document.frmContentsHidden;
                form.p_ids.value = selectedIds.join(',');
                form.p_ordernos.value = selectedOrderNos.join(',');
                form.memberids.value = selectedMemberIds.join(',');
                form.submit();
            }
        }

        function setDateRange(period, type) {
            var today = new Date();
            var end_date = today.getFullYear() + '-' +
                (('0' + (today.getMonth() + 1)).slice(-2)) + '-' +
                (('0' + today.getDate()).slice(-2));

            var start_date = '';

            if (period === 'all') {
                start_date = '';
                end_date = '';
            } else if (period === '1month') {
                var oneMonthAgo = new Date();
                oneMonthAgo.setMonth(oneMonthAgo.getMonth() - 1);
                start_date = oneMonthAgo.getFullYear() + '-' +
                    (('0' + (oneMonthAgo.getMonth() + 1)).slice(-2)) + '-' +
                    (('0' + oneMonthAgo.getDate()).slice(-2));
            } else if (period === '3month') {
                var threeMonthsAgo = new Date();
                threeMonthsAgo.setMonth(threeMonthsAgo.getMonth() - 3);
                start_date = threeMonthsAgo.getFullYear() + '-' +
                    (('0' + (threeMonthsAgo.getMonth() + 1)).slice(-2)) + '-' +
                    (('0' + threeMonthsAgo.getDate()).slice(-2));
            } else if (period === '6month') {
                var sixMonthsAgo = new Date();
                sixMonthsAgo.setMonth(sixMonthsAgo.getMonth() - 6);
                start_date = sixMonthsAgo.getFullYear() + '-' +
                    (('0' + (sixMonthsAgo.getMonth() + 1)).slice(-2)) + '-' +
                    (('0' + sixMonthsAgo.getDate()).slice(-2));
            }

            // 타입에 따라 다른 입력 필드 업데이트
            if (type === 'payment') {
                // 결제일
                document.getElementById('tsdate').value = start_date;
                document.getElementById('tedate').value = end_date;
            } else if (type === 'paid') {
                // 납부일
                document.getElementById('psdate').value = start_date;
                document.getElementById('pedate').value = end_date;
            }

        }

        function OpenApplyView(mode, memberid, id) {
            var requestUrl = "/backoffice/module/member/pop_transaction.php?memberid=" + memberid + "&t_orderno=" + id ;
            requestUrl += "&mode=" + mode;

            Fancybox.show([
                {
                    src: requestUrl,
                    type: "iframe",
                    preload: false,
                    width: 1100,
                    height: 700,
                    afterClose: function() {
                        location.reload(); // 팝업 닫힐 때 페이지 새로고침
                    }
                },
            ]);
        }

        // 선택 삭제시 singleSelect=true 값 변경 false
        function getSelectionMemeber(selectedValue) {
            var ss = "0";
            var rows = $('input:checkbox[name=chk_list]:checked');

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                ss += "," + row.value;
            }

            if (rows.length > 0) {
                memberLevel(ss, selectedValue);
            } else {
                alert('선택된 항목이 없습니다.');
            }
        }

        function boardDel(val){
            if(confirm("탈퇴 처리 하시겠습니까?")) {
                $.post("/backoffice/module/member/ajax_member_del.php", {g_idx: val },
                    function(data){
                        //alert(data);
                        location.reload();
                    });
            }
        }

        function memberLevel(idx, lval){
            if(confirm("수정 하시겠습니까?")) {
                $.post("/backoffice/module/member/ajax_member_level.php", {
                        g_idx: idx,
                        levelval: lval,
                        child_violation: $('#child_violation').val(),
                        child_category: lval,
                        child_violation_wdate: $('#child_violation_wdate').text(),
                        child_violation_start_date: $('#child_violation_start_date').val(),
                        child_violation_end_date: $('#child_violation_end_date').val()
                    },
                    function(data){
                        //alert(data);
                        location.reload();
                    });
            }
        }

        function delMember(id, orderno){
            var cfm;
            cfm =false;
            cfm = confirm(" 이 회원을 삭제 하시겠습니까?\n\n삭제시 복구 불가능합니다.");
            if(cfm==true){
                document.frmContentsHidden.memberid.value = id;
                document.frmContentsHidden.t_orderno.value = orderno;
                document.frmContentsHidden.submit();
            }
        }
        // 선택 삭제시 singleSelect=true 값 변경 false
        function getSelections(action) {
            var ss = "0";
            var rows = $('input:checkbox[name=chk_list]:checked');

            // Collect selected IDs
            for(var i=0; i<rows.length; i++){
                var row = rows[i];
                ss += "," + row.value;
            }

            if(rows.length > 0){
                switch(action) {
                    case 'delete':
                        boardDel(ss);
                        break;
                    case 'sms':
                        sendSMS(rows);
                        break;
                    case 'email':
                        sendEmail(rows);
                        break;
                    default:
                        alert('올바른 작업을 선택해주세요.');
                        break;
                }
            } else {
                alert('선택된 항목이 없습니다.');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.container').style.display = 'block';
        });

        //<![CDATA[
        $(document).ready(function(){
//달력
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                showMonthAfterYear:true,
                showOn: "both",
                buttonImage: "/images/icon_month.gif",
                buttonImageOnly: true,
                changeYear: true,
                changeMonth: true,
                yearRange: 'c-100:c+10',

                yearSuffix: "년 ",
                monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
                dayNamesMin: ['일','월','화','수','목','금','토']
            });
//체크박스
            var $allCheck = $('#allCheck');
            $allCheck.change(function () {
                var $this = $(this);
                var checked = $this.prop('checked');
                $('input[name="chk_list"]').prop('checked', checked);
            });
            var boxes = $('input[name="chk_list"]');
            boxes.change(function () {
                var boxLength = boxes.length;
                var checkedLength = $('input[name="chk_list"]:checked').length;
                var selectallCheck = (boxLength == checkedLength);
                $allCheck.prop('checked', selectallCheck);
            });
        });
        //]]>
	</script>
<?php include("pub/inc/footer.php") ?>