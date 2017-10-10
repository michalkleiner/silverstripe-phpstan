<?php declare(strict_types = 1);

namespace SilbinaryWolf\SilverstripePHPStan;

use PHPStanVendor\PhpParser\Node;
use PHPStanVendor\PhpParser\Node\Expr\MethodCall;
use PHPStanVendor\PhpParser\Node\Stmt\If_;
use PHPStanVendor\PhpParser\Node\Expr\BooleanNot;

use PHPStan\Analyser\Scope;
use PHPStan\Broker\Broker;
use PHPStan\Rules\FunctionCallParametersCheck;
use PHPStan\Rules\RuleLevelHelper;
use PHPStan\Type\ObjectType;

// Silverstripe
use Object;

class HasMethodRule implements \PHPStan\Rules\Rule
{
	/**
	 * @var \PHPStan\Broker\Broker
	 */
	private $broker;

	/**
	 * @var \PHPStan\Rules\FunctionCallParametersCheck
	 */
	private $check;

	/**
	 * @var \PHPStan\Rules\RuleLevelHelper
	 */
	private $ruleLevelHelper;

	/**
	 * @var bool
	 */
	private $checkThisOnly;

	public function __construct(
		Broker $broker,
		FunctionCallParametersCheck $check,
		RuleLevelHelper $ruleLevelHelper,
		bool $checkThisOnly
	)
	{
		$this->broker = $broker;
		$this->check = $check;
		$this->ruleLevelHelper = $ruleLevelHelper;
		$this->checkThisOnly = $checkThisOnly;
	}

	public function getNodeType(): string
	{
		return If_::class;
	}

	/**
	 * @param \PhpParser\Node\Expr\MethodCall $node
	 * @param \PHPStan\Analyser\Scope $scope
	 * @return string[]
	 */
	public function processNode(Node $node, Scope $scope): array
	{
		if ($node->cond instanceof BooleanNot) {
			return [];
		}
		$stack = [$node->cond];
		while ($stack) {
			$expr = array_shift($stack);
			if ($expr instanceof MethodCall && strtolower($expr->name) === 'hasmethod') {
				$type = $scope->getType($expr->var);
				if ($type instanceof ObjectType && is_a($type->getClass(), Object::class, true)) {
					
				}
			}
		}
		return [];
	}

}
