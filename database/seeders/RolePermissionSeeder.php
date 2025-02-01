<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage categories',
            'manage company',
            'manage jobs',
            'manage candidates',
            'apply job',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
            ]);
        }

        $employerRole = Role::firstOrCreate([
            'name' => 'employer',
        ]);

        $employerPermissions = [
            'manage company',
            'manage jobs',
            'manage candidates',
        ];

        $employerRole->syncPermissions($employerPermissions);

        $employeeRole = Role::firstOrCreate([
            'name' => 'employee',
        ]);

        $employeePermissions = [
            'apply job',
        ];

        $employeeRole->syncPermissions($employeePermissions);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin',
        ]);

        $user = User::create([
            'name'       => 'Super Admin',
            'email'      => 'superadmin@mailinator.com',
            'password'   => bcrypt('password'),
            'occupation' => 'Superadmin',
            'experience' => 100,
            'avatar'     => 'images/default-avatar.jpg',
        ]);

        $user->assignRole($superAdminRole);
    }
}
