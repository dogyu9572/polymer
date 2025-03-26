<?php include_once ('../_head.php'); ?>
<?php $gNum="7"; $sNum="1"; $gName="회원"; $sName="회원가입"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">회원가입</button>
		<div class="list">
			<button type="button" class="active">회원가입</button>
			<button type="button" onclick="location.href='login.php'">로그인</button>
			<button type="button" onclick="location.href='find_id.php'">아이디찾기</button>
			<button type="button" onclick="location.href='find_pwd.php'">비밀번호찾기</button>
			<button type="button" onclick="location.href='pay.php'">게재료 결제</button>
		</div>
	</div>
  
	<div class="join_end">
		<div class="tit">회원가입이 <strong>완료</strong>되었습니다.<br/> 감사합니다.</div>
		<div class="group-btn">
			<a href="/" class="btn-md outline-gray">메인으로</a>
			<button type="button" class="btn-md" onclick="location.href='login.php'">로그인</button>
		</div>
	</div>

</div>

<script>
// tabs
$(document).ready(function () {
	$('.tabs-type1 .current').click(function () {
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

<?php include_once ('../_tail.php'); ?>
