<?php

declare(strict_types=1);

namespace tests\SinglyLinkedList;

use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;
use thephilosoft\leetcode\solutions\SinglyLinkedList\RotateList;
use PHPUnit\Framework\TestCase;

final class RotateListTest extends TestCase
{
    public function testRotateNull(): void
    {
        self::assertNull(RotateList::rotate(null, 10));
    }

    public function testRotateOneElement(): void
    {
        $head = new ListNode(1);

        for ($k = 0; $k < 10; $k++) {
            self::assertSame($head, RotateList::rotate($head, $k));
        }
    }

    public function testRotateTwoElementsOnce(): void
    {
        $head = ListNode::fromArray([1, 2]);
        $newHead = RotateList::rotate($head, 1);

        self::assertNotNull($newHead);
        self::assertSame(2, $newHead->val);
        self::assertNotNull($newHead->next);
        self::assertSame(1, $newHead->next->val);
        self::assertSame($head, $newHead->next);
    }

    public function testRotateTwoElementsTwice(): void
    {
        $head = ListNode::fromArray([1, 2]);
        $newHead = RotateList::rotate($head, 2);

        self::assertNotNull($newHead);
        self::assertSame($head, $newHead);
        self::assertNotNull($newHead->next);
        self::assertSame(1, $newHead->val);
        self::assertSame(2, $newHead->next->val);
    }
}
