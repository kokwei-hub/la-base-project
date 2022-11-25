<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_detail')->insert([
            [
                'user_id'    => 1,
                'fullname'   => 'Admin',
                'gender'     => '-',
                'created_by' => 1,
            ],
        ]);
    }
}
