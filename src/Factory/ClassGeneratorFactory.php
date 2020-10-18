<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Factory;

use GrizzIt\PhpAstGenerator\Common\DefinitionGeneratorInterface;
use GrizzIt\PhpAstGenerator\Component\Generator\MethodGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\ConstantGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\PropertyGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\VariableGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\ReferenceGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\Definition\ClassGenerator;

class ClassGeneratorFactory
{
    /**
     * Creates a class generator.
     *
     * @param bool $includeParent
     * @param bool $includeInterfaces
     * @param bool $includeReferences
     * @param bool $includeMethods
     * @param bool $includeConstants
     * @param bool $includeProperties
     *
     * @return DefinitionGeneratorInterface
     */
    public function create(
        bool $includeParent,
        bool $includeInterfaces,
        bool $includeReferences,
        bool $includeMethods,
        bool $includeConstants,
        bool $includeProperties
    ): DefinitionGeneratorInterface {
        $referenceGenerator = $includeReferences ?
            new ReferenceGenerator() :
            null;

        $methodGenerator = $includeMethods ?
            new MethodGenerator(new VariableGenerator()) :
            null;

        $constantGenerator = $includeConstants ?
            new ConstantGenerator() :
            null;

        $propertyGenerator = $includeProperties ?
            new PropertyGenerator() :
            null;

        return new ClassGenerator(
            $includeParent,
            $includeInterfaces,
            $referenceGenerator,
            $methodGenerator,
            $constantGenerator,
            $propertyGenerator
        );
    }
}
