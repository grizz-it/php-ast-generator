<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Tests\Component\Generator\Definition;

use ReflectionClass;
use PHPUnit\Framework\TestCase;
use GrizzIt\Ast\Common\Php\DefinitionInterface;
use GrizzIt\PhpAstGenerator\Tests\MockObjects\MockClass;
use GrizzIt\PhpAstGenerator\Component\Generator\MethodGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\ConstantGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\VariableGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\Definition\InterfaceGenerator;

/**
 * @coversDefaultClass \GrizzIt\PhpAstGenerator\Component\Generator\Definition\InterfaceGenerator
 * @covers GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractMethodsTrait
 * @covers GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractConstantsTrait
 * @covers GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractInterfacesTrait
 */
class InterfaceGeneratorTest extends TestCase
{

    /**
     * @covers ::generate
     * @covers ::__construct
     *
     * @return void
     */
    public function testGenerate(): void
    {
        $methodGenerator = new MethodGenerator(new VariableGenerator());
        $constantGenerator = new ConstantGenerator();
        $subject = new InterfaceGenerator(
            true,
            $methodGenerator,
            $constantGenerator
        );

        $reflection = new ReflectionClass(MockClass::class);

        $this->assertInstanceOf(
            DefinitionInterface::class,
            $subject->generate($reflection)
        );
    }
}
