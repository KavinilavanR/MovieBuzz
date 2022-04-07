<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\MovieUsers;
class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user=MovieUsers::where('name','kabilan')->find();
        $this->assertTrue(isset($user));
    }
}
