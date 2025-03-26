<?php include_once('../_head.php'); ?>
<?php $gNum="9"; $gName="상금 수령 정보 입력하기"; $sName="상금 수령 정보 입력하기"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents">
	
	<div class="inner">
		<div class="stitle2 tac">{학술대회명} 우수논문발표상 상금 수령 정보 입력</div>

		<div class="check-wrap bg-light">
			<div class="row">
				<p class="label">이름</p>
				<div class="cont"><input type="text"></div>
			</div>
			<div class="row">
				<p class="label">소속</p>
				<div class="cont"><input type="text"></div>
			</div>
			<div class="row">
				<p class="label">연락처</p>
				<div class="cont"><input type="text"></div>
			</div>
			<div class="row">
				<p class="label">주민등록번호</p>
				<div class="cont"><input type="text"></div>
			</div>
			<div class="row">
				<p class="label">주민등록상 주소</p>
				<div class="cont"><input type="text"></div>
			</div>
			<div class="row">
				<p class="label">금액</p>
				<div class="cont">수상구분에 따라 자동으로 불려와짐</div>
			</div>
			<div class="row">
				<p class="label">은행</p>
				<div class="cont"><input type="text"></div>
			</div>
			<div class="row">
				<p class="label">계좌</p>
				<div class="cont"><input type="text"></div>
			</div>
			<p>본인은 상기 금액을 {학술대회명} 우수논문발표상 상금으로 정히 영수합니다.</p>
			<div class="row">
				<p class="label">날짜</p>
				<div class="cont"><div id="today"></div></div>
			</div>
			<div class="row">
				<p class="label">서명</p>
				<div class="cont file_input">
					<label class="filebutton">
						<span>파일찾기</span>
						<input type="file" name="egovComFileUploader" class="searchfile" title="파일 찾기">
					</label>
					<div class="filebox"></div>
				</div>
			</div>
			<p>※ 본인은 학회 운영을 위해 본인의 개인정보 및 고유식별정보를 귀 학회가 수집∙이용하는데 대해 충분히 이해하고 이에 동의합니다.<a href="javascript:void(0);" class="btn" onclick="showModal('terms'); return false">내용 보기</a></p>
			<div class="check-btm tac">
				<p class="checkbox size-rg"><input type="checkbox" name="check" id="check_1"><label for="check_1">동의</label></p>
				<p class="checkbox size-rg"><input type="checkbox" name="check" id="check_2"><label for="check_2">비동의</label></p>
			</div>
			<button type="button" class="btn-rg w-18">입력</button>
		</div>
	</div>
</div>

<!-- s: Modal -->
<div class="modal-wrap" data-modal-name="terms">
	<div class="modal-inner wide speaker-modal">
		<div class="modal-body terms_area">
			<div class="tit">1. 개인정보의 수집‧이용 동의</div>
			<div class="con">본인은 상금 수령과 관련하여 다음의 개인정보를 (사)한국고분자학회에 제공하고 활용하는 것에 대하여 내용을 이해하고 이에 동의합니다.<br>
				○ 수집‧이용목적<br>
				- 상금 지급, 소득별 지급명세 제출로 활용합니다.<br>
				○ 수집‧이용할 개인정보 항목<br>
				- 필수정보(성명, 소속, 연락처, 주민등록번호, 자택주소, 은행명/계좌번호)<br>
				○ 보유‧이용기간<br>
				- 위 개인정보는 수집‧이용에 관한 동의일로부터 1년(12개월)간 보유‧이용되며 기간 경과 후 지체 없이 파기합니다.<br>
				○ 동의를 거부할 권리 및 동의를 거부할 경우의 불이익<br>
				- 개인정보 제공 및 활용 동의를 거부할 수 있으나, 미동의 시 해당 금액이 미지급될 수 있음을 유념하시기 바랍니다.
			</div>
			<div class="tit">2. 고유식별정보의 수집‧이용 동의</div>
			<div class="con">본인은 상금 수령과 관련하여 다음의 고유식별정보를 (사)한국고분자학회에 제공하고 활용하는 것에 대하여 내용을 이해하고 이에 동의합니다.<br>
				○ 수집‧이용목적<br>
				- 상금 지급, 소득별 지급명세 제출로 활용합니다.[주민등록번호 처리 법령 근거: 「소득세법」제 164조(지급명세서의 제출)]<br>
				○ 수집‧이용할 개인정보 항목<br>
				- 주민등록번호, 외국인등록번호<br>
				○ 보유‧이용기간<br>
				- 위 개인정보는 수집‧이용에 관한 동의일로부터 1년(12개월)간 보유‧이용되며 기간 경과 후 지체 없이 파기합니다.<br>
				○ 동의를 거부할 권리 및 동의를 거부할 경우의 불이익<br>
				- 개인정보 제공 및 활용 동의를 거부할 수 있으나, 미동의 시 해당 금액이 미지급될 수 있음을 유념하시기 바랍니다.
			</div>
		</div>
		<button type="button" class="close" onclick="closeModal();" title="팝업 닫기"></button>
	</div>
</div>

<style>
.breadcrumb .loca + .loca {display: none;}
</style>
<script type="text/javascript">
$(".searchfile").on('change',function(){
    val = $(this).val().split("\\");
    f_name = val[val.length-1]; 
    s_name = f_name.substring(f_name.length-4, f_name.length);
    $(this).parent().siblings('.filebox').html(f_name);
});
</script>

<?php include_once('../_tail.php'); ?>