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
$arrAccountBank = getAccountBank();
$arrInfo = getUserInfo(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]));
$arrTransactionInfo = infoTransactionMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]),$_REQUEST["t_orderno"]);

// 현재 날짜와 시간을 가져오기
$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');

// 기본값 배열 초기화
$formData = [
	't_orderno' => '',
	't_name' => isset($arrInfo['list'][0]['namek']) ? $arrInfo['list'][0]['namek'] : '',
	't_affiliation' => isset($arrInfo['list'][0]['affiliation']) ? $arrInfo['list'][0]['affiliation'] : '',
	't_email' => isset($arrInfo['list'][0]['email']) ? $arrInfo['list'][0]['email'] : '',
	't_phone' => isset($arrInfo['list'][0]['phone']) ? $arrInfo['list'][0]['phone'] : '',
	't_cphone' => isset($arrInfo['list'][0]['cphone']) ? $arrInfo['list'][0]['cphone'] : '',
	't_remark' => '',
	'pay_date' => $currentDate,
	'pay_time' => $currentTime
];

// 수정 모드인 경우 데이터 덮어쓰기
if ($_GET['mode'] == "edit" && !empty($arrTransactionInfo)) {
	$formData = array_merge($formData, [
		't_orderno' => $arrTransactionInfo['list']['t_orderno'],
		't_name' => $arrTransactionInfo['list']['t_name'],
		't_affiliation' => $arrTransactionInfo['list']['t_affiliation'],
		't_email' => $arrTransactionInfo['list']['t_email'],
		't_phone' => $arrTransactionInfo['list']['t_phone'],
		't_cphone' => $arrTransactionInfo['list']['t_cphone'],
		't_remark' => $arrTransactionInfo['list']['t_remark'],
		't_method' => $arrTransactionInfo['list']['t_method'],
		't_account' => $arrTransactionInfo['list']['t_account'],
        't_itemxml' => $arrTransactionInfo['list']['t_itemxml'],
		't_amount'  => $arrTransactionInfo['list']['t_amount'],
		't_paid'   => $arrTransactionInfo['list']['t_paid'],
		'pay_date' => isset($arrTransactionInfo['list']['t_inserted']) ? date('Y-m-d', strtotime($arrTransactionInfo['list']['t_inserted'])) : $currentDate,
		'pay_time' => isset($arrTransactionInfo['list']['t_inserted']) ? date('H:i:s', strtotime($arrTransactionInfo['list']['t_inserted'])) : $currentTime
	]);
} else {
	// 추가 모드인 경우 주문번호 생성
	$formData['t_orderno'] = getNextOrderNo();
}
// DB해제
SetDisConn ( $dblink );
?>
	<div class="container">
		<div class="title">결제 내역 추가</div>
		<div class="inbox write_tbl mo_break_write">
			<form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkForm(this)">
				<?php if($_GET['mode'] == "edit"): ?>
					<input type="hidden" name="evnMode" value="edit_pop">
					<input type="hidden" name="t_id" value="<?= $_REQUEST['t_id']?>">
				<?php else: ?>
					<input type="hidden" name="evnMode" value="insert_pop">
				<?php endif; ?>
				<input type="hidden" name="evnPopMode" value="transaction">
				<input type="hidden" name="memberid" value="<?php echo isset($_GET['memberid']) ? $_GET['memberid'] : ''; ?>">
				<input type="hidden" name="rt_url" value="<?php echo $_SERVER['REQUEST_URI']?>">
                <input type="hidden" name="t_account_hidden" id="t_account_hidden" value="">
                <input type="hidden" name="t_method_text" id="t_method_text" value="">
				<table>
					<colgroup>
						<col width="150">
						<col width="*">
					</colgroup>
                    <tr>
                        <th>성명(회원구분)</th>
                        <td><div class="inputs"><input type="text" class="w4" name="t_name" maxlength="50" value="<?= $formData['t_name'] ?>"></div></td>
                        <th>주문번호</th>
                        <td><div class="inputs">
								<?php if($_GET['mode'] != "edit"): ?>
									<?= $formData['t_orderno'] ?>
                                    <input type="hidden" name="t_orderno" value="<?= $formData['t_orderno'] ?>">
								<?php else: ?>
                                    <input type="text" class="w4" name="t_orderno" value="<?= $formData['t_orderno'] ?>" readonly>
								<?php endif; ?>
                            </div></td>
                    </tr>
                    <tr>
                        <th>소속</th>
                        <td><div class="inputs"><input type="text" class="w4" name="t_affiliation" maxlength="50" value="<?= $formData['t_affiliation'] ?>"></div></td>
                        <th>이메일</th>
                        <td><div class="inputs"><input type="text" class="w4" name="t_email" maxlength="100" value="<?= $formData['t_email'] ?>"></div></td>
                    </tr>
                    <tr>
                        <th>전화번호</th>
                        <td><div class="inputs"><input type="text" class="w4" name="t_phone" maxlength="50" value="<?= $formData['t_phone'] ?>"></div></td>
                        <th>휴대전화</th>
                        <td><div class="inputs"><input type="text" class="w4" name="t_cphone" maxlength="100" value="<?= $formData['t_cphone'] ?>"></div></td>
                    </tr>
                    <tr>
                        <th>결제방법</th>
                        <td>
                            <div class="inputs">
                                <select name="t_method" class="form-control">
                                    <option value="">선택</option>
									<?php foreach($arrPayType as $key => $value): ?>
                                        <option value="<?= $key ?>" <?= (isset($formData['t_method']) && $formData['t_method'] == $value) ? 'selected' : '' ?>><?= $value ?></option>
									<?php endforeach; ?>
                                </select>
                            </div>
                        </td>
                        <th>계좌/카드</th>
                        <td>
                            <div class="inputs">
								<?php if(isset($formData['t_account'])): ?>
                                    <span id="current_account_info"><?= $formData['t_account'] ?></span>
                                    <input type="hidden" name="t_account_hidden" id="t_account_hidden" value="<?= $formData['t_account'] ?>">
								<?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>요청일시</th>
                        <td><div class="inputs"><?= $formData['pay_date'].' '.$formData['pay_time'] ?></div></td>
                        <th>납부일시</th>
                        <td>
                            (일자 <input type="text" name="pay_date" id="pay_date" value="<?= $formData['pay_date'] ?>">
                            <br>시간 <input type="text" name="pay_time" value="<?= $formData['pay_time'] ?>">)
                        </td>
                    </tr>
                    <tr>
                        <th>결제항목 선택</th>
                        <td colspan="3">
                            <!-- CSRF 토큰 추가 -->
                            <input type="hidden" name="csrf_token" value="<?= isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : md5(uniqid(rand(), true)) ?>">

                            <!-- 모든 항목 데이터를 담을 단일 JSON 필드 -->
                            <input type="hidden" name="items_data" id="items_data" value="">

							<?php if(isset($arrAccountItems['list']) && is_array($arrAccountItems['list'])): ?>
								<?php foreach($arrAccountItems['list'] as $index => $item): ?>
                                    <div style="border-bottom:1px solid #000000; padding:5px 5px 5px 0;">
                                        <!-- 화면 표시용 정보 -->
                                        <input type="hidden" id="item_id_<?=$index?>" value="<?=$item['i_itemid']?>">
                                        <input type="hidden" id="item_name_<?=$index?>" value="<?= htmlspecialchars($item['i_item'].((!empty($item['i_sub'])) ? " ({$item['i_sub']})" : "")) ?>">
                                        <input type="hidden" id="item_cost_<?=$index?>" value="<?=$item['i_cost']?>">

                                        결제완료금액 <input type="text" class="form-control" id="item_paid_<?=$index?>" value="0" style="width:70px;" onchange="updateItemData(<?=$index?>)"><br>

                                        <input type="checkbox" id="item_check_<?=$index?>"
                                               data-amount="<?=$item['i_cost']?>"
                                               data-from="<?=date('Y-m-d')?>"
                                               data-to="<?=date('Y-m-d', strtotime('+2 months'))?>"
                                               data-memberid="<?=isset($_GET['memberid']) ? $_GET['memberid'] : ''?>"
                                               data-name="<?=isset($arrInfo['list'][0]['namek']) ? htmlspecialchars($arrInfo['list'][0]['namek']) : ''?>"
                                               data-affiliation="<?=isset($arrInfo['list'][0]['affiliation']) ? htmlspecialchars($arrInfo['list'][0]['affiliation']) : ''?>"
                                               onclick="toggleItem(<?=$index?>, this.checked)">
                                        <label for="item_check_<?=$index?>"> <?=$item['i_item']?><?= !empty($item['i_sub']) ? " ({$item['i_sub']})" : "" ?> <?=number_format($item['i_cost'])?>원</label>
                                    </div>
								<?php endforeach; ?>
							<?php else: ?>
                                <div class="alert">결제 항목이 없습니다.</div>
							<?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>총 결제금액</th>
                        <td><div class="inputs" id="amount"></div></td>
                        <th>납부액</th>
                        <td><div class="inputs" id="paid">미납</div></td>
                    </tr>
                    <tr>
                        <th>비고</th>
                        <td colspan="3">
                            <div class="inputs">
                                <textarea class="w4" name="p_remark" rows="4" cols="50"><?= isset($formData['t_remark']) ? $formData['t_remark'] : '' ?></textarea>
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
    /**
     * 결제 항목 선택 및 처리를 위한 스크립트
     */
    document.addEventListener('DOMContentLoaded', function() {
        // =============== 전역 변수 및 상수 ===============
        const isEditMode = '<?= $_GET["mode"] ?>' === 'edit';
        const itemXmlData = <?= json_encode(isset($formData["t_itemxml"]) ? $formData["t_itemxml"] : "") ?>;
        let selectedItems = {};

        // =============== 초기화 함수 ===============
        function init() {
            initFormValidation();
            initPaymentMethodHandler();
            initDatePicker();

            // jQuery 관련 설정
            $.fn.niceSelect = function() { return this; };
            $('.nice-select').remove();
            $('select').show();

            // 항목 표시 초기화
            initItemsDisplay();

            // 수정 모드 처리
            if (isEditMode) {
                handleEditMode();
            } else {
                // 모든 항목 표시
                showAllItems();
            }
        }

        // =============== 결제 항목 선택 및 계산 기능 ===============
        /**
         * 체크박스 토글 시 호출되는 함수
         */
        window.toggleItem = function(index, isChecked) {
            const itemElement = document.getElementById('item_check_' + index);
            const paidElement = document.getElementById('item_paid_' + index);

            if (isChecked) {
                // 체크된 경우 항목 정보 저장
                selectedItems[index] = {
                    ItemId: document.getElementById('item_id_' + index).value,
                    ItemName: document.getElementById('item_name_' + index).value,
                    Cost: document.getElementById('item_cost_' + index).value,
                    Quantity: "1",
                    Amount: document.getElementById('item_cost_' + index).value,
                    Paid: document.getElementById('item_cost_' + index).value,
                    From: itemElement.getAttribute('data-from'),
                    To: itemElement.getAttribute('data-to'),
                    For: {
                        MemberId: itemElement.getAttribute('data-memberid'),
                        Name: itemElement.getAttribute('data-name'),
                        Affiliation: itemElement.getAttribute('data-affiliation')
                    },
                    checked: true
                };

                // 결제완료금액 자동 입력
                paidElement.value = document.getElementById('item_cost_' + index).value;
            } else {
                // 체크 해제된 경우 항목 제거
                if (selectedItems[index]) {
                    delete selectedItems[index];
                }

                // 결제완료금액 초기화
                paidElement.value = "0";
            }

            // JSON 형태로 변환하여 hidden 필드에 저장
            document.getElementById('items_data').value = JSON.stringify(selectedItems);

            // 총액 계산
            calculateTotals();
        };

        /**
         * 결제완료금액 수동 변경 시 호출되는 함수
         */
        window.updateItemData = function(index) {
            const isChecked = document.getElementById('item_check_' + index).checked;
            const paidValue = document.getElementById('item_paid_' + index).value;

            if (isChecked && selectedItems[index]) {
                selectedItems[index].Paid = paidValue;
                document.getElementById('items_data').value = JSON.stringify(selectedItems);
                calculateTotals();
            }
        };

        /**
         * 총 결제금액과 납부액 계산 함수
         */
        function calculateTotals() {
            let totalAmount = 0;
            let totalPaid = 0;

            // 선택된 항목 순회
            Object.keys(selectedItems).forEach(index => {
                totalAmount += parseInt(selectedItems[index].Amount) || 0;
                totalPaid += parseInt(selectedItems[index].Paid) || 0;
            });

            // 결과 표시
            updateTotalDisplay(totalAmount, totalPaid);
        }

        /**
         * 총 결제금액과 납부액 화면 업데이트
         */
        function updateTotalDisplay(totalAmount, totalPaid) {
            const allThs = document.querySelectorAll('th');

            // 총 결제금액 업데이트
            allThs.forEach(function(th) {
                if(th.textContent.trim() === '총 결제금액') {
                    const totalAmountElement = th.nextElementSibling.querySelector('.inputs');
                    if(totalAmountElement) {
                        totalAmountElement.innerHTML = formatNumber(totalAmount) + '원';

                        // 숨겨진 input 추가/업데이트
                        let amountInput = totalAmountElement.querySelector('input[name="amount"]');
                        if (!amountInput) {
                            amountInput = document.createElement('input');
                            amountInput.type = 'hidden';
                            amountInput.name = 'amount';
                            totalAmountElement.appendChild(amountInput);
                        }
                        amountInput.value = totalAmount;
                    }
                } else if(th.textContent.trim() === '납부액') {
                    const totalPaidElement = th.nextElementSibling.querySelector('.inputs');
                    if(totalPaidElement) {
                        // 납부액이 0이면 '미납'으로 표시
                        if (totalPaid > 0) {
                            totalPaidElement.innerHTML = formatNumber(totalPaid) + '원';
                        } else {
                            totalPaidElement.innerHTML = '미납';
                        }

                        // 숨겨진 input 추가/업데이트
                        let paidInput = totalPaidElement.querySelector('input[name="paid"]');
                        if (!paidInput) {
                            paidInput = document.createElement('input');
                            paidInput.type = 'hidden';
                            paidInput.name = 'paid';
                            totalPaidElement.appendChild(paidInput);
                        }
                        paidInput.value = totalPaid;
                    }
                }
            });
        }

        /**
         * 숫자 포맷팅 함수
         */
        function formatNumber(number) {
            return new Intl.NumberFormat('ko-KR').format(number);
        }

        // =============== 항목 표시 관련 함수 ===============
        function initItemsDisplay() {
            // 모든 항목 기본값으로 숨김 처리
            document.querySelectorAll('[id^="item_check_"]').forEach(el => {
                const container = el.closest('div');
                if (container) container.style.display = 'none';
            });
        }

        function showAllItems() {
            document.querySelectorAll('[id^="item_check_"]').forEach(el => {
                const container = el.closest('div');
                if (container) container.style.display = 'block';
            });
        }

        // =============== 수정 모드 처리 ===============
        function handleEditMode() {
            if (!itemXmlData) {
                showAllItems();
                return;
            }

            try {
                // XML 문자열 파싱
                const parser = new DOMParser();
                const xmlDoc = parser.parseFromString(itemXmlData, "text/xml");
                const itemElements = xmlDoc.getElementsByTagName('Item');

                processXmlItems(itemElements);

                // 원본 금액 정보 표시
                displayOriginalAmounts();

            } catch (error) {
                console.error('결제항목 파싱 오류:', error);
                showAllItems();
            }
        }

        function processXmlItems(itemElements) {
            Array.from(itemElements).forEach((itemElement) => {
                const itemId = getElementText(itemElement, 'ItemId');
                const itemName = getElementText(itemElement, 'ItemName');
                const amount = getElementText(itemElement, 'Amount');
                const paid = getElementText(itemElement, 'Paid') || amount;

                findAndSelectMatchingItems(itemId, itemName, amount, paid);
            });

            // items_data 필드 업데이트
            document.getElementById('items_data').value = JSON.stringify(selectedItems);
            calculateTotals();
        }

        function findAndSelectMatchingItems(itemId, itemName, amount, paid) {
            // 모든 결제항목을 순회하며 일치하는 항목 찾기
            for (let i = 0; i < <?= isset($arrAccountItems['list']) ? count($arrAccountItems['list']) : 0 ?>; i++) {
                const itemIdElement = document.getElementById('item_id_' + i);
                const itemNameElement = document.getElementById('item_name_' + i);
                const itemCostElement = document.getElementById('item_cost_' + i);
                const checkboxElement = document.getElementById('item_check_' + i);

                if (!itemIdElement || !itemNameElement || !itemCostElement || !checkboxElement) continue;

                const listItemId = itemIdElement.value;
                const listItemName = itemNameElement.value;
                const listItemCost = itemCostElement.value;

                // 정확한 매칭 조건: ID 일치 또는 (이름 유사 + 금액 일치)
                const idMatch = itemId && listItemId && (itemId.trim() === listItemId.trim());
                const nameMatch = itemName && listItemName &&
                    (itemName.trim() === listItemName.trim() ||
                        listItemName.includes(itemName) ||
                        itemName.includes(listItemName));
                const costMatch = amount && listItemCost &&
                    (parseInt(amount) === parseInt(listItemCost));

                if (idMatch || (nameMatch && costMatch)) {
                    selectItem(i, checkboxElement, paid || listItemCost);
                }
            }
        }

        function selectItem(index, checkboxElement, paidAmount) {
            const container = checkboxElement.closest('div');
            if (!container) return;

            // 항목 표시
            container.style.display = 'block';

            // 체크박스 선택
            checkboxElement.checked = true;

            // 결제완료금액 설정
            const paidElement = document.getElementById('item_paid_' + index);
            if (paidElement) {
                paidElement.value = paidAmount;
            }

            // selectedItems 객체에 항목 추가
            selectedItems[index] = {
                ItemId: document.getElementById('item_id_' + index).value,
                ItemName: document.getElementById('item_name_' + index).value,
                Cost: document.getElementById('item_cost_' + index).value,
                Quantity: "1",
                Amount: document.getElementById('item_cost_' + index).value,
                Paid: paidAmount,
                From: checkboxElement.getAttribute('data-from'),
                To: checkboxElement.getAttribute('data-to'),
                For: {
                    MemberId: checkboxElement.getAttribute('data-memberid'),
                    Name: checkboxElement.getAttribute('data-name'),
                    Affiliation: checkboxElement.getAttribute('data-affiliation')
                },
                checked: true
            };
        }

        function displayOriginalAmounts() {
            const originalAmount = <?= json_encode(isset($formData["t_amount"]) ? $formData["t_amount"] : 0) ?>;
            const originalPaid = <?= json_encode(isset($formData["t_paid"]) ? $formData["t_paid"] : 0) ?>;

            console.log('금액 정보:', originalAmount, originalPaid); // 디버깅용
            updateTotalDisplay(originalAmount, originalPaid);
        }

        // =============== 결제 방법 관련 기능 ===============
        function initPaymentMethodHandler() {
            const methodSelect = document.querySelector('select[name="t_method"]');
            if (!methodSelect) return;

            // "계좌/카드" 텍스트를 포함하는 th 요소 찾기
            let accountContainer = findAccountContainer();
            if (!accountContainer) return;

            // 초기 상태 설정
            let isFirstLoad = true;

            updateAccountUI();

            // 결제 방법 변경 시 이벤트
            methodSelect.addEventListener('change', updateAccountUI);

            /**
             * 선택된 결제 방법에 따라 UI 업데이트
             */
            function updateAccountUI() {
                const selectedMethod = methodSelect.value;
                const existingAccount = '<?= isset($formData["t_account"]) ? $formData["t_account"] : "" ?>';

                // t_method_text 히든 필드에 선택된 옵션의 텍스트 저장
                const selectedOption = methodSelect.options[methodSelect.selectedIndex];
                document.getElementById('t_method_text').value = selectedOption.textContent;

                // 기존 내용 초기화
                accountContainer.innerHTML = '';

                // 최초 로드 시 수정 모드에서만 텍스트로 표시
                if (isFirstLoad && isEditMode && existingAccount) {
                    const accountInfo = document.createElement('span');
                    accountInfo.id = 'current_account_info';
                    accountInfo.textContent = existingAccount;
                    accountContainer.appendChild(accountInfo);

                    document.getElementById('t_account_hidden').value = existingAccount;
                    isFirstLoad = false;
                    return;
                }

                // 결제 방법에 따른 UI 구성
                renderAccountUI(selectedMethod, accountContainer);
                isFirstLoad = false;
            }

            function findAccountContainer() {
                // "계좌/카드" 텍스트를 포함하는 th 요소 찾기
                const ths = document.querySelectorAll('th');
                for (let i = 0; i < ths.length; i++) {
                    if (ths[i].textContent.trim() === '계좌/카드') {
                        const accountTd = ths[i].nextElementSibling;
                        return accountTd.querySelector('.inputs');
                    }
                }
                console.error('계좌/카드 컨테이너를 찾을 수 없습니다.');
                return null;
            }
        }

        function renderAccountUI(method, container) {
            let accountValue = '';

            switch(method) {
                case 'A_PAY_METHOD_BANKONLINE': // 온라인입금
                    renderBankSelect(container);
                    break;

                case 'A_PAY_METHOD_CASH': // 현금
                    accountValue = '현금';
                    renderSimpleText(container, accountValue);
                    break;

                case 'A_PAY_METHOD_GIRO': // 지로
                    accountValue = '지로';
                    renderSimpleText(container, accountValue);
                    break;

                case 'A_PAY_METHOD_ADMINDIRECT': // 직접입력
                    accountValue = '직접입력';
                    renderSimpleText(container, accountValue);
                    break;

                case 'A_PAY_METHOD_DIRECTCARD': // 신용카드직접결제
                    renderCardSelect(container);
                    break;

                default:
                    accountValue = '';
                    break;
            }

            // 히든 필드에 현재 계좌/카드 정보 설정
            document.getElementById('t_account_hidden').value = accountValue;
        }

        function renderBankSelect(container) {
            const accountSelect = document.createElement('select');
            accountSelect.name = 'account_banks';
            accountSelect.className = 'form-control';
            accountSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value) {
                    const bankName = selectedOption.getAttribute('data-bank');
                    const accountNumber = selectedOption.getAttribute('data-number');
                    document.getElementById('t_account_hidden').value = bankName + ' ' + accountNumber;
                } else {
                    document.getElementById('t_account_hidden').value = '';
                }
            });

            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = '입금 계좌 선택';
            accountSelect.appendChild(defaultOption);

			<?php if(isset($arrAccountBank['list']) && is_array($arrAccountBank['list'])): ?>
			<?php foreach($arrAccountBank['list'] as $index => $account): ?>
            const option<?= $index ?> = document.createElement('option');
            option<?= $index ?>.value = '<?= $account['a_accountid'] ?>';
            option<?= $index ?>.setAttribute('data-bank', '<?= $account['a_bank'] ?>');
            option<?= $index ?>.setAttribute('data-number', '<?= $account['a_number'] ?>');
            option<?= $index ?>.textContent = '<?= $account['a_bank'] ?> <?= $account['a_number'] ?> (<?= $account['a_holder'] ?>) - <?= $account['a_purpose'] ?>';
            accountSelect.appendChild(option<?= $index ?>);
			<?php endforeach; ?>
			<?php endif; ?>

            container.appendChild(accountSelect);
        }

        function renderCardSelect(container) {
            const cardSelect = document.createElement('select');
            cardSelect.name = 'account_cards';
            cardSelect.className = 'form-control';
            cardSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                document.getElementById('t_account_hidden').value = selectedOption.textContent;
            });

            const defaultCardOption = document.createElement('option');
            defaultCardOption.value = '';
            defaultCardOption.textContent = '카드사 선택';
            cardSelect.appendChild(defaultCardOption);

			<?php foreach($arrCardType as $key => $value): ?>
            const cardOption_<?= md5($key) ?> = document.createElement('option');
            cardOption_<?= md5($key) ?>.value = '<?= $key ?>';
            cardOption_<?= md5($key) ?>.textContent = '<?= $value ?>';
            cardSelect.appendChild(cardOption_<?= md5($key) ?>);
			<?php endforeach; ?>

            container.appendChild(cardSelect);
        }

        function renderSimpleText(container, text) {
            const textSpan = document.createElement('span');
            textSpan.textContent = text;
            container.appendChild(textSpan);
        }

        // =============== 폼 초기화 및 유효성 검사 ===============
        function initFormValidation() {
            const form = document.getElementsByName('memberForm')[0];
            if (!form) return;

            const originalSubmit = form.onsubmit;

            form.onsubmit = function(e) {
                // items_data가 비어있는지 확인
                if (!document.getElementById('items_data').value) {
                    alert('결제 항목을 하나 이상 선택해주세요.');
                    return false;
                }

                // 원래 있던 onsubmit 함수 호출
                if (typeof originalSubmit === 'function') {
                    return originalSubmit.call(this, e);
                }
                return true;
            };

            // 결제완료금액 입력 시 총액 업데이트
            document.querySelectorAll('input[name$="[Paid]"]').forEach(function(input) {
                input.addEventListener('input', function() {
                    const index = this.id.replace('item_paid_', '');
                    updateItemData(index);
                });
            });
        }

        // =============== DatePicker 초기화 ===============
        function initDatePicker() {
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

            $("#pay_date").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        }

        // =============== 유틸리티 함수 ===============
        function getElementText(parentElement, tagName) {
            try {
                const elements = parentElement.getElementsByTagName(tagName);
                if (elements && elements.length > 0) {
                    return elements[0].textContent || '';
                }
            } catch (e) {
                console.error(`${tagName} 추출 오류:`, e);
            }
            return '';
        }

        // =============== 초기화 실행 ===============
        init();
    });
</script>

<?php include("pub/inc/footer.php") ?>