<?php include_once ('../_head.php'); ?>
<?php $gNum="3"; $sNum="6"; $gName="학회행사"; $sName="초록집 모음"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
	<div class="tabs-type1">
		<button type="button" class="current"><?=$sName?></button>
		<div class="list">
			<button type="button" onclick="location.href='/function/function_1.php'" class="<?if($sNum=="02"){?>active<?}?>">국내학술대회</button>
			<button type="button" onclick="location.href='/function/function_2.php'" class="<?if($sNum=="03"){?>active<?}?>">국제학술대회</button>
			<button type="button" onclick="location.href='/function/function_3.php'" class="<?if($sNum=="04"){?>active<?}?>">세미나/워크숍</button>
			<button type="button" onclick="location.href='/function/function_4.php'" class="<?if($sNum=="05"){?>active<?}?>">부문위원회 세미나</button>
			<button type="button" onclick="location.href='/function/function_6.php'" class="<?if($sNum=="06"){?>active<?}?>">초록집 모음</button>
			<button type="button" onclick="location.href='/member/login_nomember.php'" class="<?if($sNum=="07"){?>active<?}?>">확인서/영수증</button>
		</div>
	</div>
	<div class="abstract-wrap">
        <IFRAME src="https://www.dbpia.co.kr/Society?pubId=11046&pid=2641&F=Y" width="100%" height="1600" border="0" frameBorder="0" marginWidth="0" marginHeight="0"></IFRAME>
	</div>
</div>
<?php include_once ('../_tail.php'); ?>