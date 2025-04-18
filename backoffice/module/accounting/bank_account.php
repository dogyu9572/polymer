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

$arrAccountBank = getAccountBank();

// DB해제
//SetDisConn ( $dblink );
?>

	<div class="container">
		<div class="title">결제내역</div>
		<form name="frmSort" method="get" action="bank_account.php">
            <div class="inbox top_search">
                <dl>
                    <dt>등록일</dt>
                    <dd>
                        <input type="text" class="datepicker" name="sdate" value="<?=$_REQUEST['sdate']?>" id="sdate" />
                        <em>~</em>
                        <input type="text" class="datepicker" name="edate" value="<?=$_REQUEST['edate']?>" id="edate" />
                        <div class="date_btns">
                            <button type="button" class="btn date_btn" onclick="setDateRange('all', 'paid')">전체</button>
                            <button type="button" class="btn date_btn" onclick="setDateRange('1month', 'paid')">1개월</button>
                            <button type="button" class="btn date_btn" onclick="setDateRange('3month', 'paid')">3개월</button>
                            <button type="button" class="btn date_btn" onclick="setDateRange('6month', 'paid')">6개월</button>
                        </div>
                    </dd>
                </dl>
                <dl class="search_wrap">
                    <dt>사용 여부</dt>
                    <dd>
                        <select name="a_active" class="text" style="width:120px;">
                            <option value="">선택</option>
                            <option value="1" <?=$_GET['a_active']=="1"?" selected='selected'":""?>>사용</option>
                            <option value="0" <?=$_GET['a_active']=="0"?" selected='selected'":""?>>미사용</option>
                        </select>
                    </dd>
                </dl>
                <dl class="search_wrap">
                    <dt>검색어</dt>
                    <dd>
                        <select name="sw" style="width:120px;">
                            <option value='all' <?=$_GET['sw']=="all"?" selected='selected'":""?>>전체</option>
                            <option value='a_accountname' <?=$_GET['sw']=="a_accountname"?" selected='selected'":""?>>계좌명</option>
                            <option value='a_bank' <?=$_GET['sw']=="a_bank"?" selected='selected'":""?>>은행명</option>
                            <option value='a_number' <?=$_GET['sw']=="a_number"?" selected='selected'":""?>>계좌번호</option>
                            <option value='a_holder' <?=$_GET['sw']=="a_holder"?" selected='selected'":""?>>예금주</option>
                        </select>
                        <input type="text" name="sk" value="<?=$_GET['sk']?>" onkeypress="if(event.keyCode == 13){document.frmSort.submit()}" />
                        <button type="button" class="search" onclick="document.frmSort.submit()">검색</button>
                    </dd>
                </dl>
            </div>
			<div class="inbox">
				<div class="bdr_top">
					<div class="left">
						<div class="total">Total : <strong><?=number_format($arrAccountBank["total"])?></strong></div>
						<div class="down">
						</div>
					</div>
					<div class="bdr_right">
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
                        <div class="btns">
                            <a href="bank_account_form.php" class="btn">신규등록</a>
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
						<col class="w16p">
						<col class="w10p">
						<col class="w10p">
						<col class="w12p">
						<col class="w12p">
						<col class="w10p">
						<col class="w10p">
						<col class="w14p">
					</colgroup>
					<thead>
                    <tr>
                        <th><label class="check notxt"><input type="checkbox" name="" id="allCheck"><i></i></label></th>
                        <th class="pc_vw">No.</th>
                        <th class="pc_vw">계좌명</th>
                        <th class="pc_vw">은행명</th>
                        <th class="pc_vw">계좌번호</th>
                        <th class="pc_vw">예금주</th>
                        <th class="pc_vw">결제용도</th>
                        <th class="pc_vw">사용 여부</th>
                        <th class="pc_vw">등록일</th>
                        <th class="pc_vw">관리</th>
                    </tr>
					</thead>
					<tbody>
					<?

					if($arrAccountBank['total'] > 0){
						for ($i=0;$i<$arrAccountBank['total'];$i++){
							?>
                            <tr>
                                <td class="chkbox"><label class="check notxt"><input type="checkbox" value="<?=$arrAccountBank["list"][$i]['a_accountid']?>" name="chk_list"><i></i></label></td>
                                <td><i class="mo_vw">No.</i><?=$arrAccountBank['total']-$i-$_REQUEST['offset']?></td>

                                <td><i class="mo_vw">계좌명</i><?=$arrAccountBank['list'][$i]['a_accountname']?></td>
                                <td><i class="mo_vw">은행명</i><?=$arrAccountBank['list'][$i]['a_bank']?></td>
                                <td><i class="mo_vw">계좌번호</i><?=$arrAccountBank['list'][$i]['a_number']?></td>
                                <td><i class="mo_vw">예금주</i><?=$arrAccountBank['list'][$i]['a_holder']?></td>
                                <td><i class="mo_vw">결제용도</i><?=$arrAccountBank['list'][$i]['a_purpose']?></td>
                                <td><i class="mo_vw">사용 여부</i><?=$arrAccountBank['list'][$i]['a_active'] ? '사용' : '미사용'?></td>
                                <td><i class="mo_vw">등록일</i><?=date('Y-m-d', strtotime($arrAccountBank['list'][$i]['a_inserted']))?></td>
                                <td class="mono_btm"><i class="mo_vw">관리</i>
                                    <div class="btns">
                                        <a href="javascript:void(0);" onclick="OpenApplyView('edit', <?=$arrAccountBank["list"][$i]['a_accountid']?>)" class="btn perf">수정</a>
                                        <button type="button" class="btn del" onclick="delMember(<?=$arrAccountBank["list"][$i]['a_accountid']?>);">삭제</button>
                                    </div>
                                </td>
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
				echo pageNavigationBackoffice($arrAccountBank["total"],$scale,10,$_GET['offset'],$reQueryString);
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
		<input type="hidden" name="evnSubMode" value="transaction">
		<input type="hidden" name="memberid">
		<input type="hidden" name="t_orderno">
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
                alert('삭제할 항목을 선택해주세요.');
                return;
            }

            if (confirm('선택한 ' + selectedItems.length + '개 항목을 삭제하시겠습니까?\n삭제 후에는 복구할 수 없습니다.')) {
                // 선택된 회원 ID와 주문번호 수집
                var selectedIds = [];
                var selectedOrderNos = [];

                selectedItems.each(function() {
                    var row = $(this).closest('tr');
                    var memberId = $(this).val();
                    // 주문번호 셀에서 i 태그를 제외한 실제 값만 가져오기
                    var orderNoCell = row.find('td:eq(2)');
                    var orderNo = orderNoCell.clone().children().remove().end().text().trim();

                    selectedIds.push(memberId);
                    selectedOrderNos.push(orderNo);
                });

                // 폼 데이터 설정 및 제출
                var form = document.frmContentsHidden;
                form.evnMode.value = "delete";
                form.evnSubMode.value = "batch_transaction";
                form.memberid.value = selectedIds.join(',');
                form.t_orderno.value = selectedOrderNos.join(',');
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
            document.getElementById('sdate').value = start_date;
            document.getElementById('edate').value = end_date;

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

	</script>
	<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.container').style.display = 'block';
        });
	</script>
	<script type="text/javascript">
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