<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@test.com';
        $user->password = bcrypt('123123123');
        $user->role = 'Admin';
        $user->status = 1;
        $user->save();
    }
}
