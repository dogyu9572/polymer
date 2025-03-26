<?php include_once ('../_head.php'); ?>
<?php $gNum="4"; $sNum="2"; $gName="Registration"; $sName="Registration Check"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents">
	<div class="member-bg">
		<div class="member-wrap">
			<div class="content">
				<p class="heading2">Registraction Check</p>
				<div class="form mt-5">
					<div class="row">
						<p class="label">이메일 주소</p>
						<input type="text" placeholder="이메일 주소를 입력해 주세요.">
					</div>
					<div class="row">
						<p class="label">이름</p>
						<input type="text" placeholder="이름을 입력해 주세요.">
					</div>
					<div class="row">
						<p class="label">연락처</p>
						<input type="tel" placeholder="연락처">
					</div>
				</div>
				<div class="group-btn">
					<a href="register_22.php" class="btn-md">등록확인</a>
					<a href="/conference/" class="btn-md outline">메인으로</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once ('../_tail.php'); ?>