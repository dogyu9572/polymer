<?php include_once ('../_head.php'); ?>
<?php $gNum="4"; $sNum="1"; $gName="Registration"; $sName="Registration"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="regi-top section">
		<dl class="pre">
			<dt>사전 등록</dt>
			<dd>2024년 9월 12일 (목) 23:59 KST 까지</dd>
		</dl>
		<dl class="onsite">
			<dt>현장 등록</dt>
			<dd>학술대회 기간 중</dd>
		</dl>
	</div>
	<div class="section">
		<p class="stitle1 mb-5">등록비</p>
		<p class="scr-text show-mo">좌우 스크롤</p>
		<div class="table-scroll scroll-gray">
				<div class="scr-dim"><p>좌우로 스크롤 하셔서<br>내용을 확인해주세요.</p></div>
				<table cellspacing="0" cellpadding="0" class="type1 border table-regi">
					<colgroup>
						<col width="*">
						<col width="19%">
						<col width="19%">
						<col width="19%">
						<col width="19%">
					</colgroup>	
					<thead>
						<tr>
							<th rowspan="2" class="bg-dark">구분</th>
							<th colspan="2" class="bg-dark">사전등록<br>
								<ul class="bullet-gray size-rg f-normal mt-1">
									<li>2025. 1. 1(수) ~ 2025. 3. 14(금)</li>
								</ul>
							</th>
							<th colspan="2" class="bg-dark">현장등록비용<br>
								<ul class="bullet-gray size-rg f-normal mt-1">
									<li>2025. 3. 15(토) ~ 2025. 4. 9(금) : 온라인 결제만 가능</li><br>
									<li>2025. 4. 16(수) ~ 2025. 4. 18(금) : 온라인/현장결제만 가능</li>
								</ul>
							</th>
						</tr>
						<tr>
							<th class="b-left">사전등록비A</th>
							<th>사전등록비B<span class="f-normal">(1년 연회비 면제)</span></th>
							<th>사전등록비A</th>
							<th>사전등록비B<span class="f-normal">(1년 연회비 면제)</span></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>종신회원</td>
							<td colspan="2">130,000원</td>
							<td colspan="2">150,000원</td>
						</tr>
						<tr>
							<td>정회원(일반)</td>
							<td>130,000원</td>
							<td>180,000원</td>
							<td>150,000원</td>
							<td>200,000원</td>
						</tr>
						<tr>
							<td>학생회원(대학원생, 학부생)</td>
							<td>60,000원</td>
							<td>90,000원</td>
							<td>70,000원</td>
							<td>100,000원</td>
						</tr>
						<tr>
							<td>비회원</td>
							<td colspan="2">160,000원</td>
							<td colspan="2">170,000원</td>
						</tr>
						<tr>
							<td>원로회원</td>
							<td colspan="4">면제 (60세 이상, 20년 이상 회원자격 유지)</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<div class="section">
		<p class="stitle1 mb-5">사전등록 안내</p>
		<div class="bg-light sm border">
			<ul class="bullet-gray size-rg">
				<li>전등록 마감 후 등록비 미납 건은 등록취소 처리됩니다.</li>
				<li>전등록 마감 후 취소 및 등록비 반환은 되지 않으며, 등록 취소 시 기간 내 학회 사무국으로 문의 바랍니다.</li>
				<li>등록자 구분 선택 시, [기타]로 등록하는 경우 평점 보고가 되지 않습니다.</li>
				<li>단체 등록비 입금 시 학회로 송금정보를 알려주셔야 합니다. (송금일시, 송금자명, 등록자 명단)</li>
			</ul>
		</div>
	</div>
	<div class="section sm">
		<p class="stitle1 mb-5">증빙서류 발급 안내</p>
		<div class="bg-light sm border">
			<ul class="bullet-gray size-rg">
				<li>등록확인증/ 영수증 / 거래명세서 / 참가증명원 / 발표증명원 - 온라인 발급</li>
				<li>학술대회 홈페이지에서 로그인 후 [등록 안내]-[등록 확인] 페이지에서 확인 및 출력(<span class="c-tertiary">* 결제를 완료하신 경우 확인이 가능합니다.</span>)</li>
				<li>참가증명원 및 발표증명원의 경우 행사일 이후 확인 및 출력 가능</li>
				<li>문의처: 한국고분자학회 홍길동, 02-568-3860, polymer@polymer.or.kr</li>
			</ul>
		</div>
	</div>
	<div class="section sm">
		<center>**************** 로그인 안했을 경우 ****************</center>
		<div class="group-btn">
			<a href="register_login.php" class="btn-md w-24 m-full">등록하러가기</a>
		</div>
		<center>**************** 로그인 했을 경우 ****************</center>
		<div class="group-btn">
			<a href="register_12.php" class="btn-md w-24 m-full">등록하러가기</a>
		</div>
	</div>
</div>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		const tableScrolls = document.querySelectorAll(".table-scroll");
		function hideAllScrDim() {
			document.querySelectorAll(".scr-dim").forEach(scrDim => {
				scrDim.classList.add("hide"); 
			});
		}
		tableScrolls.forEach((tableScroll) => {
			const scrDim = tableScroll.querySelector(".scr-dim");

			tableScroll.addEventListener("click", hideAllScrDim);
			tableScroll.addEventListener("touchstart", hideAllScrDim);
		});

		function handleResize() {
			if (window.innerWidth <= 768) {
				document.querySelectorAll(".scr-dim").forEach(scrDim => {
					scrDim.classList.remove("hide");
				});
			} else {
				document.querySelectorAll(".scr-dim").forEach(scrDim => {
					scrDim.classList.add("hide"); 
				});
			}
		}
		window.addEventListener("resize", handleResize);
		handleResize();
	});
</script>
<?php include_once ('../_tail.php'); ?>