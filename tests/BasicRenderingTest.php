<?php

declare(strict_types=1);

namespace Sublime\Tests;

use PHPUnit\Framework\TestCase;
use function Sublime\{Sublime, body_, div_, h1_, p_};

final class BasicRenderingTest extends TestCase
{
    public function testCanRenderSimpleDocument(): void
    {
        $html = Sublime(fn () => body_(data: [
            div_(class: 'wrapper', data: [
                h1_('Hello'),
                p_('World')
            ])
        ]));

        self::assertSame('<body><div class="wrapper"><h1>Hello</h1><p>World</p></div></body>', $html);
    }
}
