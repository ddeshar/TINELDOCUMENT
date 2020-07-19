<?php
    $query = "SELECT * FROM posts WHERE slug = '".$_GET['section']."'";
    $result = $con->query($query);

    while($row = mysqli_fetch_array($result)){
        // Selection field
        $title_field = "title";
        $content_field = "content";
        // $image = "image";
        if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'th'){
            $title_field = "title_th";
            $content_field = "content_th";
        }

        $id = $row['id'];
        $title = $row[$title_field];
        $content = $row[$content_field];
        $image = $row['image'];

        echo '
            <div class="row">
                <div class="col-sm">
                    <img src="_backend/assets/images/manual/' . $image . '" alt="'. $title .'" width="100%">
                </div>
                <div class="col-sm">
                    <h1>'. $title .'</h1>
                    <p class="text-justify">'. $content .'</p>
                </div>
            </div>';
    }
?>
