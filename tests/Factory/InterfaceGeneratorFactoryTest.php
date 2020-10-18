<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Tests\Factory;

use PHPUnit\Framework\TestCase;
use GrizzIt\PhpAstGenerator\Factory\InterfaceGeneratorFactory;
use GrizzIt\PhpAstGenerator\Common\DefinitionGeneratorInterface;

/**
 * @coversDefaultClass \GrizzIt\PhpAstGenerator\Factory\InterfaceGeneratorFactory
 */
class InterfaceGeneratorFactoryTest extends TestCase
{
    /**
     * @covers ::create
     *
     * @param bool $includeParent
     * @param bool $includeMethods
     * @param bool $includeConstants
     *
     * @return void
     *
     * @dataProvider includeProvider
     */
    public function testCreate(
        bool $includeParent,
        bool $includeMethods,
        bool $includeConstants
    ): void {
        $this->assertInstanceOf(
            DefinitionGeneratorInterface::class,
            (new InterfaceGeneratorFactory())->create(
                $includeParent,
                $includeMethods,
                $includeConstants
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
            [false, false, false],
            [true, true, true]
        ];
    }
}
