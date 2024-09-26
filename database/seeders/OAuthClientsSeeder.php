<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OAuthClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'name' => 'weblog_api Personal Access Client',
            'secret' => 'xLNrt0VBz6Y1I9nT9mNhKd0yj9WQldiICdGYfY7R',
            'redirect' => 'http://localhost',
            'provider' => 'users',
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('oauth_clients')->insert([
            'name' => 'weblog_api Password Grant Client',
            'secret' => 'iztdUahby1JF4zBVx3zTBNHOgerfMtl73136dCqt',
            'redirect' => 'http://localhost',
            'provider' => 'users',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
