<?php
defined('ROOT_PATH') or define("ROOT_PATH",  dirname(__DIR__));
    require_once ROOT_PATH."/web/config.php";
    require_once ROOT_PATH."/app/Class/File.php";
    // session开始
    session_start();
    if ($config['password'] != $_SESSION['password'] && $config['username'] != $_SESSION['name']) {
        $page = "login.php";
        echo "<script>window.location = \"" . $page . "\";</script>";
    }else{
        if ($_POST['v']=='1'){
            if(file_exists(ROOT_PATH.'/app/config/config.php'))
            {
                $configArray = require_once ROOT_PATH.'/app/config/config.php'; // 引入config配置
            }
            else
            {
                $configArray = require_once ROOT_PATH.'/app/config/config.sample.php'; // 引入config配置
            }
            $inputArray = $_POST;
            $inputArray['iyuu.cn']=$inputArray['iyuu_cn'];
            unset($inputArray['v']);
            unset($inputArray['iyuu_cn']);
            for ($i=0; $i <4 ; $i++) {
                $configArray['default']['clients'][$i]=$inputArray['default']['clients'][$i];
                unset($inputArray['default']['clients'][$i]);
                
            }
            multimerge($configArray['default'],$inputArray['default']);
            $configData = var_export(multimerge($configArray,$inputArray),true);
            $configData = "<?php return {$configData};";
            $fileObg = new IFile(ROOT_PATH.'/app/config/config.php','w+');
            if ($fileObg->write($configData)) {
                sleep(3);
                header('Location:./editconfig.php');
            }else {
                echo "修改配置失败";
            }
            $fileObg->save();
        }elseif($_POST['v']=='2'){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $txt = '<?php $config = array("username" => "' . $name . '","password" => "' . $password . '");';
            $fileObg = new IFile(ROOT_PATH.'/web/config.php','w+');
            $fileObg->write($txt);
            $fileObg->save();
            header('Location:./editpassword.php');
        };
    }
    
    
    //递归合并数组
    function multimerge()
    {
        $arrs = func_get_args();
        $merged = array();
        while ($arrs) {
            $array = array_shift($arrs);
            if (!$array) { continue; }
            foreach ($array as $key => $value){
                if (is_string($key)) {
                    if (is_array($value) && array_key_exists($key, $merged)
                        && is_array($merged[$key])) {
                        $merged[$key] = call_user_func_array('multimerge',
                                                             array($merged[$key], $value));
                    } else {
                        $merged[$key] = $value;
                    }
                } else {
                    $merged[] = $value;
                }
            }
        }
        return $merged;
    }
