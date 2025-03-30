/**
 * 게시판(Board) 관련 JavaScript 기능
 * - 달력(Datepicker) 설정
 * - 체크박스 관리
 * - 게시물 삭제
 * - 정렬 기능
 */

$(document).ready(function() {
    // ===== 달력(Datepicker) 설정 =====
    initializeDatepickers();

    // ===== 체크박스 전체선택/해제 기능 =====
    initializeCheckboxes();

    // ===== 순서 변경 (현재 비활성화됨) =====
    /*
    $("#sortWrap").sortable({
        axis: "y",
        containment: "parent",
        update: function (event, ui) {
            var order = $(this).sortable('toArray', {
                attribute: 'data-order'
            });
            console.log(order);
            fnOrderSave(order);
        }
    });
    */
});

/**
 * 모든 달력(Datepicker) 초기화
 */
function initializeDatepickers() {
    // 기본 datepicker 초기화
    $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        showMonthAfterYear: true,
        showOn: "both",
        buttonImage: "/images/icon_month.gif",
        buttonImageOnly: true,
        changeYear: true,
        changeMonth: true,
        yearRange: 'c-100:c+10',
        yearSuffix: "년 ",
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNamesMin: ['일','월','화','수','목','금','토']
    });

    // calendar 클래스 datepicker 초기화
    $.each($('input.calendar'), function() {
        set_datepicker($(this));
    });
}

/**
 * calendar 클래스용 datepicker 설정
 * @param {Object} $cont - jQuery input 요소
 */
function set_datepicker($cont) {
    $cont.prop('readonly', true).datepicker({
        closeText: '닫기',
        prevText: '',
        nextText: '',
        currentText: '오늘',
        monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNames: ['일','월','화','수','목','금','토'],
        dayNamesShort: ['일','월','화','수','목','금','토'],
        dayNamesMin: ['일','월','화','수','목','금','토'],
        weekHeader: 'Wk',
        dateFormat: 'yy-mm-dd',
        defaultDate: '+1w',
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: true,
        yearSuffix: '년 ',
        changeMonth: true,
        changeYear: true,
        yearRange: '1921:c+5'
    });
}

/**
 * 체크박스 전체선택/해제 기능 초기화
 */
function initializeCheckboxes() {
    // 상단 체크박스 - 전체선택 기능
    var $allCheck = $('#allCheck');
    $allCheck.change(function() {
        var checked = $(this).prop('checked');
        $('input[name="chk_list"]').prop('checked', checked);
    });

    // 하위 체크박스 - 전체선택 상태 업데이트
    var boxes = $('input[name="chk_list"]');
    boxes.change(function() {
        var boxLength = boxes.length;
        var checkedLength = $('input[name="chk_list"]:checked').length;
        var selectallCheck = (boxLength == checkedLength);
        $allCheck.prop('checked', selectallCheck);
    });

    // 체크박스 전체선택/해제 기능 (check_all 클래스 사용)
    $(".check_all").click(function() {
        var chk = $(this).is(":checked");
        if(chk) $(".chk_list").prop('checked', true);
        else $(".chk_list").prop('checked', false);
    });
}

/**
 * 게시물 삭제
 * @param {string} val - 삭제할 게시물 ID
 */
function boardDel(val, boardid) {
    if(confirm("삭제 하시겠습니까?")) {
        $.post("/module/board/ajax_board_del.php",
            { evnMode: "delete", g_idx: val, boardid: boardid },
            function(data) {
                location.reload();
            }
        );
    }
}

/**
 * 페이지 새로고침
 */
function doLoad() {
    location.reload();
}

/**
 * 선택된 게시물 삭제
 */
function getSelections() {
    var ss = "0";
    var rows = $('input:checkbox[name=chk_list]:checked');

    for(var i=0; i<rows.length; i++) {
        ss += "," + rows[i].value;
    }

    if(rows.length > 0) {
        boardDel(ss);
    } else {
        alert('선택된 항목이 없습니다.');
    }
}

// ===== 순서 변경 관련 기능 =====
var arrIdx = [];

/**
 * 정렬 순서 저장
 * @param {Array} order - 정렬된 항목 배열
 */
function fnOrderSave(order) {
    arrIdx = order;
    fnGoodOrderby();
}

/**
 * 정렬 순서 서버 저장
 */
function fnGoodOrderby() {
    var idxs = "";
    var comma = "";

    for(var i=0; i<arrIdx.length; i++) {
        idxs += comma + arrIdx[i];
        comma = "|";
    }

    if(idxs) {
        $.post("/module/board/ajax_orderby_board.php",
            { "gidx": idxs, "tn": "tbl_board_" + boardid },
            function(data) {
                if(data) {
                    location.reload();
                }
            }
        );
    } else {
        alert('변경된 순서가 없습니다.');
    }
}

/**
 * 메인노출 상태 변경
 * @param {Object} objt - 체크박스 요소
 * @param {string} sf - 필드명
 */
function fnAjaxYN(objt, sf) {
    var apiUrl = "/module/shop/ajax_edit_def_yn.php";
    var gidx = $(objt).val();
    var chk = $(objt).is(":checked");
    var yn = chk ? "Y" : "N";

    $.post(apiUrl, {
        "gidx": gidx,
        "yn": yn,
        "sf": sf,
        "tn": "tbl_board_ourstory"
    }, function(data) {
        if(data == "true") {
            location.reload();
        } else {
            alert(data);
        }
    });
}

/**
 * 정렬 방식 변경
 * @param {string} rdnm - 정렬 필드명
 * @param {string} rdsc - 정렬 방향
 */
function fnOrderby(rdnm, rdsc) {
    var frm = document.form1;
    frm.rdnm.value = rdnm;
    frm.rdsc.value = rdsc;
    frm.submit();
}
