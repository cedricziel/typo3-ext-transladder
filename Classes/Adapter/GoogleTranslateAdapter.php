<?php

namespace CedricZiel\Transladder\Adapter;

use Google\Cloud\Translate\TranslateClient;

class GoogleTranslateAdapter implements AdapterInterface
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var TranslateClient
     */
    protected $translateClient;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;

        $this->translateClient = new TranslateClient($config);
    }

    /**
     * @param string $originalContent
     * @param string $targetLanguageIsoCode
     *
     * @return string
     */
    public function translate($originalContent, $targetLanguageIsoCode)
    {
        $text = $this->translateClient->translate($originalContent, ['target' => $targetLanguageIsoCode])['text'];

        return html_entity_decode($text, ENT_QUOTES | ENT_XML1, 'UTF-8');
    }
}
