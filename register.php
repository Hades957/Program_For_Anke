<?php
    header('content-type:text/json;charset=utf-8');
  
    //检查指定存放数据目录下是否存在文件
    //yes：写入数据  no：生成文件
    $arr = array();
    $arr['name'] = $_POST['Name'];
    $arr['password'] = $_POST['Password'];
    $arr['email'] = $_POST['Email'];
    $json_data = json_encode($arr);

    //echo $json_data;

    //从文件中读取数据到变量
    $file="data.json";
    //$myfile = fopen($file, "w") or die("Unable to open file!");

    $json_string = file_get_contents($file);
    
    // //对数据进行处理
    $strlength = strlen($json_string);
    $json_string = substr_replace($json_string, ','.$json_data, $strlength-1,0);
    file_put_contents($file, $json_string);
    echo $json_string;


?>