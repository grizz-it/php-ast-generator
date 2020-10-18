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
use GrizzIt\PhpAstGenerator\Component\Generator\PropertyGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\VariableGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\ReferenceGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\Definition\ClassGenerator;

/**
 * @coversDefaultClass \GrizzIt\PhpAstGenerator\Component\Generator\Definition\ClassGenerator
 * @covers GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractMethodsTrait
 * @covers GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractConstantsTrait
 * @covers GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractInterfacesTrait
 * @covers GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractTraitsTrait
 * @covers GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractPropertiesTrait
 */
class ClassGeneratorTest extends TestCase
{
    /**
     * @covers ::generate
     * @covers ::__construct
     *
     * @return void
     */
    public function testGenerate(): void
    {
        $includeParent = true;
        $includeInterfaces = true;
        $referenceGenerator = new ReferenceGenerator();
        $methodGenerator = new MethodGenerator(new VariableGenerator());
        $constantGenerator = new ConstantGenerator();
        $propertyGenerator = new PropertyGenerator();
        $subject = new ClassGenerator(
            $includeParent,
            $includeInterfaces,
            $referenceGenerator,
            $methodGenerator,
            $constantGenerator,
            $propertyGenerator
        );


        $reflection = new ReflectionClass(MockClass::class);

        $this->assertInstanceOf(
            DefinitionInterface::class,
            $subject->generate($reflection)
        );
    }
}
