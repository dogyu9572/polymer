<?php include_once ('../_head.php'); ?>
<?php $gNum="7"; $sNum="4"; $gName="회원"; $sName="비밀번호찾기"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents">
  <div class="inner">
    <div class="tabs-type1">
			<button type="button" class="current">비밀번호찾기</button>
			<div class="list">
				<button type="button" onclick="location.href='join_1.php'">회원가입</button>
				<button type="button" onclick="location.href='login.php'">로그인</button>
				<button type="button" onclick="location.href='find_id.php'">아이디찾기</button>
				<button type="button" class="active">비밀번호찾기</button>
				<button type="button" onclick="location.href='pay.php'">게재료 결제</button>
			</div>
    </div>
  </div>
  <div class="member-wrap">
    <div class="content">
      <p class="heading2 line">비밀번호 변경 결과</p>
      <div class="bg-light sm">
        <p class="f-semibold">새로운 비밀번호를 입력해 주세요.</p>
      </div>
      <div class="form">
        <div class="row">
          <input type="password" placeholder="비밀번호">
        </div>
        <div class="row">
          <input type="password" placeholder="비밀번호 확인">
        </div>
      </div>
      <div class="group-btn">
        <a href="#;" class="btn-md">확인</a>
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