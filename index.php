<?Php
include('includes/config.php');

$Page_title = "Home page";
$meta_description = "Home page description";
$meta_keywords = "fashion, css, laravel";

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white">category</h3>
                <div class="underline"></div>
            </div>
            <?php
                $homeCategory = "SELECT * FROM categories WHERE navbar_status='0' AND status='0' LIMIT 12 ";
                $homeCategory_run = mysqli_query($con, $homeCategory);
                if (mysqli_num_rows($homeCategory_run) > 0) 
                {
                    foreach ($homeCategory_run as $homeItems) 
                    {
                    ?>
                        <div class="col-md-3 mb-4">
                            <a class="text-decoration-none" href="category.php?title=<?= $homeItems['slug']; ?>">
                    
                                <div class="card card-body">
                                    <?= $homeItems['name']; ?>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                }
            ?>
        </div>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">DONNIE WEB SITE</h3>
                <div class="underline"></div>
            </div>
            <p>
            Comptant actuellement un peu plus de 1.800 étudiants, l‘Institut Supérieur d‘Informatique et de Gestion (ISIG/Goma) propose une offre de formation pluridisciplinaire et compatible avec la perspective du développement de la République Démocratique du Congo. Sa localisation en plein cœur de la Région des Grands-Lacs, en fait à la fois un environnement multiculturel, et lui offre l‘avantage d‘une internationalisation facile : Par l’origine de ses étudiants 
            </p>
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">Latest Posts</h3>
                <div class="underline"></div>

                    <?php
                        $homePosts = "SELECT * FROM posts WHERE status='0' ORDER BY id DESC LIMIT 12 ";
                        $homePosts_run = mysqli_query($con, $homePosts);
                        if (mysqli_num_rows($homePosts_run) > 0) 
                        {
                            foreach ($homePosts_run as $homePostItems) 
                            {
                            ?>
                                <div class="mb-4">
                                    <a class="text-decoration-none" href="post.php?title=<?= $homePostItems['slug']; ?>">
                            
                                        <div class="card card-body bg-light">
                                            <?= $homePostItems['name']; ?>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                        }
                    ?>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Reach Us</h4>
                    </div>
                    <div class="card-body">
                        info@exemple.com
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?Php
include('includes/footer.php');
?>