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

$arrGroupCategory = getPolyCategoryOption("학회임원");
$arrMemberOfficerInfo = infoOfficerMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]),$_REQUEST["o_id"]);

// DB해제
SetDisConn ( $dblink );
?>
    <div class="container">
        <div class="title">경력 추가</div>
        <div class="inbox write_tbl mo_break_write">
            <form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkForm(this)">
                <?php if($_GET['mode'] == "edit"): ?>
                    <input type="hidden" name="evnMode" value="edit_pop">
                    <input type="hidden" name="o_id" value="<?= $_REQUEST['o_id']?>">
                <?php else: ?>
                    <input type="hidden" name="evnMode" value="insert_pop">
                <?php endif; ?>
                <input type="hidden" name="evnPopMode" value="executive">
                <input type="hidden" name="memberid" value="<?php echo isset($_GET['memberid']) ? $_GET['memberid'] : ''; ?>">
                <input type="hidden" name="rt_url" value="<?php echo $_SERVER['REQUEST_URI']?>">
                <table>
                    <colgroup>
                        <col width="150">
                        <col width="*">
                    </colgroup>
                    <tr>
                        <th>임원 구분</th>
                        <td><div class="inputs">
                                <select name="o_group">
                                    <option value="">선택</option>
                                    <?php foreach($arrGroupCategory as $code => $name): ?>
                                        <option value="<?=$name?>" <?=$name==$arrMemberOfficerInfo["list"]["o_group"]?" selected":""?>><?=$name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div> </td>
                    <tr>
                    <tr>
                        <th>참고</th>
                        <td>
                            <div class="inputs">
                                <input type="text" class="w4" name="o_sub" maxlength="50" value="<?php echo $arrMemberOfficerInfo["list"]["o_sub"]?>"> * 평의원 일때) 35대, 36대...
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>직책</th>
                        <td>
                            <div class="inputs">
                                <input type="text" class="w4" name="o_role" maxlength="50" value="<?php echo $arrMemberOfficerInfo["list"]["o_role"]?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>약력</th>
                        <td>
                            <div class="inputs">
                                <textarea class="w4" name="o_biography" rows="4" cols="50"><?php echo $arrMemberOfficerInfo["list"]["o_biography"]?></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>임기</th>
                        <td>
                            <input type="text" name="o_dutyfrom" id="o_dutyfrom" class="date-picker" readonly value="<?=$arrMemberOfficerInfo["list"]['o_dutyfrom']?>"> ~
                            <input type="text" name="o_dutyto" id="o_dutyto" class="date-picker" readonly value="<?=$arrMemberOfficerInfo["list"]['o_dutyto']?>">
                            <input type="checkbox" id="lifetime" name="lifetime" <?=($arrMemberOfficerInfo["list"]['o_dutyto'] == '9999-12-31') ? 'checked' : '' ?>>
                            <label for="lifetime">종신</label>
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

    <script>
        $(function() {
            // 날짜 형식 설정
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd',
                prevText: '이전 달',
                nextText: '다음 달',
                monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
                dayNames: ['일', '월', '화', '수', '목', '금', '토'],
                dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
                dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
                showMonthAfterYear: true,
                yearSuffix: '년'
            });

            $("#o_dutyfrom").datepicker({
                dateFormat: 'yy-mm-dd', // 2025-04-04 형식으로 설정
                onSelect: function(selectedDate) {
                    // 시작일이 선택되면 종료일의 최소 날짜를 설정
                    $("#o_dutyto").datepicker("option", "minDate", selectedDate);
                }
            });
            $("#o_dutyto").datepicker({
                dateFormat: 'yy-mm-dd', // 2025-04-04 형식으로 설정
                onSelect: function(selectedDate) {
                    // 종료일이 선택되면 시작일의 최대 날짜를 설정
                    $("#o_dutyfrom").datepicker("option", "maxDate", selectedDate);
                }
            });
        });

        // 종신 체크박스 이벤트 처리
        $("#lifetime").on('change', function() {
            if($(this).is(':checked')) {
                // 종신 선택 시 9999-12-31로 설정하고 readonly 속성 사용
                $("#o_dutyto").val('9999-12-31').attr('readonly', true);
            } else {
                // 체크 해제 시 값 초기화하고 readonly 해제
                $("#o_dutyto").val('').attr('readonly', false);
            }
        });

        // 페이지 로드 시 종신 체크박스 상태에 따라 초기화
        $(document).ready(function() {
            if($("#lifetime").is(':checked')) {
                $("#o_dutyto").attr('readonly', true);
            }
        });
    </script>
<?php include("pub/inc/footer.php") ?>