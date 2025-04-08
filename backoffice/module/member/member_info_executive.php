<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/admin_top.php";
include "./menu.php";

include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/account.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/board/board.lib.php";
if(!in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
    jsMsg("권한이 없습니다.");
    jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getUserInfo(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]));
$arrMemberOfficerList = getPolyMemberOfficer(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]),"");

//SetDisConn($dblink);
//DB해제

?>
    <div class="container">
        <div class="title">기타 정보</div>
        <div class="tab_div">
            <div class="tab_menu <?=(!isset($_GET['tab']) || $_GET['tab'] == 'basic')?"on":""?>" onclick="location.href='member_info.php?tab=basic&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">기본 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'work'?"on":""?>" onclick="location.href='member_info_work.php?tab=work&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">직장 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'other'?"on":""?>" onclick="location.href='member_info_other.php?tab=other&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">기타 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'additional'?"on":""?>" onclick="location.href='member_info_additional.php?tab=additional&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">추가 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'executive'?"on":""?>" onclick="location.href='member_info_executive.php?tab=executive&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">임원 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'payment'?"on":""?>" onclick="location.href='member_info_payment.php?tab=payment&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">납부/결제 내역</div>
        </div>
        <div class="inbox write_tbl mo_break_write">

            <form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkForm(this)">
                <input type="hidden" name="evnMode" value="edit">
                <input type="hidden" name="evnSubMode" value="<?=$_GET['tab']?>">
                <input type="hidden" name="memberid" value="<?=$arrInfo["list"][0]['memberid']?>">
                <input type="hidden" name="rt_url" value="<?=$_SERVER['REQUEST_URI']?>">
                <div class="tit">
                    <div>임원 <i>*</i></div>
                </div>
                <table>
                    <tr>
                        <td>
                            <div class="btns" style="height:30px;margin-top:0;margin-bottom:10px; justify-content: left">
                                <a href="javascript:void(0);" class="btn" onclick="OpenApplyView('insert',<?=$arrInfo["list"][0]['memberid']?> )">임원 지정</a>
                            </div>
                            <div class="bdr_list tac" style="width:100%;board:1px">
                                <table>
                                    <colgroup>
                                        <col width="20%">
                                        <col width="30%">
                                        <col width="30%">
                                        <col width="20%">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th style="text-align:center;padding:20px 0;">임원 구분</th>
                                        <th style="text-align:center;padding:20px 0;">직책</th>
                                        <th style="text-align:center;padding:20px 0;">임기</th>
                                        <th style="text-align:center;padding:20px 0;">삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody id="addlist3">
                                    <?
                                    if($arrMemberOfficerList['total'] > 0){
                                        for ($i=0;$i<$arrMemberOfficerList['total'];$i++){
                                            ?>
                                            <tr>
                                                <td><?=$arrMemberOfficerList['list'][$i]['o_group']?>  </td>
                                                <td><?=$arrMemberOfficerList['list'][$i]['o_sub']?> <?=$arrMemberOfficerList['list'][$i]['o_role']?></td>
                                                <td><?=$arrMemberOfficerList['list'][$i]['o_dutyfrom']?> ~ <?=$arrMemberOfficerList['list'][$i]['o_dutyto']?></td>
                                                <td class="mono_btm"><i class="mo_vw">관리</i>
                                                    <div class="btns">
                                                        <a href="javascript:void(0);" onclick="OpenApplyView('edit', <?=$arrMemberOfficerList["list"][0]['o_mid']?>, <?=$arrMemberOfficerList["list"][$i]['o_id']?>)" class="btn perf">수정</a>
                                                        <button type="button" class="btn del" style="line-height:32px;" onclick="delExecutiveMember('<?=$arrMemberOfficerList["list"][$i]['memberid']?>', <?=$arrMemberOfficerList["list"][$i]['o_id']?>);">삭제</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?
                                        }
                                    }else{
                                        ?>
                                        <tr height="100">
                                            <td colspan="4">등록된 데이터가 없습니다.</td>
                                        </tr>
                                    <?}?>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="btns">
                    <a href="/backoffice/module/member/member.php" class="btn btn_list">목록보기</a>
                    <button class="btn btn_save" type="submit">저장</button>
                </div>
            </form>
        </div> <!-- //inbox -->
    </div>
    <form name="frmContentsHidden" method="post" action="member_evn.php">
        <input type="hidden" name="evnMode" value="delete">
        <input type="hidden" name="memberid">
        <input type="hidden" name="returnURL" value="<?=$_SERVER['REQUEST_URI']?>">
    </form>
