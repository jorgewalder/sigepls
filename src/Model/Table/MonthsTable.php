<?php
namespace App\Model\Table;

use App\Model\Entity\Month;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MonthsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('months');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('month');

        $validator
            ->integer('year')
            ->allowEmpty('year');

        $validator
            ->allowEmpty('indicator_value');

        $validator
            ->allowEmpty('indicator_goal');

        $validator
            ->allowEmpty('monthscol');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['indicator_id'], 'Indicators'));
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));
        return $rules;
    }
}
