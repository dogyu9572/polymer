<?php include_once ('../_head.php'); ?>
<?php $gNum="4"; $sNum="3"; $gName="발간물"; $sName="고분자 과학과 기술"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<p class="heading2 mb-6">고분자 과학과 기술지 인쇄본 신청</p>
	<div class="pub-apply bg-light border-light">
		<p class="stitle2">기술지편집위원회에서는 2018년도부터 기존에 발간된 내용을 포함하여 <br class="show-pc">
		향후 수록되는 모든 내용을 회원님들이 보다 쉽게 어디에서나 접하실 수 있도록, 발간 형태를 기존의 인쇄본에서 <span class="c-primary">전자출판(e-Book)</span>으로
		전환하였습니다. 전자출판 형태로 <span class="c-primary">『고분자 과학과 기술』지가 배포됨을 회원님들께 널리 알려드리고</span> 다음과 같이 양해를 구하고자 합니다.</p>
		<ul class="number">
			<li><span>1.</span>『고분자 과학과 기술』지 e-Book이 출판되고 있으나 기존의 방식대로 인쇄본을 받아보시길 희망하는 회원님이 있을 것으로 생각합니다.<br>
			따라서, 인쇄본을 받아보시길 원하는 회원님(2024년도 회비납부 정회원 및 종신회원)께서는 아래 링크를 통하여 신청해주시면 인쇄본을 보내드리도록 하겠습니다.</li>
			<li><span>2.</span>현재 e-Book은 2012년부터 보실 수 있도록 준비되어 있습니다. 그 이전 자료 및 발간되는 자료들은 홈페이지에서 기존 방식대로 pdf본으로 찾아보실 수 있습니다.</li>
			<li><span>3.</span>회원분들께서 보다 편하게 보실 수 있도록 e-Book을 발간하고 있지만 개선되어야 할 점이 있으시면 언제든지 학회로 연락 주십시오.<br>
			소중한 의견이 최대한 반영될 수 있도록 노력하겠습니다.</li>
		</ul>
		<p class="t-right stitle2">한국고분자학회 전무이사 겸 <br class="show-mo">고분자 과학과 기술지 편집위원장</p>
	</div>
	<div class="write-wrap b-top">
		<div class="write">
			<div class="row input">
				<div class="label">성명</div>
				<div class="cont">
					<input type="text" placeholder="성명을 입력하세요" value="홍길동">
				</div>
			</div>
			<div class="row input">
				<div class="label">소속</div>
				<div class="cont">
					<input type="text" placeholder="소속을 입력하세요" value="한국고분자학회">
				</div>
			</div>
			<div class="row input">
				<div class="label">부서</div>
				<div class="cont">
					<input type="text" placeholder="부서를 입력하세요" value="사무국">
				</div>
			</div>
			<div class="row input">
				<div class="label">직위</div>
				<div class="cont">
					<input type="text" placeholder="직위를 입력하세요" value="팀장">
				</div>
			</div>
			<div class="row input">
				<div class="label">우편물 우송처</div>
				<div class="cont">
					<p class="radio">
						<input type="radio" name="radio1" id="radio1">
						<label for="radio1">직장주소</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio2">
						<label for="radio2">자택주소</label>
					</p>
					<div class="radio-ps">
						<p class="t-warn">선택된 우송처가 없거나 변경을 원하시면 직접 선택 후 아래 주소를 입력하시기 바랍니다.</p>
						<p class="t-warn">수정된 사항은 회원DB에 저장됩니다.</p>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label">주소</div>
				<div class="cont">
          <div class="input-btn">
            <input type="text" placeholder="주소를 검색해 주세요" readonly>
            <button type="button" class="btn-rg outline hover w-13">주소검색</button>
          </div>
          <input type="text" readonly>
          <input type="text" placeholder="상세주소 입력">
				</div>
			</div>
			<div class="check-btm">
				<p class="checkbox">
					<input type="checkbox" name="agree" id="agree">
					<label for="agree">개인정보처리방침에 동의합니다.</label>
				</p>
				<a href="#;" class="t-under size-rg">내용보기</a>
			</div>
		</div>
	</div>
	<div class="group-btn">
		<a href="publish_31.php" class="btn-md outline-gray w-22">돌아가기</a>
		<a href="#;" class="btn-md w-22" onclick="alert('기술지 인쇄본 신청이 완료 되었습니다.'); window.location.href='/';">기술지 인쇄본 신청</a>
	</div>
</div>
<?php include_once ('../_tail.php'); ?>