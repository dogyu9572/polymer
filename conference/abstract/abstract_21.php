<?php include_once ('../_head.php'); ?>
<?php $gNum="3"; $sNum="2"; $gName="Call for Abstract"; $sName="Registration"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="section regi-step">
		<div class="first current">초록 입력</div>
		<div class="second">초록 확인</div>
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
					<div class="select-wrap">
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
						<input type="radio" name="radio1" id="radio5">
						<label for="radio5">기조강연</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio1">
						<label for="radio1">키노트강연</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio2">
						<label for="radio2">초청강연</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio4">
						<label for="radio4">구두발표</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio1" id="radio3">
						<label for="radio3">포스터 발표</label>
					</p>
				</div>
			</div>
			<div class="row table">
				<div class="label">
					<p class="f-semibold">공동저자 등록</p>
					<div class="group-btn show-pc align_center">
						<!-- <button type="button" class="btn-rg ico-after add">직접 입력</button> -->
						<!-- <button type="button" onclick="showModal('member');" class="btn-rg outline-gray ico-after sch long">회원/비회원 확인(필수)</button> -->
						<button type="button" class="box_add" title="추가" onclick="alert('정보를 입력하시고 회원 검색을 반드시 해 주시기 바랍니다'); showModal('applyAuthor');"></button>
					</div>
					<div class="group-btn show-mo">
						<button type="button" onclick="showModal('addAuthor');" class="btn-md">공동저자 추가<span class="ico-after"><img src="/pub/images/ico/ico_plus_round.svg" alt=""></span></button>
					</div>
				</div>
				<div class="cont">
					<div class="table-box m-pad">
						<div class="head">
							<div class="row">
								<div class="w-2">순서</div>
								<div class="w-3">이름</div>
								<div class="w-3">소속</div>
								<div class="w-4">연락처</div>
								<div class="w-4">핸드폰</div>
								<div class="w-4">이메일</div>
								<div class="w-4">국적</div>
								<div class="w-3">발표</div>
								<div class="w-3">회원여부</div>
								<div class="w-3">연구책임자</div>
								<div class="w-15"></div>
							</div>
						</div>
						<div class="body">
							<div class="row">
								<div class="w-2">
									<button type="button" class="list_btn list_down">▼</button>
								</div>
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
										<input type="checkbox" name="agree11" id="agree11" checked>
										<label for="agree11"></label>
									</p>
								</div>
								<div class="w-15 show-pc">&nbsp;</div>
							</div>
							<div class="row">
								<div class="w-2">
									<button type="button" class="list_btn list_up">▲</button>
									<button type="button" class="list_btn list_down">▼</button>
								</div>
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
										<input type="checkbox" name="agree12" id="agree12">
										<label for="agree12"></label>
									</p>
								</div>
								<div class="w-15 show-pc">
									<button type="button" class="btn_modify" title="수정" onclick="showModal('applyAuthor');"></button>
									<button type="button" class="box-delete" title="삭제"></button>
								</div>
							</div>
							<div class="row">
								<div class="w-2">
									<button type="button" class="list_btn list_up">▲</button>
									<button type="button" class="list_btn list_down">▼</button>
								</div>
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
										<input type="checkbox" name="agree13" id="agree13">
										<label for="agree13"></label>
									</p>
								</div>
								<div class="w-15 show-pc">
									<button type="button" class="btn_modify" title="수정" onclick="showModal('applyAuthor');"></button>
									<button type="button" class="box-delete" title="삭제"></button>
								</div>
							</div>
							<div class="row">
								<div class="w-2">
									<button type="button" class="list_btn list_up">▲</button>
								</div>
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
								<div class="w-15 show-pc">
									<button type="button" class="btn_modify" title="수정" onclick="showModal('applyAuthor');"></button>
									<button type="button" class="box-delete" title="삭제"></button>
								</div>
							</div>
							<!-- <div class="row show-pc">
								<div class="w-15">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">	
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<p class="checkbox solo">
										<input type="checkbox" name="agree2" id="agree2">
										<label for="agree2"></label>
									</p>
								</div>
								<div class="w-15 show-pc"><button type="button" class="btn-save">저장</button></div>
							</div> -->
						</div>
					</div>
				</div>
			</div>

			<div class="row input">
				<div class="label">제목</div>
				<div class="cont">
					<input type="text" placeholder="제목을 입력하세요">
				</div>
			</div>
			<div class="row input">
				<div class="label">키워드</div>
				<div class="cont">
					<input type="text" placeholder="키워드를 입력하세요" value="hong, samsung, Fund Grants">
				</div>
			</div>
			<div class="row input">
				<div class="label">우수논문발표 응모</div>
				<div class="cont">
					<p class="radio">
						<input type="radio" name="radio2" id="radio21">
						<label for="radio21" onclick="addModal('popBestExcellent');">응모</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio2" id="radio22">
						<label for="radio22">응모하지 않음</label>
					</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">발표자료 준비 관련 안내</div>
				<div class="cont">
					<p class="checkbox">
						<input type="checkbox" name="agree" id="agree">
						<label for="agree">발표자료 준비 관련 안내문을 모두 읽고 확인하였습니다.</label>
					</p>
					<a href="#;" class="c-tertiary size-rg f-semibold t-under ml-2" onclick="addModal('popBestExcellent');">안내문 보기</a>
				</div>
			</div>
			<div class="row input">
				<div class="label">초록 내용</div>
				<div class="cont">
					<textarea name="" id="" placeholder="제출 내용을 입력해 주세요." rows="6">에디터로 추가</textarea>
					<p class="size-rg c-tertiary mt-2">영문 : 1,000자 (국문 500자) 제한, 공백 포함</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">초록 비밀번호</div>
				<div class="cont">
					<input type="password" placeholder="비밀번호를 입력하세요">
				</div>
			</div>
		</div>
		<div class="group-btn j-end m-full mt-4">
			<button type="button" class="btn-rg ico-after add">초록 작성 추가</button>
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
					<div class="select-wrap">
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
						<input type="radio" name="radio3" id="radio3_1">
						<label for="radio3_1">기조강연</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio3" id="radio3_2">
						<label for="radio3_2">키노트강연</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio3" id="radio3_3">
						<label for="radio3_3">초청강연</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio3" id="radio3_4">
						<label for="radio3_4">구두발표</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio3" id="radio3_5">
						<label for="radio3_5">포스터 발표</label>
					</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">발표자 사진 업로드<p class="t-ps size-rg">* JPG, PNG만 가능<br>사진 크기는 3cm*4cm로 부탁드립니다.</p></div>
				<div class="cont">
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
			<div class="row input">
				<div class="label">이력 입력
					<p class="show-mo t-ps size-rg">*최대 6개까지 입력 가능</p>
					<div class="group-btn m-full show-mo mt-2">
						<button type="button" onclick="showModal('addHistory');" class="btn-md">이력 추가<span class="ico-after"><img src="/pub/images/ico/ico_plus_round.svg" alt=""></span></button>
					</div>
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
									<input type="text" placeholder="YYYY">
								</div>
								<div class="w-4">	
									<input type="text" placeholder="YYYY">
								</div>
								<div class="w-4">
									<input type="text" placeholder="OO대학교 XX학과 (학사)">
								</div>
								<div class="w-1 show-pc"><button type="button" class="box_add" title="추가"></button></div>
							</div>
							<div class="row">
								<div class="w-5">
									<span class="label">이름</span>
									<input type="text" value="2024" placeholder="YYYY">
								</div>
								<div class="w-4">
									<span class="label">소속</span>
									<input type="text" value="고분자학회" placeholder="YYYY">
								</div>
								<div class="w-4">
									<span class="label">연락처</span>
									<input type="text" value="임원" placeholder="OO대학교 XX학과 (학사)">
								</div>
								<div class="w-1 show-pc"><button type="button" class="box-delete" title="삭제"></button></div>
							</div>
							<div class="row">
								<div class="w-5">
									<span class="label">이름</span>
									<input type="text" value="" placeholder="YYYY">
								</div>
								<div class="w-4">
									<span class="label">소속</span>
									<input type="text" value="" placeholder="YYYY">
								</div>
								<div class="w-4">
									<span class="label">연락처</span>
									<input type="text" value="" placeholder="OO대학교 XX학과 (학사)">
								</div>
								<div class="w-1 show-pc"><button type="button" class="box-delete" title="삭제"></button></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row table">
				<div class="label">
					<p class="f-semibold">공동저자 등록</p>
					<div class="group-btn show-pc align_center">
						<!-- <button type="button" class="btn-rg ico-after add">직접 입력</button> -->
						<!-- <button type="button" onclick="showModal('member');" class="btn-rg outline-gray ico-after sch long">회원/비회원 확인(필수)</button> -->
						<button type="button" class="box_add" title="추가" onclick="alert('정보를 입력하시고 회원 검색을 반드시 해 주시기 바랍니다'); showModal('applyAuthor');"></button>
					</div>
					<div class="group-btn show-mo">
						<button type="button" onclick="showModal('addAuthor');" class="btn-md">공동저자 추가<span class="ico-after"><img src="/pub/images/ico/ico_plus_round.svg" alt=""></span></button>
					</div>
				</div>
				<div class="cont">
					<div class="table-box m-pad">
						<div class="head">
							<div class="row">
								<div class="w-2">순서</div>
								<div class="w-3">이름</div>
								<div class="w-3">소속</div>
								<div class="w-4">연락처</div>
								<div class="w-4">핸드폰</div>
								<div class="w-4">이메일</div>
								<div class="w-4">국적</div>
								<div class="w-3">발표</div>
								<div class="w-3">회원여부</div>
								<div class="w-3">연구책임자</div>
								<div class="w-15"></div>
							</div>
						</div>
						<div class="body">
							<div class="row">
								<div class="w-2">
									<button type="button" class="list_btn list_down">▼</button>
								</div>
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
										<input type="checkbox" name="agree11" id="agree11" checked>
										<label for="agree11"></label>
									</p>
								</div>
								<div class="w-15 show-pc">&nbsp;</div>
							</div>
							<div class="row">
								<div class="w-2">
									<button type="button" class="list_btn list_up">▲</button>
									<button type="button" class="list_btn list_down">▼</button>
								</div>
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
										<input type="checkbox" name="agree12" id="agree12">
										<label for="agree12"></label>
									</p>
								</div>
								<div class="w-15 show-pc">
									<button type="button" class="btn_modify" title="수정" onclick="showModal('applyAuthor');"></button>
									<button type="button" class="box-delete" title="삭제"></button>
								</div>
							</div>
							<div class="row">
								<div class="w-2">
									<button type="button" class="list_btn list_up">▲</button>
									<button type="button" class="list_btn list_down">▼</button>
								</div>
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
										<input type="checkbox" name="agree13" id="agree13">
										<label for="agree13"></label>
									</p>
								</div>
								<div class="w-15 show-pc">
									<button type="button" class="btn_modify" title="수정" onclick="showModal('applyAuthor');"></button>
									<button type="button" class="box-delete" title="삭제"></button>
								</div>
							</div>
							<div class="row">
								<div class="w-2">
									<button type="button" class="list_btn list_up">▲</button>
								</div>
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
								<div class="w-15 show-pc">
									<button type="button" class="btn_modify" title="수정" onclick="showModal('applyAuthor');"></button>
									<button type="button" class="box-delete" title="삭제"></button>
								</div>
							</div>
							<!-- <div class="row show-pc">
								<div class="w-15">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">	
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<input type="text">
								</div>
								<div class="w-4">
									<p class="checkbox solo">
										<input type="checkbox" name="agree2" id="agree2">
										<label for="agree2"></label>
									</p>
								</div>
								<div class="w-15 show-pc"><button type="button" class="btn-save">저장</button></div>
							</div> -->
						</div>
					</div>
				</div>
				<div class="label">
					<p class="f-semibold">&nbsp;</p>
					<div class="group-btn show-pc align_center">
						<!-- <button type="button" class="btn-rg ico-after add">직접 입력</button> -->
						<!-- <button type="button" onclick="showModal('member');" class="btn-rg outline-gray ico-after sch long">회원/비회원 확인(필수)</button> -->
						<button type="button" class="box_add" title="추가" onclick="alert('정보를 입력하시고 회원 검색을 반드시 해 주시기 바랍니다'); showModal('applyAuthor');"></button>
					</div>
					<div class="group-btn show-mo">
						<button type="button" onclick="showModal('addAuthor');" class="btn-md">공동저자 추가<span class="ico-after"><img src="/pub/images/ico/ico_plus_round.svg" alt=""></span></button>
					</div>
				</div>
			</div>
			<div class="row input">
				<div class="label">제목</div>
				<div class="cont">
					<input type="text" placeholder="제목을 입력하세요">
				</div>
			</div>
			<div class="row input">
				<div class="label">키워드</div>
				<div class="cont">
					<input type="text" placeholder="키워드를 입력하세요" value="hong, samsung, Fund Grants">
				</div>
			</div>
			<div class="row input">
				<div class="label">우수논문발표 응모</div>
				<div class="cont">
					<p class="radio">
						<input type="radio" name="radio4" id="radio4_1">
						<label for="radio4_1" onclick="addModal('popBestExcellent');">응모</label>
					</p>
					<p class="radio">
						<input type="radio" name="radio4" id="radio4_2">
						<label for="radio4_2">응모하지 않음</label>
					</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">발표자료 준비 관련 안내</div>
				<div class="cont">
					<p class="checkbox">
						<input type="checkbox" name="agree3" id="agree3">
						<label for="agree3">발표자료 준비 관련 안내문을 모두 읽고 확인하였습니다.</label>
					</p>
					<a href="#;" class="c-tertiary size-rg f-semibold t-under ml-2" onclick="addModal('popBestExcellent');">안내문 보기</a>
				</div>
			</div>
			<div class="row input">
				<div class="label">초록 내용</div>
				<div class="cont">
					<textarea name="" id="" placeholder="제출 내용을 입력해 주세요." rows="6">에디터로 추가</textarea>
					<p class="size-rg c-tertiary mt-2">영문 : 1,000자 (국문 500자) 제한, 공백 포함</p>
				</div>
			</div>
			<div class="row input">
				<div class="label">초록 비밀번호</div>
				<div class="cont">
					<input type="password" placeholder="비밀번호를 입력하세요">
				</div>
			</div>
		</div>
		<div class="group-btn j-end m-full mt-4">
			<button type="button" class="btn-rg ico-after add">초록 작성 추가</button>
			<button type="button" class="btn-rg outline-gray ico-after sub" onclick="addModal('popDel');">초록 작성 삭제</button>
		</div>
	</div>
	<div class="section write-wrap m-no-border">
		<div class="title">
			<p class="stitle1"><span class="num">4</span>결제 수단 선택</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label">결제 수단 선택</div>
				<div class="cont">
					<div class="pay-option">
						<p class="card">
							<input type="radio" name="pay" id="card">
							<label for="card">신용카드</label>
						</p>
						<p class="accout">
							<input type="radio" name="pay" id="accout">
							<label for="accout">온라인 입금</label>
						</p>
					</div>
					<p class="t-warn size-rg mt-2">카드전표는 등록하신 이메일로 자동발송됩니다.</p>
				</div>
			</div>
			<div class="row input show-account">
				<div class="label">입금 계좌 선택</div>
				<div class="cont">
					<div class="select-wrap mb-3">
						<button type="button" class="select unselected">입금하실 계좌를 선택해 주세요.</button>
						<ul>
							<li><button type="button" class="option">우리은행 : 123-05-015858 (예금주 : 한국고분자학회)</button></li>
							<li><button type="button" class="option">국민은행 : 814-01-0040-193 (예금주 : 한국고분자학회)</button></li>
						</ul>
					</div>
					<p class="t-warn size-rg">본인통장이 아닐 경우 반드시 '보내는 사람'을 송금인란에 적어주세요.</p>
					<p class="t-warn size-rg mt-1">온라인 입금의 경우 입금확인 후 승인처리까지 하루에서 이틀정도의 시간이 소요됩니다.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="section write-wrap m-no-border">
		<div class="title">
			<p class="stitle1">결제금액</p>
		</div>
		<div class="write">
			<div class="row input">
				<div class="label f-normal">결제 항목</div>
				<div class="cont c-primary f-bold">사전등록</div>
			</div>
			<div class="row input">
				<div class="label body1">결제 금액</div>
				<div class="cont c-primary f-bold"><p class="price">50,000원</p></div>
			</div>
		</div>
	</div>
	<div class="group-btn center">
		<a href="abstract_22.php" class="btn-md w-24 m-full" onclick="alert('${발표제목} 초록의 연구책임자가 지정되지 않았습니다. 연구책임자를 지정해 주시기 바랍니다.');">다음페이지</a>
	</div>
