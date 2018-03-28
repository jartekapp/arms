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
        if (! User::where(['email' => 'jared.rolt@vokke.com.au'])->exists()) {
            User::create([
                'name' => 'Jared',
                'email' => 'jared.rolt@vokke.com.au',
                'password' => bcrypt('1234567890'),
            ]);
        }
    }
}
