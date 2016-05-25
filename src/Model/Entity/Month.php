<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Month extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
