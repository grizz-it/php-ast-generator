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
use GrizzIt\PhpAstGenerator\Component\Generator\PropertyGenerator;

/**
 * @coversDefaultClass \GrizzIt\PhpAstGenerator\Component\Generator\PropertyGenerator
 */
class PropertyGeneratorTest extends TestCase
{
    /**
     * @covers ::generate
     *
     * @return void
     */
    public function testGenerate(): void
    {
        $subject = new PropertyGenerator();
        $reflection = new ReflectionClass(MockClass::class);
        $defaultValues = $reflection->getDefaultProperties();

        foreach ($reflection->getProperties() as $property) {
            $this->assertInstanceOf(
                PropertyInterface::class,
                $subject->generate(
                    $property,
                    $defaultValues[$property->getName()] ?? null
                )
            );
        }
    }
}
