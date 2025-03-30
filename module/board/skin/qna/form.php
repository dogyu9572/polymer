<?
################################################### PHP 7 Set ST
if(!isset($_GET["category"])){	$_GET["category"]=""; }
if(!isset($_GET["sw"])){		$_GET['sw']="";	}
if(!isset($_GET["sk"])){		$_GET['sk']="";	}
if(!isset($_GET["offset"])){	$_GET['offset']="";	}
if(!isset($_GET["s_date"])){	$_GET['s_date']="";	}
if(!isset($_GET["e_date"])){	$_GET['e_date']="";	}
if(!isset($_GET["page_size"])){	$_GET['page_size']=""; }
if(!isset($arrBoardArticle["total_files"])){		$arrBoardArticle["total_files"]=0; }
if(!isset($arrBoardArticle["list"][0]['subject'])){ $arrBoardArticle["list"][0]['subject']=""; }
if(!isset($arrBoardArticle["list"][0]['etc_1'])){	$arrBoardArticle["list"][0]['etc_1']=""; }
if(!isset($arrBoardArticle["list"][0]['contents'])){	$arrBoardArticle["list"][0]['contents']=""; }
################################################### PHP 7 Set ED
if($_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"] && $_SERVER["PHP_SELF"]=="/backoffice/module/board/board_view.php"){
###################################################### 관리자 페이지 ######################################################?>
<?if($_GET['mode']=="write"){$inputText="등록";}else{$inputText="수정";}?>
<script language="javascript">
function frmCheck(frm){
	if(frm.subject.value.length < 1){
		alert('제목을 입력해 주세요.');
		frm.subject.focus();
		return ;
	}
	
	try{ contents.outputBodyHTML(); } catch(e){ }
	frm.submit();
}
$(document).ready(function() {
	$.each($('input.calendar'), function() {
		set_datepicker($(this));
	});	
});
function set_datepicker($cont) {
	$cont.prop('readonly', true).datepicker({
		closeText: '닫기',
		prevText: '',
		nextText: '',
		currentText: '오늘',
		monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
		monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
		dayNames: ['일','월','화','수','목','금','토'],
		dayNamesShort: ['일','월','화','수','목','금','토'],
		dayNamesMin: ['일','월','화','수','목','금','토'],
		weekHeader: 'Wk',
		dateFormat: 'yy-mm-dd',
		defaultDate: '+1w',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: true,
		yearSuffix: '년 ',
		changeMonth: true,
		changeYear: true,
		yearRange: '1921:c+5'
	});
}
//첨부파일 열 추가
var rowcount = 0;
function append() {   
	var tbl = document.getElementById("files_table").getElementsByTagName("TBODY")[0];  
	var html1 = "<input name='upfiles[]' type='file' style='width: 400px;'>";  
	var row = document.createElement("tr"); 
	var col1 = document.createElement("td");   
	row.appendChild(col1);  
	col1.innerHTML = html1;  
	tbl.appendChild(row);  
	rowcount++;
}
var filecount = 0;
function appendfile(){
	filecount++;
	$("#filetd"+filecount).css("display","");	
}
function removefile(){
	$("#filetd"+filecount).css("display","none");	
	if(filecount>0){
		filecount--;
	}
}
function remove() {  
	if(rowcount > 0){
		var tbl = document.getElementById("files_table").getElementsByTagName("TBODY")[0];  
		if (tbl.hasChildNodes()) {      
			tbl.removeChild(tbl.lastChild);     // 마지막 로우   //tbl.removeChild(tbl.firstChild);  // 첫번째 로우  
		}
		rowcount--;
	}
}
//첨부파일 열 추가

function resetPassword() {
    if(confirm('비밀번호를  초기화하시겠습니까?')) {
        $.ajax({
            type: 'POST',
            url: '/module/board/ajax_reset_password.php',
            data: {
                idx: '<?=$arrBoardArticle["list"][0]["idx"]?>',
                boardid: '<?=$arrBoardInfo["list"][0]["boardid"]?>'
            },
            success: function(response) {
                if(response == 'success') {
                    alert('비밀번호가 초기화되었습니다.');
                } else {
                    alert('비밀번호 초기화 중 오류가 발생했습니다.');
                }
            },
            error: function() {
                alert('서버 통신 오류가 발생했습니다.');
            }
        });
    }
}

function fileDownload(boardid,b_idx,idx){
	obj = window.open("/module/board/download.php?boardid="+boardid+"&b_idx="+b_idx+"&idx="+idx,"download","width=100,height=100,menubars=0, toolbars=0");
}
</script>
<div class="container">
	<div class="title"><?=$arrBoardInfo["list"][0]["boardname"]?> <?=$inputText?></div>
	
	<div class="inbox write_tbl mo_break_write">
		
		<form name="form1" method="post" action="/module/board/board_evn.php" ENCTYPE="multipart/form-data">
		<input type="hidden" name="boardid" value="<?=$arrBoardInfo["list"][0]["boardid"]?>">
		<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&category=<?=$_GET['category']?>&offset=<?=$_GET['offset']??""?>">
		<input type="hidden" name="idx" value="<?=$arrBoardArticle["list"][0]["idx"]?>">
		<input type="hidden" name="category" value="<?=isset($arrBoardArticle["list"][0]["category"])?$arrBoardArticle["list"][0]["category"]:$_GET['category']?>">
		<input type="hidden" name="usehtml" value="Y">
        <input type="hidden" name="etc_2" value="<?=$arrBoardArticle["list"][0]['etc_2']?>">
        <input type="hidden" name="etc_3" value="<?=$arrBoardArticle["list"][0]['etc_3']?>">
		<?if($_REQUEST['mode']=="reply"):?>
		<input type="hidden" name="evnMode" value="reply">
		<?elseif($_REQUEST['mode']=="modify"):?>
		<input type="hidden" name="evnMode" value="modify">
		<?else:?>
		<input type="hidden" name="evnMode" value="write">
		<?endif;?>
		<div class="tit"><?=$arrBoardInfo["list"][0]["boardname"]?> 정보 <i>*</i></div>
		<table>
            <tr>
                <th>제목</th>
                <td><div class="inputs"><input type="text" class="w4" name="subject" maxlength="255" value="<?=stripslashes($arrBoardArticle["list"][0]['subject'])?>"></div></td>
            </tr>
			<tr>
				<th>작성자</th>
				<td><div class="inputs"><input type="text" class="w2" name="name" maxlength="100" value="<?if($_REQUEST['mode']=="modify"):?><?=$arrBoardArticle["list"][0]['name']?><?else:?><?=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]?$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["NAME"]:$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]?><?endif;?>"></div></td>
			</tr>
            <tr>
                <th>이메일</th>
                <td><div class="inputs"><input type="text" class="w4" name="email" maxlength="255" value="<?=stripslashes($arrBoardArticle["list"][0]['email'])?>"></div></td>
            </tr>
			<tr style="display:none;">
				<th>조회수</th>
				<td><div class="inputs"><input type="text" class="w2" name="hit" maxlength="100" value="<?=$arrBoardArticle["list"][0]['hit']??0?>"></div></td>
			</tr>
            <tr style="display:none;">
                <th>핸드폰 번호</th>
                <td><div class="inputs"><input type="text" class="w4" name="tel" maxlength="255" value="<?=stripslashes($arrBoardArticle["list"][0]['tel'])?>"></div></td>
            </tr>
        <tr>
            <th>문의내용</th>
            <td>
                <textarea id="contents" name="contents"><?=stripslashes($arrBoardArticle["list"][0]['contents'])?></textarea>
                <?
                $CKContent = "contents";
                include $_SERVER['DOCUMENT_ROOT'] . "/ckeditor/Editor.php";
                ?>
            </td>
        </tr>
        <tr>
            <th>등록일</th>
            <td><input type="text" class="w3 datepicker" name="s_date" value="<?=$arrBoardArticle["list"][0]['schedule_date']??date("Y-m-d")?>" maxlength="10" /></td>
        </tr>
			<?
			$listimg = "";
			for($i=0;$i<$arrBoardArticle["total_files"];$i++){
				if(substr($arrBoardArticle["files"][$i]['re_name'],0,2) == "l_") {
					$listimg = "Y";
					$num = $i;
				}
			}
			?>
            <tr>
                <th>비밀번호 초기화</th>
                <td>
                    <div class="inputs">
                        <button type="button" class="btn btn_reset" onclick="resetPassword()">비밀번호 초기화</button>
                        <em style="color:#ff0000; margin-left:10px;">* 비밀번호는 poly123! 로 초기화됩니다.</em>
                    </div>
                </td>
            </tr>

            <tr>
                <th>답변여부</th>
                <td>
                    <div class="inputs">
                        <label class="radio"><input type="radio" name="etc_4" value="" <?php if($arrBoardArticle["list"][0]['etc_4'] == ''): ?>checked<?php endif; ?>><i></i>답변대기</label>
                        <label class="radio"><input type="radio" name="etc_4" value="Y" <?php if($arrBoardArticle["list"][0]['etc_4'] == 'Y'): ?>checked<?php endif; ?>><i></i>답변완료</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>답변내용</th>
                <td>
                    <textarea id="etc_1" name="etc_1"><?=stripslashes($arrBoardArticle["list"][0]['etc_1'])?></textarea>
                    <?
                    $CKContent = "etc_1";
                    include $_SERVER['DOCUMENT_ROOT'] . "/ckeditor/Editor.php";
                    ?>
                </td>
            </tr>
			<tr style="display:none;">
				<th>리스트 이미지</th>
				<td>
					<div class="inputs">
					<? if($listimg == "Y") {?>
					<label class="check"><input type="checkbox" name="filedel[]" value="<?=$arrBoardArticle["files"][$num]['idx']?>"><i></i>삭제</label><em>file :  <a href="javascript:void(0);" onclick="fileDownload('<?=$arrBoardArticle["files"][$num]['boardid']?>','<?=$arrBoardArticle["files"][$num]['b_idx']?>','<?=$arrBoardArticle["files"][$num]['idx']?>');"><?=$arrBoardArticle["files"][$num]['ori_name']?></a></em>
					<?}else{?>
						<div class="filebutton">
							<span>파일 선택</span>							
							<input name="upfiles[]" type="file" class="searchfile" title="파일 찾기"><input type="hidden" name="memo_name[]" value="l">							
						</div>
						<div class="filebox">선택된 파일 없음</div>
					<?}?>
					</div>
				</td>
			</tr>
			<tr>
				<th>첨부파일 <em>&nbsp;&nbsp;&nbsp;<a href="javascript:appendfile();"><img src="/common/images/btnPlus3.png" alt="파일추가" style="width:20px;"></a>
									<a href="javascript:removefile();"><img src="/common/images/btnMin3.png" alt="파일삭제" style="width:20px;"></a></em></th>
			<td>
				<table id="files_table" border="0" cellpadding="0" cellspacing="0" width="500">
					<tbody>
						<tr height="25">
							<td align='left' width='100%' style="border: 0px solid #aaa;text-align:left;">
								<div class="inputs">
									<div class="filebutton">
										<span>파일 선택</span>							
										<input name="upfiles[]" type="file" class="searchfile" title="파일 찾기">					
									</div>
									<div class="filebox">선택된 파일 없음</div>
								</div>
							</td>
						</tr>
						<?for($i=1;$i<6;$i++){?>
						<tr>
							<td align='left' width='100%' id="filetd<?=$i?>" style="display:none;">
								<div class="inputs">
									<div class="filebutton">
										<span>파일 선택</span>							
										<input name="upfiles[]" type="file" class="searchfile" title="파일 찾기">					
									</div>
									<div class="filebox">선택된 파일 없음</div>
								</div>
							</td>
						</tr>
						<?}?>
                        <tr style="display:none;">
                            <th>공지</th>
                            <td><div class="inputs">
                                    <label class="radio"><input type="radio" name="is_notice" value="" <?if($arrBoardArticle["list"][0]['no']!="0"){echo " checked";}?>><i></i>일반</label>
                                    <label class="radio"><input type="radio" name="is_notice" value="Y" <?if($arrBoardArticle["list"][0]['no']=="0"){echo " checked";}?>><i></i>공지</label>
                                    <em></em>
                                </div></td>
                        </tr>
                        <tr style="display:none;">
                            <th>사용여부</th>
                            <td><div class="inputs">
                                    <label class="radio"><input type="radio" name="is_show" value="Y" <?=$arrBoardArticle["list"][0]['etc_2']!="N"?"checked":""?>><i></i>Y</label>
                                    <label class="radio"><input type="radio" name="is_show" value="N" <?=$arrBoardArticle["list"][0]['etc_2']=="N"?"checked":""?>><i></i>N</label>
                                    <em></em>
                                </div></td>
                        </tr>
					</tbody>
				</table>
				<?
				if($arrBoardArticle["total_files"]>0 && $_REQUEST['mode']=="modify"){
				?>
				<table id="files_list" border="0" cellpadding="3" cellspacing="1" width="100%" style="padding:1%">
					<tbody>
					<?
					for($i=0;$i<$arrBoardArticle["total_files"];$i++){
						if(substr($arrBoardArticle["files"][$i]['re_name'],0,2) != "l_" && substr($arrBoardArticle["files"][$i]['re_name'],0,2) != "v_") {
					?>
						<tr> 
							<td><label class="check"><input type="checkbox" name="filedel[]" value="<?=$arrBoardArticle["files"][$i]['idx']?>"><i></i>삭제</label>
							file :  <a href="javascript:void(0);" onclick="fileDownload('<?=$arrBoardArticle["files"][$i]['boardid']?>','<?=$arrBoardArticle["files"][$i]['b_idx']?>','<?=$arrBoardArticle["files"][$i]['idx']?>');"><?=$arrBoardArticle["files"][$i]['ori_name']?></a>
							</td>
						</tr>
					<?
						}
					}?>
					</tbody>
				</table>
				<?}?>
			</td>
		</tr>
		</table>		
		<div class="btns">
			<a href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&category=<?=$_GET['category']?>" class="btn btn_list">목록보기</a>
			<a href="javascript:void(0)" onclick="location.reload()" class="btn btn_cancel">취소</a>
			<button class="btn btn_save" type="submit">저장</button>
		</div>
		</form>
	</div> <!-- //inbox -->
</div>
<script type="text/javascript">
//<![CDATA[
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
//]]>
</script>
<?}else{###################################################### 사용자 페이지 ######################################################?>
<?
//관리자만 글쓰기 기능 체크
if($arrBoardInfo["list"][0]["useadminonly"] !="Y" || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]):
	if($_REQUEST['mode']=="reply" && $arrBoardInfo["list"][0]["usereply"] !="Y"):
		jsMsg("답글쓰기가 제한된 게시판 입니다.");
		jsHistory("-1");
		exit;
	endif;
