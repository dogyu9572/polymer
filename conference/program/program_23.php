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
			<div class="session-second">
				<div class="mb-6">
					<a href="/conference/program/program_22.php" class="btn-rg back hover">Back to Sessions</a>
				</div>
				<!-- <div class="session-box dark">
					<div class="top">
						<span>A1456-1am</span>
						<a href="#;" class="btn-rg bookmark outline hover">bookmark</a>
					</div>
					<p class="stitle2">기능성 고분자 (I)</p>
					<ul class="bullet-gray t-secondary">
						<li>Mon. Mar 18, 2024 10:00 AM - 11:30 AM JST</li>
						<li>Room A - 11F</li>
						<li>Chair : Hideko hong, gil dong</li>
					</ul>
				</div> -->
				<div class="session-second">
					<p class="mb-6"><span class="c-primary f-semibold">240</span> result</p>
					<div class="session-box">
						<div class="top">
							<div class="info">
								<span class="time">10:00 AM - 10:10 AM JST (1:00 AM - 1:10 AM UTC)</span>
							</div>
							<a href="#;" class="btn-rg bookmark outline hover">bookmark</a>
						</div>
						<p class="f-medium">[A1456-1am-01] <i class="awd">우수논문발표상 수상자</i></p>
						<a href="/conference/program/program_24.php" class="stitle2 overflow">발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다.
							발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다.</a>
						<p class="speaker">발표자1(소속), 발표자2(소속)</p>
					</div>
					<div class="session-box">
						<div class="top">
							<div class="info">
								<span class="time">10:00 AM - 10:10 AM JST (1:00 AM - 1:10 AM UTC)</span>
							</div>
							<a href="#;" class="btn-rg bookmark outline hover">bookmark</a>
						</div>
						<p class="f-medium">[A1456-1am-01] <i class="awd">우수논문발표상 수상자</i></p>
						<a href="/conference/program/program_24.php" class="stitle2 overflow">발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다.
							발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다.</a>
						<p class="speaker">발표자1(소속), 발표자2(소속)</p>
					</div>
					<div class="session-box">
						<div class="top">
							<div class="info">
								<span class="time">10:00 AM - 10:10 AM JST (1:00 AM - 1:10 AM UTC)</span>
							</div>
							<a href="#;" class="btn-rg bookmark outline hover">bookmark</a>
						</div>
						<p class="f-medium">[A1456-1am-01] <i class="awd">우수논문발표상 수상자</i></p>
						<a href="/conference/program/program_24.php" class="stitle2 overflow">발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다.
							발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다. 발표제목이 표출됩니다.</a>
						<p class="speaker">발표자1(소속), 발표자2(소속)</p>
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