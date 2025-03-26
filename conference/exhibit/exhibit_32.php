<?php include_once ('../_head.php'); ?>
<?php $gNum="5"; $sNum="3"; $gName="Exhibition"; $sName="Booth Plan"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="img t-center"><img src="/conference/pub/images/sub/booth_map.jpg" alt=""></div>
	<div class="section">
		<div class="booth-form">
			<div class="top">
				<span class="t-divide">업체명</span>ㅇㅇㅇㅇ 화학
			</div>
			<div class="booth-sel">
				<div class="title">
					<p class="body1 f-semibold">부스 번호 선택</p>
					<p class="t-ps size-rg">* 이미 신청이 완료되어 마감된 부스는 선택할 수 없습니다.</p>
				</div>
				<div class="sel">
					<div class="select-wrap">
						<button type="button" class="select unselected">번호를 선택해 주세요.</button>
						<ul>
							<li><button type="button" class="option">1,2</button></li>
							<li><button type="button" class="option">1호</button></li>
							<li><button type="button" class="option">2호</button></li>
							<li><button type="button" class="option">1번</button></li>
							<li><button type="button" class="option">2번</button></li>
							<li><button type="button" class="option">3번</button></li>
							<li><button type="button" class="option">4번</button></li>
							<li><button type="button" class="option">5번</button></li>
						</ul>
					</div>
<!-- 					<div class="select-wrap">
						<button type="button" class="select">31번</button>
						<ul>
							<li><button type="button" class="option">1번</button></li>
							<li><button type="button" class="option">2번</button></li>
							<li><button type="button" class="option">3번</button></li>
							<li><button type="button" class="option">4번</button></li>
							<li><button type="button" class="option">5번</button></li>
						</ul>
					</div> -->
					<button type="button" class="btn-rg w-18" onClick="showAlertAndReload();">선택 완료</button>
				</div>
			</div>
		</div>
	</div>
	<div class="section">
		<p class="stitle1 mb-4">참가업체 보기</p>
		<table cellspacing="0" cellpadding="0" class="type1">
			<colgroup>
				<col width="45%">
				<col width="*">
			</colgroup>
			<thead>
				<tr>
					<th>부스번호</th>
					<th>광고업체명</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1,2</td>
					<td>홍길쎄미</td>
				</tr>
				<tr>
					<td>1호</td>
					<td>홍길토털에너지</td>
				</tr>
				<tr>
					<td>2호</td>
					<td>홍길화학</td>
				</tr>
				<tr>
					<td>2호</td>
					<td>홍길쎄미</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script>
function showAlertAndReload() {
    alert("선택이 완료되었습니다.");
    location.reload();  // 페이지 새로고침
}

</script>
<?php include_once ('../_tail.php'); ?>