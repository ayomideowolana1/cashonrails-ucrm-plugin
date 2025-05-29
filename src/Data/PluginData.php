<?php

declare(strict_types=1);

namespace CashonRails\Data;

class PluginData extends UcrmData
{
    /**
     * @var string
     */
    public $lastProcessedPayment;

    /**
     * @var string
     */
    public $paymentMatchAttribute;

    /**
     * @var string
     */
    public $startDate;

    /**
     * @var string
     */
    public $token;

    /**
     * @var string
     */
    public $lastProcessedTimestamp;

    /**
     * @var string
     */
    public $importUnattached;

    /**
     * @var string
     */
    public $lastProcessedPaymentDateTime;
}
