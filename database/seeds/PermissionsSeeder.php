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
        array_push($permissions_array, Permission::create(['name' => 'create_user']));
        array_push($permissions_array, Permission::create(['name' => 'edit_user']));
        array_push($permissions_array, Permission::create(['name' => 'delete_user']));
        array_push($permissions_array, Permission::create(['name' => 'read_user']));
        $sellerPermission = Permission::create(['name' => 'read_user']);
        array_push($permissions_array, $sellerPermission);
        //$superAdminRole = Role::create(['name' => 'super_admin']);
        //$superAdminRole->syncPermissions($permissions_array);
        $sellerRole = Role::create(['name' => 'seller_user']);
        $sellerRole->givePermissionTo($sellerPermission);


       /* $userSuperAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        //assign role
        $userSuperAdmin->assignRole('super_admin'); */
        //creando otro usuario

        $sellerUser = User::create([
            'name' => 'seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('seller'),
        ]);
        //assign role
        $sellerUser->assignRole('seller_user'); 
    }
}