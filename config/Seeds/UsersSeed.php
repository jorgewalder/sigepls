<?php
use Migrations\AbstractSeed;
use \Cake\Auth\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
            'username' => 'admin',
            'password' => (new DefaultPasswordHasher)->hash('admin'),
            'role' => 'admin',
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
