<?php include_once('../_head.php'); ?>
<?php $gNum="3"; $sNum="5"; $gName="학회행사"; $sName="부문위원회 세미나"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current"><?=$sName?></button>
		<div class="list">
			<button type="button" onclick="location.href='/function/function_1.php'" class="<?if($sNum=="02"){?>active<?}?>">국내학술대회</button>
			<button type="button" onclick="location.href='/function/function_2.php'" class="<?if($sNum=="03"){?>active<?}?>">국제학술대회</button>
			<button type="button" onclick="location.href='/function/function_3.php'" class="<?if($sNum=="04"){?>active<?}?>">세미나/워크숍</button>
			<button type="button" onclick="location.href='/function/function_4.php'" class="<?if($sNum=="05"){?>active<?}?>">부문위원회 세미나</button>
			<button type="button" onclick="location.href='/function/function_6.php'" class="<?if($sNum=="06"){?>active<?}?>">초록집 모음</button>
			<button type="button" onclick="location.href='/member/login_nomember.php'" class="<?if($sNum=="07"){?>active<?}?>">확인서/영수증</button>
		</div>
	</div>
	<div class="tab-container">
		<div class="tab-content">
			<div class="select-wrap w-35">
				<button type="button" class="select">2024년</button>
				<ul>
					<li><button type="button" class="option">2024년</button></li>
					<li><button type="button" class="option">2023년</button></li>
					<li><button type="button" class="option">2022년</button></li>
					<li><button type="button" class="option">2021년</button></li>
				</ul>
			</div>
			<div class="function-scd">
				<div class="li">
					<div class="right">
						<a href="function_5.php" class="stitle2">ChemIDP: Planning for Your Career</a>
						<ul class="bullet-gray">
							<li class="label-30">
								<span class="f-semibold">일시</span>
								<p class="f-medium t-secondary">2024.01.02 ~ 2024.02.01</p>
							</li>
							<li class="label-30">
								<span class="f-semibold">장소</span>
								<p class="f-medium t-secondary">Busan Bexco</p>
							</li>
						</ul>
					</div>
					<div class="btn">
						<a href="function_5.php" class="btn-rg">
							View<span class="ico-after"><img src="/pub/images/ico/ico_eye.svg" alt=""></span>
						</a>
						<a href="#;" class="btn-rg outline">
							PDF<span class="ico-after"><img src="/pub/images/ico/ico_down_pdark.svg" alt=""></span>
						</a>
					</div>
				</div>
				<div class="li">
					<div class="right">
						<a href="function_5.php" class="stitle2">ChemIDP: Planning for Your Career ChemIDP: Planning for Your Career ChemIDP: Planning for Your Carrer</a>
						<ul class="bullet-gray">
							<li class="label-30">
								<span class="f-semibold">일시</span>
								<p class="f-medium t-secondary">2024.01.02 ~ 2024.02.01</p>
							</li>
							<li class="label-30">
								<span class="f-semibold">장소</span>
								<p class="f-medium t-secondary">Busan Bexco</p>
							</li>
						</ul>
					</div>
					<div class="btn">
						<a href="#;" class="btn-rg">
							View<span class="ico-after"><img src="/pub/images/ico/ico_eye.svg" alt=""></span>
						</a>
						<a href="#;" class="btn-rg outline">
							PDF<span class="ico-after"><img src="/pub/images/ico/ico_down_pdark.svg" alt=""></span>
						</a>
					</div>
				</div>
				<div class="li">
					<div class="right">
						<a href="function_5.php" class="stitle2">ChemIDP: Planning for Your Career</a>
						<ul class="bullet-gray">
							<li class="label-30">
								<span class="f-semibold">일시</span>
								<p class="f-medium t-secondary">2024.01.02 ~ 2024.02.01</p>
							</li>
							<li class="label-30">
								<span class="f-semibold">장소</span>
								<p class="f-medium t-secondary">Busan Bexco</p>
							</li>
						</ul>
					</div>
					<div class="btn">
						<a href="function_5.php" class="btn-rg">
							View<span class="ico-after"><img src="/pub/images/ico/ico_eye.svg" alt=""></span>
						</a>
						<a href="#;" class="btn-rg outline">
							PDF<span class="ico-after"><img src="/pub/images/ico/ico_down_pdark.svg" alt=""></span>
						</a>
					</div>
				</div>
				<div class="li">
					<div class="right">
						<a href="function_5.php" class="stitle2">ChemIDP: Planning for Your Career</a>
						<ul class="bullet-gray">
							<li class="label-30">
								<span class="f-semibold">일시</span>
								<p class="f-medium t-secondary">2024.01.02 ~ 2024.02.01</p>
							</li>
							<li class="label-30">
								<span class="f-semibold">장소</span>
								<p class="f-medium t-secondary">Busan Bexco</p>
							</li>
						</ul>
					</div>
					<div class="btn">
						<a href="#;" class="btn-rg">
							View<span class="ico-after"><img src="/pub/images/ico/ico_eye.svg" alt=""></span>
						</a>
						<a href="#;" class="btn-rg outline">
							PDF<span class="ico-after"><img src="/pub/images/ico/ico_down_pdark.svg" alt=""></span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-content">2
		</div>
		<div class="tab-content">3
		</div>
		<div class="tab-content">3
		</div>
	</div>
</div>
<script>
	// tabs
	// $(document).ready(function() {
	// 	$('.tabs-type1 .current').click(function() {
	// 		const tabs = $(this).closest('.tabs-type1');
	// 		const list = tabs.find('.list');
	// 		if (!tabs.hasClass('on')) {
	// 			tabs.addClass('on');
	// 			list.slideDown(200);
	// 		} else {
	// 			tabs.removeClass('on');
	// 			list.slideUp(200);
	// 		}
	// 	});
	// 	$(".tabs-type1 .list button").click(function() {
	// 		var index = $(this).index();
	// 		var buttonText = $(this).text();
	// 		$(".tabs-type1 .list button").removeClass("active");
	// 		$(this).addClass("active");
	// 		$(".tab-container .tab-content").hide();
	// 		$(".tab-container .tab-content").eq(index).show();
	// 		$(this).closest('.tabs-type1').find('.current').text(buttonText);
	// 		$('.tabs-type1').removeClass('on');
	// 		if (window.matchMedia("(max-width: 768px)").matches) {
	// 			$('.tabs-type1 .list').slideUp(200);
	// 		}
	// 	});
	// });
</script>
<?php include_once('../_tail.php'); ?>