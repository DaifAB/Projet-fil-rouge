<?php
require('config.php');
require('class.php');
 
if(isset($_POST)){
 

$upvotes = $_POST['p_upvotes'] + 1;
$sqlpost = "UPDATE announcement SET interresting = '$upvotes' WHERE id = '{$_POST['p_id']}'";

 $resultpost = $conn->query($sqlpost);



$user_id = $_POST['user_id'];


$votepost = "SELECT * FROM `voted` WHERE user_id='$user_id' AND post_id='{$_POST['p_id']}'";
$resultvotepost = $conn->query($votepost);


if($resultvotepost->fetch_assoc() == 0){


$addvotedpost = "INSERT into `voted` (post_id, user_id, up, down)
              VALUES ('{$_POST['p_id']}', '$user_id', '1','0')";
$conn->query($addvotedpost);

}else{

    $updatevotepost = "UPDATE voted SET up = 1 WHERE user_id='$user_id' AND post_id='{$_POST['p_id']}'";
$conn->query($updatevotepost);


}




}
?>

