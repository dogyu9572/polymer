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
$departmentCategoryOptions = getPolyCategoryOption("부문위원회");
$branchCategoryOptions = getPolyCategoryOption("지부");
$memberOfficer = getPolyMemberOfficer(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]), "'and o_group = '펠로우회원'");

//SetDisConn($dblink);
//DB해제

?>
    <div class="container">
        <div class="title">추가 정보</div>
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
                    <div>직장 정보 <i>*</i></div>
                </div>
                <table>
                    <colgroup>
                        <col width="150">
                        <col width="*">
                        <col width="150">
                        <col width="*">
                    </colgroup>
                    <tr>
                        <th>부문 위원회</th>
                        <td colspan="3">
                            <div class="inputs">
                                <label class="check"><input type="checkbox" name="divcode[]" value="분자전지부문위원회" <?=strpos($arrInfo["list"][0]["divcode"], "분자전지부문위원회") !== false ? "checked" : ""?>><i></i>분자전지부문위원회</label>
                                <label class="check"><input type="checkbox" name="divcode[]" value="의료용고분자 부문위원회" <?=strpos($arrInfo["list"][0]["divcode"], "의료용고분자 부문위원회") !== false ? "checked" : ""?>><i></i>의료용고분자 부문위원회</label>
                                <label class="check"><input type="checkbox" name="divcode[]" value="콜로이드 및 분자조립 부문위원회" <?=strpos($arrInfo["list"][0]["divcode"], "콜로이드 및 분자조립 부문위원회") !== false ? "checked" : ""?>><i></i>콜로이드 및 분자조립 부문위원회</label>
                                <label class="check"><input type="checkbox" name="divcode[]" value="에코소재 부문위원회" <?=strpos($arrInfo["list"][0]["divcode"], "에코소재 부문위원회") !== false ? "checked" : ""?>><i></i>에코소재 부문위원회</label>
                                <label class="check"><input type="checkbox" name="divcode[]" value="에너지 부문위원회" <?=strpos($arrInfo["list"][0]["divcode"], "에너지 부문위원회") !== false ? "checked" : ""?>><i></i>에너지 부문위원회</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>지부</th>
                        <td colspan="3">
                            <div class="inputs">
                                <select name="BrnCode">
                                    <option value="">선택</option>
                                    <?php foreach($branchCategoryOptions as $code => $name): ?>
                                        <option value="<?=$code?>" <?=$code==$arrInfo["list"][0]["BrnCode"]?" selected":""?>><?=$name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>학회입회일</th>
                        <td colspan="3"><div class="inputs"><input type="text" class="w3 datepicker" name="inserted" value="<?=$arrInfo["list"][0]['inserted']?>" maxlength="20"></td></div>
                    </tr>
                    <tr>
                        <th>정보수정일</th>
                        <td colspan="3"><div class="inputs"><input type="text" class="w3 datepicker" name="updated" value="<?=$arrInfo["list"][0]['updated']?>" maxlength="20"></td></div>
                        </td>
                    </tr>
                    <tr>
                        <th>저널구독</th>
                        <td>
                            <div class="inputs">
                                <label class="radio"><input type="radio" name="subscription" value="1" <?=$arrInfo["list"][0]["subscription"]=="1"?"checked":""?>><i></i>구독</label>
                                <label class="radio"><input type="radio" name="subscription" value="0" <?=$arrInfo["list"][0]["subscription"]!="1"?"checked":""?>><i></i>비구독</label>
                            </div>
                        </td>
                        <th>연락 가능 여부</th>
                        <td>
                            <div class="inputs">
                                <label class="radio"><input type="radio" name="contactable" value="1" <?=$arrInfo["list"][0]["contactable"]=="1"?"checked":""?>><i></i>연락 가능</label>
                                <label class="radio"><input type="radio" name="contactable" value="0" <?=$arrInfo["list"][0]["contactable"]!="1"?"checked":""?>><i></i>연락 불가</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Form. No</th>
                        <td><div class="inputs"><input type="text" class="w4" name="formno" maxlength="50" value="<?=$arrInfo["list"][0]["formno"]?>"></div></td>
                        <th>구 일련번호</th>
                        <td><div class="inputs"><input type="text" class="w4" name="custom5" maxlength="50" value="<?=$arrInfo["list"][0]["custom5"]?>"></div></td>
                    </tr>
                    <tr>
                        <th>회원동정 이메일 수신</th>
                        <td>
                            <div class="inputs">
                                <label class="radio"><input type="radio" name="custom4" value="1" <?=$arrInfo["list"][0]["custom4"]=="1"?"checked":""?> onclick="syncEmailOption(this)"><i></i>수신</label>
                                <label class="radio"><input type="radio" name="custom4" value="" <?=$arrInfo["list"][0]["custom4"]!="1"?"checked":""?> onclick="syncEmailOption(this)"><i></i>비수신</label>
                            </div>
                        </td>
                        <th>이메일 수신 여부</th>
                        <td>
                            <div class="inputs">
                                <label class="radio"><input type="radio" name="custom4_sync" value="1" <?=$arrInfo["list"][0]["custom4"]=="1"?"checked":""?> onclick="syncEmailOption(this)"><i></i>수신</label>
                                <label class="radio"><input type="radio" name="custom4_sync" value="" <?=$arrInfo["list"][0]["custom4"]!="1"?"checked":""?> onclick="syncEmailOption(this)"><i></i>비수신</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>원로 회원</th>
                        <td>
                            <div class="inputs">
                                <label class="radio"><input type="radio" name="infolevel" value="1" <?=$arrInfo["list"][0]["infolevel"]=="1"?"checked":""?>><i></i>원로 회원</label>
                                <label class="radio"><input type="radio" name="infolevel" value="" <?=$arrInfo["list"][0]["infolevel"]!="1"?"checked":""?>><i></i>원로 아님</label>
                            </div>
                        </td>
                        <th>펠로우 회원</th>
                        <td>
                            <div class="inputs">
                                <label class="radio"><input type="radio" name="member_officer" value="1" <?=$memberOfficer["total"]=="1"?"checked":""?>><i></i>펠로우 회원</label>
                                <label class="radio"><input type="radio" name="member_officer" value="" <?=$memberOfficer["total"]!="1"?"checked":""?>><i></i>펠로우 회원 아님</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>수석부회장선거</th>
                        <td colspan="3"><div class="inputs"><input type="text" class="w4" name="custom1" maxlength="50" value="<?=$arrInfo["list"][0]["custom1"]?>"></div></td>
                    </tr>
                    <tr>
                        <th>평의원선거</th>
                        <td colspan="3"><div class="inputs"><input type="text" class="w4" name="custom2" maxlength="50" value="<?=$arrInfo["list"][0]["custom2"]?>"></div></td>
                    </tr>

                </table>
                <div class="btns">
                    <a href="/backoffice/module/member/member.php" class="btn btn_list">목록보기</a>
                    <button class="btn btn_save" type="submit">저장</button>
                </div>
            </form>
        </div> <!-- //inbox -->
    </div>
    <script language="javascript">
        $(window).load(function(){
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
//파일선택
            $(".searchfile").on('change',function(){
                val = $(this).val().split("\\");
                f_name = val[val.length-1];
                s_name = f_name.substring(f_name.length-4, f_name.length);
                $(this).parent().siblings('.filebox').html(f_name);
            });
        });

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

        function syncEmailOption(elem) {
            var value = elem.value;
            var name = elem.name;

            if(name == 'custom4') {
                document.querySelector('input[name="custom4_sync"][value="' + value + '"]').checked = true;
            } else if(name == 'custom4_sync') {
                document.querySelector('input[name="custom4"][value="' + value + '"]').checked = true;
            }
        }
        //]]>
    </script>

<?php
######################################################## 디자인 ED
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/footer.php";
?>