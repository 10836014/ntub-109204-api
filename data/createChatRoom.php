<?php
     
     $con = mysqli_connect("us-cdbr-east-02.cleardb.com","bbb9298efa9b93","5f62769a");

     /*if ($con){
        echo "result:1"; 
     }*/
     if (!$con){
         die('Could not connect: ' . mysql_error());
         return json_encode(array('rusult' => '1', 'data' => '伺服器連接失敗'));
     }

     $selected = mysqli_select_db($con, "heroku_4b25007c650d0dd") ;

     $sql="INSERT INTO chatroom (userId, nickName, roleId,
                                roleName, rolePhoto, habbitName,
                                habbitId, signedTime, orginalIntention, 
                                goodnees, badnees,compeltion)
        VALUES 
            ('$_POST[userID]','$_POST[nickName]', '$_POST[roleId]', 
            '$_POST[roleName]', '$_POST[rolePhoto]', '$_POST[habbitName]',
            '$_POST[habbitId]', '$_POST[signedTime]', '$_POST[orginalIntention]',
             '$_POST[goodnees]','$_POST[badnees]', 0)";

     if (!mysqli_query($con,$sql))
     {
     //die 'Error: ' . mysqli_error($con);
     echo json_encode(array('rusult' => '1', 'data' => '添加失敗', 'error' => mysqli_error($con)));
     echo ('Error: ' . mysqli_error($con));
     }else{
     echo json_encode(array('rusult' => '0', 'data' => '添加成功'));
     }
     mysqli_close($con)
?>
