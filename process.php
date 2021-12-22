<?php 

    if(isset($_POST['btn-send']))
    {
       $UserName = $_POST['UName'];
       $Email = $_POST['Email'];
       $Subject = $_POST['Subject'];
       $Msg = $_POST['msg'];

       if(empty($UserName) || empty($Email) || empty($Subject) || empty($Msg))
       {
           header('location:index.html');
       }
       else
       {
           $to = "khoaizahmmed@gmail.com";

           if(mail($to,$Subject,$Msg,$Email))
           {
               header("location:index.html");
           }
       }
    }
    else
    {
        header("location:index.php");
    }
?>