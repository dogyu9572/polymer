<?php
// KMC �������� ���뼭�� ���üҽ� STEP04
?>
[������������ �׽�Ʈ ��� ���� Sample] <br> <br>

<?php
	// Parameter ����
	$rec_cert       = $_REQUEST['rec_cert'];
	$cookieCertNum  = $_REQUEST['certNum']; // certNum���� ��Ű �Ǵ� Session�� �������� �ʾ����� certNum ����ó��

	$iv = $cookieCertNum;  // certNum���� ��Ű �Ǵ� Session�� �������� �ʾ����� ������ certNum�� ��ȣȭŰ�� ����
?>
            [��ȣȭ �ϱ��� ���Ű�] <br>
            <br>
            rec_cert : <?php echo $rec_cert ?> <br>
            <br>
<?php
		//��ȣȭ��� ȣ��
		if (extension_loaded('ICERTSecu')) {

			//01.������� 1�� ��ȣȭ
			$rec_cert = ICertSeed(2,0,$iv,$rec_cert);

			//02.��ȣȭ ������ Split (rec_cert 1����ȣȭ������ / ������ ������ / �Ϻ�ȭȮ�庯��)
			$decStr_Split = explode("/", $rec_cert);

			$encPara  = $decStr_Split[0];		//rec_cert 1�� ��ȣȭ������
			$encMsg   = $decStr_Split[1];		//������ ������

			//03.������� 2�� ��ȣȭ
			$rec_cert = ICertSeed(2,0,$iv,$encPara);

			//04. ��ȣȭ �� ����ڷ� "/"�� Split �ϱ�
			$decStr_Split = explode("/", $rec_cert);

			$certNum    = $decStr_Split[0];
			$date       = $decStr_Split[1];
			$CI         = $decStr_Split[2];
			$phoneNo    = $decStr_Split[3];
			$phoneCorp  = $decStr_Split[4];
			$birthDay   = $decStr_Split[5];
			$gender     = $decStr_Split[6];
			$nation     = $decStr_Split[7];
			$name       = $decStr_Split[8];
			$result     = $decStr_Split[9];
			$certMet    = $decStr_Split[10];
			$ip         = $decStr_Split[11];
			$M_name     = $decStr_Split[12];
			$M_birthDay = $decStr_Split[13];
			$M_Gender   = $decStr_Split[14];
			$M_nation   = $decStr_Split[15];
			$plusInfo   = $decStr_Split[16];
			$DI         = $decStr_Split[17];

			//05. CI,DI ��ȣȭ
			if(strlen($CI) > 0){
				$CI = ICertSeed(2,0,$iv,$CI);
			}
			if(strlen($DI) > 0){
				$DI = ICertSeed(2,0,$iv,$DI);
			}		

		}else{
		   echo("��ȣȭ��� ȣ�� ����!!!");
		   return;
		}

/** ���ų��� ��ȿ�� ���� ******************************************************************/
		//	1-1-1) date �� ����

		//	���� ���� �ð� ���ϱ�
		 $end_date = date("YmdHis");
		 $start_date = $date;
 
		 //mktime()�� ����� ���� �� �ð� ������ ����
		 $yy = substr($end_date, 0, 4);
		 $mm = substr($end_date, 4, 2);
		 $dd = substr($end_date, 6, 2);
		 $hh = substr($end_date, 8, 2);
		 $ii = substr($end_date, 10, 2);
		 $ss = substr($end_date, 12, 2);
	 
		 //mktime()�� ����� ���� DB���� �ҷ��� datetime ���� �ð� ������ ����
		 $yy_start = substr($start_date, 0, 4);   
		 $mm_start = substr($start_date, 4, 2);   
		 $dd_start = substr($start_date, 6, 2);   
		 $hh_start = substr($start_date, 8, 2);   
		 $ii_start = substr($start_date, 10, 2);  
		 $ss_start = substr($start_date, 12, 2);  
     
		 $toDate = mktime($hh, $ii, $ss, $mm, $dd, $yy);
	     $fromDate = mktime($hh_start, $ii_start, $ss_start, $mm_start, $dd_start, $yy_start);
		 $timediff = intval(($toDate - $fromDate) / 60);		// ��
		
		if ( $timediff < -30 || 30 < $timediff  ){		?>
			���������� �����Դϴ�. (��û�ð����)
<?php			return;
		}

	//	1-1-2) ip �� ����
		// �����IP ���ϱ�
		$client_ip = "";
		if (isset($_SERVER)) {

			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
				$client_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			
			if (isset($_SERVER["HTTP_CLIENT_IP"]))
				$client_ip = $_SERVER["HTTP_CLIENT_IP"];

			$client_ip = $_SERVER["REMOTE_ADDR"];
		}

		if (getenv('HTTP_X_FORWARDED_FOR'))
			$client_ip = getenv('HTTP_X_FORWARDED_FOR');

		if (getenv('HTTP_CLIENT_IP'))
			$client_ip = getenv('HTTP_CLIENT_IP');
		
		if( $client_ip == "" ) 
			$client_ip = getenv('REMOTE_ADDR');
		
		$client_ip_list = explode(",",$client_ip);
		$client_ip = $client_ip_list[0];
		
		if( $client_ip != $ip ){		?>
		���������� �����Դϴ�. (IP����ġ(<?php echo $client_ip ?>)(<?php echo $ip ?>))
<?php			return;
		}
