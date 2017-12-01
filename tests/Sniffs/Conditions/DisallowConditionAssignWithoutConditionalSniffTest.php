<?php
declare(strict_types=1);

namespace NeutronStandardTest;

use PHPUnit\Framework\TestCase;

class DisallowConditionAssignWithoutConditionalSniffTest extends TestCase {
	public function testDisallowConditionAssignWithoutConditionalSniff() {
		$fixtureFile = __DIR__ . '/fixture.php';
		$sniffFile = __DIR__ . '/../../../NeutronStandard/Sniffs/Conditions/DisallowConditionAssignWithoutConditionalSniff.php';

		$helper = new SniffTestHelper();
		$phpcsFile = $helper->getTestLocalFile($sniffFile, $fixtureFile);
		$phpcsFile->process();
		$foundErrors = $phpcsFile->getErrors();
		$lines = $helper->getLineNumbersFromMessages($foundErrors);
		$this->assertEquals([5, 9], $lines);
	}
}