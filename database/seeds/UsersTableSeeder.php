<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        
        DB::table('role_user')->truncate();

        $admin =  User::create([
            'name' => 'admin',
            'lastName' => 'admin',
            'birthday' => '2001-03-23',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $utilisateur = User::create([
            'name' => 'utilisateur',
            'lastName' => 'user',
            'birthday' => '1996-02-12',
            'email' => 'utilisateur@utilisateur.com',
            'password' => Hash::make('password')
        ]);
        
        $auteur = User::create([
            'name' => 'auteur',
            'lastName' => 'auteur',
            'birthday' => '2003-05-26',
            'email' => 'auteur@auteur.com',
            'password' => Hash::make('password')
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $utilisateurRole = Role::where('name', 'utilisateur')->first();
        $auteurRole = Role::where('name', 'auteur')->first();


        $admin->roles()->attach($adminRole);
        $utilisateur->roles()->attach($utilisateurRole);
        $auteur->roles()->attach($auteurRole);
    }

}
