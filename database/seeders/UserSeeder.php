<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'Moh. Devis S',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'fullname' => 'Moh. Devis',
            'date_of_birth' => '2000-01-29',
            'place_of_birth' => 'Sumenep',
            'gender' => 'Male',
            'address' => 'Sumenep',
            'last_education' => 'S1',
            'date_of_entry' => '2021-08-18',
            'registration_number' => '01.092021.0001',
            'nik' => '12345678900987654321',
            'npwp' => '09876543211234567890',
            'phone' => '087850987679',
            'departement_id' => '1'

        ]);

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);

        $spv = User::create([
            'username' => 'Ravi Ahrory',
            'email' => 'spv@gmail.com',
            'password' => bcrypt('12345678'),
            'fullname' => 'Ravi Ahrory',
            'date_of_birth' => '2000-08-17',
            'place_of_birth' => 'Sumenep',
            'gender' => 'Male',
            'address' => 'Sumenep',
            'last_education' => 'D4/S1',
            'date_of_entry' => '2021-08-18',
            'registration_number' => '02.092021.0001',
            'nik' => '12345678900987654321',
            'npwp' => '09876543211234567890',
            'phone' => '087850987679',
            'departement_id' => '1'

        ]);

        $role = Role::create(['name' => 'supervisor']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $spv->assignRole([$role->id]);

        $user = User::create([
            'id_on_machine' => '0001',
            'username' => 'Wahyu Aditya',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678'),
            'fullname' => 'Wahyu Aditya',
            'date_of_birth' => '2001-08-17',
            'place_of_birth' => 'Sumenep',
            'gender' => 'Male',
            'address' => 'Sumenep',
            'last_education' => 'D2',
            'date_of_entry' => '2021-08-18',
            'registration_number' => '03.092021.0001',
            'nik' => '09876543210987654321',
            'npwp' => '12345678901234567890',
            'phone' => '085548909856',
            'departement_id' => '1'
        ]);

        $role = Role::create(['name' => 'user']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $user = User::create([
            'id_on_machine' => '0002',
            'username' => 'Budi Rahman',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('12345678'),
            'fullname' => 'Budi Rahman',
            'date_of_birth' => '2001-08-17',
            'place_of_birth' => 'Sumenep',
            'gender' => 'Male',
            'address' => 'Sumenep',
            'last_education' => 'D2',
            'date_of_entry' => '2021-08-18',
            'registration_number' => '03.092021.0002',
            'nik' => '09876543210987654321',
            'npwp' => '12345678901234567890',
            'phone' => '085548909856',
            'departement_id' => '2'
        ]);

        $user->assignRole('user');
    }
}
