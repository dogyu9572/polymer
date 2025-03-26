<?php include_once('../_head.php'); ?>
<?php $gNum="3"; $sNum="5"; $gName="학회행사"; $sName="부문위원회 세미나"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents">
	<div class="inner">
		<div class="section pay-container">
			<div class="left">
				<div class="section write-wrap">
					<div class="title">
						<p class="stitle1"><span class="num">1</span>결제 항목 선택</p>
						<p class="t-ps size-rg">* 회원이실 경우 로그인 후 등록해 주세요.</p>
					</div>
					<div class="write">
						<div class="row">
							<div class="cont only-cont j-between">
								<p class="radio">
									<input type="radio" name="" id="price" checked>
									<label for="price">세미나 참가비용</label>
								</p>
								<p class="price">50,000원</p>
							</div>
						</div>
					</div>
				</div>
				<div class="section write-wrap">
					<div class="title">
						<p class="stitle1"><span class="num">2</span>정보 입력</p>
					</div>
					<div class="write">
						<div class="row input">
							<div class="label required">이름</div>
							<div class="cont">
								<input type="text" placeholder="이름을 입력해 주세요.">
							</div>
						</div>
						<div class="row input">
							<div class="label required">소속</div>
							<div class="cont">
								<input type="text" placeholder="소속을 입력해 주세요.">
							</div>
						</div>
						<div class="row input">
							<div class="label required">이메일</div>
							<div class="cont">
								<div class="input-btn">
									<input type="text" placeholder="이메일은 등록사항 확인 시 id로 사용됩니다.">
									<button type="button" class="btn-rg outline hover2">중복확인</button>
								</div>
							</div>
						</div>
						<div class="row input">
							<div class="label">연락처</div>
							<div class="cont">
								<input type="text" placeholder="연락처를 입력해 주세요">
							</div>
						</div>
						<div class="row input">
							<div class="label required">휴대전화</div>
							<div class="cont">
								<input type="text" placeholder="휴대전화를 입력해 주세요">
							</div>
						</div>
						<div class="row input">
							<div class="label required">국가 선택</div>
							<div class="cont">
								<div class="select-wrap">
									<button type="button" class="select unselected">국가를 선택해 주세요</button>
									<ul>
										<li><button type="button" class="option">국가</button></li>
										<li><button type="button" class="option">국가</button></li>
										<li><button type="button" class="option">국가</button></li>
										<li><button type="button" class="option">국가</button></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row input">
							<div class="label required">자동등록방지</div>
							<div class="cont">
								<div class="captcha">
									<div class="img">
										<img src="/pub/images/common/captcha.jpg" alt="">
										<button type="button" title="새로고침"></button>
									</div>
									<input type="text">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section write-wrap">
					<div class="title">
						<p class="stitle1"><span class="num">3</span>결제 수단 선택</p>
					</div>
					<div class="write">
						<div class="row">
							<div class="cont">
								<div class="pay-option">
									<p class="card">
										<input type="radio" name="pay" id="card">
										<label for="card">신용카드</label>
									</p>
									<p class="accout">
										<input type="radio" name="pay" id="accout">
										<label for="accout">온라인 입금</label>
									</p>
								</div>
								<p class="t-ps size-rg mt-2">* 카드전표는 등록하신 이메일로 자동발송됩니다.</p>
							</div>
						</div>
					</div>
					<div class="write" id="bankAccountSection" style="display: none;">
						<div class="row input">
							<div class="label">입금 계좌 선택</div>
							<div class="cont">
								<div class="select-wrap">
									<button type="button" class="select unselected">입금하실 계좌를 선택해 주세요.</button>
									<ul style="display: none;">
										<li><button type="button" class="option">우리은행 : 123-05-015858 (예금주 : 한국고분자학회)</button></li>
										<li><button type="button" class="option">국민은행 : 814-01-0040-193 (예금주 : 한국고분자학회)</button></li>
									</ul>
								</div>
								<p class="t-warn size-rg mt-2">본인통장이 아닐 경우 반드시 '<b>보내는 사람</b>'을 송금인란에 적어주세요.</p>
								<p class="t-warn size-rg">온라인 입금의 경우 입금확인 후 승인처리까지 <b>하루에서 이틀정도</b>의 시간이 소요됩니다.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="sticky">
				<div class="info">
					<dl>
						<dt>결제 항목</dt>
						<dd class="f-bold c-primary">세미나 참가비용</dd>
					</dl>
					<dl>
						<dt class="body1 f-bold">결제 금액</dt>
						<dd class="price c-primary"><b>50,000</b>원</dd>
					</dl>
				</div>
				<button type="button" onclick="location.href='function_52.php'" class="btn-rg">결제하기</button>
			</div>
		</div>
	</div>
</div>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		const cardRadio = document.getElementById("card");
		const accoutRadio = document.getElementById("accout");
		const bankAccountSection = document.getElementById("bankAccountSection");

		function toggleBankSection() {
			if (accoutRadio.checked) {
				bankAccountSection.style.display = "block";
			} else {
				bankAccountSection.style.display = "none";
			}
		}

		cardRadio.addEventListener("change", toggleBankSection);
		accoutRadio.addEventListener("change", toggleBankSection);

		// 페이지 로드 시 체크된 값 확인
		toggleBankSection();
	});
</script>
<?php include_once('../_tail.php'); ?>