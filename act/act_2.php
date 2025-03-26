<?php include_once ('../_head.php'); ?>
<?php $gNum="2"; $sNum="2"; $gName="학회활동"; $sName="국제교류"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">전체보기</button>
		<div class="list">
			<button type="button" class="active">전체보기</button>
			<button type="button">일본고분자학회</button>
			<button type="button">대만고분자학회</button>
			<button type="button">호주화학회 고분자분과</button>
		</div>
	</div>
	<div class="tab-container">
		<div class="tab-content">
			<div class="form-right mb-6">
				<div class="search-wrap">
					<input type="text" placeholder="검색어를 입력하세요.">
					<button type="button" title="검색"></button>
				</div>
			</div>
			<div class="exchange-wrap">
				<div class="bg-light">
					<div class="top">
						<span class="chip">일본고분자학회</span>
						<span class="caption2 f-medium">2024.01.01  ~  2024.01.02</span>
					</div>
					<div class="title">
						<p class="stitle1">SPSJ 73rd Symposium on Macromolecules</p>
						<p class="body2">일본고분자학회 방문 / 한국고분자 학회 방문</p>
					</div>
					<div class="lecture">
						<p class="label">PSK Young Scientist Lecture</p>
						<div>
							<span>안태규(한국교통대학교)</span>
							<span>남기호(경북대학교)</span>
							<span>이재준(부산대학교)</span>
							<span>오쥰균(단국대학교)</span>
						</div>
					</div>
				</div>
				<div class="bg-light">
					<div class="top">
						<span class="chip">일본고분자학회</span>
						<span class="caption2 f-medium">2024.01.01  ~  2024.01.02</span>
					</div>
					<div class="title">
						<p class="stitle1">SPSJ 73rd Symposium on Macromolecules</p>
						<p class="body2">일본고분자학회 방문 / 한국고분자 학회 방문</p>
					</div>
					<div class="lecture">
						<p class="label">PSK Young Scientist Lecture</p>
						<div>
							<span>안태규(한국교통대학교)</span>
							<span>남기호(경북대학교)</span>
							<span>이재준(부산대학교)</span>
							<span>오쥰균(단국대학교)</span>
						</div>
					</div>
				</div>
				<div class="bg-light">
					<div class="top">
						<span class="chip">호주화학회 고분자분과</span>
						<span class="caption2 f-medium">2024.01.01  ~  2024.01.02</span>
					</div>
					<div class="title">
						<p class="stitle1">SPSJ 73rd Symposium on Macromolecules</p>
						<p class="body2">호주화학회 고분자분과 방문 / 한국고분자 학회 방문</p>
					</div>
					<div class="lecture">
						<p class="label">PSK Young Scientist Lecture</p>
						<div>
							<span>안태규(한국교통대학교)</span>
							<span>남기호(경북대학교)</span>
							<span>이재준(부산대학교)</span>
							<span>오쥰균(단국대학교)</span>
						</div>
					</div>
				</div>
				<div class="bg-light">
					<div class="top">
						<span class="chip">일본고분자학회</span>
						<span class="caption2 f-medium">2024.01.01  ~  2024.01.02</span>
					</div>
					<div class="title">
						<p class="stitle1">SPSJ 73rd Symposium on Macromolecules</p>
						<p class="body2">일본고분자학회 방문 / 한국고분자 학회 방문</p>
					</div>
					<div class="lecture">
						<p class="label">PSK Young Scientist Lecture</p>
						<div>
							<span>안태규(한국교통대학교)</span>
							<span>남기호(경북대학교)</span>
							<span>이재준(부산대학교)</span>
							<span>오쥰균(단국대학교)</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-content">일본고분자학회</div>
		<div class="tab-content">대만고분자학회</div>
		<div class="tab-content">호주화학회</div>
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