<div class="sub-top sub<?=$gNum?>">
	<div class="visual">
		<div class="title">
			<h2><?=$gName?></h2>
			<h3><?=$sName?></h3>
		</div>
	</div>
	<div class="breadcrumb">
		<div class="inner">
			<a href="/" class="home"><span class="blind">홈으로</span></a>
			<div class="loca">
				<button type="button"><?=$gName?></button>
				<ul>
					<li class="<?if($gNum=="01"){?>active<?}?>"><a href="/about/about_1.php" class="depth1">학회소개</a></li>
					<li class="<?if($gNum=="02"){?>active<?}?>"><a href="/act/act_11.php" class="depth1">학회활동</a></li>
					<li class="<?if($gNum=="03"){?>active<?}?>"><a href="/function/function_1.php" class="depth1">학회행사</a></li>
					<li class="<?if($gNum=="04"){?>active<?}?>"><a href="/publish/publish_1.php" class="depth1">발간물</a></li>
					<li class="<?if($gNum=="05"){?>active<?}?>"><a href="/news/news_1.php" class="depth1">공지ㆍ안내</a></li>
					<li class="<?if($gNum=="06"){?>active<?}?>"><a href="/mypage/mypage_1.php" class="depth1">마이페이지</a></li>
				</ul>
			</div>
			<div class="loca sec">
				<button type="button"><?=$sName?></button>
				<ul>
				<?if($gNum=="01"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/about/about_1.php">개관</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/about/about_2.php">인사말</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/about/about_3.php">학회연혁</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/about/about_4.php">정관 및 규정</a></li>
					<li class="<?if($sNum=="05"){?>active<?}?>"><a href="/about/about_5.php">학회조직</a></li>
					<li class="<?if($sNum=="06"){?>active<?}?>"><a href="/about/about_6.php">단체/특별회원 명단</a></li>
					<li class="<?if($sNum=="07"){?>active<?}?>"><a href="/about/about_7.php">학회 오시는 길</a></li>
				<?}elseif($gNum=="02"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/act/act_11.php">학회상</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/act/act_2.php">국제교류</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/act/act_3.php">지부</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/act/act_4.php">부문위원회</a></li>
				<?}elseif($gNum=="03"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/function/function_all.php">학회일정</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/function/function_1.php">국내학술대회</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/function/function_2.php">국제학술대회</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/function/function_3.php">세미나/워크숍</a></li>
					<li class="<?if($sNum=="05"){?>active<?}?>"><a href="/function/function_4.php">부문위원회 세미나</a></li>
					<li class="<?if($sNum=="06"){?>active<?}?>"><a href="/function/function_6.php">초록집 모음</a></li>
					<li class="<?if($sNum=="07"){?>active<?}?>"><a href="/function/function_7.php">확인서/영수증</a></li>
					<li class="<?if($sNum=="08"){?>active<?}?>"><a href="/function/function_0.php">추후 학술대회</a></li>
				<?}elseif($gNum=="04"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/publish/publish_1.php">Macromolecular Research</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/publish/publish_2.php">Polymer(Korea)</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/publish/publish_31.php">고분자 과학과 기술</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/publish/publish_41.php">창립특집호</a></li>
					<li class="<?if($sNum=="05"){?>active<?}?>"><a href="/publish/publish_5.php">동영상강의</a></li>
				<?}elseif($gNum=="05"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/news/news_1.php">공지사항</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/news/news_2.php">학회소식</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/news/news_3.php">지부/부문위원회 소식</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/news/news_4.php">회원동정</a></li>
					<li class="<?if($sNum=="05"){?>active<?}?>"><a href="/news/news_5.php">학술행사안내</a></li>
					<li class="<?if($sNum=="06"){?>active<?}?>"><a href="/news/news_6.php">정보마당</a></li>
					<li class="<?if($sNum=="07"){?>active<?}?>"><a href="/news/news_7.php">구인구직</a></li>
					<li class="<?if($sNum=="08"){?>active<?}?>"><a href="/news/news_8.php">광고</a></li>
					<li class="<?if($sNum=="09"){?>active<?}?>"><a href="/news/news_9.php">갤러리</a></li>
					<li class="<?if($sNum=="10"){?>active<?}?>"><a href="https://www.polymer.or.kr/e-book/ecatalog5.php?Dir=85&catimage=3&callmode=admin" target="_blank">뉴스레터</a></li>
					<li class="<?if($sNum=="11"){?>active<?}?>"><a href="/news/news_11.php">Q&A</a></li>
					<li class="<?if($sNum=="12"){?>active<?}?>"><a href="/news/news_12.php">공익법인 기부금 내역서</a></li>
				<?}elseif($gNum=="06"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/mypage/mypage_1.php">회원정보수정</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/mypage/mypage_2.php">회비납부내역</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/mypage/mypage_3.php">회비결제</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/mypage/mypage_4.php">회원활동(임원)</a></li>
					<li class="<?if($sNum=="05"){?>active<?}?>"><a href="/mypage/mypage_5.php">확인서/영수증</a></li>
				<?}elseif($gNum=="07"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/member/join_1.php">회원가입</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/member/login.php">로그인</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/member/find_id.php">아이디찾기</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/member/find_pwd.php">비밀번호찾기</a></li>
					<li class="<?if($sNum=="05"){?>active<?}?>"><a href="/member/pay.php">게재료 결제</a></li>
				<?}?>
				</ul>
			</div>
		</div>
	</div>
</div>