<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::all()->count() == 0){

            User::create([

                'name'=> 'Collins Appiah',
                'email'=>'appiahc86@mail.com',
                'password'=> Hash::make('11111111'),
                'role'=>'admin'

            ]);

        }
    }




}
