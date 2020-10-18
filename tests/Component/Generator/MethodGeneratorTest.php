<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Tests\Component\Generator;

use ReflectionClass;
use PHPUnit\Framework\TestCase;
use GrizzIt\Ast\Common\Php\MethodInterface;
use GrizzIt\PhpAstGenerator\Tests\MockObjects\MockClass;
use GrizzIt\PhpAstGenerator\Component\Generator\MethodGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\VariableGenerator;

/**
 * @coversDefaultClass \GrizzIt\PhpAstGenerator\Component\Generator\MethodGenerator
 */
class MethodGeneratorTest extends TestCase
{
    /**
     * @covers ::generate
     * @covers ::__construct
     *
     * @return void
     */
    public function testGenerate(): void
    {
        $variableGenerator = new VariableGenerator();
        $reflection = new ReflectionClass(MockClass::class);
        $subject = new MethodGenerator($variableGenerator);

        foreach ($reflection->getMethods() as $method) {
            $this->assertInstanceOf(
                MethodInterface::class,
                $subject->generate($method)
            );
        }
    }
}
