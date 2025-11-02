<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class HashPlainPasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $pw = $user->password;

            if (is_string($pw) && substr($pw, 0, 4) === '$2y$') {
                continue;
            }

            $user->password = $pw;
            $user->save();
        }
    }
}
