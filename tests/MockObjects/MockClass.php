<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Tests\MockObjects;

class MockClass implements MockInterface
{
    use MockTrait;

    private string $privateProperty = 'foo';

    public static $publicStaticProperty;

    private const PRIVATE_CONSTANT = 'private_constant';

    public function __construct(
        ?string $privateProperty,
        array $publicProperty = []
    ) {
        $this->privateProperty = $privateProperty;
        $this->publicProperty = $publicProperty;
    }

    private function getPrivateProperty(): string
    {
        return $this->privateProperty;
    }
}
