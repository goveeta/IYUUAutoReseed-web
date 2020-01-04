
<?php
    error_reporting(0);//禁用错误报告
    include "config.php";
    if(file_exists('../app/config/config.php'))
    {
        $configArray = require_once '../app/config/config.php'; // 引入config配置
    }
    else
    {
        $configArray = require_once '../app/config/config.sample.php'; // 引入config配置
    }
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
<link rel="stylesheet" href="./src/css/layui.css">

</head>
<body>



<div >
<!-- 内容主体区域 -->
<div style="padding: 15px;">
<div class="layui-card-body" style="padding: 15px;">

<form class="layui-form" method="post" action="edit.php">
<div class="layui-form-item">

<label  style="width: 200px;">爱语飞飞秘钥:  <a href="https://iyuu.cn/">点击获取</a></label>
<input type="text" name="iyuu.cn" required value="<?php echo $configArray['iyuu.cn'];?>" lay-verify="required" placeholder="爱语飞飞秘钥" autocomplete="off" class="layui-input">
<label  style="width: 200px;">ourbits ID:</label>
<input type="number" name="ourbits[id]"  value="<?php echo $configArray['ourbits']['id'];?>" placeholder="ourbits ID" autocomplete="off" class="layui-input">
<br>
<div class="layui-card">

<label  style="width: 200px;">用不到的客户端账号密码请留空</label>

<?php
    for ($i=0; $i <4 ; $i++) {
        $s=$i+1;
        echo '<div class="layui-card-header">客户端'.$s.'</div>
        <div class="layui-card-body">
        <div class="layui-form-item">
        <label style="width: 200px;" >选择客户端类型</label>
        <div class="layui-input-block" style="margin-left: 0px;">
        <select name="default[clients]['.$i.'][type]" lay-verify="">
        <option value="'.$configArray['default']['clients'][$i]['type'].'">'.$configArray['default']['clients'][$i]['type'].'</option>
        <option value="">留空</option>
        <option value="transmission">transmission</option>
        <option value="qBittorrent">qBittorrent</option>
        </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="1请选择" value="" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit" style=""><dd lay-value="" class="layui-select-tips layui-this">请选择</dd><dd lay-value="transmission" class="">transmission</dd><dd lay-value="qBittorrent" class="">qBittorrent</dd></dl></div>
        </div>
        </div>
        <label  style="width: 200px;">host</label>
        <input type="text" name="default[clients]['.$i.'][host]"  value="'.$configArray['default']['clients'][$i]['host'].'"  placeholder="" autocomplete="off" class="layui-input">
        <label  style="width: 200px;">username</label>
        <input type="text" name="default[clients]['.$i.'][username]"  value="'. $configArray['default']['clients'][$i]['username'].'"  placeholder="" autocomplete="off" class="layui-input">
        <label  style="width: 200px;">password</label>
        <input type="text" name="default[clients]['.$i.'][password]"  value="'.$configArray['default']['clients'][$i]['password'].'"  placeholder="" autocomplete="off" class="layui-input">
        </div>';
    }
    ?>


<hr><br><br>

<?php
    $i=1;
    foreach ($configArray as $key => $value) {
        
        if (isset($configArray[$key]['passkey'])) {
            echo '<label  style="width: 200px;">'.$i.'、'.$key.' passkey:</label>';
            echo '<input type="text" name="'.$key.'[passkey]'.'"  value="'.$configArray[$key]['passkey'].'"  placeholder="'.$key.' passkey'.'" autocomplete="off" class="layui-input">';
            if ($key == 'ourbits') {
                echo '<label  style="width: 200px;">'.$key.' is_vip: 默认0受限下载，如果不受限可填1</label>';
                echo '<input type="text" name="'.$key.'[is_vip]'.'"  value="'.$configArray[$key]['is_vip'].'"  placeholder="'.$key.' is_vip'.'" autocomplete="off" class="layui-input">';
            }elseif ($key == 'hdcity') {
                echo '<label  style="width: 200px;">'.$key.' cookie: 此站辅种需填</label>';
                echo '<input type="text" name="'.$key.'[cookie]'.'"  value="'.$configArray[$key]['cookie'].'"  placeholder="'.$key.' cookie'.'" autocomplete="off" class="layui-input">';
            }
            echo " <br><hr>";
            $i++;
        }
    }
    ?>



</div>
</div>
<input name="v" type="hidden" value="1">


<!-- <div class="layui-form-item"> -->
<!-- <div class="layui-input-block"> -->
<div class="layui-footer">

<button type="submit" class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
<button type="reset" class="layui-btn layui-btn-primary">重置</button>
<!-- </div> -->
</div>
</form>

</div>
</div>
</div>

<script src="./src/layui.all.js"></script>
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
