<?php
require_once('models/Emploi.php');
require_once('models/Company.php');
require_once('models/City.php');

class EmploiController {

    function fetchAll() {
        $emplois = Emploi::fetchAll();
        foreach ($emplois as $key => $value) {
            $company = new Company($emplois[$key]['company_id']);
            $emplois[$key]['company'] = $company->getAll();
            $city = new City($emplois[$key]['city_id']);
            $emplois[$key]['city'] = $city->getAll();
            unset($emplois[$key]['company_id']);
            unset($emplois[$key]['city_id']);
        }
        return json_encode($emplois);
    }
}
