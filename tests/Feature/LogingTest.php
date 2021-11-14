<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Log;

class LogingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Log::info('Testing feature test: Logging system.');
        Log::debug("Message");
        Log::warning(self::class." warning message should appear?");
        Log::error(self::class." here should be any error messages");
        Log::critical(self::class." I'm a dangerous bug in the system, should be fixed as fast as possible");
        Log::emergency(self::class." In that level, developers should receive any message in Slack or Email that a problem is on the emergancy leveling");
        
        $this->assertTrue(true);
    }
}
