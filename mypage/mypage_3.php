<?php include_once('../_head.php'); ?>
<?php $gNum="6"; $sNum="3"; $gName="마이페이지"; $sName="회비결제"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
  <div class="tabs-type1">
    <button type="button" class="current">회비결제</button>
    <div class="list">
      <button type="button" onclick="location.href='mypage_1.php'">회원정보수정</button>
      <button type="button" onclick="location.href='mypage_2.php'">회비납부내역</button>
      <button type="button" class="active">회비결제</button>
      <button type="button" onclick="location.href='mypage_4.php'">회원활동(임원)</button>
      <button type="button" onclick="location.href='mypage_5.php'">확인서/영수증</button>
    </div>
  </div>
  <div class="section pay-container">
    <div class="left">
      <div class="section">
        <p class="stitle2 ico-bell">결제 안내</p>
        <div class="bg-light sm mt-3">
          <ul class="bullet-gray size-rg">
            <li>이미 납부가 완료된 항목은 보여지지 않습니다.</li>
            <li>정회원이 학생연회비(30,000)가 보이는 경우 학회로 연락 바랍니다. (Tel : 02-568-3860)</li>
          </ul>
        </div>
      </div>
      <div class="section write-wrap">
        <div class="title">
          <p class="stitle1"><span class="num">1</span>결제 항목 선택</p>
        </div>
        <div class="write">
          <div class="row">
            <div class="cont only-cont j-between">
              <p class="radio">
                <input type="radio" name="price" id="price1" checked>
                <label for="price1">연회비 (정회원/학생회원)</label>
              </p>
              <p class="price">50,000원</p>
            </div>
          </div>
          <div class="row">
            <div class="cont only-cont j-between">
              <p class="radio">
                <input type="radio" name="price" id="price2">
                <label for="price2">종신회비</label>
              </p>
              <p class="price">500,000원</p>
            </div>
          </div>
          <div class="row">
            <div class="cont only-cont j-between">
              <p class="radio">
                <input type="radio" name="price" id="price3">
                <label for="price3">구독회비</label>
              </p>
              <p class="price">500,000원</p>
            </div>
          </div>
          <div class="row">
            <div class="cont only-cont j-between">
              <p class="radio">
                <input type="radio" name="price" id="price4">
                <label for="price4">현장등록비</label>
              </p>
              <p class="price">500,000원</p>
            </div>
          </div>
        </div>
      </div>
      <div class="section write-wrap">
        <div class="title">
          <p class="stitle1"><span class="num">2</span>결제 정보</p>
        </div>
        <div class="write">
          <div class="row input">
            <div class="label required">이름</div>
            <div class="cont">
              <input type="text" placeholder="이름을 입력해 주세요." value="홍길동">
            </div>
          </div>
          <div class="row input">
            <div class="label required">소속</div>
            <div class="cont">
              <input type="text" placeholder="소속을 입력해 주세요." value="한국고분자학회">
            </div>
          </div>
          <div class="row input">
            <div class="label required">이메일</div>
            <div class="cont">
              <input type="text" value="hong@naver.com">
            </div>
          </div>
          <div class="row input">
            <div class="label">연락처</div>
            <div class="cont">
              <input type="text" placeholder="연락처를 입력해 주세요" value="02-1234-5678">
            </div>
          </div>
          <div class="row input">
            <div class="label required">휴대전화</div>
            <div class="cont">
              <input type="text" placeholder="휴대전화를 입력해 주세요" value="010-4567-8978">
            </div>
          </div>
          <div class="row input">
            <div class="label">남기실 말씀</div>
            <div class="cont">
              <textarea name="" id="" rows="4" placeholder="남기실 말씀을 작성해 주세요"></textarea>
            </div>
          </div>
        </div>
        <p class="t-warn mt-3">학술대회 사전등록비 납부자께는 학술대회 명찰 발급을 위한 문자를 발송할 예정이니 연락처를 명확히 기입해 주시기 바랍니다.</p>
        <p class="t-warn">문자를 수신하지 못하신 경우 명찰 발급 시 대기가 길어질 수 있습니다.</p>
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
        <div class="write" id="bankAccountSection" style="display: none;">
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
          <dd class="f-bold c-primary">연회비</dd>
        </dl>
        <dl>
          <dt class="body1 f-bold">결제 금액</dt>
          <dd class="price c-primary"><b>50,000</b>원</dd>
        </dl>
      </div>
      <button type="button" onclick="location.href='mypage_3_done.php'" class="btn-rg">결제하기</button>
    </div>
  </div>
</div>
<script>
  // tabs
  $(document).ready(function() {
    $('.tabs-type1 .current').click(function() {
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

  document.addEventListener("DOMContentLoaded", function() {
    const cardRadio = document.getElementById("card");
    const accoutRadio = document.getElementById("accout");
    const bankAccountSection = document.getElementById("bankAccountSection");

    function toggleBankSection() {
      if (accoutRadio.checked) {
        bankAccountSection.style.display = "block";
      } else {
        bankAccountSection.style.display = "none";
      }
    }

    cardRadio.addEventListener("change", toggleBankSection);
    accoutRadio.addEventListener("change", toggleBankSection);

    // 페이지 로드 시 체크된 값 확인
    toggleBankSection();
  });
</script>
<?php include_once('../_tail.php'); ?>