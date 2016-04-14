<?php
namespace App\Model\Table;

use App\Model\Entity\Setting;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

class SettingsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('settings');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('code');

        $validator
            ->allowEmpty('key');

        $validator
            ->allowEmpty('value');

        return $validator;
    }
    public function load() {
        $settings = $this->find();

        foreach ($settings as $variable) {
            Configure::write('Conf.' . $variable->key, $variable->value);
        }
    }

    public function getSettings() {
        return $this->find('all');
    }
    public function listSettings() {
        return $this->find('list', ['keyField' => 'key','valueField' => 'value'])->toArray();
    }
}
