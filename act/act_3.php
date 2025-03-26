<?php include_once ('../_head.php'); ?>
<?php $gNum="2"; $sNum="3"; $gName="학회활동"; $sName="지부"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">대구/경북지부</button>
		<div class="list">
			<button type="button" class="active">대구/경북지부</button>
			<button type="button">부산/울산/경남지부</button>
			<button type="button">충청지부</button>
			<button type="button">호남지부</button>
		</div>
	</div>
	<div class="tab-container">
		<div class="tab-content">
			<!-- s: 대구/경북지부 -->
				<div class="tit-flex btm-line">
				<p class="heading2">2024년도 대구/경북지부</p>
			</div>
			<div class="executives dashed mt-6">
				<dl>
					<dt>지부장</dt>
					<dd class="name"><span>박진영</span></dd>
				</dl>
				<dl>
					<dt>부지부장</dt>
					<dd class="name"><span>박진영</span></dd>
				</dl>
				<dl>
					<dt>자문위원</dt>
					<dd class="name">
						<span>강인규</span>
						<span>권오형</span>
						<span>김봉식</span>
						<span>김우식</span>
						<span>권오형</span>
						<span>김봉식</span>
						<span>김우식</span>
						<span>강인규</span>
						<span>권오형</span>
						<span>권오형</span>
						<span>김봉식</span>
						<span>김우식</span>
						<span>권오형</span>
						<span>김봉식</span>
						<span>김우식</span>
						<span>강인규</span>
						<span>권오형</span>
						<span>권오형</span>
						<span>권오형</span>
						<span>김봉식</span>
						<span>김우식</span>
					</dd>
				</dl>
			</div>
			<p class="tit-bullet mt-6">1977.10.15-</p>
			<div class="executives dashed">
				<dl>
					<dt>지부장</dt>
					<dd class="name"><span>김종복</span></dd>
				</dl>
				<dl>
					<dt>총무</dt>
					<dd class="name">
						<span>김종복</span>
						<span>김영기</span>
					</dd>
				</dl>
			</div>
			<p class="tit-bullet mt-6">1977.10.15-</p>
			<div class="executives">
				<dl>
					<dt>지부장</dt>
					<dd class="name"><span>김종복</span></dd>
				</dl>
				<dl>
					<dt>총무</dt>
					<dd class="name">
						<span>김종복</span>
						<span>김영기</span>
					</dd>
				</dl>
			</div>
		</div>
		<div class="tab-content">
			<div class="tit-flex btm-line">
				<p class="heading2">2024년도 부산/울산/경남지부</p>
			</div>
		</div>
		<div class="tab-content">
			<div class="tit-flex btm-line">
				<p class="heading2">2024년도 충청지부</p>
			</div>
		</div>
		<div class="tab-content">
			<div class="tit-flex btm-line">
				<p class="heading2">2024년도 호남지부</p>
			</div>
		</div>
	</div>
</div>
<script>
	// tabs
	$(document).ready(function () {
		$('.tabs-type1 .current').click(function () {
      const tabs = $(this).closest('.tabs-type1');
      const list = tabs.find('.list');
      if (!tabs.hasClass('on')) {
        tabs.addClass('on');
        list.slideDown(200);
      } else {
        tabs.removeClass('on');
        list.slideUp(200);
      }
    });
		$(".tabs-type1 .list button").click(function () {
			var index = $(this).index();
			var buttonText = $(this).text();
			$(".tabs-type1 .list button").removeClass("active");
			$(this).addClass("active");
			$(".tab-container .tab-content").hide();
			$(".tab-container .tab-content").eq(index).show();
			$(this).closest('.tabs-type1').find('.current').text(buttonText);
			$('.tabs-type1').removeClass('on');
			if (window.matchMedia("(max-width: 768px)").matches) {
				$('.tabs-type1 .list').slideUp(200);
			}
		});
	});
</script>
<?php include_once ('../_tail.php'); ?>