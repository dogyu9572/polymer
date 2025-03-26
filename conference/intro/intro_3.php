<?php include_once('../_head.php'); ?>
<?php $gNum="1"; $sNum="3"; $gName="Introduction"; $sName="Transportation & Accommodation"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents bottom">
  <div class="tabs-type4">
    <div class="inner">
      <button type="button" class="active">오시는 길</button>
      <button type="button">숙박안내</button>
    </div>
  </div>
  <div class="tab-container">
    <div class="tab-content inner last-section">
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
            <p class="home">homepage.com</p>
          </div>
        </div>
      </div>
      <div class="trans">
        <dl>
          <dt class="metro">오시는길</dt>
          <dd>
            <p>
              <span class="f-semibold">- 2호선 삼성역 방면: </span>
              삼성역 5, 6번 출구와 직접 연결된 통로로 진입, 밀레니엄 광장을 통하여 스타필드 코엑스몰로 진입
            </p>
            <p class="mt-1"><span class="f-semibold">- 9호선 봉은사역 방면: </span>봉은사역 7번 출구와 직접 연결된 통로로 진입, 아셈플라자를 통하여 스타필드 코엑스몰로 진입</p>
            <p class="mt-1"><span class="f-semibold"> - 7호선 청담역 방면: 청담역 2번출구(진행방향 앞쪽)로 나온 후 도보로 약 10~15분 거리 직진, 아셈광장을 통해 진입</span></p>
          </dd>
        </dl>
        <!-- <dl>
          <dt class="bus">버스</dt>
          <dd>
            <p>- 네비게이션 주소: <span class="f-semibold">서울특별시 강남구 영동대로 513(삼성동, 코엑스)</span></p>
            <p class="mt-1">- 주차요금: 최소 30분 2,400원 / 15분당 1,200원 / 1일 주차 시 4만 8천원</p>
            <p class="t-ps mt-3">※ 주차권 제공이 불가하오니 가급적 대중교통을 이용해 주시기 바랍니다.</p>
          </dd>
        </dl> -->
      </div>
    </div>
    <div class="tab-content">
      <div class="section last-section">
        <div class="inner">
          <div class="flex gp5">
            <p class="heading2 mb-6">호텔</p>
            <div>
              <p class="t-ps">- 연계 할인 제공되는 호텔 안내드립니다. 모든 객실은 조기 마감될 수 있습니다.</p>
              <p class="t-ps"> - 원하시는 호텔의 '객실예약서'를 받아 신청해 주세요.</p>
            </div>
          </div>
          <div class="d-flex hotel-wrap">
            <div class="hotel">
              <div class="tit-flex">
                <p class="stitle1">신라스테이 삼성</p>
                <div class="btns">
                	<a href="#;" download class="btn-rg outline hover btn_down">객실예약서 다운로드</a>
                	<a href="#;" download class="btn-rg outline hover">홈페이지 바로가기</a>
                </div>
              </div>
              <table cellspacing="0" cellpadding="0" class="type1 td-border mt-3">
                <thead>
                  <tr>
                    <th>담당자 정보</th>
                    <th>금액</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>polymer@polymer<br>010-1234-1234</td>
					<td>20만원</td>
                  </tr>
                  <tr>
                    <td>polymer@polymer<br>010-1234-1234</td>
					<td>20만원</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="hotel">
              <div class="tit-flex">
                <p class="stitle1">글래드호텔 코엑스</p>
                <div class="btns">
                	<a href="#;" download class="btn-rg outline hover btn_down">객실예약서 다운로드</a>
                	<a href="#;" download class="btn-rg outline hover">홈페이지 바로가기</a>
                </div>
              </div>
              <table cellspacing="0" cellpadding="0" class="type1 td-border mt-3">
                <thead>
                  <tr>
                    <th>담당자 정보</th>
                    <th>금액</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>polymer@polymer<br>010-1234-1234</td>
					<td>20만원</td>
                  </tr>
                  <tr>
                    <td>polymer@polymer<br>010-1234-1234</td>
					<td>20만원</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
<script>
  // tabs
  $(document).ready(function() {
    $(".tabs-type4 button").click(function() {
      var index = $(this).index();
      $(".tabs-type4 button").removeClass("active");
      $(this).addClass("active");
      $(".tab-container .tab-content").hide();
      $(".tab-container .tab-content").eq(index).show();
    });
  });
  new daum.roughmap.Lander({
    "timestamp": "1735903887557",
    "key": "2movq",
    "mapWidth": "1320",
    "mapHeight": "460"
  }).render();
</script>
<?php include_once('../_tail.php'); ?>