?>
	<div class="inner inner_in">
		<div class="gbox">
			<p class="ss">* 인용 관련 문의에 대한 내용이 들어갈 공간입니다. 원고필요 인용 관련 문의에 대한 내용이 들어갈 공간입니다. 원고필요 인용 관련 문의에 대한 내용이 들어갈 공간입니다. 원고필요 인용 관련 문의에 대한 내용이 들어갈 공간입니다. 원고필요 인용 관련 문의에 대한 내용이 들어갈 공간입니다. 원고필요 인용 관련 문의에 대한 내용이 들어갈 공간입니다. 원고필요</p>
		</div>
		<div class="reference_btns">
			<a href="#this" class="btn btn_down">신청양식 다운로드</a>
		</div>
		<div class="board_write">
			<form name="form1" id="form1" method="post" action="/module/board/board_evn.php" onsubmit="return frmCheck(this)" >
				<input type="hidden" name="boardid" value="<?=$arrBoardInfo["list"][0]["boardid"]?>">
				<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>">
				<input type="hidden" name="evnMode" value="write">
				<table>
					<tr>
						<th>이름<span class="red">*</span></th>
						<td><input type="text" class="text w1" name="name" id="name" value="" placeholder="이름을 입력해주세요"></td>
					</tr>
					<tr>
						<th>근무처명(소속)<span class="red">*</span></th>
						<td><input type="text" class="text w2" name="subject" id="subject" value=""></td>
					</tr>
					<tr>
						<th>직종<span class="red">*</span></th>
						<td>
							<div class="flex gap">
							<?php
								$arrData = array(
									"basic" => "기초",
									"doctor" => "의사",
									"nutrit" => "영양",
									"etc" => "기타"
								);
								foreach($arrData as $key => $val){
								?>
								<label class="check"><input type="radio" name="category" value="<?=$key?>"><i></i><?=$val?></label>
								<?php } ?><!-- 
								<label class="check"><input type="radio" name="category" id="subject"><i></i>기초</label>
								<label class="check"><input type="radio" name="category" id="subject"><i></i>의사</label>
								<label class="check"><input type="radio" name="category" id="subject"><i></i>영양</label>
								<label class="check"><input type="radio" name="category" id="subject"><i></i>기타</label> -->
							</div>
						</td>
					</tr>
					<tr>
						<th>핸드폰 번호<span class="red">*</span></th>
						<td><input type="text" name="tel" id="tel" value="" class="text w1"></td>
					</tr>
					<tr>
						<th>이메일<span class="red">*</span></th>
						<td><input type="text" class="text w1" name="email" id="email" value="" placeholder="email@example.com"></td>
					</tr>
					<tr>
						<th>문의내용</th>
						<td><textarea name="contents" id="contents" cols="30" rows="10" class="text w2"></textarea></td>
					</tr>
					<tr>
						<th>보안인증</th>
						<td>
							<?php 
								$sid = md5(time());
							?>
							<div class="capcha">
								<div class="img"><img id="siimage" src="/_securimage/securimage_show.php?sid=<?=$sid?>" alt="캡챠 이미지"></div>
								<div class="btns">
									<audio id="code_sound" src="/_securimage/securimage_play.php?sid=<?=$sid?>"></audio>
									<button type="button" class="sound" onclick="getSound()"></button>
									<button type="button" class="re" onclick="recallImage()"></button>
								</div>
								<input type="text" name="code" id="code" value="" class="text">
							</div>
						</td>
					</tr>
				</table>
				<div class="tac check_wrap">
					<label class="check"><input type="checkbox" name="check1" value ='Y'><i></i><a href="">개인정보 수집 및 이용</a>에 대해 확인하였고, 이에 동의합니다.</label>
				</div>
				<div class="tbl">
					<button type="submit" class="btn_submit">문의하기</button>
				</div>
			</form>
		</div>
	</div>
