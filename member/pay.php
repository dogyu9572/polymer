<?php include_once ('../_head.php'); ?>
<?php $gNum="7"; $sNum="5"; $gName="회원"; $sName="게재료 결제"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents">
  <div class="inner">
    <div class="tabs-type1">
			<button type="button" class="current">게재료 결제</button>
			<div class="list">
				<button type="button" onclick="location.href='join_1.php'">회원가입</button>
				<button type="button" onclick="location.href='login.php'">로그인</button>
				<button type="button" onclick="location.href='find_id.php'">아이디찾기</button>
				<button type="button" onclick="location.href='find_pwd.php'">비밀번호찾기</button>
				<button type="button" class="active">게재료 결제</button>
			</div>
    </div>
  </div>
<!-- <p class="bg-light primary">회원이실 경우 <span class="f-semibold">반드시 로그인한 후 등록해 주세요.</span></p> -->
  <!-- <div class="member-wrap">
    <div class="content">
      <p class="heading2 line">회원 로그인</p>
      <div class="form">
        <div class="row">
          <input type="text" placeholder="아이디">
        </div>
        <div class="row">
          <input type="password" placeholder="비밀번호">
        </div>
      </div>
      <div class="group-btn">
        <a href="#;" class="btn-md">로그인</a>
      </div>
      <div class="login-btm">
        <p class="checkbox">
          <input type="checkbox" name="" id="auto_save">
          <label for="auto_save">아이디 저장</label>
        </p>
        <div class="find">
          <a href="#;" class="t-divide">아이디 찾기</a>
          <a href="#;">비밀번호 찾기</a>
        </div>
      </div>
    </div>
  </div> -->
  <div class="inner">
    <div class="section sm t-center">
      <p class="heading2">결제 안내</p>
      <p class="mt-3">청구서 금액을 확인하신 후 해당되는 금액을 결제해 주시기 바랍니다.</p>
    </div>
    <div class="section pay-container">
      <div class="left">
        <div class="section write-wrap">
          <div class="title">
            <p class="stitle1"><span class="num">1</span>결제 항목 선택</p>
          </div>
          <div class="write">
            <div class="row">
              <div class="cont only-cont j-between">
                <p class="radio">
                  <input type="radio" name="price" id="price1" checked>
                  <label for="price1">폴리머지논문 게재료</label>
                </p>
                <p class="price">100,000원</p>
              </div>
            </div>
            <div class="row">
              <div class="cont only-cont j-between">
                <p class="radio">
                  <input type="radio" name="price" id="price2">
                  <label for="price2">폴리머지논문 게재료</label>
                </p>
                <p class="price">150,000원</p>
              </div>
            </div>
            <div class="row">
              <div class="cont only-cont j-between">
                <p class="radio">
                  <input type="radio" name="price" id="price3">
                  <label for="price3">폴리머지논문 게재료</label>
                </p>
                <p class="price">200,000원</p>
              </div>
            </div>
            <div class="row">
              <div class="cont only-cont j-between">
                <p class="radio">
                  <input type="radio" name="price" id="price4">
                  <label for="price4">산학연 연구실 소개 게재료</label>
                </p>
                <p class="price">200,000원</p>
              </div>
            </div>
          </div>
        </div>
        <div class="section write-wrap">
          <div class="title">
            <p class="stitle1"><span class="num">2</span>결제정보</p>
          </div>
          <div class="write">
            <div class="row input">
              <div class="label required">이름</div>
              <div class="cont">
                <input type="text" placeholder="이름을 입력해 주세요." value="">
              </div>
            </div>
            <div class="row input">
              <div class="label required">소속</div>
              <div class="cont">
                <input type="text" placeholder="소속을 입력해 주세요." value="">
              </div>
            </div>
            <div class="row input">
              <div class="label required">이메일</div>
              <div class="cont">
                <input type="email" placeholder="이메일을 입력해 주세요." value="">
              </div>
            </div>
            <div class="row input">
              <div class="label">연락처</div>
              <div class="cont">
                <input type="text" placeholder="연락처를 입력해 주세요" value="">
              </div>
            </div>
            <div class="row input">
              <div class="label required">휴대전화</div>
              <div class="cont">
                <input type="text" placeholder="휴대전화를 입력해 주세요" value="">
              </div>
            </div>
            <div class="row input">
              <div class="label">남기실 말씀</div>
              <div class="cont">
                <textarea name="" id="" rows="4" placeholder="남기실 말씀을 작성해 주세요"></textarea>
              </div>
            </div>
          </div>
          <!-- <p class="t-warn mt-3">학술대회 사전등록비 납부자께는 학술대회 명찰용 문자를 발송할 예정이니 연락처를 명확히 기입해 주시기 바랍니다.</p>
          <p class="t-warn">문자를 수신하지 못하신 경우 명찰 발급 시 대기가 길어질 수 있습니다.</p> -->
        </div>
        <div class="section write-wrap">
          <div class="title">
            <p class="stitle1"><span class="num">3</span>결제 수단 선택</p>
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
          </div>
          <div class="write show-account">
            <div class="row input">
              <div class="label">입금 계좌 선택</div>
              <div class="cont">
                <div class="select-wrap">
                  <button type="button" class="select unselected">입금하실 계좌를 선택해 주세요.</button>
                  <ul>
                    <li><button type="button" class="option">우리은행 : 123-05-015858 (예금주 : 한국고분자학회)</button></li>
                    <li><button type="button" class="option">국민은행 : 814-01-0040-193 (예금주 : 한국고분자학회)</button></li>
                  </ul>
                </div>
                <p class="t-warn size-rg mt-2">본인통장이 아닐 경우 반드시 '<b>보내는 사람</b>'을 송금인란에 적어주세요.</p>
                <p class="t-warn size-rg">온라인 입금의 경우 입금확인 후 승인처리까지 <b>하루에서 이틀정도</b>의 시간이 소요됩니다.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sticky">
        <div class="info">
          <dl>
            <dt>결제 항목</dt>
            <dd class="f-bold c-primary">폴리머지논문 게재료</dd>
          </dl>
          <dl>
            <dt class="body1 f-bold">결제 금액</dt>
            <dd class="price c-primary"><b>100,000</b>원</dd>
          </dl>
        </div>
        <button type="button" onclick="location.href='pay_done.php'" class="btn-rg">결제하기</button>
      </div>
    </div>
  </div>
</div>
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

		// 결제 수단 선택
		$("input[name='pay']").change(function () {
			if ($("#accout").is(":checked")) {
				$(".show-account").show();
			} else {
				$(".show-account").hide(); 
			}
		});
		$(".show-account").hide(); 
	});
</script>
<?php include_once ('../_tail.php'); ?>