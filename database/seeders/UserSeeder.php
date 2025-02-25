<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get the roles
        $role_admin = Role::where('name', 'admin')->first();
        $role_sales = Role::where('name', 'vendor')->first();
        // get the permissions
        $permissions_admin = Permission::all()->pluck('name')->toArray();
        $permissions_sales = ['create doctors', 'view doctors'];

        // create the users
        $user = User::create([
            'name' => 'jesus Junior',
            'email' => 'junior15062023@gmail.com',
            'password' => Hash::make('junior123'),
        ]);

        $user2 = User::create([
            'name' => 'gustavo siancas',
            'email' => 'gustavo@gmail.com',
            'password' => Hash::make('gustavo123'),
        ]);
        $user3 = User::create([
            'name' => 'Karin Santamaria',
            'email' => 'karinsntmr@gmail.com',
            'password' => Hash::make('karin2706'),
        ]);
        // link the roles with the permissions
        $role_admin->syncPermissions($permissions_admin);
        $role_sales->syncPermissions($permissions_sales);
        // assuming the roles of the users
        $user->assignRole($role_admin);
        $user2->assignRole($role_admin);
        $user3->assignRole($role_admin);
    }
}
