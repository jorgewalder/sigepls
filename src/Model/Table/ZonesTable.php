<?php
namespace App\Model\Table;

use App\Model\Entity\Zone;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ZonesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('zones');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Months', [
            'foreignKey' => 'zone_id'
        ]);

        $this->hasMany('Users', [
            'foreignKey' => 'zone_id'
        ]);

        $this->belongsToMany('Indicators', [
            'through' => 'IndicatorsZones'
        ]);


    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('name');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));
        return $rules;
    }
}
