<?php include_once('../_head.php'); ?>
<?php $gNum="2"; $sNum="1"; $gName="학회활동"; $sName="학회상"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="result-wrap">
		<div class="result-tit heading3 confirm"><b>2024년도 추계 학회상</b><br> 등록이 <b>완료</b>되었습니다.</div>
		<div class="applicate-wrap">
			<p class="tit">접수정보</p>
			<div class="info">
				<dl>
					<dt>학회상</dt>
					<dd>상암고분자상</dd>
				</dl>
				<dl>
					<dt>접수 일시</dt>
					<dd>2024-08-01 15:12</dd>
				</dl>
				<dl>
					<dt>접수 번호</dt>
					<dd class="apply-num">
						<span id="copyTarget">123-456-7890</span>
						<button type="button" class="btn-copy" onclick="copyNumber()">
							<span class="ico-before"><img src="/pub/images/ico/ico_copy.svg" alt=""></span>Copy Number
						</button>
					</dd>
				</dl>
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
			<div class="t-ps">* 접수번호는 접수 조회 시 필요하므로 반드시 기억해 주세요. (이메일 발송)</div>
		</div>
		<div class="group-btn">
			<a href="/" class="btn-lg outline">메인으로</a>
			<a href="/act/act_16.php" class="btn-lg">접수확인</a>
		</div>
	</div>
</div>
<?php include_once('../_tail.php'); ?>