</div>
<!-- s: 공동저자 리스트 modal -->
<div class="modal-wrap full pc_show_modal" data-modal-name="addAuthor">
	<div class="modal-inner">
		<div class="modal-header">
			<p class="stitle3">공동저자</p>
		</div>
		<div class="modal-body">
			<div class="table-box m-pad">
				<div class="body">
					<div class="row">
						<div><span class="label">이름</span>김길동</div>
						<div><span class="label">소속</span>소속명</div>
						<div><span class="label">연락처</span>010-1234-5678</div>
						<div><span class="label">핸드폰</span>010-1234-5678</div>
						<div><span class="label">이메일</span>mail@email.com</div>
						<div><span class="label">국적</span>대한민국</div>
						<div class="btns">
							<button type="button" onclick="addModal('applyAuthor');" class="btn-xs outline-gray">수정</button>
							<button type="button" class="btn-xs outline-gray">삭제</button>
						</div>
					</div>
					<div class="row">
						<div><span class="label">이름</span>김길동</div>
						<div><span class="label">소속</span>소속명</div>
						<div><span class="label">연락처</span>010-1234-5678</div>
						<div><span class="label">핸드폰</span>010-1234-5678</div>
						<div><span class="label">이메일</span>mail@email.com</div>
						<div><span class="label">국적</span>대한민국</div>
						<div class="btns">
							<button type="button" onclick="addModal('applyAuthor');" class="btn-xs outline-gray">수정</button>
							<button type="button" class="btn-xs outline-gray">삭제</button>
						</div>
					</div>
					<div class="row">
						<div><span class="label">이름</span>김길동</div>
						<div><span class="label">소속</span>소속명</div>
						<div><span class="label">연락처</span>010-1234-5678</div>
						<div><span class="label">핸드폰</span>010-1234-5678</div>
						<div><span class="label">이메일</span>mail@email.com</div>
						<div><span class="label">국적</span>대한민국</div>
						<div class="btns">
							<button type="button" onclick="addModal('applyAuthor');" class="btn-xs outline-gray">수정</button>
							<button type="button" class="btn-xs outline-gray">삭제</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" onclick="addModal('applyAuthor');" class="btn-md ico-after add">직접 입력</button>
			<!-- <button type="button" onclick="addModal('member');" class="btn-md outline-gray ico-after sch">회원 검색</button> -->
		</div>
		<button type="button" class="close" onclick="closeModal();" title="팝업 닫기"></button>
	</div>
