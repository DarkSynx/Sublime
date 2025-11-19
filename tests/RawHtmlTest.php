<?php

declare(strict_types=1);

namespace Sublime\Tests;

use PHPUnit\Framework\TestCase;
use function Sublime\{div_, raw_html};

final class RawHtmlTest extends TestCase
{
    public function testRawHtmlIsNotEscaped(): void
    {
        $html = div_(data: raw_html('<span>Safe & sound</span>'))->render();

        self::assertSame('<div><span>Safe & sound</span></div>', $html);
    }
}
