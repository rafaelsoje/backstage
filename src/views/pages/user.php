<?php $render('header', ['loggedUser' => $loggedUser]);?>
<section class="users">
    <h1>Lista de Usuários</h1>
    <?php if(!empty($getUser)):?>
            <form action="<?=$base;?>/backup/novo" method="post">
                <input class="warning" type="submit" value="Novo Usuário"/>
            </form>

        <table class="backup">
            <tr>                
                <th>Nome</th>
                <th>Email</th>
                <th>Ação</th>
            </tr>            
            <?php foreach($getUser as $user):?>  
            <tr> 
                <td><?=$user['name'];?></td>
                <td><?=$user['email'];?></td>                
                <td>
                    <a class="success" href="#">Visualizar</a>
                    <a class="warning" href="#">Editar</a>
                </td>
            </tr> 
            <?php endforeach;?>
            </table>
        <?php else:?>
            <form action="<?=$base;?>/backup/novo" method="post">
                <label>Nenhum backup realizado. Para fazer Backup clique <input type="submit" value="aqui"/></label>
            </form>
        <?php endif;?>
</section>
<?php $render('footer', []);?>