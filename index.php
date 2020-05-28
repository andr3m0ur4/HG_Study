<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Home";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Conecta-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar com o banco de dados.');
mysqli_set_charset($dbc, 'utf8');

// Insere o banner da página
$titulo = "HG Study";
require_once './script/banner.php';

// Insere a amostra da página
require_once './script/feature.php';

// Obtém os dados do usuário a partir do MySQL
$query = "SELECT DISTINCT ori.id_orientador, ori.nome, ori.sobrenome, ori.profissao_ori, ori.frase, "
        . "ori.trabalho_atual, ori.cidade, ori.foto, CEILING(AVG(co.classificacao)) AS classificacao "
        . "FROM orientador AS ori LEFT OUTER JOIN classificacao_orientador AS co "
        . "on ori.id_orientador = co.id_ori_rating "
        . "WHERE ori.nome IS NOT NULL  AND ori.active = 1 "
        . "GROUP BY ori.id_orientador "
        . "ORDER BY CEILING(AVG(co.classificacao)) DESC, ori.nome ASC LIMIT 3";
$result = mysqli_query($dbc, $query)
        or die('Erro ao se conectar com o banco de dados.');
?>


<!-- Start post Area -->
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-lg-8 post-list">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="single-post d-flex flex-row">
                        <?php
                        $query3 = "SELECT cat.descricao FROM categoria_orientador AS cat_ori "
                                . "INNER JOIN categoria AS cat "
                                . "USING (id_categoria) "
                                . "WHERE cat_ori.id_orientador = '" . $row['id_orientador'] . "' "
                                . "AND cat_ori.resposta = '1' "
                                . "LIMIT 3";
                        $result3 = mysqli_query($dbc, $query3)
                                or die('Ocorreu um erro ao acessar o banco de dados.');
                        $category = array();
                        while ($row3 = mysqli_fetch_array($result3)) {
                            array_push($category, $row3);
                        }
                        if (is_file(MM_UPLOADPATH . $row['foto']) && filesize(MM_UPLOADPATH . $row['foto']) > 0) {
                            ?>
                            <div class="thumb col-lg-4" style="margin: auto;">
                                <?php echo '<img src="' . MM_UPLOADPATH . $row['foto'] . '" alt="" style="width: 60%;">'; ?>
                                <ul class="tags">
                                    <?php
                                    echo!empty($category[0]['descricao']) ? '<li>' . $category[0]['descricao'] . '</li> ' : '';
                                    if (!empty($category[1]['descricao'])) {
                                        echo '<li>';
                                        echo '<a href="#">' . $category[1]['descricao'] . '</a> ';
                                        echo '</li>';
                                    }
                                    if (!empty($category[2]['descricao'])) {
                                        echo '<li>';
                                        echo '<a href="#">' . $category[2]['descricao'] . '</a>';
                                        echo '</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="thumb col-lg-4">
                                <?php echo '<img src="' . MM_UPLOADPATH . 'post.png" alt="">'; ?>
                                <ul class="tags">
                                    <?php
                                    echo!empty($category[0]['descricao']) ? '<li>' . $category[0]['descricao'] . '</li> ' : '';
                                    if (!empty($category[1]['descricao'])) {
                                        echo '<li>';
                                        echo '<a href="#">' . $category[1]['descricao'] . '</a>';
                                        echo '</li> ';
                                    }
                                    if (!empty($category[2]['descricao'])) {
                                        echo '<li>';
                                        echo '<a href="#">' . $category[2]['descricao'] . '</a>';
                                        echo '</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="details">
                            <div class="title d-flex flex-row justify-content-between">
                                <div class="titles">
                                    <a href="single.php?user_id=<?php echo $row['id_orientador']; ?>">
                                        <?php echo "<h4>" . $row['nome'] . " " . $row['sobrenome'] . "</h4>"; ?></a>
                                    <div>
                                        <?php echo '<h6>' . $row['profissao_ori'] . '</h6>'; ?>
                                    </div>
                                </div>

                            </div>
                            <p>
                                <?php echo $row['frase']; ?>
                            </p>
                            <?php echo'<h5>Trabalho Atual: ' . $row['trabalho_atual'] . '</h5>'; ?>
                            <p class="address"><span class="lnr lnr-map"></span><?php echo $row['cidade']; ?>-SP</p>
                            <?php
                            switch ($row['classificacao']) {
                                case 1:
                                    echo '<h5>Classificação: <span class="lnr lnr-star text-warning"></span></h5>';
                                    break;
                                case 2:
                                    echo '<h5>Classificação: <span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span></h5>';
                                    break;
                                case 3:
                                    echo '<h5>Classificação: <span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span></h5>';
                                    break;
                                case 4:
                                    echo '<h5>Classificação: <span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span></h5>';
                                    break;
                                case 5:
                                    echo '<h5>Classificação: <span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span></h5>';
                                    break;
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>                

                <!-- <a class="text-uppercase loadmore-btn mx-auto d-block" href="category.php">Carregar mais Tutores</a> -->

                <!--  
                AD
                -->

                <div class="row d-flex justify-content-center">
                    <div class="col-md-9 pb-40 header-text">
                        <h1>Publicações mais Recentes</h1>
                    </div>
                </div>
                <?php
                $query = "SELECT a.id_artigo, a.screenshot, a.date, a.title, a.content1, a.citacao, a.content2, "
                        . "o.nome, o.sobrenome "
                        . "FROM artigo AS a "
                        . "INNER JOIN orientador AS o "
                        . "USING (id_orientador) "
                        . "WHERE approved = 1 "
                        . "ORDER BY a.date DESC LIMIT 2";
                // Consulta para obter o total de resultados
                $result = mysqli_query($dbc, $query)
                        or die('Erro ao se conectar com o banco de dados.');
                while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <div class="single-post">
                        <?php
                        if (is_file(MM_UPLOADPATH2 . $row['screenshot']) && filesize(MM_UPLOADPATH2 . $row['screenshot']) > 0) {
                            echo '<img class="img-fluid" src="' . MM_UPLOADPATH2 . $row['screenshot'] . '" alt="">';
                        } else {
                            echo '<img class="img-fluid" src="' . MM_UPLOADPATH2 . 'Article.png" alt="">';
                        }
                        // Obtém as categorias do artigo no banco de dados
                        $query3 = "SELECT cat.descricao FROM categoria_artigo AS cat_art "
                                . "INNER JOIN categoria AS cat "
                                . "USING (id_categoria) "
                                . "WHERE cat_art.id_artigo = '" . $row['id_artigo'] . "' "
                                . "AND cat_art.resposta = '1' "
                                . "LIMIT 3";
                        $result3 = mysqli_query($dbc, $query3)
                                or die('Ocorreu um erro ao acessar o banco de dados.');
                        $category = array();
                        while ($row3 = mysqli_fetch_array($result3)) {
                            array_push($category, $row3);
                        }
                        ?>
                        <ul class="tags">
                            <li><a href="#"><?php echo!empty($category[0]['descricao']) ? $category[0]['descricao'] : ''; ?></a></li>
                            <li><a href="#"><?php echo!empty($category[1]['descricao']) ? ', ' . $category[1]['descricao'] : ''; ?></a></li>
                            <li><a href="#"><?php echo!empty($category[2]['descricao']) ? ', ' . $category[2]['descricao'] : ''; ?></a></li>
                        </ul>
                        <a href="blog-single.php?article_id=<?php echo $row['id_artigo']; ?>">
                            <h1>
                                <?php
                                echo $row['title'];
                                ?>
                            </h1>
                        </a>
                        <p>
                            <?php
                            echo nl2br(substr($row['content1'], 0, 300)) . '...';
                            ?>
                        </p>
                        <div class="bottom-meta">
                            <div class="user-details row align-items-center">
                                <div class="comment-wrap col-lg-6">
                                    <?php
                                    $query4 = "SELECT * FROM comentario WHERE id_artigo = " . $row['id_artigo'];
                                    $result4 = mysqli_query($dbc, $query4)
                                            or die('Não foi possível localizar os comentário no banco de dados.');
                                    $total_comment = mysqli_num_rows($result4);
                                    ?>
                                    <ul>
                                        <li><span class="lnr lnr-calendar-full"></span> <?php echo date('d/m/Y', strtotime($row['date'])); ?></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span> <?php echo $total_comment; ?> Comentários</a></li>
                                    </ul>
                                </div>
                                <div class="container col-lg-6">
                                    <p class="text-right"><?php echo $row['nome'] . ' ' . $row['sobrenome']; ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>



            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-slidebar">
                    <img src="img/Mulheres-linkedIn.jpg" alt="" class="img-fluid"/>
                </div>

                <div class="single-slidebar">
                    <img src="img/Gif_animado_anunciosemanacultural.gif" alt="" class="img-fluid"/>
                </div>							

                <?php
                $query2 = "SELECT * FROM categoria";
                $result2 = mysqli_query($dbc, $query2)
                        or die('Não foi possível acessar a tabela de categorias');
                ?>
                <div class="single-slidebar">
                    <h4>Orientador por Categoria</h4>
                    <ul class="cat-list">
                        <?php
                        while ($row2 = mysqli_fetch_array($result2)) {
                            $query3 = "SELECT * FROM categoria_orientador WHERE id_categoria = "
                                    . $row2['id_categoria'] . " AND resposta = 1";
                            $result3 = mysqli_query($dbc, $query3)
                                    or die('Não foi possível buscar total de categorias.');
                            $total_category = mysqli_num_rows($result3);
                            echo '<li><a class="justify-content-between d-flex" href="search.php?category=' . $row2['id_categoria'] . '&submit="><p>' . $row2['descricao'] . '</p><span>' . $total_category . '</span></a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- Start service Area -->
            <section class="service-area section-gap" id="service">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 pb-40 header-text">
                            <h1>Porque escolher-nos</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-service">
                                <h4><span class="lnr lnr-bubble"></span>Ideia</h4>
                                <p>
                                    Algos simples, porém eficiente, nascida de um meio acadêmico, mas destinado a todos que desejam algo maior para seu futuro estudantil e profissional.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-service">
                                <h4><span class="lnr lnr-license"></span>Função</h4>
                                <p>
                                    Aproximar pessoas, facilitar a disseminação de conhecimento, e contribuir para uma comunidade fortificada na área de tecnologia da informação.
                                </p>								
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-service">
                                <h4><span class="lnr lnr-smile"></span>Praticidade</h4>
                                <p>
                                    Chega de burocracias, formulários extensos, taxas muito altas. O foca aqui é atender às necessidades.
                                </p>						
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-service">
                                <h4><span class="lnr lnr-diamond"></span>Público</h4>
                                <p>
                                    Alunos, profissionais, professores, entusiastas, etc. Se o seu coração é metade máquina, seu lugar é aqui.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-service">
                                <h4><span class="lnr lnr-users"></span>Equipe</h4>
                                <ul>
                                    <li><span class="lnr lnr-user"></span> André de Moura</li>
                                    <li><span class="lnr lnr-user"></span> Eduardo Pereira</li>
                                    <li><span class="lnr lnr-user"></span> Gabriel Zacaro</li>
                                    <li><span class="lnr lnr-user"></span> Matheus Melo</li>
                                    <li><span class="lnr lnr-user"></span> Pietra Carvalho</li>
                                </ul>								
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-service">
                                <h4><span class="lnr lnr-rocket"></span>Futuro</h4>
                                <p>
                                    Ampliações, atualizações e inovações constantes. O objetivo aqui é não se acomodar e sempre buscar proporcionar o melhor para você em questão a conforto e funcionalidades.
                                </p>									
                            </div>
                        </div>						
                    </div>
                </div>	
            </section>
        </div>
    </div>
</section>
<!-- End post Area -->

<?php
// Insere o rodapé da página
require_once './script/footer.php';
