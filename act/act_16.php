<?php include_once('../_head.php'); ?>
<?php $gNum="2"; $sNum="1"; $gName="학회활동"; $sName="학회상"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">접수확인</button>
		<div class="list">
			<button type="button" onclick="location.href='/act/act_11.php'">학회상 안내</button>
			<button type="button" onclick="location.href='/act/act_12.php'">학회상 심사위원</button>
			<button type="button" onclick="location.href='/act/act_13.php'">역대 수상자</button>
			<button type="button" onclick="location.href='/act/act_14.php'">시상요강</button>
			<button type="button" onclick="location.href='/act/act_15.php'">온라인 접수</button>
			<button type="button" class="active" onclick="location.href='/act/act_16.php'">접수확인</button>
		</div>
	</div>
	<div class="result-wrap">
		<div class="result-tit heading3 docu">접수 확인을 위해<br><b>접수번호, 비밀번호</b>를 입력해 주세요.</div>
		<div class="form">
			<input type="text" placeholder="접수번호">
			<input type="password" placeholder="비밀번호">
		</div>
		<div class="group-btn">
			<a href="/" class="btn-lg outline">메인으로</a>
			<a href="/act/act_16_done.php" class="btn-lg">접수확인</a>
		</div>
		<div class="contact-box">
			<p class="body1 f-bold">접수번호, 비밀번호를 분실하신 경우<br>학회 사무국으로 연락 부탁드립니다.</p>
			<p class="caption mt-2">(접수번호는 이메일에서도 확인이 가능합니다)</p>
			<div class="contact">
				<p class="call">
					<a href="tel:025683860">02-568-3860</a>
				</p>
				<p class="email">
					<a href="mailto:polymer@polymer.or.kr">polymer@polymer.or.kr</a>
				</p>
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