<script>
var sid = "<?=$sid?>";
function recallImage(){
	sid = Math.random();
	document.getElementById('siimage').src = '/_securimage/securimage_show.php?sid=' + sid;
	document.getElementById('code_sound').src = '/_securimage/securimage_play.php?sid=' + sid;
}
function getSound(){
	document.getElementById('code_sound').play();
} 
function frmCheck(frm){
	if(frm.name.value.length < 1){
		alert('이름을 입력해 주세요.');
		frm.name.focus();
		return false;
	}else if(frm.subject.value.length < 1){
		alert('근무처명(소속)을 입력해 주세요.');
		frm.subject.focus();
		return false;
	}else if(frm.category.value.length < 1){
		alert('직종을 선택해 주세요.');
		return false;
	}else if(frm.etc_1.value.length < 1){
		alert('부서명(소속과명)을 선택해 주세요.');
		frm.etc_1.focus();
		return false;
	}else if(frm.etc_2.value.length < 1){
		alert('직위(직급)을 선택해 주세요.');
		frm.etc_2.focus();
		return false;
	}else if(frm.tel.value.length < 1){
		alert('핸드폰번호를 입력해 주세요.');
		frm.tel.focus();
		return false;
	}else if(frm.email.value.length < 1){
		alert('이메일을 입력해 주세요.');
		frm.email.focus();
		return false;
	}else if(frm.code.value.length < 1){
		alert('보안인증코드를 입력해 주세요.');
		frm.code.focus();
		return false;
	}else if(frm.check1.value.length < 1){
		alert('개인정보 수집 및 이용에 동의 주세요.');
		frm.check1.focus();
		return false;
	}else{
		return true;
	}
}
</script>
<?
else:
jsMsg("관리자만 등록/수정/삭제 할 수 있는 게시판 입니다.");
jsHistory("-1");
endif;
?>
<?}?>