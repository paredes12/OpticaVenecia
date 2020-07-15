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

        array_push($permissions_array, Permission::create(['name' => 'crear rol']));
        array_push($permissions_array, Permission::create(['name' => 'leer rol']));
        array_push($permissions_array, Permission::create(['name' => 'editar rol']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar rol']));

        array_push($permissions_array, Permission::create(['name' => 'eliminar permiso']));
        array_push($permissions_array, Permission::create(['name' => 'agregar permiso']));

        array_push($permissions_array, Permission::create(['name' => 'crear empleado']));
        array_push($permissions_array, Permission::create(['name' => 'leer empleado']));
        array_push($permissions_array, Permission::create(['name' => 'editar empleado']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar empleado']));

        array_push($permissions_array, Permission::create(['name' => 'crear cliente']));
        array_push($permissions_array, Permission::create(['name' => 'leer cliente']));
        array_push($permissions_array, Permission::create(['name' => 'editar cliente']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar cliente']));

        array_push($permissions_array, Permission::create(['name' => 'crear lugar de trabajo']));
        array_push($permissions_array, Permission::create(['name' => 'leer lugar de trabajo']));
        array_push($permissions_array, Permission::create(['name' => 'editar lugar de trabajo']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar lugar de trabajo']));

        array_push($permissions_array, Permission::create(['name' => 'crear proveedor']));
        array_push($permissions_array, Permission::create(['name' => 'leer proveedor']));
        array_push($permissions_array, Permission::create(['name' => 'editar proveedor']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar proveedor']));

        array_push($permissions_array, Permission::create(['name' => 'crear pais']));
        array_push($permissions_array, Permission::create(['name' => 'leer pais']));
        array_push($permissions_array, Permission::create(['name' => 'editar pais']));
        array_push($permissions_array, Permission::create(['name' => 'eliminar pais']));
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
            'active'=> '1',
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