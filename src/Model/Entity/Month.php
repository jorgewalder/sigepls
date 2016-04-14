<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Month Entity.
 *
 * @property int $id
 * @property int $indicator_id
 * @property \App\Model\Entity\Indicator $indicator
 * @property int $zone_id
 * @property \App\Model\Entity\Zone $zone
 * @property string $month
 * @property int $year
 * @property string $indicator_value
 * @property string $indicator_goal
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 * @property string $monthscol
 */
class Month extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
