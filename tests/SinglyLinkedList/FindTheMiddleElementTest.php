<?php

declare(strict_types=1);

namespace tests\SinglyLinkedList;

use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;
use thephilosoft\leetcode\solutions\SinglyLinkedList\FindTheMiddleElement;
use PHPUnit\Framework\TestCase;

class FindTheMiddleElementTest extends TestCase
{
    public function testOneElement(): void
    {
        $head = new ListNode(1);

        self::assertSame($head, (new FindTheMiddleElement())->getTheMiddle($head));
    }

    public function testTwoElements(): void
    {
        /** @var ListNode $head */
        $head = ListNode::fromArray([1, 2]);

        self::assertSame($head->next, (new FindTheMiddleElement())->getTheMiddle($head));
    }

    public function testThreeElements(): void
    {
        /** @var ListNode $head */
        $head = ListNode::fromArray([1, 2, 3]);

        $middle = (new FindTheMiddleElement())->getTheMiddle($head);

        self::assertSame($head->next, $middle);
    }
}
