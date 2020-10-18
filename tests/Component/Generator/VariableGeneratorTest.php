<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Tests\Component\Generator;

use ReflectionClass;
use PHPUnit\Framework\TestCase;
use GrizzIt\Ast\Common\Php\VariableInterface;
use GrizzIt\PhpAstGenerator\Tests\MockObjects\MockClass;
use GrizzIt\PhpAstGenerator\Component\Generator\VariableGenerator;

/**
 * @coversDefaultClass \GrizzIt\PhpAstGenerator\Component\Generator\VariableGenerator
 */
class VariableGeneratorTest extends TestCase
{
    /**
     * @covers ::generate
     *
     * @return void
     */
    public function testGenerate(): void
    {
        $subject = new VariableGenerator();

        $reflection = new ReflectionClass(MockClass::class);

        foreach ($reflection->getMethods() as $method) {
            foreach ($method->getParameters() as $parameter) {
                $this->assertInstanceOf(
                    VariableInterface::class,
                    $subject->generate($parameter)
                );
            }
        }
    }
}
