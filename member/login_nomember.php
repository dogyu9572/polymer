<?php include_once('../_head.php'); ?>
<?php $gNum="3"; $sNum="7"; $gName="학회행사"; $sName="확인서/영수증"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current"><?=$sName?></button>
		<div class="list">
			<button type="button" onclick="location.href='/function/function_1.php'" class="<?if($sNum=="02"){?>active<?}?>">국내학술대회</button>
			<button type="button" onclick="location.href='/function/function_2.php'" class="<?if($sNum=="03"){?>active<?}?>">국제학술대회</button>
			<button type="button" onclick="location.href='/function/function_3.php'" class="<?if($sNum=="04"){?>active<?}?>">세미나/워크숍</button>
			<button type="button" onclick="location.href='/function/function_4.php'" class="<?if($sNum=="05"){?>active<?}?>">부문위원회 세미나</button>
			<button type="button" onclick="location.href='/function/function_6.php'" class="<?if($sNum=="06"){?>active<?}?>">초록집 모음</button>
			<button type="button" onclick="location.href='/function/function_7.php'" class="<?if($sNum=="07"){?>active<?}?>">확인서/영수증</button>
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

		<div class="content">
			<p class="heading2 line"><span></span>비회원 로그인</p>
			<div class="form">
				<div class="row">
					<input type="text" placeholder="이메일 주소">
				</div>
				<div class="row">
					<input type="text" placeholder="이름">
				</div>
			</div>
			<div class="group-btn">
				<button type="button" class="btn-md" onclick="location.href='/function/function_7.php'">로그인</button>
			</div>
			<div class="login-btm">
				<p>입력하신 내용과 일치하는 정보가 없습니다.<br>기존에 등록하신 적이 있다면 학회로 연락바랍니다(02-568-3860).</p>
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