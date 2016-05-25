<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class WalderComponent extends Component
{
    public function simplifyDate($date){
    	$date = new \DateTime($date);
        return ($date->format('Y-m')).'-01';
    }
}
