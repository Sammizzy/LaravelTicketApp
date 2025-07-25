<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Navbar;

class NavbarSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $links = [

            [

                'name' => 'Welcome',
                'route' => 'welcome',
                'ordering' => 1,

            ],
            [

                'name' => 'Home',
                'route' => 'home',
                'ordering' => 2,

            ],
            [

                'name' => 'Tickets',
                'route' => 'tickets',
                'ordering' => 3,

            ],
            [

                'name' => 'Log a run',
                'route' => 'form',
                'ordering' => 4,

            ],
            [
                'name' => 'Login',
                'route' => 'login',
                'ordering' => 5,
            ],
            [
            'name' => 'Register',
            'route' => 'register',
            'ordering' => 6,
        ]
        ];

        foreach ($links as $key => $navbar) {

            Navbar::create($navbar);

        }
    }
}
