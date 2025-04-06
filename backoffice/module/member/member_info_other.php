<?PHP
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/admin_top.php";
include "./menu.php";

include $_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/board/board.lib.php";
if(!in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
    jsMsg("권한이 없습니다.");
    jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getUserInfo(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]));
$arrAcareerList = getCareerMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]), "acareer");
$arrMemberOfficerList = getCareerMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST["memberid"]), "scareer");
$arrCodeCategory = getPolyCategoryOption("직종");

//SetDisConn($dblink);
//DB해제

?>
    <div class="container">
        <div class="title">기타 정보</div>
        <div class="tab_div">
            <div class="tab_menu <?=(!isset($_GET['tab']) || $_GET['tab'] == 'basic')?"on":""?>" onclick="location.href='member_info.php?tab=basic&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">기본 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'work'?"on":""?>" onclick="location.href='member_info_work.php?tab=work&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">직장 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'other'?"on":""?>" onclick="location.href='member_info_other.php?tab=other&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">기타 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'additional'?"on":""?>" onclick="location.href='member_info_additional.php?tab=additional&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">추가 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'executive'?"on":""?>" onclick="location.href='member_info_executive.php?tab=executive&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">임원 정보</div>
            <div class="tab_menu <?=$_GET['tab'] == 'payment'?"on":""?>" onclick="location.href='member_info_payment.php?tab=payment&memberid=<?=$_REQUEST["memberid"]?>&listURL=<?=urlencode($_REQUEST['listURL'])?>'">납부/결제 내역</div>
        </div>
        <div class="inbox write_tbl mo_break_write">

            <form name="memberForm" method="post" action="member_evn.php" onsubmit="return checkForm(this)">
                <input type="hidden" name="evnMode" value="edit">
                <input type="hidden" name="evnSubMode" value="<?=$_GET['tab']?>">
                <input type="hidden" name="memberid" value="<?=$arrInfo["list"][0]['memberid']?>">
                <input type="hidden" name="rt_url" value="<?=$_SERVER['REQUEST_URI']?>">
                <!-- 기존 코드 -->
                <input type="hidden" name="addidxs" id="addidxs" value="">
                <!-- 추가할 코드 -->
                <input type="hidden" name="addidxs_names" id="addidxs_names" value="">
                <div class="tit">
                    <div>전공 정보 <i>*</i></div>
                </div>
                <table>
                    <tr>
                        <td>
                            <div class="btns" style="height:30px;margin-top:0;margin-bottom:10px; justify-content: left">
                                <a href="javascript:void(0);" class="btn" onclick="OpenApplyView('major')">전공 추가</a>
                            </div>
                            <div class="bdr_list tac" style="width:100%;board:1px">
                                <table>
                                    <colgroup>
                                        <col width="20%">
                                        <col width="30%">
                                        <col width="20%">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th style="text-align:center;padding:20px 0;">전공코드</th>
                                        <th style="text-align:center;padding:20px 0;">전공분야</th>
                                        <th style="text-align:center;padding:20px 0;">삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody id="addlist1">
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>

                <div class="tit">
                    <div>학력<i>*</i></div>
                </div>
                <table>
                    <tr>
                        <td>
                            <div class="btns" style="height:30px;margin-top:0;margin-bottom:10px; justify-content: left">
                                <a href="javascript:void(0);" class="btn" onclick="OpenApplyView('acareer', 'insert', <?=$arrInfo["list"][0]['memberid']?> )">학력 추가</a>
                            </div>
                            <div class="bdr_list tac" style="width:100%;board:1px">
                                <table>
                                    <colgroup>
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="15%">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th style="text-align:center;padding:20px 0;">학위</th>
                                        <th style="text-align:center;padding:20px 0;">학위년도</th>
                                        <th style="text-align:center;padding:20px 0;">학교/대학원</th>
                                        <th style="text-align:center;padding:20px 0;">학과</th>
                                        <th style="text-align:center;padding:20px 0;">전공</th>
                                        <th style="text-align:center;padding:20px 0;">삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody id="addlist2">
                                    <?
                                    if($arrAcareerList['total'] > 0){
                                        for ($i=0;$i<$arrAcareerList['total'];$i++){
                                            ?>
                                            <tr data-email="<?=$email?>">
                                                <td><?=$arrAcareerList['list'][$i]['degree']?></td>
                                                <td><?=$arrAcareerList['list'][$i]['dyear']?></td>
                                                <td><?=$arrAcareerList['list'][$i]['univ']?></td>
                                                <td><?=$arrAcareerList['list'][$i]['department']?></td>
                                                <td><?=$arrAcareerList['list'][$i]['major']?></td>
                                                <td class="mono_btm"><i class="mo_vw">관리</i>
                                                    <div class="btns">
                                                        <a href="javascript:void(0);" onclick="OpenApplyView('acareer', 'edit', <?=$arrInfo["list"][0]['memberid']?>, {
                                                                degree: '<?=$arrAcareerList['list'][$i]['degree']?>',
                                                                dyear: '<?=$arrAcareerList['list'][$i]['dyear']?>',
                                                                univ: '<?=$arrAcareerList['list'][$i]['univ']?>',
                                                                department: '<?=$arrAcareerList['list'][$i]['department']?>',
                                                                major: '<?=$arrAcareerList['list'][$i]['major']?>'
                                                                })" class="btn perf">수정</a>

                                                        <button type="button" class="btn del" style="line-height:32px;" onclick="delCareerMember(
                                                                '<?=$arrInfo["list"][0]['memberid']?>',
                                                                'acareer',
                                                                {
                                                                degree: '<?=$arrAcareerList['list'][$i]['degree']?>',
                                                                dyear: '<?=$arrAcareerList['list'][$i]['dyear']?>',
                                                                univ: '<?=$arrAcareerList['list'][$i]['univ']?>',
                                                                department: '<?=$arrAcareerList['list'][$i]['department']?>',
                                                                major: '<?=$arrAcareerList['list'][$i]['major']?>'
                                                                });">삭제</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?
                                        }
                                    }else{
                                        ?>
                                        <tr height="100">
                                            <td colspan="6">등록된 데이터가 없습니다.</td>
                                        </tr>
                                    <?}?>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="tit">
                    <div>경력 <i>*</i></div>
                </div>
                <table>
                    <tr>
                        <td>
                            <div class="btns" style="height:30px;margin-top:0;margin-bottom:10px; justify-content: left">
                                <a href="javascript:void(0);" class="btn" onclick="OpenApplyView('scareer', 'insert',<?=$arrInfo["list"][0]['memberid']?> )">경력 추가</a>
                            </div>
                            <div class="bdr_list tac" style="width:100%;board:1px">
                                <table>
                                    <colgroup>
                                        <col width="20%">
                                        <col width="30%">
                                        <col width="30%">
                                        <col width="20%">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th style="text-align:center;padding:20px 0;">기간</th>
                                        <th style="text-align:center;padding:20px 0;">소속기관명</th>
                                        <th style="text-align:center;padding:20px 0;">경력 내용</th>
                                        <th style="text-align:center;padding:20px 0;">삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody id="addlist3">
                                    <?
                                    if($arrMemberOfficerList['total'] > 0){
                                        for ($i=0;$i<$arrMemberOfficerList['total'];$i++){
                                            ?>
                                            <tr data-email="<?=$email?>">
                                                <td><?=$arrMemberOfficerList['list'][$i]['fyear']?> ~ <?=$arrMemberOfficerList['list'][$i]['tyear']?>  </td>
                                                <td><?=$arrMemberOfficerList['list'][$i]['affiliation']?></td>
                                                <td><?=$arrMemberOfficerList['list'][$i]['description']?></td>
                                                <td class="mono_btm"><i class="mo_vw">관리</i>
                                                    <div class="btns">
                                                        <a href="javascript:void(0);" onclick="OpenApplyView('scareer', 'edit', <?=$arrInfo["list"][0]['memberid']?>, {
                                                                fyear: '<?=$arrMemberOfficerList['list'][$i]['fyear']?>',
                                                                tyear: '<?=$arrMemberOfficerList['list'][$i]['tyear']?>',
                                                                affiliation: '<?=$arrMemberOfficerList['list'][$i]['affiliation']?>',
                                                                description: '<?=$arrMemberOfficerList['list'][$i]['description']?>'
                                                                })" class="btn perf">수정</a>
                                                        <button type="button" class="btn del" style="line-height:32px;" onclick="delCareerMember(
                                                                '<?=$arrInfo["list"][0]['memberid']?>',
                                                                'scareer',
                                                                {
                                                                fyear: '<?=$arrMemberOfficerList['list'][$i]['fyear']?>',
                                                                tyear: '<?=$arrMemberOfficerList['list'][$i]['tyear']?>',
                                                                affiliation: '<?=$arrMemberOfficerList['list'][$i]['affiliation']?>',
                                                                description: '<?=$arrMemberOfficerList['list'][$i]['description']?>'
                                                                });">삭제</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?
                                        }
                                    }else{
                                        ?>
                                        <tr height="100">
                                            <td colspan="4">등록된 데이터가 없습니다.</td>
                                        </tr>
                                    <?}?>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="btns">
                    <a href="/backoffice/module/member/member.php" class="btn btn_list">목록보기</a>
                    <button class="btn btn_save" type="submit">저장</button>
                </div>
            </form>
        </div> <!-- //inbox -->
    </div>
    <form name="frmContentsHidden" method="post" action="member_evn.php">
        <input type="hidden" name="evnMode" value="delete">
        <input type="hidden" name="memberid">
        <input type="hidden" name="returnURL" value="<?=$_SERVER['REQUEST_URI']?>">
    </form>
