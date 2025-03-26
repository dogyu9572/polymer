<?php include_once ('../_head.php'); ?>
<?php $gNum="5"; $sNum="11"; $gName="공지ㆍ안내"; $sName="Q&A"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="section sm write-wrap qna">
		<div class="title">
      <p class="heading2">Q&A</p>
    </div>
    <div class="write">
      <div class="row input">
        <div class="label required">이름</div>
        <div class="cont">
          <div class="input-check">
            <input type="text" placeholder="이름을 작성해 주세요.">
            <p class="checkbox">
              <input type="checkbox" name="anony" id="anony">
              <label for="anony">익명</label>
            </p>
          </div>
        </div>
      </div>
      <div class="row input">
        <div class="label required">이메일</div>
        <div class="cont">
          <input type="email" placeholder="이메일을 입력해 주세요." class="w-full">
        </div>
      </div>
      <div class="row input">
        <div class="label required">제목</div>
        <div class="cont">
          <input type="text" placeholder="제목을 입력해 주세요." class="w-full">
        </div>
      </div>
      <div class="row input">
        <div class="label required">문의사항</div>
        <div class="cont">
          <textarea name="" id="" placeholder="문의사항을 입력해 주세요." rows="6"></textarea>
        </div>
      </div>
      <div class="row input">
        <div class="label required">비밀번호</div>
        <div class="cont">
          <div class="input-check">
            <input type="password" placeholder="비밀번호를 입력해 주세요.">
            <p class="checkbox">
              <input type="checkbox" name="pass" id="password">
              <label for="password">비밀글</label>
            </p>
          </div>
          <span class="t-warn">비밀번호는 수정 시 필요하기 때문에 반드시 기억해 주세요.</span>
        </div>
      </div>
      <div class="row input">
        <div class="label required">자동등록방지</div>
        <div class="cont">
          <div class="captcha">
            <div class="img"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSHZK8EoFtyQjLWH03G1MXmwm0Rmn8jMmefg&s" alt=""></div>
            <button type="button" title="새로고침"></button>
            <input type="text">
          </div>
        </div>
      </div>
      <div class="check-btm">
				<p class="checkbox">
					<input type="checkbox" name="agree" id="agree">
					<label for="agree">개인정보처리방침에 동의합니다.</label>
				</p>
				<a href="#;" class="t-under size-rg">내용보기</a>
			</div>
    </div>
  </div>
  <div class="section sm">
    <div class="group-btn">
      <button type="button" class="btn-md">문의하기</button>
    </div>
  </div>
</div>
<?php include_once ('../_tail.php'); ?>