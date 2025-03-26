<?php include_once ('../_head.php'); ?>
<?php $gNum="3"; $sNum="2"; $gName="Call for Abstract"; $sName="Registration"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="section regi-step">
		<div class="first done">초록 입력</div>
		<div class="second current">초록 확인</div>
		<div class="third">제출 완료</div>
	</div>
	<div class="section write-wrap m-no-border">
		<div class="title">
			<p class="stitle1"><span class="num">1</span>결제 항목 선택</p>
			<p class="t-ps size-rg">※ 이미 납부하신 항목은 보여지지 않습니다.</p>
		</div>
		<div class="write">
			<div class="row">
				<div class="cont only-cont">
					<p class="radio">
						<input type="radio" name="" id="price" checked>
						<label for="price">초록 사전등록비용</label>
					</p>
					<p class="price"><b>50,000</b>원</p>
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap m-no-border">
		<div class="title">
			<p class="stitle1"><span class="num">2</span>제출자 정보</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label">발표자</div>
				<div class="cont">
					<p>홍길동 (한국연구재단 한계도전 전략 센터)</p>
					<p>- Email : hong@email.com</p>
					<p>- TEL : 010-****-5678</p>
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap m-no-border">
		<div class="title">
			<p class="stitle1"><span class="num">3</span>초록 작성</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label">발표분야</div>
				<div class="cont">
					<div class="select-wrap readonly">
						<button type="button" class="select unselected">구분을 선택해주세요</button>
						<ul>
							<li><button type="button" class="option">발표분야</button></li>
							<li><button type="button" class="option">발표분야</button></li>
							<li><button type="button" class="option">발표분야</button></li>
							<li><button type="button" class="option">발표분야</button></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label">발표 구분</div>
				<div class="cont">
					<p class="radio">
						<input type="radio" name="radio3" id="radio3_1" readonly>
						<label for="radio3_1">키노트강연</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio3" id="radio3_2" readonly>
						<label for="radio3_2">초청강연</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio3" id="radio3_3" readonly>
						<label for="radio3_3">포스터 발표</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio3" id="radio3_4" readonly>
						<label for="radio3_4">구두발표</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio3" id="radio3_5" readonly>
						<label for="radio3_5">기조강연</label>
					</p>
				</div>
			</div>
			<div class="row table">
				<div class="label">
					<p class="f-semibold">공동저자</p>
				</div>
				<div class="cont">
					<div class="table-box m-pad">
						<div class="head">
							<div class="row">
								<!-- 공동저자 / 연구 책임자 추가 필요???? 해달라는거야 말아달라는 거야. -->
								<div class="w-5">이름</div>
								<div class="w-4">소속</div>
								<div class="w-4">연락처</div>
								<div class="w-4">핸드폰</div>
								<div class="w-4">이메일</div>
								<div class="w-4">국적</div>
							</div>
						</div>
						<div class="body">
							<div class="row show-pc">
								<div class="w-5">
									<input type="text" readonly>
								</div>
								<div class="w-4">	
									<input type="text" readonly>
								</div>
								<div class="w-4">
									<input type="text" readonly>
								</div>
								<div class="w-4">
									<input type="text" readonly>
								</div>
								<div class="w-4">
									<input type="text" readonly>
								</div>
								<div class="w-4">
									<input type="text" readonly>
								</div>
							</div>
							<div class="row">
								<div class="w-5">
									<span class="label">이름</span>
									<input type="text" value="김길동" readonly>
								</div>
								<div class="w-4">
									<span class="label">소속</span>
									<input type="text" value="소속명" readonly>
								</div>
								<div class="w-4">
									<span class="label">연락처</span>
									<input type="text" value="010-1234-5678" readonly>
								</div>
								<div class="w-4">
									<span class="label">핸드폰</span>
									<input type="text" value="010-1234-5678" readonly>
								</div>
								<div class="w-4">
									<span class="label">이메일</span>
									<input type="text" value="mail@email.com" readonly>
								</div>
								<div class="w-4">
									<span class="label">국적</span>
									<input type="text" value="대한민국" readonly>
								</div>
							</div>
							<div class="row">
								<div class="w-5">
									<span class="label">이름</span>
									<input type="text" value="김길동" readonly>
								</div>
								<div class="w-4">
									<span class="label">소속</span>
									<input type="text" value="소속명" readonly>
								</div>
								<div class="w-4">
									<span class="label">연락처</span>
									<input type="text" value="010-1234-5678" readonly>
								</div>
								<div class="w-4">
									<span class="label">핸드폰</span>
									<input type="text" value="010-1234-5678" readonly>
								</div>
								<div class="w-4">
									<span class="label">이메일</span>
									<input type="text" value="mail@email.com" readonly>
								</div>
								<div class="w-4">
									<span class="label">국적</span>
									<input type="text" value="대한민국" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label">제목</div>
				<div class="cont">
					<input type="text" placeholder="제목을 입력하세요" readonly>
				</div>
			</div>
			<div class="row input">
				<div class="label">키워드</div>
				<div class="cont">
					<input type="text" placeholder="키워드를 입력하세요" value="hong, samsung, Fund Grants" readonly>
				</div>
			</div>
			<div class="row input">
				<div class="label">우수논문발표 응모</div>
				<div class="cont">
					<p class="radio">
						<input type="radio" name="radio2" id="radio21" readonly>
						<label for="radio21">응모</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio2" id="radio22" readonly>
						<label for="radio22">응모하지 않음</label>
					</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">발표자료 준비 관련 안내</div>
				<div class="cont">
					<p class="checkbox">
						<input type="checkbox" name="agree" id="agree" readonly>
						<label for="agree">발표자료 준비 관련 안내문을 모두 읽고 확인하였습니다.</label>
					</p>
					<a href="#;" class="c-tertiary size-rg f-semibold t-under ml-2" onclick="addModal('popBestExcellent');">안내문 보기</a>
				</div>
			</div>
			<div class="row input">
				<div class="label">초록 내용</div>
				<div class="cont">
					<textarea name="" id="" placeholder="제출 내용을 입력해 주세요." rows="6" readonly>에디터로 추가</textarea>
					<p class="size-rg c-tertiary mt-2">영문 : 1,000자 (국문 500자) 제한, 공백 포함</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">초록 비밀번호</div>
				<div class="cont">
					<input type="password" placeholder="비밀번호를 입력하세요" readonly>
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap m-no-border">
		<div class="title">
			<p class="stitle1"><span class="num">3</span>초록 작성</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label">발표분야</div>
				<div class="cont">
					<div class="select-wrap readonly">
						<button type="button" class="select unselected">구분을 선택해주세요</button>
						<ul>
							<li><button type="button" class="option">발표분야</button></li>
							<li><button type="button" class="option">발표분야</button></li>
							<li><button type="button" class="option">발표분야</button></li>
							<li><button type="button" class="option">발표분야</button></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label">발표 구분</div>
				<div class="cont">
					<p class="radio">
						<input type="radio" name="radio1" id="radio1" readonly>
						<label for="radio1">키노트강연</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio2" readonly>
						<label for="radio2">초청강연</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio3" readonly>
						<label for="radio3">포스터 발표</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio4" readonly>
						<label for="radio4">구두발표</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio5" readonly>
						<label for="radio5">기조강연</label>
					</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">발표자 사진 업로드<p class="t-ps size-rg">* JPG, PNG만 가능<br>사진 크기는 3cm*4cm로 부탁드립니다.</p></div>
				<div class="cont">
					<div class="file-upload">
						<div class="files">
							<p class="file">filename.zip</p>
							<p class="file">filename.zip</p>
							<p class="file">filename.zip</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label">이력 입력
					<p class="show-mo t-ps size-rg">*최대 6개까지 입력 가능</p>
				</div>
				<div class="cont">
					<div class="table-box m-pad m_bdb">
						<div class="head">
							<div class="row">
								<!-- 공동저자 / 연구 책임자 추가 필요???? 해달라는거야 말아달라는 거야. -->
								<div class="w-5">시작 연도</div>
								<div class="w-4">종료 연도</div>
								<div class="w-4">이력</div>
								<div class="w-1"></div>
							</div>
						</div>
						<div class="body">
							<div class="row show-pc">
								<div class="w-5">
									<input type="text" placeholder="YYYY" readonly>
								</div>
								<div class="w-4">	
									<input type="text" placeholder="YYYY" readonly>
								</div>
								<div class="w-4">
									<input type="text" placeholder="OO대학교 XX학과 (학사)" readonly>
								</div>
							</div>
							<div class="row">
								<div class="w-5">
									<span class="label">이름</span>
									<input type="text" value="2024" placeholder="YYYY" readonly>
								</div>
								<div class="w-4">
									<span class="label">소속</span>
									<input type="text" value="고분자학회" placeholder="YYYY" readonly>
								</div>
								<div class="w-4">
									<span class="label">연락처</span>
									<input type="text" value="임원" placeholder="OO대학교 XX학과 (학사)" readonly>
								</div>
							</div>
							<div class="row">
								<div class="w-5">
									<span class="label">이름</span>
									<input type="text" value="" placeholder="YYYY" readonly>
								</div>
								<div class="w-4">
									<span class="label">소속</span>
									<input type="text" value="" placeholder="YYYY" readonly>
								</div>
								<div class="w-4">
									<span class="label">연락처</span>
									<input type="text" value="" placeholder="OO대학교 XX학과 (학사)" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row table">
				<div class="label">
					<p class="f-semibold">공동저자</p>
				</div>
				<div class="cont">
					<div class="table-box m-pad">
						<div class="head">
							<div class="row">
								<div class="w-3">이름</div>
								<div class="w-3">소속</div>
								<div class="w-4">연락처</div>
								<div class="w-4">핸드폰</div>
								<div class="w-4">이메일</div>
								<div class="w-4">국적</div>
								<div class="w-3">발표</div>
								<div class="w-3">회원여부</div>
								<div class="w-3">연구책임자</div>
							</div>
						</div>
						<div class="body">
							<div class="row">
								<div class="w-3">
									<span class="label">이름</span>
									김길동
								</div>
								<div class="w-3">
									<span class="label">소속</span>
									소속명
								</div>
								<div class="w-4">
									<span class="label">연락처</span>
									010-1234-5678
								</div>
								<div class="w-4">
									<span class="label">핸드폰</span>
									010-1234-5678
								</div>
								<div class="w-4">
									<span class="label">이메일</span>
									mail@email.com
								</div>
								<div class="w-4">
									<span class="label">국적</span>
									대한민국
								</div>
								<div class="w-3"><span class="label">발표</span>발표자</div>
								<div class="w-3"><span class="label">회원여부</span>회원</div>
								<div class="w-3"><span class="label">연구책임자</span>
									<p class="checkbox mg0 solo">
										<input type="checkbox" name="agree11" id="agree11" checked readonly>
										<label for="agree11"></label>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="w-3">
									<span class="label">이름</span>
									김길동
								</div>
								<div class="w-3">
									<span class="label">소속</span>
									소속명
								</div>
								<div class="w-4">
									<span class="label">연락처</span>
									010-1234-5678
								</div>
								<div class="w-4">
									<span class="label">핸드폰</span>
									010-1234-5678
								</div>
								<div class="w-4">
									<span class="label">이메일</span>
									mail@email.com
								</div>
								<div class="w-4">
									<span class="label">국적</span>
									대한민국
								</div>
								<div class="w-3"><span class="label">발표</span>-</div>
								<div class="w-3"><span class="label">회원여부</span>회원</div>
								<div class="w-3"><span class="label">연구책임자</span>
									<p class="checkbox mg0 solo">
										<input type="checkbox" name="agree12" id="agree12" readonly>
										<label for="agree12"></label>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="w-3">
									<span class="label">이름</span>
									김길동
								</div>
								<div class="w-3">
									<span class="label">소속</span>
									소속명
								</div>
								<div class="w-4">
									<span class="label">연락처</span>
									010-1234-5678
								</div>
								<div class="w-4">
									<span class="label">핸드폰</span>
									010-1234-5678
								</div>
								<div class="w-4">
									<span class="label">이메일</span>
									mail@email.com
								</div>
								<div class="w-4">
									<span class="label">국적</span>
									대한민국
								</div>
								<div class="w-3"><span class="label">발표</span>-</div>
								<div class="w-3"><span class="label">회원여부</span>회원</div>
								<div class="w-3"><span class="label">연구책임자</span>
									<p class="checkbox mg0 solo">
										<input type="checkbox" name="agree13" id="agree13" readonly>
										<label for="agree13"></label>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="w-3">
									<span class="label">이름</span>
									김길동
								</div>
								<div class="w-3">
									<span class="label">소속</span>
									소속명
								</div>
								<div class="w-4">
									<span class="label">연락처</span>
									010-1234-5678
								</div>
								<div class="w-4">
									<span class="label">핸드폰</span>
									010-1234-5678
								</div>
								<div class="w-4">
									<span class="label">이메일</span>
									mail@email.com
								</div>
								<div class="w-4">
									<span class="label">국적</span>
									대한민국
								</div>
								<div class="w-3"><span class="label">발표</span>-</div>
								<div class="w-3"><span class="label">회원여부</span>비회원</div>
								<div class="w-3"><span class="label">연구책임자</span>-</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label">제목</div>
				<div class="cont">
					<input type="text" placeholder="제목을 입력하세요" readonly>
				</div>
			</div>
			<div class="row input">
				<div class="label">키워드</div>
				<div class="cont">
					<input type="text" placeholder="키워드를 입력하세요" value="hong, samsung, Fund Grants" readonly>
				</div>
			</div>
			<div class="row input">
				<div class="label">우수논문발표 응모</div>
				<div class="cont">
					<p class="radio">
						<input type="radio" name="radio4" id="radio4_1" readonly>
						<label for="radio4_1">응모</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio4" id="radio4_2" readonly>
						<label for="radio4_2">응모하지 않음</label>
					</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">발표자료 준비 관련 안내</div>
				<div class="cont">
					<p class="checkbox">
						<input type="checkbox" name="agree3" id="agree3" readonly>
						<label for="agree3">발표자료 준비 관련 안내문을 모두 읽고 확인하였습니다.</label>
					</p>
					<a href="#;" class="c-tertiary size-rg f-semibold t-under ml-2" onclick="addModal('popBestExcellent');">안내문 보기</a>
				</div>
			</div>
			<div class="row input">
				<div class="label">초록 내용</div>
				<div class="cont">
					<textarea name="" id="" placeholder="제출 내용을 입력해 주세요." rows="6" readonly>에디터로 추가</textarea>
					<p class="size-rg c-tertiary mt-2">영문 : 1,000자 (국문 500자) 제한, 공백 포함</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">초록 비밀번호</div>
				<div class="cont">
					<input type="password" placeholder="비밀번호를 입력하세요" readonly>
				</div>
			</div>
		</div>
	</div>
	<div class="group-btn center m-flex">
		<a href="abstract_21.php" class="btn-md outline-dark w-24">이전으로</a>
		<a href="abstract_23.php" class="btn-md w-24" onclick="alert('이메일로 초록접수 완료 메일이 발송되었습니다.');">초록제출 및 결제</a>
	</div>
</div>

<script>
</script>
<?php include_once ('../_tail.php'); ?>