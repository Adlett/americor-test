<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\helpers;

use app\interfaces\CommonStateInterface;
use app\models\History;
use app\widgets\HistoryList\helpers\states\CallState;
use app\widgets\HistoryList\helpers\states\FaxState;
use app\widgets\HistoryList\helpers\states\SmsState;
use app\widgets\HistoryList\helpers\states\TaskState;

/**
 * @package app\widgets\HistoryList\helpers
 *
 */
class BaseCommonState implements CommonStateInterface
{

    protected History $history;

    protected bool $isToShowFooterDate = false;
    protected bool $isHasContent = false;

    protected string $body = '';

    protected string $footer = '';

    protected string $footerDateTime = '';

    protected bool $isHasFooterDateTime = false;

    protected string $iconClass = 'fa-gear bg-purple-light';

    protected string $bodyDateTime = '';

    protected ?CommonStateInterface $state = null;

    private array $stateClasses = [
        History::EVENT_CREATED_TASK => TaskState::class,
        History::EVENT_COMPLETED_TASK => TaskState::class,
        History::EVENT_UPDATED_TASK => TaskState::class,

        History::EVENT_INCOMING_SMS => SmsState::class,
        History::EVENT_OUTGOING_SMS => SmsState::class,

        History::EVENT_OUTGOING_FAX => FaxState::class,
        History::EVENT_INCOMING_FAX => FaxState::class,

        History::EVENT_INCOMING_CALL => CallState::class,
        History::EVENT_OUTGOING_CALL => CallState::class,
    ];

    public function __construct(History $history)
    {
        $this->history = $history;
        $this->initState();
    }


    /**
     * @return bool
     */
    public function getIsToShowFooterDate(): bool
    {
        return $this->isToShowFooterDate;
    }

    /**
     * @return string
     */
    public function getFooterDateTime(): string
    {
        return $this->footerDateTime;
    }

    /**
     * @return bool
     */
    public function getIsHasContent(): bool
    {
        return $this->isHasContent;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->history->call->comment ?? '';
    }

    /**
     * @return string
     */
    public function getFooter(): string
    {
        return $this->footer;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body ?? '';
    }

    /**
     * @return string
     */
    public function getIconClass(): string
    {
        return $this->iconClass;
    }

    /**
     * @return bool
     */
    public function getIsHasFooterDateTime(): bool
    {
        return $this->isHasFooterDateTime;
    }

    /**
     * @return string
     */
    public function getBodyDateTime(): string
    {
        return $this->bodyDateTime;
    }

    /**
     * @return CommonStateInterface
     */
    public function getState(): CommonStateInterface
    {
        if ($this->state) {
            return $this->state;
        }
        return $this;
    }

    private function initState()
    {
        if (array_key_exists($this->history->event, $this->stateClasses)) {
            $class = $this->stateClasses[$this->history->event];
            $this->state = new $class($this->history);
        } else {
            $this->body = $this->history->eventText;
            $this->bodyDateTime = $this->history->ins_ts;
        }
    }
}