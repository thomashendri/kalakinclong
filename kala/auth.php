<?php
include 'config.php';

/*
$options = [
    'cost' => 8,
];
$password    = password_hash($_POST['password'], PASSWORD_BCRYPT, $options); 
*/
$data = array();
$username    = $_POST['username']; 
$password    = $_POST['password']; 
$password_db = null;

$sql    = "SELECT mainUserName, mainFullName, mainRole, mainPassword FROM main_user WHERE mainUserName='$username'"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[user_name]    = $row['mainUserName'];
        $data[user_fullname]= $row['mainFullName'];
        $data[user_role]    = $row['mainRole'];
        $password_db        = $row['mainPassword'];
    }
}



if (password_verify($password, $password_db)) {

    $_SESSION['user']['UserName']   = $data[user_name];
    $_SESSION['user']['FullName']   = $data[user_fullname];
    $_SESSION['user']['RoleId']     = $data[user_role];
    $_SESSION['user']['RoleName']   = "Agent Rahasia";
    $_SESSION['user']['office']     = "Purwokerto";
    header("Location: dashboard");
    exit;
}
else {
    header('Location: ' ."login?error=password-incorrect");
    exit;
}

print_r($_POST);
die('aa');



$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'"; 



$result = $conn->query($sql); 

if ($result->num_rows > 0) { 

 $_SESSION['username'] = $username; 

 header("Location: welcome.php"); 

} else { 

 echo "Login gagal. <a href='index.php'>Coba lagi</a>"; 

} 

$conn->close(); 

?>
