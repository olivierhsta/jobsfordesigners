<?php
require_once('Model.php');

class Company extends Model {

    public static $tableName = 'COMPANIES';

    function __construct($id) {
        parent::__construct($id);
    }
}