</div>
<!-- e: 공동저자 리스트 modal -->
<!-- s: 공동저자 등록 modal -->
<div class="modal-wrap full pc_show_modal" data-modal-name="applyAuthor">
	<div class="modal-inner">
		<div class="modal-header">
			<p class="stitle3">공동저자</p>
		</div>
		<div class="modal-body">
			<div class="write-wrap m-no-border">
				<div class="write">
					<!-- <div class="row input">
						<div class="label">발표자 구분</div>
						<div class="cont">
							<div class="select-wrap">
								<button type="button" class="select unselected">선택해 주세요.</button>
								<ul>
									<li><button type="button" class="option">발표자</button></li>
									<li><button type="button" class="option">발표자</button></li>
									<li><button type="button" class="option">발표자</button></li>
								</ul>
							</div>
						</div>
					</div> -->
					<div class="row input">
						<div class="label">이름</div>
						<div class="cont"><input type="text" name="" id="" placeholder="이름을 입력해 주세요."></div>
					</div>
					<div class="row input">
						<div class="label">소속</div>
						<div class="cont"><input type="text" name="" id="" placeholder="소속을 입력해 주세요."></div>
					</div>
					<div class="row input">
						<div class="label">연락처</div>
						<div class="cont"><input type="tel" name="" id="" placeholder="연락처를 입력해 주세요."></div>
					</div>
					<div class="row input">
						<div class="label">핸드폰</div>
						<div class="cont"><input type="tel" name="" id="" placeholder="핸드폰 번호를 입력해 주세요."></div>
					</div>
					<div class="row input">
						<div class="label">이메일</div>
						<div class="cont"><input type="email" name="" id="" placeholder="이메일을 입력해 주세요."></div>
					</div>
					<div class="row input">
						<div class="label">국적</div>
						<div class="cont">
							<div class="select-wrap">
								<button type="button" class="select unselected">선택해 주세요.</button>
								<ul>
									<li><button type="button" class="option">국적</button></li>
									<li><button type="button" class="option">국적</button></li>
									<li><button type="button" class="option">국적</button></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer flex_row">
			<button type="button" onclick="backModal(this);" class="btn-md outline-gray">취소</button>
			<button type="button" onclick="backModal(this); showModal('member');" class="btn-md">회원/비회원 확인(필수)</button>
		</div>
		<button type="button" class="close" onclick="backModal(this);" title="팝업 닫기"></button>
	</div>
