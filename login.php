<?php
    header('content-type:text/json;charset=utf-8');

    //获取用户输入信息
    $name = $_POST['username'];
    $password = $_POST['password'];
    
    // 从文件中读取数据到PHP变量 
    $json_string = file_get_contents("data.json");

    // // 用参数true把JSON字符串强制转成PHP数组 
    $json_data = json_decode($json_string,true);
    
    // // 显示出来看看  
    //var_dump($json_data);  

    //判断输入是否为空
    isEmpty($name,$password);
    
    login($json_data,$name,$password);
    function login($json_data,$name,$password){
      foreach ($json_data as $key => $value) {
        if($value['name']==$name){
          if($value['password']==$password){
            header("Location: http://127.0.0.1/success.html"); 
            return;
          }
          else{
            echo "你输入的用户名或密码错误，请重新输入！";
            return;
          }
        }
        else{
          continue;
        }
      }
      echo "您输入的用户名不存在，请注册后再登录！";
    }
    function isEmpty($name,$password){
      if($name==""||$password==""){
        return "<script>alert('aaaa');</script>";
        // echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写正确的信息！"."\"".")".";"."</script>";
        // echo "<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1/login.html"."\""."</script>";
        exit;
      }
    }

  // $select=mysql_select_db("login",$link);
  // if($select)
  // {
  //   if(isset($_POST["subl"]))
  //   {
  //     $name=$_POST["usernamel"];
  //     $password=$_POST["passwordl"];
  //     if($name==""||$password=="")//判断是否为空
  //     {
        // echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写正确的信息！"."\"".")".";"."</script>";
        // echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/login.html"."\""."</script>";
        // exit;
  //     }
  //     $str="select password from register where username="."'"."$name"."'";
  //     mysql_query('SET NAMES UTF8');20       $result=mysql_query($str,$link);
  //     $pass=mysql_fetch_row($result);
  //     $pa=$pass[0];
  //     if($pa==$password)//判断密码与注册时密码是否一致
  //     {
  //       echo"登录成功！";
  //       echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/success.html"."\""."</script>";
  //     }
  //     {  
  //       echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."登录失败！"."\"".")".";"."</script>";
  //       echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/login.html"."\""."</script>";
  //     }
  //   }
  // } 
?>