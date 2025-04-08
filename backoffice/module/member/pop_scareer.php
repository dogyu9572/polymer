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
// DB해제
SetDisConn ( $dblink );
?>
    <div class="container">
        <div class="title">경력 추가</div>
        <div class="inbox write_tbl mo_break_write">
            <form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkForm(this)">
                <?php if($_GET['mode'] == "edit"): ?>
                    <input type="hidden" name="evnMode" value="edit_pop">
                    <input type="hidden" name="old_fyear" value="<?php echo $_GET['fyear']; ?>">
                    <input type="hidden" name="old_tyear" value="<?php echo $_GET['tyear']; ?>">
                    <input type="hidden" name="old_affiliation" value="<?php echo $_GET['affiliation']; ?>">
                    <input type="hidden" name="old_description" value="<?php echo $_GET['description']; ?>">
                <?php else: ?>
                    <input type="hidden" name="evnMode" value="insert_pop">
                <?php endif; ?>
                <input type="hidden" name="evnPopMode" value="scareer">
                <input type="hidden" name="memberid" value="<?php echo isset($_GET['memberid']) ? $_GET['memberid'] : ''; ?>">
                <input type="hidden" name="rt_url" value="<?php echo $_SERVER['REQUEST_URI']?>">
                <table>
                    <colgroup>
                        <col width="150">
                        <col width="*">
                    </colgroup>
                    <tr>
                        <th>기간</th>
                        <td><div class="inputs">
                            <select name="fyear">
                                <option value="">선택</option>
                                <?php
                                $currentYear = date('Y');
                                for ($i = $currentYear; $i >= ($currentYear - 30); $i--) {
                                    $selected = (isset($_GET["fyear"]) && $_GET["fyear"] == $i) ? "selected" : "";
                                    echo "<option value=\"{$i}\" {$selected}>{$i}</option>";
                                }
                                ?>
                            </select><em> ~ </em>
                            <select name="tyear">
                                <option value="">선택</option>
                                <?php
                                $currentYear = date('Y');
                                for ($i = $currentYear; $i >= ($currentYear - 30); $i--) {
                                    $selected = (isset($_GET["tyear"]) && $_GET["tyear"] == $i) ? "selected" : "";
                                    echo "<option value=\"{$i}\" {$selected}>{$i}</option>";
                                }
                                ?>
                            </select>
                            </div> </td>
                    <tr>
                    <tr>
                        <th>기관명</th>
                        <td>
                            <div class="inputs">
                                <input type="text" class="w4" name="affiliation" maxlength="50" value="<?php echo $_GET["affiliation"]?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td>
                            <div class="inputs">
                                <textarea class="w4" name="description" rows="4" cols="50"><?php echo $_GET["description"]?></textarea>
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