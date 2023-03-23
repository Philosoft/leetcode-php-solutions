<?php

declare(strict_types=1);

namespace tests\SinglyLinkedList;

use PHPUnit\Framework\TestCase;
use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;
use thephilosoft\leetcode\solutions\SinglyLinkedList\MergeTwoSortedLists;

class MergeTwoSortedListsTest extends TestCase
{
    public function testMergeTwoEmptyLists(): void
    {
        self::assertNull((new MergeTwoSortedLists())->merge(null, null));
    }

    public function testMergeOneEmpty(): void
    {
        $expected = [1, 2, 3];
        [$head1, $head2] = [ListNode::fromArray([1, 2, 3]), null];

        $sorted = (new MergeTwoSortedLists())->merge($head1, $head2);

        self::assertNotNull($sorted);
        self::assertSame($expected, $sorted->toArray());

        [$head1, $head2] = [null, ListNode::fromArray([1, 2, 3])];
        $sorted = (new MergeTwoSortedLists())->merge($head1, $head2);

        self::assertNotNull($sorted);
        self::assertSame($expected, $sorted->toArray());
    }

    public function testOneLeftover(): void
    {
        $head1 = ListNode::fromArray([1, 2, 3, 4, 5]);
        $head2 = ListNode::fromArray([1]);

        $sorted = (new MergeTwoSortedLists())->merge($head1, $head2);

        self::assertNotNull($sorted);
        self::assertSame([1, 1, 2, 3, 4, 5], $sorted->toArray());
    }

    public function testSecondLeftOver(): void
    {
        $head1 = ListNode::fromArray([1]);
        $head2 = ListNode::fromArray([1, 2, 3, 4, 5]);

        $sorted = (new MergeTwoSortedLists())->merge($head1, $head2);

        self::assertNotNull($sorted);
        self::assertSame([1, 1, 2, 3, 4, 5], $sorted->toArray());
    }

    public function testNoLeftover(): void
    {
        $head1 = ListNode::fromArray([1, 3]);
        $head2 = ListNode::fromArray([2]);

        $sorted = (new MergeTwoSortedLists())->merge($head1, $head2);

        self::assertNotNull($sorted);
        self::assertSame([1, 2, 3], $sorted->toArray());
    }
}
