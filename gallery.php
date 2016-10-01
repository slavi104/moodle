<?php
    require_once 'header.php';
?>
<div id="content">
<?php
if ($_GET['album']) {
  $album = trim($_GET['album']);
  $page = trim($_GET['page']);
  $counter = 0;
  $files = scandir('images/gallery/' . $album);
  foreach ($files as $key => $value) {
    if ($value != '.' && $value != '..' && $value != 'name.txt') {
      $counter++;
      if ($counter > (($page - 1) * 6) && $counter <= ($page * 6)) {
        echo '<img src="images/gallery/' . $album . '/' . $value . '" class="gallery_images"/>';
      }
    } 
  }
  if ($page > 1) {
    echo '<br><a class="pull-left" href="gallery.php?album=' . $album . '&page=' . ($page - 1) . '"><<< Предишна страница</a>';
  }
  if (($page * 6) < count($files) - 3) {
    echo '<a class="pull-right" href="gallery.php?album=' . $album . '&page=' . ($page + 1) . '">Следваща страница >>></a>';
  }

} else {
  foreach (scandir('images/gallery/') as $key => $value) {
    if ($value != '.' && $value != '..') {
      $folder_name = file_get_contents('images/gallery/' . $value . '/name.txt');
      echo '<a href="gallery.php?album=' . $value . '&page=1" style="cursor:pointer;" class="span3"><img style="width:90%" src="images/folder1.png" class="gallery_images"/><h4 style="text-align:center;">' . $folder_name . '</h4></a>';
    } 
  }
}
?>
</div>
<script type="text/javascript">
$(document).ready(function() {
  // $('.articles').on('click', function(){

  //     $.ajax({
  //       type: 'post',
  //       url: "article.php",
  //       data: {
  //           id: $(this).data("id")
  //       },
  //       dataType: 'html'
  //     }).done(function(data){
  //             if(data != false)
  //             {
  //                 $("#content").empty();
  //                 $("#content").append(data);
  //             }
  //             $("#pages").addClass("hidden");
  //     }); 
  // });

});
</script>

<?php
	require_once 'footer.php';
?>