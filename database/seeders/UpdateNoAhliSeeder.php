<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateNoAhliSeeder extends Seeder
{
    public function run()
    {
        $users = DB::table('users')->get(); // Get all users

        foreach ($users as $index => $user) {
            $noAhli = str_pad($index + 1, 4, '0', STR_PAD_LEFT); // Generate 4-digit member number
            DB::table('users')->where('id', $user->id)->update(['No_Ahli' => $noAhli]);
        }
    }
}
