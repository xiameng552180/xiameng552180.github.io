<html>
<body>

Welcome <?php echo $_POST["Name"]; ?><br>
Your email address is: <?php echo $_POST["Email"]; ?>
Your phone_number is: <?php echo $_POST["phone"]; ?>
Your message is: <?php echo $_POST["Message"]; ?>
<?php
require_once "Smtp.class.php";

	$smtpserver = "smtp.163.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "dzxxjsjyq@163.com";//SMTP服务器的用户邮箱
	$smtpemailto = "1832502299@qq.com";//发送给谁
	$smtpuser = "dzxxjsjyq";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
	$smtppass = "huanghai";//SMTP服务器的用户密码
	$mailtitle = "Someone has sent an e-mail to you from Meng Xia's homepage";//邮件主题
	$mailcontent = "<h2>Name<h2><p>" . $_POST["Name"] . "</p>"
	. "<h2>Email<h2><p>" . $_POST["Email"] . "</p>"
	. "<h2>phone<h2><p>" . $_POST["phone"] . "</p>"
	. "<h2>Message<h2><p>" . $_POST["Message"] . "</p>";//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	echo "<div style='width:300px; margin:36px auto;'>";
	if($state==""){
		echo "Sorry! Fial to send message.";
		echo "<a href='index.html'>Go back</a>";
		exit();
	}
	echo "Congratulations! Succed to send message.";
	echo "<a href='index.html'>Go back</a>";
	echo "</div>";

?>
</body>
</html>