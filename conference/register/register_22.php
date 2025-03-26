<?php include_once('../_head.php'); ?>
<?php $gNum="4"; $sNum="2"; $gName="Registration"; $sName="Registration Check"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="section">
		<p class="stitle1 mb-4">증빙서류 출력</p>
		<div class="table-box m-table">
			<div class="head">
				<div class="row">
					<div class="w-1">이름</div>
					<div class="w-1">소속</div>
					<div class="w-1">구분</div>
					<div class="w-1">금액</div>
					<div class="w-1">결제상태</div>
					<div class="w-7">
						<p>증명서 출력</p>
						<div class="row nbd_b">
							<div>등록확인증</div>
							<div>영수증</div>
							<div>거래명세서</div>
							<div>참가증명원</div>
							<div>발표증명원</div>
							<div>상장</div>
						</div>
					</div>
				</div>
			</div>
			<div class="body">
				<div class="row">
					<div class="w-1">
						<div class="label">이름</div>
						<div class="cont">홍길동</div>
					</div>
					<div class="w-1">
						<div class="label">소속</div>
						<div class="cont">한국고분자학회</div>
					</div>
					<div class="w-1">
						<div class="label">구분</div>
						<div class="cont">학생</div>
					</div>
					<div class="w-1">
						<div class="label">금액</div>
						<div class="cont">160,000</div>
					</div>
					<div class="w-1">
						<div class="label">결제상태</div>
						<div class="cont">
							<p class="c-error mo-inline">미납</p>
							<a href="#;" class="btn-sm">결제하기</a>
						</div>
					</div>
					<div class="w-7">
						<div class="label center">증명서 출력</div>
						<div class="cont row row_btns nbd_b">
							<a href="/print/registration_confirmation.html" class="btn-sm outline hover2"><span class="mo_vw">등록확인증</span> PDF</a>
							<a href="/print/receipt.html" class="btn-sm outline hover2"><span class="mo_vw">영수증</span> PDF</a>
							<a href="/print/transaction_statement.html" class="btn-sm outline hover2"><span class="mo_vw">거래명세서</span> PDF</a>
							<a href="/print/certificate_participation.html" class="btn-sm outline hover2"><span class="mo_vw">참가증명원</span> PDF</a>
							<a href="/print/proof_presentation.html" class="btn-sm outline hover2"><span class="mo_vw">발표증명원</span> PDF</a>
							<a href="/print/certificate_completion.html" class="btn-sm outline hover2"><span class="mo_vw">수료증</span> PDF</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section sm">
		<div class="tit-flex m-flex mb-4">
			<p class="stitle1">등록상세정보</p>
			<div class="group-btn">
				<a href="#;" class="btn-rg outline w-13 show-pc">등록정보 출력</a>
				<a href="/mypage/mypage_1.php" class="btn-rg w-13">정보수정</a>
			</div>
		</div>
		<div class="write-wrap b-top">
			<div class="write m-row">
				<div class="row input">
					<div class="label">이름</div>
					<div class="cont">홍길동</div>
				</div>
				<div class="row input">
					<div class="label">소속</div>
					<div class="cont">한국고분자학회</div>
				</div>
				<div class="row input">
					<div class="label">직종</div>
					<div class="cont">학교/출연연구소/기업체</div>
				</div>
				<div class="row input">
					<div class="label">구분</div>
					<div class="cont">학생/일반/비회원</div>
				</div>
				<div class="row input">
					<div class="label">이메일</div>
					<div class="cont">mail@mail.com</div>
				</div>
				<div class="row input">
					<div class="label">휴대전화</div>
					<div class="cont">01012345678</div>
				</div>
				<div class="row input">
					<div class="label">성별</div>
					<div class="cont">남자</div>
				</div>
				<div class="row input">
					<div class="label">국가</div>
					<div class="cont">korea</div>
				</div>
				<div class="row input">
					<div class="label">내역</div>
					<div class="cont">사전등록비 <b class="f-semibold">160,000원</b> <br class="show-mo">(현장등록비 000원)</div>
				</div>
				<div class="row input">
					<div class="label">결제</div>
					<div class="cont">
						2024.10.19 납부 <a href="#;" class="btn-sm outline ml-2">카드전표 출력</a>
						<!-- 미납 case -->
						<span class="c-error">미납</span> <a href="#;" class="btn-sm ml-2">결제하기</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section sm group-btn">
		<a href="/conference/" class="btn-md outline-dark w-24">메인으로</a>
	</div>
</div>
<?php include_once('../_tail.php'); ?>