<?php

namespace CedricZiel\Transladder\Adapter;

interface AdapterInterface
{
    public function translate($originalContent, $targetLanguageIsoCode);
}
