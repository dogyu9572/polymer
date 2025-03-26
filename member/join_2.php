<?php include_once ('../_head.php'); ?>
<?php $gNum="7"; $sNum="1"; $gName="회원"; $sName="회원가입"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
  <div class="tabs-type1">
		<button type="button" class="current">회원가입</button>
		<div class="list">
			<button type="button" class="active">회원가입</button>
			<button type="button" onclick="location.href='login.php'">로그인</button>
			<button type="button" onclick="location.href='find_id.php'">아이디찾기</button>
			<button type="button" onclick="location.href='find_pwd.php'">비밀번호찾기</button>
			<button type="button" onclick="location.href='pay.php'">게재료 결제</button>
		</div>
  </div>
  <div class="write-wrap m-no-border section">
		<div class="title">
      <p class="tit-bullet">기본 정보</p>
    </div>
    <div class="write">
      <div class="row input">
        <div class="label">회원구분</div>
        <div class="cont">
          <p class="radio">
            <input type="radio" name="member" id="member1">
            <label for="member1">일반</label>
          </p>
          <p class="radio">
            <input type="radio" name="member" id="member2">
            <label for="member2">학생 (* 박사과정까지)</label>
          </p>
          <p class="radio">
            <input type="radio" name="member" id="member3">
            <label for="member3">단체</label>
          </p>
          <p class="radio">
            <input type="radio" name="member" id="member4">
            <label for="member4">특별 회원사</label>
          </p>
				</div>
      </div>
      <div class="half">
      	<div class="row input">
      	  <div class="label required">이름</div>
      	  <div class="cont">
      	    <input type="text" placeholder="이름을 입력해 주세요.">
      	  </div>
      	</div>
      	<div class="row input">
      	  <div class="label">한자</div>
      	  <div class="cont">
      	    <input type="text" placeholder="한자 이름을 입력해 주세요.">
      	  </div>
      	</div>
      </div>
      <div class="row input">
        <div class="label">영문 이름(First)</div>
        <div class="cont">
          <input type="text" placeholder="first name">
        </div>
      </div>
      <div class="row input">
        <div class="label">영문 이름(last)</div>
        <div class="cont">
          <input type="text" placeholder="last name">
        </div>
      </div>
      <div class="row input">
        <div class="label required">생년월일</div>
        <div class="cont">
          <input type="text" placeholder="1999/12/24">
        </div>
      </div>
      <div class="row input">
        <div class="label required">성별 선택</div>
        <div class="cont">
          <p class="radio">
            <input type="radio" name="sex" id="male">
            <label for="male">남성</label>
          </p>
          <p class="radio">
            <input type="radio" name="sex" id="female">
            <label for="female">여성</label>
          </p>
        </div>
      </div>
      <div class="row input">
        <div class="label required">아이디</div>
        <div class="cont">
          <div class="input-btn">
            <input type="text" placeholder="ID를 입력해 주세요.">
            <button type="button" class="btn-rg outline hover">중복확인</button>
          </div>
				</div>
      </div>
      <div class="row input">
        <div class="label required">비밀번호</div>
        <div class="cont">
          <input type="password" placeholder="특수문자 1개 이상을 포함한 영문 대소문자, 숫자 조합 5자리 입력">
        </div>
      </div>
      <div class="row input">
        <div class="label required">비밀번호 확인</div>
        <div class="cont">
          <input type="password">
          <span class="t-ps c-error">※ 비밀번호가 일치하지 않습니다</span>
        </div>
      </div>
      <div class="row input">
        <div class="label">국가 선택</div>
        <div class="cont">
          <div class="select-wrap">
            <button type="button" class="select unselected">국가를 선택해 주세요</button>
            <ul>
              <li><button type="button" class="option">국가</button></li>
              <li><button type="button" class="option">국가</button></li>
              <li><button type="button" class="option">국가</button></li>
              <li><button type="button" class="option">국가</button></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row input">
        <div class="label required">연락처</div>
        <div class="cont">
          <input type="tel" placeholder="연락처를 입력해 주세요">
        </div>
      </div>
      <div class="row input">
        <div class="label required">휴대전화</div>
        <div class="cont">
          <div class="input-btn">
            <input type="text" placeholder="휴대전화를 입력해 주세요">
            <button type="button" class="btn-rg outline hover">중복확인</button>
          </div>
        </div>
      </div>
      <div class="row input">
        <div class="label required">이메일</div>
        <div class="cont">
          <div class="d-flex">
            <div class="input-btn">
              <input type="text" placeholder="이메일을 입력해 주세요">
              <button type="button" class="btn-rg outline hover">중복확인</button>
            </div>
            <p class="checkbox">
              <input type="checkbox" name="email" id="email">
              <label for="email">이메일 수신 여부에 동의합니다.</label>
            </p>
          </div>
        </div>
      </div>
			<div class="row input">
				<div class="label required">자택주소</div>
				<div class="cont">
          <div class="input-btn">
            <input type="text" placeholder="주소를 검색해 주세요">
            <button type="button" class="btn-rg outline hover">주소검색</button>
          </div>
          <input type="text" placeholder="상세주소 입력" readonly>
          <input type="text" placeholder="상세주소 입력">
				</div>
			</div>
    </div>
  </div>
  <div class="write-wrap m-no-border section">
		<div class="title">
      <p class="tit-bullet">직장 정보</p>
      <p class="t-ps">※ 직장주소에는 소속명, 부서/학과를 기재하지 마세요.</p>
    </div>
    <div class="write">
      <div class="row input">
        <div class="label required">소속기관명</div>
        <div class="cont">
          <input type="text" placeholder="소속기관명을 입력해 주세요">
        </div>
      </div>
      <div class="row input">
        <div class="label required">직종</div>
        <div class="cont">
          <div class="select-wrap">
            <button type="button" class="select unselected">직종을 선택해 주세요.</button>
            <ul>
              <li><button type="button" class="option">직종</button></li>
              <li><button type="button" class="option">직종</button></li>
              <li><button type="button" class="option">직종</button></li>
              <li><button type="button" class="option">직종</button></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row input">
        <div class="label required">소속부서</div>
        <div class="cont">
          <input type="text" placeholder="소속부서를 입력해 주세요">
        </div>
      </div>
      <div class="row input">
        <div class="label">직위</div>
        <div class="cont">
          <input type="text" placeholder="직위를 입력해 주세요">
        </div>
      </div>
      <div class="row input">
        <div class="label">직장 전화</div>
        <div class="cont">
          <input type="tel" placeholder="직장 전화번호를 입력해 주세요">
        </div>
      </div>
      <div class="row input">
        <div class="label">FAX</div>
        <div class="cont">
          <input type="tel" placeholder="FAX 번호를 입력해 주세요">
        </div>
      </div>
			<div class="row input">
				<div class="label required">직장 주소</div>
				<div class="cont">
          <div class="input-btn">
            <input type="text" placeholder="주소를 검색해 주세요">
            <button type="button" class="btn-rg outline hover">주소검색</button>
          </div>
          <input type="text" placeholder="상세주소 입력" readonly>
          <input type="text" placeholder="상세주소 입력">
				</div>
			</div>
      <div class="row input">
        <div class="label">우편물 우송처</div>
        <div class="cont">
          <p class="radio">
            <input type="radio" name="address" id="add1" checked>
            <label for="add1">직장 주소</label>
          </p>
          <p class="radio">
            <input type="radio" name="address" id="add2">
            <label for="add2">자택 주소</label>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- 기타 정보-->
  <div class="write-wrap m-no-border detail section">
		<div class="title">
      <p class="tit-bullet">기타 정보</p>
    </div>
    <div class="section">
      <div class="tit-flex">
        <p class="stitle3">- 전공</p>
      </div>
      <div class="write">
        <div class="check-btm">
        <p class="checkbox size-rg">
          <input type="checkbox" name="committee" id="committee_1">
          <label for="committee_1">분자전지부문위원회</label>
        </p>
        <p class="checkbox size-rg">
          <input type="checkbox" name="committee" id="committee_2">
          <label for="committee_2">의료용고분자 부문위원회</label>
        </p>
        <p class="checkbox size-rg">
          <input type="checkbox" name="committee" id="committee_3">
          <label for="committee_3">폴로이드 및 분자조립 부문위원회</label>
        </p>
        <p class="checkbox size-rg">
          <input type="checkbox" name="committee" id="committee_4">
          <label for="committee_4">에코소재 부문위원회</label>
        </p>
        <p class="checkbox size-rg">
          <input type="checkbox" name="committee" id="committee_5">
          <label for="committee_5">에너지 부문위원회</label>
        </p>
      </div>

      </div>
    </div>

    <div class="section">
      <div class="tit-flex">
        <p class="stitle3">- 전공</p>
      </div>
      <div class="write">
        <table cellspacing="0" cellpadding="0" class="type1">
          <colgroup>
            <col width="30%">
            <col width="50%">
            <col width="*">
          </colgroup>
          <thead>
            <tr>
              <th>전공코드</th>
              <th>전공 분야</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="f-semibold">111</td>
              <td>감광성 및 광특성 고분자</td>
              <td><button type="button" class="box-delete" title="삭제"></button></td>
            </tr>
            <tr>
              <td class="f-semibold">113</td>
              <td>의료용 고분자</td>
              <td><button type="button" class="box-delete" title="삭제"></button></td>
            </tr>
            <tr>
              <td class="f-semibold">117</td>
              <td>고분자 겔-전해질</td>
              <td><button type="button" class="box-delete" title="삭제"></button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <button type="button" onclick="showModal('study');" class="btn-rg">전공분야 및 코드 검색
        <span class="ico-after"><img src="/pub/images/ico/ico_search_white.svg" alt=""></span>
      </button>
    </div>
    <div class="section">
      <div class="tit-flex mo-flex">
        <p class="stitle3">- 학력</p>
				<button type="button" onclick="showModal('addEdu');" class="add-row" title="학력 추가"></button>
      </div>
			<div class="table-box m-pad">
				<div class="head">
					<div class="row">
						<div class="w-4">학위</div>
						<div class="w-6">학위년도</div>
						<div class="w-6">학교/대학원</div>
						<div class="w-4">학과</div>
						<div class="w-4">전공</div>
						<div class="w-1"></div>
					</div>
				</div>
				<div class="body">
					<div class="row show-pc">
						<div class="w-4">
							<div class="select-wrap">
								<button type="button" class="select unselected">학사</button>
								<ul>
									<li><button type="button" class="option">학사</button></li>
									<li><button type="button" class="option">석사</button></li>
									<li><button type="button" class="option">박사</button></li>
								</ul>
							</div>
						</div>
						<div class="w-6 year">
						<input type="text"><span class="txt">년</span>
						</div>
						<div class="w-6">
							<input type="text">
						</div>
						<div class="w-4">
							<input type="text">
						</div>
						<div class="w-4">
							<input type="text">
						</div>
						<div class="w-1 show-pc"><button type="button" class="box-delete" title="삭제"></button></div>
					</div>
				</div>
			</div>
			<p class="t-warn show-pc">학위를 수여받았거나 수료한 경우에만 입력 하십시오.</p>
			<p class="t-warn show-pc">석사과정 대학원생은 학사까지, 박사과정 대학원생은 석사까지만 입력합니다.</p>
    </div>
    <div class="section sm">
      <div class="tit-flex mo-flex">
        <p class="stitle3">- 경력</p>
				<button type="button" onclick="showModal('addHistory');" class="add-row" title="경력 추가"></button>
      </div>
			<div class="table-box m-pad">
				<div class="head">
					<div class="row">
						<div class="w-8">기간</div>
						<div class="w-5">소속기관명</div>
						<div class="w-7">경력 내용</div>
						<div class="w-1"></div>
					</div>
				</div>
				<div class="body">
					<div class="row">
						<div class="w-8 period">
							<input type="text" value="2023">
							<span class="txt">년 ~</span>
							<input type="text" value="2024"><span class="txt">년</span>
						</div>
						<div class="w-5">
							<input type="text" value="홈페이지코리아">
						</div>
						<div class="w-7">
							<input type="text" value="uiux 디자인">
						</div>
						<div class="w-1 show-pc"><button type="button" class="box-delete" title="삭제"></button></div>
					</div>
					<div class="row show-pc">
						<div class="w-8 period">
							<input type="text">
							<span class="txt">년 ~</span>
							<input type="text"><span class="txt">년</span>
						</div>
						<div class="w-5">
							<input type="text">
						</div>
						<div class="w-7">
							<input type="text">
						</div>
						<div class="w-1 show-pc"><button type="button" class="box-delete" title="삭제"></button></div>
					</div>
				</div>
			</div>
			<p class="t-warn show-pc">학력사항을 제외한 경력을 입력하십시오.</p>
			<p class="t-warn show-pc">박사후 과정(Post Doc.)은 경력에 입력합니다.</p>
    </div>
	</div>
	<div class="write-wrap m-no-border section sm">
		<div class="write b-top">
      <div class="row input">
        <div class="label required">자동등록방지</div>
        <div class="cont">
					<div class="captcha">
						<div class="img"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSHZK8EoFtyQjLWH03G1MXmwm0Rmn8jMmefg&amp;s" alt=""></div>
						<button type="button" title="새로고침"></button>
						<input type="text">
					</div>
        </div>
      </div>
			<div class="check-btm">
				<p class="checkbox size-rg">
					<input type="checkbox" name="agree" id="agree">
					<label for="agree"><span class="f-semibold c-primary">(필수)</span>개인정보처리방침에 동의합니다.</label>
				</p>
				<a href="#;" class="t-under size-rg">내용보기</a>
			</div>
		</div>
	</div>
	<div class="write-wrap m-no-border section">
		<div class="bg-light t-center">
			<p class="size-rg f-medium">
				본인은 위와 같이 귀학회에 가입하고자 합니다.<br>
				2024 년 9 월 23 일
			</p>
			<p class="stitle2 mt-5">사단법인 한국고분자학회 귀중</p>
		</div>
	</div>
  <div class="group-btn">
    <button type="button" class="btn-md outline-gray">돌아가기</button>
    <button type="button" class="btn-md" onclick="location.href='join_end.php'">회원가입 신청</button>
  </div>
