<?php include_once('../_head.php'); ?>
<?php $gNum="5"; $sNum="2"; $gName="Exhibition"; $sName="Application"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="section write-wrap m-no-border">
		<div class="title">
			<p class="stitle1"><span class="num">1</span>기관정보</p>
			<p class="t-ps sie-rg">※ 사업자등록번호를 입력하신 후 확인버튼을 누르시면 아래의 항목들이 자동으로 입력됩니다.
				입력정보가 잘못되었거나, 존재하지 않을 경우 직접 입력 및 수정하여 주십시오.</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label required">업체명</div>
				<div class="cont">
					<input type="text" placeholder="업체명을 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label required">사업자등록번호</div>
				<div class="cont">
					<div class="input-btn">
						<input type="text" id="businessNumber" placeholder="- 없이 사업자등록번호 10자리를 모두 입력해 주세요.">
						<button type="button" class="btn-rg outline hover2 w-13">조회</button>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label">대표자</div>
				<div class="cont">
					<input type="text" placeholder="대표자 정보를 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">업태</div>
				<div class="cont">
					<input type="text" placeholder="업태 정보를 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">종목</div>
				<div class="cont">
					<input type="text" placeholder="종목 정보를 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">주소</div>
				<div class="cont">
					<div class="input-btn">
						<input type="text" placeholder="주소를 검색해 주세요">
						<button type="button" class="btn-rg outline hover2 w-13">주소검색</button>
					</div>
					<input type="text" placeholder="상세주소 입력">
				</div>
			</div>
			<div class="row input">
				<div class="label required">대표 전화</div>
				<div class="cont">
					<input type="text" placeholder="대표 전화번호를 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">팩스</div>
				<div class="cont">
					<input type="text" placeholder="팩스 번호를 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">홈페이지(URL)</div>
				<div class="cont">
					<input type="text" placeholder="홈페이지 URL을 모두 입력해 주세요.">
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap m-no-border">
		<div class="title">
			<p class="stitle1"><span class="num">2</span>기업홍보부스 신청</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label required">신청 갯수</div>
				<div class="cont">
					<div class="unit">
						<input type="text" placeholder="신청 갯수를 입력해 주세요">
						<span class="t-unit">개</span>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label">간판명</div>
				<div class="cont">
					<input type="text" placeholder="간판명은 입력해 주신 사항대로 간판이 제작됩니다.">
				</div>
			</div>
			<div class="row input">
				<div class="label">전시품목명</div>
				<div class="cont">
					<input type="text" placeholder="전시품목은 초록집과 홈페이지에 안내됩니다.">
				</div>
			</div>
			<div class="row input">
				<div class="label">세금계산서 발행</div>
				<div class="cont">
					<p class="radio">
						<input type="radio" name="radio1" id="radio11">
						<label for="radio11">청구계산서</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio12">
						<label for="radio12">영수계산서</label>
					</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">발행 희망일자</div>
				<div class="cont">
					<input type="text" placeholder="2024-01-02 형식으로 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">기타 요청사항</div>
				<div class="cont">
					<input type="text" placeholder="기타 요청사항이 있으실 경우 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">유무선 여부</div>
				<div class="cont">
					<p class="radio">
						<input type="radio" name="radio1" id="radio21">
						<label for="radio21">유선</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio22">
						<label for="radio22">무선</label>
					</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">인터넷 신청 개수</div>
				<div class="cont">
					<div class="unit">
						<input type="text" placeholder="신청 갯수를 입력해 주세요">
						<span class="t-unit">개</span>
						<p class="t-warn size-rg">신청 개수 당 70,000원 (부가세 별도)</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="label">
					<p class="f-semibold">프로그램북 광고 파일 업로드</p>
					<div class="mt-2">
						<p class="t-warn size-rg">광고 사이즈 : 세로형, A4(210mm * 279mm)</p>
						<p class="t-warn size-rg">10MB 이상의 파일은 업로드가 불가하며, 이 경우 광고 파일은 메일(polymer@polymer.or.kr)로 보내주시기 바랍니다.</p>
					</div>
				</div>
				<div class="cont mt-4">
					<div class="file-upload">
						<button type="button" class="btn-rg outline hover2">파일 첨부</button>
						<div class="files">
							<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
							<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
							<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="label">
					<p class="f-semibold">로고 파일 업로드</p>
					<div class="mt-2">
						<p class="t-warn size-rg">로고 사이즈 : 가로 180px이하 * 세로 40px이하</p>
						<p class="t-warn size-rg">10MB 이상의 파일은 업로드가 불가하며, 이 경우 파일은 메일(polymer@polymer.or.kr)로 보내주시기 바랍니다.</p>
					</div>
				</div>
				<div class="cont mt-4">
					<div class="file-upload">
						<button type="button" class="btn-rg outline hover2">파일 첨부</button>
						<div class="files">
							<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
							<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
							<p class="file">filename.zip <button type="button" class="del" title="삭제"></button></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap m-no-border">
		<div class="title a-center">
			<p class="stitle1"><span class="num">3</span>담당자 정보</p>
			<p class="checkbox">
				<input type="checkbox" name="" id="check1">
				<label for="check1">대표자 정보와 동일</label>
			</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label">담당자 성함</div>
				<div class="cont">
					<input type="text" placeholder="담당자 성함을 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">직위</div>
				<div class="cont">
					<input type="text" placeholder="담당자 직위를 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">담당자 연락처</div>
				<div class="cont">
					<input type="tel" placeholder="담당자 연락처를 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">휴대전화</div>
				<div class="cont">
					<input type="tel" placeholder="담당자 휴대전화를 입력해 주세요.">
				</div>
			</div>
			<div class="row input">
				<div class="label">담당자 이메일</div>
				<div class="cont">
					<input type="email" placeholder="담당자 이메일을 입력해 주세요">
				</div>
			</div>
			<div class="row input">
				<div class="label">주소</div>
				<div class="cont">
					<div class="input-btn">
						<input type="text" placeholder="주소를 검색해 주세요">
						<button type="button" class="btn-rg outline hover2 w-13">주소검색</button>
					</div>
					<input type="text" placeholder="상세주소 입력">
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap m-no-border">
		<div class="title a-center">
			<p class="stitle1"><span class="num">4</span>로그인 정보</p>
			<p class="t-ps size-rg">※ 로그인정보는 참가확인 및 자리배치에 필요합니다.</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label">아이디</div>
				<div class="cont">
					<input type="text" placeholder="아이디는 사업자등록번호와 동일합니다." disabled>
				</div>
			</div>
			<div class="row input">
				<div class="label required">비밀번호</div>
				<div class="cont">
					<input type="password" placeholder="1~4자리 입력">
				</div>
			</div>
			<div class="row input">
				<div class="label required">비밀번호 확인</div>
				<div class="cont">
					<input type="password" placeholder="">
				</div>
			</div>
		</div>
	</div>
	<div class="section sm t-center">
		<a href="javascript:void(0);" class="btn-md" onclick="confirmRegistration()">참가신청하기</a>
	</div>
</div>
<script>
	function confirmRegistration() {
		if (confirm("참가신청하시겠습니까?")) {
			alert("참가신청이 완료되었습니다.");
			window.location.href = "/conference/exhibit/exhibit_3.php";
		}
	}
</script>

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
<?php include_once('../_tail.php'); ?>