<?php
// Insere o cabeçaçho da página
$comment = 'class="active"';
$title = "Comentários";
require_once 'script/header.php';

//require_once './script/appvars.php';
require_once './script/connectvars.php';

// Conecta-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar com o banco de dados.');
mysqli_set_charset($dbc, 'utf8');
?>


<div class="col-md-12">
    <div class="card card-plain">
        <div class="header">
            <h4 class="title">Exclusão</h4>

        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <th>ID</th>
                <th>Mensagem</th>
                <th>Nome do Usuário</th>
                <th>Título do Artigo</th>

                <?php
                $query = "SELECT com.id_comentario, com.mensagem, ori.nome AS nome_ori, ori.sobrenome AS sobrenome_ori, "
                        . "est.nome AS nome_est, est.sobrenome AS sobrenome_est, art.title "
                        . "FROM comentario AS com "
                        . "LEFT OUTER JOIN orientador AS ori USING(id_orientador) "
                        . "LEFT OUTER JOIN estudante AS est USING(id_estudante) "
                        . "INNER JOIN artigo AS art USING(id_artigo)";
                $result = mysqli_query($dbc, $query)
                        or die('Ocorreu um erro acessando o banco de dados.');
                ?>

                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <?php echo '<td>' . $row['id_comentario'] . '</td>'; ?>
                            <?php echo '<td>' . $row['mensagem'] . '</td>'; ?>
                            <?php echo '<td>' . $row['nome_est'] . ' ' . $row['sobrenome_est'] . $row['nome_ori'] . ' ' . $row['sobrenome_ori'] . '</td>'; ?>
                            <?php echo '<td>' . $row['title'] . '</td>'; ?>
                            <td class="td-actions text-right">

                                <a href="remove.php?id_comentario=<?php echo $row['id_comentario']; ?>">
                                    <button type="button" rel="tooltip" title="Excluir" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>



            <div class="footer">
                <hr>
                <div class="stats">
                    <i class="fa fa-history"></i> Updated 3 minutes ago
                </div>
            </div>                            </div>      

    </div>      

</div>      
</div>
</div>

<?php
// Insere o rodapé da página
require_once './script/footer.php';
