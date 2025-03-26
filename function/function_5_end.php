<?php include_once('../_head.php'); ?>
<?php $gNum="3"; $sNum="5"; $gName="학회행사"; $sName="부문위원회 세미나"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="board-title">
		<p class="heading3">세미나/워크숍 행사명이 표출됩니다.</p>
		<div class="info">
			<p><span class="t-secondary t-divide">일시</span>2024.01.02 ~ 2024.02.01</p>
			<p><span class="t-secondary t-divide">장소</span>부산 벡스코</p>
		</div>
	</div>
	<div class="tab-container">
		<div class="tab-content">
			<!-- s: 등록 확인 -->
			<div class="result-wrap section">
				<div class="result-tit heading3 confirm">등록이 <b>완료</b>되었습니다.</div>
				<div class="applicate-wrap">
					<div class="tit">
						<p>접수정보</p>
					</div>
					<div class="info p-2">
						<dl>
							<dt>접수 일시</dt>
							<dd>2024-08-01 15:12</dd>
						</dl>
						<dl>
							<dt>접수 번호</dt>
							<dd class="apply-num">
								polumer2408011311
								<button type="button" class="btn-copy">
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
				</div>
				<div class="group-btn">
					<a href="/" class="btn-lg outline-dark">메인으로</a>
					<a href="#;" class="btn-lg">등록확인 페이지로</a>
				</div>
			</div>
			<!-- e: 등록 확인 -->
		</div>
	</div>
</div>
<?php include_once('../_tail.php'); ?>