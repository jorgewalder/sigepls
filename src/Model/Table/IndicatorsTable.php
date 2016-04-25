<?php
namespace App\Model\Table;

use App\Model\Entity\Indicator;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

class IndicatorsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('indicators');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Months', [
            'foreignKey' => 'indicator_id'
        ]);

        $this->belongsTo('Categories');

        $this->hasOne('CurrentMonth', [
            'foreignKey' => 'indicator_id',
            'className' => 'Months',
            'conditions' => ['AND' => [
                                'CurrentMonth.month' => Configure::read("Conf")['month'],
                                'CurrentMonth.year' => Configure::read("Conf")['year']
                            ]]
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

        $validator
            ->allowEmpty('formula');

        $validator
            ->allowEmpty('source');

        $validator
            ->allowEmpty('goal');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));
        return $rules;
    }
}
