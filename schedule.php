<?php
    require_once 'header.php';
?>
<div id="content">
<table class="schedule_table" border="1" cellpadding="10" cellspacing="3" >
  <thead>
    <tr>
      <th>Време</th>
      <th>Понеделник</th>
      <th>Вторник</th>
      <th>Сряда</th>
      <th>Четвъртък</th>
      <th>Петък</th>
    </tr>
  </thead>
  <tbody>
<?php 
$classes = fRecordSet::buildFromSQL('Schedule', 'SELECT schedules.* FROM schedules');
foreach ($classes as $class) { ?>
  <tr>
    <td width="12%" style="padding: 5px;"><?php echo $class->getDuration(); ?></td>
    <td width="17.5%" style="padding: 5px;"><?php echo $class->getMonday(); ?></td>
    <td width="17.5%" style="padding: 5px;"><?php echo $class->getTuesday(); ?></td>
    <td width="17.5%" style="padding: 5px;"><?php echo $class->getWednesday(); ?></td>
    <td width="17.5%" style="padding: 5px;"><?php echo $class->getThursday(); ?></td>
    <td width="17.5%" style="padding: 5px;"><?php echo $class->getFriday(); ?></td>
  </tr>
<?php }
?>
  </tbody>
</table>
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