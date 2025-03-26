<?php include_once('../_head.php'); ?>
<?php $gNum="6"; $sNum="4"; $gName="마이페이지"; $sName="회원활동(임원)"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">회원활동(임원)</button>
		<div class="list">
			<button type="button" onclick="location.href='mypage_1.php'">회원정보수정</button>
			<button type="button" onclick="location.href='mypage_2.php'">회비납부내역</button>
			<button type="button" onclick="location.href='mypage_3.php'">회비결제</button>
			<button type="button" class="active">회원활동(임원)</button>
			<button type="button" onclick="location.href='mypage_5.php'">확인서/영수증</button>
		</div>
	</div>
	<div class="section sm">
		<div class="bg-light">
			<p class="body1">임원활동 기록은 전년도까지의 내역만 확인하실 수 있습니다.</p>
			<p class="body1 f-semibold">이전 내역이 필요하신 경우 사무국으로 연락 부탁드립니다.</p>
			<div class="ico-info mt-6">
				<p>
					<span class="call"><a href="tel:025683860">02-568-3860</a></span>
					<span class="email"><a href="mailto:polymer@polymer.or.kr">polymer@polymer.or.kr</a></span>
				</p>
			</div>
		</div>
	</div>
	<div class="section sm">
		<div class="form-right mb-5">
			<div class="search-wrap">
				<input type="text" placeholder="검색어를 입력하세요.">
				<button type="button" title="검색"></button>
			</div>
		</div>
		<div class="table-box m-table">
			<div class="head">
				<div class="row">
					<div class="w-6">구분</div>
					<div class="w-6">직책</div>
					<div class="w-6">임기</div>
					<div class="w-6">출력</div>
				</div>
			</div>
			<div class="body">
				<div class="row">
					<div class="w-6">
						<div class="label">구분</div>
						<div class="cont">펠로우 회원</div>
					</div>
					<div class="w-6">
						<div class="label">직책</div>
						<div class="cont">2023년도 선정 펠로우 회원</div>
					</div>
					<div class="w-6">
						<div class="label">임기</div>
						<div class="cont">2023-01-01 ~ 종신</div>
					</div>
					<div class="w-6">
						<div class="label">출력</div>
						<div class="cont"><a href="/print/letter_appointment.html" target="_blank" class="btn-sm outline hover">위촉장</a></div>
					</div>
				</div>
				<div class="row">
					<div class="w-6">
						<div class="label">구분</div>
						<div class="cont">펠로우 회원</div>
					</div>
					<div class="w-6">
						<div class="label">직책</div>
						<div class="cont">2023년도 선정 펠로우 회원</div>
					</div>
					<div class="w-6">
						<div class="label">임기</div>
						<div class="cont">2023-01-01 ~ 종신</div>
					</div>
					<div class="w-6">
						<div class="label">출력</div>
						<div class="cont"><a href="/print/letter_appointment.html" target="_blank" class="btn-sm outline hover">위촉장</a></div>
					</div>
				</div>
				<div class="row">
					<div class="w-6">
						<div class="label">구분</div>
						<div class="cont">펠로우 회원</div>
					</div>
					<div class="w-6">
						<div class="label">직책</div>
						<div class="cont">2023년도 선정 펠로우 회원</div>
					</div>
					<div class="w-6">
						<div class="label">임기</div>
						<div class="cont">2023-01-01 ~ 종신</div>
					</div>
					<div class="w-6">
						<div class="label">출력</div>
						<div class="cont"><a href="/print/letter_appointment.html" target="_blank" class="btn-sm outline hover">위촉장</a></div>
					</div>
				</div>
				<div class="row">
					<div class="w-6">
						<div class="label">구분</div>
						<div class="cont">펠로우 회원</div>
					</div>
					<div class="w-6">
						<div class="label">직책</div>
						<div class="cont">2023년도 선정 펠로우 회원</div>
					</div>
					<div class="w-6">
						<div class="label">임기</div>
						<div class="cont">2023-01-01 ~ 종신</div>
					</div>
					<div class="w-6">
						<div class="label">출력</div>
						<div class="cont"><a href="/print/letter_appointment.html" target="_blank" class="btn-sm outline hover">위촉장</a></div>
					</div>
				</div>
				<div class="row">
					<div class="w-6">
						<div class="label">구분</div>
						<div class="cont">펠로우 회원</div>
					</div>
					<div class="w-6">
						<div class="label">직책</div>
						<div class="cont">2023년도 선정 펠로우 회원</div>
					</div>
					<div class="w-6">
						<div class="label">임기</div>
						<div class="cont">2023-01-01 ~ 종신</div>
					</div>
					<div class="w-6">
						<div class="label">출력</div>
						<div class="cont"><a href="/print/letter_appointment.html" target="_blank" class="btn-sm outline hover">위촉장</a></div>
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