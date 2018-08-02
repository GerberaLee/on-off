<?php
header('Access-Control-Allow-Origin:*');
if(!isset($_GET['act']))
{
    $act = 'get';
}
else{
    $act = $_GET['act'];
}
if($act == 'get')
{
    try{
        // read the config file of on-off
        $finfo = @file_get_contents('config.txt');
        $info = json_decode($finfo,true);
        if($info['status'] == 'on')
        {
			//link1
                header("Location: http://baidu.com");
        }
        else{
			//link2
				header("Location: https://360.com");
        }
    }
    catch (Exception $exception)
    {
        echo 'read error!';
    }
}//set the config file
else if($act == 'set')
{
    try{
        if(!isset($_GET['status']))
        {
            return false;
        }
        $status =  $_GET['status'];
        $arr = [
            'status' => $status
        ];
        //write the config file
        $info = json_encode($arr);
        file_put_contents('config.txt',$info);
        echo 'alter success';
    }
    catch (Exception $exception)
    {
        echo 'alter error!';
    }
}//read the config file
else if($act='select')
{
try{
        $finfo = @file_get_contents('config.txt');   
	echo $finfo;
 }
    catch (Exception $exception)
    {
        echo 'read error!';
    }


}