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
      <p class="heading2 line">아이디 찾기</p>
      <div class="bg-light sm">
        <p class="ico-certify"><span class="f-semibold">회원가입 시 입력한 정보로 인증</span>을 진행해 주세요.</p>
      </div>
      <div class="form">
        <div class="row">
          <input type="text" placeholder="이름을 입력해 주세요">
        </div>
        <div class="row">
          <input type="email" placeholder="이메일을 입력해 주세요">
        </div>
      </div>
      <div class="group-btn">
        <a href="result_id.php" class="btn-md">아이디 찾기</a>
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