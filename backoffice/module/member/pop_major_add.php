<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/pop_top.php";

include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/account.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/board/board.lib.php";

if (! in_array ( "member_manage", $_SESSION [$_SITE ["DOMAIN"]] ["ADMIN"] ["AUTH"] ) && $_SESSION [$_SITE ["DOMAIN"]] ["ADMIN"] ["GRADE"] != "ROOT") :
    jsMsg ( "권한이 없습니다." );
    jsHistory ( "-1" );

endif;

if($_GET['page_size']){
    $scale = $_GET['page_size'];
}else{
    $scale = 20;
}

// DB연결
$dblink = SetConn ( $_conf_db ["main_db"] );

$subQuery = "";

$arrList = getPolyCategoryOption("전공코드" ,  mysqli_real_escape_string ( $GLOBALS ['dblink'], $_REQUEST ['sw'] ), mysqli_real_escape_string ( $GLOBALS ['dblink'], $_REQUEST ['sk'] ));
// _DEBUG($arrList);

// DB해제
SetDisConn ( $dblink );
?>
    <script type="text/javascript">
        <!--
        // 선택 삭제시 singleSelect=true 값 변경 false
        function getSelections(){
            var ss = "";
            var comma = "";
            var rows = $('input:checkbox[name=chk_list]:checked');

            for(var i=0; i<rows.length; i++){
                var row = rows[i];
                //ss.push(row.idx);
                ss += comma+row.value;
                comma = ",";
            }
            if(rows.length>0){
                //alert(ss);
                fnAddMsds(ss);
            }else{
                alert('선택된 항목이 없습니다.');
            }
        }
        function fnAddMsds(code, name){
            parent.fnGoodSelect(code, name, '<?=$_GET['fname']?>');
        }
        $(function(){
            $(".check_all").click(function(){
                var chk = $(this).is(":checked");//.attr('checked');
                if(chk) $(".chk_list").prop('checked', true);
                else  $(".chk_list").prop('checked', false);
            });
        });
        //-->
    </script>
    <div class="container">

        <div class="title">전공 LIST</div>

        <form name="frmSort" method="get" action="pop_major_add.php">
            <div class="inbox top_search">
                <dl class="search_wrap">
                    <dt>검색어</dt>
                    <dd>
                        <select name="sw" style="width:100px;">
                            <option value="all" <?=$_REQUEST['sw']=="all"?" selected":""?>>전체</option>
                            <option value="c_name" <?=$_REQUEST['sw']=="c_name"?" selected":""?>>전공코드</option>
                            <option value="c_desc" <?=$_REQUEST['sw']=="c_desc"?" selected":""?>>전공분야</option>
                        </select>
                        <input type="text" name="sk" value="<?=$_GET['sk']?>" onkeypress="if( event.keyCode == 13 ){document.frmSort.submit()}"/>
                        <button type="button" class="search" onclick="document.frmSort.submit()">검색</button>
                    </dd>
                </dl>
            </div>

            <div class="inbox">
                <div class="bdr_top">
                    <div class="left">
                        <div class="total">Total : <strong><?=number_format(count($arrList))?></strong></div>
                        <div class="down">
                        </div>
                    </div>

                    <!--<div class="count">
                        <select name="page_size" onchange="document.frmSort.submit()" style="width:100px;">
                            <option value="100" <?/*if($scale=="100"){echo 'selected="selected"';}*/?>>100</option>
                            <option value="50" <?/*if($scale=="50"){echo 'selected="selected"';}*/?>>50</option>
                            <option value="40" <?/*if($scale=="40"){echo 'selected="selected"';}*/?>>40</option>
                            <option value="30" <?/*if($scale=="30"){echo 'selected="selected"';}*/?>>30</option>
                            <option value="20" <?/*if($scale=="20"){echo 'selected="selected"';}*/?>>20</option>
                            <option value="15" <?/*if($scale=="15"){echo 'selected="selected"';}*/?>>15</option>
                            <option value="10" <?/*if($scale=="10"){echo 'selected="selected"';}*/?>>10</option>
                        </select>
                        개씩 보기
                    </div>-->
                </div>
        </form>
        <!-- over_tbl : 테이블을 좌우로 스크롤 할 때 사용합니다. -->
        <!-- mo_break_tbl : 767px 이하에서 테이블 구조를 깰 때 사용합니다. -->
        <div class="over_tbl mo_break_tbl">
            <div class="bdr_list tac">
                <table>
                    <colgroup class="pc_vw">
                        <col class="w4p">
                        <col class="w15p">
                        <col class="w10p">
                        <col class="w12p">
                        <col class="w13p">
                    </colgroup>
                    <thead>
                    <tr>
                        <th><label class="check notxt"><input type="checkbox" name="" id="allCheck"><i></i></label></th>
                        <th class="pc_vw">No.</th>
                        <th class="pc_vw">전공코드</th>
                        <th class="pc_vw">전공 분야</th>
                        <th class="pc_vw">관리</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($arrList) > 0){
                        $i = 0;
                        foreach($arrList as $code => $name){
                            $i++;
                            ?>
                            <tr>
                                <td class="chkbox"><label class="check notxt"><input type="checkbox" value="<?=$code?>" name="chk_list"><i></i></label></td>
                                <td><i class="mo_vw">No.</i><?=$i?></td>
                                <td><i class="mo_vw">전공코드</i><?=$code?></td>
                                <td><i class="mo_vw">전공 분야</i><?=$name?></td>
                                <td class="mono_btm"><i class="mo_vw">관리</i>
                                    <div class="btns">
                                        <a href="javascript:void(0);" onclick="fnAddMsds('<?=$code?>', '<?=$name?>')" class="btn perf">등록</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr height="100">
                            <td colspan="5">등록된 데이터가 없습니다.</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--<div class="bdr_btm">
            <div class="paging">
                <?/*
                ############### paging ############### ST
                $queryString = explode("&",$_SERVER['QUERY_STRING']);
                $reQueryString = "";
                $comma = "";
                for($i=0;$i<count($queryString);$i++){
                    if(strpos($queryString[$i],"offset=")===false){
                        $reQueryString .= $comma.$queryString[$i];
                        $comma = "&";
                    }
                }
                echo pageNavigationBackoffice($arrList["total"],$scale,10,$_GET['offset'],$reQueryString);
                ############### paging ############### ED
                */?>
            </div>
            <div class="btns">
                <a href="javascript:void(0);" onclick="getSelections()" class="btn btn_del">선택등록</a>
            </div>
        </div>-->
    </div>
    </div>
    <form name="frmContentsHidden" method="post" action="member_evn.php">
        <input type="hidden" name="evnMode" value="delete">
        <input type="hidden" name="user_id">
        <input type="hidden" name="returnURL" value="<?=$_SERVER['REQUEST_URI']?>">
    </form>
    <script type="text/javascript">
        //<![CDATA[
        $(document).ready(function(){
//달력
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                showMonthAfterYear:true,
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
//체크박스
            var $allCheck = $('#allCheck');
            $allCheck.change(function () {
                var $this = $(this);
                var checked = $this.prop('checked');
                $('input[name="chk_list"]').prop('checked', checked);
            });
            var boxes = $('input[name="chk_list"]');
            boxes.change(function () {
                var boxLength = boxes.length;
                var checkedLength = $('input[name="chk_list"]:checked').length;
                var selectallCheck = (boxLength == checkedLength);
                $allCheck.prop('checked', selectallCheck);
            });
        });
        //]]>
    </script>

<?php include("pub/inc/footer.php") ?>