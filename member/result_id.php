<?php include_once ('../_head.php'); ?>
<?php $gNum="7"; $sNum="3"; $gName="회원"; $sName="아이디찾기"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents">
	<div class="inner">
		<div class="tabs-type1">
				<button type="button" class="current">아이디찾기</button>
				<div class="list">
					<button type="button" onclick="location.href='join_1.php'">회원가입</button>
					<button type="button" onclick="location.href='login.php'">로그인</button>
					<button type="button" class="active">아이디찾기</button>
					<button type="button" onclick="location.href='find_pwd.php'">비밀번호찾기</button>
					<button type="button" onclick="location.href='pay.php'">게재료 결제</button>
				</div>
			</div>
		</div>
		<div class="member-wrap">
			<div class="content">
			<p class="heading2 line">아이디 찾기 결과</p>
			<div class="bg-light sm">
				<p>회원님의 아이디는 <span class="stitle1 c-primary">hong****</span> 입니다.</p>
			</div>
			<div class="group-btn">
				<a href="login.php" class="btn-md">로그인</a>
				<a href="find_pwd.php" class="btn-md outline-dark">비밀번호 찾기</a>
			</div>
		</div>

		---------결과가 없을 때 
		<div class="member-wrap">
			<div class="content">
			<p class="heading2 line">아이디 찾기 결과</p>
			<div class="bg-light sm">
				<p>입력하신 정보와 일치하는 아이디가 없습니다.</p>
				<p>기존에 회원가입하신 적이 있으시다면 학회로 연락바랍니다.</p>
				<p>02-568-3860</p>
			</div>
			<div class="group-btn">
				<a href="/member/find_id.php" class="btn-md">돌아가기</a>
			</div>
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