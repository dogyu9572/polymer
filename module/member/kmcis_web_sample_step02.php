<?php
// KMC �������� ���뼭�� ���üҽ� STEP02

	//01.�Է°� ������ �ޱ�
    $cpId       = $_REQUEST['cpId'];        // ȸ����ID
    $urlCode    = $_REQUEST['urlCode'];     // URL �ڵ�
    $certNum    = $_REQUEST['certNum'];     // ��û��ȣ
    $date       = $_REQUEST['date'];        // ��û�Ͻ�
    $certMet    = $_REQUEST['certMet'];     // �����������
    $birthDay   = $_REQUEST['birthDay'];	// �������
    $gender     = $_REQUEST['gender'];		// ����
    $name       = $_REQUEST['name'];        // ����
    $phoneNo    = $_REQUEST['phoneNo'];		// �޴�����ȣ
    $phoneCorp 	= $_REQUEST['phoneCorp'];	// �̵���Ż�
    $nation     = $_REQUEST['nation'];      // ���ܱ��� ����
    $plusInfo   = $_REQUEST['plusInfo'];	// �߰�DATA����
   	$tr_url     = $_REQUEST['tr_url'];      // �������� ������� POPUP URL
    $extendVar  = "0000000000000000";       // Ȯ�庯��

	// [ �Է°� ��ȿ�� ���� ]----------------------------------------------------------------------------------
	// ���������� ȣ��, XSS����, SQL Injection ������ ���� �Է°� ��ȿ�� ���� �� ���񽺸� ȣ���ؾ� ��

	// ȸ����ID (�����빮��+���ڸ� 8�ڸ��̻� ��ȿ)
    if(preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9A-Z]/u', $cpId) || strlen($cpId) < 8 ){
       echo("ȸ����ID ������ ($cpId)");
       return;
    }

    // URL�ڵ� (���� 6�ڸ��� ��ȿ)
    if(preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9]/u', $urlCode) || strlen($urlCode) <> 6 ){
       echo("URL�ڵ� ������ ($urlCode)");
       return;
    }

    // ��û��ȣ (�ִ� 40byte���� ��ȿ)
    if(strlen($certNum) > 40 ){
       echo("��û��ȣ ������ ($certNum)");
       return;
    }
	else{
	    if(preg_match('/[<>]/', $certNum)){  //�±׹��� ����
		   echo("��û��ȣ ������ ($certNum)");
		   return;
		}
	}

    // ��û�Ͻ� (���� 14�ڸ��� ��ȿ)
    if(preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9]/u', $date) || strlen($date) <> 14 ){
       echo("��û�Ͻ� ������ ($date)");
       return;
    }

    // ����������� (�����빮�� 1�ڸ��� ��ȿ)
    if(preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}A-Z]/u', $certMet) || strlen($certMet) <> 1 ){
       echo("����������� ������ ($certMet)");
       return;
    }

    // ������� (���� �ִ� ��쿡�� ���� 8�ڸ��� ��ȿ)
    if(strlen($birthDay) > 0 ){
      if(preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9]/u', $birthDay) || strlen($birthDay) <> 8 ){
         echo("������� ������ ($birthDay)");
         return;
      }
    }

    // ���� (���� �ִ� ��쿡�� ���� 1�ڸ��� ��ȿ)
    if(strlen($gender) > 0 ){
      if(preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9]/u', $gender) || strlen($gender) <> 1 ){
         echo("���� ������ ($gender)");
         return;
      }
    }

    // ���� (���� �ִ� ��쿡�� �ִ� 30byte������ ��ȿ)
    if(strlen($name) > 0 ){
      if(strlen($name) > 30 ){
         echo("���� ������ ($name)");
         return;
      }
	  else{
	    if(preg_match('/[<>]/', $name)){  //�±׹��� ����
		   echo("���� ������1 ($name)");
		   return;
		}
	  }
    }

    // �޴�����ȣ (���� �ִ� ��쿡�� ���� 10 �Ǵ� 11�ڸ������� ��ȿ)
    if(strlen($phoneNo) > 0 ){
      if(preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9]/u', $phoneNo) || strlen($phoneNo) < 10 || strlen($phoneNo) > 11){
         echo("�޴�����ȣ ������ ($phoneNo)");
         return;
      }
    }

    // �̵���Ż� (���� �ִ� ��쿡�� �����빮�� 3�ڸ��� ��ȿ)
    if(strlen($phoneCorp) > 0 ){
      if(preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}A-Z]/u', $phoneCorp) || strlen($phoneCorp) <> 3 ){
         echo("�̵���Ż� ������ ($phoneCorp)");
         return;
      }
    }

    // ���ܱ��� (���� �ִ� ��쿡�� ���� 1�ڸ��� ��ȿ)
    if(strlen($nation) > 0 ){
      if(preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9]/u', $nation) || strlen($nation) <> 1 ){
         echo("���ܱ��� ������ ($nation)");
         return;
      }
    }

    // �߰����� (���� �ִ� ��쿡�� �ִ� 320byte������ ��ȿ)
    if(strlen($plusInfo) > 0 ){
      if(strlen($plusInfo) > 320 ){
         echo("�߰����� ������ ($plusInfo)");
         return;
      }
	  else{
	    if(preg_match('/[<>]/', $plusInfo)){  //�±׹��� ����
		   echo("�߰����� ������1 ($plusInfo)");
		   return;
		}
	  }
    }

	//----------------------------------------------------------------------------------------------------------

	// [ certNum ���ǻ��� ]--------------------------------------------------------------------------------------
	// 1. �������� ����� ��ȣȭ�� ���� Ű�� Ȱ��ǹǷ� �߿���.
	// 2. �������� ��û�� �ߺ����� �ʰ� �����ؾ���. (��-��������ȣ)
	// 3. certNum�� ���� �� ��Ű �Ǵ� Session�� ������ �� �������� ����� ���� �� ��ȣȭŰ�� �����.
	// 4. �Ʒ� ������ ��Ű�� ������� �ʾ���.
	//----------------------------------------------------------------------------------------------------------

    $name = str_replace(" ", "+", $name) ;  //���� space�� ���� ��� "+"�� ġȯ�Ͽ� ��ȣȭ ó��

	//02. certNum ��Ű ����
	//setcookie("certNum", $certNum, time()+600);

	//03. tr_cert �����ͺ��� ���� (������ ������ ������ "/"�� ����)
	$tr_cert	= $cpId . "/" . $urlCode . "/" . $certNum . "/" . $date . "/" . $certMet . "/" . $birthDay . "/" . $gender . "/" . $name . "/" . $phoneNo . "/" . $phoneCorp . "/" . $nation . "/" . $plusInfo . "/" . $extendVar;

    //��ȣȭ��� ȣ��
	if (extension_loaded('ICERTSecu')) {

		//04. 1����ȣȭ
		$enc_tr_cert = ICertSeed(1,0,'',$tr_cert);

		//05. ���������� ����
		$enc_tr_cert_hash = ICertHMac($enc_tr_cert);
		
		//06. 2����ȣȭ
		$enc_tr_cert = $enc_tr_cert . "/" . $enc_tr_cert_hash . "/" . "0000000000000000";

		$enc_tr_cert = ICertSeed(1,0,'',$enc_tr_cert);

	}else{
       echo("��ȣȭ��� ȣ�� ����!!!");
       return;
	}

