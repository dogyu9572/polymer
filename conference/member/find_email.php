<?php include_once('../_head.php'); ?>
<div class="sub-top sub6">
	<div class="visual no-bread">
		<div class="title">
			<h2>로그인</h2>
			<h3>이메일 찾기</h3>
		</div>
	</div>
</div>
<div class="contents">
	<div class="member-bg member">
		<div class="member-wrap">
			<div class="content">
				<p class="heading2">이메일 찾기</p>
				<p class="t-secondary t-center mt-2">비회원 등록 시 입력한 이름과 연락처를 입력해 주세요.</p>
				<div class="form">
					<div class="row">
						<p class="label">이름</p>
						<input type="text" placeholder="이름을 입력해 주세요.">
					</div>
					<div class="row">
						<p class="label">휴대전화</p>
						<input type="tel" placeholder="01012341234">
					</div>
				</div>
				<div class="group-btn">
					<a href="result_email.php" class="btn-md">이메일 찾기</a>
					<a href="/" class="btn-md outline">취소</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once('../_tail.php'); ?>