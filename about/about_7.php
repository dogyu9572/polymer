<?php include_once ('../_head.php'); ?>
<?php $gNum="1"; $sNum="7"; $gName="학회소개"; $sName="학회 오시는 길"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="map-container">
		<div class="map-wrap" style="background-color: black;">
			<div id="daumRoughmapContainer1735903887557" class="root_daum_roughmap root_daum_roughmap_landing"></div>
			<!-- 지도 영역 -->
		</div>
		<div class="map-info">
			<div class="logo"><span class="blind">The Polymer Society of Korea</span></div>
			<div class="info">
				<p class="add">서울시 강남구 강남대로 354 혜천빌딩 601호</p>
				<p class="tel">02-568-3860 / 02-561-5203</p>
				<p class="fax">02-553-6938</p>
			</div>
		</div>
	</div>

	<div class="trans">
		에디터에서 입력한 내용이 노출됩니다
	</div>
	<!-- <div class="trans">
		<dl>
			<dt class="metro">지하철</dt>
			<dd>
				<p class="f-semibold">신분당선 강남역 4번 출구 양재역 방향</p>
				<p>약 100m 거리 혜천빌딩 601호</p>
			</dd>
		</dl>
		<dl>
			<dt class="bus">버스</dt>
			<dd class="d-flex">
				<p class="f-semibold">중앙차선 강남역 정류장 하차</p>
				<div class="bus-info">
					<p><span class="label">일반</span>500-5번</p>
					<p><span class="label blue">간선</span>140번, 441번, 462번, 470번, 471번, 402번, 407번, 514번, 408번, 420번, 440번</p>
				</div>
			</dd>
		</dl>
	</div> -->
</div>
<script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

<!-- 3. 실행 스크립트 -->
<script charset="UTF-8">
	new daum.roughmap.Lander({
		"timestamp" : "1735903887557",
		"key" : "2movq",
		"mapWidth" : "1320",
		"mapHeight" : "460"
	}).render();
</script>

<?php include_once ('../_tail.php'); ?>
