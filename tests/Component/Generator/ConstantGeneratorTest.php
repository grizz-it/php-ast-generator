<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Tests\Component\Generator;

use ReflectionClass;
use PHPUnit\Framework\TestCase;
use GrizzIt\Ast\Common\Php\PropertyInterface;
use GrizzIt\PhpAstGenerator\Tests\MockObjects\MockClass;
use GrizzIt\PhpAstGenerator\Component\Generator\ConstantGenerator;

/**
 * @coversDefaultClass \GrizzIt\PhpAstGenerator\Component\Generator\ConstantGenerator
 */
class ConstantGeneratorTest extends TestCase
{
    /**
     * @covers ::generate
     *
     * @return void
     */
    public function testGenerate(): void
    {
        $subject = new ConstantGenerator();
        $reflection = new ReflectionClass(MockClass::class);

        foreach ($reflection->getReflectionConstants() as $constant) {
            $this->assertInstanceOf(
                PropertyInterface::class,
                $subject->generate($constant)
            );
        }
    }
}
