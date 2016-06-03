<?php
namespace App\Model\Table;

use App\Model\Entity\Indicator;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Network\Session;


class IndicatorsTable extends Table
{
    public function initialize(array $config)
    {
        $session = new Session();
        parent::initialize($config);

        $this->table('indicators');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Months', [
            'foreignKey' => 'indicator_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->belongsTo('Categories');

        $this->hasOne('CurrentMonth', [
            'foreignKey' => 'indicator_id',
            'className' => 'Months',
            'conditions' => ['AND' => [
                                'CurrentMonth.month' => Configure::read("Conf")['month'],
                                'CurrentMonth.year' => Configure::read("Conf")['year'],
                                'CurrentMonth.zone_id' => $session->read('Auth.User.zone_id')
                            ]]
        ]);

        $this->belongsToMany('Zones', [
            'through' => 'IndicatorsZones',
            'dependent' => true,
            'cascadeCallbacks' => true,
            'saveStrategy' => 'replace'
        ]);

    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->notEmpty('name');

        $validator
            ->allowEmpty('formula');

        $validator
            ->allowEmpty('source');

        $validator
            ->allowEmpty('goal');

        $validator->notEmpty('category_id');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));
        return $rules;
    }
}
