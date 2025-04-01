<?php include_once('../_head.php'); ?>
<?php $gNum="5"; $sNum="7"; $gName="공지ㆍ안내"; $sName="구인구직"; ?>
<?php include_once ('../_aside.php'); ?>
    <div class="contents inner">
		<?php
		$boardid = "jobs";
		include_once $_SERVER["DOCUMENT_ROOT"]."/module/board/board.php";
		?>
    </div>
<?php include_once ('../_tail.php'); ?>