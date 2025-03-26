<?php include_once ('../_head.php'); ?>
<?php $gNum="1"; $sNum="5"; $gName="학회소개"; $sName="학회조직"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">펠로우 회원</button>
		<div class="list">
			<button type="button" onClick="window.location.href='about_5.php';">임원진</button>
			<button type="button" onClick="window.location.href='about_51.php';">평의원</button>
			<button type="button" onClick="window.location.href='about_52.php';">제위원회</button>
			<button type="button" onClick="window.location.href='about_53.php';">운영위원회</button>
			<button type="button" class="active" onClick="window.location.href='about_54.php';">펠로우 회원</button>
		</div>
	</div>
	<div class="tab-container">
		<div class="tab-content">
			<!-- s: 펠로우 회원 -->
			<div class="tit-flex a-center btm-line">
				<div class="tit-btn">
					<p class="heading2">2024년도 펠로우 회원</p>
					<a href="fellows2023.pdf" class="btn-rg w-28" download target="_blank">
						<i class="ico-before"><img src="/pub/images/ico/ico_book.svg" alt=""></i>역대 펠로우 회원 업적보기
					</a>
				</div>
<!-- 				<div class="select-wrap w-40">
					<button type="button" class="select">2024년도 선정</button>
					<ul>
						<li><button type="button" class="option">2024년도 선정</button></li>
						<li><button type="button" class="option">2023년도 선정</button></li>
						<li><button type="button" class="option">2022년도 선정</button></li>
					</ul>
				</div> -->
			</div>
			<div class="executives mt-6">
				<dl>
					<dt>2024년도 선정</dt>
					<dd class="name">
						<span>강경보</span>
						<span>김상태</span>
						<span>김인욱</span>
						<span>강경보</span>
					</dd>
				</dl>
				<dl>
					<dt>2023년도 선정</dt>
					<dd class="name">
						<span>김동유</span>
						<span>김범성</span>
						<span>김상태</span>
						<span>김종만</span>
						<span>김천호</span>
						<span>노인섭</span>
						<span>안동준</span>
						<span>원종찬</span>
						<span>진성호</span>
						<span>한장선</span>
					</dd>
				</dl>

				<dl>
					<dt>2022년도 선정</dt>
					<dd class="name">
						<span>강호종</span>
						<span>권순기</span>
						<span>박기홍</span>
						<span>박원호</span>
						<span>이명훈</span>
						<span>제갈영순</span>
						<span>최동훈</span>
					</dd>
				</dl>

				<dl>
					<dt>2021년도 선정</dt>
					<dd class="name">
						<span>김덕준</span>
						<span>김일</span>
						<span>김정수</span>
						<span>손대원</span>
						<span>이미혜</span>
						<span>이진호</span>
						<span>임순호</span>
						<span>장호식</span>
						<span>최이준</span>
						<span>한동근</span>
					</dd>
				</dl>

				<dl>
					<dt>2020년도 선정</dt>
					<dd class="name">
						<span>권익찬</span>
						<span>김은경</span>
						<span>김환규</span>
						<span>노기수</span>
						<span>박기동</span>
						<span>이창진</span>
					</dd>
				</dl>

				<dl>
					<dt>2019년도 선정</dt>
					<dd class="name">
						<span>김상율</span>
						<span>김장주</span>
						<span>김진곤</span>
						<span>박수영</span>
						<span>서용석</span>
						<span>유진녕</span>
						<span>이광섭</span>
						<span>이재석</span>
						<span>이재흥</span>
						<span>장정식</span>
						<span>장지영</span>
						<span>조재영</span>
						<span>하창식</span>
					</dd>
				</dl>
			</div>
			 <!-- e: 펠로우 회원 -->
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