<?php include_once('../_head.php'); ?>
<?php $gNum="7"; $sNum="2"; $gName="회원"; $sName="로그인"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents">
	<div class="inner">
		<div class="tabs-type1">
			<button type="button" class="current">로그인</button>
			<div class="list">
				<button type="button" onclick="location.href='join_1.php'">회원가입</button>
				<button type="button" class="active">로그인</button>
				<button type="button" onclick="location.href='find_id.php'">아이디찾기</button>
				<button type="button" onclick="location.href='find_pwd.php'">비밀번호찾기</button>
				<button type="button" onclick="location.href='pay.php'">게재료 결제</button>
			</div>
		</div>
	</div>
	<div class="member-wrap login">

		<div class="content">
			<p class="heading2 line"><span></span>회원 로그인</p>
			<div class="form">
				<div class="row">
					<input type="text" placeholder="아이디">
				</div>
				<div class="row">
					<input type="password" placeholder="비밀번호">
				</div>
			</div>
			<div class="group-btn">
				<a href="#;" class="btn-md">로그인</a>
			</div>
			<div class="login-btm">
				<p class="checkbox">
					<input type="checkbox" name="" id="auto_save">
					<label for="auto_save">아이디 저장</label>
				</p>
				<div class="find">
					<a href="#;" class="t-divide">아이디 찾기</a>
					<a href="#;">비밀번호 찾기</a>
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