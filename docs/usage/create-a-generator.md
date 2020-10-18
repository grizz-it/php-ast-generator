# GrizzIT PHP AST Generator - Create a generator

This package uses the `grizz-it/ast` package to create a set of generators.
These generators can be used to generate duplicates and variants of original
objects.

These generators can be used to generate base objects, which can be manipulated
to create the end result faster.

## Generator factories

Three factories are provided in this package which contains different methods
for creating class files.
- [DuplicateGeneratorFactory](../../src/Factory/DuplicateGeneratorFactory.php)
- [ClassGeneratorFactory](../../src/Factory/ClassGeneratorFactory.php)
- [InterfaceGeneratorFactory](../../src/Factory/InterfaceGeneratorFactory.php)

### DuplicateGeneratorFactory

This variant will generate a base model of the original provided class or
interface. This can be useful to create a duplicate of a template class or
interface. During the creation of a duplicate the following parameters can be
configured to create different variants:
- `$includeParent`, whether the same parent should used.
- `$includeInterfaces`, whether the same interfaces should be implemented.
- `$includeReferences`, whether the original traits should be included.
- `$includeMethods`, whether the same methods should be copied.
- `$includeConstants`, whether the same constants should be added to the class.
- `$includeProperties`, whether the same properties should be added.

### ClassGeneratorFactory

This variant will generate a base model class of the original provided class or
interface. This can be useful when creating an implementation of an interface
or proxies for classes. This variant has the same configuration options as the
`DuplicateGeneratorFactory`:
- `$includeParent`, whether the same parent should used.
- `$includeInterfaces`, whether the same interfaces should be implemented.
- `$includeReferences`, whether the original traits should be included.
- `$includeMethods`, whether the same methods should be copied.
- `$includeConstants`, whether the same constants should be added to the class.
- `$includeProperties`, whether the same properties should be added.

### InterfaceGeneratorFactory

This variant will generate a base model interface of the original provided class
or interface. This can be useful to automatically create an interface for a
class. This variant has less configuration options:
- `$includeParent`, whether the same parent should used.
- `$includeMethods`, whether the same methods should be copied.
- `$includeConstants`, whether the same constants should be added to the class.

## Generators

The package contains different generators. These generators are used to generate
different parts of a class or interface based on reflection.
- [ClassGenerator](../../src/Component/Generator/Definition/ClassGenerator.php)
is used to generate a base model class of a class or interface.
- [InterfaceGenerator](../../src/Component/Generator/Definition/InterfaceGenerator.php)
is used to generate a base model interface of a class or interface.
- [ConstantGenerator](../../src/Component/Generator/ConstantGenerator.php)
is used to generate AST variants of the constants.
- [DefinitionGenerator](../../src/Component/Generator/DefinitionGenerator.php)
is used to automatically generate a class or interface based on the original.
- [MethodGenerator](../../src/Component/Generator/MethodGenerator.php)
is used to generate an AST variant of a method.
- [PropertyGenerator](../../src/Component/Generator/PropertyGenerator.php)
is used to generate an AST variant of a property.
- [ReferenceGenerator](../../src/Component/Generator/ReferenceGenerator.php)
is used to generate a `use` statement based on a string.
- [VariableGenerator](../../src/Component/Generator/VariableGenerator.php)
is used to generate an AST variable/parameter based on a reflection parameter.

## Further reading

[Back to usage index](index.md)