?>

<html>
<head>
<title>������������ Sample ȭ��</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<style>
<!--
   body,p,ol,ul,td
   {
	 font-family: ����;
	 font-size: 12px;
   }

   a:link { size:9px;color:#000000;text-decoration: none; line-height: 12px}
   a:visited { size:9px;color:#555555;text-decoration: none; line-height: 12px}
   a:hover { color:#ff9900;text-decoration: none; line-height: 12px}

   .style1 {
		color: #6b902a;
		font-weight: bold;
	}
	.style2 {
	    color: #666666
	}
	.style3 {
		color: #3b5d00;
		font-weight: bold;
	}
--> 
</style>

<script language=javascript>
<!--
  window.name = "kmcis_web_sample";
  
  var KMCIS_window;

  function openKMCISWindow(){    

    var UserAgent = navigator.userAgent;
    /* ����� ���� üũ*/
    // ������� ��� (�������� ������� �߰� �ʿ�)
    if (UserAgent.match(/iPhone|iPod|Android|Windows CE|BlackBerry|Symbian|Windows Phone|webOS|Opera Mini|Opera Mobi|POLARIS|IEMobile|lgtelecom|nokia|SonyEricsson/i) != null || UserAgent.match(/LG|SAMSUNG|Samsung/) != null) {
      document.reqKMCISForm.target = '';
		} 
		
		// ������� �ƴ� ���
		else {
    	KMCIS_window = window.open('', 'KMCISWindow', 'width=425, height=550, resizable=0, scrollbars=no, status=0, titlebar=0, toolbar=0, left=435, top=250' );

     	if(KMCIS_window == null){
    	  alert(" �� ������ XP SP2 �Ǵ� ���ͳ� �ͽ��÷η� 7 ������� ��쿡�� \n    ȭ�� ��ܿ� �ִ� �˾� ���� �˸����� Ŭ���Ͽ� �˾��� ����� �ֽñ� �ٶ��ϴ�. \n\n�� MSN,����,���� �˾� ���� ���ٰ� ��ġ�� ��� �˾������ ���ֽñ� �ٶ��ϴ�.");
      }
     	
     	document.reqKMCISForm.target = 'KMCISWindow';
		}
		  
		document.reqKMCISForm.action = 'https://www.kmcert.com/kmcis/web/kmcisReq.jsp';
		document.reqKMCISForm.submit();
  }

//-->
</script>

</head>

<body bgcolor="#FFFFFF" topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>

<center>
<br><br><br><br><br><br>
<span class="style1">������������ ��ûȭ�� Sample�Դϴ�.</span><br>
<br><br>
<table cellpadding=1 cellspacing=1>
    <tr>
        <td align=center>ȸ����ID</td>
        <td align=left><?php echo $cpId ?></td>
    </tr>
    <tr>
        <td align=center>URL�ڵ�</td>
        <td align=left><?php echo $urlCode ?></td>
    </tr>
    <tr>
        <td align=center>��û��ȣ</td>
        <td align=left><?php echo $certNum ?></td>
    </tr>
    <tr>
        <td align=center>��û�Ͻ�</td>
        <td align=left><?php echo $date ?></td>
    </tr>
    <tr>
        <td align=center>�����������</td>
        <td align=left><?php echo $certMet ?></td>
        </td>
    </tr>
    <tr>
        <td align=center>�̿��ڼ���</td>
        <td align=left><?php echo $name ?></td>
    </tr>
    <tr>
        <td align=center>�޴�����ȣ</td>
        <td align=left><?php echo $phoneNo ?></td>
    </tr>
    <tr>
        <td align=center>�̵���Ż�</td>
        <td align=left><?php echo $phoneCorp ?></td>
    </tr>
    <tr>
        <td align=center>�������</td>
		<td align=left><?php echo $birthDay ?></td>
    </tr>
    <tr>
        <td align=center>����</td>
        <td align=left><?php echo $gender ?></td>
    </tr>
    <tr>
        <td align=center>���ܱ���</td>
        <td align=left><?php echo $nation ?></td>
    </tr>
    <tr>
        <td align=center>�߰�DATA����</td>
        <td align=left><?php echo $plusInfo ?></td>
        </td>
    </tr>
    <tr>
        <td align=center>&nbsp</td>
        <td align=left>&nbsp</td>
    </tr>
    <tr width=100>
        <td align=center>��û����(��ȣȭ)</td>
        <td align=left>
			<?php echo substr($enc_tr_cert,0,50) ?>...
        </td>
    </tr>
    <tr>
        <td align=center>�������URL</td>
        <td align=left><?php echo $tr_url ?></td>
    </tr>
</table>

<!-- ������������ ��û form --------------------------->
<form name="reqKMCISForm" method="post" action="#">
    <input type="hidden" name="tr_cert"     value = "<?php echo $enc_tr_cert ?>">
    <input type="hidden" name="tr_url"      value = "<?php echo $tr_url ?>">
    <input type="submit" value="������������ ��û"  onclick= "javascript:openKMCISWindow();">
</form>
<BR>
<BR>
<!--End ������������ ��û form ----------------------->

<br>
<br>
  �� Sampleȭ���� ������������ ��ûȭ�� ���߽� ���� �ǵ��� �����ϰ� �ִ� ȭ���Դϴ�.<br>
<br>
</center>
</BODY>
</HTML>