<?php
    session_start();
    require_once './include/config.php';
    require_once './include/lang.php';
    require_once './include/_header.php';
    require_once './include/_aside.php';
?>

<div class="main-panel">
    <div class="content content-documentation">
        <div class="container-fluid">
            <div class="card card-documentation">
                <div class="card-header bg-info-gradient text-white bubble-shadow">
                    <h4>Introduction</h4>
                    <p class="mb-0 op-7">Atlantis Lite is a free Bootstrap 4 Admin Template.</p>
                </div>
                <div class="card-body">
                    <?php
                        if($_GET['link']){
                            $query = "SELECT * FROM posts WHERE slug = '".$_GET['link']."'";
                        }else{
                            $query = "SELECT * FROM posts WHERE slug = 'remember.html'";
                        }
                        $result = mysqli_query($con,$query);

                        while($row = mysqli_fetch_array($result)){
                            // Selection field
                            $title_field = "title";
                            $content_field = "content";
                            if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'th'){
                                $title_field = "title_th";
                                $content_field = "content_th";
                            }
                            
                            $id = $row['id'];
                            $title = $row[$title_field];
                            $content = $row[$content_field];
                            // $shortcontent = substr($content, 0, 160)."...";
                            $link = $row['slug'];
                    ?>
                        <!-- Post -->
                            <h1><?php echo $title; ?></h1>
                            <p> <?php echo $content; ?></p>
                            <!-- <a href="?link=<?php echo $link; ?>" class="more"><?= _MORE ?></a> -->

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
    require './include/footer.php';
?>