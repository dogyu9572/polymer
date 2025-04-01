<?php include_once('../_head.php'); ?>
<?php $gNum="5"; $sNum="4"; $gName="공지ㆍ안내"; $sName="회원동정"; ?>
<?php include_once ('../_aside.php'); ?>
    <div class="contents inner">
		<?php
		$boardid = "members";
		include_once $_SERVER["DOCUMENT_ROOT"]."/module/board/board.php";
		?>
    </div>
<?php include_once ('../_tail.php'); ?>