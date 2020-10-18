<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Common;

use GrizzIt\Ast\Common\FileComponentInterface;

interface GeneratorInterface
{
    /**
     * Generate a class file based on the provided class.
     *
     * @param string $inputClass
     * @param string $outputClass
     *
     * @return FileComponentInterface
     */
    public function generate(
        string $inputClass,
        string $outputClass
    ): FileComponentInterface;
}
