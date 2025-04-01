<?php include_once('../_head.php'); ?>
<?php $gNum="5"; $sNum="3"; $gName="공지ㆍ안내"; $sName="지부/부문위원회 소식"; ?>
<?php include_once ('../_aside.php'); ?>
    <div class="contents inner">
		<?php
		$boardid = "branch";
		include_once $_SERVER["DOCUMENT_ROOT"]."/module/board/board.php";
		?>
    </div>
<?php include_once ('../_tail.php'); ?>