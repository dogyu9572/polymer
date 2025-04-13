<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/pop_top.php";

include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/account.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/board/board.lib.php";

if (! in_array ( "member_manage", $_SESSION [$_SITE ["DOMAIN"]] ["ADMIN"] ["AUTH"] ) && $_SESSION [$_SITE ["DOMAIN"]] ["ADMIN"] ["GRADE"] != "ROOT") :
    jsMsg ( "권한이 없습니다." );
    jsHistory ( "-1" );

endif;

// DB연결
$dblink = SetConn ( $_conf_db ["main_db"] );

$subQuery = "";

$arrList = getPolyCategoryOption("전공코드" ,  mysqli_real_escape_string ( $GLOBALS ['dblink'], $_REQUEST ['sw'] ), mysqli_real_escape_string ( $GLOBALS ['dblink'], $_REQUEST ['sk'] ));
// _DEBUG($arrList);

// DB해제
SetDisConn ( $dblink );
?>
    <div class="container">
        <div class="title">학력 추가</div>
        <div class="inbox write_tbl mo_break_write">
            <form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkForm(this)">
                <?php if($_GET['mode'] == "edit"): ?>
                    <input type="hidden" name="evnMode" value="edit_pop">
                    <input type="hidden" name="old_degree" value="<?php echo $_GET['degree']; ?>">
                    <input type="hidden" name="old_dyear" value="<?php echo $_GET['dyear']; ?>">
                    <input type="hidden" name="old_univ" value="<?php echo $_GET['univ']; ?>">
                    <input type="hidden" name="old_department" value="<?php echo $_GET['department']; ?>">
                    <input type="hidden" name="old_major" value="<?php echo $_GET['major']; ?>">

                <?php else: ?>
                    <input type="hidden" name="evnMode" value="insert_pop">
                <?php endif; ?>
                <input type="hidden" name="evnPopMode" value="acareer">
                <input type="hidden" name="memberid" value="<?php echo isset($_GET['memberid']) ? $_GET['memberid'] : ''; ?>">
                <input type="hidden" name="rt_url" value="<?php echo $_SERVER['REQUEST_URI']?>">
                <table>
                    <colgroup>
                        <col width="150">
                        <col width="*">
                    </colgroup>
                    <tr>
                        <th>학위</th>
                        <td>
                            <select name="degree">
                                <option value="">선택</option>
                                <?php foreach($arrDegree as $code => $name): ?>
                                    <option value="<?=$code?>" <?=($_GET["degree"] == $code) ? " selected" : ""?>><?=$name?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    <tr>
                    <tr>
                        <th>학위년도</th>
                        <td>
                            <div class="inputs">
                                <input type="text" class="w4" name="dyear" maxlength="50" value="<?php echo $_GET["dyear"]?>">년
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>대학</th>
                        <td>
                            <div class="inputs">
                                <input type="text" class="w4" name="univ" maxlength="50" value="<?php echo $_GET["univ"]?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>학과</th>
                        <td>
                            <div class="inputs">
                                <input type="text" class="w4" name="department" maxlength="50" value="<?php echo $_GET["department"]?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>전공</th>
                        <td>
                            <div class="inputs">
                                <input type="text" class="w4" name="major" maxlength="50" value="<?php echo $_GET["major"]?>">
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="btns">
                    <button class="btn btn_save" type="submit">저장</button>
                    <button class="btn del" type="button" onclick="window.parent.Fancybox.close()">닫기</button>
                </div>
            </form>
        </div> <!-- //inbox -->
    </div>

<?php include("pub/inc/footer.php") ?>