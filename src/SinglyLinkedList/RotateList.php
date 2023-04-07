<?php

declare(strict_types=1);

namespace thephilosoft\leetcode\solutions\SinglyLinkedList;

use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;

final class RotateList
{
    public static function rotate(?ListNode $head, int $k): ?ListNode
    {
        if ($head === null || $head->next === null) {
            return $head;
        }

        $length = 1;
        $tail = $head;
        while ($tail->next !== null) {
            $length++;
            $tail = $tail->next;
        }

        $offset = $k % $length;

        // make a ring
        $tail->next = $head;

        [$prev, $newHead] = [$tail, $head];
        // find a new head
        for ($i = 0; $i < ($length - $offset); $i++) {
            // @phpstan-ignore-next-line it's a guarantee that ->next will always be there, since list is a ring now
            $newHead = $newHead->next;
            // @phpstan-ignore-next-line it's a guarantee that ->next will always be there, since list is a ring now
            $prev = $prev->next;
        }

        // @phpstan-ignore-next-line
        $prev->next = null;

        return $newHead;
    }
}
