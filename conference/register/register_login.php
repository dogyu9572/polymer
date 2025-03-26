<?php include_once('../_head.php'); ?>
<?php $gNum="4"; $sNum="1"; $gName="Registration"; $sName="Registration Check"; ?>
<?php include_once ('../_aside.php'); ?>
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
						<a href="/conference/register/register_22.php" class="btn-md">로그인</a>
					</div>
					<div class="login-btm">
						<div class="find">
							<a href="/member/find_id.php" class="t-divide">아이디 찾기</a>
							<a href="/member/find_pwd.php">비밀번호 찾기</a>
						</div>
					</div>
					<div class="info_box">
						초록 등록 및 발표 가능. <br />학술대회 발표자는 반드시 학회 회원이어야 합니다.
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
						<a href="register_12.php" class="btn-md">로그인</a>
					</div>
					<div class="login-btm">
						<div class="find">
							<a href="/member/find_email.php" class="t-divide">이메일 찾기</a>
							<a href="/member/find_pwd.php">비밀번호 찾기</a>
						</div>
					</div>
					<div class="info_box solo">
						<span>* 발표 불가</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once('../_tail.php'); ?>