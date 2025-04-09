<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/admin_top.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/module/admin/menu.php";

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
$arrCodeCategory = getPolyCategoryOption("직종");

//SetDisConn($dblink);
//DB해제

?>
    <div class="container">
        <div class="title">직장 정보</div>
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
                        <th>소속/부서/직위</th>
                        <td>
                            <div class="inputs">
                                <input type="text" class="w4" name="affiliation" maxlength="50" value="<?=$arrInfo["list"][0]["affiliation"]?>">
                            </div>
                        </td>
                        <th>영문 소속<br><em style="color: red;">(* 기존 데이터 저장용)</em></th>
                        <td> <div class="inputs"><input type="text" class="w4" name="affiliatione" maxlength="50" value="<?=$arrInfo["list"][0]["affiliatione"]?>"></div></td>
                    </tr>
                    <tr>
                        <th>직종</th>
                        <td>
                            <select name="jobcode">
                                <option value="">선택</option>
                                <?php foreach($arrCodeCategory as $code => $name): ?>
                                    <option value="<?=$code?>" <?=$code==$arrInfo["list"][0]["jobcode"]?" selected":""?>><?=$name?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <th>소속부서</th>
                        <td><div class="inputs"><input type="text" class="w4" name="department" maxlength="50" value="<?=$arrInfo["list"][0]["department"]?>"></div></td>
                    </tr>
                    <tr>
                        <th>직위</th>
                        <td colspan="3">
                            <div class="inputs"><input type="text" class="w4" name="pos" maxlength="50" value="<?=$arrInfo["list"][0]["pos"]?>"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>직장 전화</th>
                        <td><div class="inputs"><input type="text" class="w4" name="aphone" maxlength="50" value="<?=$arrInfo["list"][0]["aphone"]?>"></div></td>
                        <th>FAX</em></th>
                        <td><div class="inputs"><input type="text" class="w4" name="fax" maxlength="50" value="<?=$arrInfo["list"][0]["fax"]?>"></div></td>
                    </tr>
                    <tr>
                        <th>직장주소</th>
                        <td colspan="3">
                            <div class="inputs">
                                <div style="display: flex; gap: 5px; width: 100%;">
                                    <input type="text" name="azonecode" id="azonecode" value="<?=$arrInfo["list"][0]['azonecode']?>" class="text w1" >
                                    <button type="button" onclick="execDaumPostcode('azonecode','aaddress1','aaddress2')" class="btn">우편번호찾기</button>
                                </div>
                                <div style="width: 100%;">
                                    <input type="text" name="aaddress1" id="aaddress1" value="<?=$arrInfo["list"][0]['aaddress1']?>" class="text w4" >
                                </div>
                                <div style="width: 100%;">
                                    <input type="text" name="aaddress2" id="aaddress2" value="<?=$arrInfo["list"][0]['aaddress2']?>" class="text w4">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>우편물 운송처</th>
                        <td colspan="3">
                            <div class="inputs">
                                <label class="radio"><input type="radio" name="postal" value="A" <?=$arrInfo["list"][0]["postal"]=="A"?"checked":""?>><i></i>직장 주소</label>
                                <label class="radio"><input type="radio" name="postal" value="H" <?=$arrInfo["list"][0]["postal"]=="H"?"checked":""?>><i></i>자택 주소</label>
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
    <script src='https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js'></script>
    <script type="text/javascript">
        <!--
        function execDaumPostcode(pr_zip, pr_Add1, pr_Add2) {
            new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    var addr = ''; // 주소 변수
                    var extraAddr = ''; // 참고항목 변수

                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        addr = data.roadAddress;
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        addr = data.jibunAddress;
                    }
                    // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                    if(data.userSelectedType === 'R'){
                        // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                        // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                        if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                            extraAddr += data.bname;
                        }
                        // 건물명이 있고, 공동주택일 경우 추가한다.
                        if(data.buildingName !== '' && data.apartment === 'Y'){
                            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                        if(extraAddr !== ''){
                            extraAddr = ' (' + extraAddr + ')';
                        }
                        // 조합된 참고항목을 해당 필드에 넣는다.
//				document.getElementById(pr_Add1).value = extraAddr;

                    }

                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    document.getElementById(pr_zip).value = data.zonecode;
                    document.getElementById(pr_Add1).value = addr + " " + extraAddr;
                    // 커서를 상세주소 필드로 이동한다.
                    document.getElementById(pr_Add2).focus();
                }
            }).open();
        }
        //-->
    </script>
    <script language="javascript">
        function checkForm(frm){
            if(frm.user_pw.value.length > 0){
                if (frm.user_pw.value==""){
                    alert("비밀번호를 입력해 주세요.");
                    frm.user_pw.focus();
                    return false;
                }
                if (frm.user_pw2.value==""){
                    alert("비밀번호 확인을 입력해 주세요.");
                    frm.user_pw2.focus();
                    return false;
                }
                if (frm.user_pw.value != frm.user_pw2.value){
                    alert("비밀번호가 일치하지 않습니다.");
                    frm.user_pw2.focus();
                    return false;
                }
            }
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