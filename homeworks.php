<?php require_once 'header.php'; ?>
<div id="content">
<?php 
	$folders = scandir('data/homeworks/');
	foreach ($folders as $key => $folder) {
		if ($folder != '.' && $folder != '..') {
			echo Functions::printItems('homeworks/' . $folder);  
		}
	}
 ?> 
</div>
<?php require_once 'footer.php'; ?>