<?######################################### iframe fancybox ######################################### ST?>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <style type="text/css">
        .fancybox__content { padding: 5px 0;border-radius: 4px; }
        .fancybox__slide {padding-bottom:20px;}
    </style>
    <script type="text/javascript">
        function delCareerMember(memberid, career, params = {}) {
            let confirmMessage = career === 'acareer' ? "선택한 학력 정보를 삭제하시겠습니까?" : "선택한 경력 정보를 삭제하시겠습니까?";

            if (confirm(confirmMessage)) {
                let data = {
                    evnMode: "delete_pop",
                    evnPopMode: career,
                    memberid: memberid
                };

                // career 유형에 따라 다른 파라미터 추가
                if (career === 'acareer' && params) {
                    data.degree = params.degree || '';
                    data.dyear = params.dyear || '';
                    data.univ = params.univ || '';
                    data.department = params.department || '';
                    data.major = params.major || '';
                } else if (career === 'scareer' && params) {
                    data.fyear = params.fyear || '';
                    data.tyear = params.tyear || '';
                    data.affiliation = params.affiliation || '';
                    data.description = params.description || '';
                }

                $.ajax({
                    type: "POST",
                    url: "member_evn.php",
                    data: data,
                    success: function(response) {
                        if (response.trim() === "success") {
                            let successMessage = career === 'acareer' ? "학력 정보가 삭제되었습니다." : "경력 정보가 삭제되었습니다.";
                            alert(successMessage);
                            window.location.reload();
                        } else {
                            console.log(response);
                            alert("삭제 실패하였습니다. 다시 시도해주세요.");
                        }
                    },
                    error: function() {
                        alert("서버 연결에 실패했습니다. 다시 시도해주세요.");
                    }
                });
            }
        }

        function OpenApplyView(fname, mode, memberid, params = {}) {
            var requestUrl = "";

            if (fname === "major") {
                requestUrl = "/backoffice/module/member/pop_major_add.php";
            } else if (fname === "acareer") {
                requestUrl = "/backoffice/module/member/pop_acareer.php?memberid=" + memberid;
                requestUrl += "&mode=" + mode;

                if (params.degree) requestUrl += "&degree=" + encodeURIComponent(params.degree);
                if (params.dyear) requestUrl += "&dyear=" + encodeURIComponent(params.dyear);
                if (params.univ) requestUrl += "&univ=" + encodeURIComponent(params.univ);
                if (params.department) requestUrl += "&department=" + encodeURIComponent(params.department);
                if (params.major) requestUrl += "&major=" + encodeURIComponent(params.major);
            } else if (fname === "scareer") {
                requestUrl = "/backoffice/module/member/pop_scareer.php?memberid=" + memberid;
                requestUrl += "&mode=" + mode;

                if (params.fyear) requestUrl += "&fyear=" + encodeURIComponent(params.fyear);
                if (params.tyear) requestUrl += "&tyear=" + encodeURIComponent(params.tyear);
                if (params.affiliation) requestUrl += "&affiliation=" + encodeURIComponent(params.affiliation);
                if (params.description) requestUrl += "&description=" + encodeURIComponent(params.description);
            }

            Fancybox.show([
                {
                    src: requestUrl,
                    type: "iframe",
                    preload: false,
                    width: 1100,
                    height: 700
                },
            ]);
        }

        function fnGoodSelect(stridx, strname){
            if(stridx){ $(".is-close-btn").click(); }

            alert("전공코드 : "+stridx+"\n전공명 : "+strname +"\ninputName : "+inputName);

            // 전공코드 저장
            var msds = $("input[name='"+inputName+"']").val();
            if(msds){
                $("input[name='"+inputName+"']").val(msds+","+stridx);
            }else{
                $("input[name='"+inputName+"']").val(stridx);
            }

            // 전공명도 함께 저장 (hidden input 필요)
            var names = $("input[name='"+inputName+"_names']").val();
            if(names){
                $("input[name='"+inputName+"_names']").val(names+","+strname);
            }else{
                $("input[name='"+inputName+"_names']").val(strname);
            }

            fnGoodPrint(inputName);
        }

        function fnGoodPrint(inputName, orderby){
            var msds = $("input[name='"+inputName+"']").val();
            var names = $("input[name='"+inputName+"_names']").val();
            var listName = "#addlist1";

            if(msds<1){
                $(listName).html('<tr><td colspan="7" style="text-align:center;padding:14px 0;">등록된 데이터가 없습니다.</td></tr>');
            }else{
                $.post("/module/board/ajax_add_boardlist.php",
                    {
                        bid: 'cdgood',
                        idx: msds,
                        names: names,
                        fname: inputName,
                        orderby: orderby
                    },
                    function(data){
                        if(data){
                            $(listName).html(data);
                        }else{
                            alert("실패.");
                        }
                    }
                );
            }
        }

        function fnAddDel(stridx, inputName){
            var msds = $("input[name='"+inputName+"']").val();
            var arrMsds = msds.split(',');
            var reArrMsds = "";
            var comma = "";
            for(var i=0; i<arrMsds.length;i++){
                if(arrMsds[i]!=stridx){
                    reArrMsds += comma+arrMsds[i]
                    comma = ",";
                }
            }
            $("input[name='"+inputName+"']").val(reArrMsds);
            fnGoodPrint(inputName);
        }
        //-->
    </script>
<?######################################### iframe fancybox ######################################### ED?>
    <script language="javascript">

        function checkForm(frm){
            if(frm.user_pw.value.length > 0){
                if (frm.user_pw.value==""){
                    alert("비밀번호를 입력해 주세요.");
                    frm.user_pw.focus();
                    return false;
                }
                if (frm.user_pw2.value==""){
                    alert("비밀번호 확인을 입력해 주세요.");
                    frm.user_pw2.focus();
                    return false;
                }
                if (frm.user_pw.value != frm.user_pw2.value){
                    alert("비밀번호가 일치하지 않습니다.");
                    frm.user_pw2.focus();
                    return false;
                }
            }
            if (frm.user_name.value.length < 2){
                alert("이름을 입력해 주세요.");
                frm.user_name.focus();
                return false;
            }
            if (frm.mobile.value.length < 1){
                alert("휴대번호를 입력해 주세요.");
                frm.mobile.focus();
                return false;
            }
        }
        //]]>
    </script>

<?php
######################################################## 디자인 ED
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/pub/inc/footer.php";
?>