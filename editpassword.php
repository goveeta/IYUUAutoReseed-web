
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
</head>
<body>



<div >
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <div class="layui-card-body" style="padding: 15px;">
            <form action="edit.php" method="post" >
                <tr>
                    <td width="160" height="25" align="right"> </td>
                    <td width="400"><span class="STYLE1"></span></td>
                </tr>
                <tr>
                    <td height="25" align="right">用户名：</td>
                    <td> <input type="text" name="name" size="40" maxlength="80" value="" class="inputcss" />
                        <span class="STYLE1"> </span></td>
                </tr>
                <br >
                <tr>
                    <td height="25" align="right">密&nbsp;&nbsp;&nbsp;码： </td>
                    <td>       <span class="STYLE1">
      <input type="text" name="password" size="40" maxlength="80" value="" class="inputcss" />


</span></td>
                </tr>
                    <br >
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="提交" class="buttoncss" /> </td>
                </tr>
                <input name="v" type="hidden" value="2">
            </form>
        </div>
</div>
</div>




</body>
</html>