</div>
<!-- e: 공동저자 등록 modal -->
<!-- s: 이력 리스트 modal -->
<div class="modal-wrap full pc_show_modal" data-modal-name="addHistory">
	<div class="modal-inner">
		<div class="modal-header">
			<p class="stitle3">이력</p>
		</div>
		<div class="modal-body">
			<div class="table-box m-pad">
				<div class="body">
					<div class="row">
						<div><span class="label">시작연도</span>2023년</div>
						<div><span class="label">종료연도</span>2024년</div>
						<div><span class="label">경력 내용</span>
							<p class="text-ell">경력내용이 들어가는 자리입니다. 경력내용이 들어가는 자리입니다. 경력내용이 들어가는 자리입니다.</p>
						</div>
						<div class="btns">
							<button type="button" onclick="addModal('applyHistory');" class="btn-xs outline-gray">수정</button>
							<button type="button" class="btn-xs outline-gray">삭제</button>
						</div>
					</div>
					<div class="row">
						<div><span class="label">시작연도</span>2023년</div>
						<div><span class="label">종료연도</span>2024년</div>
						<div class="text-ell"><span class="label">경력 내용</span>
							<p class="text-ell">경력내용이 들어가는 자리입니다. 경력내용이 들어가는 자리입니다. 경력내용이 들어가는 자리입니다.</p>
						</div>
						<div class="btns">
							<button type="button" onclick="addModal('applyHistory');" class="btn-xs outline-gray">수정</button>
							<button type="button" class="btn-xs outline-gray">삭제</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" onclick="addModal('applyHistory');" class="btn-md">등록</button>
		</div>
		<button type="button" class="close" onclick="closeModal();" title="팝업 닫기"></button>
	</div>
