<?php include_once('../_head.php'); ?>
<?php $gNum="2"; $sNum="1"; $gName="학회활동"; $sName="학회상"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">온라인 접수</button>
		<div class="list">
			<button type="button" onclick="location.href='/act/act_11.php'">학회상 안내</button>
			<button type="button" onclick="location.href='/act/act_12.php'">학회상 심사위원</button>
			<button type="button" onclick="location.href='/act/act_13.php'">역대 수상자</button>
			<button type="button" onclick="location.href='/act/act_14.php'">시상요강</button>
			<button type="button" class="active" onclick="location.href='/act/act_15.php'">온라인 접수</button>
			<button type="button" onclick="location.href='/act/act_16.php'">접수확인</button>
		</div>
	</div>
	<div class="section write-wrap">
		<div class="title">
			<p class="stitle1"><span class="num">1</span>접수자 기본정보</p>
			<p class="t-ps">* 는 필수 입력항목입니다.</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label">접수일</div>
				<div class="cont">2024-08-01 13:11</div>
			</div>
			<div class="row input">
				<div class="label required">학회상</div>
				<div class="cont">
					<div class="select-wrap">
						<button type="button" class="select">학술상</button>
						<ul>
							<li><button type="button" class="option" selected>학술상</button></li>
							<li><button type="button" class="option">우수논문상</button></li>
							<li><button type="button" class="option">학술진보상</button></li>
							<li><button type="button" class="option">상암고분자상</button></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label required">이름</div>
				<div class="cont">
					<input type="text" placeholder="접수하시는 분의 이름을 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label required">연락처</div>
				<div class="cont">
					<input type="text" placeholder="접수하시는 분의 연락처를 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label required">이메일</div>
				<div class="cont">
					<input type="text" placeholder="연락 받으실 이메일을 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label required">비밀번호</div>
				<div class="cont inc-ts">
					<input type="text" placeholder="비밀번호를 입력해 주세요.">
					<span class="t-ps">* 비밀번호는 접수 조회 시 필요하기 때문에 반드시 기억해 주세요.</span>
				</div>
			</div>
			<div class="row input">
				<div class="label required">비밀번호 확인</div>
				<div class="cont inc-ts">
					<input type="text" placeholder="비밀번호를 다시 입력해 주세요.">
					<span class="t-ps">* 비밀번호가 일치하지 않습니다.</span>
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap">
		<div class="title">
			<p class="stitle1"><span class="num">2</span>필수 서류 양식 다운로드</p>
		</div>
		<div class="write">
			<div class="row">
				<div class="group-btn j-start">
					<a href="#;" download class="btn-rg outline hover w-18">서류 양식
						<span class="ico-after"><img src="/pub/images/ico/ico_down_pdark.svg" alt=""></span>
					</a>
					<a href="#;" download class="btn-rg outline hover w-18">개인정보동의서
						<span class="ico-after"><img src="/pub/images/ico/ico_down_pdark.svg" alt=""></span>
					</a>
					<a href="#;" download class="btn-rg outline hover w-18">개인정보동의서
						<span class="ico-after"><img src="/pub/images/ico/ico_down_pdark.svg" alt=""></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap">
		<div class="title">
			<p class="stitle1"><span class="num">3</span>서류 제출</p>
			<p class="t-ps">* 제출 마감일까지는 수정이 가능합니다. 서류 제출 전 누락된 파일이 없는지 다시 한번 확인해 주세요.</p>
		</div>
		<div class="write">
			<div class="row file-upload">
				<label for="fileUpload" class="btn-rg outline hover">파일 첨부</label>
				<input type="file" id="fileUpload" style="display: none;">
				<div class="files">
					<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
					<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
					<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap">
		<div class="title">
			<p class="stitle1"><span class="num">4</span>개인정보처리방침 동의</p>
		</div>
		<div class="write">
			<div class="row">
				<div class="privacy-wrap">
					<div class="scroll-gray">
						<pre>(사)한국고분자학회는 이용자들의 개인정보를 소중히 다루고 있습니다.
현행 시행일자 : 2020년 09월 04일

"개인정보"라 함은 생존하는 개인에 관한 정보로서 당해 정보에 포함되어 있는 성명, 주민등록번호 등의 사항에 의하여 당해 개인을 식별할 수 있는 정보(당해 정보만으로는 특정 개인을 식별할 수 없더라도 다른 정보와 용이하게 결합하여 식별할 수 있는 것을 포함)를 말합니다.

(사)한국고분자학회(이하 "학회"라 함)는 이용자들의 개인정보보호를 매우 중요시하며, 이용자가 학회의 서비스(이하 "한국고분자학회 서비스" 또는 "한국고분자학회"라 함)를 이용함과 동시에 온라인상에서 학회에 제공한 개인정보가 보호 받을 수 있도록 최선을 다하고 있습니다. 학회는 개인정보처리방침을 홈페이지 첫 화면에 공개함으로써 이용자들이 언제나 용이하게 보실 수 있도록 조치하고 있습니다.

학회는 개인정보처리방침을 통하여 이용자들이 제공하는 개인정보가 어떠한 용도와 방식으로 이용되고 있으며 개인정보보호를 위해 어떠한 조치가 취해지고 있는지 알려드립니다.</pre>
					</div>
				</div>
				<p class="checkbox f-medium">
					<input type="checkbox" name="agree" id="agree">
					<label for="agree">개인정보처리방침에 동의합니다.</label>
				</p>
			</div>
		</div>
	</div>
	<div class="group-btn center">
		<a href="#;" class="btn-md w-20 outline-gray">취소</a>
		<a href="act_15_done.php" class="btn-md w-20">온라인 접수</a>
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
	});
</script>
<?php include_once('../_tail.php'); ?>