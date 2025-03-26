<?php include_once ('../_head.php'); ?>
<?php $gNum="6"; $sNum="3"; $gName="마이페이지"; $sName="회비결제"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="result-wrap section">
		<div class="result-tit heading3 confirm"><b>결제 완료</b></div>
		<div class="applicate-wrap bg">
      <div class="info">
        <dl>
          <dt>결제 항목</dt>
          <dd>연회비(정회원/학생회비)</dd>
        </dl>
        <dl>
          <dt>결제 금액</dt>
          <dd class="apply-num">500,000원
            <button type="button" class="btn-xs outline-gray">영수증 출력</button>
          </dd>
        </dl>
      </div>
    </div>
    <!-- case 1 -->
    <div class="applicate-wrap">
      <p class="stitle2 f-bold">결제 정보</p>
      <div class="info top b-top mt-2">
        <dl>
          <dt>결제 수단</dt>
          <dd>신용카드</dd>
        </dl>
        <dl>
          <dt>결제 일시</dt>
          <dd class="apply-num">2024-09-01  15:23:12
            <button type="button" class="btn-xs outline-gray">카드전표 출력</button>
          </dd>
        </dl>
      </div>
			<div class="info">
				<dl>
					<dt>이름</dt>
					<dd>홍길동</dd>
				</dl>
				<dl>
					<dt>소속</dt>
					<dd>한국고분자학회</dd>
				</dl>
				<dl>
					<dt>이메일</dt>
					<dd>hong@naver.com</dd>
				</dl>
				<dl>
					<dt>연락처</dt>
					<dd>02-1234-5678</dd>
				</dl>
				<dl>
					<dt>휴대전화</dt>
					<dd>010-4567-8978</dd>
				</dl>
				<dl>
					<dt>남기실 말씀</dt>
					<dd>앞으로 고분자학회에 많이 참석하겠습니다. 잘 부탁 드립니다.</dd>
				</dl>
			</div>
		</div>
    <!-- case 2 -->
    <div class="applicate-wrap">
      <p class="stitle2 f-bold">결제 정보</p>
      <p class="mt-1 mb-3">학회 사무국에서 온라인 입금확인 후 납부 처리를 완료합니다.</p>
      <div class="info top b-top mt-2">
        <dl>
          <dt>결제 수단</dt>
          <dd>온라인 입금</dd>
        </dl>
        <dl>
          <dt>입금하실 곳</dt>
          <dd>
            <span class="t-divide">한국고분자 학회</span>
            <span class="t-divide">우리은행</span><br class="show-mo">
            <span>123-05-015858</span>
          </dd>
        </dl>
      </div>
			<div class="info">
				<dl>
					<dt>이름</dt>
					<dd>홍길동</dd>
				</dl>
				<dl>
					<dt>소속</dt>
					<dd>한국고분자학회</dd>
				</dl>
				<dl>
					<dt>이메일</dt>
					<dd>hong@naver.com</dd>
				</dl>
				<dl>
					<dt>연락처</dt>
					<dd>02-1234-5678</dd>
				</dl>
				<dl>
					<dt>휴대전화</dt>
					<dd>010-4567-8978</dd>
				</dl>
				<dl>
					<dt>남기실 말씀</dt>
					<dd>앞으로 고분자학회에 많이 참석하겠습니다. 잘 부탁 드립니다.</dd>
				</dl>
			</div>
		</div>
		<div class="group-btn">
			<a href="/" class="btn-md outline-dark">메인으로</a>
			<a href="/mypage/mypage_2.php" class="btn-md">회비납부내역</a>
		</div>
	</div> 
</div>
<?php include_once ('../_tail.php'); ?>