<?php

namespace app\interfaces;
/**
 * @package app\interfaces
 *
 */
interface CommonStateInterface
{

    public function getIsToShowFooterDate(): bool;

    public function getFooterDateTime(): string;

    public function getIsHasContent(): bool;

    public function getContent(): string;
    public function getFooter(): string;
    public function getBody(): string;
    public function getIconClass(): string;

    public function getIsHasFooterDateTime(): bool;

    public function getBodyDateTime(): string;
}