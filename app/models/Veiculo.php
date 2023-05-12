<?php

namespace models;

class Veiculo extends Model {
    
    protected $table = "veiculos";
    #nao esqueça da ID
    protected $fields = ["id","placa","modelo","cor","ano"];
    
}

