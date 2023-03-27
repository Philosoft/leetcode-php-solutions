<?php

declare(strict_types=1);

namespace thephilosoft\leetcode\solutions\SinglyLinkedList;

use thephilosoft\leetcode\lib\SinglyLinkedList\ListNode;

final class CycleDetection
{
    public function hasCycle(?ListNode $head): bool
    {
        if ($head === null) {
            return false;
        }

        [$slow, $fast] = [$head, $head->next];
        while ($fast !== null && $fast->next !== null) {
            // @phpstan-ignore-next-line
            $slow = $slow->next;
            $fast = $fast->next->next;

            if ($slow === $fast) {
                return true;
            }
        }

        return false;
    }
}
