<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Override;

abstract class TestCase extends BaseTestCase
{
    #[Override]
    public function setUp(): void
    {
        parent::setUp();

    }


    public function tearDown(): void
    {
        parent::tearDown();
    }
    //
}
