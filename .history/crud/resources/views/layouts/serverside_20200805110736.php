<?php
$table = 'user';

$primaryKey = 'id';

$columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'name', 'dt' => 1 ),
    array( 'db' => 'email',   'dt' => 2 ),
    array( 'db' => 'phone', 'dt' => 4,),
    array( 'db' => 'created_at','dt' => 5,
        'formatter' => function( $d, $row ) {
            return date( 'd-m-Y', strtotime($d));
        }
    )
);

$sql_details = array(
    'user' => 'root',
    'pass' => '12345',
    'db'   => 'demo_pagination',
    'host' => 'localhost'
);


require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>
