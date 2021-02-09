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
        // factory(User::create([
        //     'name' => 'John Smith',
        //     'email' => 'johnsmith@gmail.com',
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]));
        factory(User::class, 10)->create();

    }
}
