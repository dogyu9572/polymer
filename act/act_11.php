<?php include_once ('../_head.php'); ?>
<?php $gNum="2"; $sNum="1"; $gName="학회활동"; $sName="학회상"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">학회상 안내</button>
		<div class="list">
			<button type="button" class="active" onclick="location.href='/act/act_11.php'">학회상 안내</button>
			<button type="button" onclick="location.href='/act/act_12.php'">학회상 심사위원</button>
			<button type="button" onclick="location.href='/act/act_13.php'">역대 수상자</button>
			<button type="button" onclick="location.href='/act/act_14.php'">시상요강</button>
			<button type="button" onclick="location.href='/act/act_15.php'">온라인 접수</button>
			<button type="button" onclick="location.href='/act/act_16.php'">접수확인</button>
		</div>
	</div>
  <div class="sort-wrap">
    <p class="sort-radio">
      <input type="radio" name="sort" id="sort1" checked>
      <label for="sort1">시행 중</label>
    </p>
    <p class="sort-radio">
      <input type="radio" name="sort" id="sort2">
      <label for="sort2">전체보기</label>
    </p>
  </div>
  <div class="table-box">
    <div class="head">
      <div class="row">
        <div class="w-4">명칭</div>
        <div class="w-7">시상내용</div>
        <div class="w-2">시상시기</div>
        <div class="w-5">심사</div>
        <div class="w-2">시행기간</div>
      </div>
    </div>
    <div class="body">
      <a href="act_11_view.php" class="row">
        <div class="w-4 title">상암고분자상</div>
        <div class="w-7">
          <div class="label">시상내용</div>상패/1000만원 (2025년부터 격년시상)
        </div>
        <div class="w-2">
          <div class="label">시상시기</div>추계(홀수해)
        </div>
        <div class="w-5">
          <div class="label">심사</div>상암 고분자상 심사위원회추계
        </div>
        <div class="w-2">
          <div class="label">시행기간</div>1996 ~
        </div>
      </a>
      <a href="act_11_view.php" class="row">
        <div class="w-4 title">고분자학술상</div>
        <div class="w-7">
          <div class="label">시상내용</div>상패/300만원
        </div>
        <div class="w-2">
          <div class="label">시상시기</div>추계
        </div>
        <div class="w-5">
          <div class="label">심사</div>학술상 심사위원회
        </div>
        <div class="w-2">
          <div class="label">시행기간</div>2001 ~ 2004
        </div>
      </a>
      <a href="act_11_view.php" class="row">
        <div class="w-4 title">LG화학 고분자학술상</div>
        <div class="w-7">
          <div class="label">시상내용</div>상패/1000만원
        </div>
        <div class="w-2">
          <div class="label">시상시기</div>추계(홀수해)
        </div>
        <div class="w-5">
          <div class="label">심사</div>학술상 심사위원회
        </div>
        <div class="w-2">
          <div class="label">시행기간</div>2001 ~ 2004
        </div>
      </a>
      <a href="act_11_02_view.php" class="row">
        <div class="w-4 title">우수논문발표상</div>
        <div class="w-7">
          <div class="label">시상내용</div>상장/부상
        </div>
        <div class="w-2">
          <div class="label">시상시기</div>춘추계
        </div>
        <div class="w-5">
          <div class="label">심사</div>학술교육위원회
        </div>
        <div class="w-2">
          <div class="label">시행기간</div>2004~
        </div>
      </a>
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