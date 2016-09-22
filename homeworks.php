<?php
    require_once 'header.php';
?>
<div id="content">
<?php 
foreach (scandir('homeworks/bel/') as $key => $value) {
  if ($value != '.' && $value != '..') {
    if (strstr($value, 'jpg')) {
      echo '<img src="homeworks/bel/' . $value . '" class="gallery_images">';
    } else {
      echo '<span>' . file_get_contents('homeworks/bel/' . $value) . '</span>';
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