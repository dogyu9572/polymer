<?php include_once ('../_head.php'); ?>
<?php $gNum="3"; $sNum="2"; $gName="Call for Abstract"; $sName="Registration"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="section regi-step">
		<div class="first done">초록 입력</div>
		<div class="second done">초록 확인</div>
		<div class="third current">제출 완료</div>
	</div>
	<div class="result-wrap section">
		<div class="result-tit heading3 confirm">초록제출이 <b>완료</b>되었습니다.</div>
		<div class="applicate-wrap">
			<p class="tit">접수정보</p>
			<div class="info">
				<!-- <dl>
					<dt>학회상</dt>
					<dd>상암고분자상</dd>
				</dl> -->
				<dl>
					<dt>접수 일시</dt>
					<dd>2024-08-01   15:12</dd>
				</dl>
				<!-- <dl>
					<dt>접수 번호</dt>
					<dd class="apply-num">
						polumer2408011311
						<button type="button" class="btn-copy">
							<span class="ico-before"><img src="/pub/images/ico/ico_copy.svg" alt=""></span>Copy Number
						</button>
					</dd>
				</dl> -->
				<dl>
					<dt>이름</dt>
					<dd>홍길동</dd>
				</dl>
				<dl>
					<dt>연락처</dt>
					<dd>02-1234-5678</dd>
				</dl>
				<dl>
					<dt>이메일</dt>
					<dd>hong@naver.com</dd>
				</dl>
			</div>
		</div>
		<div class="group-btn">
			<a href="/conference/" class="btn-lg outline-dark">메인으로</a>
			<a href="/conference/abstract/abstract_31.php" class="btn-lg">검색 및 수정 페이지로</a>
		</div>
	</div>
</div>
<?php include_once ('../_tail.php'); ?>