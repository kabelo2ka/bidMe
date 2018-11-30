<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kabelo',
            'email' => 'kabelo@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => true
        ]);
        factory(App\User::class, 20)->create();
    }
}
