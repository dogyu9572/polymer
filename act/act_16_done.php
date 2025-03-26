<?php include_once('../_head.php'); ?>
<?php $gNum="2"; $sNum="1"; $gName="학회활동"; $sName="접수확인"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="section write-wrap">
		<div class="title">
			<p class="stitle1"><span class="num">1</span>접수자 기본정보</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label">접수일</div>
				<div class="cont">2024-08-01 13:11</div>
			</div>
			<div class="row input">
				<div class="label required">학회상</div>
				<div class="cont">
					<div class="select-wrap">
						<button type="button" class="select">학술상</button>
						<ul>
							<li><button type="button" class="option" selected>학술상</button></li>
							<li><button type="button" class="option">우수논문상</button></li>
							<li><button type="button" class="option">학술진보상</button></li>
							<li><button type="button" class="option">상암고분자상</button></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label required">이름</div>
				<div class="cont">
					<input type="text" placeholder="접수하시는 분의 이름을 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label required">연락처</div>
				<div class="cont">
					<input type="text" placeholder="접수하시는 분의 연락처를 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label required">이메일</div>
				<div class="cont">
					<input type="text" placeholder="연락 받으실 이메일을 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label required">비밀번호</div>
				<div class="cont inc-ts">
					<input type="text" placeholder="비밀번호를 입력해 주세요.">
					<span class="t-ps">* 비밀번호는 접수 조회 시 필요하기 때문에 반드시 기억해 주세요.</span>
				</div>
			</div>
			<div class="row input">
				<div class="label required">비밀번호 확인</div>
				<div class="cont inc-ts">
					<input type="text" placeholder="비밀번호를 다시 입력해 주세요.">
					<span class="t-ps">* 비밀번호가 일치하지 않습니다.</span>
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap">
		<div class="title">
			<p class="stitle1"><span class="num">2</span>필수 서류 양식 다운로드</p>
		</div>
		<div class="write">
			<div class="row">
				<div class="group-btn j-start">
					<a href="#;" download class="btn-rg outline hover w-18">대회 신청 양식
						<span class="ico-after"><img src="/pub/images/ico/ico_down_pdark.svg" alt=""></span>
					</a>
					<a href="#;" download class="btn-rg outline hover w-18">개인정보동의서
						<span class="ico-after"><img src="/pub/images/ico/ico_down_pdark.svg" alt=""></span>
					</a>
					<a href="#;" download class="btn-rg outline hover w-18">개인정보동의서
						<span class="ico-after"><img src="/pub/images/ico/ico_down_pdark.svg" alt=""></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap">
		<div class="title">
			<p class="stitle1"><span class="num">3</span>서류 제출</p>
			<p class="t-ps">* 제출된 서류는 수정이 불가합니다. 서류 제출 전 누락된 파일이 없는지 다시 한번 확인해 주세요.</p>
		</div>
		<div class="write">
			<div class="row file-upload">
				<label for="fileUpload" class="btn-rg outline hover">파일 첨부</label>
				<input type="file" id="fileUpload" style="display: none;">
				<div class="files">
					<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
					<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
					<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
				</div>
			</div>
		</div>
	</div>
	<div class="group-btn center">
		<a href="act_16.php" class="btn-md w-20 outline-gray">돌아가기</a>
		<a href="javascript:void(0);" class="btn-md w-20" onclick="confirmRedirect()">정보수정</a>
	</div>
</div>
<script>
	// tabs
	$(document).ready(function() {
		$('.tabs-type1 .current').click(function() {
			const tabs = $(this).closest('.tabs-type1');
			const list = tabs.find('.list');
			if (!tabs.hasClass('on')) {
				tabs.addClass('on');
				list.slideDown(200);
			} else {
				tabs.removeClass('on');
				list.slideUp(200);
			}
		});
	});

	function confirmRedirect() {
		if (confirm("정말로 정보를 수정하시겠습니까?")) {
			alert("수정되었습니다.");
			window.location.href = "act_16.php";
		}
	}
</script>
<?php include_once('../_tail.php'); ?>