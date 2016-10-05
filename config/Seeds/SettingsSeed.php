<?php
use Migrations\AbstractSeed;

/**
 * Settings seed.
 */
class SettingsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [   
                'code' => 'Mês', 
                'key' => 'month', 
                'value' => 'Janeiro', 
                'type' => 'month', 
                'description' => 'Mês de cadastro atual'
            ], 
            [   
                'code' => 'Ano', 
                'key' => 'year', 
                'value' => '2016', 
                'type' => 'year', 
                'description' => 'Ano de cadastro atual'
            ], 
            [   
                'code' => 'Limite', 
                'key' => 'limiteP', 
                'value' => '01/01/2016', 
                'type' => 'text', 
                'description' => 'Data limite para preenchimento'
            ]
        ];

        $table = $this->table('settings');
        $table->insert($data)->save();
    }
}