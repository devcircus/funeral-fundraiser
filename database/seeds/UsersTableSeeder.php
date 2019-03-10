<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => config('app.admin.name'),
            'email' => config('app.admin.email'),
            'password' => bcrypt(config('app.admin.password')),
        ]);
    }
}
