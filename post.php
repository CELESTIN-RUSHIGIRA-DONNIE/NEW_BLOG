<?Php
    include('includes/config.php');
    if(isset($_GET['title']))
    {
        $slug = mysqli_real_escape_string($con, $_GET['title']);
        
        $posts = "SELECT slug,meta_title,meta_description,meta_keyword FROM posts WHERE slug='$slug'LIMIT 1";
        $posts_run = mysqli_query($con,$posts);
        
        if(mysqli_num_rows($posts_run) > 0)
        {
            $categoryItem = mysqli_fetch_array($posts_run);
        
            $Page_title = $categoryItem['meta_title'];
            $meta_description = $categoryItem['meta_description'];
            $meta_keywords = $categoryItem['meta_keyword'];
        }
        else
        {
            $Page_title = $categoryItem['meta_title'];
            $meta_description = $categoryItem['meta_description'];
            $meta_keywords = $categoryItem['meta_keywords']; 

        }
    }
    else
    {

    }

    include('includes/header.php');
    include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php
                    if(isset($_GET['title']))
                    {
                        $slug = mysqli_real_escape_string($con, $_GET['title']);
                        
                        $posts = "SELECT * FROM posts WHERE slug='$slug'";
                        $posts_run = mysqli_query($con,$posts);
                        
                        if(mysqli_num_rows($posts_run) > 0)
                        {
                            
                                foreach($posts_run as $postItems)
                                {
                                   ?>
                                        <div class="card card-body shadow-sm mb-4">
                                            <div class="card-header">
                                                <h4><?=$postItems['name']; ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <label class="text-dark me-2">Posted On: <?= date('d-M-Y', strtotime($postItems['creation_date'])); ?></label>
                                                <hr>
                                                <?php if($postItems['image'] != NULL): ?>
                                                    <img src="uploads/posts/<?=$postItems['image']; ?>" width="150px" height="150px" alt="<?=$postItems['name']; ?>">
                                                <?php endif; ?>
                                                <div>
                                                    <?=$postItems['description']; ?>
                                                </div>
                                            </div>
                                        </div>                                
                                   <?php
                                }
                        }
                        else
                        {
                            ?>
                                <h4>No such Post  found</h4>
                            <?php
                        }

                    }
                    else
                    {
                        ?>
                            <h4>No such URL found</h4>
                        <?php
                    }
                ?>
            </div>
            <div class="col -md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Advertise Area</h4>
                    </div>
                    <div class="card-body">
                        Your advertise
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?Php
    include('includes/footer.php');
?>