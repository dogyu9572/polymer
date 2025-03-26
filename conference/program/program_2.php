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
	<div class="tabs-type4">
		<div class="inner">
			<button type="button" class="active">Oral</button>
			<button type="button">Poster</button>
		</div>
	</div>
	<div class="tab-container inner">
		<div class="tab-content">
			<!-- 01: list -->
			<ul class="session-list">
				<li><a href="/conference/program/program_22.php">기조강연</a></li>
				<li><a href="/conference/program/program_22.php">수소의 생산에서 발전까지 : 고분자의 역할</a></li>
				<li><a href="/conference/program/program_22.php">고분자 합성</a></li>
				<li><a href="/conference/program/program_22.php">기능성 고분자</a></li>
				<li><a href="/conference/program/program_22.php">고분자가공/복잡재료/재활용</a></li>
				<li><a href="/conference/program/program_22.php">고분자구조 및 물성</a></li>
				<li><a href="/conference/program/program_22.php">분자전자 부문위원회</a></li>
				<li><a href="/conference/program/program_22.php">초록 입력 시 선택하는 발표분야가 표출됩니다.</a></li>
			</ul>
		</div>
		<div class="tab-content">
			<!-- poster -->
			<ul class="session-list">
				<li><a href="/conference/program/program_22.php">기조강연</a></li>
				<li><a href="/conference/program/program_22.php">수소의 생산에서 발전까지 : 고분자의 역할</a></li>
				<li><a href="/conference/program/program_22.php">고분자 합성</a></li>
				<li><a href="/conference/program/program_22.php">기능성 고분자</a></li>
				<li><a href="/conference/program/program_22.php">고분자가공/복잡재료/재활용</a></li>
				<li><a href="/conference/program/program_22.php">고분자구조 및 물성</a></li>
				<li><a href="/conference/program/program_22.php">분자전자 부문위원회</a></li>
				<li><a href="/conference/program/program_22.php">초록 입력 시 선택하는 발표분야가 표출됩니다.</a></li>
			</ul>
		</div>
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