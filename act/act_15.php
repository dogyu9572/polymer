<?php include_once ('../_head.php'); ?>
<?php $gNum="2"; $sNum="1"; $gName="학회활동"; $sName="학회상"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">온라인 접수</button>
		<div class="list">
			<button type="button" onclick="location.href='/act/act_11.php'">학회상 안내</button>
			<button type="button" onclick="location.href='/act/act_12.php'">학회상 심사위원</button>
			<button type="button" onclick="location.href='/act/act_13.php'">역대 수상자</button>
			<button type="button" onclick="location.href='/act/act_14.php'">시상요강</button>
			<button type="button"  class="active" onclick="location.href='/act/act_15.php'">온라인 접수</button>
			<button type="button" onclick="location.href='/act/act_16.php'">접수확인</button>
		</div>
	</div>
	<div class="table-box m-table act15">
		<div class="head">
			<div class="row">
				<div class="w-2">번호</div>
				<div class="w-8">접수 항목</div>
				<div class="w-6">접수기간</div>
				<div class="w-3">신청</div>
			</div>
		</div>
		<div class="body">
			<div class="row">
				<div class="w-2">
					<div class="label">번호</div>
					<div class="cont">10</div>
				</div>
				<div class="w-8">
					<div class="label">접수 항목</div>
					<div class="cont">상암고분자상, 상암고분자상</div>
				</div>
				<div class="w-6">
					<div class="label">시상시기</div>
					<div class="cont">2024-08-30 ~ 2025-08-30</div>
				</div>
				<div class="w-3">
					<div class="label">신청</div>
					<div class="cont"><a href="/act/act_15_write.php" class="btn-sm outline hover">온라인 접수</a></div>
				</div>
			</div>
			<div class="row">
				<div class="w-2">
					<div class="label">번호</div>
					<div class="cont">9</div>
				</div>
				<div class="w-8">
					<div class="label">접수 항목</div>
					<div class="cont">상암고분자상, 상암고분자상</div>
				</div>
				<div class="w-6">
					<div class="label">시상시기</div>
					<div class="cont">2024-08-30 ~ 2025-08-30</div>
				</div>
				<div class="w-3">
					<div class="label">신청</div>
					<div class="cont"><a href="/act/act_15_write.php" class="btn-sm outline hover">온라인 접수</a></div>
				</div>
			</div>
			<div class="row">
				<div class="w-2">
					<div class="label">번호</div>
					<div class="cont">8</div>
				</div>
				<div class="w-8">
					<div class="label">접수 항목</div>
					<div class="cont">상암고분자상, 상암고분자상, 상암고분자상, 상암고분자상, 상암고분자상</div>
				</div>
				<div class="w-6">
					<div class="label">시상시기</div>
					<div class="cont">2024-08-30 ~ 2025-08-30</div>
				</div>
				<div class="w-3">
					<div class="label">신청</div>
					<div class="cont"><a href="/act/act_15_write.php" class="btn-sm outline hover">온라인 접수</a></div>
				</div>
			</div>
			<div class="row">
				<div class="w-2">
					<div class="label">번호</div>
					<div class="cont">7</div>
				</div>
				<div class="w-8">
					<div class="label">접수 항목</div>
					<div class="cont">상암고분자상, 상암고분자상, 상암고분자상, 상암고분자상, 상암고분자상</div>
				</div>
				<div class="w-6">
					<div class="label">시상시기</div>
					<div class="cont">2024-08-30 ~ 2025-08-30</div>
				</div>
				<div class="w-3">
					<div class="label">신청</div>
					<div class="cont"><a href="/act/act_15_write.php" class="btn-sm outline hover">온라인 접수</a></div>
				</div>
			</div>
			<div class="row">
				<div class="w-2">
					<div class="label">번호</div>
					<div class="cont">6</div>
				</div>
				<div class="w-8">
					<div class="label">접수 항목</div>
					<div class="cont">상암고분자상, 상암고분자상</div>
				</div>
				<div class="w-6">
					<div class="label">시상시기</div>
					<div class="cont">2024-08-30 ~ 2025-08-30</div>
				</div>
				<div class="w-3">
					<div class="label">신청</div>
					<div class="cont"><a href="/act/act_15_write.php" class="btn-sm outline hover">온라인 접수</a></div>
				</div>
			</div>
			<div class="row">
				<div class="w-2">
					<div class="label">번호</div>
					<div class="cont">5</div>
				</div>
				<div class="w-8">
					<div class="label">접수 항목</div>
					<div class="cont">상암고분자상, 상암고분자상</div>
				</div>
				<div class="w-6">
					<div class="label">시상시기</div>
					<div class="cont">2024-08-30 ~ 2025-08-30</div>
				</div>
				<div class="w-3">
					<div class="label">신청</div>
					<div class="cont"><a href="/act/act_15_write.php" class="btn-sm disabled">접수 마감</a></div>
				</div>
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
	});
</script>
<?php include_once ('../_tail.php'); ?>