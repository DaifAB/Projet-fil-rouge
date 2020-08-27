<?php
require('config.php');
require('class.php');
 
if(isset($_POST)){
 

$downvotes = $_POST['p_downvotes'] + 1;
$sqlpost = "UPDATE announcement SET ninterresting = '$downvotes' WHERE id = '{$_POST['p_id']}'";

 $resultpost = $conn->query($sqlpost);

 


$user_id = $_POST['user_id'];


$votepost = "SELECT * FROM `voted` WHERE user_id='$user_id' AND post_id='{$_POST['p_id']}'";
$resultvotepost = $conn->query($votepost);


if($resultvotepost->fetch_assoc() == 0){


$addvotedpost = "INSERT into `voted` (post_id, user_id, up, down)
              VALUES ('{$_POST['p_id']}', '$user_id', '0','1')";
$conn->query($addvotedpost);

}else{

    $updatevotepost = "UPDATE voted SET up = 0 , down = 1 WHERE user_id='$user_id' AND post_id='{$_POST['p_id']}'";
$conn->query($updatevotepost);


}

}
?>

