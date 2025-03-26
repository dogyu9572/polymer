<?php include_once('../_head.php'); ?>
<?php $gNum="6"; $sNum="5"; $gName="마이페이지"; $sName="확인서/영수증"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">확인서/영수증</button>
		<div class="list">
			<button type="button" onclick="location.href='mypage_1.php'">회원정보수정</button>
			<button type="button" onclick="location.href='mypage_2.php'">회비납부내역</button>
			<button type="button" onclick="location.href='mypage_3.php'">회비결제</button>
			<button type="button" onclick="location.href='mypage_4.php'">회원활동(임원)</button>
			<button type="button" class="active">확인서/영수증</button>
		</div>
	</div>
	<div class="period-flex">
		<div class="period-wrap">
			<p class="f-medium">납부일</p>
			<div class="period">
				<input type="date">
				<span class="t-secondary">~</span>
				<input type="date">
			</div>
		</div>
		<div class="p_area">
			<p class="t-warn">행사종료후: 참가증명원, 발표증명원, 수료증, 상장</p>
			<p class="t-warn">입금완료 후: 등록확인증, 영수증, 거래명세서</p>
		</div>
	</div>
	<div class="table-box m-table mypage5">
		<div class="head">
			<div class="row">
				<div class="w-6">행사명</div>
				<div class="w-4">일시</div>
				<div class="w-2">장소</div>
				<div class="w-2">납부일</div>
				<div class="print">
					<p>증명서 출력</p>
					<div class="row">
						<div>등록확인증</div>
						<div>영수증</div>
						<div>거래명세서</div>
						<div>참가증명원</div>
						<div>발표증명원</div>
						<div>수료증</div>
						<div>상장</div>
					</div>
				</div>
			</div>
		</div>
		<div class="body">
			<div class="row">
				<div class="w-6">
					<div class="label">행사명</div>
					<div class="cont">2024년도 추계 정기총회 및 학술대회</div>
				</div>
				<div class="w-4">
					<div class="label">일시</div>
					<div class="cont">2024년 9월 30일 ~ 2024년 10월 2일</div>
				</div>
				<div class="w-2">
					<div class="label">장소</div>
					<div class="cont">부산컨벤션센터</div>
				</div>
				<div class="w-2">
					<div class="label">등록</div>
					<div class="cont">2024.07.30</div>
				</div>
				<div class="row print">
					<div class="label">증명서 출력</div>
					<div>
						<div class="label">등록확인증</div>
						<a href="/print/registration_confirmation.html" target="_blank" class="btn-sm outline hover">PDF</a>
					</div>
					<div>
						<div class="label">영수증</div>
						<a href="/print/receipt.html" target="_blank" class="btn-sm outline hover">PDF</a>
					</div>
					<div>
						<div class="label">거래명세서</div>
						<a href="/print/transaction_statement.html" target="_blank" class="btn-sm outline hover">PDF</a>
					</div>
					<div>
						<div class="label">참가증명원</div>
						<a href="/print/certificate_participation.html" target="_blank" class="btn-sm outline hover">PDF</a>
					</div>
					<div>
						<div class="label">발표증명원</div>
						<a href="/print/proof_presentation.html" target="_blank" class="btn-sm outline hover">PDF</a>
					</div>
					<div>
						<div class="label">수료증</div>
						<a href="/print/certificate_completion.html" target="_blank" class="btn-sm outline hover">PDF</a>
					</div>
					<div>
						<div class="label">상장</div>
						<a href="/print/best_paper.html" target="_blank" class="btn-sm outline hover">PDF</a>
					</div>
				</div>
			</div>
		</div>
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
</script>
<?php include_once('../_tail.php'); ?>