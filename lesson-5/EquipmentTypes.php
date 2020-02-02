<?php

require_once('Equipment.php');

class EquipmentTypes
{
    private $typesOfEquipments;

    public function __construct()
    {
        $this->typesOfEquipments = [
            'helmet light' => new Equipment(5, 'head'),
            'helmet medium' => new Equipment(10, 'head'),
            'helmet reinforced' => new Equipment(15, 'head'),
            'body armor light' => new Equipment(5, 'body'),
            'body armor medium' => new Equipment(10, 'body'),
            'body armor reinforced' => new Equipment(15, 'body'),
            'footwear light' => new Equipment(5, 'foot'),
            'footwear medium' => new Equipment(10, 'foot'),
            'footwear reinforced' => new Equipment(15, 'foot'),
            'gloves light' => new Equipment(5, 'gloves'),
            'gloves medium' => new Equipment(10, 'gloves'),
            'gloves reinforced' => new Equipment(15, 'gloves'),
        ];
    }

    public function getTypesOfEquipments()
    {
        return $this->typesOfEquipments;
    }
}