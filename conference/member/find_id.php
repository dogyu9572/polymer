<?php include_once('../_head.php'); ?>
<div class="sub-top sub6">
	<div class="visual no-bread">
		<div class="title">
			<h2>로그인</h2>
			<h3>아이디찾기</h3>
		</div>
	</div>
</div>
<div class="contents">
  <div class="member-bg member">
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