<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator\Extractor;

use ReflectionClass;

trait ExtractInterfacesTrait
{
    /**
     * Retrieves the direct interfaces.
     *
     * @param ReflectionClass $reflection
     *
     * @return string[]
     */
    private function extractInterfaces(ReflectionClass $reflection): array
    {
        $interfaces = $reflection->getInterfaceNames();

        foreach ($reflection->getInterfaces() as $interface) {
            $interfaces = array_diff(
                $interfaces,
                $interface->getInterfaceNames()
            );
        }

        array_walk($interfaces, function (string $interface) {
            return '\\' . trim($interface, '\\');
        });

        return $interfaces;
    }
}
