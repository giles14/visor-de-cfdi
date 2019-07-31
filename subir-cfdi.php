<?php include 'header.php';?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <h2 class="center">Subir CFDI Emitidos</h2>
      <form method="post" action="upload.php" enctype="multipart/form-data">
        <div id="uploader">
          <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
        </div>
        <input type="submit" value="Send" />
      </form>
      <br />
      <pre id="console"></pre>
    </div>
    <div class="col">
      <h2 class="center">Subir CFDI Recibidos</h2>
    </div>
  </div>
</div>


<script type="text/javascript">
$(function() {

  // Setup html5 version
  $("#uploader").pluploadQueue({
    // General settings
    runtimes : 'html5,flash,silverlight,html4',
    url : 'upload.php',
    chunk_size: '1mb',
    rename : true,
    dragdrop: true,

    filters : {
      // Maximum file size
      max_file_size : '10mb',
      // Specify what files to browse for
      mime_types: [
        {title : "Image files", extensions : "jpg,gif,png"},
        {title : "xml files", extensions : "xml"}
      ]
    },

    // Resize images on clientside if we can
    resize : {width : 320, height : 240, quality : 90},

    flash_swf_url : '../../js/Moxie.swf',
    silverlight_xap_url : '../../js/Moxie.xap'
  });

});
</script>

<?php include 'footer.php';?>
