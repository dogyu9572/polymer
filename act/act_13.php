<?php include_once('../_head.php'); ?>
<?php $gNum="2"; $sNum="1"; $gName="학회활동"; $sName="학회상"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">역대 수상자</button>
		<div class="list">
			<button type="button" onclick="location.href='/act/act_11.php'">학회상 안내</button>
			<button type="button" onclick="location.href='/act/act_12.php'">학회상 심사위원</button>
			<button type="button" class="active" onclick="location.href='/act/act_13.php'">역대 수상자</button>
			<button type="button" onclick="location.href='/act/act_14.php'">시상요강</button>
			<button type="button" onclick="location.href='/act/act_15.php'">온라인 접수</button>
			<button type="button" onclick="location.href='/act/act_16.php'">접수확인</button>
		</div>
	</div>
	<div class="form-sch bg-light">
		<div class="select-wrap">
			<button type="button" class="select unselected">수상종류 전체</button>
			<ul>
				<li><button type="button" class="option">학술상</button></li>
				<li><button type="button" class="option">우수논문상</button></li>
				<li><button type="button" class="option">학술진보상</button></li>
				<li><button type="button" class="option">상암고분자상</button></li>
			</ul>
		</div>
		<div class="select-wrap">
			<button type="button" class="select unselected">수상년도 전체</button>
			<ul>
				<li><button type="button" class="option">2024년</button></li>
				<li><button type="button" class="option">2023년</button></li>
			</ul>
		</div>
		<div class="select-wrap">
			<button type="button" class="select unselected">전체</button>
			<ul>
				<li><button type="button" class="option">수상자</button></li>
				<li><button type="button" class="option">소속</button></li>
			</ul>
		</div>
		<div class="search-wrap">
			<input type="text" placeholder="검색어를 입력하세요.">
			<button type="button" title="검색"></button>
		</div>
	</div>
	<table cellspacing="0" cellpadding="0" class="type1 m-pad">
		<colgroup>
			<col width="23%">
			<col width="*">
			<col width="*">
			<col width="*">
			<col width="23%">
		</colgroup>
		<thead>
			<tr>
				<th>수상종류</th>
				<th>수상년도</th>
				<th>시상시기</th>
				<th>수상자</th>
				<th>소속</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>학술상</td>
				<td>2023년</td>
				<td>추계(홀수해)</td>
				<td>장지영</td>
				<td>성균관대학교</td>
			</tr>
			<tr>
				<td>우수논문상</td>
				<td>2021년</td>
				<td>추계</td>
				<td>이준영</td>
				<td>성균관대학교</td>
			</tr>
			<tr>
				<td>학술진보상</td>
				<td>2017년</td>
				<td>추계</td>
				<td>장지영</td>
				<td>성균관대학교</td>
			</tr>
			<tr>
				<td>학술진보상</td>
				<td>2021년</td>
				<td>춘계</td>
				<td>이준영</td>
				<td>서울대학교</td>
			</tr>
		</tbody>
	</table>
</div>
<script>
	// tabs
	$(document).ready(function() {
		$('.tabs-type1 .current').click(function() {
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
<?php include_once('../_tail.php'); ?>