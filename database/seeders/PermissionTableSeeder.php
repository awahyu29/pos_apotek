<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'config-list',
            'config-create',
            'config-edit',
            'config-delete',
            'barang-list',
            'barang-create',
            'barang-edit',
            'barang-delete',
            'jenis-list',
            'jenis-create',
            'jenis-edit',
            'jenis-delete',
            'suplier-list',
            'suplier-create',
            'suplier-edit',
            'suplier-delete',
            'pemesanan-list',
            'pemesanan-create',
            'pemesanan-edit',
            'pemesanan-delete',
            'barangmasuk-list',
            'barangmasuk-create',
            'barangmasuk-edit',
            'barangmasuk-delete',
            'barangkeluar-list',
            'barangkeluar-create',
            'barangkeluar-edit',
            'barangkeluar-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
