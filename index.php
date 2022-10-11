<?php
$url = "https://bhnt.cf/";
$db = "bizInfo";
$username = "PhuongNQ@intern.t4tek.co";
$password = "123456aA@";

require_once('ripcord/ripcord.php');
$common = ripcord::client("$url/xmlrpc/2/common");
$uid = $common->authenticate($db, $username, $password, array());

$models = ripcord::client("$url/xmlrpc/2/object");
$recordsEmployee = $models->execute_kw($db, $uid, $password, 'hr.employee', 'search_read', array(array(array('active', '=', true))), array('limit' => 5));
//$recordsPartner = $models->execute_kw($db, $uid, $password, 'res.partner', 'search_read', array(array(array('is_company', '=', true))), array("active", "=", true), array('fields' => array('vat', 'name', 'country_id', 'comment'), 'limit' => 10));

$recordsPartner = $models->execute_kw(
    $db,
    $uid,
    $password,
    'res.partner',
    'search_read', // Function name
    array( // Values-array
        array( // First record
            array('is_company', '=', true),
            array('phone', '=', '0969350365')
        )
    ),
    array('fields' => array('vat', 'name', 'country_id', 'comment'), 'limit' => 10)
);
var_dump($recordsPartner);
