<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Tutor;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u1 = User::create([

            'name' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('ahmad_1'),
            'mobile' => '0986826382',


        ]);

        $u2 = User::create([

            'name' => 'Tarek',
            'email' => 'tarek@gmail.com',
            'password' => Hash::make('tarek_1'),
            'mobile' => '099121314',


        ]);


        $r1 = Role::create([

            'role_en_name' => 'Admin',
            'role_description' => 'A user who maintains and gives support to the whole system plus he has all permissions.'
        ]);


        $r2 = Role::create([

            'role_en_name' => 'Student',
            'role_description' => 'A user who is willing to use the platform to enroll in courses and learn new things'
        ]);


        $t1 = Tutor::create([
            'tutor_diploma' => 'Software Engineering',
            'user_id' => $u2->id
        ]);
        $u1->roles()->attach($r1);
        $u1->roles()->attach($r2);


        App\Category::create([
            'title'=>'Web Development'
        ]);

        App\Category::create([
            'title'=>'Software Engineering'
        ]);

        App\Category::create([
            'title'=>'Laravel',
            'parent_id'=>1
        ]);

        App\Category::create([
            'title'=>'PHP',
            'parent_id'=>1
        ]);

        App\Category::create([
            'title'=>'ASP.NET',
            'parent_id'=>1
        ]);


    }
}
