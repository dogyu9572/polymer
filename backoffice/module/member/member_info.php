<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/admin_top.php";
include "./menu.php";

include $_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/board/board.lib.php";
if(!in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getUserInfo(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]));
$arrLevel = getArticleList($_conf_tbl["member_level"], $scale, $_REQUEST['offset'], "order by level_no desc ");
$arrCodeCategory = getCategoryOption("회원구분");

//SetDisConn($dblink);
//DB해제

?>
    <div class="container">
        <div class="title">회원 수정</div>
        <div class="tab_div">
            <div class="tab_menu <?=(!isset($_GET['tab']) || $_GET['tab'] == 'basic')?"on":""?>" onclick="location.href='member_info.php?tab=basic&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">기본 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'work'?"on":""?>" onclick="location.href='member_work_info.php?tab=work&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">직장 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'other'?"on":""?>" onclick="location.href='member_other_info.php?tab=other&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">기타 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'additional'?"on":""?>" onclick="location.href='member_additional_info.php?tab=additional&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">추가 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'executive'?"on":""?>" onclick="location.href='member_executive_info.php?tab=executive&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">임원 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'payment'?"on":""?>" onclick="location.href='member_payment_info.php?tab=payment&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">납부/결제 내역</div>
        </div>
        <div class="inbox write_tbl mo_break_write">

            <form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkForm(this)">
                <input type="hidden" name="evnMode" value="edit">
                <input type="hidden" name="memberid" value="<?=$arrInfo["list"][0]['memberid']?>">
                <input type="hidden" name="rt_url" value="<?=$_SERVER['REQUEST_URI']?>">

                <div class="tit">회원정보 <i>*</i></div>
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
                        <th>주민번호(기존 데이터만)</th>
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
                        <th>비밀번호 질문(기존 데이터만)</th>
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
                    <a href="javascript:void(0);" onclick="history.back();" class="btn btn_list">목록보기</a>
                    <button class="btn btn_save" type="submit">저장</button>
                </div>
            </form>
        </div> <!-- //inbox -->
    </div>
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

        function checkAnnualForm(frm){
            if (frm.year.value.length < 1){
                alert("연도를 입력해 주세요.");
                frm.year.focus();
                return false;
            }else if (frm.af_price.value.length < 1){
                alert("금액을 입력해 주세요.");
                frm.af_price.focus();
                return false;
            }else{
                return true;
            }
        }

        function inNumber(str){
            // 숫자만 입력
            str.value = str.value.replace(/[^0-9]/g,"");
        }

        function showcolumn(obj,column){
            if(obj.value == "Y"){
                $("#"+column).show();
            }else{
                $("#"+column).hide();
            }
        }

        function makeJobType(job, job_type = "", job_type_etc = ""){
            $.post("./ajax_job_type.php",{"job":job,"job_type":job_type,"job_type_etc":job_type_etc},function(result){
                $("#job_type_cont").html(result);
            });
        }
        $(document).ready(function(){
//파일선택
            $(".searchfile").on('change',function(){
                val = $(this).val().split("\\");
                f_name = val[val.length-1];
                s_name = f_name.substring(f_name.length-4, f_name.length);
                $(this).parent().siblings('.filebox').html(f_name);
            });

            showcolumn($("#is_doctor")[0],'doctor_license');
            showcolumn($("#is_rdn")[0],'rdn_license');
            makeJobType("<?=$arrInfo["list"][0]["job"]?>","<?=$arrInfo["list"][0]["job_type"]?>","<?=$arrInfo["list"][0]["job_type_etc"]?>");
        });
        //]]>
    </script>
    <style>
        .inner_table th,
        .inner_table td {font-size:12px; height:51px;}
        .inner_table thead th {color:#555; font-weight:700; background:#e3ecf9;line-height: 0; padding: 0;text-align: center;vertical-align: middle;}
        .inner_table tbody td {color:#666; padding:0 10px; border-bottom:#ddd 1px solid; transition:.2s linear;vertical-align: middle;}
        .inner_table tbody td .nice-select {margin:0 auto; float:none;}
        .inner_table tbody td .btns {display: flex; justify-content: center; margin: 0;}
        .inner_table tbody td .btn {width:52px; height:20px; line-height:20px; font-size:12px; color:#fff; text-align:center; background:#2668b4; margin:0 5px; border-radius:3px;}
        .inner_table tbody td .btn:first-child {margin-left:0;}
        .inner_table tbody td .btn:last-child {margin-right:0;}
        .inner_table tbody td .btn:before {content:""; display:inline-block; vertical-align:top; height:20px; background:no-repeat 50% 50% / contain;}
        .inner_table tbody td .btn.del {background:#e1e4eb; color:#555;}
        .inner_table tbody td .btn.perf:before {background-image:url('/backoffice/pub/images/icon_perf.svg'); width:9px; margin-right:4px;}
        .inner_table tbody td .btn.modi:before {background-image:url('/backoffice/pub/images/icon_modi.svg'); width:11px; margin-right:1px;}
        .inner_table tbody td .btn.del:before {background-image:url('/backoffice/pub/images/icon_del.svg'); width:7px; margin-right:7px;}

        .inner_btn {width:52px; height:20px; line-height:20px; font-size:12px; color:#fff; text-align:center; background:#2668b4; margin:0 5px; border-radius:3px;}

        .tab_div {
            display:flex;flex-direction: row;align-items: center;justify-content: flex-start; gap:8px; margin-bottom:15px;
        }
        .tab_div .tab_menu {
            cursor:pointer;display:flex;align-items: center;justify-content: center;width: 150px;border: 1px solid #628dc7;border-radius: 5px;text-align: center;height: 30px;
        }
        .tab_div .tab_menu:hover,
        .tab_div .tab_menu.on {
            background-color:#628dc7;
            color:#ffffff;
        }
        .tab_div .tab_menu.cal {
            background-color: #305587;
            color:#ffffff;
        }
    </style>

<?php
######################################################## 디자인 ED
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/footer.php";
?>