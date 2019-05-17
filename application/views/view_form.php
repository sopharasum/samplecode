<html>
<head>
<title>Codeigniter Email</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<style type="text/css">
	

body {
font-family: 'Roboto Condensed', sans-serif;
}
.main{
width: 1015px;
position: absolute;
top: 10%;
left: 20%;
font-family:raleway;
}
#form_head{
text-align: center;
background-color: #FEFFED;
height: 66px;
margin: 0 0 -29px 0;
padding-top: 35px;
border-radius: 8px 8px 0 0;
color: rgb(97, 94, 94);
}
#content {
position: relative;
width: 443px;
border: 2px solid gray;
border-radius: 10px;
margin-top: 5px;;
margin-left: -60px;
padding-bottom: 85px;
font-family:raleway;
}
#form_input{
margin-left: 50px;
margin-top: 36px;
}
label{
margin-right: 6px;
font-family:raleway;
}
#form_button{
padding: 0 21px 15px 15px;
position: absolute;
bottom: 0px;
width: 407px;
background-color: #FEFFED;
border-radius: 0px 0px 8px 8px;
border-top: 1px solid #9A9A9A;
}
.submit{
font-size: 16px;
background: linear-gradient(#ffbc00 5%, #ffdd7f 100%);
border: 1px solid #e5a900;
color: #4E4D4B;
font-weight: bold;
cursor: pointer;
width: 300px;
border-radius: 5px;
padding: 10px 0;
outline: none;
margin-top: 20px;
margin-left: 15%;
}
.submit:hover{
background: linear-gradient(#ffdd7f 5%, #ffbc00 100%);
}
.input_box, textarea{
height:40px;
width:340px;
padding:20px 20px 20px 10px;
margin-top: 5px;
border: 1px solid #ccc;
font-size: 16px;
font-family:raleway;
background-color:#FEFFED;
}
textarea{
height:100px;
padding-bottom: 30px;
}
.msg{
color : blue;
}
.error_msg{
color: red;
}


</style>
</head>
<body>
<div class="main">
<div id="content">
<h2 id="form_head">Codelgniter Email</h2>
<div id="form_input">
<div class="msg">
<?php
if (isset($message_display)) {
echo $message_display;
}
?>
</div>
<?php
echo '<div class="error_msg">';
echo validation_errors();
echo "</div>";
echo form_open('ci_email_tutorial/send_mail');
echo form_label('Email-ID');
echo "<div class='all_input'>";
$data_email = array(
'type' => 'email',
'name' => 'user_email',
'id' => 'e_email_id',
'class' => 'input_box',
'placeholder' => 'Please Enter Email'
);
echo form_input($data_email);
echo "</div>";
echo form_label('Password');
echo "<div class='all_input'>";
$data_password = array(
'name' => 'user_password',
'id' => 'password_id',
'class' => 'input_box',
'placeholder' => 'Please Enter Password'
);
echo form_password($data_password);
echo "</div>";
echo form_label('Name');
echo "<div class='all_input'>";
$data_email = array(
'name' => 'name',
'class' => 'input_box',
'placeholder' => 'Please Enter Name'
);
echo form_input($data_email);
echo "</div>";
echo form_label('To');
echo "<div class='all_input'>";
$data_email = array(
'type' => 'email',
'name' => 'to_email',
'class' => 'input_box',
'placeholder' => 'Please Enter Email'
);
echo form_input($data_email);
echo "</div>";
echo form_label('Subject');
echo "<div class='all_input'>";
$data_subject = array(
'name' => 'subject',
'class' => 'input_box',
);
echo form_input($data_subject);
echo "</div>";
echo form_label('Message');
echo "<div class='all_input'>";
$data_message = array(
'name' => 'message',
'rows' => 5,
'cols' => 32
);
echo form_textarea($data_message);
echo "</div>";
?>
</div>
<div id="form_button">
<?php echo form_submit('submit', 'Send', "class='submit'"); ?>
</div>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>

