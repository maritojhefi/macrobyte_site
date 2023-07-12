<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'first_name' => 'admin',
            'email' => 'maritojhefi@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('jhefi123'),
        ];
        $user = User::create($input);
        /** @var Role $adminRole */
        $adminRole = Role::whereName('admin')->first();
        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
