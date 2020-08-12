<div class="main-header">
    <div class="logo-header" data-background-color="light-blue2">
        <a href="?page=docs" class="logo">
            <img src="assets/img/logo.png" alt="navbar brand" class="navbar-brand" height="70%">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="light-blue2">

    <?php
        include "./include/select_lang.php";
    ?>

    </nav>
</div>
<div class="sidebar sidebar-style-2">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <?php

                $con = dbconnect();
                $query  = mysqli_query($con, "SELECT
                                                catagory.id AS category_id,
                                                catagory.title AS category_nameEn,
                                                catagory.title_th AS category_nameTh,
                                                posts.title AS titleEN,
                                                posts.title_th AS titleTh,
                                                posts.slug ,
                                                posts.catagory_id AS parent_id
                                            FROM
                                                catagory
                                            JOIN posts ON posts.catagory_id = catagory.id");

                echo '<ul class="nav nav-info">';

                $last_parent = '';
                while($row = mysqli_fetch_array($query)){

                $category_name = "category_nameEn";
                $title = "titleEN";                

                if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'th'){
                    $category_name = "category_nameTh";
                    $title = "titleTh";
                }
                
                    // If this is a new category, start a new one
                    if($last_parent != $row[$category_name]){
                        // Unless this is the first item, close the last category

                        $last_parent = $row[$category_name];

                        echo '<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">'.$row[$category_name].'</h4>
                        </li>';
 
                    }

                    echo '<li class="nav-item">
							<a href="?page=docs&section='.$row['slug'].'">
								<span class="letter-icon">'.mb_substr($row[$title],0,1, "UTF-8").'</span>
								<p>'.$row[$title].'</p>
							</a>
						</li>';
                }
                echo "</ul>";
            ?>
            
        </div>
    </div>
</div>