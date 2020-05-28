<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    <?php echo '<span id="search">' . $titulo . '</span>'; ?>
                </h1>	
                <form method="GET" action="search.php#search" class="serach-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-6 form-cols">
                            <input type="text" class="pesq" name="search" placeholder="Que empresa você está interessado ?">
                        </div>
                        <?php
                        $query = "SELECT * FROM categoria";
                        $result = mysqli_query($dbc, $query)
                                or die('Não foi possível acessar a tabela de categorias');
                        ?>
                        <div class="col-lg-4 form-cols">
                            <div class="cb" id="default-selects2">
                                <select name="category">
                                    <option value="0">Todas as Categorias</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $row['id_categoria'] . '">' . $row['descricao'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>										
                        </div>
                        <div class="col-lg-2 form-cols">
                            <button type="submit" name="submit" class="btn btn-info">
                                <span class="lnr lnr-magnifier"></span> Pesquisar
                            </button>
                        </div>								
                    </div>
                </form>
                <?php echo isset($results) ? $results : ''; ?>
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->	