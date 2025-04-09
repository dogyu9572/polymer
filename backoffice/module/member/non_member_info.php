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
        <div class="title">비회원</div>
        <div class="inbox write_tbl mo_break_write">

            <form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkForm(this)">
                <input type="hidden" name="evnMode" value="edit">
                <input type="hidden" name="evnSubMode" value="non_member">
                <input type="hidden" name="memberid" value="<?=$arrInfo["list"][0]['memberid']?>">
                <input type="hidden" name="memcode" value="N">
                <input type="hidden" name="rt_url" value="<?=$_SERVER['REQUEST_URI']?>">

                <div class="tit">
                    <div>비회원 <i>*</i></div>
                </div>
                <table>
                    <tr>
                        <th>이메일 주소 <i>*</i></th>
                        <td><div class="inputs"><?=$arrInfo["list"][0]['email']?></div></td>
                    </tr>
                    <tr>
                        <th>비밀번호 <i>*</i></th>
                        <td><button type="button" onclick="check_id()" class="btn">메일로 발송</button>
                           </td>
                    </tr>
                    <tr>
                        <th>이름 <i>*</i></th>
                        <td><div class="inputs"><input type="text" class="w3" name="namek" maxlength="50" value="<?=$arrInfo["list"][0]['namek']?>">
                            </div></td>
                    </tr>
                    <tr>
                        <th>소속 <i>*</i></th>
                        <td><div class="inputs"><input type="text" class="w3" name="affiliation" maxlength="50" value="<?=$arrInfo["list"][0]['affiliation']?>">
                            </div></td>
                    </tr>
                    <tr>
                        <th>휴대전화 <i>*</i></th>
                        <td><div class="inputs"><input type="text" class="w3" name="cphone" maxlength="50" value="<?=$arrInfo["list"][0]['cphone']?>">
                            </div></td>
                    </tr>
                    <tr>
                        <th>개인정보처리방침 <i>*</i></th>
                        <td>
                            <div class="inputs">
                                <label><input type="radio" name="privacy_agree" value="Y" checked disabled> 동의</label>
                                <label><input type="radio" name="privacy_agree" value="N" disabled> 미동의</label>
                                <input type="hidden" name="privacy_agree" value="Y">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>SNS 게재 활용  <i>*</i></th>
                        <td>
                            <div class="inputs">
                                <label><input type="radio" name="privacy_agree2" value="Y" checked disabled> 동의</label>
                                <label><input type="radio" name="privacy_agree2" value="N" disabled> 미동의</label>
                                <input type="hidden" name="privacy_agree" value="Y">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>등록일 <i>*</i></th>
                        <td><div class="inputs"><input type="text" class="w3 datepicker" name="inserted" maxlength="50" value="<?=$arrInfo["list"][0]['inserted']?>">
                            </div></td>
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
        });
        //]]>
    </script>
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