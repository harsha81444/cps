<?php
error_reporting(0);
                $name=$_POST['username'];
                $email=$_POST['emailid'];
                $phone=$_POST['mobile_no'];
                $message=$_POST['suggestion'];

    include("PHPMailer/class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP(); 
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail -> charSet = "UTF-8";
    $mail->SMTPSecure = "ssl";    
    $mail->Port=587;  
    $mail->SMTPDebug  = 0;   // SMTP server

    $mail->IsSendmail();      

   // $mail->Mailer = 'smtp.gmail.com'; 

    $mail->Host="smtp.gmail.com"; 

    $mail->From = $email;

    $mail->SMTPAuth  = true;

 

    $mail->FromName ='CPS feedback Mail';
    $mail->AddAddress('hannetbrowsing@gmail.com');
    $mail->AddReplyTo($email, $name);
    $mail->WordWrap = 50;                                    // set word wrap to 50 characters
    $mail->IsHTML(true);                                  // set email format to HTML
  
    $mail->Subject = 'Chettinadu Public School Feedback Mail';    


       $mail->Body .="<table style='    margin: 20px 41px; line-height: 28px; border: #4EA7E8 solid 6px;  width: 65%;'>";

      $mail->Body .="<tr>";
      $mail->Body .="<td></td><td></td><td style='font-size: 15px;
      font-weight: 800;'>Feedback For CPS</td>";
      $mail->Body .="</tr>";
      $mail->Body .="<tr>";
      $mail->Body .="<td>Name</td><td>:</td><td>".$name."</td>";
      $mail->Body .="</tr>";

      $mail->Body .="<tr>";
      $mail->Body .="<td>E-mail Id </td><td>:</td><td>".$email."</td>";
      $mail->Body .="</tr>";


      $mail->Body .="<tr>";
      $mail->Body .="<td>Mobile No</td><td>:</td><td>".$phone."</td>";
      $mail->Body .="</tr>";


      $mail->Body .="<tr>";
      $mail->Body .="<td>Message     </td><td>:</td><td>".$message."</td>";
      $mail->Body .="</tr>";

      $mail->Body .="</table>";
   
    




    $mail->AltBody = "Chettinadu Public School Contact Support Mail";

      if(!$mail->Send())
      {

         echo "Message could not be sent. <p>";

         echo "Mailer Error: " . $mail->ErrorInfo;

         exit;

      }
      else
      {
        echo 'Thankyou Your Thoughts..';
      }

                   




                
?>