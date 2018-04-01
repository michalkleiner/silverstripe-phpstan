<?php declare(strict_types = 1);

namespace SilbinaryWolf\SilverstripePHPStan;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Type\Type;
use PHPStan\Type\ObjectType;

class ComponentHasOneMethod extends ComponentMethod
{
    /** @var  ObjectType */
    private $returnType;

    public function __construct(string $name, ClassReflection $declaringClass, ObjectType $type)
    {
        parent::__construct($name, $declaringClass, $type);
        $this->returnType = $type;
    }

    public function getReturnType(): Type
    {
        return $this->returnType;
    }
}
