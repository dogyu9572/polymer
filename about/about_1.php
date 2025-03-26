<?php include_once ('../_head.php'); ?>
<?php $gNum="1"; $sNum="1"; $gName="학회소개"; $sName="개관"; ?>
<?php include_once ('../_aside.php'); ?>

<div class="contents inner about11">
	<div class="banner section">
		<p>
			<b>고분자에 관한 화학, 물리학, 생물학, 공학</b><br>
			등에 관한 학문 및 기술의 발전을 위하여 설립되었다.
		</p>
	</div>
	<div class="section">
		<p class="tit-bullet">한국고분자학회는</p>
		<p class="body1">
		1976년 10월8일 한국과학원에서 180명이 참여한 가운데 창립총회를 가졌으며 초대 회장으로는 성좌경 박사가 선임되었다. <br>
		처음 발족 당시 회장단은 모두 14명이었는데 회장 1명, 부회장 2명, 감사 2명, 평이사 3명, 전무이사 1명, 총무이사 1명, 편집이사 1명, 재무이사 1명, 조직이사 1명, 기획이사 1명으로 구성되었다.
		</p>
		<p class="body1 mt-4">사회일반의 이익에 공여하기 위하여 공익법인의 설립운영에 관한 법률의 규정에 따라 고분자에 관한 화학, 물리학, 생물학, 공학 등에 관한 학문 및 기술의 발전 및 보급에 기여하고 고분자과학 및 고분자공업의 진흥에 이바지함을 목적으로 한다.</p>
	</div>
	<div class="section line">
		<p class="tit-bullet">설립 목적 </p>
		<p class="body1">현재 3가지의 간행물을 발행하고 있으며 국문논문집 "폴리머", 영문논문집 "Macromolecular Research" 그리고 기술소식지인
			"고분자 과학과 기술"이며 폴리머와 고분자과학과 기술은 격월로, Macromolecular Research은 매월 발행되고 있다. 특히, 영문논문집인 "Macromolecular Research"는 2002년부터 SCI에 등재되어 있다.</p>
	</div>
	<div class="section line">
		<p class="tit-bullet">구성 및 구성원</p>
		<div class="counting-wrap">
			<div class="counting">
				<div class="ico1"></div>
				<div class="btm">
					<div class="label">
						<p class="body1 f-semibold">지부</p>
						<span class="caption">(충청지부, 대구경북지부, 부산울산경남지부, 호남지부)</span>
					</div>
					<p class="number"><b data-target="4">0</b>개</p>
				</div>
			</div>
			<div class="counting">
				<div class="ico2"></div>
				<div class="btm">
					<div class="label">
						<p class="body1 f-semibold">위원회</p>
					</div>
					<p class="number"><b data-target="9">0</b>개</p>
				</div>
			</div>
			<div class="counting">
				<div class="ico3"></div>
				<div class="btm">
					<div class="label">
						<p class="body1 f-semibold">임원진</p>
					</div>
					<p class="number"><b data-target="120">0</b>여명</p>
				</div>
			</div>
			<div class="counting">
				<div class="ico4"></div>
				<div class="btm">
					<div class="label">
						<p class="body1 f-semibold">회원 수</p>
					</div>
					<p class="number"><b data-target="4500">0</b>여명</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function isElementInViewport(el) {
		const rect = el.getBoundingClientRect();
		return (
			rect.top < (window.innerHeight || document.documentElement.clientHeight) &&
			rect.bottom > 0 &&
			rect.left < (window.innerWidth || document.documentElement.clientWidth) &&
			rect.right > 0
		);
	}

	function countUp(element, target) {
		let current = 0;
		const increment = Math.ceil(target / 100);
		const interval = 20;
		const timer = setInterval(() => {
			current += increment;
			if (current >= target) {
				current = target;
				clearInterval(timer);
			}
			element.textContent = current.toLocaleString();
		}, interval);
	}

	function onScroll() {
		const counters = document.querySelectorAll(".counting-wrap b[data-target]");
		counters.forEach((counter) => {
			if (isElementInViewport(counter) && !counter.classList.contains("counted")) {
				const target = parseInt(counter.getAttribute("data-target"), 10);
				countUp(counter, target);
				counter.classList.add("counted");
			}
		});
	}

	window.addEventListener("scroll", onScroll);
	document.addEventListener("DOMContentLoaded", () => {
		onScroll();
	});
</script>
<?php include_once ('../_tail.php'); ?>