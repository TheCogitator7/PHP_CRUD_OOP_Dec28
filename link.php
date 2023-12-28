<?php
require_once 'host.php';

class Link extends mysqli{
    function __construct($host, $user, $pass){
        parent::__construct($host, $user, $pass);
    }
}
$link=new Link($host, $user, $pass);
if ($link->connect_errno) {
    throw new RuntimeException('mysqli connection error: ' . $link->connect_error);
}
$link->select_db($user);
?>