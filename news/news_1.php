<?php include_once ('../_head.php'); ?>
<?php $gNum="5"; $sNum="1"; $gName="공지ㆍ안내"; $sName="공지사항"; ?>
<?php include_once ('../_aside.php'); ?>
<div class="contents inner">
    <?php
    $boardid = "notice";
    include_once $_SERVER["DOCUMENT_ROOT"]."/module/board/board.php";
    ?>
</div>
<?php include_once ('../_tail.php'); ?>