<?php

namespace Tests\Base;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class TestBase extends TestCase
{
    protected User $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->user = $this->createUser();
    }

    protected function createUser()
    {
        $user = new User();
        $user->fill([
            'name' => 'test_user1',
            'email' => 'test_user1@example.com',
            'password' => Hash::make('testUser1')
        ])->save();

        return $user;
    }
}
