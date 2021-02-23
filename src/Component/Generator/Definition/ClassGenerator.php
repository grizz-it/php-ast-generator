<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator\Definition;

use ReflectionClass;
use GrizzIt\Ast\Common\Php\DefinitionInterface;
use GrizzIt\PhpAstGenerator\Common\MethodGeneratorInterface;
use GrizzIt\PhpAstGenerator\Common\ConstantGeneratorInterface;
use GrizzIt\PhpAstGenerator\Common\PropertyGeneratorInterface;
use GrizzIt\PhpAstGenerator\Common\ReferenceGeneratorInterface;
use GrizzIt\PhpAstGenerator\Common\DefinitionGeneratorInterface;
use GrizzIt\Ast\Component\FileComponent\Php\Definition\ClassDefinition;
use GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractTraitsTrait;
use GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractMethodsTrait;
use GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractConstantsTrait;
use GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractInterfacesTrait;
use GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractPropertiesTrait;

class ClassGenerator implements DefinitionGeneratorInterface
{
    use ExtractInterfacesTrait;
    use ExtractTraitsTrait;
    use ExtractMethodsTrait;
    use ExtractConstantsTrait;
    use ExtractPropertiesTrait;

    /**
     * Determines whether the parent should be copied.
     *
     * @var bool
     */
    private bool $includeParent;

    /**
     * Determines whether interfaces should be copied.
     *
     * @var bool
     */
    private bool $includeInterfaces;

    /**
     * Whether the parents methods should be inherited.
     *
     * @var bool
     */
    private bool $includeParentMethods;

    /**
     * Whether the private methods should be inherited.
     *
     * @var bool
     */
    private bool $includePrivateMethods;

    /**
     * Constructor.
     *
     * @param bool $includeParent
     * @param bool $includeInterfaces
     * @param ReferenceGeneratorInterface|null $referenceGenerator
     * @param MethodGeneratorInterface|null $methodGenerator
     * @param ConstantGeneratorInterface|null $constantGenerator
     * @param PropertyGeneratorInterface|null $propertyGenerator
     * @param bool $includeParentMethods
     * @param bool $includePrivateMethods
     */
    public function __construct(
        bool $includeParent,
        bool $includeInterfaces,
        ?ReferenceGeneratorInterface $referenceGenerator,
        ?MethodGeneratorInterface $methodGenerator,
        ?ConstantGeneratorInterface $constantGenerator,
        ?PropertyGeneratorInterface $propertyGenerator,
        bool $includeParentMethods = false,
        bool $includePrivateMethods = true
    ) {
        $this->includeParent = $includeParent;
        $this->includeInterfaces = $includeInterfaces;
        $this->referenceGenerator = $referenceGenerator;
        $this->methodGenerator = $methodGenerator;
        $this->constantGenerator = $constantGenerator;
        $this->propertyGenerator = $propertyGenerator;
        $this->includeParentMethods = $includeParentMethods;
        $this->includePrivateMethods = $includePrivateMethods;
    }

    /**
     * Generate an AST class based on a reflection class.
     *
     * @param ReflectionClass $class
     *
     * @return DefinitionInterface
     */
    public function generate(
        ReflectionClass $reflection
    ): DefinitionInterface {
        $parentClass = '';
        if ($this->includeParent) {
            $parentClass = $reflection->getParentClass();
            $parentClass = $parentClass ?
                '\\' . trim($parentClass->getName(), '\\') : '';
        }

        $class = new ClassDefinition(
            $reflection->getShortName(),
            $reflection->getNamespaceName(),
            $parentClass
        );

        $interfaces = [];

        if ($this->includeInterfaces) {
            $interfaces = $this->extractInterfaces($reflection);
        }

        $class->setAbstract($reflection->isAbstract());
        $class->setIsFinal($reflection->isFinal());
        $class->setIsTrait($reflection->isTrait());
        $class->setImplements(...$interfaces);
        $class->setTraits(...$this->extractTraits($reflection));
        $class->setMethods(...$this->extractMethods(
            $reflection,
            $this->includeParentMethods,
            $this->includePrivateMethods
        ));
        $class->setConstants(...$this->extractConstants($reflection));
        $class->setProperties(...$this->extractProperties($reflection));

        return $class;
    }
}
