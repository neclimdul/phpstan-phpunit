<?php declare(strict_types = 1);

namespace PHPStan\Rules\PHPUnit;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<AssertSameBooleanExpectedRule>
 */
class AssertSameBooleanExpectedRuleTest extends RuleTestCase
{

	protected function getRule(): Rule
	{
		return new AssertSameBooleanExpectedRule();
	}

	public function testRule(): void
	{
		$this->analyse([__DIR__ . '/data/assert-same-boolean-expected.php'], [
			[
				'You should use assertTrue() instead of assertSame() when expecting "true"',
				10,
			],
			[
				'You should use assertFalse() instead of assertSame() when expecting "false"',
				11,
			],
			[
				'You should use assertTrue() instead of assertSame() when expecting "true"',
				14,
			],
			[
				'You should use assertFalse() instead of assertSame() when expecting "false"',
				17,
			],
			[
				'You should use assertTrue() instead of assertSame() when expecting "true"',
				26,
			],
		]);
	}

	/**
	 * @return string[]
	 */
	public static function getAdditionalConfigFiles(): array
	{
		return [
			__DIR__ . '/../../../extension.neon',
		];
	}

}
