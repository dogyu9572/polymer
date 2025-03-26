<?php include_once ('../_head.php'); ?>
<?php $gNum="2"; $sNum="4"; $gName="Program"; $sName="Floor Plan"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents">
	<!-- <div class="tabs-type4">
		<div class="inner">
			<button type="button" class="active">Floor Plan</button>
			<button type="button">1F</button>
			<button type="button">2F</button>
			<button type="button">3F</button>
		</div>
	</div> -->
	<div class="tab-container inner">
		<div class="tab-content">
			<div class="floor img">
				<img src="/conference/pub/images/sub/floor_sample.jpg" alt="">
			</div>
		</div>
		<div class="tab-content">
		</div>
	</div>
</div>
<script>
	// tabs
	$(document).ready(function () {
		$(".tabs-type4 button").click(function () {
			var index = $(this).index();
			$(".tabs-type4 button").removeClass("active");
			$(this).addClass("active");
			$(".tab-container .tab-content").hide();
			$(".tab-container .tab-content").eq(index).show();
		});
	});
</script>
<?php include_once ('../_tail.php'); ?>