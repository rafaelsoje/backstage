<?=$render('header', ['loggedUser' => $loggedUser]); ?>

    <section class="backup">
        <h1>Lista de backups</h1> 
        <?php if(!empty($backup)):?>
            <form action="<?=$base;?>/backup/novo" method="post">
                <input class="warning" type="submit" value="Novo Backup"/>
            </form>

        <table class="backup">
            <tr>                
                <th>Nome</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Tamanho</th>
                <th>Ação</th>
            </tr>            
            <?php foreach($backup as $item):?>                
            <?php $datetime = explode(' ', $item['created_at']); ?>             
            <?php $date = implode('/', array_reverse(explode('-', $datetime[0])));?> 
            <?php $time = $datetime[1];?>              
            <tr>                
                <?php $name = explode('.' , $item['name']);?>
                <td><?=$name[0];?></td>
                <td><?=$date;?></td>
                <td><?=$time;?></td>
                <td><?=$item['size']. ' KB';?></td>
                <td>
                    <a class="success" href="<?=$base;?>/<?=$item['path'].$item['name'];?>">Download</a>
                    <a class="danger" href="<?=$base;?>/backup/delete/<?=$item['id'];?>" onclick="return confirm('Deseja Excluir este Backup?')">Excluir</a>
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


        
<?=$render('footer', []);?>