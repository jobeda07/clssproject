<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        $users=[
            ['name' => 'liza','email' => 'liza@gmail.com','username' => 'liza aktar',
            'password' =>Hash::make('12345678'), 'role'=>'admin'],
        ];
        User::insert($users);
    }
}
