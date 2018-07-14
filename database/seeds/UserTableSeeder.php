<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class, 3)->create();
        $user = \App\User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);
    }
}
