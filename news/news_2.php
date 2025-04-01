<?php include_once('../_head.php'); ?>
<?php $gNum="5"; $sNum="2"; $gName="공지ㆍ안내"; $sName="학회소식"; ?>
<?php include_once ('../_aside.php'); ?>
    <div class="contents inner">
		<?php
		$boardid = "news";
		include_once $_SERVER["DOCUMENT_ROOT"]."/module/board/board.php";
		?>
    </div>
<?php include_once ('../_tail.php'); ?>