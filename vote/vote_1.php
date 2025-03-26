<?php include_once('../_head.php'); ?>
<div class="sub-top sub8">
	<div class="visual">
		<div class="title">
			<h3>한국고분자학회 선거</h3>
		</div>
	</div>
</div>
<div class="contents inner vote-wrap">
	<div class="top">
		<p class="heading2">2025년도 수석부회장 선거</p>
		<ul class="step">
			<li class="step-1 current">선거안내</li>
			<li class="step-2">인증키 발급 및 인증</li>
			<li class="step-3">투표 진행</li>
			<li class="step-4">결과확인</li>
		</ul>
	</div>
	<div class="vote-index section">
		<div class="index">
			<dl>
				<dt>투표기간</dt>
				<dd>2024.08.16 00:00:00 ~ 2024.08.25 23:59:59</dd>
			</dl>
			<dl>
				<dt>개표 및 당선자 확정</dt>
				<dd>2024.08.16 00:00:00</dd>
			</dl>
		</div>
		<div class="desc ">
			(에디터 기능 링크 포함 모두 직접 입력해주세요) <br />
			한국고분자학회에서는 <strong class="linktxt">정관 14조</strong> 및 <strong class="linktxt">수석부회장 선출 규정</strong>에 의거하여 후보를 아래와 같이 확정하고 2025년 8월 16일부터 8월 25일까지 선거를 실시합니다.
		</div>
	</div>

	<div class="section terms_area">
		<div class="stitle1 mb-4">정관 14조</div>
		<div class="legal-wrap">
			<div class="scroll-gray">
<pre>내용확인필요
/about/about_4.php








</pre>
			</div>
		</div>
		<div class="stitle1 mt-4 mb-4">수석부회장 선출 규정</div>
		<div class="legal-wrap">
			<div class="scroll-gray">
<pre>내용확인필요
/about/about_4.php








</pre>
			</div>
		</div>
	</div>
	<div class="section sm">
		<p class="stitle1 mb-4">후보자</p>
		<div class="candidate">
			<div class="box">
				<div class="img"><img src="/pub/images/sub/candidate_sample.jpg" alt=""></div>
				<div class="text">
					<p class="stitle3">홍길동</p>
					<p><span class="t-divide t-secondary">소속</span>홍길대학교</p>
				</div>
				<a href="#;" class="btn-rg outline hover">이력서 및 소견서</a>
			</div>
			<div class="box">
				<div class="img"><img src="/pub/images/sub/candidate_sample.jpg" alt=""></div>
				<div class="text">
					<p class="stitle3">홍길동</p>
					<p><span class="t-divide t-secondary">소속</span>홍길대학교</p>
				</div>
				<a href="#;" class="btn-rg outline hover">이력서 및 소견서</a>
			</div>
			<div class="box">
				<div class="img"><img src="/pub/images/sub/candidate_sample.jpg" alt=""></div>
				<div class="text">
					<p class="stitle3">홍길동</p>
					<p><span class="t-divide t-secondary">소속</span>홍길대학교</p>
				</div>
				<a href="#;" class="btn-rg outline hover">이력서 및 소견서</a>
			</div>
			<div class="box">
				<div class="img"><img src="/pub/images/sub/candidate_sample.jpg" alt=""></div>
				<div class="text">
					<p class="stitle3">홍길동</p>
					<p><span class="t-divide t-secondary">소속</span>홍길대학교</p>
				</div>
				<a href="#;" class="btn-rg outline hover">이력서 및 소견서</a>
			</div>
		</div>
	</div>
	<div class="section sm">
		<div class="group-btn">
			<button type="button" class="btn-md btn_dues">투표하러 가기</button>
			<!-- <a href="vote_3.php" class="btn-md">투표하러 가기</a> -->
		</div>
	</div>
</div>

<!-- s: 평의원회비 미납부자 popup -->
<div class="popup" id="pop_dues">
	<div class="dm"></div>
	<div class="inbox">
		<div class="tit">평의원회비 미납부자</div>
		<div class="gbox"><strong>OOO 회원님</strong>께서는 평의원회비를 미납하셔서 <strong>한국고분자학회 oooo년도 수석부회장 선거</strong>에 참여하실 수 없습니다.<br>평의원회비를 납부하시고 투표를 진행해주시기 바랍니다.</div>
		<div class="btns">
			<button type="button" onclick="backModal(this);" class="btn-md outline-gray">취소</button>
			<button type="button" onclick="window.location.href='/vote/vote_3.php';" class="btn-md">확인</button>
		</div>
	</div>
</div>
<!-- e: 평의원회비 미납부자 popup -->

<script>
// tabs
$(document).ready(function() {
	$(".btn_dues").click(function(){
		$("#pop_dues").show();
	});
	$("#pop_dues .outline-gray,#pop_dues .dm").click(function(){
		$("#pop_dues").hide();
	});
});
</script>

<?php include_once('../_tail.php'); ?>