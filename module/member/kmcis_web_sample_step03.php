<?php
// KMC �������� ���뼭�� ���üҽ� STEP03
// �����ۼ��� 2013.12.03 
//---------------------------------------------------------------------------------------------------------

    $rec_cert = $_REQUEST['rec_cert'];
	$certNum  = $_REQUEST['certNum']; // certNum���� ��Ű �Ǵ� Session�� �������� �ʾ����� certNum ����ó��
?>
<html>
<head>
<script type="text/javascript">
	var move_page_url = "http://ȸ���纰 ���/kmcis_web_sample_step04.php";
	

	function end() {
	   	// ��� ������ ��� ����
    	document.kmcis_form.action = move_page_url;

   		var UserAgent = navigator.userAgent;
    	/* ����� ���� üũ*/
    	// ������� ��� (�������� ������� �߰� �ʿ�)
    	if (UserAgent.match(/iPhone|iPod|Android|Windows CE|BlackBerry|Symbian|Windows Phone|webOS|Opera Mini|Opera Mobi|POLARIS|IEMobile|lgtelecom|nokia|SonyEricsson/i) != null || UserAgent.match(/LG|SAMSUNG|Samsung/) != null) {
		    document.kmcis_form.submit();
	  	} 
	  
	  	// ������� �ƴ� ���
	  	else {
			document.kmcis_form.target = opener.window.name;
		  	document.kmcis_form.submit();
   		  	self.close();
	  	}
	}
</script>
</head>
<body onload="javascript:end()">
<form id="kmcis_form" name="kmcis_form" method="post">
	<input type="hidden"	name="rec_cert"		id="rec_cert"	value="<?php echo $rec_cert ?>"/>
	<input type="hidden"	name="certNum"		id="certNum"	value="<?php echo $certNum ?>"/>
</form>
</body>
</html>