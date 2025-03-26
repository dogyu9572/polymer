<?php include_once ('../_head.php'); ?>
<?php $gNum="2"; $sNum="1"; $gName="학회활동"; $sName="학회상"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">학회상 심사위원</button>
		<div class="list">
			<button type="button" onclick="location.href='/act/act_11.php'">학회상 안내</button>
			<button type="button" class="active" onclick="location.href='/act/act_12.php'">학회상 심사위원</button>
			<button type="button" onclick="location.href='/act/act_13.php'">역대 수상자</button>
			<button type="button" onclick="location.href='/act/act_14.php'">시상요강</button>
			<button type="button" onclick="location.href='/act/act_15.php'">온라인 접수</button>
			<button type="button" onclick="location.href='/act/act_16.php'">접수확인</button>
		</div>
	</div>
	<!-- <div class="section sm">
		<div class="select-right">
			<div class="select-wrap w-40">
				<button type="button" class="select unselected">위원회를 선택해 주세요.</button>
				<ul>
					<li><button type="button" class="option">상암고분자상 심사위원회</button></li>
					<li><button type="button" class="option">학술상 심사위원회</button></li>
					<li><button type="button" class="option">상암고분자상 심사위원회</button></li>
				</ul>
			</div>
		</div>
	</div> -->
	<div class="section sm">
		<p class="tit-bullet f-bold">상암고분자상 심사위원회
			<span class="total stitle2">총 <span class="c-primary">8</span>명</span>
		</p>
		<div class="bg-light ex-name">
			<span class="body1 f-medium">회장</span>
			<span class="body1 f-medium">수석부회장</span>
			<span class="body1 f-medium">전무이사</span>
			<span class="body1 f-medium">총무이사</span>
			<span class="body1 f-medium">회장 위촉 3명</span>
		</div>
	</div>
	<div class="section sm">
		<p class="tit-bullet f-bold">학술상 심사위원회
			<span class="total stitle2">총 <span class="c-primary">8</span>명</span>
		</p>
		<div class="bg-light ex-name">
			<span class="body1 f-medium">회장</span>
			<span class="body1 f-medium">수석부회장</span>
			<span class="body1 f-medium">전무이사</span>
			<span class="body1 f-medium">총무이사</span>
			<span class="body1 f-medium">회장 위촉 3명</span>
		</div>
	</div>
	<div class="section sm">
		<p class="tit-bullet f-bold">기술공로상 심사위원회
			<span class="total stitle2">총 <span class="c-primary">8</span>명</span>
		</p>
		<div class="bg-light ex-name">
			<span class="body1 f-medium">회장</span>
			<span class="body1 f-medium">수석부회장</span>
			<span class="body1 f-medium">전무이사</span>
			<span class="body1 f-medium">총무이사</span>
			<span class="body1 f-medium">회장 위촉 3명</span>
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
	});
</script>
<?php include_once ('../_tail.php'); ?>