</div>
<!-- s: 전공분야 및 코드 검색 modal -->
<div class="modal-wrap" data-modal-name="study">
<div class="modal-inner">
		<div class="modal-header">
			<p class="stitle3">전공분야 및 코드검색</p>
		</div>
		<div class="modal-body">
			<div class="table-box m-pad">
				<div class="body">
					<div class="row">
						<div><input type="checkbox"><span class=""></span></div>
						<div><span class="">전공</span></div>
						<div><span class="">전공코드</span></div>
						<div><span class="">전공분야</span></div>
					</div>
					<div class="row">
						<div><input type="checkbox"><span class=""></span></div>
						<div><span class="">고분자합성</span></div>
						<div><span class="">111</span></div>
						<div><span class="">감광성 및 광특성 고분자</span></div>
					</div>
					<div class="row">
						<div><input type="checkbox"><span class=""></span></div>
						<div><span class="">고분자합성</span></div>
						<div><span class="">113</span></div>
						<div><span class="">의료용 고분자</span></div>
					</div>
					<div class="row">
						<div><input type="checkbox"><span class=""></span></div>
						<div><span class="">고분자합성</span></div>
						<div><span class="">113</span></div>
						<div><span class="">의료용 고분자</span></div>
					</div>
					<div class="row">
						<div><input type="checkbox"><span class=""></span></div>
						<div><span class="">고분자합성</span></div>
						<div><span class="">113</span></div>
						<div><span class="">의료용 고분자</span></div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" onclick="addModal('applyEdu');" class="btn-md">등록</button>
		</div>
		<button type="button" class="close" onclick="closeModal();" title="팝업 닫기"></button>
	</div>
