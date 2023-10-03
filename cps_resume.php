<?php
include "includes/header.php";
?>

<section id "slider" class="main-content">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                
 

					             <div class="col-md-8">
<h4> <i class="icon-leaf"></i>&nbsp;&nbsp;UPLOAD RESUME</h4> 

  <div id='msg'></div >
  <form id="#details" class="form-horizontal" role="form" onsubmit="return validateForm()" method='POST'  enctype="multipart/form-data">

    <div class="form-group">
      <label class="col-sm-2 control-label">Name</label>
      <div class="col-sm-8">
        <input class="form-control" id="name" type="text" name="name">
      </div>
    </div>
       <div class="form-group">
      <label class="col-sm-2 control-label">DOB</label>
      <div class="col-sm-8">
        <input class="form-control" id="date" type="date" name="date">
      </div>
    </div>
       <div class="form-group">
      <label class="col-sm-2 control-label">Gender</label>
      <div class="col-sm-8">
       <select name='gender' class="form-control" id='gender'>
              <option value=''>----------SELECT-----------</option>
              <option value='male'>Male</option>
              <option value='female'>Female</option>
       </select>
      </div>
    </div>
       <div class="form-group">
      <label class="col-sm-2 control-label">Email</label>
      <div class="col-sm-8">
        <input class="form-control" id="email" type="text" name="email">
      </div>
    </div>
       <div class="form-group">
      <label class="col-sm-2 control-label">Mobile</label>
      <div class="col-sm-8">
        <input class="form-control" id="mobile" type="text" name="mobile">
      </div>
    </div>
       <div class="form-group">
      <label class="col-sm-2 control-label">Qualification</label>
      <div class="col-sm-8">
        <input class="form-control" id="qul" type="text" name="qualification">
      </div>
    </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Resume</label>
          <div class="col-sm-8">
            <input class="form-control" id="resume" type="file" name="file">
          </div>
    </div>

        <div class="form-group">
      <label class="col-sm-2 control-label">Position</label>
      <div class="col-sm-8">
       <select name='position' id="pos" class="form-control">
        <option value="">---------Select----------</option>
               
       </select>
      </div>
    </div>

           <div class="form-group">
      <label class="col-sm-2 control-label"></label>
      <div class="col-sm-8">
      <input type='submit' name="submit" class='btn btn-success' ><span id='error'></span>
      </div>
    </div>

   
  </form>



            
            </div>
				   

            </div>
           <!-- <div class="span6">
                <a class="btn btn-success btn-small pull-left" href="#">Current Updates</a>
				<div class="media-body1"><p><script language=javascript src="js/dnews.js">
</script>			</p> -->
 <h4><i class="icon-leaf"></i>&nbsp;&nbsp;CAREERS</h4>
                
<p class="no-margin" style="text-align:justify"> Chettinad Public School offers the best working ambience along with a package best in the industry, with room for professional development and growth for the deserving candidates. If interested to join a band of highly motivated teachers who aspire to make a difference in the lives of the children, send your resume to cpskaraikudi@gmail.com</p>
				   		
				 
					</div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">


$(document).ready(function(){
$('#details').submit(processForm);
function processForm(e){
$.ajax({
  type:"POST",
  url:"career_mail.php",
  dataType: 'text',
  data:$(this).serialize(),
  beforeSend:function()
  {
      $('#msg').html('Wait Mail has Sending ...');
  },
  success:function(data)
  {
       $('#msg').html(data);
       $('.form-control').val('');
  }
});
e.preventDefault();
}
});

function validateForm()
        {
             var name=$("#name").val();
             var email=$("#email").val();
             var mobile=$("#mobile").val();
             var date=$("#date").val();

             var resume=$("#resume").val();
             var qul=$("#qul").val();
             var pos=$("#pos").val();
             var gender=$("#gender").val();
            if(name=='')
            {
                 $("#error").html("* Enter the name");
                 $("#name").addClass("val");
                 $('#name').focus();
                 return false;
            }
             else if(gender=='')
            {
                 $("#error").html("* Select The gender");
                 $("#gender").addClass("val");
                 $('#gender').focus();
                 return false;
            }
            else if(email=='')
            {
                 $("#error").html("* Enter the Email Address");
                 $("#email").addClass("val");
                 $('#email').focus();
                 return false;
            }

             else if(mobile=='')
            {
                 $("#error").html("* Enter The Mobile no");
                 $("#mobile").addClass("val");
                 $('#mobile').focus();
                 return false;
            }
                else if(qul=='')
            {
                 $("#error").html("* Enter The Qualification");
                 $("#qul").addClass("val");
                 $('#qul').focus();
                 return false;
            }
               
               else if(date=='')
            {
                 $("#error").html("* Select the DOB");
                 $("#date").addClass("val");
                 $('#date').focus();
                 return false;
            }
                  else if(resume=='')
            {
                 $("#error").html("* find the resume");
                 $("#resume").addClass("val");
                 $('#resume').focus();
                 return false;
            }
                else if(pos=='')
            {
                 $("#error").html("* Select the position");
                 $("#pos").addClass("val");
                 $('#pos').focus();
                 return false;
            }
         


        }


</script>
<?php
if(isset($_POST['submit']))
{

$name=$_POST['name'];
$dob=$_POST['date'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$qualificationme=$_POST['qualification'];
$filename = $_FILES['file']['name'];
$output_dir = "_include/";
move_uploaded_file($_FILES["file"]["tmp_name"],$output_dir. $_FILES["file"]["name"]);

$position=$_POST['position'];
require("PHPMailer/class.phpmailer.php");

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

 

    $mail->FromName ='CPS Career  Mail';
    $mail->AddAddress('cpskaraikudi@gmail.com');
    $mail->AddReplyTo($email, $name);
    $mail->WordWrap = 50;                                    // set word wrap to 50 characters
        $mail->IsHTML(true);                                  // set email format to HTML
  
       $mail->Subject = 'Chettinadu Public School Feedback Mail';    

                                    // set word wrap to 50 
       $mail->AddAttachment("_include/".$filename); 
       $mail->Body .="<table style='    margin: 20px 41px; line-height: 28px; border: #4EA7E8 solid 6px;  width: 65%;'>";

      $mail->Body .="<tr>";
      $mail->Body .="<td></td><td></td><td style='font-size: 15px;
      font-weight: 800;'>Career For CPS</td>";
      $mail->Body .="</tr>";
      $mail->Body .="<tr>";
      $mail->Body .="<td>Name</td><td>:</td><td>".$name."</td>";
      $mail->Body .="</tr>";

      $mail->Body .="<tr>";
      $mail->Body .="<td>E-mail Id </td><td>:</td><td>".$email."</td>";
      $mail->Body .="</tr>";


      $mail->Body .="<tr>";
      $mail->Body .="<td>Mobile No</td><td>:</td><td>".$mobile."</td>";
      $mail->Body .="</tr>";


      $mail->Body .="<tr>";
      $mail->Body .="<td>Position     </td><td>:</td><td>".$position."</td>";
      $mail->Body .="</tr>";

      $mail->Body .="</table>";
   
    




    $mail->AltBody = "Chettinadu Public School Contact Support Mail";

      if(!$mail->Send())
      {
        echo '<script type="text/javascript">
          alert("Message could not be sent. ");
          </script>';
         echo "Mailer Error: " . $mail->ErrorInfo;

         exit;

      }
      else
      {
        echo '<script type="text/javascript">
alert("Resume Uploaded Successfully..");
</script>';
      }
     @unlink('_include/'.$filename);



}

?>
<?php
include "includes/footer.php";
?>
