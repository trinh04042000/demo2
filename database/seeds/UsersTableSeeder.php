<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $user->name = "Trinh";
        $user->email = "trinh@gmail.com";
        $user->password = Hash::make('trinh1234');
        $user->phone = '012385969446';
        $user->address = 'Ha noi';
        $user->save();

        $user = new User();
        $user->name = "Letrinh";
        $user->email = 'letrinh123@gmail.com';
        $user->password = Hash::make('letrinh123');
        $user->phone = '082759659357340';
        $user->address = 'Ha noi';
        $user->save();
    }
}
