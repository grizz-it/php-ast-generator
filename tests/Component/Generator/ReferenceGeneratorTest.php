<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Tests\Component\Generator;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \GrizzIt\PhpAstGenerator\Component\Generator\ReferenceGenerator
 */
class ReferenceGeneratorTest extends TestCase
{
    /**
     * @covers ::generate
     *
     * @return void
     */
    public function testGenerate(): void
    {
        $subject = new \GrizzIt\PhpAstGenerator\Component\Generator\ReferenceGenerator();

        $reference = 'string';
        /**
         * @TODO: Write the rest of the unit test.
         */
        $this->assertInstanceOf(\GrizzIt\Ast\Common\Php\ReferenceInterface::class, $subject->generate($reference));
    }
}
