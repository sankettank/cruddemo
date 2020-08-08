<?php
$table = 'users';

$primaryKey = 'id';

$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'name', 'dt' => 1 ),
    array( 'db' => 'email',   'dt' => 2 ),
);

$sql_details = array(
    'user' => 'root',
    'pass' => '12345',
    'db'   => 'cruddemo',
    'host' => 'localhost'
);


require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>
