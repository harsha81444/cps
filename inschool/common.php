<?php ob_start(); ?>
<?php
/* Check if this is a valid include */
if (!defined('IN_SCRIPT')) {die('Invalid attempt');} 
session_start();
//Clean Session Variables

function edu_cleansession($arr)
{
	if (is_array($arr))
	{
		foreach ($arr as $str)
		{
			if (isset($_SESSION[$str]))
			{
				unset($_SESSION[$str]);
			}
		}
	}
	elseif (isset($_SESSION[$arr]))
	{
		unset($_SESSION[$arr]);
	}
} 

//process messages

function edu_process_msg($message,$redirect,$type='ERROR')
{
	global $edu_settings,$edu_lang;
	
	switch($type)
	{
		case 'SUCCESS':
			$_SESSION['EDU_SUCCESS']=True;
			break;
		case 'NOTICE':
			$_SESSION['EDU_NOTICE']=True;
			break;
		default:
			$_SESSION['EDU_ERROR']=True;
		
	}
	
	$_SESSION['EDU_MESSAGE']=$message;
	
	if($redirect=='NOREDIRECT')
	{
		return true;
	}
	
	header('Location: '.$redirect);
	exit();
}

//To Handle Messages

function edu_handle_msg()
{
	global $edu_settings,$edu_lang;
	
	if(isset($_SESSION['EDU_SUCCESS']))
	{
		edu_show_success($_SESSION['EDU_MESSAGE']);
		edu_cleansession('EDU_SUCCESS');
		edu_cleansession('EDU_MESSAGE');
	}
	
	if(isset($_SESSION['EDU_ERROR']))
	{
	
		edu_show_error($_SESSION['EDU_MESSAGE']);
		edu_cleansession('EDU_ERROR');
		edu_cleansession('EDU_MESSAGE');
	}
	
	if(isset($_SESSION['EDU_NOTICE']))
	{
		edu_show_notice($_SESSION['EDU_MESSAGE']);
		edu_cleansession('EDU_NOTICE');
		edu_cleansession('EDU_MESSAGE');
	}
	return TRUE;
}
//To show errors

function edu_show_error($message,$title='')
{

	global $edu_settings,$edu_lang;
	$title=$title ? $title : "Error";
	?>
	<div>
	<b style="color:#ff0000"><?php echo $title;?></b><p class="error" style="color:#ff0000"><?php echo $message;?></p>
	</div>
	<br/>
<?php
}

//To show success

function edu_show_success($message,$title='')
{
	global $edu_settings,$edu_lang;
	$title=$title ? $title : $edu_lang['SUCCESS'];
	?>
	<div>
	<b style="color:#0000ff"><?php echo $title;?></b><p class="success" style="color:#0000ff"><?php echo $message;?></p>
	</div>
	<br/>
<?php
}

//To show Notice

function edu_show_notice($message,$title='')
{
	global $edu_settings,$edu_lang;
	$title=$title ? $title : $edu_lang['NOTICE'];
	?>
	<div>
	<b><?php echo $title;?></b><p><?php echo $message;?></p>
	</div>
	<br/>
<?php
}
//To stop the session
function edu_session_stop()
{
session_unset();
session_destroy();
return true;
}

//To check if loggedin
function is_logged()
{

	
	if(isset($_SESSION['username']))
	{
	return true;
		
	}
	else
	{
		
		edu_process_msg('You are not authorized to view this page.Please Login.','index.php','ERROR');
	}
}

/* SHAFEE FUNCTIONS ON 18-12-2013 - START */

function pre($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function remove_old_file($path)
{
	if(file_exists($path))
	{
		unlink($path);
	}
}
	
	
function getImg($user_type,$user_id)
{
	error_reporting(0);
	include("database.php");
	if($user_type=='Principal')
	{
		$pra	= "select * from adminlogin";
		$prqra	= mysql_query($pra);
		$prfa	= mysql_fetch_array($prqra);
		return ($prfa['profile']!='') ? $prfa['profile'] : 'images/small_noimage.png';
	} else if($user_type=='Staff') {
		$prs	= "select * from staffs where id=".$user_id;
		$prqrs	= mysql_query($prs);
		$prfs	= mysql_fetch_array($prqrs);
		return ($prfs['staff_img']!='') ? $prfs['staff_img'] : 'images/small_noimage.png';
	} else if($user_type=='Parent') {
		$prp	= "select * from students where id=".$user_id;
		$prqrp	= mysql_query($prp);
		$prfp	= mysql_fetch_array($prqrp);
		return ($prfp['stu_img']!='') ? $prfp['stu_img'] : 'images/small_noimage.png';
	} else {
		return 'images/small_noimage.png';
	}
	
}

function getAdmin($col)
{
	error_reporting(0);
	include("database.php");
	$sql	= mysql_query("select ".$col." from adminlogin");
	$sqlExu	= mysql_fetch_array($sql);
	return $sqlExu[$col];
}

function getMap($adrs)
{
	$json 		= file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$adrs&sensor=false&region=$region");
	$json 		= json_decode($json);
	$lat 		= $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
	$long 		= $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
	return '<img src="http://maps.googleapis.com/maps/api/staticmap?center='.$adrs.'&zoom=13&size=710x315&&markers=color:red%7Ccolor:red%7Clabel:C%7C'.$lat.','.$long.'&sensor=false">'; 
}

function getStudName($rollno)
{
	$sql 			= "SELECT student_name, stu_img FROM students WHERE rollno='".$rollno."'";
	$sqlExu 		= mysql_query($sql);
	$getRes			= mysql_fetch_array($sqlExu);
	$imgPath		= ($getRes['stu_img']!='') ? $getRes['stu_img'] : 'images/student/noimage.jpg';	
	return trim($getRes['student_name']).'<img src="'.$imgPath.'" alt="" width="100" height="75">';
}

$months 	= array ('January', 'February', 'March', 'April', 'May', 'June','July', 'August', 'September', 'October', 'November', 'December');
$weekday 	= array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
$days 		= range (1, 31);
$years 		= range (1980, 2050);

/* SHAFEE FUNCTIONS ON 18-12-2013 - END */

?>

		