<?php

use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'name' => 'sample_user01',
                'email' => 'sampleUser01@example.com',
                'password' => \Illuminate\Support\Facades\Hash::make('sampleUser01')
            ]
        ]);
    }
}
