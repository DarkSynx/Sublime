<?php

declare(strict_types=1);

namespace Sublime\Tests;

use PHPUnit\Framework\TestCase;
use function Sublime\div_;

final class ChildrenNormalizationTest extends TestCase
{
    public function testNestedArraysAreFlattened(): void
    {
        $html = div_(data: [
            'Hello',
            null,
            false,
            ['World', div_('!')]
        ])->render();

        self::assertSame('<div>HelloWorld<div>!</div></div>', $html);
    }
}
