<?php

declare(strict_types=1);

namespace thephilosoft\leetcode\solutions\SinglyLinkedList;

use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;

class ReverseList
{
    public static function reverse(?ListNode $head): ?ListNode
    {
        if ($head === null || $head->next === null) {
            return $head;
        }

        [$prev, $cur] = [null, $head];
        while ($cur !== null) {
            $next = $cur->next;
            $cur->next = $prev;
            $prev = $cur;
            $cur = $next;
        }

        return $prev;
    }

    public static function reverseRecursive(?ListNode $head): ?ListNode
    {
        if ($head === null || $head->next === null) {
            return $head;
        }

        $tail = self::reverseRecursive($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $tail;
    }
}
