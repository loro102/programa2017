<?php

use Illuminate\Database\Seeder;

class rolespermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //roles
        DB::table('roles')->insert(
            [
                'name'       => 'abogado',
                'slug'       => 'abogado',
                'description'=> 'Rol de abogados',
            ]);
        DB::table('roles')->insert(
            [
                'name'       => 'administracion',
                'slug'       => 'administracion',
                'description'=> 'Rol de administracion',
            ]);
        DB::table('roles')->insert(
            [
                'name'       => 'contabilidad',
                'slug'       => 'contabilidad',
                'description'=> 'Rol de contabilidad',
            ]);
        DB::table('roles')->insert(
            [
                'name'       => 'direccion',
                'slug'       => 'direccion',
                'description'=> 'Rol de direccion',
            ]);
        DB::table('roles')->insert(
            [
                'name'       => 'admin',
                'slug'       => 'admin',
                'description'=> 'Rol de administrador',
            ]);
        //permisos
        DB::table('permissions')->insert(
            [
                'name'       => 'lectura',
                'slug'       => 'lectura',
                'description'=> 'permisos para ver',
            ]);
        DB::table('permissions')->insert(
            [
                'name'       => 'escritura',
                'slug'       => 'escritura',
                'description'=> 'permisos para crear o modificar',
            ]);
        DB::table('permissions')->insert(
            [
                'name'       => 'borrado',
                'slug'       => 'borrado',
                'description'=> 'permisos de borrado',
            ]);

        //asignar permisos a los roles
        DB::table('permission_role')->insert(
        [
            'permission_id' => '1',
            'role_id'       => '1',
        ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '2',
                'role_id'       => '1',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '3',
                'role_id'       => '1',
            ]);

        DB::table('permission_role')->insert(
            [
                'permission_id' => '1',
                'role_id'       => '2',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '2',
                'role_id'       => '2',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '3',
                'role_id'       => '2',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '1',
                'role_id'       => '3',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '2',
                'role_id'       => '3',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '3',
                'role_id'       => '3',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '1',
                'role_id'       => '4',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '2',
                'role_id'       => '4',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '3',
                'role_id'       => '4',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '1',
                'role_id'       => '5',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '2',
                'role_id'       => '5',
            ]);
        DB::table('permission_role')->insert(
            [
                'permission_id' => '3',
                'role_id'       => '5',
            ]);
    }
}
