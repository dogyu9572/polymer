<?php include_once ('../_head.php'); ?>
<?php $gNum="3"; $sNum="5"; $gName="학회행사"; $sName="부문위원회 세미나"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="result-wrap section">
		<div class="result-tit heading3 confirm"><b>결제 완료</b></div>
		<div class="applicate-wrap bg">
			<div class="info">
				<dl>
					<dt>결제 항목</dt>
					<dd>세미나참가비용</dd>
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
		<div class="applicate-wrap pay-wrap">
			<div class="tit">
				<p>결제 정보</p>
			</div>
			<div class="info top">
				<dl>
					<dt>결제 수단</dt>
					<dd>신용카드</dd>
				</dl>
				<dl>
					<dt>결제 일시</dt>
					<dd class="apply-num">2024-09-01 15:23:12
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
			</div>
		</div>
		<!-- case 2 -->
		<div class="applicate-wrap pay-wrap">
			<div class="tit">
				<p>결제 정보</p>
				<span>학회 사무국에서 온라인 입금확인 후 납부 처리를 완료합니다.</span>
			</div>
			<div class="info top">
				<dl>
					<dt>결제 수단</dt>
					<dd>온라인 입금</dd>
				</dl>
				<dl>
					<dt>결제 일시</dt>
					<dd>2024-09-01 15:23:12</dd>
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
			</div>
		</div>
		<div class="group-btn">
			<a href="/" class="btn-lg outline-dark">메인으로</a>
			<a href="/conference/register/register_22.php" class="btn-lg">등록확인 페이지로</a>
		</div>
	</div>
</div>
<?php include_once ('../_tail.php'); ?>