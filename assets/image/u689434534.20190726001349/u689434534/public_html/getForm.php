<?php
//$sql = new mysqli('localhost','root','','mp') or die (mysql_error());
/*
if (isset($_POST['button'])) {
	
	$type = $_POST['button'];
	
	if ($type == "phone") {

		$name = $_POST['name'];
		$number = $_POST['tel'];
		$subject = $_POST['subject'];
		
		$conexao = mysqli_connect('localhost','root','','mp') 
		or die("<script>alert('O serviço está fora do ar. Tente novemente mais tarde.')");
		
		mysqli_query($conexao,"insert into cliente values(default)");
		
		$sql = mysqli_query($conexao,"select MAX(id) from cliente");

		//$sql = mysqli_fetch_assoc($sql);

		
	        $dados=mysqli_fetch_array($sql);
	        try {
	        	echo $dados[0];
				mysqli_query($conexao,"insert into clientephone values('$dados[0]','$name','$number','$subject', NOW())") 
				or die("<script>alert('Não foi possível enviar seus dados. Tente novemente mais tarde.')</script>");
	        	
	        } catch (Exception $e) {
	        	echo $e->erroe_log;
	        }

		/*while($dados=mysqli_fetch_assoc($sql))
	    {
	        echo $dados['id'].'<br>';
	    }*/
/*
		mysqli_close($conexao);
		
		echo "<script>alert('Olá $name, seu número de telefone foi enviado a nossa equipe, entraremos em contato em breve.')</script>";

	}else if($type == "email"){

		$subject = $_POST['subject'];
		$name = $_POST['name'];
		$msg = $_POST['message'];
		$email = $_POST['email'];

		$conexao = mysqli_connect('localhost','root','','mp') 
		or die("<script>alert('O serviço está fora do ar. Tente novemente mais tarde.')");

		mysqli_query($conexao,"insert into cliente values(default)");
		
		$sql = mysqli_query($conexao,"select MAX(id) from cliente");


		while ($dados = mysqli_fetch_array($sql)){
			mysqli_query( $conexao,"insert into clienteemail values ('$dados[0]','$name','$email','$subject','$msg', NOW())")
			or die("<script>alert('Não foi possível enviar seus dados. Tente novemente mais tarde.')</script>");
		}
		echo "<script>alert('Olá $name, sua menssagem foi enviada a nossa equipe, entraremos em contato em breve.')</script>";
	}
}
//$msg = $_POST['message'];
//echo "<script>alert('$msg')</script>";
//echo "<script>window.location.replace();</script>";
//header("Location: index.html");
/*echo "<script type=\"text/javascript\">
	setTimeout(\"window.location='index.html'\", 10);
</script>";
*/
if(isset($_POST['type'])){
    header('Content-Type: text/html; charset=UTF-8');
    $message = "";
    if($_POST['type'] == "tel"){
        $nome = $_POST['name'];
        $tel = $_POST['tel'];
        $opt = $_POST['opt'];
        
        $message = "| Mensagem Automatica - Site <br>| Nome: ".$nome."<br>"."| Tipo: Chamada <br>| Telefone: ".$tel."<br>| Interesse: ".$opt;    
    }else if($_POST['type'] == "msg"){
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $opt = $_POST['opt'];
        $msg = $_POST['msg'];
        if(strlen($msg) > 70) $msg = wordwrap($msg,70);
        
        $message = "| Mensagem Automática - Site<br>| Nome: ".$nome."<br>"."| Tipo: E-mail <br>| E-mail: ".$email."<br>| Interesse: ".$opt."<br>| Mensagem: ".$msg;
    }
    
    $from = "jpereiraautopecas@gmail.com"; 

    $to = "jpereiraautopecas@gmail.com";
    
    $subject = "=?UTF-8?B?".base64_encode("Site Mercadão Contato")."?=";
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    
    //$message = "=?UTF-8?B?" . base64_encode("olá") . "?="; 
    
    mail($to, $subject, $message, $headers);
}

           


?>