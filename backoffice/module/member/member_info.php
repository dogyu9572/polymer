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
$arrLevel = getArticleList($_conf_tbl["member_level"], $scale, $_REQUEST['offset'], "order by level_no desc ");
$arrCodeCategory = getPolyCategoryOption("회원구분");

//SetDisConn($dblink);
//DB해제

?>
    <div class="container">
        <div class="title">회원 기본정보</div>
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
                <input type="hidden" name="evnSubMode" value="info">
                <input type="hidden" name="memberid" value="<?=$arrInfo["list"][0]['memberid']?>">
                <input type="hidden" name="rt_url" value="<?=$_SERVER['REQUEST_URI']?>">

                <div class="tit">
                    <div>회원 기본정보 <i>*</i></div>
                    <div>
                        <button type="button" class="btn">이 회원으로 로그인</button>
                        <button type="button" class="btn">우편라벨 인쇄</button>
                        <button type="button" class="btn">회원정보 변경 내역</button>
                    </div>
                </div>
                <table>
                    <colgroup>
                        <col width="150">
                        <col width="*">
                        <col width="150">
                        <col width="*">
                    </colgroup>
                    <tr>
                        <th>이름(한자)</th>
                        <td><div class="inputs"><input type="text" class="w4" name="namec" maxlength="50" value="<?=$arrInfo["list"][0]["namec"]?>"></div></td>
                        <th>영문 이름</th>
                        <td><div class="inputs"><input type="text" class="w4" name="namee" maxlength="100" value="<?=$arrInfo["list"][0]["namee"]?>"><?php if($arrInfo["list"][0]["email_accept"] == "Y"){?><br/>이메일 수신동의 일자: <?=$arrInfo["list"][0]["email_accept_date"]?><?php } ?></div></td>
                    </tr>
                    <tr>
                        <th>회원구분</th>
                        <td>
                            <select name="memcode">
                                <option value="">회원구분 선택</option>
		                        <?php foreach($arrCodeCategory as $code => $name): ?>
                                    <option value="<?=$code?>" <?=$code==$arrInfo["list"][0]["memcode"]?" selected":""?>><?=$name?></option>
		                        <?php endforeach; ?>
                            </select>
                        </td>
                        <th>회원상태</th>
                        <td>
                            <select name="mstatus">
                                <option value="">선택</option>
			                    <?php foreach($arrMemberGrade as $code => $name): ?>
                                    <option value="<?=$code?>" <?=$code==$arrInfo["list"][0]["mstatus"]?" selected":""?>><?=$name?></option>
			                    <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td><div class="inputs"><em><?=$arrInfo["list"][0]["loginid"]?></em></div></td>
                        <th>비밀번호</th>
                        <td>
                            <div class="flex">
                                <div class="btns" style="justify-content:flex-start; align-items :center; margin:0 !important; padding:0;"><button class="btn btn_save" type="button" onclick="OpenPersonView('edu')" style="margin:0;">임시비밀번호 발송</button></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>주민번호<br><em style="color: red;">(* 기존 데이터 저장용)</em></th>
                        <td><div class="inputs"><em><?=$arrInfo["list"][0]["socnum"]?></em></div></td>
                        <th>생년월일</th>
                        <td><div class="inputs"><em><?=$arrInfo["list"][0]["birthday"]?></em></div></td>
                    </tr>
                    <tr>
                        <th>성별</th>
                        <td colspan="3">
                            <div class="inputs">
                                <label class="radio"><input type="radio" name="gender" value="M" <?=$arrInfo["list"][0]["gender"]=="M"?"checked":""?>><i></i>남자</label>
                                <label class="radio"><input type="radio" name="gender" value="W" <?=$arrInfo["list"][0]["gender"]!="M"?"checked":""?>><i></i>여자</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>비밀번호 질문<br><em style="color: red;">(* 기존 데이터 저장용)</em></th>
                        <td><div class="inputs"><?=$arrInfo["list"][0]["passquestion"]?></div></td>
                        <th>답변</th>
                        <td><div class="inputs"><?=$arrInfo["list"][0]["passanswer"]?></div></td>
                    </tr>
                    <tr>
                        <th>연락처</th>
                        <td><div class="inputs"><input type="text" class="w4" name="hphone" maxlength="50" value="<?=$arrInfo["list"][0]["hphone"]?>"></div></td>
                        <th>휴대전화</th>
                        <td><div class="inputs"><input type="text" class="w4" name="cphone" maxlength="100" value="<?=$arrInfo["list"][0]["cphone"]?>"><?php if($arrInfo["list"][0]["email_accept"] == "Y"){?><br/>이메일 수신동의 일자: <?=$arrInfo["list"][0]["email_accept_date"]?><?php } ?></div></td>
                    </tr>
                    <tr>
                        <th>이메일</th>
                        <td><div class="inputs"><input type="text" class="w4" name="email" maxlength="50" value="<?=$arrInfo["list"][0]["email"]?>"></div></td>
                        <th>홈페이지(기존 데이터만)</th>
                        <td><div class="inputs"><input type="text" class="w4" name="homepage" maxlength="100" value="<?=$arrInfo["list"][0]["homepage"]?>"><?php if($arrInfo["list"][0]["email_accept"] == "Y"){?><br/>이메일 수신동의 일자: <?=$arrInfo["list"][0]["email_accept_date"]?><?php } ?></div></td>
                    </tr>
                    </tr>
                    <tr>
                        <th>국가</th>
                        <td colspan="3">
                            <div class="inputs">
                                <select name="country">
                                    <option value="">선택</option>
		                            <?php foreach($arrCountry as $code => $name): ?>
                                        <option value="<?=$code?>" <?=$code==$arrInfo["list"][0]["country"]?" selected":""?>><?=$name?></option>
		                            <?php endforeach; ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>자택주소</th>
                        <td colspan="3">
                            <div class="inputs">
                                <div style="display: flex; gap: 5px; width: 100%;">
                                    <input type="text" name="hzonecode" id="hzonecode" value="<?=$arrInfo["list"][0]['hzonecode']?>" class="text w1" >
                                    <button type="button" onclick="execDaumPostcode('hzonecode','haddress1','haddress2')" class="btn">우편번호찾기</button>
                                </div>
                                <div style="width: 100%;">
                                    <input type="text" name="haddress1" id="haddress1" value="<?=$arrInfo["list"][0]['haddress1']?>" class="text w4" >
                                </div>
                                <div style="width: 100%;">
                                    <input type="text" name="haddress2" id="haddress2" value="<?=$arrInfo["list"][0]['haddress2']?>" class="text w4">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>비고</th>
                        <td colspan="3">
                            <textarea id="remark" name="remark" cols="100" rows="5"><?=($arrInfo["list"][0]['remark'])?></textarea>
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