<?php include_once('../_head.php'); ?>
<?php $gNum="3"; $sNum="7"; $gName="학회행사"; $sName="확인서/영수증"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<!-- <div class="tabs-type1">
		<button type="button" class="current"><?=$sName?></button>
		<div class="list">
			<button type="button" onclick="location.href='/function/function_1.php'" class="<?if($sNum=="02"){?>active<?}?>">국내학술대회</button>
			<button type="button" onclick="location.href='/function/function_2.php'" class="<?if($sNum=="03"){?>active<?}?>">국제학술대회</button>
			<button type="button" onclick="location.href='/function/function_3.php'" class="<?if($sNum=="04"){?>active<?}?>">세미나/워크숍</button>
			<button type="button" onclick="location.href='/function/function_4.php'" class="<?if($sNum=="05"){?>active<?}?>">부문위원회 세미나</button>
			<button type="button" onclick="location.href='/function/function_6.php'" class="<?if($sNum=="06"){?>active<?}?>">초록집 모음</button>
			<button type="button" onclick="location.href='/function/function_7.php'" class="<?if($sNum=="07"){?>active<?}?>">확인서/영수증</button>
		</div>
	</div> -->

	<!-- 로그인 안했을 때에는 /member/login_nomember.php로 보내기 -->
	<div class="period-flex">
		<div class="period-wrap">
			<p class="f-medium">납부일</p>
			<div class="period">
				<input type="date">
				<span class="t-secondary">~</span>
				<input type="date">
			</div>
		</div>
		<p class="t-warn">영수증 및 거래명세서는 입금 완료 처리 후 출력이 가능합니다.</p>
	</div>
	<div class="table-box m-table mypage5">
		<div class="head">
			<div class="row">
				<div class="w-6">행사명</div>
				<div class="w-4">일시</div>
				<div class="w-2">장소</div>
				<div class="w-2">등록</div>
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