<?php
    require_once 'header.php';
?>
<div id="content">
<img src="images/calendar.png" class="calendar_png">
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