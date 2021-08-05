<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
     
    public function run()
    {
       user::create([
           'name'=>'mmerguoum',
           'email'=>'merguoummourad@gmail.com',
           'email_verified_at'=>NOW(),
           'password'=>bcrypt('password'),
           'address'=>'YOUCODE',
           'is_admin'=>1
       ]);
    }
        
}
