<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/fontawesome/css/all.css"/>
    <title>Meu Sistema</title>
</head>
<!--Start Top bar-->
<body>
<header>
    <div class="top-bar">
        <div class="logo">
            <img src="assets/images/logo2.png" />
            <!-- <i class="fas fa-atom"></i>
            <h2>Meu Sistema</h2> -->
        </div>
        <div class="top-menu">
            <img src="media/perfil.jpg" alt="Avatar"/>
            <div class="user">Francisco</div>
            <i class="fas fa-angle-down"></i>
            <div class="top-menu-child">
                <ul>
                    <a href="#">
                        <li><i class="far fa-address-card"></i>Perfil do Usuário</li>
                    </a>
                    <a href="#">
                        <li><i class="fas fa-sign-out-alt"></i>Sair do Sistema</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</header>
<!--End top bar-->
<!--Start Main-->
<section>
    <div class="main">
        <div class="side-bar">
            <div class="welcome">
                <img src="media/perfil.jpg" alt="Avatar"/>
                <div class="welcome-user">
                    <div>Usuário,</div>
                    <div class="user">Francisco</div>                    
                </div>
            </div>
            <h3>Geral</h3>
            <nav>
                <div class="main-menu">
                    <ul>
                        <li class="active"><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                    </ul>
                    <input type="checkbox" id="register"/>
                    <label for="register"><i class="fas fa-tachometer-alt"></i><span>Cadastro</span><i
                                class="fas fa-angle-down"></i></label>
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
                        
                    </ul>
                    <h3>Administração</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-users"></i>Financeiro</a></li>
                        <li><a href="#"><i class="fas fa-user"></i>Usuários</a></li>
                        <li><a href="#"><i class="fas fa-key"></i>Permissões</a></li>
                        <li><a href="#"><i class="fas fa-users"></i>Back up</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="content">
            <div>teste teste teste<br>teste teste</div>
        </div>
    </div>
</section>
<!--End main-->
<footer>
    <div class="fixed"></div>
    <div class="left">...</div>
    <div class="right">
        <label>Meu Sisitema - Desenvolvido com <span class="health">&#10084</span> por
            <a href="https://www.soje.com.br" target="_blank">Rafael Soje</a>
        </label>
    </div>
</footer>
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>


