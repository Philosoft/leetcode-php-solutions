<?php

declare(strict_types=1);

namespace tests\SinglyLinkedList;

use PHPUnit\Framework\TestCase;
use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;
use thephilosoft\leetcode\solutions\SinglyLinkedList\ReverseList;

class ReverseListTest extends TestCase
{
    public function testReverseOne(): void
    {
        $head = ReverseList::reverse(new ListNode(1));

        self::assertNotNull($head);
        self::assertNull($head->next);
        self::assertSame(1, $head->val);
    }

    public function testReverseOdd(): void
    {
        $head = new ListNode(1, new ListNode(2, new ListNode(3)));

        $reversedHead = ReverseList::reverse($head);
        $expected = [3, 2, 1];
        $ptr = 0;

        while ($reversedHead !== null) {
            self::assertLessThan(count($expected), $ptr);
            self::assertSame($expected[$ptr], $reversedHead->val);

            $ptr++;
            $reversedHead = $reversedHead->next;
        }
    }

    public function testReverseEven(): void
    {
        $head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4))));

        $reversedHead = ReverseList::reverse($head);
        $expected = [4, 3, 2, 1];
        $ptr = 0;

        while ($reversedHead !== null) {
            self::assertLessThan(count($expected), $ptr);
            self::assertSame($expected[$ptr], $reversedHead->val);

            $ptr++;
            $reversedHead = $reversedHead->next;
        }
    }

    public function testReverseEmpty(): void
    {
        self::assertNull(ReverseList::reverse(null));
    }

    public function testTwo(): void
    {
        $head = new ListNode(1, new ListNode(2));
        $reversed = ReverseList::reverse($head);

        self::assertNotNull($reversed);
        self::assertSame(2, $reversed->val);
        self::assertNotNull($reversed->next);
        self::assertSame(1, $reversed->next->val);
    }

    // ====

    public function testReverseOneRecursive(): void
    {
        $head = ReverseList::reverseRecursive(new ListNode(1));

        self::assertNotNull($head);
        self::assertNull($head->next);
        self::assertSame(1, $head->val);
    }

    public function testReverseOddRecursive(): void
    {
        $head = new ListNode(1, new ListNode(2, new ListNode(3)));

        $reversedHead = ReverseList::reverseRecursive($head);
        $expected = [3, 2, 1];
        $ptr = 0;

        while ($reversedHead !== null) {
            self::assertLessThan(count($expected), $ptr);
            self::assertSame($expected[$ptr], $reversedHead->val);

            $ptr++;
            $reversedHead = $reversedHead->next;
        }
    }

    public function testReverseEvenRecursive(): void
    {
        $head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4))));

        $reversedHead = ReverseList::reverseRecursive($head);
        $expected = [4, 3, 2, 1];
        $ptr = 0;

        while ($reversedHead !== null) {
            self::assertLessThan(count($expected), $ptr);
            self::assertSame($expected[$ptr], $reversedHead->val);

            $ptr++;
            $reversedHead = $reversedHead->next;
        }
    }

    public function testReverseEmptyRecursive(): void
    {
        self::assertNull(ReverseList::reverseRecursive(null));
    }

    public function testTwoRecursive(): void
    {
        $head = new ListNode(1, new ListNode(2));
        $reversed = ReverseList::reverseRecursive($head);

        self::assertNotNull($reversed);
        self::assertSame(2, $reversed->val);
        self::assertNotNull($reversed->next);
        self::assertSame(1, $reversed->next->val);
    }
}