</div>

<!-- s: 학력 리스트 modal -->
<div class="modal-wrap full" data-modal-name="addEdu">
	<div class="modal-inner">
		<div class="modal-header">
			<p class="stitle3">학력</p>
		</div>
		<div class="modal-body">
			<div class="table-box m-pad">
				<div class="body">
					<div class="row">
						<div><span class="label">학위</span>박사</div>
						<div><span class="label">학위년도</span>2024년</div>
						<div><span class="label">학교/대학원</span>00대학교</div>
						<div><span class="label">학과</span>분자생물학과</div>
						<div><span class="label">전공</span>분자생물학 전공</div>
						<div class="btns">
							<button type="button" class="btn-xs outline-gray">수정</button>
							<button type="button" class="btn-xs outline-gray">삭제</button>
						</div>
					</div>
					<div class="row">
						<div><span class="label">학위</span>박사</div>
						<div><span class="label">학위년도</span>2024년</div>
						<div><span class="label">학교/대학원</span>00대학교</div>
						<div><span class="label">학과</span>분자생물학과</div>
						<div><span class="label">전공</span>분자생물학 전공</div>
						<div class="btns">
							<button type="button" class="btn-xs outline-gray">수정</button>
							<button type="button" class="btn-xs outline-gray">삭제</button>
						</div>
					</div>
					<div class="row">
						<div><span class="label">학위</span>박사</div>
						<div><span class="label">학위년도</span>2024년</div>
						<div><span class="label">학교/대학원</span>00대학교</div>
						<div><span class="label">학과</span>분자생물학과</div>
						<div><span class="label">전공</span>분자생물학 전공</div>
						<div class="btns">
							<button type="button" class="btn-xs outline-gray">수정</button>
							<button type="button" class="btn-xs outline-gray">삭제</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" onclick="addModal('applyEdu');" class="btn-md">등록</button>
		</div>
		<button type="button" class="close" onclick="closeModal();" title="팝업 닫기"></button>
	</div>
