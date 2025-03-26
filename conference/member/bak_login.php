<?php include_once('../_head.php'); ?>
<div class="sub-top sub6">
	<div class="visual no-bread">
		<div class="title">
			<h2>로그인</h2>
			<h3>비회원 로그인</h3>
		</div>
	</div>
</div>
<div class="contents">
	<div class="member-bg member">
		<div class="member-wrap">
			<div class="content">
				<p class="heading2">비회원 등록</p>
				<p class="t-secondary t-center mt-2">이미 등록하신 경우 비회원 로그인을 부탁드립니다.</p>
				<div class="form">
					<p class="t-warn mb-2">이메일 주소와 비밀번호는 등록사항을 확인하실 때 필요합니다. 반드시 입력해 주세요.</p>
					<div class="row">
						<p class="label required">이메일 주소</p>
						<div class="input-btn">
							<input type="text" placeholder="이메일 주소를 입력해 주세요.">
							<button type="button" class="btn-rg outline hover2">중복확인</button>
						</div>
					</div>
					<div class="row">
						<p class="label required">비밀번호</p>
						<input type="password" placeholder="특수문자 1개 이상을 포함한 영문 대소문자, 숫자 조합 5자리 입력">
					</div>
					<div class="row">
						<p class="label required">비밀번호 확인</p>
						<input type="password" placeholder="">
					</div>
					<div class="row">
						<p class="label required">이름</p>
						<input type="text" placeholder="이름을 입력해 주세요.">
					</div>
					<div class="row">
						<p class="label required">소속</p>
						<input type="text" placeholder="소속(학교)명을 입력해 주세요.">
					</div>
					<!-- <div class="row">
						<p class="label required">직종</p>
						<p class="radio">
							<input type="radio" name="radio1" id="radio11" checked>
							<label for="radio11">학교</label>
						</p>
						<p class="radio">
							<input type="radio" name="radio1" id="radio12">
							<label for="radio12">출연연구소</label>
						</p>
						<p class="radio">
							<input type="radio" name="radio1" id="radio13">
							<label for="radio13">기업체</label>
						</p>
						<p class="radio">
							<input type="radio" name="radio1" id="radio14">
							<label for="radio14">기업연구소</label>
						</p>
					</div> -->
					<div class="row">
<!-- 						<p class="label">성별</p>
						<p class="radio">
							<input type="radio" name="radio2" id="radio21" checked>
							<label for="radio21">남성</label>
						</p>
						<p class="radio">
							<input type="radio" name="radio2" id="radio22">
							<label for="radio22">여성</label>
						</p>
					</div> -->
					<div class="row">
						<p class="label required">휴대전화</p>
						<input type="tel" placeholder="010-1234-1234">
					</div>
<!-- 					<div class="row">
						<p class="label">국가 선택</p>
						<div class="select-wrap">
							<button type="button" class="select unselected">국가를 선택해 주세요</button>
							<ul>
								<li><button type="button" class="option">국가</button></li>
								<li><button type="button" class="option">국가</button></li>
								<li><button type="button" class="option">국가</button></li>
								<li><button type="button" class="option">국가</button></li>
							</ul>
						</div>
					</div> -->
					<div class="row">
						<div class="check-flex">
							<p class="checkbox">
								<input type="checkbox" name="" id="agree1">
								<label for="agree1"><span class="c-primary">(필수)</span>개인정보처리방침에 동의합니다.</label>
							</p>
							<button type="button">내용보기</button>
						</div>
						<div class="check-flex">
							<p class="checkbox">
								<input type="checkbox" name="" id="agree2">
								<label for="agree2"><span class="c-primary">(필수)</span>행사 시 촬영된 사진 및 영상자료를 <br class="show-pc">
									학회 홈페이지 또는 SNS에 게시하는 것에 동의합니다.</label>
							</p>
							<!-- <button type="button">내용보기</button> -->
						</div>
					</div>
				</div>
				<div class="group-btn">
					<a href="#;" class="btn-md" onclick="registerProfile(); return false;">비회원 등록하기</a>
					<a href="/" class="btn-md outline">취소</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function registerProfile() {
		if (confirm("프로필을 등록하시겠습니까?")) { // 확인 창 표시
			alert("프로필이 등록되었습니다."); // 등록 완료 메시지
			window.location.href = "/conference/member/login.php"; // 페이지 이동
		}
	}
</script>
<?php include_once('../_tail.php'); ?>