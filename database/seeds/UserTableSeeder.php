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
        DB::table('users')->insert([
            'name'=>'Prabhakar Prasad',
            'email'=>str_random(8).'@gmail.com',
            'password'=>bcrypt('secret'),
        ]);

        factory(App\User::class)
                ->times(7)
                ->create();
    }
}
