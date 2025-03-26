<?php include_once('../_head.php'); ?>
<div class="sub-top sub6">
	<div class="visual no-bread">
		<div class="title">
			<h2>로그인</h2>
			<h3>회원/비회원 로그인</h3>
		</div>
	</div>
</div>
<div class="contents s06">
	<div class="member-bg member">
		<div class="member-wrap">
			<div class="member-wrap login flex">
				<div class="content">
					<p class="heading2 line"><span></span>한국고분자학회 회원 로그인</p>
					<div class="form">
						<div class="row">
							<input type="text" placeholder="아이디">
						</div>
						<div class="row">
							<input type="password" placeholder="비밀번호">
						</div>
					</div>
					<div class="group-btn">
						<a href="/conference/" class="btn-md">로그인</a>
					</div>
					<div class="login-btm">
						<div class="find">
							<a href="/member/find_id.php" class="t-divide">아이디 찾기</a>
							<a href="/member/find_pwd.php">비밀번호 찾기</a>
						</div>
					</div>
				</div>
				<div class="content">
					<p class="heading2 line"><span></span>비회원 로그인<em>*등록하신 적이 없는 경우 새로 신청합니다</em></p>
					<div class="form">
						<div class="row">
							<input type="text" placeholder="이메일">
						</div>
						<div class="row">
							<input type="password" placeholder="비밀번호">
						</div>
					</div>
					<div class="group-btn">
						<a href="bak_login.php" class="btn-md">로그인</a>
					</div>
					<div class="login-btm">
						<div class="find">
							<a href="find_email.php" class="t-divide">이메일 찾기</a>
							<a href="find_pwd.php">비밀번호 찾기</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once('../_tail.php'); ?>