<?php
     
        $con = mysqli_connect("us-cdbr-east-02.cleardb.com","bbb9298efa9b93","5f62769a");

        if (!$con){
            die('Could not connect: ' . mysql_error());
            return json_encode(array('rusult' => '1', 'data' => '伺服器連接失敗'));
        }

        $selected = mysqli_select_db($con, "heroku_4b25007c650d0dd") ;
        //mysql_select_db("project", $con);

        $sql="UPDATE chatroom SET nickname='$_POST[nickname]'
        WHERE userID='$_POST[userID]' AND chatRoomID='$_POST[chatRoomID]'";

        mysqli_query($con,$sql);

        if (!mysqli_query($con,$sql))
        {
        //die 'Error: ' . mysqli_error($con);
        echo json_encode(array('rusult' => '1', 'data' => '修改聊天室中本人的暱稱失敗', 'error' => mysqli_error($con)));
        echo ('Error: ' . mysqli_error($con));
        }else{
        echo json_encode(array('rusult' => '0', 'data' => '修改聊天室中本人的暱稱成功'));
        }
        mysqli_close($con)
?>
