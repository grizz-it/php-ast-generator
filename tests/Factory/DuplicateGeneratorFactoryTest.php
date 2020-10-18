<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Tests\Factory;

use PHPUnit\Framework\TestCase;
use GrizzIt\PhpAstGenerator\Factory\DuplicateGeneratorFactory;
use GrizzIt\PhpAstGenerator\Common\DefinitionGeneratorInterface;

/**
 * @coversDefaultClass \GrizzIt\PhpAstGenerator\Factory\DuplicateGeneratorFactory
 */
class DuplicateGeneratorFactoryTest extends TestCase
{
    /**
     * @covers ::create
     *
     * @param bool $includeParent
     * @param bool $includeInterfaces
     * @param bool $includeReferences
     * @param bool $includeMethods
     * @param bool $includeConstants
     * @param bool $includeProperties
     *
     * @return void
     *
     * @dataProvider includeProvider
     */
    public function testCreate(
        bool $includeParent,
        bool $includeInterfaces,
        bool $includeReferences,
        bool $includeMethods,
        bool $includeConstants,
        bool $includeProperties
    ): void {
        $this->assertInstanceOf(
            DefinitionGeneratorInterface::class,
            (new DuplicateGeneratorFactory())->create(
                $includeParent,
                $includeInterfaces,
                $includeReferences,
                $includeMethods,
                $includeConstants,
                $includeProperties
            )
        );
    }

    /**
     * Provides different variants of inclusion.
     *
     * @return array
     */
    public function includeProvider(): array
    {
        return  [
            [false, false, false, false, false, false],
            [true, true, true, true, true, true]
        ];
    }
}
