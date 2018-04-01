<?php declare(strict_types = 1);

namespace SilbinaryWolf\SilverstripePHPStan;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Type\Type;
use PHPStan\Type\ObjectType;

// Silverstripe
use ManyManyList;

class ComponentManyManyMethod extends ComponentMethod
{
    /** @var DataListType **/
    private $returnType;

    public function __construct(string $name, ClassReflection $declaringClass, ObjectType $type)
    {
        parent::__construct($name, $declaringClass, $type);
        $this->returnType = new DataListType(ManyManyList::class, $type);
    }

    public function getReturnType(): Type
    {
        return $this->returnType;
    }
}
