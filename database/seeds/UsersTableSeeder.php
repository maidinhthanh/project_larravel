<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
        [ 
            'user_full'=>'Nguyen Van A',
            'user_name'=>'nguyenvana',
            'user_pass'=>'123456',
            'user_mail'=>'vana@gmail.com',
            'user_level'=>2
        ],
        [ 
            'user_full'=>'Nguyen Van B',
            'user_name'=>'nguyenvanb',
            'user_pass'=>'123456',
            'user_mail'=>'vanb@gmail.com',
            'user_level'=>2
        ],
        [ 
            'user_full'=>'Nguyen Van C',
            'user_name'=>'nguyenvanc',
            'user_pass'=>'123456',
            'user_mail'=>'vanc@gmail.com',
            'user_level'=>2
        ],
         [ 
            'user_full'=>'Nguyen Van D',
            'user_name'=>'nguyenvand',
            'user_pass'=>'123456',
            'user_mail'=>'vand@gmail.com',
            'user_level'=>2
        ],
        [ 
            'user_full'=>'Nguyen Van E',
            'user_name'=>'nguyenvane',
            'user_pass'=>'123456',
            'user_mail'=>'vane@gmail.com',
            'user_level'=>2
        ]
    ]);
    }
}
