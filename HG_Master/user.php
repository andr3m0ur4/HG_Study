<?php
// Insere o cabeçaçho da página
$article = 'class="active"';
$title = "Publicações";
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
            <h4 class="title">Exclusão/Aceitação</h4>

        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Autor</th>

                <?php
                $query = "SELECT * FROM artigo INNER JOIN orientador USING(id_orientador) "
                . "ORDER BY id_artigo DESC";
                $result = mysqli_query($dbc, $query)
                        or die('Ocorreu um erro acessando o banco de dados.');
                ?>

                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <?php echo '<td>' . $row['id_artigo'] . '</td>'; ?>
                            <?php echo '<td>' . $row['title'] . '</td>'; ?>
                            <?php echo '<td>' . $row['nome'] . ' ' . $row['sobrenome'] . '</td>'; ?>
                            <td class="td-actions text-right">
                                <?php
                                if ($row['approved'] == 0) {
                                    ?>
                                    <a href="approve.php?id_artigo=<?php echo $row['id_artigo']; ?>">
                                        <button type="button" rel="tooltip" title="Confirmar" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <?php
                                }
                                ?>
                                <a href="remove.php?id_artigo=<?php echo $row['id_artigo']; ?>">
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
