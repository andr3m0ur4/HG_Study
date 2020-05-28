<?php
// Insere o cabeçaçho da página
$category = 'class="active"';
$title = "Categorias";
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
            <h4 class="title">Exclusão/Edição</h4>
            <p class="category">Artigos</p>

        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <th>ID</th>
                <th>Nome</th>

                <?php
                $query = "SELECT * FROM categoria";
                $result = mysqli_query($dbc, $query)
                        or die('Ocorreu um erro acessando o banco de dados.');
                ?>

                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <?php echo '<td>' . $row['id_categoria'] . '</td>'; ?>
                            <?php echo '<td>' . $row['descricao'] . '</td>'; ?>
                            <td class="td-actions text-right">
                                <a href="edit.php?id_categoria=<?php echo $row['id_categoria']; ?>">
                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <a href="remove.php?id_categoria=<?php echo $row['id_categoria']; ?>">
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

            <div class="col-md-12">
                <div class="card card-plain">

                    <div class="content table-responsive table-full-width">
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> Updated 3 minutes ago
                            </div>
                        </div>                
                    </div>      

                </div>      

            </div>      
        </div>
    </div>

    <div><h4 class="text-align:center">Adicionar Categoria</h4></div>
    <div class="row">
        <div class="col-lg-6" style="margin-bottom:5%">
            <div class="input-group">
                <div class="input-group-btn">
                    <form method="POST" action="edit.php">
                        <input type="text" name="descricao" class="form-control" aria-label="...">
                        <button type="submit" name="submit" class="btn btn-default dropdown-toggle" aria-haspopup="true" aria-expanded="false">Salvar </button>
                    </form>
                </div><!-- /btn-group -->
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
</div>
<?php
// Insere o rodapé da página
require_once './script/footer.php';
