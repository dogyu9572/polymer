<?php include_once ('../_head.php'); ?>
<?php $gNum="1"; $sNum="5"; $gName="학회소개"; $sName="학회조직"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current">임원진</button>
		<div class="list">
			<button type="button" class="active" onClick="window.location.href='about_5.php';">임원진</button>
			<button type="button" onClick="window.location.href='about_51.php';">평의원</button>
			<button type="button" onClick="window.location.href='about_52.php';">제위원회</button>
			<button type="button" onClick="window.location.href='about_53.php';">운영위원회</button>
			<button type="button" onClick="window.location.href='about_54.php';">펠로우 회원</button>
		</div>
	</div>
	<div class="tab-container">
		<div class="tab-content">
			<!-- s: 임원진 -->
			<div class="tit-flex a-center btm-line">
				<p class="heading2">임원진</p>
				<div class="select-wrap w-40">
					<button type="button" class="select">42대 임원진 (2024.01.01 ~ 2024.12.31)</button>
					<ul>
						<li><button type="button" class="option">42대 임원진 (2025.01.01 ~ 2025.12.31)</button></li>
						<li><button type="button" class="option">41대 임원진 (2024.01.01 ~ 2024.12.31)</button></li>
						<li><button type="button" class="option">40대 임원진 (2023.01.01 ~ 2023.12.31)</button></li>
						<li><button type="button" class="option">39대 임원진 (2022.01.01 ~ 2022.12.31)</button></li>
						<li><button type="button" class="option">38대 임원진 (2021.01.01 ~ 2021.12.31)</button></li>
						<li><button type="button" class="option">37대 임원진 (2020.01.01 ~ 2020.12.31)</button></li>
						<li><button type="button" class="option">36대 임원진 (2019.01.01 ~ 2019.12.31)</button></li>
						<li><button type="button" class="option">35대 임원진 (2018.01.01 ~ 2018.12.31)</button></li>
						<li><button type="button" class="option">34대 임원진 (2017.01.01 ~ 2017.12.31)</button></li>
						<li><button type="button" class="option">33대 임원진 (2016.01.01 ~ 2016.12.31)</button></li>
						<li><button type="button" class="option">32대 임원진 (2015.01.01 ~ 2015.12.31)</button></li>
						<li><button type="button" class="option">31대 임원진 (2014.01.01 ~ 2014.12.31)</button></li>
						<li><button type="button" class="option">30대 임원진 (2013.01.01 ~ 2013.12.31)</button></li>
						<li><button type="button" class="option">29대 임원진 (2012.01.01 ~ 2012.12.31)</button></li>
						<li><button type="button" class="option">28대 임원진 (2011.01.01 ~ 2011.12.31)</button></li>
						<li><button type="button" class="option">27대 임원진 (2010.01.01 ~ 2010.12.31)</button></li>
						<li><button type="button" class="option">26대 임원진 (2009.01.01 ~ 2009.12.31)</button></li>
						<li><button type="button" class="option">25대 임원진 (2008.01.01 ~ 2008.12.31)</button></li>
						<li><button type="button" class="option">24대 임원진 (2007.01.01 ~ 2007.12.31)</button></li>
						<li><button type="button" class="option">23대 임원진 (2006.01.01 ~ 2006.12.31)</button></li>
						<li><button type="button" class="option">22대 임원진 (2005.01.01 ~ 2005.12.31)</button></li>
						<li><button type="button" class="option">21대 임원진 (2004.01.01 ~ 2004.12.31)</button></li>
						<li><button type="button" class="option">20대 임원진 (2003.01.01 ~ 2003.12.31)</button></li>
						<li><button type="button" class="option">19대 임원진 (2002.01.01 ~ 2002.12.31)</button></li>
						<li><button type="button" class="option">18대 임원진 (2001.01.01 ~ 2001.12.31)</button></li>
						<li><button type="button" class="option">17대 임원진 (2000.01.01 ~ 2000.12.31)</button></li>
						<li><button type="button" class="option">16대 임원진 (1999.01.01 ~ 1999.12.31)</button></li>
						<li><button type="button" class="option">15대 임원진 (1998.01.01 ~ 1998.12.31)</button></li>
						<li><button type="button" class="option">14대 임원진 (1997.01.01 ~ 1997.12.31)</button></li>
						<li><button type="button" class="option">13대 임원진 (1996.01.01 ~ 1996.12.31)</button></li>
						<li><button type="button" class="option">12대 임원진 (1995.01.01 ~ 1995.12.31)</button></li>
						<li><button type="button" class="option">11대 임원진 (1994.01.01 ~ 1994.12.31)</button></li>
						<li><button type="button" class="option">10대 임원진 (1993.01.01 ~ 1993.12.31)</button></li>
						<li><button type="button" class="option">9대 임원진 (1992.01.01 ~ 1992.12.31)</button></li>
						<li><button type="button" class="option">8대 임원진 (1991.01.01 ~ 1991.12.31)</button></li>
						<li><button type="button" class="option">7대 임원진 (1989.01.01 ~ 1990.12.31)</button></li>
						<li><button type="button" class="option">6대 임원진 (1987.01.01 ~ 1988.12.31)</button></li>
						<li><button type="button" class="option">5대 임원진 (1985.01.01 ~ 1986.12.31)</button></li>
						<li><button type="button" class="option">4대 임원진 (1983.01.01 ~ 1984.12.31)</button></li>
						<li><button type="button" class="option">3대 임원진 (1981.01.01 ~ 1982.12.31)</button></li>
						<li><button type="button" class="option">2대 임원진 (1979.01.01 ~ 1980.12.31)</button></li>
						<li><button type="button" class="option">1대 임원진 (1976.01.01 ~ 1978.12.31)</button></li>
					</ul>
				</div>
			</div>
			<div class="executives sm mt-6">
				<!-- 42대-->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>권용구</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김영섭</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>구본철</span>
							<span>김주현</span>
							<span>김한석</span>
							<span>김홍균</span>
							<span>손병혁</span>
							<span>이종휘</span>
							<span>한미정</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>강영종</span>
							<span>류두열</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>윤명한</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>이기라</span>
							<span>오승수</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>고문주</span>
								<span>곽영제</span>
								<span>김경택</span>
								<span>김덕준</span>
								<span>김동하</span>
								<span>김승현</span>
								<span>김병수</span>
								<span>김진웅</span>
								<span>김희숙</span>
								<span>박주현</span>
								<span>박철민</span>
								<span>방준하</span>
								<span>신흥수</span>
								<span>안동준</span>
								<span>안철희</span>
								<span>유필진</span>
								<span>이동현</span>
								<span>이현정</span>
								<span>조진한</span>
								<span>진형준</span>
								<span>차상호</span>
								<span>홍성우</span>
								<span>김봉수(부문위위원장)</span>
								<span>박지웅(부문위위원장)</span>
								<span>이상영(부문위위원장)</span>
								<span>이수홍(부문위위원장)</span>
								<span>이원목(부문위위원장)</span>
							</p>
							<p class="flex">
								<span class="label">대경지부</span>
								<span>권오형</span>
								<span>박수영</span>
								<span>박태호</span>
								<span>이승우</span>
							</p>
							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김문호</span>
								<span>유자형</span>
								<span>장재원</span>
								<span>정일두</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김범준</span>
								<span>김성룡</span>
								<span>윤성철</span>
								<span>이택승</span>
								<span>허강무</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>고흥조</span>
								<span>안석훈</span>
								<span>정광운</span>
								<span>허수미</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>곽광훈</span>
								<span>김상태</span>
								<span>김수련</span>
								<span>김인선</span>
								<span>김인욱</span>
								<span>박강열</span>
								<span>박기홍</span>
								<span>박정진</span>
								<span>박종수</span>
								<span>박상현</span>
								<span>이도현</span>
								<span>이동우</span>
								<span>안귀룡</span>
								<span>이윤호</span>
								<span>이준모</span>
								<span>이충훈</span>
								<span>장호식</span>
								<span>정돈호</span>
								<span>정명섭</span>
								<span>조동현</span>
								<span>최태이</span>
								<span>한정석</span>
							</p>

						</dd>
					</dl>
					<dl>
						<dt>운영위원회</dt>
						<dd class="label-wrap">
						<p class="flex">
							<span class="label">재무</span>
							<span>이동욱</span>
							<span>김정훈</span>
						</p>

						<p class="flex">
							<span class="label">학술</span>
							<span>강동구</span>
							<span>곽민석</span>
							<span>김도환</span>
							<span>김신현</span>
							<span>손창윤</span>
							<span>엄태식</span>
							<span>여현욱</span>
							<span>왕동환</span>
						</p>

						<p class="flex">
							<span class="label">편집</span>
							<span>강문성</span>
							<span>허수미</span>
						</p>

						<p class="flex">
							<span class="label">조직</span>
							<span>강기훈</span>
							<span>김대석</span>
							<span>김명진</span>
							<span>김민</span>
							<span>김재홍</span>
							<span>박성민</span>
							<span>박성준</span>
							<span>안효성</span>
							<span>양지웅</span>
							<span>우상혁</span>
							<span>장재영</span>
							<span>하민정</span>
						</p>

						<p class="flex">
							<span class="label">산학협력</span>
							<span>박민주</span>
							<span>성혜정</span>
							<span>임지우</span>
						</p>

						<p class="flex">
							<span class="label">기획</span>
							<span>구강희</span>
							<span>구형준</span>
							<span>김용주</span>
							<span>김종호</span>
							<span>김환</span>
							<span>박정태</span>
							<span>양상희</span>
							<span>이재준</span>
							<span>조우경</span>
						</p>
						</dd>
					</dl>
				</div> <!-- //42대 -->

				<!-- 41대-->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김윤희</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>권용구</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>강영구</span>
							<span>박지웅</span>
							<span>백현종</span>
							<span>이영준</span>
							<span>이종찬</span>
							<span>임종찬</span>
							<span>한세광</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>강영종</span>
							<span>류두열</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>강영종</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>윤명한</span>
							<span>김병수</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>고문주</span>
								<span>곽영제</span>
								<span>권오필</span>
								<span>김경택</span>
								<span>김동하</span>
								<span>김승현</span>
								<span>김재경</span>
								<span>김희숙</span>
								<span>문준혁</span>
								<span>박주현</span>
								<span>박철민</span>
								<span>박한수</span>
								<span>손대원</span>
								<span>송창식</span>
								<span>신흥수</span>
								<span>안철희</span>
								<span>우한영</span>
								<span>유필진</span>
								<span>이동현</span>
								<span>이원목</span>
								<span>정병문</span>
								<span>조진한</span>
								<span>진형준</span>
								<span>이윤구(부문위위원장)</span>
								<span>권오형(부문위위원장)</span>
								<span>김진웅(부문위위원장)</span>
								<span>이기라(부문위위원장)</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박수영</span>
								<span>박수진</span>
								<span>이승우</span>
								<span>조광수</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>성동기</span>
								<span>유성일</span>
								<span>이원기</span>
								<span>정일두</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김범준</span>
								<span>김성룡</span>
								<span>윤성철</span>
								<span>이택승</span>
								<span>허강무</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>구본철</span>
								<span>윤현석</span>
								<span>정광운</span>
								<span>태기융</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강경보</span>
								<span>김병조</span>
								<span>김상태</span>
								<span>김인욱</span>
								<span>김한석</span>
								<span>박강열</span>
								<span>박기홍</span>
								<span>박정진</span>
								<span>박종수</span>
								<span>박상현</span>
								<span>이도현</span>
								<span>이동우</span>
								<span>안귀룡</span>
								<span>이윤호</span>
								<span>이준모</span>
								<span>이충훈</span>
								<span>이치완</span>
								<span>장재규</span>
								<span>장호식</span>
								<span>전은진</span>
								<span>전천영</span>
								<span>정명섭</span>
								<span>조동현</span>
								<span>최태이</span>
								<span>한정석</span>
								<span>황민재</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //41대 -->
				
				<!-- 40대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김교현</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김윤희</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김성룡</span>
							<span>박종진</span>
							<span>박태호</span>
							<span>이상수</span>
							<span>이영준</span>
							<span>이종구</span>
							<span>조준한</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김영진</span>
							<span>이승우</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>류두열</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>강영종</span>
							<span>이기라</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>고민재</span>
								<span>곽영제</span>
								<span>권오필</span>
								<span>김동하</span>
								<span>김봉기</span>
								<span>김승현</span>
								<span>김재경</span>
								<span>노인섭</span>
								<span>문봉진</span>
								<span>박기동</span>
								<span>박주현</span>
								<span>방준하</span>
								<span>손대원</span>
								<span>손병혁</span>
								<span>안동준</span>
								<span>안철희</span>
								<span>이은지</span>
								<span>이동현</span>
								<span>이상영</span>
								<span>이상천</span>
								<span>이원목</span>
								<span>이종휘</span>
								<span>조진한</span>
								<span>진형준</span>
								<span>홍성철</span>
							</p>

							<p class="flex">
								<span class="label">부문위위원장 (본부)</span>
								<span>우한영</span>
								<span>신흥수</span>
								<span>박철민</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>권오형</span>
								<span>박수영</span>
								<span>조광수</span>
								<span>한세광</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>백현종</span>
								<span>유성일</span>
								<span>이원기</span>
								<span>성동기</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김범준</span>
								<span>윤성철</span>
								<span>이택승</span>
								<span>허강무</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>박지웅</span>
								<span>윤명한</span>
								<span>이수형</span>
								<span>정광운</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강경보</span>
								<span>곽성복</span>
								<span>김명환</span>
								<span>김병조</span>
								<span>김상태</span>
								<span>김인욱</span>
								<span>김한석</span>
								<span>남기준</span>
								<span>박강열</span>
								<span>박기홍</span>
								<span>박정진</span>
								<span>박종수</span>
								<span>배봉식</span>
								<span>이충훈</span>
								<span>이치완</span>
								<span>임희석</span>
								<span>장재규</span>
								<span>장태석</span>
								<span>장호식</span>
								<span>조준혁</span>
								<span>한장선</span>
								<span>황민재</span>
								<span>황윤일</span>
								<span>황진택</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //40대 -->
				
				<!-- 39대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>윤호규</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김교현</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>강경보</span>
							<span>강길선</span>
							<span>권용구</span>
							<span>김상태</span>
							<span>이택승</span>
							<span>제갈영순</span>
							<span>조남주</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김승현</span>
							<span>이승우</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김영진</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>류두열</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>고민재</span>
								<span>곽영제</span>
								<span>권오필</span>
								<span>김동하</span>
								<span>김봉기</span>
								<span>김승현</span>
								<span>김재경</span>
								<span>노인섭</span>
								<span>문봉진</span>
								<span>박기동</span>
								<span>박주현</span>
								<span>방준하</span>
								<span>손대원</span>
								<span>손병혁</span>
								<span>안동준</span>
								<span>안철희</span>
								<span>이은지</span>
								<span>이동현</span>
								<span>이상영</span>
								<span>이상천</span>
								<span>이원목</span>
								<span>이종휘</span>
								<span>조진한</span>
								<span>진형준</span>
								<span>홍성철</span>
								<span>우한영(부문위위원장)</span>
								<span>신흥수(부문위위원장)</span>
								<span>박철민(부문위위원장)</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박수영</span>
								<span>박태호</span>
								<span>제갈영순</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김주현</span>
								<span>임권택</span>
								<span>조남주</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>육순홍</span>
								<span>홍영택</span>
								<span>황택성</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>김동유</span>
								<span>나창운</span>
								<span>허양일</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강경보</span>
								<span>강창균</span>
								<span>강충석</span>
								<span>김   도</span>
								<span>김명환</span>
								<span>김상태</span>
								<span>김상필</span>
								<span>김양국</span>
								<span>김인욱</span>
								<span>김중인</span>
								<span>노기수</span>
								<span>노환권</span>
								<span>민경집</span>
								<span>박기홍</span>
								<span>박종수</span>
								<span>박준려</span>
								<span>신규순</span>
								<span>이동우</span>
								<span>이영준</span>
								<span>이   원</span>
								<span>정광춘</span>
								<span>최창현</span>
								<span>한장선</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //39대 -->
				
				<!-- 38대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>이준영</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>윤호규</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>박기홍</span>
							<span>박수영</span>
							<span>안동준</span>
							<span>원종찬</span>
							<span>이영준</span>
							<span>진성호</span>
							<span>한은미</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>이종휘</span>
							<span>김승현</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>이승우</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>김영진</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강영종</span>
								<span>곽영제</span>
								<span>권오필</span>
								<span>권용구</span>
								<span>김상율</span>
								<span>김영철</span>
								<span>김윤희</span>
								<span>김종만</span>
								<span>류두열</span>
								<span>박철민</span>
								<span>방준하</span>
								<span>손대원</span>
								<span>손병혁</span>
								<span>안철희</span>
								<span>유필진</span>
								<span>이기라</span>
								<span>이상수</span>
								<span>이상천</span>
								<span>이원목</span>
								<span>이현정</span>
								<span>조준한</span>
								<span>진병두</span>
								<span>진형준</span>
								<span>최동훈</span>
								<span>홍성철</span>
								<span>윤성철(부문위위원장)</span>
								<span>박귀덕(부문위위원장)</span>
								<span>김동하(부문위위원장)</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박태호</span>
								<span>조광수</span>
								<span>한세광</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>이원기</span>
								<span>정일두</span>
								<span>조남주</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>가재원</span>
								<span>김성룡</span>
								<span>박원호</span>
								<span>양성윤</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>박종진</span>
								<span>박지웅</span>
								<span>이동원</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강경보</span>
								<span>김  도</span>
								<span>김범성</span>
								<span>김상태</span>
								<span>김영률</span>
								<span>김인선</span>
								<span>김인욱</span>
								<span>김홍균</span>
								<span>노기수</span>
								<span>노환권</span>
								<span>박원석</span>
								<span>박정진</span>
								<span>박종수</span>
								<span>윤영서</span>
								<span>이도훈</span>
								<span>임희석</span>
								<span>장재영</span>
								<span>장호식</span>
								<span>조성호</span>
								<span>최치훈</span>
								<span>한장선</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //38대 -->
				
				<!-- 37대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김양국</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>이준영</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김영철</span>
							<span>김윤희</span>
							<span>김재경</span>
							<span>나창운</span>
							<span>성익경</span>
							<span>윤호규</span>
							<span>임희석</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>권용구</span>
							<span>이종휘</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김승현</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>이승우</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강영종</span>
								<span>곽영제</span>
								<span>권오필</span>
								<span>김덕준</span>
								<span>김수현</span>
								<span>김종만</span>
								<span>류두열</span>
								<span>박철민</span>
								<span>손병혁</span>
								<span>안철희</span>
								<span>우종표</span>
								<span>이기라</span>
								<span>이상수</span>
								<span>이상천</span>
								<span>이원목</span>
								<span>이종찬</span>
								<span>이현정</span>
								<span>정병문</span>
								<span>조준한</span>
								<span>진형준</span>
								<span>최동훈</span>
								<span>홍성철</span>
								<span>윤성철(부문위위원장)</span>
								<span>박근홍(부문위위원장)</span>
								<span>안동준(부문위위원장)</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박수영</span>
								<span>박태호</span>
								<span>조광수</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>이원기</span>
								<span>정일두</span>
								<span>조남주</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김성룡</span>
								<span>김태동</span>
								<span>박원호</span>
								<span>원종찬</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>강길선</span>
								<span>박지웅</span>
								<span>허양일</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강경보</span>
								<span>강창균</span>
								<span>강충석</span>
								<span>김범성</span>
								<span>김상태</span>
								<span>김영률</span>
								<span>김인선</span>
								<span>김인욱</span>
								<span>김중인</span>
								<span>김홍균</span>
								<span>노기수</span>
								<span>박기홍</span>
								<span>박정진</span>
								<span>박종수</span>
								<span>신규순</span>
								<span>윤영서</span>
								<span>이도훈</span>
								<span>이영준</span>
								<span>장재영</span>
								<span>장호식</span>
								<span>조성호</span>
								<span>한장선</span>
								<span>황인석</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //37대 -->
				
				<!-- 36대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>차국헌</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김양국</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김동유</span>
							<span>김   일</span>
							<span>민경집</span>
							<span>박기동</span>
							<span>손대원</span>
							<span>이미혜</span>
							<span>이준영</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김윤희</span>
							<span>제갈영순</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>이종휘</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>김승현</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>권오필</span>
								<span>권용구</span>
								<span>김덕준</span>
								<span>김수현</span>
								<span>김영철</span>
								<span>김재경</span>
								<span>김종만</span>
								<span>김지흥</span>
								<span>류두열</span>
								<span>손병혁</span>
								<span>안동준</span>
								<span>안철희</span>
								<span>우종표</span>
								<span>윤호규</span>
								<span>이기라</span>
								<span>이상수</span>
								<span>이원목</span>
								<span>이종찬</span>
								<span>이현정</span>
								<span>정병문</span>
								<span>조준한</span>
								<span>최동훈</span>
								<span>홍성철</span>
								<span>김경곤(부문위위원장)</span>
								<span>김천호(부문위위원장)</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>권오형</span>
								<span>박수영</span>
								<span>박태호</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>이원기</span>
								<span>정일두</span>
								<span>조남주</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김경준</span>
								<span>김동욱</span>
								<span>김성룡</span>
								<span>원종찬</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>나창운</span>
								<span>박종진</span>
								<span>박지웅</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강경보</span>
								<span>강창균</span>
								<span>강충석</span>
								<span>김   도</span>
								<span>김명환</span>
								<span>김범성</span>
								<span>김상태</span>
								<span>김영률</span>
								<span>김인선</span>
								<span>김인욱</span>
								<span>김중인</span>
								<span>노기수</span>
								<span>노환권</span>
								<span>박기홍</span>
								<span>박종수</span>
								<span>신규순</span>
								<span>이영준</span>
								<span>임희석</span>
								<span>장태석</span>
								<span>장호식</span>
								<span>전승범</span>
								<span>한장선</span>
								<span>황진택</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //36대 -->
				
				<!-- 35대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김철희</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>차국헌</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>강호종</span>
							<span>권순기</span>
							<span>김성수</span>
							<span>인교진</span>
							<span>장태석</span>
							<span>최이준</span>
							<span>허양일</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>손대원</span>
							<span>제갈영순</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김윤희</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>이종휘</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>권용구</span>
								<span>권익찬</span>
								<span>김덕준</span>
								<span>김수현</span>
								<span>김영철</span>
								<span>김재경</span>
								<span>김종만</span>
								<span>김지흥</span>
								<span>박기동</span>
								<span>손병혁</span>
								<span>안동준</span>
								<span>안철희</span>
								<span>우종표</span>
								<span>원종옥</span>
								<span>윤호규</span>
								<span>이상수</span>
								<span>이종찬</span>
								<span>이준영</span>
								<span>임순호</span>
								<span>정병문</span>
								<span>조준한</span>
								<span>최동훈</span>
								<span>홍성철</span>
								<span>박태호(부문위위원장)</span>
								<span>김천호(부문위위원장)</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								김현철 박수영 조광수
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								김주현 임권택 조남주
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								김경준 김대수 김성룡 원종찬
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								김동유 나창운 박종진
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>김인선</span>
								<span>강창균</span>
								<span>강경보</span>
								<span>강충석</span>
								<span>김   도</span>
								<span>김명환</span>
								<span>김상태</span>
								<span>김상필</span>
								<span>김양국</span>
								<span>김인욱</span>
								<span>김중인</span>
								<span>노기수</span>
								<span>노환권</span>
								<span>민경집</span>
								<span>박기홍</span>
								<span>박종수</span>
								<span>신규순</span>
								<span>이영준</span>
								<span>이   원</span>
								<span>최창현</span>
								<span>한장선</span>
								<span>황진택</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //35대 -->
				
				<!-- 34대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>동현수</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김철희</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김환규</span>
							<span>이명훈</span>
							<span>이선석</span>
							<span>조동환</span>
							<span>허완수</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김덕준</span>
							<span>손대원</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>권용구</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>김윤희</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강호종</span>
								<span>김영철</span>
								<span>김재경</span>
								<span>김종만</span>
								<span>김지흥</span>
								<span>박종욱</span>
								<span>손병혁</span>
								<span>안동준</span>
								<span>안철희</span>
								<span>우종표</span>
								<span>원종옥</span>
								<span>윤호규</span>
								<span>이상수</span>
								<span>이종찬</span>
								<span>이종휘</span>
								<span>이준영</span>
								<span>인교진</span>
								<span>임순호</span>
								<span>정병문</span>
								<span>조준한</span>
								<span>홍성철</span>
								<span>이택승(부문위위원장)</span>
								<span>노인섭(부문위위원장)</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박수영</span>
								<span>박태호</span>
								<span>제갈영순</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김주현</span>
								<span>임권택</span>
								<span>조남주</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>육순홍</span>
								<span>홍영택</span>
								<span>황택성</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>김동유</span>
								<span>나창운</span>
								<span>허양일</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강경보</span>
								<span>강창균</span>
								<span>강충석</span>
								<span>김   도</span>
								<span>김명환</span>
								<span>김상태</span>
								<span>김상필</span>
								<span>김양국</span>
								<span>김인욱</span>
								<span>김중인</span>
								<span>노기수</span>
								<span>노환권</span>
								<span>민경집</span>
								<span>박기홍</span>
								<span>박종수</span>
								<span>박준려</span>
								<span>신규순</span>
								<span>이동우</span>
								<span>이영준</span>
								<span>이   원</span>
								<span>정광춘</span>
								<span>최창현</span>
								<span>한장선</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //34대 -->
				
				<!-- 33대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>조길원</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>동현수</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>강인규</span>
							<span>김상율</span>
							<span>김상필</span>
							<span>김준경</span>
							<span>이재흥</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김덕준</span>
							<span>안동준</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>손대원</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>권용구</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강호종</span>
								<span>김종만</span>
								<span>김우년</span>
								<span>김재경</span>
								<span>김정호</span>
								<span>박종욱</span>
								<span>백상현</span>
								<span>이종찬</span>
								<span>안철희</span>
								<span>우종표</span>
								<span>유영태</span>
								<span>이명천</span>
								<span>이상수</span>
								<span>이종휘</span>
								<span>이준영</span>
								<span>이희우</span>
								<span>인교진</span>
								<span>정병문</span>
								<span>조준한</span>
								<span>홍성철</span>
								<span>진성호(부문위위원장)</span>
								<span>노인섭(부문위위원장)</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>이문호</span>
								<span>제갈영순</span>
								<span>최이준</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김병수</span>
								<span>김   일</span>
								<span>임권택</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>고장면</span>
								<span>이택승</span>
								<span>홍영택</span>
								<span>황택성</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>나재운</span>
								<span>정광운</span>
								<span>최재곤</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강창균</span>
								<span>강충석</span>
								<span>권오식</span>
								<span>김대영</span>
								<span>김   도</span>
								<span>김명환</span>
								<span>김상태</span>
								<span>김양국</span>
								<span>김인욱</span>
								<span>노기수</span>
								<span>노환권</span>
								<span>민경집</span>
								<span>박기홍</span>
								<span>박종수</span>
								<span>신규순</span>
								<span>신우성</span>
								<span>이건주</span>
								<span>이동우</span>
								<span>이영근</span>
								<span>이영준</span>
								<span>이   원</span>
								<span>임종찬</span>
								<span>정광춘</span>
								<span>진문영</span>
								<span>최창현</span>
							</p>

							<p class="flex">
								<span class="label">40주년위원회 - 프로그램위원회</span>
								<span>김철희(위원장)</span>
								<span>김윤희(부위원장)</span>
								<span>권용구(부위원장)</span>
							</p>

							<p class="flex">
								<span class="label">40주년위원회 - 특별위원회</span>
								<span>이준영(위원장)</span>
								<span>이종휘(부위원장)</span>
							</p>

							<p class="flex">
								<span class="label">40주년위원회 - 특집위원회</span>
								<span>윤호규(위원장)</span>
								<span>진형준(부위원장)</span>
								<span>곽영제(부위원장)</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //33대 -->
				
				<!-- 32대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김정안</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>조길원</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김은경</span>
							<span>유진녕</span>
							<span>이재석</span>
							<span>이창진</span>
							<span>차국헌</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김재경</span>
							<span>윤호규</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김덕준</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>손대원</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강호종</span>
								<span>권용구</span>
								<span>권익찬</span>
								<span>김종만</span>
								<span>김지흥</span>
								<span>김창근</span>
								<span>김철희</span>
								<span>박   민</span>
								<span>박수진</span>
								<span>백상현</span>
								<span>손병혁</span>
								<span>안동준</span>
								<span>안철희</span>
								<span>우종표</span>
								<span>이상수</span>
								<span>이종휘</span>
								<span>이준영</span>
								<span>조재영</span>
								<span>홍성철</span>
								<span>김동유(부문위위원장)</span>
								<span>한동근(부문위위원장)</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>김진곤</span>
								<span>제갈영순</span>
								<span>최이준</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김병수</span>
								<span>김   일</span>
								<span>임권택</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>고장면</span>
								<span>김상율</span>
								<span>홍영택</span>
								<span>황택성</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>나재운</span>
								<span>임윤묵</span>
								<span>유봉렬</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강창균</span>
								<span>강충석</span>
								<span>김   도</span>
								<span>김상필</span>
								<span>김승수</span>
								<span>김양국</span>
								<span>노기수</span>
								<span>동현수</span>
								<span>민경집</span>
								<span>박기홍</span>
								<span>박준려</span>
								<span>성효제</span>
								<span>유정수</span>
								<span>윤필중</span>
								<span>이   원</span>
								<span>이건주</span>
								<span>이동우</span>
								<span>이영근</span>
								<span>이영준</span>
								<span>이찬홍</span>
								<span>장경호</span>
								<span>장재권</span>
								<span>최창현</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //32대 -->
				
				<!-- 31대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>허수영</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김정안</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김진곤</span>
							<span>김철희</span>
							<span>노기수</span>
							<span>조재영</span>
							<span>최창현</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>이준영</span>
							<span>차국헌</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>안동준</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>김덕준</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>권익찬</span>
								<span>김윤희</span>
								<span>김재경</span>
								<span>김종만</span>
								<span>김지흥</span>
								<span>김창근</span>
								<span>박   민</span>
								<span>박수진</span>
								<span>백상현</span>
								<span>손대원</span>
								<span>손병혁</span>
								<span>오세용</span>
								<span>우종표</span>
								<span>윤호규</span>
								<span>정병문</span>
								<span>조준한</span>
								<span>최동훈</span>
								<span>함승주</span>
								<span>한동근</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>제갈영순</span>
								<span>최이준</span>
								<span>하기룡</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김 일</span>
								<span>박찬영</span>
								<span>이원기</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>고장면</span>
								<span>김상율</span>
								<span>김환규</span>
								<span>이창진</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>김택현</span>
								<span>나재운</span>
								<span>이명훈</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강창균</span>
								<span>강충석</span>
								<span>김   도</span>
								<span>김상필</span>
								<span>김범성</span>
								<span>김승수</span>
								<span>김양국</span>
								<span>동현수</span>
								<span>박기홍</span>
								<span>박승진</span>
								<span>박준려</span>
								<span>윤필중</span>
								<span>이건주</span>
								<span>이동우</span>
								<span>이영근</span>
								<span>이영준</span>
								<span>이   원</span>
								<span>박홍만</span>
								<span>장경호</span>
								<span>장석기</span>
								<span>장재권</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //31대 -->
				
				<!-- 30대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>이두성</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>허수영</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김명환</span>
							<span>김수경</span>
							<span>박종수</span>
							<span>장지영</span>
							<span>조길원</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김철희</span>
							<span>허완수</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>윤호규</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>안동준</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강호종</span>
								<span>권익찬</span>
								<span>김덕준</span>
								<span>김은경</span>
								<span>김재경</span>
								<span>김종만</span>
								<span>김창근</span>
								<span>박수진</span>
								<span>박   민</span>
								<span>백상현</span>
								<span>오세용</span>
								<span>이명천</span>
								<span>이준영</span>
								<span>인교진</span>
								<span>조준한</span>
								<span>차국헌</span>
								<span>최동훈</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>제갈영순</span>
								<span>최이준</span>
								<span>하기룡</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김 일</span>
								<span>박찬영</span>
								<span>이원기</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>고장면</span>
								<span>김상율</span>
								<span>김환규</span>
								<span>이창진</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>김택현</span>
								<span>이명훈</span>
								<span>이재석</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강창균</span>
								<span>강충석</span>
								<span>김   도</span>
								<span>김상필</span>
								<span>김범성</span>
								<span>김승수</span>
								<span>김양국</span>
								<span>김창규</span>
								<span>동현수</span>
								<span>박기홍</span>
								<span>박승진</span>
								<span>박준려</span>
								<span>윤필중</span>
								<span>이건주</span>
								<span>이영근</span>
								<span>이영준</span>
								<span>이   원</span>
								<span>장경호</span>
								<span>장석기</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //30대 -->
				
				<!-- 29대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>장태현</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>이두성</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김양국</span>
							<span>김중현</span>
							<span>노석균</span>
							<span>송석정</span>
							<span>한양규</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>장지영</span>
							<span>조현남</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김재경</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>윤호규</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강호종</span>
								<span>김영철</span>
								<span>김은경</span>
								<span>박기동</span>
								<span>박문수</span>
								<span>박수영</span>
								<span>손대원</span>
								<span>원종옥</span>
								<span>유영태</span>
								<span>이명천</span>
								<span>이준영</span>
								<span>이희우</span>
								<span>인교진</span>
								<span>차국헌</span>
								<span>최동훈</span>
								<span>최형진</span>
								<span>허완수</span>
								<span>홍순만</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>서관호</span>
								<span>조길원</span>
								<span>하기룡</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김원호</span>
								<span>박종만</span>
								<span>박찬영</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김상율</span>
								<span>민병각</span>
								<span>이미혜</span>
								<span>이진호</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>김동유</span>
								<span>이명훈</span>
								<span>허양일</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강창균</span>
								<span>김   도</span>
								<span>김순식</span>
								<span>김승수</span>
								<span>김창규</span>
								<span>동현수</span>
								<span>박승진</span>
								<span>박종수</span>
								<span>박준려</span>
								<span>서금석</span>
								<span>양세인</span>
								<span>이건주</span>
								<span>이영근</span>
								<span>이영준</span>
								<span>임종찬</span>
								<span>장경호</span>
								<span>장석기</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //29대 -->
				
				<!-- 28대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>이영관</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>장태현</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
								<span>김정안</span>
								<span>김창규</span>
								<span>임종찬</span>
								<span>진인주</span>
								<span>하창식</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>송석정</span>
							<span>한양규</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>차국헌</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>권순기</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강호종</span>
								<span>김영철</span>
								<span>김은경</span>
								<span>박기동</span>
								<span>박문수</span>
								<span>박수영</span>
								<span>손대원</span>
								<span>원종옥</span>
								<span>유영태</span>
								<span>이명천</span>
								<span>이준영</span>
								<span>이희우</span>
								<span>인교진</span>
								<span>최동훈</span>
								<span>최형진</span>
								<span>허완수</span>
								<span>홍순만</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>서관호</span>
								<span>조길원</span>
								<span>하기룡</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김원호</span>
								<span>김   일</span>
								<span>조남주</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>민병각</span>
								<span>박오옥</span>
								<span>이미혜</span>
								<span>이진호</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>강길선</span>
								<span>이재석</span>
								<span>홍진후</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강창균</span>
								<span>구정기</span>
								<span>김   도</span>
								<span>김순식</span>
								<span>김승수</span>
								<span>김양국</span>
								<span>김탁규</span>
								<span>박준려</span>
								<span>심명식</span>
								<span>양세인</span>
								<span>이건주</span>
								<span>이영근</span>
								<span>이영준</span>
								<span>장경호</span>
								<span>장석기</span>
								<span>조현남</span>
								<span>홍순용</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //28대 -->
				
				<!-- 27대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>최길영</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>이영관</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>강용수</span>
							<span>동현수</span>
							<span>유진녕</span>
							<span>이대수</span>
							<span>이두성</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김양국</span>
							<span>장정식</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>이준영</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>차국헌</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강호종</span>
								<span>김영철</span>
								<span>김정호</span>
								<span>김은경</span>
								<span>김중현</span>
								<span>김철희</span>
								<span>손대원</span>
								<span>원종옥</span>
								<span>유영태</span>
								<span>윤호규</span>
								<span>이명천</span>
								<span>이희우</span>
								<span>인교진</span>
								<span>장지영</span>
								<span>조길원</span>
								<span>허완수</span>
								<span>홍순만</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>노석균</span>
								<span>노환권</span>
								<span>이문호</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김원호</span>
								<span>김　일</span>
								<span>조남주</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>민병각</span>
								<span>박오옥</span>
								<span>이미혜</span>
								<span>이진호</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>강길선</span>
								<span>이재석</span>
								<span>홍진후</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강창균</span>
								<span>구정기</span>
								<span>김용만</span>
								<span>김순식</span>
								<span>김승수</span>
								<span>김창규</span>
								<span>김탁규</span>
								<span>박종수</span>
								<span>송석정</span>
								<span>심명식</span>
								<span>양세인</span>
								<span>이건주</span>
								<span>이영준</span>
								<span>임종찬</span>
								<span>조현남</span>
								<span>최창현</span>
								<span>홍순용</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //27대 -->
				
				<!-- 26대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>윤진산</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>최길영</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>박찬언</span>
							<span>송기국</span>
							<span>이광섭</span>
							<span>정규하</span>
							<span>정광춘</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>이대수</span>
							<span>이두성</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>조길원</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>이준영</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강용수</span>
								<span>강호종</span>
								<span>김성훈</span>
								<span>김정안</span>
								<span>김정호</span>
								<span>김중현</span>
								<span>김철희</span>
								<span>윤호규</span>
								<span>이명천</span>
								<span>이석현</span>
								<span>인교진</span>
								<span>임순호</span>
								<span>장지영</span>
								<span>조재영</span>
								<span>허완수</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>노석균</span>
								<span>노환권</span>
								<span>손태원</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>권순기</span>
								<span>김　일</span>
								<span>조남주</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>박오옥</span>
								<span>육순홍</span>
								<span>이재흥</span>
								<span>홍영택</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>김수경</span>
								<span>이명훈</span>
								<span>이재석</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강창균</span>
								<span>권익현</span>
								<span>김광수</span>
								<span>김대식</span>
								<span>김양국</span>
								<span>김장연</span>
								<span>김창규</span>
								<span>김탁규</span>
								<span>동현수</span>
								<span>박동원</span>
								<span>박병식</span>
								<span>양세인</span>
								<span>유진녕</span>
								<span>이건주</span>
								<span>이관영</span>
								<span>이영근</span>
								<span>임종찬</span>
								<span>최창현</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //26대 -->
				
				<!-- 25대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>우상선</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>윤진산</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>구정기</span>
							<span>박상훈</span>
							<span>이규호</span>
							<span>이상원</span>
							<span>장태현</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김순식</span>
							<span>진인주</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>장지영</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>조길원</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>김성훈</span>
								<span>김우년</span>
								<span>김은경</span>
								<span>김정안</span>
								<span>김정호</span>
								<span>김준경</span>
								<span>김진환</span>
								<span>김철희</span>
								<span>김홍두</span>
								<span>신동명</span>
								<span>이희우</span>
								<span>인교진</span>
								<span>조재영</span>
								<span>최형기</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								노석균 서관호 손태원
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								권순기 김　일 조남주
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								김정수 박오옥 이광섭 이재흥
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								김수경 이명훈 홍진후
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>김대식</span>
								<span>김승수</span>
								<span>김양국</span>
								<span>김창규</span>
								<span>동현수</span>
								<span>박동원</span>
								<span>서장혁</span>
								<span>유진녕</span>
								<span>이  원</span>
								<span>이영근</span>
								<span>임종찬</span>
								<span>장경호</span>
								<span>정광춘</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //25대 -->
				
				<!-- 24대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>안광덕</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>우상선</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김낙중</span>
							<span>서길수</span>
							<span>허수영</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>박정기</span>
							<span>박찬언</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김철희</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>장지영</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>김병철</span>
								<span>김성훈</span>
								<span>김우년</span>
								<span>김은경</span>
								<span>김정안</span>
								<span>김진환</span>
								<span>김홍두</span>
								<span>박기동</span>
								<span>유영태</span>
								<span>인교진</span>
								<span>임순호</span>
								<span>조재영</span>
								<span>최형기</span>
								<span>황승상</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>강인규</span>
								<span>손태원</span>
								<span>최이준</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김진국</span>
								<span>이범종</span>
								<span>하창식</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김정수</span>
								<span>김진백</span>
								<span>이광섭</span>
								<span>이재흥</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>이대수</span>
								<span>유봉렬</span>
								<span>유지강</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>김대식</span>
								<span>김순식</span>
								<span>김승수</span>
								<span>김양국</span>
								<span>김창규</span>
								<span>박동원</span>
								<span>박상훈</span>
								<span>서장혁</span>
								<span>심영인</span>
								<span>원호연</span>
								<span>유진녕</span>
								<span>윤인선</span>
								<span>이원</span>
								<span>임종찬</span>
								<span>정광춘</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //24대 -->
				
				<!-- 23대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김봉식</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>안광덕</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>윤진산</span>
							<span>이영관</span>
							<span>최길영</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김낙중</span>
							<span>홍순용</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김정안</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>김철희</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강혜정</span>
								<span>강호종</span>
								<span>김병철</span>
								<span>김성수</span>
								<span>김우년</span>
								<span>김은경</span>
								<span>김진환</span>
								<span>김준경</span>
								<span>김창근</span>
								<span>박수영</span>
								<span>이희우</span>
								<span>인교진</span>
								<span>조재영</span>
								<span>황승상</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박찬언</span>
								<span>손태원</span>
								<span>강인규</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김진국</span>
								<span>이범종</span>
								<span>하창식</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김진백</span>
								<span>이규호</span>
								<span>신재섭</span>
								<span>홍성권</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>이대수</span>
								<span>유봉렬</span>
								<span>유지강</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>김대식</span>
								<span>김순식</span>
								<span>김양국</span>
								<span>김창규</span>
								<span>동현수</span>
								<span>박동원</span>
								<span>박상훈</span>
								<span>서장혁</span>
								<span>원호연</span>
								<span>유진녕</span>
								<span>윤인선</span>
								<span>이관영</span>
								<span>이영철</span>
								<span>이원</span>
								<span>정광춘</span>
								<span>심영인</span>
								<span>최수명</span>
								<span>황태원</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //23대 -->
				
				<!-- 22대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>조원호</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김봉식</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>권익현</span>
							<span>안광덕</span>
							<span>채규호</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>윤진산</span>
							<span>이상원</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>조재영</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>김정안</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강혜정</span>
								<span>강호종</span>
								<span>김병철</span>
								<span>김성수</span>
								<span>김우년</span>
								<span>김준경</span>
								<span>김진환</span>
								<span>김철희</span>
								<span>이희우</span>
								<span>인교진</span>
								<span>장지영</span>
								<span>한양규</span>
								<span>한학수</span>
								<span>허완수</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박찬언</span>
								<span>손태원</span>
								<span>서관호</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>권순기</span>
								<span>설수덕</span>
								<span>하창식</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김진백</span>
								<span>이광섭</span>
								<span>이규호</span>
								<span>신재섭</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>도춘호</span>
								<span>김수경</span>
								<span>이대수</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>구정기</span>
								<span>김양국</span>
								<span>김용원</span>
								<span>김상연</span>
								<span>오영수</span>
								<span>원호연</span>
								<span>유진녕</span>
								<span>윤인선</span>
								<span>이현주</span>
								<span>이안기</span>
								<span>이관영</span>
								<span>이원</span>
								<span>정규하</span>
								<span>최재호</span>
								<span>홍순용</span>
								<span>황태원</span>
								<span>유영득</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //22대 -->
				
				<!-- 21대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김영하</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>조원호</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김기협</span>
							<span>윤도영</span>
							<span>이진국</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>박이순</span>
							<span>안광덕</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>한양규</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>조재영</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강혜정</span>
								<span>강호종</span>
								<span>김수현</span>
								<span>김우년</span>
								<span>김준경</span>
								<span>송기국</span>
								<span>이두성</span>
								<span>인교진</span>
								<span>이희우</span>
								<span>장지영</span>
								<span>조창기</span>
								<span>진인주</span>
								<span>한학수</span>
								<span>허완수</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박일현</span>
								<span>박찬언</span>
								<span>서길수</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>권순기</span>
								<span>설수덕</span>
								<span>하창식</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김진백</span>
								<span>이광섭</span>
								<span>이규호</span>
								<span>홍성권</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>이종문</span>
								<span>이재석</span>
								<span>김수경</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>강명구</span>
								<span>권익현</span>
								<span>김양국</span>
								<span>김장연</span>
								<span>김종수</span>
								<span>동현수</span>
								<span>민경집</span>
								<span>박종명</span>
								<span>박태석</span>
								<span>유영득</span>
								<span>윤인선</span>
								<span>이안기</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //21대 -->
				
				<!-- 20대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>이동호</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김영하</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김동국</span>
							<span>정종구</span>
							<span>조병욱</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>이진국</span>
							<span>전영관</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>송기국</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>한양규</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강용수</span>
								<span>김성수</span>
								<span>김우년</span>
								<span>김정안</span>
								<span>김준경</span>
								<span>김중현</span>
								<span>노시태</span>
								<span>이두성</span>
								<span>이영무</span>
								<span>이희우</span>
								<span>조재영</span>
								<span>최길영</span>
								<span>최순자</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박이순</span>
								<span>서길수</span>
								<span>이문호</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>권순기</span>
								<span>박동규</span>
								<span>하창식</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>박정기</span>
								<span>이광섭</span>
								<span>이규호</span>
								<span>황택성</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>이명훈</span>
								<span>이재석</span>
								<span>채규호</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>구정기</span>
								<span>김순식</span>
								<span>김양국</span>
								<span>유진녕</span>
								<span>윤인선</span>
								<span>이원</span>
								<span>정규하</span>
								<span>정영태</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //20대 -->
				
				<!-- 19대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>정진철</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>이동호</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>강두환</span>
							<span>박호진</span>
							<span>이희연</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김동국</span>
							<span>김정호</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>최길영</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>송기국</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>강용수</span>
								<span>김우년</span>
								<span>김정안</span>
								<span>김중현</span>
								<span>노시태</span>
								<span>이두성</span>
								<span>이상원</span>
								<span>이영무</span>
								<span>이영철</span>
								<span>이희우</span>
								<span>장정식</span>
								<span>조원호</span>
								<span>최순자</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박이순</span>
								<span>장진해</span>
								<span>장태현</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>박동규</span>
								<span>박영욱</span>
								<span>하창식</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>박정기</span>
								<span>이광섭</span>
								<span>이규호</span>
								<span>홍성권</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>김장주</span>
								<span>이대수</span>
								<span>채규호</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>구정기</span>
								<span>김순식</span>
								<span>원호연</span>
								<span>유진녕</span>
								<span>윤인선</span>
								<span>이안기</span>
								<span>정광춘</span>
								<span>정영태</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //19대 -->
				
				<!-- 18대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김성철</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>정진철</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>우상선</span>
							<span>임승순</span>
							<span>심홍구</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>강두환</span>
							<span>김국중</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>이두성</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>최길영</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="label-wrap">
							<p class="flex">
								<span class="label">본부</span>
								<span>김낙중</span>
								<span>김동국</span>
								<span>김병식</span>
								<span>김재진</span>
								<span>김정안</span>
								<span>송기국</span>
								<span>안광덕</span>
								<span>윤도영</span>
								<span>윤진산</span>
								<span>이상원</span>
								<span>조원호</span>
								<span>최순자</span>
								<span>허정림</span>
							</p>

							<p class="flex">
								<span class="label">대경지부</span>
								<span>박이순</span>
								<span>박일현</span>
								<span>진왕철</span>
							</p>

							<p class="flex">
								<span class="label">부울경지부</span>
								<span>김진국</span>
								<span>이진국</span>
								<span>정한모</span>
							</p>

							<p class="flex">
								<span class="label">충청지부</span>
								<span>김진백</span>
								<span>박정기</span>
								<span>이규호</span>
								<span>주혁종</span>
							</p>

							<p class="flex">
								<span class="label">호남지부</span>
								<span>배유한</span>
								<span>이대수</span>
								<span>채규호</span>
							</p>

							<p class="flex">
								<span class="label">산업계</span>
								<span>박병규</span>
								<span>박호진</span>
								<span>이병형</span>
								<span>장진양</span>
								<span>전영관</span>
								<span>정동진</span>
								<span>조병욱</span>
								<span>허수영</span>
								<span>홍순용</span>
							</p>
						</dd>
					</dl>
				</div> <!-- //18대 -->
				
				<!-- 17대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김광웅</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김성철</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김영하</span>
							<span>여종기</span>
							<span>이동호</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>임승순</span>
							<span>정동진</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>이상원</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>이두성</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>강두환</span>
							<span>권익현</span>
							<span>기준</span>
							<span>김국중</span>
							<span>김기협</span>
							<span>김낙중</span>
							<span>김동국</span>
							<span>김병식</span>
							<span>김봉식</span>
							<span>김순식</span>
							<span>김재훈</span>
							<span>김종광</span>
							<span>도춘호</span>
							<span>박병규</span>
							<span>박상욱</span>
							<span>박호진</span>
							<span>심홍구</span>
							<span>안광덕</span>
							<span>오헌승</span>
							<span>우상선</span>
							<span>윤진산</span>
							<span>이병형</span>
							<span>이장우</span>
							<span>이정대</span>
							<span>이종문</span>
							<span>이진국</span>
							<span>이호설</span>
							<span>정진철</span>
							<span>주혁종</span>
							<span>조병욱</span>
							<span>조원호</span>
							<span>최길영</span>
							<span>최철림</span>
							<span>허수영</span>
						</dd>
					</dl>
				</div> <!-- //17대 -->
				
				<!-- 16대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>성용길</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김광웅</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김성철</span>
							<span>신현주</span>
							<span>최철림</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김영하</span>
							<span>이동호</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김낙중</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>이상원</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>강두환</span>
							<span>김경원</span>
							<span>김공수</span>
							<span>김기협</span>
							<span>김동국</span>
							<span>김병규</span>
							<span>김병식</span>
							<span>김봉식</span>
							<span>김재훈</span>
							<span>도춘호</span>
							<span>박병규</span>
							<span>심홍구</span>
							<span>안광덕</span>
							<span>여종기</span>
							<span>오세철</span>
							<span>우상선</span>
							<span>윤진산</span>
							<span>이병형</span>
							<span>이원철</span>
							<span>이장우</span>
							<span>이정대</span>
							<span>이종문</span>
							<span>이호동</span>
							<span>이호설</span>
							<span>이해방</span>
							<span>임대우</span>
							<span>임승순</span>
							<span>정동진</span>
							<span>정진철</span>
							<span>조병욱</span>
							<span>조원호</span>
							<span>채규호</span>
							<span>최길영</span>
						</dd>
					</dl>
				</div> <!-- //16대 -->
				
				<!-- 15대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>이후성</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>성용길</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>강관</span>
							<span>이해방</span>
							<span>조성효</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김성철</span>
							<span>여종기</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>윤진산</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>김낙중</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>강두환</span>
							<span>김경원</span>
							<span>김광웅</span>
							<span>김동국</span>
							<span>김봉식</span>
							<span>김영하</span>
							<span>김재훈</span>
							<span>김정원</span>
							<span>박병규</span>
							<span>송성원</span>
							<span>심홍구</span>
							<span>안광덕</span>
							<span>오세철</span>
							<span>우상선</span>
							<span>이동호</span>
							<span>이병형</span>
							<span>이정대</span>
							<span>이종문</span>
							<span>이호동</span>
							<span>이호설</span>
							<span>임대우</span>
							<span>임승순</span>
							<span>전영관</span>
							<span>정동진</span>
							<span>정종구</span>
							<span>조병욱</span>
							<span>조원호</span>
							<span>최길영</span>
							<span>최철림</span>
						</dd>
					</dl>
				</div> <!-- //15대 -->
				
				<!-- 14대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>진정일</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>이후성</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김경원</span>
							<span>김광웅</span>
							<span>김봉식</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김공수</span>
							<span>최철림</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>안광덕</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>윤진산</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>강두환</span>
							<span>김경원</span>
							<span>김광웅</span>
							<span>김동국</span>
							<span>김봉식</span>
							<span>김영하</span>
							<span>김재훈</span>
							<span>김정원</span>
							<span>박병규</span>
							<span>송성원</span>
							<span>심홍구</span>
							<span>안광덕</span>
							<span>오세철</span>
							<span>우상선</span>
							<span>이동호</span>
							<span>이병형</span>
							<span>이정대</span>
							<span>이종문</span>
							<span>이호동</span>
							<span>이호설</span>
							<span>임대우</span>
							<span>임승순</span>
							<span>전영관</span>
							<span>정동진</span>
							<span>정종구</span>
							<span>조병욱</span>
							<span>조원호</span>
							<span>최길영</span>
							<span>최철림</span>
						</dd>
					</dl>
				</div> <!-- //14대 -->
				
				<!-- 13대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>이서봉</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>진정일</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>성용길</span>
							<span>이덕림</span>
							<span>정진철</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김광웅</span>
							<span>이국노</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김동국</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>안광덕</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>강두환</span>
							<span>권오승</span>
							<span>김경원</span>
							<span>김기협</span>
							<span>김봉식</span>
							<span>김성철</span>
							<span>김영하</span>
							<span>김우식</span>
							<span>김정호</span>
							<span>박상욱</span>
							<span>변재황</span>
							<span>심홍구</span>
							<span>여종기</span>
							<span>이동호</span>
							<span>이승조</span>
							<span>이종문</span>
							<span>이해방</span>
							<span>임승순</span>
							<span>정동진</span>
							<span>조병욱</span>
							<span>조원제</span>
							<span>우상선</span>
							<span>이병형</span>
							<span>이호동</span>
							<span>이호설</span>
							<span>최철림</span>
						</dd>
					</dl>
				</div> <!-- //13대 -->
				
				<!-- 12대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김정엽</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>이서봉</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김연식</span>
							<span>조원제</span>
							<span>진정일</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>강박광</span>
							<span>김봉식</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>강두환</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>조원호</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>고윤석</span>
							<span>김경원</span>
							<span>김광웅</span>
							<span>김기협</span>
							<span>김성철</span>
							<span>김영하</span>
							<span>김정호</span>
							<span>민태익</span>
							<span>성용길</span>
							<span>여종기</span>
							<span>우상선</span>
							<span>이국노</span>
							<span>이병형</span>
							<span>이승조</span>
							<span>이해방</span>
							<span>이호동</span>
							<span>이호설</span>
							<span>임승순</span>
							<span>정동진</span>
							<span>정진철</span>
							<span>조병욱</span>
							<span>최철림</span>
						</dd>
					</dl>
				</div> <!-- //12대 -->
				
				<!-- 11대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>한만정</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김정엽</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김우식</span>
							<span>윤대욱</span>
							<span>이후성</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>민태익</span>
							<span>이해방</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>임승순</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>강두환</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>고윤석</span>
							<span>김광웅</span>
							<span>김기협</span>
							<span>김봉식</span>
							<span>김성철</span>
							<span>김영하</span>
							<span>성용길</span>
							<span>여종기</span>
							<span>정동진</span>
							<span>정진철</span>
							<span>조성효</span>
							<span>진정일</span>
							<span>최철림</span>
						</dd>
					</dl>
				</div> <!-- //11대 -->
				
				<!-- 10대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김은영</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>한만정</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김완영</span>
							<span>유영학</span>
							<span>한정련</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>정진철</span>
							<span>진정일</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김영하</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>임승순</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>김광웅</span>
							<span>김봉식</span>
							<span>김성철</span>
							<span>김충부</span>
							<span>민태익</span>
							<span>성용길</span>
							<span>여종기</span>
							<span>이장우</span>
							<span>이해방</span>
							<span>이후성</span>
							<span>조성효</span>
							<span>최철림</span>
							<span>한영수</span>
						</dd>
					</dl>
				</div> <!-- //10대 -->
				
				<!-- 9대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>홍성일</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd>김은영</dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>이서봉</span>
							<span>최준식</span>
							<span>한만정</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>성용길</span>
							<span>조원제</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>최철림</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>김영하</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>김광웅</span>
							<span>김봉식</span>
							<span>김성철</span>
							<span>김완영</span>
							<span>변재황</span>
							<span>여종기</span>
							<span>이해방</span>
							<span>이후성</span>
							<span>장용균</span>
							<span>정진철</span>
							<span>조성효</span>
							<span>조용장</span>
							<span>진정일</span>
						</dd>
					</dl>
				</div> <!-- //9대 -->
				
				<!-- 8대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>조의환</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김은영</span>
							<span>김정엽</span>
							<span>신영조</span>
							<span>이부섭</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김우식</span>
							<span>이서봉</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김성철</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>김봉식</span>
							<span>성용길</span>
							<span>이동호</span>
							<span>조용장</span>
							<span>장용균</span>
							<span>여종기</span>
							<span>변재황</span>
							<span>이후성</span>
							<span>김광웅</span>
							<span>이해방</span>
							<span>최철림</span>
							<span>진정일</span>
							<span>조성효</span>
							<span>김완영</span>
						</dd>
					</dl>
				</div> <!-- //8대 -->
				
				<!-- 7대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>안태완</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김재문</span>
							<span>조의환</span>
							<span>홍성일</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김은영</span>
							<span>김계용</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>이후성</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>구민회</span>
							<span>김광웅</span>
							<span>김성철</span>
							<span>김우식</span>
							<span>김정엽</span>
							<span>맹원기</span>
							<span>문탁진</span>
							<span>성용길</span>
							<span>신영조</span>
							<span>이서봉</span>
							<span>임성택</span>
							<span>임용성</span>
							<span>정진철</span>
							<span>진정일</span>
							<span>최남석</span>
						</dd>
					</dl>
				</div> <!-- //7대 -->
				
				<!-- 6대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>노익삼</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김광웅</span>
							<span>박천욱</span>
							<span>안태완</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>맹기석</span>
							<span>홍성일</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김광웅</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>구민회</span>
							<span>김계용</span>
							<span>김성철</span>
							<span>김은영</span>
							<span>김재문</span>
							<span>김정엽</span>
							<span>성재갑</span>
							<span>성용길</span>
							<span>유영학</span>
							<span>이서봉</span>
							<span>조의환</span>
							<span>진정일</span>
							<span>최규석</span>
							<span>최운재</span>
							<span>한정련</span>
						</dd>
					</dl>
				</div> <!-- //6대 -->
				
				<!-- 5대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김점식</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>노익삼</span>
							<span>지동범</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>조의환</span>
							<span>한정련</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김계용</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd class="flex">
							<span>김성철</span>
							<span>성용길</span>
						</dd>
					</dl>
					<dl>
						<dt>편집이사</dt>
						<dd class="flex">
							<span>진정일</span>
							<span>홍성일</span>
						</dd>
					</dl>
					<dl>
						<dt>재무이사</dt>
						<dd class="flex">
							<span>김영하</span>
							<span>김창규</span>
						</dd>
					</dl>
					<dl>
						<dt>기획이사</dt>
						<dd class="flex">
							<span>최철림</span>
							<span>정경택</span>
						</dd>
					</dl>
					<dl>
						<dt>조직이사</dt>
						<dd class="flex">
							<span>임승순</span>
							<span>원영무</span>
						</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span></span> <!-- 데이터 없음 -->
						</dd>
					</dl>
				</div> <!-- //5대 -->
				
				<!-- 4대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>정기현</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>김점식</span>
							<span>최근선</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>노익삼</span>
							<span>안태완</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김정엽</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>김광웅</dd>
					</dl>
					<dl>
						<dt>편집이사</dt>
						<dd>조의환</dd>
					</dl>
					<dl>
						<dt>재무이사</dt>
						<dd>성용길</dd>
					</dl>
					<dl>
						<dt>기획이사</dt>
						<dd>임승순</dd>
					</dl>
					<dl>
						<dt>조직이사</dt>
						<dd>김계용</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>강두환</span>
							<span>김성철</span>
							<span>김은영</span>
							<span>이동주</span>
							<span>한정련</span>
							<span>홍성일</span>
						</dd>
					</dl>
				</div> <!-- //4대 -->
				
				<!-- 3대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>김원택</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>변형직</span>
							<span>이기동</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>최삼권</span>
							<span>최규석</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김계용</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>홍성일</dd>
					</dl>
					<dl>
						<dt>편집이사</dt>
						<dd>진정일</dd>
					</dl>
					<dl>
						<dt>재무이사</dt>
						<dd>강두환</dd>
					</dl>
					<dl>
						<dt>기획이사</dt>
						<dd>김광웅</dd>
					</dl>
					<dl>
						<dt>조직이사</dt>
						<dd>김성철</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>김순모</span>
							<span>김은영</span>
							<span>김점식</span>
							<span>김정엽</span>
							<span>이웅</span>
						</dd>
					</dl>
				</div> <!-- //3대 -->
				
				<!-- 2대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>심정섭</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>강수철</span>
							<span>정기현</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김원택</span>
							<span>변형직</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>김은영</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>민태익</dd>
					</dl>
					<dl>
						<dt>편집이사</dt>
						<dd>진정일</dd>
					</dl>
					<dl>
						<dt>재무이사</dt>
						<dd>강두환</dd>
					</dl>
					<dl>
						<dt>기획이사</dt>
						<dd>김성철</dd>
					</dl>
					<dl>
						<dt>조직이사</dt>
						<dd>강박광</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>김계용</span>
							<span>김순모</span>
							<span>노익삼</span>
							<span>조의환</span>
						</dd>
					</dl>
				</div> <!-- //2대 -->
				
				<!-- 1대 -->
				<div class="cont">
					<dl>
						<dt>회장</dt>
						<dd>성좌경</dd>
					</dl>
					<dl>
						<dt>수석부회장</dt>
						<dd></dd>
					</dl>
					<dl>
						<dt>부회장</dt>
						<dd class="flex">
							<span>심정섭</span>
							<span>이형규</span>
						</dd>
					</dl>
					<dl>
						<dt>감사</dt>
						<dd class="flex">
							<span>김원택</span>
							<span>정기현</span>
						</dd>
					</dl>
					<dl>
						<dt>전무이사</dt>
						<dd>노익삼</dd>
					</dl>
					<dl>
						<dt>총무이사</dt>
						<dd>김계용</dd>
					</dl>
					<dl>
						<dt>편집이사</dt>
						<dd>조의환</dd>
					</dl>
					<dl>
						<dt>재무이사</dt>
						<dd>홍성일</dd>
					</dl>
					<dl>
						<dt>기획이사</dt>
						<dd>최남석</dd>
					</dl>
					<dl>
						<dt>조직이사</dt>
						<dd>장성봉</dd>
					</dl>
					<dl>
						<dt>평이사</dt>
						<dd class="flex">
							<span>최규석</span>
							<span>김은영</span>
							<span>진정일</span>
						</dd>
					</dl>
				</div> <!-- //1대 -->

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
	$(".tabs-type1 .list button").click(function () {
		var index = $(this).index();
		var buttonText = $(this).text();
		$(".tabs-type1 .list button").removeClass("active");
		$(this).addClass("active");
		$(".tab-container .tab-content").hide();
		$(".tab-container .tab-content").eq(index).show();
		$(this).closest('.tabs-type1').find('.current').text(buttonText);
		$('.tabs-type1').removeClass('on');
		if (window.matchMedia("(max-width: 768px)").matches) {
			$('.tabs-type1 .list').slideUp(200);
		}
	});

	//탭(ul) onoff
	$('.tab-content>.executives').children().css('display', 'none');
	$('.tab-content>.executives .cont:first-child').css('display', 'block');

	$('.tab-content').delegate('.select-wrap li>button', 'click', function() {
		var index = $(this).parent().index();
		$(this).parent().parent().parent().parent().next('.executives').children().hide().eq(index).show();
	});
});
</script>
<?php include_once ('../_tail.php'); ?>