</div>
<!-- e: 학력 리스트 modal -->
<!-- s: 학력 등록 modal -->
<div class="modal-wrap full" data-modal-name="applyEdu">
	<div class="modal-inner">
		<div class="modal-header">
			<p class="stitle3">학력</p>
		</div>
		<div class="modal-body">
			<p class="t-warn">학위를 수여받았거나 수료한 경우에만 입력 하십시오.</p>
			<p class="t-warn">석사과정 대학원생은 학사까지, 박사과정 대학원생은 석사까지만 입력합니다.</p>
			<div class="write-wrap m-no-border">
				<div class="write">
					<div class="degree">
						<div class="row input">
							<div class="label">학위</div>
							<div class="cont">
								<div class="select-wrap">
									<button type="button" class="select unselected">학사</button>
									<ul>
										<li><button type="button" class="option">학사</button></li>
										<li><button type="button" class="option">석사</button></li>
										<li><button type="button" class="option">박사</button></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row input">
							<div class="label">학위년도</div>
							<div class="cont"><input type="text" name="" id=""></div>
						</div>
					</div>
					<div class="row input">
						<div class="label">학교/대학원</div>
						<div class="cont"><input type="text" name="" id=""></div>
					</div>
					<div class="row input">
						<div class="label">학과</div>
						<div class="cont"><input type="text" name="" id=""></div>
					</div>
					<div class="row input">
						<div class="label">전공</div>
						<div class="cont"><input type="text" name="" id=""></div>
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
<!-- e: 학력 등록 modal -->
<!-- s: 경력 리스트 modal -->
<div class="modal-wrap full" data-modal-name="addHistory">
	<div class="modal-inner">
		<div class="modal-header">
			<p class="stitle3">경력</p>
		</div>
		<div class="modal-body">
			<div class="table-box m-pad">
				<div class="body">
					<div class="row">
						<div><span class="label">기간</span>2023년 ~ 2024년</div>
						<div><span class="label">소속기관명</span>홈페이지코리아</div>
						<div><span class="label">경력 내용</span>uiux 디자인</div>
						<div class="btns">
							<button type="button" class="btn-xs outline-gray">수정</button>
							<button type="button" class="btn-xs outline-gray">삭제</button>
						</div>
					</div>
					<div class="row">
						<div><span class="label">기간</span>2023년 ~ 2024년</div>
						<div><span class="label">소속기관명</span>홈페이지코리아</div>
						<div><span class="label">경력 내용</span>uiux 디자인</div>
						<div class="btns">
							<button type="button" class="btn-xs outline-gray">수정</button>
							<button type="button" class="btn-xs outline-gray">삭제</button>
						</div>
					</div>
					<div class="row">
						<div><span class="label">기간</span>2023년 ~ 2024년</div>
						<div><span class="label">소속기관명</span>홈페이지코리아</div>
						<div><span class="label">경력 내용</span>uiux 디자인</div>
						<div class="btns">
							<button type="button" class="btn-xs outline-gray">수정</button>
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
<!-- e: 경력 리스트 modal -->
<!-- s: 경력 등록 modal -->
<div class="modal-wrap full" data-modal-name="applyHistory">
	<div class="modal-inner">
		<div class="modal-header">
			<p class="stitle3">경력</p>
		</div>
		<div class="modal-body">
			<p class="t-warn">학력사항을 제외한 경력을 입력하십시오.</p>
			<p class="t-warn">박사후 과정(Post Doc.)은 경력에 입력합니다.</p>
			<div class="write-wrap m-no-border">
				<div class="write">
					<div class="row input period">
						<div class="label">기간</div>
						<div class="cont">
							<input type="text" name="" id="">
							<span class="txt">년 ~</span>
							<input type="text" name="" id="">
							<span class="txt">년</span>
							</div>
					</div>
					<div class="row input">
						<div class="label">소속기관명</div>
						<div class="cont"><input type="text" name="" id=""></div>
					</div>
					<div class="row input">
						<div class="label">경력 내용</div>
						<div class="cont"><textarea name="" id="" rows="4"></textarea></div>
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
<!-- e: 경력 등록 modal -->
<script>
// tabs
$(document).ready(function () {
	$('.tabs-type1 .current').click(function () {
		const tabs = $(this).closest('.tabs-type1');
		const list = tabs.find('.list');
		if (!tabs.hasClass('on')) {
			tabs.addClass('on');
			list.slideDown(200);
		} else {
			tabs.removeClass('on');
			list.slideUp(200);
		}
	});
});
</script>
<?php include_once ('../_tail.php'); ?>
