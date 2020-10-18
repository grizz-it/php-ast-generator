<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator;

use ReflectionClass;
use GrizzIt\Ast\Common\Php\DefinitionInterface;
use GrizzIt\PhpAstGenerator\Common\DefinitionGeneratorInterface;

class DefinitionGenerator implements DefinitionGeneratorInterface
{
    /**
     * Contains the class generator.
     *
     * @var DefinitionGeneratorInterface
     */
    private $classGenerator;

    /**
     * Contains the interface generator.
     *
     * @var DefinitionGeneratorInterface
     */
    private $interfaceGenerator;

    /**
     * Constructor.
     *
     * @param DefinitionGeneratorInterface $classGenerator
     * @param DefinitionGeneratorInterface $interfaceGenerator
     */
    public function __construct(
        DefinitionGeneratorInterface $classGenerator,
        DefinitionGeneratorInterface $interfaceGenerator
    ) {
        $this->classGenerator = $classGenerator;
        $this->interfaceGenerator = $interfaceGenerator;
    }

    /**
     * Generate an AST class based on a reflection class.
     *
     * @param ReflectionClass $class
     *
     * @return DefinitionInterface
     */
    public function generate(
        ReflectionClass $class
    ): DefinitionInterface {
        if ($class->isInterface()) {
            return $this->interfaceGenerator->generate($class);
        }

        return $this->classGenerator->generate($class);
    }
}
