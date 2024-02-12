<?php

namespace app\widgets\HistoryList\helpers\states;

use app\interfaces\CommonStateInterface;
use app\models\Call;
use app\models\History;
use app\widgets\HistoryList\helpers\BaseCommonState;

/**
 * @package app\widgets\HistoryList\helpers\states
 *
 */
class CallState extends BaseCommonState implements CommonStateInterface
{
    public function __construct(History $history)
    {
        $call = $history->call;
        $this->body = ($call ? $call->totalStatusText . ($call->getTotalDisposition(false) ? " <span class='text-grey'>" . $call->getTotalDisposition(false) . "</span>" : "") : '<i>Deleted</i> ');

        $this->isHasFooterDateTime = true;
        $this->footerDateTime = $history->ins_ts;

        $answered = $call && $call->status == Call::STATUS_ANSWERED;

        $this->iconClass = $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red';
    }


}