</div>
<!-- e: 이력 리스트 modal -->
<!-- s: 이력 등록 modal -->
<div class="modal-wrap full pc_show_modal" data-modal-name="applyHistory">
	<div class="modal-inner">
		<div class="modal-header">
			<p class="stitle3">이력 입력</p>
		</div>
		<div class="modal-body">
			<p class="t-ps size-rg">*최대 6개까지 입력 가능</p>
			<div class="write-wrap m-no-border">
				<div class="write">
					<div class="row input">
						<div class="label">시작 연도/종료 연도</div>
						<div class="cont mo-flex">
							<input type="text" name="" id="" placeholder="시작 연도">
							<input type="text" name="" id="" placeholder="종료 연도">
						</div>
					</div>
					<div class="row input">
						<div class="label">이력 입력</div>
						<div class="cont"><textarea rows="4" placeholder="이력을 입력해주세요"></textarea></div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" onclick="backModal(this);" class="btn-md outline-gray">취소</button>
			<button type="button" onclick="backModal(this);" class="btn-md">등록</button>
		</div>
		<button type="button" class="close" onclick="backModal(this);" title="팝업 닫기"></button>
	</div>
</div>
<!-- e: 이력 등록 modal -->
<!-- s: 회원검색 modal -->
<div class="modal-wrap full pc_show_modal" data-modal-name="member">
	<div class="modal-inner form">
		<div class="modal-header">
			<p class="stitle2">회원검색</p>
		</div>
		<div class="modal-body wide">
			<div class="name-sch">
				<p class="f-semibold">이름</p>
				<div class="search-wrap">
					<input type="text" placeholder="이름을 입력해주세요." value="김길동" readonly>
					<button type="button" title="검색" readonly></button>
				</div>
			</div>
			<p class="t-warn size-rg mb-2">연구책임자는 반드시 학회 회원이어야 합니다.
			<p class="t-warn size-rg mb-2">주의: 여기서 회원이란 종신회원 또는 ${작년연도} ~${올해연도}년도 회비 납부실적이 있는 분에 한합니다. 기존 정회원이라도 ${재작년}년도 이후에 회비를 납부하지 않으셨다면 비회원으로 표시됩니다.</p>
			<p class="t-warn size-rg mb-2">공동연구자 중 비회원이 있는 경우에는 초록 등록을 마친 후, 회원 가입을 권장합니다.</p>
			<table cellspacing="0" cellpadding="0" class="type1">
				<colgroup>
					<col width="15%">
					<col width="15%">
					<col width="25%">
					<col width="30%">
					<col width="*">
				</colgroup>
				<thead>
					<tr>
						<th>회원구분</th>						
						<th>이름</th>
						<th>소속</th>
						<th>이메일</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>정회원</td>
						<td>김길동</td>
						<td>소속명</td>
						<td>mail1**@email.com</td>
						<td><button type="button" class="add-btn-text" title="추가" onclick="alert('회원으로 등록되었습니다.'); backModal(this);">회원 등록</button></td>
					</tr>
					<tr>
						<td>특별회원</td>
						<td>김길동</td>
						<td>소속명</td>
						<td>mail1**@email.com</td>
						<td><button type="button" class="add-btn-text" title="추가" onclick="alert('회원으로 등록되었습니다.'); backModal(this);">회원 등록</button></td>
					</tr>
					<tr>
						<td>특별회원</td>
						<td>김길동</td>
						<td>소속명</td>
						<td>mail1**@email.com</td>
						<td><button type="button" class="add-btn-text" title="추가" onclick="alert('회원으로 등록되었습니다.'); backModal(this);">회원 등록</button></td>
					</tr>
					<tr>
						<td colspan="5" class="no_item">검색된 회원이 없습니다. 비회원으로 등록해주세요.</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer flex_row">
			<button type="button" onclick="backModal(this); showModal('applyAuthor');" class="btn-md outline-gray">뒤로가기</button>
			<button type="button" onclick="alert('비회원으로 등록되었습니다.'); backModal(this);" class="btn-md">비회원으로 등록</button>
		</div>
		<button type="button" class="close" onclick="backModal(this); addModal('applyAuthor');" title="팝업 닫기"></button>
	</div>
