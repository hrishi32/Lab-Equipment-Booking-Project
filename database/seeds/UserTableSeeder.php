<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            'name'=>'Admin Admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin123'),
            'created_at'=>now(),
            'admin'=>true,
        ]);

        // factory(App\User::class)
        //         ->times(7)
        //         ->create();
    }
}
