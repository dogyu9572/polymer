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
  <div class="section">
    <p class="heading2">회원가입 안내</p>
    <div class="join-info">
      <p>입회원서에 관련사항을 기입한 후, <span class="f-semibold">해당 연회비를 납부해야 회원 자격이 부여됩니다.</span></p>
      <p>본 회의 <span class="f-semibold">회비를 연속 2년 이상 납부하지 않으면 회원자격이 정지</span>됩니다. 자격정지 발효 후 회비를 납부하면 회원으로서의 자격이 회복됩니다.</p>
    </div>
  </div>
  <div class="section">
    <p class="tit-bullet f-bold">회비납부 및 논문지 구독 안내</p>
    <table cellspacing="0" cellpadding="0" class="type1">
      <colgroup>
        <col width="26%">
        <col width="25%">
        <col width="*">
      </colgroup>
      <thead>
        <tr>
          <th>납부 방법</th>
          <th>구독료</th>
          <th>계좌번호</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="f-semibold">정회원</td>
          <td class="b-left f-medium t-secondary">50,000원/1년</td>
          <td class="b-left f-medium t-secondary">"고분자 과학과 기술"지(6회/년) e-book 무료 배포</td>
        </tr>
        <tr>
          <td class="f-semibold">종신회비</td>
          <td class="b-left f-medium t-secondary">500,000원/1회</td>
          <td class="b-left f-medium t-secondary">"고분자 과학과 기술"지(6회/년) e-book 무료 배포</td>
        </tr>
        <tr>
          <td class="f-semibold">학생회원(학부생, 대학원생)</td>
          <td class="b-left f-medium t-secondary">30,000원/1년</td>
          <td class="b-left f-medium t-secondary">"고분자 과학과 기술"지(6회/년) e-book 무료 배포</td>
        </tr>
        <tr>
          <td class="f-semibold">정(종신)회원 구독료</td>
          <td class="b-left f-medium t-secondary">40,000원/1년</td>
          <td class="b-left f-medium t-secondary">폴리머(6회/년), Macromolecular Research(12회/년)
            구독료 납부회원 배포</td>
        </tr>
        <tr>
          <td class="f-semibold">학생회원 구독료</td>
          <td class="b-left f-medium t-secondary">10,000원/1년</td>
          <td class="b-left f-medium t-secondary">폴리머(6회/년), Macromolecular Research(12회/년)
            구독료 납부회원 배포</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="section sm">
    <p class="tit-bullet f-bold">회비납부방법</p>
    <table cellspacing="0" cellpadding="0" class="type1">
      <colgroup>
        <col width="30%">
        <col width="*">
      </colgroup>
      <thead>
        <tr>
          <th>납부 방법</th>
          <th>결제 정보</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="f-semibold">온라인 카드 결제</td>
          <td class="b-left">회원가입후 <span class="f-semibold">'마이 페이지 - 회비결제' </span>메뉴에서 온라인 카드결제를 하실 수 있습니다.</td>
        </tr>
        <tr>
          <td class="f-semibold">온라인 계좌이체</td>
          <td class="b-left">
            <span class="t-divide"><span class="f-semibold">예금주</span> : 한국고분자 학회</span>
            <span>우리은행 : 123-05-015858</span>
            <span class="ml-2">국민은행 : 814-01-0040-193</span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="group-btn section sm">
    <a href="/member/join_2.php" class="btn-md">회원가입</a>
  </div>
</div>
<?php include_once ('../_tail.php'); ?>