</div>
<!-- e: 회원검색 modal -->
<!-- s: 초록 작성 삭제 modal -->
<div class="modal-wrap popDel" data-modal-name="popDel">
	<div class="modal-inner form">
		<div class="modal-header">
			<p class="stitle2">초록을 삭제하시겠습니까?</p>
		</div>
		<div class="modal-body wide">
			<div class="btns">
				<button type="button" class="btn">예</button>
				<button type="button" class="btn btn_l" onclick="closeModal();">아니오</button>
			</div>
		</div>
		<button type="button" class="close" onclick="closeModal();" title="팝업 닫기"></button>
	</div>
</div>
<!-- e: 초록 작성 삭제 modal -->
<!-- s: 우수논문발표 응모 modal -->
<div class="modal-wrap popBestExcellent" data-modal-name="popBestExcellent">
	<div class="modal-inner form">
		<div class="modal-header">
			<p class="stitle2">:: 발표자료 준비 관련 안내문 :: <br>(Guidelines for Preparing Presentation)</p>
		</div>
		<div class="modal-body wide">
			<p>발표자료 구성 시, 저작물(예: 출판된 논문 내 데이터 및 사진, 영상 등)이 포함된 경우, 저작물의 사용권한 획득책임은 발표자에게 있습니다. 또한 미공개된 자료(예: 미공개된 데이터 및 사진, 영상 등)가 포함된 경우, 저작물 출판 시 해당 미공개 자료의 출판가능 여부에 대한 출판사의 정책이 각기 다르므로, 발표자료 구성에 유의하시기 바랍니다.</p>
			<br>
			<p>The Polymer Society of Korea suggests that presenters would obtain any necessary permissions to use prior publication materials, including figures, tables, charts, and so on, for composing their presentation. Note that the Polymer Society of Korea does not grant permission for the presentation materials which have been already published. Also, in case the data, figures, and movies in the presentation are considered for potential publication elsewhere in any form, please, check out submission instructions and policy of prospective target journals before the presentation in the meeting.</p>
		</div>
		<button type="button" class="close" onclick="closeModal();" title="팝업 닫기"></button>
	</div>
