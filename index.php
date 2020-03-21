<?php include ("db.php");

$result = mysqli_query( $con, "SELECT * FROM datatables_demo " );

if (!$result){
    echo "<p>Запрос на выборку данных из базы не прошёл.<br> <strong>Код ошибки:</strong></p>";
    exit (mysqli_error($con));
}

if (mysqli_num_rows($result) > 0){
    $myrow = mysqli_fetch_array($result);
} else {
    echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.<br></p>";
    exit(mysqli_error($con));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>dataTables Server Side</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>

<h1>dataTables Server Side example</h1>

<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Middle name</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Middle name</th>
    </tr>
    </tfoot>
</table>

</body>
</html>

<script src="jquery.js"></script>
<script src="jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            'serverMethod': 'post',
            'ajax':{
                'url':'server_processing.php'
            },
            'columns': [
                { data: 'firstname' },
                { data: 'lastname' },
                { data: 'middlename' }
            ]
        } );
    } );
</script>

