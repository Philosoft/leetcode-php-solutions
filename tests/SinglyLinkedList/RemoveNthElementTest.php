<?php

declare(strict_types=1);

namespace tests\SinglyLinkedList;

use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;
use thephilosoft\leetcode\solutions\SinglyLinkedList\RemoveNthElement;
use PHPUnit\Framework\TestCase;

class RemoveNthElementTest extends TestCase
{
    public function testEmptyList(): void
    {
        self::assertNull((new RemoveNthElement())->remove(null, 10));
    }

    public function testRemovalOutOfBounds(): void
    {
        $head = (new RemoveNthElement())->remove(ListNode::fromArray([1, 2, 3]), 4);
        self::assertSame([1, 2, 3], $head?->toArray());
    }

    public function testRemovalOfHead(): void
    {
        $head = (new RemoveNthElement())->remove(ListNode::fromArray([1, 2, 3]), 3);
        self::assertSame([2, 3], $head?->toArray());
    }

    public function testRemoveTheOnlyElement(): void
    {
        self::assertNull((new RemoveNthElement())->remove(new ListNode(1), 1));
    }

    public function testRemoveSecondFromTheEnd(): void
    {
        self::assertSame(
            [1, 2, 3, 5],
            (new RemoveNthElement())->remove(ListNode::fromArray([1, 2, 3, 4, 5]), 2)?->toArray()
        );
    }
}
