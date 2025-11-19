<?php

declare(strict_types=1);

namespace Sublime\Tests;

use PHPUnit\Framework\TestCase;
use function Sublime\div_;

final class HtmlEscapingTest extends TestCase
{
    public function testSpecialCharactersAreEscaped(): void
    {
        $html = div_('Hello & "World" <test>')->render();

        self::assertSame('<div>Hello &amp; &quot;World&quot; &lt;test&gt;</div>', $html);
    }

    public function testQuotesAndAmpersandsAreHandled(): void
    {
        $html = div_("Tom & Jerry's <Adventure>")->render();

        self::assertSame('<div>Tom &amp; Jerry&#039;s &lt;Adventure&gt;</div>', $html);
    }
}
