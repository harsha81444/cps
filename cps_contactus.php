<?php
include "includes/header.php";
?>

<section id "slider" class="main-content">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                
                
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3928.3462361345732!2d78.70465399999999!3d10.07069!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x833aea813507d750!2sChettinad+Public+School!5e0!3m2!1sen!2sin!4v1397883637566" width="100%" height="150px" frameborder="0" style="border:0" class="img-rounded"></iframe>


					             <div class="col-md-8">
<h4> <i class="icon-leaf"></i>&nbsp;&nbsp;FEEDBACK</h4> 

  <div id='msg'></div >
  <form id="details" class="form-horizontal" role="form" onsubmit="return validateForm()" method='POST'  enctype="multipart/form-data">

    <div class="form-group">
      <label class="col-sm-2 control-label">Name</label>
      <div class="col-sm-8">
       <input name="username" id="name"  required type="text" class="form-control" id="userName"> 
      </div>
    </div>
       <div class="form-group">
      <label class="col-sm-2 control-label">E Mail id</label>
      <div class="col-sm-8">
      <input type="email" id="email" name="emailid" required class="form-control" >
      </div>
    </div>
       <div class="form-group">
      <label class="col-sm-2 control-label">Mobile No</label>
      <div class="col-sm-8">
       <input type="text"  id="phone"  name="mobile_no" required class="form-control" >	
      </div>
    </div>
       <div class="form-group">
      <label class="col-sm-2 control-label">Suggestion	</label>
      <div class="col-sm-8">
    <textarea id="message" name="suggestion" required class="form-control"></textarea>
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
<h4><i class="icon-leaf"></i>&nbsp;&nbsp;ADDRESS</h4>
 
						 <p> <label for="contact">70E, Madurai Main Road,</label></p>
						 <p> <label for="contact">Managiri, Karaikudi 630 307,</label></p>
						 <p><label for="contact">sivagangai (Dt) </label></p>
				   		 <p><label for="contact">Phone:+91 - 9442374444 </label></p>
				 	 	 <p><label for="contact">Email: <a href="mailto:info@mycompany.com">cpskaraikudi@gmail.com</a> </label></p>
				   		
				 
					</div>
            </div>
        </div>
    </div>
</section>


<?php
include "includes/footer.php";
?>

<script type="text/javascript">
$(document).ready(function(){
$('#details').submit(processForm);
function processForm(e){
$.ajax({
  type:"POST",
  url:"contact_mail.php",
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
             var subject=$("#phone").val();
             var message=$("#message").val();
            if(name=='')
            {
                 $("#error").html("* Enter the name");
                 $("#name").addClass("val");
                 $('#name').focus();
                 return false;
            }
            else if(email=='')
            {
                 $("#error").html("* Enter the Email Address");
                 $("#email").addClass("val");
                 $('#email').focus();
                 return false;
            }

             else if(subject=='')
            {
                 $("#error").html("* Enter The phone no");
                 $("#phone").addClass("val");
                 $('#phone').focus();
                 return false;
            }
               else if(message=='')
            {
                 $("#error").html("* Enter The Message");
                 $("#message").addClass("val");
                 $('#message').focus();
                 return false;
            }

        }


</script>