<?php
require_once 'header.php';
?>
<div id="content">
<?php
if ($_POST) {
    if (isset($_POST['name'])) {
        $pass = trim($_POST['pass']);
        $name = trim($_POST['name']);
        fUTF8::clean($pass);
        fUTF8::clean($name);
        $credentials = file_get_contents('data/credentials.txt');
        $students_data = explode(';', $credentials);
        foreach ($students_data as $data) {
            list($orig_name, $orig_pass) = explode(',', trim($data));
            if ($name === $orig_name && $pass === $orig_pass) {
                fSession::open();
                fSession::set('name', $name);
            }
        }
        if (!fSession::get('name')) {
            echo "Грешно име или парола!!!";
        }
    } 

    if(isset($_POST['logout'])){
        fSession::set('name', '');
        fSession::destroy();
    }
}

if(fSession::get('name')) { ?>
    <div class="span12 pull-left" id="login" style="color:black;">
        <form method="POST" class="span1" style="float:right;">
            <span class="span1">
                <input type="hidden" name="logout" value="logout">
                <input type="submit" value="Изход">
            </span>
        </form>
    </div>
    <h3 style="text-align: center;">E-бележник на <?php echo Functions::fetchOriginalName(fSession::get('name')); ?></h3>
    <table class="schedule_table" style="width: 100%;" border="1" cellpadding="10" cellspacing="3" >
      <thead>
        <tr>
          <th>Предмет</th>
          <th>I оценка</th>
          <th>II оценка</th>
          <th>III оценка</th>
          <th>IV оценка</th>
        </tr>
      </thead>
      <tbody>
    <?php 
    $classes = scandir('data/grades/');
    foreach ($classes as $class_data) { 
        $file = trim(file_get_contents('data/grades/' . $class_data));
        if (!$file) {
            continue;
        }
        list($class_name, $students_data) = explode('!', $file);
        $students_grades = explode(';', $students_data);
        $grades_array = array();
        foreach ($students_grades as $grades_data) {
            list($student_name, $grades) = explode('-', $grades_data);
            if (trim($student_name) === fSession::get('name')) {
                $grades_array = explode(',', $grades);
            }
        }
        $grades_count = count($grades_array);
        for ($i=0; $i < 4 - $grades_count; $i++) { 
            $grades_array[] = '-';
        }

    ?>
      <tr>
        <td width="35%" style="padding: 5px;"><?php echo $class_name; ?></td>
        <?php foreach ($grades_array as $grade) { ?>
            <td style="padding: 5px;"><?php echo Functions::gradeWithWords($grade); ?></td>
        <?php }?>
      </tr>
    <?php }
    ?>
      </tbody>
    </table>
    </div>
    <?php } else { ?>
    <h3 style="text-align: center;">Вход в Е-бележник</h3><br>
    <div class="span12 pull-left" id="login" style="color:black;">
        <form method="POST" class="span12 row-fluid" style="padding-left: 7%;">
            <span class="span8">
                <span class="span6">
                    <label>Име:</label><input type="text" id="name" name="name">
                </span>
                <span class="span6">
                    <label>Парола:</label><input type="password" id="pass" name="pass">
                </span>
            </span>
            <span class="span1">
                <input type="submit" value="Вход">
            </span>
        </form>
</div>
<?php } ?>
</div>
<?php
require_once 'footer.php';
?>