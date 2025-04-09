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

$arrGroupCategory = getPolyCategoryOption("학회임원");
$arrMemberOfficerList = listPolyMemberOfficer("", "", $scale, $_REQUEST['offset']);
$chDate = date('Y-m-d H:i:s',strtotime(date("Y-m-d")."-30 day"));   // 한달

// DB해제
//SetDisConn ( $dblink );
?>

    <div class="container">
        <div class="title">비회원</div>
        <form name="frmSort" method="get" action="executive.php">
            <div class="inbox top_search">
                <dl>
                    <dt>정렬조건1</dt>
                    <dd>
                        <select name="orderby1" class="text"  style="width:120px;">
                            <option value="">전체</option>
                            <?php foreach ($arrSortFeld as $sortno => $sortname): ?>
                                <option value="<?= $sortno ?>" <?= $_GET['orderby1'] == $sortno ? "selected" : "" ?>><?= $sortname ?></option>
                            <?php endforeach; ?>
                        </select>
                    </dd>
                    </dd>
                </dl>
                <dl>
                    <dt>정렬조건2</dt>
                    <dd id="cat_01">
                        <select name="orderby2" class="text"  style="width:120px;">
                            <option value="">전체</option>
                            <?php foreach ($arrSortFeld as $sortno => $sortname): ?>
                                <option value="<?= $sortno ?>" <?= $_GET['orderby2'] == $sortno ? "selected" : "" ?>><?= $sortname ?></option>
                            <?php endforeach; ?>
                        </select>
                    </dd>
                </dl>
                <dl class="search_wrap">
                    <dt>구분</dt>
                    <dd id="cat_02">
                        <select name="o_group">
                            <option value="">선택</option>
                            <?php foreach($arrGroupCategory as $code => $name): ?>
                                <option value="<?=$name?>" <?=$name==$_GET["o_group"]?" selected":""?>><?=$name?></option>
                            <?php endforeach; ?>
                        </select>
                    </dd>
                </dl>
                <dl class="search_wrap">
                    <dt>직책</dt>
                    <dd>
                        <input type="text"  name="o_role" value="<?=$_GET['o_role']?>" />
                    </dd>
                </dl>
                <dl class="search_wrap">
                    <dt>이름</dt>
                    <dd>
                        <input type="text"  name="o_name" value="<?=$_GET['o_name']?>" />
                    </dd>
                </dl>
                <dl class="search_wrap">
                    <dt>소속</dt>
                    <dd>
                        <input type="text"  name="o_affiliation" value="<?=$_GET['o_affiliation']?>" />
                    </dd>
                </dl>
                <dl class="w2">
                    <dt>임기</dt>
                    <dd>
                        <input type="text" class="datepicker" name="s_date" value="<?=$_REQUEST['s_date']?>" id="s_date" />
                        <em>~</em>
                        <input type="text" class="datepicker" name="e_date" value="<?=$_REQUEST['e_date']?>" id="e_date" />
                        <div class="date_btns">
                            <button type="button" class="btn date_btn" onclick="setDateRange('lifetime')">종신</button>
                            <?php
                            $currentYear = date('Y'); // 현재 연도
                            for($i = 0; $i < 5; $i++) {
                                $year = $currentYear - $i;
                                echo '<button type="button" class="btn date_btn" onclick="setDateRange(\'year'.$year.'\')">'.$year.'년</button>';
                            }
                            ?>
                        </div>
                    </dd>
                </dl>
                <dl class="search_wrap">
                    <dt></dt>
                    <dd>
                        <button type="button" class="search" onclick="document.frmSort.submit()">검색</button>
                    </dd>
                </dl>
            </div>
            <div class="inbox">
                <div class="bdr_top">
                    <div class="left">
                        <div class="total">Total : <strong><?=number_format($arrMemberOfficerList["total"])?></strong></div>
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
                        <col class="w4p">
                        <col class="w20p">
                        <col class="w20p">
                        <col class="w20p">
                        <col class="w20p">
                        <col class="w12p">
                        <col class="w12p">
                    </colgroup>
                    <thead>
                    <tr>
                        <th><label class="check notxt"><input type="checkbox" name="" id="allCheck"><i></i></label></th>
                        <th class="pc_vw">No.</th>
                        <th class="pc_vw">구분</th>
                        <th class="pc_vw">직책</th>
                        <th class="pc_vw">이름</th>
                        <th class="pc_vw">소속</th>
                        <th class="pc_vw">임기</th>
                        <th class="pc_vw">관리</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?
                    if($arrMemberOfficerList['list']['total'] > 0){
                        for ($i=0;$i<$arrMemberOfficerList['list']['total'];$i++){
                            ?>
                            <tr>
                                <td class="chkbox"><label class="check notxt"><input type="checkbox" value="<?=$arrMemberOfficerList["list"][$i]['idx']?>" name="chk_list"><i></i></label></td>
                                <td><i class="mo_vw">No.</i><?=number_format($arrMemberOfficerList['total']-$i-$_REQUEST['offset'])?></td>
                                <td><i class="mo_vw">구분</i><?=$arrMemberOfficerList['list'][$i]['o_group']?></td>
                                <td><i class="mo_vw">직책</i><?=$arrMemberOfficerList['list'][$i]['o_role']?></td>
                                <td><i class="mo_vw">이름</i><?=$arrMemberOfficerList['list'][$i]['o_name']?></td>
                                <td><i class="mo_vw">소속</i><?=$arrMemberOfficerList['list'][$i]['o_affiliation']?></td>
                                <td><i class="mo_vw">임기</i><?=date('Y-m-d', strtotime($arrMemberOfficerList['list'][$i]['o_dutyfrom']))?> ~ <?=$arrMemberOfficerList['list'][$i]['o_dutyto'] == '9999-12-31' ? '종신' : date('Y-m-d', strtotime($arrMemberOfficerList['list'][$i]['o_dutyto']))?></td>
                                <td class="mono_btm"><i class="mo_vw">관리</i>
                                    <div class="btns">
                                        <a href="javascript:void(0);" onclick="OpenApplyView('edit', <?=$arrMemberOfficerList["list"][0]['o_mid']?>, <?=$arrMemberOfficerList["list"][$i]['o_id']?>)" class="btn perf">수정</a>
                                    </div>
                                </td>
                            </tr>
                            <?
                        }
                    }else{
                        ?>
                        <tr height="100">
                            <td colspan="7">등록된 데이터가 없습니다.</td>
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
                echo pageNavigationBackoffice($arrMemberOfficerList["total"],$scale,10,$_GET['offset'],$reQueryString);
                ############### paging ############### ED
                ?>
            </div>
        </div>
    </div>
    <form name="frmContentsHidden" method="post" action="member_evn.php">
        <input type="hidden" name="evnMode" value="delete">
        <input type="hidden" name="memberid">
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
        function setDateRange(period) {
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
            } else if (period === 'lifetime') {
                // 종신 설정 - 9999-12-31로 설정
                start_date = '';
                end_date = '9999-12-31';
            } else if (period.startsWith('year')) {
                // 특정 연도 설정
                var year = period.substring(4);
                start_date = year + '-01-01';
                end_date = year + '-12-31';
            }

            document.getElementById('s_date').value = start_date;
            document.getElementById('e_date').value = end_date;
        }

        function OpenApplyView(mode, memberid, id) {
            var requestUrl = "/backoffice/module/member/pop_executive.php?memberid=" + memberid + "&o_id=" + id ;
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

        function delMember(id){
            var cfm;
            cfm =false;
            cfm = confirm(" 이 회원을 삭제 하시겠습니까?\n\n삭제시 복구 불가능합니다.");
            if(cfm==true){
                document.frmContentsHidden.memberid.value = id;
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