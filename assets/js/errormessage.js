$da = $_row['date_borrowed'];

$current_date = time();
$proc_date = strtotime($da);

$due_date = $current_date - $proc_date;

echo floor($due_date/(60 * 60 * 24));