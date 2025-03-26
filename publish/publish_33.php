<?php include_once ('../_head.php'); ?>
<?php $gNum="4"; $sNum="3"; $gName="발간물"; $sName="고분자 과학과 기술"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
		<a href="/publish/publish_32.php" class="btn-rg outline">
			Ebook 바로가기
			<span class="ico-after"><img src="/pub/images/ico/arr_right_pdark.svg" alt=""></span>
		</a>
	<div class="form-right">
		<div class="search-wrap">
			<input type="text" placeholder="검색어를 입력하세요.">
			<button type="button" title="검색"></button>
		</div>
	</div>
	<div class="acco-wrap">
		<div class="accordion">
			<button type="button" class="title">Volume 34 (2023)</button>
			<ul>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 5</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 4</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 3</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 2</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="accordion">
			<button type="button" class="title">Volume 33 (2022)</button>
			<ul>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 5</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 4</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="accordion">
			<button type="button" class="title">Volume 33 (2022)</button>
			<ul>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 5</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 4</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="accordion">
			<button type="button" class="title">Volume 33 (2022)</button>
			<ul>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 5</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 4</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="accordion">
			<button type="button" class="title">Volume 33 (2022)</button>
			<ul>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 5</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 4</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="accordion">
			<button type="button" class="title">Volume 33 (2022)</button>
			<ul>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 5</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
				<li>
					<a href="publish_34.php">
						<span class="number">Number 4</span>
						<span class="tit">Polym. Sci. Technol. 34(6), 464-551</span>
						<span class="date">Dec. 2023</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
<!-- 	<div class="t-center">
		<a href="/publish/publish_32.php" class="btn-rg outline-dark w-22">Back</a>
	</div> -->
</div>
<script>
	// accordion
	document.addEventListener("DOMContentLoaded", () => {
		const accordions = document.querySelectorAll(".accordion");
		accordions.forEach((accordion) => {
			const title = accordion.querySelector(".title");
			title.addEventListener("click", () => {
				accordions.forEach((otherAccordion) => {
					if (otherAccordion !== accordion) {
						const otherUl = otherAccordion.querySelector("ul");
						otherAccordion.classList.remove("active");
						otherUl.style.maxHeight = null;
					}
				});
				const ul = accordion.querySelector("ul");
				const isActive = accordion.classList.contains("active");
				if (isActive) {
					ul.style.maxHeight = null;
				} else {
					ul.style.maxHeight = ul.scrollHeight + "px"; 
				}
				accordion.classList.toggle("active", !isActive);
			});
		});
	});
</script>
<?php include_once ('../_tail.php'); ?>