<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Tests\MockObjects;

trait MockTrait
{
    public array $publicProperty = [];

    public function setPublicProperty(array $publicProperty): void
    {
        $this->publicProperty = $publicProperty;
    }
}
