<?php
require_once 'header.php';
?>
<div id="content">
    <h3 style="text-align: center;">Класация на учениците по всички предмети</h3><br>
    <table class="schedule_table" style="width: 100%;" border="1" cellpadding="10" cellspacing="3" >
      <thead>
        <tr>
          <th>Позиция</th>
          <th width="50%" >Име на ученика</th>
          <th>Средна оценка</th>
        </tr>
      </thead>
      <tbody>
    <?php 
    $classes = scandir('data/grades/');
    $students_chart = array();
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
            $grades_array = explode(',', $grades);
            foreach ($grades_array as $grade) {
                $students_chart[$student_name][] = $grade;
            }
        }
    }
    
    $students_chart_ordered = array();
    foreach ($students_chart as $student_name => $grades) {
        if ($student_name) {
            $students_chart_ordered[Functions::fetchOriginalName(trim($student_name))] = round(array_sum($grades) / count($grades), 2);
        }
    }
    krsort($students_chart_ordered);
    arsort($students_chart_ordered);
    $possition = 0;
    $last_student_grade = null;
    foreach ($students_chart_ordered as $student_name => $avg_grade) {
        $possition = $last_student_grade != Functions::gradeWithWords($avg_grade) ? ++$possition : $possition;
        $last_student_grade = Functions::gradeWithWords($avg_grade);
    ?>
      <tr class="chart_possition_<?php echo $possition; ?>">
        <td style="padding: 5px;"><?php echo $possition; ?></td>
        <td style="padding: 5px;"><?php echo $student_name; ?></td>
        <td style="padding: 5px;"><?php echo Functions::gradeWithWords($avg_grade); ?></td>
      </tr>
    <?php }
    ?>
      </tbody>
    </table>
</div>
<?php
require_once 'footer.php';
?>