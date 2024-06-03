<?php

namespace controller;

use model\tax;

class TaxController{
    private $taxModel;

    public function __construct() {
        $this->taxModel = new tax();
    }

}