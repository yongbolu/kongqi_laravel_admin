<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <META HTTP-EQUIV="pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
    <META HTTP-EQUIV="expires" CONTENT="0">
    <META NAME="ROBOTS" CONTENT="NOINDEX,FOLLOW">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=750px, user-scalable=no">
    <title>404</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-decoration: none;
        }

        .tishi {
            width: 100%;
            height: calc(100vh);
            background: center center;
            background-repeat: no-repeat;
            -webkit-background-size: cover;
            background-size: cover;
            overflow: hidden;
        }

        .txt {
            color: #ffffff;
            text-align: center;
            overflow: hidden;
            height: 270px;
            width: 500px;
            top: 50%;
            left: 50%;
            margin: -160px 0 0 -250px;
            position: fixed;
        }

        .txt h1 {
            font-size: 120px;
            line-height: 180px;
        }

        .txt p {
            font-size: 18px;
            line-height: 30px;
        }

        .txt a {
            width: 120px;
            height: 40px;
            line-height: 40px;
            color: #333333;
            background: #ffffff;
            display: block;
            margin: 20px auto 0 auto;
        }

        .txt a:hover {
            background: #0166ce;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="tishi" style="background-image: url({{ plugin_res('/website/images/service-bj.jpg') }});">
    <div class="txt">
        <h1>{{ $code??'404' }}</h1>


        <p>{{ $msg??'' }} @if($url) <span id="mes">{{ $time??5 }}</span>秒后将自动返回</p>
        <a href="{{ $url }}">返回</a>@endif
    </div>
</div>

@if($url)
    <script language="javascript" type="text/javascript">

        var i = "{{ $time??5 }}";
        var intervalid;
        intervalid = setInterval("fun()", 1000);

        function fun() {
            if (i == 0) {
                window.location.href = "/";
                clearInterval(intervalid);
            }
            document.getElementById("mes").innerHTML = i;
            i--;
        }
    </script>
@endif
</body>
</html>
