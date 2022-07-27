<?php

use App\City;
use App\Order;
use Illuminate\Database\Seeder;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 12; $i++){
            Product::create([
                'title'=> 'title '.($i+1),
                'description'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ad blanditiis qui nemo. Eligendi error dolore iure fugit. Ipsam rem veritatis, aliquid ea adipisci iste voluptate quia error nobis culpa. '.($i+1),
                'image'=> 'img/'.($i+1).'.jpg',
                'price'=> 4000,
            ]);
        }
        User::create([
            'name'=> 'Saleh Elsayed',
            'email'=> 'saleh@test.com',
            'password' => Hash::make('12345678'),
            'is_admin' => 1,

        ]);
        User::create([
            'name'=> 'Saleh Goied',
            'email'=> 'salehgoied@test.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name'=> 'Hamza Goied',
            'email'=> 'test@test.com',
            'password' => Hash::make('12345678'),
        ]);

        City::create([
            'name'=> 'Alex',
            'price'=> 30,
        ]);
        
        City::create([
            'name'=> 'Cairo',
            'price'=> 50,
        ]);

        // Order::create([
        //     'user_id'=> 2,
        //     'amount'=> '4000',
        //     'checkout'=> 1,
        //     'first_name'=> 'Saleh',
        //     'last_name'=> 'Goied',
        //     'email'=> 'test@test.com',
        //     'city_id'=> 1,
        //     'shipping'=> 30,
        //     'address'=>'aaaaaaaa',
        //     'phone'=> '123-456-789',
        //     'total'=> '4030',
        // ]);

        
        // Order::create([
        //     'user_id'=> 3,
        //     'amount'=> '8000',
        //     'checkout'=> 2,
        //     'first_name'=> 'Ahmed',
        //     'last_name'=> 'Mohammed',
        //     'email'=> 'testfortest@test.com',
        //     'city_id'=> 2,
        //     'shipping'=> 50,
        //     'address'=>'aaaaaaaa',
        //     'phone'=> '123-456-789',
        //     'total'=> '8050',
        // ]);
        
    }
}