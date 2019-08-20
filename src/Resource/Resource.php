<?php

namespace ClinchPad\Resource;

use ClinchPad\ClinchPadClient;

/**
 * ClinchPad Resource library.
 *
 * @package ClinchPad
 */
class Resource
{
    protected $client;

    /**
     * Resource constructor.
     *
     * @param ClinchPadClient $client
     *   ClinchPad API ClinchPadClient
     */
    public function __construct(ClinchPadClient $client)
    {

        $this->client = $client;
    }

}