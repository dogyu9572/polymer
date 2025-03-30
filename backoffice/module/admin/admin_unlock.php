<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/admin_top.php";
include "./menu.php";

if(!in_array("admin_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
    jsMsg("권한이 없습니다.");
    jsHistory("-1");
endif;

$scale="20";
$offset = "0";
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

// admin_unlock.php 파일의 쿼리 부분 수정
$where = "and is_locked = 'Y'";
$arrList = getArticleList($_conf_tbl["admin"], $scale, postNullCheck('offset'), $where);

//_DEBUG($arrMenuList);

//DB해제
SetDisConn($dblink);
?>
    <script language="javascript">
        function delAdmin(idx) {
            if (!idx) {
                alert("관리자 ID가 유효하지 않습니다.");
                return;
            }

            if (confirm("이 관리자를 삭제 하시겠습니까?")) {
                var form = document.frmBBSHidden;  // 이름으로 직접 접근
                if (!form) {
                    alert("삭제 처리할 수 없습니다.");
                    return;
                }
                form.idx.value = idx;
                form.submit();
            }
        }
        function CheckForm(frm){
            if (frm.id.value==""){
                alert("ID 를 입력하여 주십시요.");
                frm.id.focus();
                return false;
            }
            if (frm.id.value.length < 2 || frm.id.value.length > 20) {
                alert("ID는 2~20자리입니다.");
                frm.id.focus();
                return false;
            }
            if (hangul_chk(frm.id.value) != true ){
                alert("ID에 한글이나 여백은 사용할 수 없습니다.");
                frm.id.focus();
                return false;
            }
            frm.submit();

        }
        function unlockAdmin(idx) {
            if (!idx) {
                alert("관리자 ID가 유효하지 않습니다.");
                return;
            }

            if (confirm("이 관리자의 차단을 해제하시겠습니까?")) {
                var form = document.frmBBSHidden;
                if (!form) {
                    alert("차단 해제를 처리할 수 없습니다.");
                    return;
                }
                form.evnMode.value = "unlockAdmin"; // evnMode 값을 변경
                form.idx.value = idx;
                form.submit();
            }
        }
    </script>
    <div class="container">
        <form name="frmBBSHidden" id="frmBBSHidden" method="post" action="admin_evn.php">
            <input type="hidden" name="evnMode" value="unlockAdmin">
            <input type="hidden" name="idx">
        </form>
        <div class="title">로그인 차단 해제</div>

        <div class="inbox">
            <!-- over_tbl : 테이블을 좌우로 스크롤 할 때 사용합니다. -->
            <!-- mo_break_tbl : 767px 이하에서 테이블 구조를 깰 때 사용합니다. -->
            <div class="over_tbl mo_break_tbl">
                <div class="bdr_list tac">
                    <table>
                        <colgroup class="pc_vw">
                            <col class="w4p">
                            <col class="w10p">
                            <col class="w10p">
                            <col class="w10p">
                            <col class="w10p">
                            <col class="w12p">
                            <col class="w10p">
                        </colgroup>
                        <thead>
                        <tr>
                            <th class="pc_vw">No.</th>
                            <th class="pc_vw">관리자권한</th>
                            <th class="pc_vw">ID</th>
                            <th class="pc_vw">이름</th>
                            <th class="pc_vw">로그인 시도 IP</th>
                            <th class="pc_vw">로그인 시도 일시</th>
                            <th class="pc_vw">차단 해제</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($arrList['list']['total'] > 0){
                            for ($i=0;$i<$arrList['list']['total'];$i++){
                                ?>
                                <tr>
                                    <td><i class="mo_vw">No.</i><?=number_format($arrList['total']-$i-$offset)?></td>
                                    <td><i class="mo_vw">권한</i><?=$arrAdminGrade[$arrList['list'][$i]['a_grade']]?></td>
                                    <td><i class="mo_vw"><a href="admin_info.php?idx=<?=$arrList['list'][$i]['idx']?>" class="linktxt">관리자ID</i><?=$arrList['list'][$i]['a_id']?></a></td>
                                    <td><i class="mo_vw">이름</i><?=$arrList['list'][$i]['a_name']?></td>
                                    <td><i class="mo_vw">로그인 시도 IP</i><?=$arrList['list'][$i]['locked_ip']?></td>
                                    <td><i class="mo_vw">로그인 시도 일시</i><?=$arrList['list'][$i]['locked_datetime']?></td>
                                    <td class="mono_btm"><i class="mo_vw">관리</i>
                                        <div class="btns">
                                            <button type="button" class="btn" onclick="unlockAdmin('<?=$arrList['list'][$i]['idx']?>');">차단해제</button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            } // for 루프 닫기
                        } else {
                            ?>

                            <tr height="100">
                                <td width="100%" colspan="7" >차단된 관리자가 없습니다.</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bdr_btm">
                <div class="bdr_btm">
                    <div class="paging">
                        <?=pageNavigationBackoffice($arrList['total'],$scale,$pagescale,$offset,"")?>
                    </div>
                    <!-- <div class="btns">
                                    <form name="frmBBS" method="post" action="admin_evn.php">
                                    <input type="hidden" name="evnMode" value="createAdmin">
                                    <div>
                                        <label for="id">신규 관리자 ID :</label>
                                        <input type="text" name="id" id="id" maxlength="20" style="width:160px;" class="input"/>
                                    </div>
                                    </form>
                                    <a href="javascript:void(0);" class="btn" onclick="CheckForm(document.frmBBS)">신규등록</a>
                                </div> -->
                </div>
            </div>

        </div>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/footer.php"; ?>