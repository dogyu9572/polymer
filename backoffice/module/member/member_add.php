<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/admin_top.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/module/admin/menu.php";

include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/account.lib.php";
if(!in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getUserInfo(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["loginid"]));
$arrCodeCategory = getPolyCategoryOption("회원구분");
//DB해제
SetDisConn($dblink);

$todate = date("YmdHis");	// 현재일
$loginid = "member_".sha1($todate);

?>
<script language="javascript">
    function checkForm(frm){

        // 아이디 검증
        if (frm.loginid.value.trim().length < 4){
            alert("아이디는 4자 이상 입력해 주세요.");
            frm.loginid.focus();
            return false;
        }

        // 아이디 중복 확인 검증
        if (frm.dupcheck.value != frm.loginid.value){
            alert("아이디 중복확인을 해주세요.");
            return false;
        }

        // 비밀번호 검증
        if (frm.passwd.value == ""){
            alert("비밀번호를 입력해 주세요.");
            frm.passwd.focus();
            return false;
        }

        // 비밀번호 확인 검증
        if (frm.newpasswd.value == ""){
            alert("비밀번호 확인을 입력해 주세요.");
            frm.newpasswd.focus();
            return false;
        }

        // 비밀번호 일치 여부 확인
        if (frm.passwd.value != frm.newpasswd.value){
            alert("비밀번호가 일치하지 않습니다.");
            frm.newpasswd.focus();
            return false;
        }

        // 이름 검증
        if (frm.namek.value.trim().length < 2){
            alert("이름을 입력해 주세요.");
            frm.namek.focus();
            return false;
        }

        // 회원 구분 선택 검증
        if (frm.memcode.value == ""){
            alert("회원 구분을 선택해 주세요.");
            frm.memcode.focus();
            return false;
        }

        return true;
    }

function inNumber(str){
	// 숫자만 입력
	str.value = str.value.replace(/[^0-9]/g,"");	
}
</script>
<div class="container">

	<div class="title">회원 등록</div>
	
	<div class="inbox write_tbl mo_break_write">
		
		<form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkForm(this)">
		<input type="hidden" name="evnMode" value="insert">
        <input type="hidden" name="join_type" value="<?=$arrInfo["list"][0]["join_type"]?$arrInfo["list"][0]["join_type"]:"homepage"?>">
            <input type="hidden" name="dupcheck" value="">
		<input type="hidden" name="rt_url" value="<?=$_REQUEST['listURL']?>">

		<div class="tit">회원정보 <i>*</i></div>
		<table>
            <tr>
                <th>아이디 <i>*</i></th>
                <td><div class="inputs">
                        <input type="text" class="w3" name="loginid" maxlength="100" >
                        <button type="button" onclick="check_id()" class="btn">중복확인</button>
                    </div></td>
            </tr>
            <tr>
                <th>비밀번호</th>
                <td><div class="inputs"><input type="password" class="w4" name="passwd" maxlength="50" value=""></div></td>
            </tr>
            <tr>
                <th>비밀번호확인</th>
                <td><div class="inputs"><input type="password" class="w4" name="newpasswd" maxlength="50" value=""></div></td>
            </tr>
            <tr>
                <th>이름 <i>*</i></th>
                <td><div class="inputs"><input type="text" class="w3" name="namek" maxlength="50" value="<?=$namek?>">
                    </div></td>
            </tr>
            <tr>
                <th>회원 구분 <i>*</i></th>
                <td>
                    <select name="memcode">
                        <option value="">회원구분 선택</option>
                        <?php foreach($arrCodeCategory as $code => $name): ?>
                            <option value="<?=$code?>" <?=$code==$arrInfo["list"][0]["memcode"]?" selected":""?>><?=$name?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
          <!--  <tr>
                <th>연락처<i>*</i></th>
                <td><div class="inputs"><input type="text" class="w3" name="mobile" value="<?php /*=$mobile*/?>" maxlength="20"></td></div>
            </tr>
            <tr>
                <th>생년월일<i>*</i></th>
                <td><div class="inputs"><input type="text" class="w3 datepicker" name="birth" value="<?php /*=$arrInfo["list"][0]['birth']*/?>" maxlength="20"></td></div>
            </tr>
            <tr>
                <th>주소</th>
                <td>
                    <div class="inputs">
                        <input type="text" name="zip" id="zip"  style="display:none;"  value="<?php /*=$arrInfo["list"][0]['zip']*/?>" class="text w1" >
                        <input type="text" name="address" id="address" value="<?php /*=$address*/?>" class="text w3" >  <button type="button" onclick="execDaumPostcode('zip','address','address_ext')" class="btn">우편번호찾기</button>
                        <input type="text" name="address_ext" id="address_ext" value="<?php /*=$address_ext*/?>" class="text w4 mlong">
                    </div>
                </td>
            </tr>-->
        </table>


		<div class="btns">
			<a href="member.php" class="btn btn_list">목록보기</a>
			<button class="btn btn_save" type="submit">저장</button>
		</div>
		</form>
	</div> <!-- //inbox -->
</div>
<script type="text/javascript">
//<![CDATA[
$(window).load(function(){
//파일선택
	$(".searchfile").on('change',function(){
		val = $(this).val().split("\\");
		f_name = val[val.length-1]; 
		s_name = f_name.substring(f_name.length-4, f_name.length);
		$(this).parent().siblings('.filebox').html(f_name);
	});
});
//]]>
</script>
    <script type="text/javascript">
        function check_id(){
            var uid = document.memberForm.loginid.value;

            if(uid.length < 4){
                alert("아이디는 4자 이상 입력해 주세요.");
                document.memberForm.loginid.focus();
                return;
            }

            if(uid == ""){
                alert('아이디를 입력하신후 클릭해 주세요.');
                document.memberForm.loginid.focus();
            } else {
                $.get("/module/member/ajax_check_id.php", {loginid: uid},
                    function(data){
                        if(data == "0"){
                            alert('사용 가능한 아이디입니다.');
                            document.memberForm.dupcheck.value = uid;
                        }else if(data == "1"){
                            alert('이미 사용 중인 아이디입니다. 다른 아이디를 입력해주세요.');
                        }else{
                            alert('오류가 발생하였습니다. 다시 시도해 주세요.');
                        }
                        document.memberForm.loginid.focus();
                    });
            }
        }

        //<![CDATA[
        $(window).load(function(){
//파일선택
            $(".searchfile").on('change',function(){
                val = $(this).val().split("\\");
                f_name = val[val.length-1];
                s_name = f_name.substring(f_name.length-4, f_name.length);
                $(this).parent().siblings('.filebox').html(f_name);
            });
        });
        //]]>
        $(document).ready(function(){
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                showMonthAfterYear:true,
                showOn: "both",
                buttonImage: "../images/ico_cal.svg",
                buttonImageOnly: true,
                changeYear: true,
                changeMonth: true,
                yearRange: 'c-100:c+10',
                yearSuffix: "년 ",
                monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
                dayNamesMin: ['일','월','화','수','목','금','토']
            });
        });
    </script>
<?php
######################################################## 디자인 ED
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/footer.php";
?>