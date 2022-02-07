<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function all_currency()
    {
        $response = $this->get('/converted-currency');
        $response->assertTrue(200);
    }
}