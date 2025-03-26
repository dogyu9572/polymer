<?php include_once('../_head.php'); ?>
<?php $gNum="6"; $sNum="2"; $gName="마이페이지"; $sName="회비납부내역"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">회비납부내역</button>
		<div class="list">
			<button type="button" onclick="location.href='mypage_1.php'">회원정보수정</button>
			<button type="button" class="active">회비납부내역</button>
			<button type="button" onclick="location.href='mypage_3.php'">회비결제</button>
			<button type="button" onclick="location.href='mypage_4.php'">회원활동(임원)</button>
			<button type="button" onclick="location.href='mypage_5.php'">확인서/영수증</button>
		</div>
	</div>
	<div class="dues-wrap section">
		<div class="dues first">
			<div class="text">
				<p class="tit">연회비</p>
				<p class="status c-error">미납</p>
			</div>
			<a href="#;" class="btn-rg">납부하기</a>
		</div>
		<div class="dues second">
			<div class="text">
				<p class="tit">종신회비</p>
				<p class="status c-error">미납</p>
			</div>
			<a href="#;" class="btn-rg">납부하기</a>
		</div>
	</div>
	<div class="period-flex section">
		<div class="period-wrap">
			<p class="f-medium">납부일</p>
			<div class="period">
				<input type="date">
				<span class="t-secondary">~</span>
				<input type="date">
			</div>
		</div>
		<p class="t-warn">영수증 및 거래명세서는 납부 완료 처리 후 출력이 가능합니다.</p>
	</div>
	<div class="table-box m-table">
		<div class="head">
			<div class="row">
				<div class="w-6">회비구분</div>
				<div class="w-3">납부금액</div>
				<div class="w-3">결제방법</div>
				<div class="w-3">납부여부</div>
				<div class="w-3">납부완료일</div>
				<div class="w-6">출력</div>
			</div>
		</div>
		<div class="body">
			<div class="row">
				<div class="w-6">
					<div class="label">회비구분</div>
					<div class="cont">연회비(정회원/학생회원)</div>
				</div>
				<div class="w-2">
					<div class="label">납부금액</div>
					<div class="cont">100,000원</div>
				</div>
				<div class="w-2">
					<div class="label">결제방법</div>
					<div class="cont">카드결제</div>
				</div>
				<div class="w-2">
					<div class="label">납부여부</div>
					<div class="cont">
						<p class="f-semibold">납부 완료</p>
					</div>
				</div>
				<div class="w-2">
					<div class="label">납부완료일</div>
					<div class="cont">2024.01.01</div>
				</div>
				<div class="w-6">
					<div class="label">출력</div>
					<div class="cont">
						<div class="group-btn mypage2">
							<a href="/print/receipt.html" target="_blank" class="btn-rg outline hover">영수증</a>
							<a href="/print/transaction_statement.html" target="_blank" class="btn-rg outline hover">거래명세서</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="w-6">
					<div class="label">회비구분</div>
					<div class="cont">연회비(정회원/학생회원)</div>
				</div>
				<div class="w-2">
					<div class="label">납부금액</div>
					<div class="cont">100,000원</div>
				</div>
				<div class="w-2">
					<div class="label">결제방법</div>
					<div class="cont">온라인 입금</div>
				</div>
				<div class="w-2">
					<div class="label">납부여부</div>
					<div class="cont">
						<p class="f-semibold c-error">미납</p>
					</div>
				</div>
				<div class="w-2">
					<div class="label">납부완료일</div>
					<div class="cont">-</div>
				</div>
				<div class="w-6">
					<div class="label">출력</div>
					<div class="cont">
						<div class="group-btn mypage2">
							<a href="javascript:void(0);" class="btn-rg outline hover btn_bank_chk">입금계좌 확인</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="w-6">
					<div class="label">회비구분</div>
					<div class="cont">연회비(정회원/학생회원)</div>
				</div>
				<div class="w-2">
					<div class="label">납부금액</div>
					<div class="cont">100,000원</div>
				</div>
				<div class="w-2">
					<div class="label">결제방법</div>
					<div class="cont">온라인 입금</div>
				</div>
				<div class="w-2">
					<div class="label">납부여부</div>
					<div class="cont">
						<p class="f-semibold">납부 완료</p>
					</div>
				</div>
				<div class="w-2">
					<div class="label">납부완료일</div>
					<div class="cont">2024.01.01</div>
				</div>
				<div class="w-6">
					<div class="label">출력</div>
					<div class="cont">
						<div class="group-btn mypage2">
							<a href="/print/receipt.html" target="_blank" class="btn-rg outline hover">영수증</a>
							<a href="/print/transaction_statement.html" target="_blank" class="btn-rg outline hover">거래명세서</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="w-6">
					<div class="label">회비구분</div>
					<div class="cont">연회비(정회원/학생회원)</div>
				</div>
				<div class="w-2">
					<div class="label">납부금액</div>
					<div class="cont">100,000원</div>
				</div>
				<div class="w-2">
					<div class="label">결제방법</div>
					<div class="cont">카드결제</div>
				</div>
				<div class="w-2">
					<div class="label">납부여부</div>
					<div class="cont">
						<p class="f-semibold c-error">미납</p>
					</div>
				</div>
				<div class="w-2">
					<div class="label">납부완료일</div>
					<div class="cont">-</div>
				</div>
				<div class="w-6">
					<div class="label">출력</div>
					<div class="cont">
						<div class="group-btn mypage2">
							<a href="javascript:void(0);" class="btn-rg outline hover btn_bank_chk">입금계좌 확인</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="w-6">
					<div class="label">회비구분</div>
					<div class="cont">연회비(정회원/학생회원)</div>
				</div>
				<div class="w-2">
					<div class="label">납부금액</div>
					<div class="cont">100,000원</div>
				</div>
				<div class="w-2">
					<div class="label">결제방법</div>
					<div class="cont">카드결제</div>
				</div>
				<div class="w-2">
					<div class="label">납부여부</div>
					<div class="cont">
						<p class="f-semibold">납부 완료</p>
					</div>
				</div>
				<div class="w-2">
					<div class="label">납부완료일</div>
					<div class="cont">2024.01.01</div>
				</div>
				<div class="w-6">
					<div class="label">출력</div>
					<div class="cont">
						<div class="group-btn mypage2">
							<a href="/print/receipt.html" target="_blank" class="btn-rg outline hover">영수증</a>
							<a href="/print/transaction_statement.html" target="_blank" class="btn-rg outline hover">거래명세서</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="w-6">
					<div class="label">회비구분</div>
					<div class="cont">연회비(정회원/학생회원)</div>
				</div>
				<div class="w-2">
					<div class="label">납부금액</div>
					<div class="cont">100,000원</div>
				</div>
				<div class="w-2">
					<div class="label">결제방법</div>
					<div class="cont">카드결제</div>
				</div>
				<div class="w-2">
					<div class="label">납부여부</div>
					<div class="cont">
						<p class="f-semibold c-error">미납</p>
					</div>
				</div>
				<div class="w-2">
					<div class="label">납부완료일</div>
					<div class="cont">-</div>
				</div>
				<div class="w-6">
					<div class="label">출력</div>
					<div class="cont">
						<div class="group-btn mypage2">
							<a href="javascript:void(0);" class="btn-rg outline hover btn_bank_chk">입금계좌 확인</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="popup" id="pop_bank_chk">
	<div class="dm"></div>
	<div class="inbox">
		<div class="tit">입급계좌 확인</div>
		<div class="info">
			<dl>
				<dt>결제 수단</dt>
				<dd>온라인 입금</dd>
			</dl>
			<dl>
				<dt>입금하실 곳</dt>
				<dd>
					<span class="t-divide">한국고분자 학회</span>
					<span class="t-divide">우리은행</span><br class="show-mo">
					<span>123-05-015858</span>
				</dd>
			</dl>
		</div>
		<button type="button" class="btn_close">닫기</button>
	</div>
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

	$(".btn_bank_chk").click(function(){
		$("#pop_bank_chk").show();
	});
	$("#pop_bank_chk .btn_close,#pop_bank_chk .dm").click(function(){
		$("#pop_bank_chk").hide();
	});
});
</script>
<?php include_once('../_tail.php'); ?>