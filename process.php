<?php 

    if(isset($_POST['btn-send']))
    {
       $UserName = $_POST['UName'];
       $Email = $_POST['Email'];
       $Subject = $_POST['Subject'];
       $Msg = $_POST['msg']."\n"."\n"."\n"."\n"."\n"."IP Address:https://whatismyipaddress.com/ip/{$_SERVER['REMOTE_ADDR']}";

       $secretKey = '6LdpxKIhAAAAAEAsq8SprVDC01mIs5nWHS57jBQM' ;
       $token = $_POST['g-token'] ;
       $ip = $_SERVER['REMOTE_ADDR'];

        $post =[
            'secret'=> $secretKey,
            'response'=> $token,
            'remoteip'=>$ip,
        ];
       $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
       
       // execute!
       $request = curl_exec($ch);
       
       curl_close($ch);
       

       $response = json_decode($request);


        if($response->success){

            if(empty($UserName) || empty($Email) || empty($Subject) || empty($Msg))
        {
            header('location:index.html');
        }
        else
        {
            $to = "khoaizahmmed@gmail.com" ;
            if(mail($to,$Subject,$Msg,$Email))
            {
                header("location:index.html");
            }
        }

        }


        
    }
     else
     {
         header("location:index.html");
     }
?>