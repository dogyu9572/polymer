<?php include_once ('../_head.php'); ?>
<div class="sub-top sub8">
	<div class="visual">
		<div class="title">
		<h3>한국고분자 학회 선거</h3>
		</div>
	</div>
</div>
<div class="contents vote-wrap">
  <div class="top">
    <p class="heading2">한국고분자학회 2025년 수석부회장 선거</p>
    <ul class="step">
      <li class="step-1 done">선거안내</li>
      <li class="step-2 current">인증키 발급 및 인증</li>
      <li class="step-3">투표 진행</li>
      <li class="step-4">결과확인</li>
    </ul>
  </div>
	<div class="member-wrap">
    <div class="content">
      <div class="write-wrap">
        <div class="title">
          <p class="stitle2 f-bold">인증키 발급 받기</p>
        </div>
        <div class="form write">
          <div class="row">
            <div class="label required">인증방식</div>
            <div class="cont">
              <p class="radio">
                <input type="radio" name="certify" id="certify1" checked>
                <label for="certify1">이메일</label>
              </p>
              <p class="radio">
                <input type="radio" name="certify" id="certify2">
                <label for="certify2">문자(SMS)</label>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="label required label1">이메일</div>
            <div class="cont input-btn">
              <input type="text" placeholder="01012341234">
              <button type="button" class="btn-rg outline hover">인증키 발급 받기</button>
            </div>
          </div>
          <div class="row">
            <div class="label required">인증키 입력</div>
            <div class="cont">
              <input type="text" placeholder="인증키를 입력해주세요">
            </div>
          </div>
        </div>
        <div class="txt_email mt-2">
			<div class="tit"><strong>주의사항 안내</strong></div>
        	<p class="t-warn size-rg">투표가 중간에 중단될 경우 새로고침 후 페이지에 재접속해 주시면 투표가 가능합니다.</p>
        	<p class="t-warn size-rg">인증키를 확인하시고 인증키 입력란에 인증키를 입력하여 주십시오.</p>
        	<p class="t-warn size-rg">인증키가 오지 않으셨으면 <span class="f-semibold">스팸메일함</span>을 확인해 주세요.</p>
        </div>
      </div>
      <div class="group-btn">
        <a href="vote_4.php" class="btn-md">인증하기</a>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    function updateCertification(type) {
        let labelText = type === 'email' ? "이메일" : "문자(SMS)";
        let placeholderText = type === 'email' ? "이메일을 입력해 주세요" : "휴대폰 번호를 입력해 주세요";

        // 라벨 텍스트 변경
        $(".label1").text(labelText);

        // 기존 input의 placeholder 값만 변경 (위치 유지)
        $(".input-btn input").attr("placeholder", placeholderText).val('');
    }

    // 초기 설정 (이메일 선택 상태)
    updateCertification('email');

    // 라디오 버튼 클릭 이벤트
    $("#certify1").click(function() {
        updateCertification('email');
    });

    $("#certify2").click(function() {
        updateCertification('sms');
    });
});
</script>

<?php include_once ('../_tail.php'); ?>
