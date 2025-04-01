<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/admin_top.php";
include "./menu.php";

include $_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
if(!in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getUserInfo(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["user_id"]));
$arrLevel = getArticleList($_conf_tbl["member_level"], $scale, $_REQUEST['offset'], "order by level_no desc ");

//DB해제
SetDisConn($dblink);

?>
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

	</script>
	<script type="text/javascript">
        //<![CDATA[
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
$arrCategory = array(
	"A" => "교육",
	"B" => "장비",
	"C" => "공간",
	"D" => "체험",
	"E" => "상영회"
);
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
				<input type="hidden" name="user_id" value="<?=$arrInfo["list"][0]['user_id']?>">
				<input type="hidden" name="rt_url" value="<?=$_REQUEST['listURL']?>">

				<div class="tit">회원정보 <i>*</i></div>
				<table>
					<colgroup>
						<col width="150">
						<col width="*">
						<col width="150">
						<col width="*">
					</colgroup>
					<tr>
						<th>회원등급</th>
						<td>
							<select name="user_level">
								<option value="">등급선택</option>
								<?for ($i=0;$i<$arrLevel['total'];$i++) {?>
									<option value="<?=$arrLevel['list'][$i]['level_no']?>"<?=$arrLevel['list'][$i]['level_no']==$arrInfo["list"][0]["user_level"]?" selected":""?>><?=$arrLevel['list'][$i]['level_name']?></option>
								<?}?>
							</select>
							회원등급 변경일 : <?=date("Y-m-d",strtotime($arrInfo["list"][0]["user_level_change_date"]))?>
						</td>
						<th>이메일</th>
						<td><div class="inputs"><input type="text" class="w4" name="email" maxlength="100" value="<?=$arrInfo["list"][0]["email"]?>"><?php if($arrInfo["list"][0]["email_accept"] == "Y"){?><br/>이메일 수신동의 일자: <?=$arrInfo["list"][0]["email_accept_date"]?><?php } ?></div></td>
					</tr>
					<tr>
						<th>이름</th>
						<td><div class="inputs"><input type="text" class="w4" name="user_name" maxlength="50" value="<?=$arrInfo["list"][0]["user_name"]?>"></div></td>
						<th>직종</th>
						<td>
							<div class="inputs">
								<?php
								$arrData = array(
									"basic" => "기초",
									"doctor" => "의사",
									"nutrit" => "영양",
									"etc" => "기타"
								);

								foreach($arrData as $key => $val){
									?>
									<label class="radio"><input type="radio" name="job" value="<?=$key?>" onchange="makeJobType(this.value)" <?=$arrInfo["list"][0]["job"]==$key?"checked":""?>><i></i><?=$val?></label>
									<?php if($key == "etc"){ ?>
										<!-- <input type="text" class="w3" name="etc_4" maxlength="50" value="<?=$arrInfo["list"][0]["etc_4"]?>"> -->
									<?php } ?>
									<?php
								}
								?>
							</div>

							<div id="job_type_cont" class="inputs job_type">

							</div>

							<div class="inputs">
								<?php
								$arrData = array();
								$arrData = array('1'=>'전문의/일반의','2'=>'전공의/수련의');

								foreach($arrData as $key => $val){
									?>
									<label class="radio"><input type="radio" name="job_doctor_type" value="<?=$key?>" <?=$arrInfo["list"][0]["job_doctor_type"]==$key?"checked":""?>><i></i><?=$val?></label>
									<?php
								}
								?>

							</div>
						</td>
					</tr>
					<tr>
						<th>이름(영문)</th>
						<td><div class="inputs"><input type="text" class="w3" name="nick_name" maxlength="50" value="<?=$arrInfo["list"][0]["nick_name"]?>"> <input type="text" class="w3" name="user_name_eng" maxlength="50" value="<?=$arrInfo["list"][0]["user_name_eng"]?>"></div></td>
						<th>출신학교</th>
						<td><div class="inputs"><input type="text" class="w4" name="etc_3" maxlength="100" value="<?=$arrInfo["list"][0]["etc_3"]?>"></div></td>
					</tr>
					<tr>
						<th>ID(아이디)</th>
						<td><div class="inputs"><em><?=$arrInfo["list"][0]["user_id"]?></em></div></td>
						<th>대학 입학년도</th>
						<td><div class="inputs"><input type="text" class="w2" name="etc_1" maxlength="200" value="<?=$arrInfo["list"][0]["etc_1"]?>"></div></td>
					</tr>
					<tr>
						<th>비밀번호</th>
						<td><div class="inputs"><input type="password" class="w4" name="user_pw" maxlength="50" value=""></div></td>
						<th>대학 졸업년도</th>
						<td><div class="inputs"><input type="text" class="w2" name="etc_2" maxlength="200" value="<?=$arrInfo["list"][0]["etc_2"]?>"></div></td>
					</tr>
					<tr>
						<th>휴대폰 번호</th>
						<td><div class="inputs"><input type="text" class="w4" name="mobile" maxlength="20" value="<?=$arrInfo["list"][0]["mobile"]?>"><?php if($arrInfo["list"][0]["sms_accept"] == "Y"){?><br/>SMS 수신동의 일자: <?=$arrInfo["list"][0]["sms_accept_date"]?><?php } ?></div></td>
						<th>관심분야</th>
						<td>
							<div class="inputs">
								<?php
								$arrData = array(
									"dynamics" => "역학",
									"basic" => "기초연구",
									"clinical" => "임상연구",
									"nutrit" => "영양",
									"exercise" => "운동",
									"edu" => "일반인 교육"
								);

								$arrDuty = explode(",",$arrInfo["list"][0]["duty"]);

								foreach($arrData as $key => $val){
									?>
									<label class="check"><input type="checkbox" name="duty[]" value="<?=$key?>" <?=in_array($key,$arrDuty)?"checked":""?>><i></i><?=$val?></label>
									<?php
								}
								?>
							</div>
						</td>
					</tr>
					<tr>
						<th>성별</th>
						<td>
							<div class="inputs">
								<label class="radio"><input type="radio" name="gender" value="M" <?=$arrInfo["list"][0]["gender"]=="M"?"checked":""?>><i></i>남</label>
								<label class="radio"><input type="radio" name="gender" value="W" <?=$arrInfo["list"][0]["gender"]!="M"?"checked":""?>><i></i>여</label>
							</div>
						</td>
						<th>입회서류<br/>
							제출 파일
						</th>
						<td>
							<?php
							if($arrInfo["total_files"] > 0 && $_REQUEST['mode']=="edit"){
								?>
								<div class="inputs">
									<?php
									for($i=0;$i<$arrInfo["total_files"];$i++){
										?>
										<label class="check"><input type="checkbox" name="filedel[]" value="<?=$arrInfo["files"][$i]['idx']?>"><i></i>삭제</label>
										file :  <a href="/uploaded/member/<?=$arrInfo["list"][0]['idx']?>/<?=$arrInfo["files"][$i]['re_name']?>" download="<?=$arrInfo["files"][$i]['ori_name']?>"><?=$arrInfo["files"][$i]['ori_name']?></a>
										<?php
									}
									?>
								</div>
								<?php
							}else{
								?>
								<div class="inputs">
									<div class="filebutton">
										<span>파일 선택</span>
										<input name="upfiles[]" type="file" class="searchfile" title="파일 찾기">
									</div>
									<div class="filebox">선택된 파일 없음</div>
								</div>
								<?php
							}
							?>
						</td>
					</tr>
					<tr>
						<th>생년월일</th>
						<td><div class="inputs"><input type="date" class="w3" name="birth" value="<?=$arrInfo["list"][0]["birth"]?>" min="1000-01-01" max="9999-12-31" maxlength="10"></div></td>
						<th>의사 면허번호</th>
						<td>
							<div class="inputs" style="gap:5px;">
								<select name="is_doctor" id="is_doctor" onchange="showcolumn(this,'doctor_license')">
									<option value="N" <?=$arrInfo["list"][0]["is_doctor"]!="Y"?"selected":""?>>의사번호 없음</option>
									<option value="Y" <?=$arrInfo["list"][0]["is_doctor"]=="Y"?"selected":""?>>의사번호 있음</option>
								</select>
								<input type="text" class="w3" name="doctor_license" id="doctor_license" value="<?=$arrInfo["list"][0]["doctor_license"]?>" maxlength="100">
							</div>
						</td>
					</tr>
					<tr>
						<th>부서명(소속과명)</th>
						<td><div class="inputs"><input type="text" class="w4" name="department" maxlength="200" value="<?=$arrInfo["list"][0]["department"]?>"></div></td>
						<th>영양사 면허번호</th>
						<td>
							<div class="inputs" style="gap:5px;">
								<select name="is_rdn" id="is_rdn" onchange="showcolumn(this,'rdn_license')">
									<option value="N" <?=$arrInfo["list"][0]["is_rdn"]!="Y"?"selected":""?>>영양사번호 없음</option>
									<option value="Y" <?=$arrInfo["list"][0]["is_rdn"]=="Y"?"selected":""?>>영양사번호 있음</option>
								</select>
								<input type="text" class="w3" name="rdn_license" id="rdn_license" value="<?=$arrInfo["list"][0]["rdn_license"]?>" maxlength="100">
							</div>
						</td>
					</tr>
					<tr>
						<th>직위</th>
						<td>
							<div class="inputs" style="gap:5px;">
								<!-- <select name="rank">
							<?php
								$arrData = array(
									"1" => "정교수",
									"2" => "부교수",
									"3" => "조교수",
									"4" => "임상강사",
									"5" => "전임의",
									"6" => "기타"
								);

								foreach($arrData as $key => $val){
									?>
							<option value="<?=$key?>" <?=$key == $arrInfo["list"][0]["rank"]?"selected":""?>><?=$val?></option>
							<?php
								}
								?>
						</select> -->
								<input type="text" class="w3" name="rank" maxlength="50" value="<?=$arrInfo["list"][0]["rank"]?>">
							</div>
						</td>
						<th>회원 구분</th>
						<td>
							<div class="inputs" style="gap:5px;">
								<select name="user_status">
									<?php
									$arrData = array(
										"0" => "일반",
										"1" => "무료"
									);

									foreach($arrData as $key => $val){
										?>
										<option value="<?=$key?>" <?=$key == $arrInfo["list"][0]["user_status"]?"selected":""?>><?=$val?></option>
										<?php
									}
									?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<th>입회비 납부 여부</th>
						<td>
							<div class="inputs" style="gap:5px;">
								<?php
								$arrData = array(
									"N" => "미납",
									"Y" => "납부"
								);

								foreach($arrData as $key => $val){
									?>
									<label class="radio"><input type="radio" name="is_entrance" value="<?=$key?>" <?=$key == $arrInfo["list"][0]["is_entrance"]?"checked":""?>><i></i><?=$val?></label>
									<?php
								}
								?>
								<input type="datetime-local" min="0000-01-01T00:00" max="9999-12-31T23:59" class="w3" name="entrance_date" value="<?=$arrInfo["list"][0]["entrance_date"]?>">
							</div>
						</td>
						<th>입회비 납부자 명</th>
						<td>
							<div class="inputs" >
								<em><?=$arrInfo["list"][0]["entrance_pay_name"]?></em>
							</div>
						</td>
					</tr>
				</table>

				<div class="tit">근무처정보 <i>*</i></div>
				<table>
					<tr>
						<th>근무처</th>
						<td><div class="inputs"><input type="text" class="w4" name="company" maxlength="200" value="<?=$arrInfo["list"][0]["company"]?>"></div></td>
					</tr>
					<tr>
						<th>근무처 구분</th>
						<td><div class="inputs">
								<input type="text" class="w1" name="zip" maxlength="100" value="<?=$arrInfo["list"][0]["zip"]?>">&nbsp;
								<input type="text" class="w4" name="address" maxlength="100" value="<?=$arrInfo["list"][0]["address"]?>">&nbsp;
								<input type="text" class="w3" name="address_ext" maxlength="100" value="<?=$arrInfo["list"][0]["address_ext"]?>">
							</div></td>
					</tr>
					<tr>
						<th>우편물 배송주소</th>
						<td><div class="inputs">
								<input type="text" class="w1" name="fax_zip" maxlength="100" value="<?=$arrInfo["list"][0]["fax_zip"]?>">&nbsp;
								<input type="text" class="w4" name="fax_address" maxlength="100" value="<?=$arrInfo["list"][0]["fax_address"]?>">&nbsp;
								<input type="text" class="w3" name="fax_address_ext" maxlength="100" value="<?=$arrInfo["list"][0]["fax_address_ext"]?>">
							</div></td>
					</tr>
					<tr>
						<th>전화번호</th>
						<td><div class="inputs"><input type="text" class="w4" name="phone" value="<?=$arrInfo["list"][0]["phone"]?>" maxlength="20"></div></td>
					</tr>
					<tr>
						<th>FAX</th>
						<td><div class="inputs"><input type="text" class="w4" name="fax" maxlength="100" value="<?=$arrInfo["list"][0]["fax"]?>"></div></td>
					</tr>

				</table>


				<div class="btns">
					<a href="javascript:void(0);" onclick="history.back();" class="btn btn_list">목록보기</a>
					<button class="btn btn_save" type="submit">저장</button>
				</div>
			</form>
			<div class="tit">최근 3년 연회비 횟수 : <i><?=number_format($arrAnnualList["list"]["total"])?></i></div>
			<form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkAnnualForm(this)">
				<input type="hidden" name="evnMode" value="annual_insert">
				<input type="hidden" name="mem_idx" value="<?=$arrInfo["list"][0]['idx']?>">
				<input type="hidden" name="rt_url" value="<?=$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]?>">
				<table class="inner_table">
					<thead>
					<tr>
						<th>회비구분</th>
						<th>연도</th>
						<th>금액</th>
						<th>관리</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$arrTypeData = array(
						"0" => "연회비",
						"1" => "평생회비"
					);
					?>
					<tr>
						<td>
							<select name="type">
								<?php
								foreach($arrTypeData as $key => $val){
									?>
									<option value="<?=$key?>" ><?=$val?></option>
									<?php
								}
								?>
							</select>
						</td>
						<td><div class="inputs"><input type="number" class="w3" name="year" min="0" value="<?=date("Y")?>"></div></td>
						<td><div class="inputs"><input type="number" class="w4" name="af_price" value="0" min="0"></div></td>
						<td><button type="submit" class="btn">등록</button></td>
					</tr>
					<?php
					for($i=0;$i<$arrAnnualList["list"]["total"];$i++){
						?>
						<tr>
							<td><?=$arrTypeData[$arrAnnualList["list"][$i]["type"]]?></td>
							<td><?=$arrAnnualList["list"][$i]["year"]?></td>
							<td><?=number_format($arrAnnualList["list"][$i]["af_price"])?></td>
							<td></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</form>

		</div> <!-- //inbox -->
	</div>

<?php
######################################################## 디자인 ED
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/footer.php";
?>