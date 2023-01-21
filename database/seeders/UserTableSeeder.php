<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'piksi301',
                'email' => 'piksi@gmail.com',
                'type' => 1,
                'password' => bcrypt('piksi301')
            ],
            [
                'name' => 'assalaam',
                'email' => 'assalaam@gmail.com',
                'type' => 0,
                'password' => bcrypt('assalaam12345')
            ],
        ];
        DB::table('users')->insert($users);
    }
}
