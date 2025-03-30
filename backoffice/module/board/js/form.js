/**
 * 게시판 폼 관련 JavaScript 기능
 * - 폼 유효성 검사
 * - 달력(Datepicker) 설정
 * - 파일 업로드 관리
 * - 이미지 미리보기
 */

// ===== 문서 로드 완료 시 실행 =====
$(document).ready(function() {
    // 달력 초기화
    $.each($('input.calendar'), function() {
        set_datepicker($(this));
    });

    // 숫자만 입력 허용
    $(".numberOnly").on("keyup", function() {
        $(this).val($(this).val().replace(/[^0-9]/g, ""));
    });

    // 이미지 파일 미리보기
    $(".imageFile").on("change", function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        var timg = $(this).parent('div').parent('div').parent('td').children('div').eq(1).children('img');

        reader.onload = function(e) {
            timg.attr("src", e.target.result);
            timg.show();
        };

        reader.readAsDataURL(file);
    });
});

// ===== 페이지 로드 완료 시 실행 =====
$(window).load(function() {
    // 달력 초기화
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

    // 파일 선택 시 파일명 표시
    $(".searchfile").on('change', function() {
        val = $(this).val().split("\\");
        f_name = val[val.length-1];
        s_name = f_name.substring(f_name.length-4, f_name.length);
        $(this).parent().siblings('.filebox').html(f_name);
    });
});

/**
 * 폼 유효성 검사
 * @param {Object} frm - 폼 객체
 */
function frmCheck(frm) {
    /*
    if(frm.subject.value.length < 1) {
        alert('제목을 입력해 주세요.');
        frm.subject.focus();
        return;
    }
    */

    try {
        contents.outputBodyHTML();
    } catch(e) { }

    frm.submit();
}

/**
 * 달력(Datepicker) 설정
 * @param {Object} $cont - jQuery input 요소
 */
function set_datepicker($cont) {
    $cont.prop('readonly', true).datepicker({
        closeText: '닫기',
        prevText: '',
        nextText: '',
        currentText: '오늘',
        monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)',
            '7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
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

// ===== 파일 업로드 관련 기능 =====

// 첨부파일 열 추가 (레거시 방식)
var rowcount = 0;
function append() {
    var tbl = document.getElementById("files_table").getElementsByTagName("TBODY")[0];
    var html1 = "<input name='upfiles[]' type='file' style='width: 400px;'>";
    var row = document.createElement("tr");
    var col1 = document.createElement("td");

    row.appendChild(col1);
    col1.innerHTML = html1;
    tbl.appendChild(row);
    rowcount++;
}

// 첨부파일 열 추가 (현재 방식)
var filecount = 0;
function appendfile() {
    if(filecount < 20) {
        filecount++;
        $("#filetd" + filecount).css("display", "");
    }
}

// 첨부파일 열 제거
function removefile() {
    $("#filetd" + filecount).css("display", "none");
    if(filecount > 0) {
        filecount--;
    }
}

// 첨부파일 열 제거 (레거시 방식)
function remove() {
    if(rowcount > 0) {
        var tbl = document.getElementById("files_table").getElementsByTagName("TBODY")[0];
        if (tbl.hasChildNodes()) {
            tbl.removeChild(tbl.lastChild);  // 마지막 로우
            //tbl.removeChild(tbl.firstChild);  // 첫번째 로우
        }
        rowcount--;
    }
}

/**
 * 파일 다운로드
 * @param {string} boardid - 게시판 ID
 * @param {string} b_idx - 게시글 인덱스
 * @param {string} idx - 파일 인덱스
 */
function fileDownload(boardid, b_idx, idx) {
    obj = window.open("/module/board/download.php?boardid=" + boardid + "&b_idx=" + b_idx + "&idx=" + idx,
        "download", "width=100,height=100,menubars=0,toolbars=0");
}

/**
 * 팝업창으로 게시글 보기
 * @param {string} fname - 파일명
 */
function OpenApplyView(fname) {
    Fancybox.show([
        {
            src: "/backoffice/module/board/pop_board_view.php?boardid=droneimage&fname=" + fname,
            type: "iframe",
            preload: false,
            width: 1100,
            height: 700
        }
    ]);
}