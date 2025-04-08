<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/auth/auth.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
include_once $_SERVER ['DOCUMENT_ROOT'] . "/module/member/account.lib.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/mail/mail.lib.php";

if(!in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_POST['evnMode']=="insert"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = joinMemberAdmin();
	
	//DB해제
	SetDisConn($dblink);

	if($RS==true){
		jsGo("member.php","","회원가입되었습니다.");
	}else{
		jsMsg("등록에 실패 하였습니다.");
		//jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="edit"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	//$RS = editMemberAdmin(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['user_id']));

    if ($_POST['evnSubMode'] == "info"){
        $RS = editInfoMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
    } else if($_POST['evnSubMode'] == "work"){
        $RS = editWorkMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
    }else if($_POST['evnSubMode'] == "additional"){
        $RS = editAdditionalMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
    }

	//DB해제
	SetDisConn($dblink);


	if($RS==true){
		jsGo($_REQUEST['rt_url'],"",  "수정되었습니다.");
	}else{
		jsMsg("정보 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

}else if($_POST['evnMode']=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS2 = deleteMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['user_id']));		// 탙퇴회원처리
	//$RS2 = outMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['user_id']));		// 삭제처리
	if($RS2 == true){
		if($_POST['returnURL']){
			jsGo($_POST['returnURL'],"",$_REQUEST['user_id'] . "님 정상적으로 탈퇴처리되었습니다.");
		}else{
			jsGo("member.php","",$_REQUEST['user_id'] . "님 정상적으로 탈퇴처리되었습니다.");
		}
	}else{
		jsGo("member.php","","삭제중 오류가 발생하였습니다.");
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST['evnMode']=="out"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS2 = outMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['user_id']));
	if($RS2 == true){
		if($_POST['returnURL']){
			jsGo($_POST['returnURL'],"",$_REQUEST['user_id'] . "님 정상적으로 삭제 되었습니다.");
		}else{
			jsGo("member_out.php","",$_REQUEST['user_id'] . "님 정상적으로 삭제 되었습니다.");
		}
	}else{
		jsGo("member_out.php","","삭제중 오류가 발생하였습니다.");
	}


	//DB해제
	SetDisConn($dblink);

}else if($_POST['evnMode']=="insert_pop"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    if ($_POST['evnPopMode'] == "acareer"){
        $RS = insertAcareerMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
    } else if($_POST['evnPopMode'] == "scareer"){
        $RS = insertScareerMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
    } else if($_POST['evnPopMode'] == "executive"){
        $RS = insertExecutiveMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
    }else if($_POST['evnPopMode'] == "paid"){
	    $RS = insertPaidMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
    }else if($_POST['evnPopMode'] == "transaction"){
	    $RS = insertTransactionMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
    }

    //DB해제
    SetDisConn($dblink);

    if($RS==true){
        // JavaScript로 부모창 리로드 및 팝업창 닫기
        jsMsg("추가 되었습니다.");
        echo "<script>
            window.parent.location.reload();
            window.parent.Fancybox.close();
        </script>";
        exit;
    } else {
        jsMsg("실패 하였습니다.");
        jsHistory("-1");
    }
}else if($_POST['evnMode']=="edit_pop"){
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);

    if ($_POST['evnPopMode'] == "acareer"){
        $RS = editAcareerMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
    } else if($_POST['evnPopMode'] == "scareer"){
        $RS = editScareerMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
    }else if($_POST['evnPopMode'] == "executive"){
        $RS = editExecutiveMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']),mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['o_id']));
    }else if($_POST['evnPopMode'] == "paid"){
		$RS = editPaidMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']));
	}else if($_POST['evnPopMode'] == "transaction"){
	    $RS = editTransactionMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']),mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['t_orderno']));
    }

    //DB해제
    SetDisConn($dblink);

    if($RS==true){
        // JavaScript로 부모창 리로드 및 팝업창 닫기
        jsMsg("수정 되었습니다.");
        echo "<script>
            window.parent.location.reload();
            window.parent.Fancybox.close();
        </script>";
        exit;
    } else {
        jsMsg("실패 하였습니다.");
        jsHistory("-1");
    }
}else if($_POST['evnMode'] == "delete_pop") {
    // DB 연결
    $dblink = SetConn($_conf_db["main_db"]);

    $id = mysqli_real_escape_string($GLOBALS['dblink'], $_POST['memberid']);

    if ($_POST['evnPopMode'] == "acareer"){
        $RS = deleteAcareerMember($id);
    } else if($_POST['evnPopMode'] == "scareer"){
        $RS = deleteScareerMember($id);
    }else if($_POST['evnPopMode'] == "executive"){
        $RS = deleteExecutiveMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']),mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['o_id']));
    }else if($_POST['evnPopMode'] == "paid"){
		$RS = deletePaidMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']),mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['p_id']));
	}else if($_POST['evnPopMode'] == "transaction"){
	    $RS = deleteTransactionMember(mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['memberid']),mysqli_real_escape_string($GLOBALS['dblink'], $_REQUEST['t_orderno']));
    }

    // DB 연결 해제
    SetDisConn($dblink);

    echo ($RS) ? "success" : "failed";
    exit;
}
?>