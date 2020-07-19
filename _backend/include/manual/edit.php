<?php
  require_once 'include/permission/admin.php';
  // Form Submit
  if (isset($_POST["btnEdit"])) {
    $pid          = $_POST["pid"];
    $title        = $_POST["title"];
    $title_th     = $_POST["title_th"];
    $slug         = $_POST["slug"];
    $content      = $_POST["content"];
    $content_th   = $_POST["content_th"];
    $order        = $_POST["order"];
    $catagory_id  = $_POST["catagory_id"];
    $imgFile      = $_FILES["image"]["name"];

    if($imgFile){
      $temp = explode(".", $_FILES["image"]["name"]);
      $newfilename = round(microtime(true)) . '.' . end($temp);
      $tmp_dir = $_FILES['image']['tmp_name'];
      $upload_dir ='./assets/images/manual/';

      move_uploaded_file($tmp_dir,$upload_dir.$newfilename);
      
      $qry=mysqli_query($conn,"SELECT image FROM posts WHERE id = '$pid'");
      $row=mysqli_fetch_assoc($qry);
      $delimg = $row['image'];
      move_uploaded_file($tmp_dir,$upload_dir.$newfilename);
      unlink($upload_dir.$delimg);
    }else{
      $query = "SELECT image FROM posts WHERE id = '$pid'";
      $select_image = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($select_image)) {
          $newfilename = $row['image'];
        }
    }

    $sql = "UPDATE `posts` SET `title`='$title',`title_th`='$title_th',`slug`='$slug',`content`='$content',`content_th`='$content_th',`image`='$newfilename',`order`='$order',`catagory_id`='$catagory_id',`updated_at`= now() WHERE id='$pid'";
    // echo $sql;exit;
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('แก้ไขสินค้าสำเร็จ');";
      echo "window.location='manual.php';";
      echo "</script>";
    }else{
      echo "<font color='red'>SQL Error</font><hr>";
    }
  }else{
    $id = $_GET["id"];
    $sql = "SELECT * FROM posts WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $pid          = $row["id"]; 
      $title        = $row["title"]; 
      $title_th     = $row["title_th"]; 
      $slug         = $row["slug"]; 
      $content      = $row["content"]; 
      $content_th   = $row["content_th"]; 
      $image        = $row["image"]; 
      $order        = $row["order"]; 
      $catagory_id  = $row["catagory_id"]; 
      $created_at   = $row["created_at"]; 
      $updated_at   = $row["updated_at"];
    }else{
      $pid           ="";
      $title        ="";
      $title_th     ="";
      $slug         ="";
      $content      ="";
      $content_th   ="";
      $image        ="";
      $order        ="";
      $catagory_id  ="";
      $created_at   ="";
      $updated_at   ="";
    }
  }
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h3 class="card-title">Edit Manual</h3>
      <div class="card-body">

          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
              <label>Title</label>
              <input type="text" name="title" id="title" class="form-control" value="<?=$title?>">
            </div>

            <div class="form-group col-md-6">
              <label>เรื่อง</label>
              <input type="text" name="title_th" class="form-control" value="<?=$title_th?>">
            </div>

            <div class="form-group col-md-6">
              <label>Content</label>
              <textarea name="content" class="form-control" id="summernote" rows="10"><?=$content?></textarea>
            </div>

            <div class="form-group col-md-6">
              <label>อธีบาย</label>
              <textarea name="content_th" class="form-control" id="summernotes" rows="10"><?=$content_th?></textarea>
            </div>

            <div class="form-group col-md-3">
              <label>image</label>
              <input type="file" name="image" value="<?=$image?>" accept="image/*"  class="form-control" id="logo-id">
              <img class="thumbnail img-preview" src="assets/images/manual/<?=$image?>"  width="100%" height="auto">
            </div>

            <div class="form-group col-md-3">
              <label>order</label>
              <input type="number" name="order" class="form-control" value="<?=$order?>">
            </div>

            <div class="form-group col-md-3">
              <label>Group</label>
              <?php
                $sql=mysqli_query($conn, "SELECT id, title FROM `catagory`");
                $select= '<select name="catagory_id" class="form-control">';
                while($rs=mysqli_fetch_array($sql)){
                  if($catagory_id == $rs['id']){
                    $select.='<option value="'.$rs['id'].'" selected>'.$rs['title'].'</option>';
                  }else{
                    $select.='<option value="'.$rs['id'].'">'.$rs['title'].'</option>';
                  }
                }
                $select.='</select>';
                echo $select;
                ?>
            </div>

            <div class="form-group col-md-3">
              <label>Slug</label>
              <input type="text" name="slug" id="slug" class="form-control" value="<?=$slug?>" readonly>
              <input name="pid" type="hidden" value="<?=$pid?>" />
            </div>

            <div class="card-footer">
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary icon-btn" type="submit" name="btnEdit" value="send"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit Manual</button>
                  </div>
                </div>
              </div>
          </form>

      </div>
    </div>
  </div>
</div>