<?######################################### iframe fancybox ######################################### ST?>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style type="text/css">
        .fancybox__content { padding: 5px 0;border-radius: 4px; }
        .fancybox__slide {padding-bottom:20px;}
        .ui-datepicker { z-index: 9999 !important; }
        .date-picker { width: 100px; text-align: center; }
    </style>
    <script type="text/javascript">
        $(function() {
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd',
                prevText: '이전 달',
                nextText: '다음 달',
                monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                dayNames: ['일', '월', '화', '수', '목', '금', '토'],
                dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
                dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
                showMonthAfterYear: true,
                yearSuffix: '년'
            });
            $(".date-picker").datepicker();
        });

        function delExecutiveMember(memberid, id) {
            if(confirm("정말 삭제하시겠습니까?")) {
                $.ajax({
                    url: "member_evn.php",
                    type: "POST",
                    data: {
                        evnMode: "delete_pop",
                        evnPopMode: "executive",
                        memberid: memberid,
                        o_id: id
                    },
                    success: function(response) {
                        if(response.trim() === "success") {
                            alert("삭제되었습니다.");
                            location.reload();
                        } else {
                            alert("삭제 실패: " + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("오류가 발생했습니다. 다시 시도해 주세요.");
                        console.error(xhr, status, error);
                    }
                });
            }
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

        function fnGoodSelect(stridx, strname){
            if(stridx){ $(".is-close-btn").click(); }

            alert("전공코드 : "+stridx+"\n전공명 : "+strname +"\ninputName : "+inputName);

            // 전공코드 저장
            var msds = $("input[name='"+inputName+"']").val();
            if(msds){
                $("input[name='"+inputName+"']").val(msds+","+stridx);
            }else{
                $("input[name='"+inputName+"']").val(stridx);
            }

            // 전공명도 함께 저장 (hidden input 필요)
            var names = $("input[name='"+inputName+"_names']").val();
            if(names){
                $("input[name='"+inputName+"_names']").val(names+","+strname);
            }else{
                $("input[name='"+inputName+"_names']").val(strname);
            }

            fnGoodPrint(inputName);
        }

        function fnGoodPrint(inputName, orderby){
            var msds = $("input[name='"+inputName+"']").val();
            var names = $("input[name='"+inputName+"_names']").val();
            var listName = "#addlist1";

            if(msds<1){
                $(listName).html('<tr><td colspan="7" style="text-align:center;padding:14px 0;">등록된 데이터가 없습니다.</td></tr>');
            }else{
                $.post("/module/board/ajax_add_boardlist.php",
                    {
                        bid: 'cdgood',
                        idx: msds,
                        names: names,
                        fname: inputName,
                        orderby: orderby
                    },
                    function(data){
                        if(data){
                            $(listName).html(data);
                        }else{
                            alert("실패.");
                        }
                    }
                );
            }
        }

        function fnAddDel(stridx, inputName){
            var msds = $("input[name='"+inputName+"']").val();
            var arrMsds = msds.split(',');
            var reArrMsds = "";
            var comma = "";
            for(var i=0; i<arrMsds.length;i++){
                if(arrMsds[i]!=stridx){
                    reArrMsds += comma+arrMsds[i]
                    comma = ",";
                }
            }
            $("input[name='"+inputName+"']").val(reArrMsds);
            fnGoodPrint(inputName);
        }
        //-->
    </script>
<?######################################### iframe fancybox ######################################### ED?>
    <script language="javascript">

        function checkForm(frm){
            if (frm.user_name.value.length < 2){
                alert("이름을 입력해 주세요.");
                frm.user_name.focus();
                return false;
            }
            if (frm.mobile.value.length < 1){
                alert("휴대번호를 입력해 주세요.");
                frm.mobile.focus();
                return false;
            }
        }
        //]]>
    </script>

<?php
######################################################## 디자인 ED
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/footer.php";
?>