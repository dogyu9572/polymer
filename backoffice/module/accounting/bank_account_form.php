<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/admin_top.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/module/admin/menu.php";

include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/account.lib.php";
if(!in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

// 수정 모드일 때 계좌 정보 가져오기
$mode = isset($_REQUEST["mode"]) ? $_REQUEST["mode"] : "insert";
$a_idx = isset($_REQUEST["a_idx"]) ? $_REQUEST["a_idx"] : "";
$bankInfo = [];

if($mode == "update" && $a_idx) {
	$bankInfo = getAccountBankByIdx($a_idx);
}

//DB해제
SetDisConn($dblink);
?>
	<script language="javascript">
        function checkForm(frm){
            // 계좌명 검증
            if (frm.a_accountname.value.trim() == ""){
                alert("계좌명을 입력해 주세요.");
                frm.a_accountname.focus();
                return false;
            }

            // 은행명 검증
            if (frm.a_bank.value.trim() == ""){
                alert("은행명을 입력해 주세요.");
                frm.a_bank.focus();
                return false;
            }

            // 계좌번호 검증
            if (frm.a_number.value.trim() == ""){
                alert("계좌번호를 입력해 주세요.");
                frm.a_number.focus();
                return false;
            }

            // 예금주 검증
            if (frm.a_holder.value.trim() == ""){
                alert("예금주를 입력해 주세요.");
                frm.a_holder.focus();
                return false;
            }

            return true;
        }

        function inNumber(str){
            // 숫자만 입력
            str.value = str.value.replace(/[^0-9]/g,"");
        }
	</script>
	<div class="container">
		<div class="title"><?php echo ($mode == "update") ? "계좌 수정" : "계좌 등록"; ?></div>

		<div class="inbox write_tbl mo_break_write">
			<form name="accountForm" method="post" action="bank_account_proc.php" onsubmit="return checkForm(this)">
				<input type="hidden" name="mode" value="<?php echo $mode; ?>">
				<input type="hidden" name="a_idx" value="<?php echo $a_idx; ?>">
				<input type="hidden" name="rt_url" value="bank_account.php">

				<div class="tit">계좌 정보 <i>*</i></div>
				<table>
					<tr>
						<th>계좌명 <i>*</i></th>
						<td>
							<div class="inputs">
								<input type="text" class="w3" name="a_accountname" maxlength="100" value="<?php echo isset($bankInfo['a_accountname']) ? $bankInfo['a_accountname'] : ''; ?>">
							</div>
						</td>
					</tr>
					<tr>
						<th>은행명 <i>*</i></th>
						<td>
							<div class="inputs">
								<input type="text" class="w3" name="a_bank" maxlength="50" value="<?php echo isset($bankInfo['a_bank']) ? $bankInfo['a_bank'] : ''; ?>">
							</div>
						</td>
					</tr>
					<tr>
						<th>계좌번호 <i>*</i></th>
						<td>
							<div class="inputs">
								<input type="text" class="w3" name="a_number" maxlength="50" value="<?php echo isset($bankInfo['a_number']) ? $bankInfo['a_number'] : ''; ?>" onkeyup="inNumber(this)">
							</div>
						</td>
					</tr>
					<tr>
						<th>예금주 <i>*</i></th>
						<td>
							<div class="inputs">
								<input type="text" class="w3" name="a_holder" maxlength="50" value="<?php echo isset($bankInfo['a_holder']) ? $bankInfo['a_holder'] : ''; ?>">
							</div>
						</td>
					</tr>
                    <tr>
                        <th>결제용도</th>
                        <td>
                            <div class="inputs">
								<?php
								$purpose_options = ['회비', '참가비', '저널', '세미나', '부분 위원회', '기타'];
								$selected_purposes = isset($bankInfo['a_purpose']) ? explode(',', $bankInfo['a_purpose']) : [];

								foreach($purpose_options as $option) {
									$checked = in_array($option, $selected_purposes) ? 'checked' : '';
									echo "<label class=\"check\"><input type=\"checkbox\" name=\"purpose[]\" value=\"{$option}\" {$checked}><i></i>{$option}</label>";
								}
								?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>사용여부</th>
                        <td>
                            <div class="inputs">
                                <label class="radio"><input type="radio" name="a_active" value="1" <?php echo (!isset($bankInfo['a_active']) || $bankInfo['a_active'] == 1) ? 'checked' : ''; ?>><i></i>사용</label>
                                <label class="radio"><input type="radio" name="a_active" value="0" <?php echo (isset($bankInfo['a_active']) && $bankInfo['a_active'] == 0) ? 'checked' : ''; ?>><i></i>미사용</label>
                            </div>
                        </td>
                    </tr>
				</table>

				<div class="btns">
					<a href="bank_account.php" class="btn btn_list">목록보기</a>
					<button class="btn btn_save" type="submit">저장</button>
				</div>
			</form>
		</div> <!-- //inbox -->
	</div>
	<script type="text/javascript">
        $(document).ready(function(){
            document.querySelector('.container').style.display = 'block';
        });
	</script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/footer.php";
?>