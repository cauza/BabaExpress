<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin BabaXpress',
            'email' => 'admin@babaxpress.id',
            'password' => bcrypt('T4npaR!B4')
        ]);
    }
}
