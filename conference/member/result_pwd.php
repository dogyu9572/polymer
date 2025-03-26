<?php include_once ('../_head.php'); ?>
<div class="sub-top sub6">
	<div class="visual no-bread">
		<div class="title">
				<h2>로그인</h2>
				<h3>비밀번호 찾기 결과</h3>
		</div>
	</div>
</div>
<div class="contents">
	<div class="member-bg member">
		<div class="member-wrap">
			<div class="content">
				<p class="heading2 ">비밀번호 찾기 결과</p>
				<p class="t-secondary t-center mt-2">새로운 비밀번호를 입력해 주세요.</p>
				<div class="form">
					<div class="row">
						<p class="label required">비밀번호</p>
						<input type="password" placeholder="특수문자 1개 이상을 포함한 영문 대소문자, 숫자 조합 5자리 입력">
					</div>
					<div class="row">
						<p class="label required">비밀번호 확인</p>
						<input type="password" placeholder="비밀번호 확인">
						<p class="t-ps mt-1 size-rg">※ 비밀번호가 일치하지 않습니다</p>
					</div>
				</div>
				<div class="group-btn">
					<a href="/conference/" class="btn-md">비밀번호 변경</a>
					<a href="#;" class="btn-md outline">취소</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once ('../_tail.php'); ?>