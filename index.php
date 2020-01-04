<?php  
  include "config.php";
  // session开始
    session_start();  
    if ( $config['password'] != $_SESSION['password'] &&  $config['username'] != $_SESSION['name']){
    $page="login.php";   
      echo "<script>window.location = \"".$page."\";</script>";  
    }
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>自动辅种</title>
    <link rel="stylesheet" href="./src/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">自动辅种</div>
        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree"  lay-filter="test">

                    <li class="layui-nav-item"><a href="editconfig.php">config配置</a></li>
                    <li class="layui-nav-item"><a href="editpassword.php">修改密码</a></li>
                    <li class="layui-nav-item"><a href="auto.php">执行自动辅种</a></li>

                </ul>
            </div>
        </div>
        <!-- 头部区域（可配合layui已有的水平导航） -->

        <ul class="layui-nav layui-layout-right">

            <li class="layui-nav-item"><a href="">退出</a></li>
        </ul>
    </div>



    <div class="layui-body">
        <!-- 内容主体区域 -->
        <iframe src="Description.html"  id="iframeMain" style="width: 100%; height: 100%;"></iframe>

    </div>
</div>


</div>
<script src="./src/layui.js"></script>
<script src="./src/jquery-3.4.1.min.js"></script>

<script>
    $(document).ready(function(){
        $("li>a").click(function (e) {
            e.preventDefault();
            $("#iframeMain").attr("src",$(this).attr("href"));
        });
    });
</script>
</body>
</html>








