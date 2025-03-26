<?php include_once('../_head.php'); ?>
<?php $gNum="2"; $sNum="2"; $gName="Program"; $sName="Sessions"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents">
	<div class="inner mb-10">
		<div class="form-right">
			<div class="search-wrap">
				<input type="text" placeholder="검색어를 입력하세요.">
				<button type="button" title="검색"></button>
			</div>
		</div>
	</div>
	<div class="tab-container inner">
		<div class="tab-content">
			<div class="mb-6">
				<a href="/conference/program/program_2.php" class="btn-rg back hover">Back to Sessions</a>
			</div>
			<div class="session-second">
				<p class="body1 f-semibold">기조강연</p>
				<div class="list">
					<div class="session-box_area">
						<a href="/conference/program/program_23.php" class="session-box">
							<div class="top">
								<span class="c-primary">A1456-1am</span>
							</div>
							<p class="stitle2">고분자합성 (I)</p>
							<ul class="bullet-gray t-secondary">
								<li>Mon. Mar 18, 2024 10:00 AM - 11:30 AM JST</li>
								<li>Room A - 11F</li>
								<li>Chair : Hideko hong, gil dong</li>
							</ul>
						</a>
						<a href="#this" class="btn_online btn-rg outline hover">LIVE</a>
					</div>
					<div class="session-box_area">
						<a href="/conference/program/program_23.php" class="session-box">
							<div class="top">
								<span class="c-primary">A1456-1am</span>
							</div>
							<p class="stitle2">기능성 고분자 (I)</p>
							<ul class="bullet-gray t-secondary">
								<li>Mon. Mar 18, 2024 10:00 AM - 11:30 AM JST</li>
								<li>Room A - 11F</li>
								<li>Chair : Hideko hong, gil dong</li>
							</ul>
						</a>
						<a href="#this" class="btn_online btn-rg outline hover">LIVE</a>
					</div>
					<div class="session-box_area">
						<a href="/conference/program/program_23.php" class="session-box">
							<div class="top">
								<span class="c-primary">A1456-1am</span>
							</div>
							<p class="stitle2">기능성 고분자 (II)</p>
							<ul class="bullet-gray t-secondary">
								<li>Mon. Mar 18, 2024 10:00 AM - 11:30 AM JST</li>
								<li>Room A - 11F</li>
								<li>Chair : Hideko hong, gil dong</li>
							</ul>
						</a>
						<a href="#this" class="btn_online btn-rg outline hover">LIVE</a>
					</div>
					<div class="session-box_area">
						<a href="/conference/program/program_23.php" class="session-box">
							<div class="top">
								<span class="c-primary">A1456-1am</span>
							</div>
							<p class="stitle2">02. Education and History of Chemistry</p>
							<ul class="bullet-gray t-secondary">
								<li>Mon. Mar 18, 2024 10:00 AM - 11:30 AM JST</li>
								<li>Room A - 11F</li>
								<li>Chair : Hideko hong, gil dong</li>
							</ul>
						</a>
						<a href="#this" class="btn_online btn-rg outline hover">LIVE</a>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-content">
			Poster
		</div>
	</div>
</div>
<script>
	// tabs
	$(document).ready(function() {
		$(".tabs-type4 button").click(function() {
			var index = $(this).index();
			$(".tabs-type4 button").removeClass("active");
			$(this).addClass("active");
			$(".tab-container .tab-content").hide();
			$(".tab-container .tab-content").eq(index).show();
		});
	});
</script>
<?php include_once('../_tail.php'); ?>