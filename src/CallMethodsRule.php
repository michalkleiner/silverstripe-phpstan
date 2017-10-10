<?php declare(strict_types = 1);

namespace SilbinaryWolf\SilverstripePHPStan;

use PHPStanVendor\PhpParser\Node;
use PHPStanVendor\PhpParser\Node\Expr\MethodCall;

use PHPStan\Analyser\Scope;
use PHPStan\Broker\Broker;
use PHPStan\Rules\FunctionCallParametersCheck;
use PHPStan\Rules\RuleLevelHelper;

class CallMethodsRule extends \PHPStan\Rules\Methods\CallMethodsRule
{
	public function getNodeType(): string
	{
		return MethodCall::class;
	}

	/**
	 * @param \PhpParser\Node\Expr\MethodCall $node
	 * @param \PHPStan\Analyser\Scope $scope
	 * @return string[]
	 */
	public function processNode(Node $node, Scope $scope): array
	{
		$errors = parent::processNode($node, $scope);
		return $errors;
	}

}
