<?php

require_once('config.php');

$sql_details = array(
    'host' => HOSTNAME,
    'user' => USERNAME,
    'pass' => PASSWORD,
    'db' => DATABASE
);


$table = "new_souls";

$primary_key = "id";

$columns = array(

    array('db' => '`id`', 'dt' => 0, 'field' => 'id'),
    array('db' => '`soul_name`', 'dt' => 1, 'field' => 'soul_name'),
    array('db' => '`soul_contact`', 'dt' => 2, 'field' => 'soul_contact'),
    array('db' => '`soul_origin`', 'dt' => 3, 'field' => 'soul_origin')

);

require('ssp.class.php');

$joinQuery = "FROM `new_souls`";

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primary_key, $columns, $joinQuery)
);
