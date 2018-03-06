<?php
if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")
{
    $user = $_POST["username"];
    $psw = $_POST["password"];
    if($user == "" || $psw == "")
    {
        echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
    }
    else
    {
        mysqli_connect("localhost","root","sixx");
        mysqli_select_db("vt");
        mysqli_query("set names 'gbk'");
        $sql = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";
        $result = mysqli_query($sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中
            echo $row[0];
        }
        else
        {
            echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
        }
    }
}
else
{
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}

?>