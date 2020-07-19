<div class="page-title">
  <div>
    <h1>TINEL Manual</h1>
    <ul class="breadcrumb side">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li class="active"><a href="#">Add Manual</a></li>
    </ul>
  </div>
  <div>
    <a class="btn btn-primary btn-flat" href="manual.php?source=manual_add"><i class="fa fa-lg fa-plus"></i></a>
    <!-- <a class="btn btn-info btn-flat" href="#"><i class="fa fa-lg fa-refresh"></i></a>
    <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a> -->
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>no</th>
							<th>title_en</th>
							<th>title_th</th>
							<th>แก้ไข</th>
            </tr>
          </thead>
          <tbody>
            <?php
							$sql = "SELECT * FROM posts";
              $result = mysqli_query($conn, $sql);
              $no = 1;
							while ($row = mysqli_fetch_array($result)){
								$id = $row["id"];
								$titleEn = $row["title"];
								$titleTh = $row["title_th"];

								echo "<tr>
										<td>$no</td>
										<td>$titleEn</td>
										<td>$titleTh</td>
										<td><a href='manual.php?source=manual_edit&id=$id'>แก่ไข้</a></td>
                  </tr>";
                  $no++;
							}
						?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
