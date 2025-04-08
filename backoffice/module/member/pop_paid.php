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

$arrAccountItems = getAccountItems();
$arrCodeCategory = getPolyCategoryOption("회원구분");
$arrPaidMember = infoPaidMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]),$_REQUEST["p_id"]);

// DB해제
SetDisConn ( $dblink );
?>
	<div class="container">
		<div class="title">납부 내역 입력</div>
		<div class="inbox write_tbl mo_break_write">
			<form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkForm(this)">
				<?php if($_GET['mode'] == "edit"): ?>
					<input type="hidden" name="evnMode" value="edit_pop">
					<input type="hidden" name="p_id" value="<?= $_REQUEST['p_id']?>">
				<?php else: ?>
					<input type="hidden" name="evnMode" value="insert_pop">
				<?php endif; ?>
				<input type="hidden" name="evnPopMode" value="paid">
				<input type="hidden" name="memberid" value="<?php echo isset($_GET['memberid']) ? $_GET['memberid'] : ''; ?>">
				<input type="hidden" name="rt_url" value="<?php echo $_SERVER['REQUEST_URI']?>">
				<table>
					<colgroup>
						<col width="150">
						<col width="*">
					</colgroup>
					<tr>
						<th>납부항목</th>
						<td><div class="inputs">
                                <select name="i_item" id="i_item" onchange="updateSubValue()">
                                    <option value="">선택</option>
									<?php foreach($arrAccountItems['list'] as $item): ?>
										<?php
										$displayText = $item['i_item'] . (!empty($item['i_sub']) ? "({$item['i_sub']})" : "");
										$savedText = $arrPaidMember["list"]["p_item"];
										$isSelected = (strpos($savedText, $item['i_item']) === 0);
										?>
                                        <option value="<?=$item['i_item']?>"
                                                data-sub="<?=!empty($item['i_sub']) ? $item['i_sub'] : ''?>"
                                                amount="<?=$item['i_cost']?>"
                                                memtype="<?=$item['i_memtype']?>"
											<?=$isSelected ? 'selected' : ''?>>
											<?=$item['i_item']?><?=!empty($item['i_sub']) ? "({$item['i_sub']})" : ""?> <?=number_format($item['i_cost'])?>원
                                        </option>
									<?php endforeach; ?>
                                </select>
                                <input type="hidden" name="i_sub" id="i_sub" value="">
							</div> </td>
					<tr>
					<tr>
						<th>대상회원구분</th>
						<td>
							<div class="inputs">
                                <div class="checkbox-group">
									<?php foreach($arrCodeCategory as $code => $name): ?>
                                        <label class="checkbox-item">
                                            <input type="checkbox" name="p_memtype[]" value="<?=$code?>"
												<?=(strpos($arrPaidMember["list"]["i_memtype"], $code) !== false) ? 'checked' : ''?>>
											<?=$name?>
                                        </label>
									<?php endforeach; ?>
                                </div>
							</div>
						</td>
					</tr>
					<tr>
						<th>납부일</th>
						<td>
							<input type="text" name="p_paid" id="p_paid" class="date-picker" readonly value="<?=$arrPaidMember["list"]['p_paid']?>">
						</td>
					</tr>
					<tr>
						<th>납부금액</th>
						<td>
							<div class="inputs">
                                <input type="text" class="w4" name="p_pay" maxlength="50" value="<?php echo $arrPaidMember["list"]["p_pay"]?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
							</div>
						</td>
					</tr>
					<tr>
						<th>대상기간</th>
						<td>
							<input type="text" name="p_validfrom" id="p_validfrom" class="date-picker" readonly value="<?=$arrPaidMember["list"]['p_validfrom']?>"> ~
							<input type="text" name="p_validto" id="p_validto" class="date-picker" readonly value="<?=$arrPaidMember["list"]['p_validto']?>">
						</td>
					</tr>
					<tr>
						<th>비고</th>
						<td>
							<div class="inputs">
								<textarea class="w4" name="p_remark" rows="4" cols="50"><?php echo $arrPaidMember["list"]["p_remark"]?></textarea>
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
    <script>
        function updateSubValue() {
            var selectElement = document.getElementById('i_item');
            var subInput = document.getElementById('i_sub');
            var selectedOption = selectElement.options[selectElement.selectedIndex];

            // 선택된 옵션에서 data-sub 속성 값을 가져와 hidden input에 설정
            if(selectedOption && selectedOption.value) {
                subInput.value = selectedOption.getAttribute('data-sub') || '';
            } else {
                subInput.value = '';
            }
        }

        // 페이지 로드 시 초기값 설정
        document.addEventListener('DOMContentLoaded', function() {
            updateSubValue();
        });
        $(document).ready(function() {
            // Override the niceSelect function to do nothing
            $.fn.niceSelect = function() {
                return this;
            };

            // If you need to remove the existing niceSelect elements
            $('.nice-select').remove();
            $('select').show();
        });
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

            // p_validfrom과 p_validto에 대한 datepicker 초기화 추가
            $("#p_validfrom").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(selectedDate) {
                    // 시작일이 선택되면 종료일의 최소 날짜를 설정
                    $("#p_validto").datepicker("option", "minDate", selectedDate);
                }
            });

            $("#p_validto").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(selectedDate) {
                    // 종료일이 선택되면 시작일의 최대 날짜를 설정
                    $("#p_validfrom").datepicker("option", "maxDate", selectedDate);
                }
            });

            $("#p_paid").datepicker({
                dateFormat: 'yy-mm-dd'
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