</div>
<!-- e: 우수논문발표 응모 modal -->

<script>
$(document).ready(function () {
	// 결제 수단 선택
	$("input[name='pay']").change(function () {
		if ($("#accout").is(":checked")) {
			$(".show-account").show();
		} else {
			$(".show-account").hide(); 
		}
	});
	$(".show-account").hide(); 

	const maxRows = 6; // 최대 추가 가능 개수

    $(".body").on("click", ".box_add", function () {
        let $body = $(this).closest(".body"); // 클릭된 버튼이 속한 .body 영역
        let rowCount = $body.find(".row").length;

        if (rowCount < maxRows) {
            let newRow = `
                <div class="row">
                    <div class="w-5">
                        <span class="label">이름</span>
                        <input type="text" value="" placeholder="YYYY">
                    </div>
                    <div class="w-4">
                        <span class="label">소속</span>
                        <input type="text" value="" placeholder="YYYY">
                    </div>
                    <div class="w-4">
                        <span class="label">연락처</span>
                        <input type="text" value="" placeholder="OO대학교 XX학과 (학사)">
                    </div>
                    <div class="w-1 show-pc">
                        <button type="button" class="box-delete" title="삭제"></button>
                    </div>
                </div>
            `;
            $body.append(newRow);
        } else {
            alert("최대 6개까지 추가할 수 있습니다.");
        }
    });

    // 동적으로 추가된 요소에서도 삭제 기능이 작동하도록 이벤트 위임 사용
    $(".body").on("click", ".box-delete", function () {
        $(this).closest(".row").remove();
    });
});
</script>
<?php include_once ('../_tail.php'); ?>