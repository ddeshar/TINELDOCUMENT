<?php
    session_start();
    require_once './include/config.php';
    require_once './include/function.php';
    require_once './include/lang.php';
    require_once './include/_header.php';
    require_once './include/_aside.php';
    $con = dbconnect();
?>

<div class="main-panel">
    <div class="content content-documentation">
        <div class="container-fluid">
            <?php
                include "./include/breadcrumb.php";
            ?>
            <div class="card card-documentation">
                <div class="card-body">
                    <?php
                        if($_GET['page'] && $_GET['section']){
                            include "./include/section.php";
                        }else{
                            include "./include/front.php";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php
    require './include/footer.php';
?>