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
                $categories = categories();
                foreach($categories as $category){ ?>
                <ul class="nav nav-info">
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section"><?=$category['category_name']?></h4>
                        </li>
                    <?php 
                        if( ! empty($category['subcategory'])){
                            echo viewsubcat($category['subcategory']);
                        } 
                    ?>
                </ul>
            <?php } ?>
            
        </div>
    </div>
</div>