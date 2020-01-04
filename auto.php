<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>



<div >
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <div class="layui-card-body" style="padding: 15px;">
            <?php
            include "config.php";
            // session开始
            session_start();
            if ( $config['password'] != $_SESSION['password'] &&  $config['username'] != $_SESSION['name']){
                $page="login.php";
                echo "<script>window.location = \"".$page."\";</script>";
            }else{
                $phppath ='php';
                $webpath = str_ireplace('\@','\@',rtrim($_SERVER['DOCUMENT_ROOT'],"web"));
                $webpath = str_ireplace('\ ','\ ',$webpath);
                echo '辅种脚本运行中完成 <br //>以下为脚本执行结果：<br //>';
                echo shell_exec( $phppath.'  '.$webpath.'iyuu.cn.php');
            }

            ?>

    </div>
</div>
</div>



</body>
</html>