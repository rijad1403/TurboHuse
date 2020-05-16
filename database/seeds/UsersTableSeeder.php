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
        $user = new User();
        $user->name = 'Huse Gračanin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345');
        $user->type = 'admin';
        $user->city = 'Aalborg';
        $user->state = 'Danska';
        $user->street = 'Aalborg 12345';
        $user->phone = '1234567';
        $user->zip_code = '66373';
        $user->save();

        $user = new User();
        $user->name = 'Rijad Gračanin';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('12345');
        $user->type = 'admin';
        $user->city = 'Aalborg';
        $user->state = 'Danska';
        $user->street = 'Aalborg 12345';
        $user->phone = '1234567';
        $user->zip_code = '66373';
        $user->save();
    }
}
