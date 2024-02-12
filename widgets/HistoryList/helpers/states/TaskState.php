<?php

namespace app\widgets\HistoryList\helpers\states;

use app\interfaces\CommonStateInterface;
use app\models\History;
use app\widgets\HistoryList\helpers\BaseCommonState;

/**
 * @package app\widgets\HistoryList\helpers\states
 *
 */
class TaskState extends BaseCommonState implements CommonStateInterface
{
    public function __construct(History $history)
    {
        $task = $history->task;
        $this->body = $history->eventText . ": " . ($task->title ?? '');

        $this->isHasFooterDateTime = true;
        $this->footerDateTime = $history->ins_ts;
        $this->iconClass = 'fa-check-square bg-yellow';
    }


}