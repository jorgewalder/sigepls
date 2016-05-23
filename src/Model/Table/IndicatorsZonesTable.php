<?php
namespace App\Model\Table;

use App\Model\Entity\IndicatorsZone;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class IndicatorsZonesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('indicators_zones');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Indicators', [
            'foreignKey' => 'indicator_id'
        ]);
        $this->belongsTo('Zones', [
            'foreignKey' => 'zone_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('goal');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['indicator_id'], 'Indicators'));
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));
        return $rules;
    }
}
