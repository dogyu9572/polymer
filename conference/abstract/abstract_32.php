<?php include_once ('../_head.php'); ?>
<?php $gNum="3"; $sNum="3"; $gName="Call for Abstract"; $sName="Registration"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="section sm">
		<p class="heading3">검색 및 수정</p>
	</div>
	<div class="section sm">
		<div class="write-wrap">
			<div class="title">
				<p class="stitle1">제출 정보</p>
			</div>
			<div class="write">
				<div class="row input">
					<div class="label">발표분야</div>
					<div class="cont">기조강연</div>
				</div>
				<div class="row input">
					<div class="label">발표 구분</div>
					<div class="cont">초청강연 (URL)</div>
				</div>
				<!-- <div class="row input">
					<div class="label">발표장치</div>
					<div class="cont">Projector</div>
				</div> -->
				<div class="row input">
					<div class="label">제목</div>
					<div class="cont">한계도전 R&D 프로젝트 설명회. </div>
				</div>
				<div class="row input">
					<div class="label">발표자</div>
					<div class="cont">
						<p>홍길동 (한국연구재단 한계도전 전략 센터)</p>
						<!-- <ul class="bullet-gray mt-2">
							<li>Email : hong@email.com</li>
							<li>TEL : 010-****-5678</li>
						</ul> -->
					</div>
				</div>
				<div class="row input">
					<div class="label">연구책임자</div>
					<div class="cont">
						<p>홍길동 (한국연구재단 한계도전 전략 센터)</p>
						<!-- <ul class="bullet-gray mt-2">
							<li>Email : hong@email.com</li>
							<li>TEL : 010-****-5678</li>
						</ul> -->
					</div>
				</div>
				<div class="row input">
					<div class="label">저자</div>
					<div class="cont">
						<p>홍길동 (한국연구재단 한계도전 전략 센터)</p>
						<p>홍길동 (한국연구재단 한계도전 전략 센터)</p>
					</div>
				</div>
				<div class="row input">
					<div class="label">키워드</div>
					<div class="cont">hong, samsung, Fund Grants</div>
				</div>
				<div class="row input">
					<div class="label">우수논문발표</div>
					<div class="cont t-secondary">우수논문발표상에 응모하지 않습니다.</div>
				</div>
				<div class="row input">
					<div class="label">준비관련안내</div>
					<div class="cont t-secondary">발표자료 준비 관련 안내문을 모두 읽고 확인하였습니다.</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section sm">
		<div class="write-wrap">
			<div class="title">
				<p class="stitle1">초록</p>
			</div>
			<div class="write">
				<div class="row input">
					<div class="label">내용</div>
					<div class="cont">
						작성하신 내용이 나타납니다.<br>작성하신 내용이 나타납니다.
						작성하신 내용이 나타납니다.작성하신 내용이 나타납니다.<br>
						작성하신 내용이 나타납니다.작성하신 내용이 나타납니다.작성하신 내용이 나타납니다.
					</div>
				</div>
				<div class="row input">
					<div class="label">발표코드</div>
					<div class="cont">1PS-999</div>
				</div>
				<div class="row input">
					<div class="label">발표일정</div>
					<div class="cont">2024-07-23   10:30 - 10:50</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section sm">
		<div class="group-btn center m-flex">
			<a href="abstract_31.php" class="btn-md w-24">목록보기</a>
			<a href="javascript:showModal('password');" class="btn-md outline w-24">초록 수정하기</a>
		</div>
	</div>
</div>
<!-- modal -->
<div class="modal-wrap" data-modal-name="password">
	<div class="modal-inner form">
		<div class="modal-header">
			<p class="stitle2">초록 등록 시 입력한 <b>비밀번호</b>를 입력해 주세요.</p>
		</div>
		<div class="modal-body">
			<input type="password" name="" id="" placeholder="비밀번호를 입력해 주세요.">
		</div>
		<div class="modal-footer">
			<button type="button" onclick="closeModal();" class="btn-lg">확인</button>
		</div>
		<button type="button" class="close" onclick="closeModal();" title="팝업 닫기"></button>
	</div>
</div>
<?php include_once ('../_tail.php'); ?>