/******************************************************************************************/

?>
<br><br>
            [��ȣȭ �� ���Ű�] <br>
            <br>
            <table cellpadding=1 cellspacing=1>
                <tr>
                    <td align=left>������������</td>
                    <td align=left><?php echo $encMsg ?></td>
                </tr>
                <tr>
                    <td align=left>��û��ȣ</td>
                    <td align=left><?php echo $certNum ?></td>
                </tr>
                <tr>
                    <td align=left>��û�Ͻ�</td>
                    <td align=left><?php echo $date ?></td>
                </tr>
                <tr>
                    <td align=left>��������(CI)</td>
                    <td align=left><?php echo $CI ?></td>
                </tr>
                <tr>
                    <td align=left>�ߺ�����Ȯ������(DI)</td>
                    <td align=left><?php echo $DI ?></td>
                </tr>
                <tr>
                    <td align=left>�޴�����ȣ</td>
                    <td align=left><?php echo $phoneNo ?></td>
                </tr>
                <tr>
                    <td align=left>�̵���Ż�</td>
                    <td align=left><?php echo $phoneCorp ?></td>
                </tr>
                <tr>
                    <td align=left>�������</td>
                    <td align=left><?php echo $birthDay ?></td>
                </tr>
                <tr>
                    <td align=left>������</td>
                    <td align=left><?php echo $nation ?></td>
                </tr>
                <tr>
                    <td align=left>����</td>
                    <td align=left><?php echo $gender ?></td>
                </tr>
                <tr>
                    <td align=left>����</td>
                    <td align=left><?php echo $name ?></td>
                </tr>
                <tr>
                    <td align=left>�����</td>
                    <td align=left><?php echo $result ?></td>
                </tr>
                <tr>
                    <td align=left>�������</td>
                    <td align=left><?php echo $certMet ?></td>
                    </td>
                </tr>
                <tr>
                    <td align=left>ip�ּ�</td>
                    <td align=left><?php echo $ip ?></td>
                </tr>
                <tr>
                    <td align=left>�̼����� ����</td>
                    <td align=left><?php echo $M_name ?></td>
                </tr>
                <tr>
                    <td align=left>�̼����� �������</td>
                    <td align=left><?php echo $M_birthDay ?></td>
                </tr>
                <tr>
                    <td align=left>�̼����� ����</td>
                    <td align=left><?php echo $M_Gender ?></td>
                </tr>
                <tr>
                    <td align=left>�̼����� ���ܱ���</td>
                    <td align=left><?php echo $M_nation ?></td>
                </tr>
                <tr>
                    <td align=left>�߰�DATA����</td>
                    <td align=left><?php echo $plusInfo ?></td>
                </tr>
            </table>

            <br>
            rec_cert : <?php echo $rec_cert ?> <br>
            <br>
            <br>
            <a href="http://ȸ���纰 ���/kmcis/web/kmcis_web_sample_step01.php">[�ٽ� �׽�Ʈ]</a>
