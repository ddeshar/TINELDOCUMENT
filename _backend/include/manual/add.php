<?php

  if (isset($_POST["btnsubmit"])) {
    $title        = $_POST["title"];
    $title_th     = $_POST["title_th"];
    $slug         = $_POST["slug"];
    $content      = $_POST["content"];
    $content_th   = $_POST["content_th"];
    $order        = $_POST["order"];
    $catagory_id  = $_POST["catagory_id"];

    $imgFile = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];

    $upload_dir ='./assets/images/manual/';
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

    // rename uploading image
    $image = rand(1000,1000000).".".$imgExt;

    // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){
      // Check file size '5MB'
      if($imgSize < 5000000)				{
        move_uploaded_file($tmp_dir,$upload_dir.$image);
      }
      else{
        $errMSG = "Sorry, your file is too large.";
      }
    }
    else{
      $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    $sql = "INSERT INTO posts(`title`, `title_th`, `slug`, `content`, `content_th`, `image`, `order`, `catagory_id`, `created_at`) VALUES ('$title','$title_th','$slug','$content','$content_th','$image','$order','$catagory_id', NOW())";

    // echo $query; exit;
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('เพิมเสร็จแล้ว');";
      echo "window.location='manual.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }
  }
?>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <h3 class="card-title">Add Manual</h3>
        <div class="card-body">

          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
              <label>Title</label>
              <input type="text" name="title" id="title" class="form-control"  placeholder="EN TITLE">
            </div>

            <div class="form-group col-md-6">
              <label>เรื่อง</label>
              <input type="text" name="title_th" class="form-control"  placeholder="เรื่อง">
            </div>

            <div class="form-group col-md-6">
              <label>Content</label>
              <textarea name="content" class="form-control" id="summernote" rows="10"></textarea>
            </div>

            <div class="form-group col-md-6">
              <label>อธีบาย</label>
              <textarea name="content_th" class="form-control" id="summernotes" rows="10"></textarea>
            </div>

            <div class="form-group col-md-3">
              <label>image</label>
              <input type="file" name="image" class="form-control" id="logo-id">
              <img class="thumbnail img-preview" src="#" title="" width="100%" height="auto">
            </div>

            <div class="form-group col-md-3">
              <label>order</label>
              <input type="number" name="order" class="form-control">
            </div>

            <div class="form-group col-md-3">
              <label>Group</label>
              <?php
                $sql=mysqli_query($conn, "SELECT id, title FROM `catagory`");
                $select= '<select name="catagory_id" class="form-control">';
                while($rs=mysqli_fetch_array($sql)){
                      $select.='<option value="'.$rs['id'].'">'.$rs['title'].'</option>';
                }
                $select.='</select>';
                echo $select;
                ?>
            </div>

            <div class="form-group col-md-3">
              <label>Slug</label>
              <input type="text" name="slug" id="slug" class="form-control" readonly>
            </div>

            <div class="card-footer">
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary icon-btn" type="submit" name="btnsubmit" value="send"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Manual</button>
                  </div>
                </div>
              </div>
          </form>

      </div>
      </div>
    </div>
  </div>
