<?php
$page = 'manual';
$title = 'manual';
$css = <<<EOT
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
EOT;
  include 'include/_header.php';
  include 'include/_navbar.php';
  include 'include/_menuleft.php';
?>
      <div class="content-wrapper">
        <?php
          if (isset($_GET['source'])) {
            $source = $_GET['source'];
          } else {
            $source = '';
          }

            if ($source == "manual_add") {
              include "include/manual/add.php";

            } else if ($source == "manual_edit"){
              include "include/manual/edit.php";
              
            }else{
              include "include/manual/view_all.php";
            }
        ?>
      </div>


<?php
  include 'include/_footer.php';
?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>


<script>
  $(document).ready(function() {
       $('#summernote').summernote({
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

      $('#summernotes').summernote({
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
  });
</script>

<script>
  $(document).ready(function() {
      var brand = document.getElementById('logo-id');
      brand.className = 'attachment_upload';
      brand.onchange = function() {
          document.getElementById('fakeUploadLogo').value = this.value.substring(12);
      };

      // Source: http://stackoverflow.com/a/4459419/6396981
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              
              reader.onload = function(e) {
                  $('.img-preview').attr('src', e.target.result);
              };
              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#logo-id").change(function() {
          readURL(this);
      });
  });
</script>

<script type="text/javascript">
    $("#title").keyup(function(){
        var str = $(this).val();
        var trims = $.trim(str)
        var slug = trims.replace(/[^a-z0-9ก-๙]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
        $("#slug").val(slug.toLowerCase()+".html")
    })

</script>


</body>
</html>
