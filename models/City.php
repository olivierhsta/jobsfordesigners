<?php
require_once('Model.php');

class City extends Model {

    public static $tableName = 'CITIES';

    function __construct($id) {
        parent::__construct($id);
    }
}
