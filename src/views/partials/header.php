<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">     
    <link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/style.css"/>    
    <title>Backstage - Sistema para gestão de eventos</title>
</head>
<body>
<header>
    <!-- <div class="top-bar">
        <div class="logo">
            <img src="<?=$base;?>/assets/images/logo.png" />            
            <h2>Meu Sistema</h2> 
        </div>
        <div class="top-menu">
            <img src="media/perfil.jpg" alt="Avatar"/>
            <div class="user">
                <?php ;?>
                <?php ;?>
            </div>
            <i class="fas fa-angle-down"></i>
            <div class="top-menu-child">
                <ul>                  
                    <li><a href="#">Perfil do Usuário</a></li>
                    <li><a href="<?=$base;?>/sair">Sair do Sistema</a></li>                     
                </ul>
            </div>
        </div>
    </div> -->
</header>
<!--End top bar-->
<!--Start Main-->
<section>
    <div class="main">
        <div class="side-bar">
            <div class="welcome">
                <img src="<?=$base;?>/media/perfil.jpg" alt="Avatar"/>
                <div class="welcome-user">
                    <div>Bem vindo(a),</div>
                    <?php $name = explode(' ', $loggedUser->name);?>
                    <div class="user"><?=$name[0] ;?></div>
                </div>
            </div>
            <h3>Geral</h3>
            <nav>
                <div class="main-menu">
                    <ul>
                        <li class="active"><a href="<?=$base;?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                    </ul>
                    <input type="checkbox" id="register"/>
                    <label for="register"><i class="fas fa-tachometer-alt"></i><span>Cadastro</span><i class="fas fa-angle-down"></i></label>
                    <ul class="child">
                        <li><a href="#"><i class="fas fa-users"></i>Eventos</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Clientes</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Fornecedores</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Funcionários</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Transportes</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Equipamentos</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Locais</a></li>
                    </ul>
                    <input type="checkbox" id="property"/>
                    <label for="property"><i class="fas fa-tachometer-alt"></i><span>Propriedades</span><i
                                class="fas fa-angle-down"></i></label>
                    <ul class="child">
                        <li><a href="#"><i class="fas fa-users"></i>Tipos de Eventos</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Trajes</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Classes de Equipamentos</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Tipos de Transporte</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Atividades</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Causas</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Históricos</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Taxas de Evento</a></li>
                    </ul>
                    <ul>
                        <li><a href="#"><i class="fas fa-users"></i>Fichas</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Movimentação</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Consultas</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Relatórios</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Perfil do Usuário</a></li>
                        
                    </ul>
                    <h3>Administração</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-users"></i>Financeiro</a></li>
                        <li><a href="#"><i class="fas fa-user"></i>Usuários</a></li>
                        <li><a href="#"><i class="fas fa-key"></i>Permissões</a></li>
                        <li><a href="<?=$base;?>/backup"><i class="fas fa-users"></i>Back up</a></li>
                    </ul>
                    <h3>Logout</h3>
                    <ul>
                        <li><a href="<?=$base;?>/sair"><i class="fas fa-users"></i>Sair</a></li>                        
                    </ul>
                </div>
            </nav>
        </div>
        <div class="content">