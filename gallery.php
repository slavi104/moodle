<?php
    require_once 'header.php';
?>
<div id="content">
<?php 
foreach (scandir('images/gallery/') as $key => $value) {
  if ($value != '.' && $value != '..') {
    $folder_name = file_get_contents('images/gallery/' . $value . '/name.txt');
    echo '<a href="" style="cursor:pointer;" class="span3"><img style="width:90%" src="images/folder1.png" class="gallery_images"/><h4 style="text-align:center;">' . $folder_name . '</h4></a>';
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