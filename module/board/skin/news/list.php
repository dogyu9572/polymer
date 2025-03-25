<?
################################################### PHP 7 Set ST
if(!isset($_GET["category"])){	$_GET["category"]=""; }
if(!isset($_GET["sw"])){		$_GET['sw']="";	}
if(!isset($_GET["sk"])){		$_GET['sk']="";	}
if(!isset($_GET["offset"])){	$_GET['offset']=0;	}
if(!isset($_GET["page_size"])){	$_GET['page_size']=""; }
if(!isset($arrBoardList["list"]["total"])){			$arrBoardList["list"]["total"]=0; }
if(!isset($arrBoardList["total"])){					$arrBoardList["total"]=0; }
if(!isset($arrBoardInfo["list"][0]["scale"])){		$arrBoardInfo["list"][0]["scale"]=0; }
if(!isset($arrBoardInfo["list"][0]["pagescale"])){	$arrBoardInfo["list"][0]["pagescale"]=0; }
if(!isset($arrBoardInfo["list"][0]["boardid"])){	$arrBoardInfo["list"][0]["boardid"]=""; }
################################################### PHP 7 Set ED

if($_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"] && $_SERVER["PHP_SELF"]=="/backoffice/module/board/board_view.php"){
	if(!in_array("board_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;
###################################################### 관리자 페이지 ######################################################?>
<script type="text/javascript">
<!--
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

function boardDel(val){	
	if(confirm("삭제 하시겠습니까?")) {
		$.post("/module/board/ajax_board_del.php", { evnMode: "delete", g_idx: val, boardid: "<?=$arrBoardInfo["list"][0]["boardid"]?>" },
		function(data){		
			//alert(data);
			doLoad();
		});
	}
}
function doLoad(){	
	location.reload();		
}
// 선택 삭제시 singleSelect=true 값 변경 false
function getSelections(){
	var ss = "0";

	var rows = $('input:checkbox[name=chk_list]:checked');
	
	for(var i=0; i<rows.length; i++){
		var row = rows[i];
		//ss.push(row.idx);
		ss += ","+row.value;
	}
	if(rows.length>0){
		//alert(ss);
		boardDel(ss);
	}else{
		alert('선택된 항목이 없습니다.');
	}	
}
$(function(){
    $(".check_all").click(function(){		
        var chk = $(this).is(":checked");//.attr('checked');
        if(chk) $(".chk_list").prop('checked', true);
        else  $(".chk_list").prop('checked', false);
    });
});
//-->
</script>

<div class="container">

	<div class="title"><?=$arrBoardInfo["list"][0]["boardname"]?></div>

	<form name="form1" method="get" action="<?=$_SERVER["PHP_SELF"]?>">
	<input type="hidden" name="boardid" value="<?=$arrBoardInfo["list"][0]["boardid"]?>">

	<div class="inbox top_search">
		<!--	<dl>
			<dt>구분</dt>
			<dd><select name="" id=""><option value="">전체</option></select></dd>
		</dl>
		<dl>
			<dt>업체구분</dt>
			<dd><select name="" id=""><option value="">전체</option></select></dd>
		</dl>
		<dl>
			<dt>회비현황</dt>
			<dd><select name="" id=""><option value="">전체</option></select></dd>
		</dl>
		<dl>
			<dt>보유신기술</dt>
			<dd><select name="" id=""><option value="">전체</option></select></dd>
		</dl>
		<dl class="w2">
			<dt>업태</dt>
			<dd><select name="" id=""><option value="">전체</option></select></dd>
		</dl>
		<dl class="w2">
			<dt>창립기념일</dt>
			<dd><input type="text" id="datepicker1" /><em>~</em><input type="text" id="datepicker2" /></dd>
		</dl>	-->
		<dl>
			<dt>연도</dt>
			<dd>
				<select name="category" id="category">
					<option value="">전체</option>
					<?php for($i=date("Y");$i>1950;$i--){?>
					<option value="<?=$i?>" <?=$i == $_GET["category"]?"selected":""?>><?=$i?></option>
					<?php } ?>
				</select>
			</dd>
		</dl>
		<dl>
			<dt>사용여부</dt>
			<dd>
				<label class="radio"><input type="radio" name="is_show" value="" <?=$_GET["is_show"] == ""?"checked":""?>><i></i>전체</label>
				<label class="radio"><input type="radio" name="is_show" value="Y" <?=$_GET["is_show"] == "Y"?"checked":""?>><i></i>Y</label>
				<label class="radio"><input type="radio" name="is_show" value="N" <?=$_GET["is_show"] == "N"?"checked":""?>><i></i>N</label>
			</dd>
		</dl>
		<dl class="search_wrap">
			<dt>제목</dt>
			<dd>	
				<input type="text" name="sk" value="<?=$_GET['sk']?>" />
				<button type="button" class="search" onclick="document.form1.submit()">검색</button>
			</dd>
		</dl>
	</div>

	<div class="inbox">
		<div class="bdr_top">
			<div class="left">
				<div class="total">Total : <strong><?=number_format($arrBoardList["total"])?></strong></div>
				<div class="down">
				<!--	<a href="#this" class="excel" download>전체다운<span class="pc_vw">로드</span></a>
					<a href="#this" class="excel" download>선택다운<span class="pc_vw">로드</span></a>
				-->
				</div>
			</div>
			<div class="count">
				<select name="page_size" onchange="document.form1.submit()">
					<option value="100" <?if($arrBoardInfo["list"][0]["scale"]=="100"){echo 'selected="selected"';}?>>100</option>
					<option value="50" <?if($arrBoardInfo["list"][0]["scale"]=="50"){echo 'selected="selected"';}?>>50</option>
					<option value="40" <?if($arrBoardInfo["list"][0]["scale"]=="40"){echo 'selected="selected"';}?>>40</option>
					<option value="30" <?if($arrBoardInfo["list"][0]["scale"]=="30"){echo 'selected="selected"';}?>>30</option>
					<option value="20" <?if($arrBoardInfo["list"][0]["scale"]=="20"){echo 'selected="selected"';}?>>20</option>
					<option value="15" <?if($arrBoardInfo["list"][0]["scale"]=="15"){echo 'selected="selected"';}?>>15</option>
					<option value="10" <?if($arrBoardInfo["list"][0]["scale"]=="10"){echo 'selected="selected"';}?>>10</option>
				</select>
				개씩 보기
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
						<col class="w10p">
						<col class="*">
						<col class="w15p">
						<col class="w6p">
						<col class="w10p">
						<col class="w10p">
					</colgroup>
					<thead>
						<tr>	
							<th><label class="check notxt"><input type="checkbox" name="" id="allCheck"><i></i></label></th>
							<th class="pc_vw">No.</th>
							<th class="pc_vw">연도</th>
							<th class="pc_vw">제목</th>
							<th class="pc_vw">링크</th>
							<th class="pc_vw">사용여부</th>
							<th class="pc_vw">등록일</th>
							<th class="pc_vw">관리</th>
						</tr>
					</thead>
					<tbody>
					<?
					if($arrBoardList["list"]["total"] > 0){
						for($i=0; $i < $arrBoardList["list"]["total"]; $i++){
							//신규글 표시
							if(strtotime($arrBoardList["list"][$i]['wdate'])+($arrBoardInfo["list"][0]["newmark"]*86400) > mktime()){
								$newImage ='<span class="icoNew">new</span>';	// new 이미지
							}else{
								$newImage ='';
							}
							//글잠금 표시
							if($arrBoardList["list"][$i]['uselock'] == "Y"){
								$lockImage ="";	// 글잠금표시
							}else{
								$lockImage ="";
							}
							//댓글수 표시
							if(isset($arrBoardList["list"][$i]['cmt_count']) > 0){
								$cmt_count = "[".number_format($arrBoardList["list"][$i]['cmt_count'])."]";
							}else{
								$cmt_count = "";
							}
							//공지				
							$categoryTitle = $arrBoardList["total"]-$i-(int)$_GET['offset'];					
							$TrClass="";
							$noticeMo="";
							if($arrBoardList["list"][$i]['no']=="0"){
								$TrClass="class=\"notice\"";	// 공지글 표시
								$categoryTitle = '<span class="notiTit">공지</span>';
								$noticeMo = '<span class="notiTit">공지</span>';
							}
							//파일
							$fileImg = "";
							if($arrBoardList["list"][$i]['re_name']){
								$fileImg = '<span class="icoFile">파일</span>';
							}
					?>
						<tr>
							<td class="chkbox"><label class="check notxt"><input type="checkbox" value="<?=$arrBoardList["list"][$i]['idx']?>" name="chk_list"><i></i></label></td>
							<td><i class="mo_vw">No.</i><?=$arrBoardList["list"][$i]['no']=="0"?"공지":$categoryTitle?></td>
							<td><i class="mo_vw">연도</i><?=$arrBoardList["list"][$i]['category']?></td>
							<td><i class="mo_vw">제목</i><?=$arrBoardList["list"][$i]['subject']?></td>
							<td><i class="mo_vw">제목</i><?=$arrBoardList["list"][$i]['homepage']?></td>
							<td><i class="mo_vw">사용여부</i><?=$arrBoardList["list"][$i]['is_show']?></td>
							<td><i class="mo_vw">작성일</i><?=$arrBoardList["list"][$i]['wdate']?></td>						
							<td class="mono_btm"><i class="mo_vw">관리</i>
								<div class="btns">
									<a href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=modify&idx=<?=$arrBoardList["list"][$i]['idx']?>&category=<?=$_GET['category']?>" class="btn modi">수정</a>
									<button type="button" class="btn del" onclick="boardDel(<?=$arrBoardList["list"][$i]['idx']?>)">삭제</button>
								</div>
							</td>
						</tr>
					<?
						}
					}else{
					?>
					<tr height="100">
						<td colspan="8">등록된 데이터가 없습니다.</td>
					</tr>
					<?}?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="bdr_btm">
			<div class="paging">			
			<?=pageNavigationBackoffice($arrBoardList["total"],$arrBoardInfo["list"][0]["scale"],$arrBoardInfo["list"][0]["pagescale"],$_GET['offset'],"boardid=".$arrBoardInfo["list"][0]["boardid"]."&sk=".$_GET['sk']."&sw=".$_GET['sw']."&category=".$_GET['category']."&page_size=".$_GET['page_size']."&s_date=".initVar('s_date')."&e_date=".initVar('e_date'))?>
			</div>	
			<div class="btns">
				<a href="javascript:void(0);" onclick="getSelections()" class="btn btn_del">선택삭제</a>
				<a href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=write&category=<?=$_GET['category']?>" class="btn">신규등록</a>
			</div>
		</div>
	</div>
</div>
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
<?}else{###################################################### 사용자 페이지 ######################################################?>
<?
$offset = 0;
if(isset($_GET["offset"])){
	$offset = (int)$_GET["offset"];
}
?>
	<div class="webzine-tit inner">
		<div class="tit-box">
			<h3 class="tit-bullet heading1">병원보</h3>
				<p class="sub">고신대병원이 소개하는 다양한 정보를 확인해 보세요.</p>
			</div>
			<div class="this-month">
				<?php 
					if($arrBoardList["list"]["total"] > 0){ 
						$imgsrc = "/uploaded/board/".$arrBoardInfo["list"][0]["boardid"]."/".$arrBoardList["list"][0]['re_name'];
						if(!$arrBoardList["list"][0]['re_name']){$imgsrc = "/pub/images/sub/img_webzine.jpg";}
						
				?>
					<div class="img"><img src="<?=$imgsrc?>" alt=""></div>
					<div class="text">
						<p class="c-primaryDark stitle3">Care & Love</p>
						<p class="season"><?=$arrBoardList["list"][0]['subject']?></p>
						<p class="stitle3">Medical Focus</p>
						<ul class="bullet-gray">
							<?php
								$arrCont = explode("\n",$arrBoardList["list"][0]['contents']);
								for($i=0;$i<count($arrCont);$i++){
							?>
							<li><?=$arrCont[$i]?></li>
							<?php
								}	
							?>
						</ul>
						<?php
						$arrBoardArticle = getBoardArticleView($arrBoardInfo["list"][0]["boardid"], "", $arrBoardList["list"][0]["idx"],"list");
						if($arrBoardArticle["total_files"]>0){
							for ($j=0;$j<$arrBoardArticle["total_files"];$j++) {
								if(substr($arrBoardArticle["files"][$j]['re_name'],0,2) != "l_"){
						?>
						<a href="/uploaded/board/<?=$arrBoardInfo["list"][0]["boardid"]?>/<?=$arrBoardArticle["files"][$j]['re_name']?>" download="<?=$arrBoardArticle["files"][$j]['ori_name']?>" class="btn-md primary ico-arrow2">병원보 보기</a>
						<?php
								}
							}
						}
						?>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="section inner">
			<div class="tit-box">
				<h3 class="tit-bullet heading1">지난호 보러가기</h3>
			</div>
			<div class="webzine-wrap">
				<?
				if($arrBoardList["list"]["total"] > 0){
					for($i=0; $i < $arrBoardList["list"]["total"]; $i++){
						
						//글잠금 표시
						if($arrBoardList["list"][$i]['uselock'] == "Y"){
							$lockImage ="";	// 글잠금표시
						}else{
							$lockImage ="";
						}
						
						//순번 & 공지 & 신규표시
						$listNum = $arrBoardList["total"]-$i-$offset;					
						//신규글 표시
						if(strtotime($arrBoardList["list"][$i]['wdate'])+($arrBoardInfo["list"][0]["newmark"]*86400) > mktime()){
							$categoryTitle ='class="new"';	// new 이미지				
						}
						//공지
						if($arrBoardList["list"][$i]['no']=="0"){
							$categoryTitle = 'class="notice"';
						}					
						//파일
						$fileImg = "";
						if($arrBoardList["list"][$i]['re_name']){
							$fileImg = ' class="attach"';
						}
						$img[$i] = "/uploaded/board/".$arrBoardInfo["list"][0]["boardid"]."/".$arrBoardList["list"][$i]['re_name'];
						if(!$arrBoardList["list"][$i]['re_name']){$img[$i] = "/pub/images/sub/img_webzine.jpg";}
						//
						$firstClass='';
						if($i==0){$firstClass=' class="first"';}
						$arrBoardArticle = getBoardArticleView($arrBoardInfo["list"][0]["boardid"], "", $arrBoardList["list"][$i]["idx"],"list");
						$href = "#";
						$download = "";
						if($arrBoardArticle["total_files"]>0){
							for ($j=0;$j<$arrBoardArticle["total_files"];$j++) {
								if(substr($arrBoardArticle["files"][$j]['re_name'],0,2) != "l_"){
									$href = "/uploaded/board/".$arrBoardInfo["list"][0]["boardid"]."/".$arrBoardArticle["files"][$j]['re_name'];
									$download = $arrBoardArticle["files"][$j]['ori_name'];
								}
							} 
						}
				?>
					<a href="<?=$href?>" <?=$download != ""?"download='".$download."'":""?>>
						<span class="tag secondary"><?=$arrBoardList["list"][$i]['category']?></span>
						<div class="img"><img src="<?=$img[$i]?>" alt=""></div>
						<p class="stitle3"><?=$arrBoardList["list"][$i]['subject']?></p>
					</a>
				<?
					}
				}
				?>
				<!-- <a href="#;">
							<span class="tag secondary">2024</span>
				  <div class="img"><img src="/pub/images/sub/img_webzine.jpg" alt=""></div>
				  <p class="stitle3">2024년 봄호</p>
				</a>
				<a href="#;">
							<span class="tag secondary">2024</span>
				  <div class="img"><img src="/pub/images/sub/img_webzine.jpg" alt=""></div>
				  <p class="stitle3">2024년 봄호</p>
				</a>
				<a href="#;">
							<span class="tag secondary">2024</span>
				  <div class="img"><img src="/pub/images/sub/img_webzine.jpg" alt=""></div>
				  <p class="stitle3">2024년 봄호</p>
				</a>
				<a href="#;">
							<span class="tag secondary">2024</span>
				  <div class="img"><img src="/pub/images/sub/img_webzine.jpg" alt=""></div>
				  <p class="stitle3">2024년 봄호</p>
				</a>
				<a href="#;">
							<span class="tag secondary">2024</span>
				  <div class="img"><img src="/pub/images/sub/img_webzine.jpg" alt=""></div>
				  <p class="stitle3">2024년 봄호</p>
				</a>
				<a href="#;">
							<span class="tag secondary">2024</span>
				  <div class="img"><img src="/pub/images/sub/img_webzine.jpg" alt=""></div>
				  <p class="stitle3">2024년 봄호</p>
				</a>
				<a href="#;">
							<span class="tag secondary">2024</span>
				  <div class="img"><img src="/pub/images/sub/img_webzine.jpg" alt=""></div>
				  <p class="stitle3">2024년 봄호</p>
				</a>
				<a href="#;">
							<span class="tag secondary">2024</span>
				  <div class="img"><img src="/pub/images/sub/img_webzine.jpg" alt=""></div>
				  <p class="stitle3">2024년 봄호</p>
				</a> -->
			</div>
		</div>
	</div>
<?}?>