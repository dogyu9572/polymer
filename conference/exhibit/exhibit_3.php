<?php include_once ('../_head.php'); ?>
<?php $gNum="5"; $sNum="3"; $gName="Exhibition"; $sName="Booth Plan"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents ">
	<div class="member-bg member">
		<div class="member-wrap">
			<div class="content">
				<div class="form">
					<div class="row">
						<p class="label">사업자등록번호</p>
						<input type="text" id="businessNumber" placeholder="- 없이 사업자번호 10자리를 모두 입력해 주세요.">
					</div>
					<div class="row">
						<p class="label">비밀번호</p>
						<input type="password" placeholder="비밀번호를 입력해주세요.">
					</div>
				</div>
				<div class="group-btn">
					<a href="exhibit_32.php" class="btn-md">자리 배치 로그인</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const businessInput = document.getElementById("businessNumber");
    businessInput.addEventListener("input", function(event) {
        let value = event.target.value.replace(/\D/g, ""); // 숫자 이외의 문자 제거
        if (value.length > 10) value = value.substring(0, 10); // 최대 10자리 제한
        let formattedValue = "";
        if (value.length <= 3) {
            formattedValue = value;
        } else if (value.length <= 5) {
            formattedValue = value.substring(0, 3) + "-" + value.substring(3);
        } else {
            formattedValue = value.substring(0, 3) + "-" + value.substring(3, 5) + "-" + value.substring(5);
        }
        event.target.value = formattedValue;
    });
});
</script>

<?php include_once ('../_tail.php'); ?>