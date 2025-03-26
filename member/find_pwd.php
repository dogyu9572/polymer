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
      <p class="heading2 line">비밀번호 찾기</p>
      <div class="bg-light sm">
        <p class="ico-email f-semibold">이메일로 임시비밀번호가 발송됩니다.</p>
        <p class="size-rg mt-1">비밀번호 찾기 후 반드시 홈페이지에서 비밀번호를 수정하시기 바랍니다.</p>
      </div>
      <div class="form">
        <div class="row">
          <input type="text" placeholder="아이디">
        </div>
        <div class="row">
          <input type="text" placeholder="이름">
        </div>
        <div class="row">
          <input type="email" placeholder="이메일">
        </div>
      </div>
      <div class="group-btn">
		'--------------- 인증 성공시 ---------------'
        <button type="button" onclick="alert('이메일로 임시 비밀번호가 발송되었습니다.');" class="btn-md">이메일 인증</button>
		'--------------- 인증 실패시 ---------------'
        <button type="button" onclick="alert('비밀번호가 일치하지 않습니다.');" class="btn-md">이메일 인증</button>
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
