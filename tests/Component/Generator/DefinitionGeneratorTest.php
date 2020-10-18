<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Tests\Component\Generator;

use ReflectionClass;
use PHPUnit\Framework\TestCase;
use GrizzIt\Ast\Common\Php\DefinitionInterface;
use GrizzIt\PhpAstGenerator\Tests\MockObjects\MockClass;
use GrizzIt\PhpAstGenerator\Tests\MockObjects\MockInterface;
use GrizzIt\PhpAstGenerator\Common\DefinitionGeneratorInterface;
use GrizzIt\PhpAstGenerator\Component\Generator\DefinitionGenerator;

/**
 * @coversDefaultClass \GrizzIt\PhpAstGenerator\Component\Generator\DefinitionGenerator
 */
class DefinitionGeneratorTest extends TestCase
{
    /**
     * @covers ::generate
     * @covers ::__construct
     *
     * @return void
     */
    public function testGenerate(): void
    {
        $class = new ReflectionClass(MockClass::class);
        $interface = new ReflectionClass(MockInterface::class);

        $classGenerator = $this->createMock(
            DefinitionGeneratorInterface::class
        );

        $classGenerator->expects(static::once())
            ->method('generate')
            ->with($class)
            ->willReturn($this->createMock(DefinitionInterface::class));

        $interfaceGenerator = $this->createMock(
            DefinitionGeneratorInterface::class
        );

        $interfaceGenerator->expects(static::once())
            ->method('generate')
            ->with($interface)
            ->willReturn($this->createMock(DefinitionInterface::class));

        $subject = new DefinitionGenerator($classGenerator, $interfaceGenerator);

        $this->assertInstanceOf(
            DefinitionInterface::class,
            $subject->generate($class)
        );

        $this->assertInstanceOf(
            DefinitionInterface::class,
            $subject->generate($interface)
        );
    }
}
