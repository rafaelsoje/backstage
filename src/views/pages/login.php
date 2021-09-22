<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login - Backstage</title>
    <!-- <link rel="shortcut icon" href="caminhodoarquivo/favicon.ico" /> -->
    <link rel="icon" href="<?=$base;?>/assets/images/icon.png" />
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css">    
</head>
<body>
<div class="backgrond">
	<div class="container">
		<div class="login-area">
            <div class="avatar">
                <img src="assets/images/logo.png" />
            </div>
            <form action="<?=$base;?>/login" method="post">
                <div class="input">
                    <label class="label">Login</label>
                    <input type="email" name="email" placeholder="Digite o Usuário" autofocus required/>
                    <input type="password" name="password" placeholder="Digite a Senha" required/>

                    <?php $_SESSION['flash'] = "Usuario e/ou senha inválidos.";?>
                    <?php if(isset($_SESSION['flash'])):?>
                        <?php echo '<div class="flash">'.$_SESSION['flash'].'</div>';?>
                    <?php endif;?>

                    <input class="button" type="submit" value="Enviar"/>
                </div>                
            </form>
            <a href="#">Esqueci minha senha!</a>
            <!-- <?php $pass = password_hash('123', PASSWORD_DEFAULT);?>
            <?=$pass;?> -->
		</div>
	</div>
</div>
</body>
</html>