<?=$render('header', ['loggedUser' => $loggedUser]); ?>

    <section class="backup">
        <h1>Lista de backups</h1>   

        <?php if(!empty($backup)):?>  

        <table class="backup">
            <tr>
                <th>Caminho</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Tamanho</th>
                <th>Ação</th>
            </tr>            
            <?php foreach($backup as $item):?>
            <?php $db = implode('/', array_reverse(explode('-', $item['created_at']))); ?>                
            <tr>
                <td><?=$item['path'];?></td>
                <td><?=$item['name'];?></td>
                <td><?=$db;?></td>
                <td><?=$item['size']. ' KB';?></td>
                <td>
                    <a class="success" href="<?=$base;?>/<?=$item['path'].$item['name'];?>">Download</a>
                    <a class="danger" href="#">Excluir</a>
                </td>
            </tr> 
            <?php endforeach;?>
            </table>
        <?php else:?>
            <form action="<?=$base;?>/backup/novo" method="post">
                <h4>Nenhum backup realizado. Para fazer Backup clique <input type="submit" value="aqui"/></h4>
            </form>
        <?php endif;?>
    </section>


        
<?=$render('footer', []);?>