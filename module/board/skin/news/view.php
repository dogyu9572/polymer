<?if($_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"] && $_SERVER["PHP_SELF"]=="/backoffice/module/board/board_view.php"){
if(!in_array("biz_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;
###################################################### 관리자 페이지 ######################################################?>
<script language="javascript">
function fileDownload(boardid,b_idx,idx){
	obj = window.open("/module/board/download.php?boardid="+boardid+"&b_idx="+b_idx+"&idx="+idx,"urlCheck","width=100,height=100,menubars=0, toolbars=0");
}
<?
//댓글 사용시
if($arrBoardInfo["list"][0]["usememo"]=="Y"){
?>
function checkComment(frm){
	<?if(!$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]){?>
	alert("로그인을 하셔야 댓글입력이 가능합니다.");
	return false;
	
	<?}else if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["LEVEL"] >= $arrBoardInfo["list"][0]["replylevel"]){?>
	if (frm.comment.value==""){
		alert("댓글 내용을 입력해 주세요.");
		frm.comment.focus();
		return false;
	}
	<?}else{?>
	alert("<?=$arrLevelInfo[$arrBoardInfo["list"][0]["replylevel"]]?> 이상 댓글입력이 가능합니다.");
	return false;
	<?}?>
}
<?
}
//댓글 사용시
?>
</script>
<script type="text/javascript">
<!--
function boardDel(val){	
	if(confirm("삭제 하시겠습니까?")) {
		$.post("/module/board/ajax_board_del.php", { evnMode: "delete", g_idx: val, boardid: "<?=$arrBoardInfo["list"][0]["boardid"]?>" },
		function(data){		
			//alert(data);
			doLoad();
		});
	}
}
function doLoad(){	
	location.href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&sk=<?=$_GET['sk']?>&sw=<?=$_GET['sw']?>&offset=<?=$_GET['offset']?>&category=<?=$_GET['category']?>";
}	
//-->
</script>
<div id="admin-content">
	<h2 class="admin-title"><?=$arrBoardInfo["list"][0]["boardname"]?> - View</h2>
	<table class="viewTable">
		<colgroup><col width="110px" /><col width="*" /><col width="110px" /><col width="20%" /><col width="110px" /><col width="20%" /></colgroup>
		<thead>
		<tr>
			<th colspan="6"><?=stripslashes($arrBoardArticle["list"][0]['subject'])?></th>
		</tr>
		</thead>
		<tbody>
			<tr>
			<th>작성자</th>
			<td><?=stripslashes($arrBoardArticle["list"][0]['name'])?></td>
			<th>조회수</th>
			<td colspan="3"><?=number_format($arrBoardArticle["list"][0]['hit'])?></td>
		</tr>
		<tr>
			<td class="ct" colspan="6">
				<div style="min-height:100px;"><?=stripslashes($arrBoardArticle["list"][0]['contents'])?></div>
			</td>
		</tr>
		<tr>
			<th>키워드</th>
			<td colspan="5">
			<?=stripslashes($arrBoardArticle["list"][0]['etc_1'])?>
			</td>
		</tr>
		<tr>
			<th>첨부파일</th>
			<td colspan="5" class="file">
			<?for($i=0;$i<$arrBoardArticle["total_files"];$i++){?>
			<a href="javascript:void(0);" onclick="fileDownload('<?=$arrBoardArticle["files"][$i]['boardid']?>','<?=$arrBoardArticle["files"][$i]['b_idx']?>','<?=$arrBoardArticle["files"][$i]['idx']?>');"><?=$arrBoardArticle["files"][$i]['ori_name']?></a>
			<?}?>
			<?if($i<1){?>
			첨부파일이 없습니다.
			<?}?>	
			</td>
		</tr>
			<tr>
			<th>등록일시</th>
			<td><?=$arrBoardArticle["list"][0]['wdate']?></td>
			<th>등록IP</th>
			<td colspan="3"><?=stripslashes($arrBoardArticle["list"][0]['ip'])?></td>
		</tr>
		</tbody>
	</table>
	<p class="btn_l">
		<a href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&sk=<?=$_GET['sk']?>&sw=<?=$_GET['sw']?>&offset=<?=$_GET['offset']?>&category=<?=$_GET['category']?>" class="btn_box act_list">목록보기</a>
	</p>
	<p class="btn_r">
		<a href="javascript:void(0);" onclick="boardDel(<?=$arrBoardArticle["list"][0]['idx']?>)" class="btn_box black act_del">삭제</a>
		<a href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=modify&idx=<?=$arrBoardArticle["list"][0]['idx']?>&category=<?=$_GET['category']?>" class="btn_box act_upt">수정</a>		
	</p>
	<dl class="more_list">
		<dt>이전글</dt><dd><?if($arrBoardArticle["prev"]["idx"] !=0):?><a href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=view&idx=<?=$arrBoardArticle["prev"]["idx"]?>&category=<?=$_GET['category']?>" title="<?=$arrBoardArticle["prev"]["subject"]?>" class="act_view"><?=text_cut($arrBoardArticle["prev"]["subject"],$arrBoardInfo["list"][0]['subjectcut'])?></a><?else:?><a href="javascript:void(0);">이전글이 없습니다.</a><?endif;?></dd>
		<dt>다음글</dt><dd><?if($arrBoardArticle["next"]["idx"] !=0):?><a href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=view&idx=<?=$arrBoardArticle["next"]["idx"]?>&category=<?=$_GET['category']?>" title="<?=$arrBoardArticle["next"]["subject"]?>" class="act_view"><?=text_cut($arrBoardArticle["next"]["subject"],$arrBoardInfo["list"][0]['subjectcut'])?></a><?else:?><a href="javascript:void(0);">다음글이 없습니다.</a><?endif;?></dd>
	</dl> 
</div>
<?}else{###################################################### 사용자 페이지 ######################################################?>
    <script language="javascript">
        function fileDownload(boardid,b_idx,idx,fnm){
            var exn = fnm.split(".");
            exn = exn[1].toLowerCase();
            if(exn=="jpg" || exn=="gif" || exn=="png" || exn=="bmp"){
                obj = window.open("/module/board/download.php?boardid="+boardid+"&b_idx="+b_idx+"&idx="+idx,"urlCheck","width=100,height=100,menubars=0, toolbars=0");
            }else{
                document.fileFrm.boardid.value=boardid;
                document.fileFrm.b_idx.value=b_idx;
                document.fileFrm.idx.value=idx;
                document.fileFrm.target="fileFrame";
                document.fileFrm.submit();
            }
        }
    </script>
    <iframe name="fileFrame" style="display:none;"></iframe>
    <form name="fileFrm" action="/module/board/download.php"/>
    <input type="hidden" name="boardid"/>
    <input type="hidden" name="b_idx"/>
    <input type="hidden" name="idx"/>
    </form>
    <div class="board-title">
        <p class="heading3"><?=stripslashes($arrBoardArticle["list"][0]['subject'])?></p>
        <div class="info">
            <p><span class="t-secondary t-divide">작성자</span><?=stripslashes($arrBoardArticle["list"][0]['name'])?></p>
            <p><span class="t-secondary t-divide">작성일</span><?=date('Y.m.d', strtotime($arrBoardArticle["list"][0]['wdate']))?></p>
            <p><span class="t-secondary t-divide">조회수</span><?=$arrBoardArticle["list"][0]['hit']?></p>
        </div>
    </div>
    <div class="brd-content no-bottom">
        <div class="con">
            <?=stripslashes($arrBoardArticle["list"][0]['contents'])?>
        </div>
        <div class="attached">
            <?php
            if($arrBoardArticle["total_files"] > 0) {
                for($i=0; $i<$arrBoardArticle["total_files"]; $i++) {
                    echo '<a href="javascript:void(0);" onclick="fileDownload(\''.$arrBoardArticle["files"][$i]['boardid'].'\',\''.$arrBoardArticle["files"][$i]['b_idx'].'\',\''.$arrBoardArticle["files"][$i]['idx'].'\',\''.$arrBoardArticle["files"][$i]['ori_name'].'\');">'.$arrBoardArticle["files"][$i]['ori_name'].'</a>';
                }
            } else {
                echo '첨부파일이 없습니다.';
            }
            ?>
        </div>
        <div class="prevnext">
            <dl class="prev">
                <dt>이전 글</dt>
                <dd>
                    <?php if ($arrBoardArticle["prev"]["idx"] != 0) { ?>
                        <a href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=view&idx=<?=$arrBoardArticle["prev"]["idx"]?>&category=<?=$_GET['category']?>">
                            <?=text_cut($arrBoardArticle["prev"]["subject"], $arrBoardInfo["list"][0]['subjectcut'])?>
                        </a>
                    <?php } else { ?>
                        <a href="javascript:void(0);" class="disabled">이전글이 없습니다.</a>
                    <?php } ?>
                </dd>
            </dl>
            <dl class="next">
                <dt>다음 글</dt>
                <dd>
                    <?php if ($arrBoardArticle["next"]["idx"] != 0) { ?>
                        <a href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=view&idx=<?=$arrBoardArticle["next"]["idx"]?>&category=<?=$_GET['category']?>">
                            <?=text_cut($arrBoardArticle["next"]["subject"], $arrBoardInfo["list"][0]['subjectcut'])?>
                        </a>
                    <?php } else { ?>
                        <a href="javascript:void(0);" class="disabled">다음글이 없습니다.</a>
                    <?php } ?>
                </dd>
            </dl>
        </div>
    </div>
    <div class="t-center">
        <a href="<?=$_SERVER["PHP_SELF"]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&sk=<?=$_GET['sk']?>&sw=<?=$_GET['sw']?>&offset=<?=$_GET['offset']?>&category=<?=$_GET['category']?>"class="btn-rg outline-dark w-22">목록으로</a>
    </div>
<?}###################################################### 사용자 페이지 ###################################################### END ?>