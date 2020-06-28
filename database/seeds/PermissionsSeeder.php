<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions_array = [];
        array_push($permissions_array, Permission::create(['name' => 'crear usuario']));
        array_push($permissions_array, Permission::create(['name' => 'editar usuario']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar usuario']));
        array_push($permissions_array, Permission::create(['name' => 'leer usuario']));
        //$sellerPermission = Permission::create(['name' => 'leer usuario']);
        //array_push($permissions_array, $sellerPermission);
        $superAdminRole = Role::create(['name' => 'Administrador']);
        $superAdminRole->syncPermissions($permissions_array);
       //$sellerRole = Role::create(['name' => 'Vendedor']);
        //$sellerRole->givePermissionTo($sellerPermission);

       $userSuperAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        //assign role
        $userSuperAdmin->assignRole('Administrador'); 
        //creando otro usuario
/*
        $sellerUser = User::create([
            'name' => 'vendedor',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('seller'),
        ]);
        //assign role
        $sellerUser->assignRole('Vendedor'); */
    }
}