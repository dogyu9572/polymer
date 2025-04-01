<?php include_once('../_head.php'); ?>
<?php $gNum="5"; $sNum="6"; $gName="공지ㆍ안내"; $sName="정보마당"; ?>
<?php include_once ('../_aside.php'); ?>
    <div class="contents inner">
		<?php
		$boardid = "inforum";
		include_once $_SERVER["DOCUMENT_ROOT"]."/module/board/board.php";
		?>
    </div>
<?php include_once ('../_tail.php'); ?>