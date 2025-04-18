<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>*** NHN KCP API SAMPLE ***</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes, target-densitydpi=medium-dpi">  
    <link href="../static/css/style.css" rel="stylesheet" type="text/css" id="cssLink"/>    
    <script type="text/javascript">
        
        function make_hash( form )
        {
            var frm = document.hash_info;
            frm.submit();
        }    
        
		// 주문번호 생성 예제
        function init_orderid()
        { 
        	var frm = document.hash_info;
        	
            var today = new Date();
            var year  = today.getFullYear();
            var month = today.getMonth()+ 1;
            var date  = today.getDate();
            var time  = today.getTime();

            if(parseInt(month) < 10)
            {
                month = "0" + month;
            }

            var vOrderID = year + "" + month + "" + date + "" + time;

            document.hash_info.ordr_idxx.value = vOrderID;
			getCurrentDate();
        }
        
        function getCurrentDate()
        {
        	var frm = document.hash_info;
        	
            var date = new Date();
            var str_year = date.getFullYear().toString();
            var year = str_year.substr(2,4);

            var month = date.getMonth() + 1;
            month = month < 10 ? '0' + month.toString() : month.toString();

            var day = date.getDate();
            day = day < 10 ? '0' + day.toString() : day.toString();

            var hour = date.getHours();
            hour = hour < 10 ? '0' + hour.toString() : hour.toString();

            var minites = date.getMinutes();
            minites = minites < 10 ? '0' + minites.toString() : minites.toString();

            var seconds = date.getSeconds();
            seconds = seconds < 10 ? '0' + seconds.toString() : seconds.toString();

            var vtime = year + month + day + hour + minites + seconds;

            document.hash_info.make_req_dt.value = vtime;

			make_hash(document.hash_info);
        }
    </script>

</head>
<body onload="init_orderid();" style="display:none;">
    <form name="hash_info" method="post" action="../kcp_api_hash_frame.php">
        <div class="wrap">
            <!-- header -->
            <div class="header">
                <a href="../index.html" class="btn-back"><span>뒤로가기</span></a>
                <h1 class="title">hash SAMPLE</h1>
            </div>
            <!-- //header -->
            <!-- contents -->
            <div id="skipCont" class="contents">
                <p class="txt-type-1">이 페이지는 해쉬데이터를 생성하는 샘플 페이지입니다.</p>
                <p class="txt-type-2">소수 수정 시 [※ 필수] 또는 [※ 옵션] 표시가 포함된 문장은 가맹점의 상황에 맞게 적절히 수정 적용하시기 바랍니다.</p>
                <!-- 주문내역 -->
                <h2 class="title-type-3">공통정보</h2>
                <ul class="list-type-1">
                    <li>
                        <div class="left"><p class="title">주문번호</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="ordr_idxx" value="" maxlength="40" />
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="left"><p class="title">해쉬요청일시</p></div>
                        <div class="right">
                            <div class="ipt-type-1 gap-2 pc-wd-2">
                                <input type="text" name="make_req_dt" value="" maxlength="10" />
                            </div>
                        </div>
                    </li>
                </ul>
                <div Class="Line-Type-1"></div>
                <ul class="list-btn-2">
                    <li><a href="#none" onclick="make_hash(document.hash_info);" class="btn-type-2 pc-wd-3">hash 생성요청</a></li>
                    <li class="pc-only-show"><a href="../index.html" class="btn-type-3 pc-wd-2">처음으로</a></li>
                </ul>
            </div>
            <!-- //contents -->
    
            <div class="grid-footer">
                <div class="inner">
                    <!-- footer -->
                    <div class="footer">
                        ⓒ NHN KCP Corp.
                    </div>
                    <!-- //footer -->
                </div>
            </div>
        </div>
        <input type="hidden" name="ct_type" value="HAS"/>
    </form>
</body>
</html>