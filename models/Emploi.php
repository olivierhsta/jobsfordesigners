<?php
require_once('Model.php');

class Emploi extends Model {

    public static $tableName = 'EMPLOI';

    function __construct($id) {
        parent::__construct($id);
    }
}
