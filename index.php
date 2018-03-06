
<title>表单输入</title>
<style>
.error{color:#FF0000;}
</style>
<?php
// 定义变量并默认设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["name"])){
        $nameErr = "请输入姓名";
    }elseif (empty($_POST["email"])){
        $emailErr = "请输入邮箱";
    }elseif (empty($_POST["gender"])){
        $genderErr = "请输入性别";
    }else{
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!-- <script src="https://cdn.bootcss.com/jquery/2.0.2/jquery.min.js"></script> -->
<h2>PHP 表单验证实例</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
   名字: <input type="text" name="name" value="<?php echo $name; ?>">
   <span class="error">* <?php echo $nameErr; ?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
   <span class="error">* <?php echo $emailErr; ?></span>
   <br><br>
   网址: <input type="text" name="website" value="<?php echo $website; ?>">
   <span class="error"><?php echo $websiteErr; ?></span>
   <br><br>
   备注: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
   <br><br>
   性别:
   <input type="radio" name="gender"
   <?php if (isset($gender) && $gender=="female") echo "checked";?>
    value="female">女
   <input type="radio" name="gender"
   <?php if (isset($gender) && $gender=="male") echo "checked";?>
    value="male">男
   <span class="error">* <?php echo $genderErr; ?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo "<h2>您输入的内容是:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
echo date("Y-m-d H:i:s");
echo "<br>";
$file=fopen("example.txt","r") or exit("Unable to open file!");
while(!feof($file))
{
    echo fgets($file)."<br>";
}
fclose($file);

$servername = "localhost";
$username = "root";
$password = "xx921226";
// $con = new mysqli($servername,$username,$password);
$con = mysqli_connect($servername,$username,$password);
// if($con->connect_error){
if(!$con){
    die("Connection failed:".mysqli_connect_error());
}
echo  "Connected successfully";
echo "<br>";
$sql = "SHOW DATABASES;";
$result = mysqli_query($con, $sql);
if($result){
    echo "show databases successful";
}else{
    echo "Error showing databases:".mysqli_error($con);
}
echo "<br>";
$arr = array();
while(($row = mysqli_fetch_array($result))){
//     echo $row;
//     echo "<br>";
    var_dump($row);
    echo "<br>";
//     $num = count($row);
    echo $row[0];
    echo "<br>";
    array_push($arr, $row);
}
echo "<br>";
var_dump($arr);
?>