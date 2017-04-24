<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Cache;

class TestCacheFacade extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCache()
    {
        // $this->assertTrue(true);
        Cache::shouldReceive('get')->with('key')->andReturn('value');
        $this->visit('/cache')->see('value');
    }
}
