<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrNew(['email' => 'admin@admin.com']);
        $user->name = 'Admin';
        $user->password = Hash::make('admin@1234'); 
        $user->role = User::ROLE_ADMIN;
        $user->save();
    }
}
