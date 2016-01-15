<?php ob_start();
$fromemail="Project Planner <YOUR-EMAIL@DOMAIN.COM>"; // change here if you want
$toemail="youremail@domain.com";   // Your Email where you want to receive planner request.
$sub="Project planner proposal";          // Email Subject
$success_page_name="thanks.html";
////// do not change in following
if($_SERVER['REQUEST_METHOD']=="POST")
{
$fieldnm_1=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_1']));  
$fieldnm_2=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_2']));  
$fieldnm_3=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_3']));  
$fieldnm_4=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_4']));  
$fieldnm_5=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_5']));  
$fieldnm_6=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_6']));  
$fieldnm_7=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_7']));  
$fieldnm_8=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_8']));  
$fieldnm_9=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_9']));  
$fieldnm_10=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_10']));  
$fieldnm_11=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_11']));  
$fieldnm_12=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_12']));  
$fieldnm_13=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_13']));  
$fieldnm_14=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_14']));  
$fieldnm_15=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_15']));  
$fieldnm_16=str_replace ( array("\n"), array("<br>"),trim($_REQUEST['fieldnm_16']));  


$contentmsg=stripslashes("<br><b><font style=color:#CC3300>$sub</font></b><br>
<table width=708 border=0 cellpadding=2 cellspacing=1 bgcolor=#CCCCCC>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Your name *:</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_1</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Your E-mail *:</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_2</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Telephone number :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_3</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Company name :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_4</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Current URL (if applicable) :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_5</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Your location :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_6</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Your project idea :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_7</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Your requirements :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_8</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>When do you hope to start :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_9</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>When do you hope to launch :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_10</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Your project budget *:</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_11</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Please describe your desired look and feel :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_12</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Any inspirations for your project :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_13</td>
</tr>

<tr>
      <td width=165 align=right valign=top bgcolor=#FFFFFF><B>Any extra information that may be helpful for your project :</b> </td>
      <td width=565 align=left valign=top bgcolor=#FFFFFF>$fieldnm_14</td>
</tr>

</table>
");

////
$headers  = "MIME-Version: 1.0
";
$headers .= "Content-type: text/html; charset=iso-8859-1
";
				
$from=$fromemail;
				
$headers .= "From: ".$from." 
";
				
@mail($toemail,$sub,$contentmsg,$headers);
				
				
header("Location:$success_page_name");

}
?>
