<?php

namespace CedricZiel\Transladder\Hook;

use CedricZiel\Transladder\Adapter\AdapterInterface;
use CedricZiel\Transladder\Adapter\GoogleTranslateAdapter;
use CedricZiel\Transladder\Adapter\RespektEmpireBavarianAdapter;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\DataHandling\DataHandler;

class TransladderHook
{
    /**
     * @var array
     */
    protected static $languageRecordCache = [];

    /**
     * @param string      $content The (new) translated record field
     * @param array       $languageRecord The original record
     * @param DataHandler $dataHandler
     */
    public function processTranslateTo_copyAction(&$content, $languageRecord, $dataHandler)
    {
        if (!array_key_exists($languageRecord['uid'], static::$languageRecordCache)) {
            static::$languageRecordCache[$languageRecord['uid']] = BackendUtility::getRecord(
                'sys_language',
                $languageRecord['uid']
            );
        }

        $languageRecord = static::$languageRecordCache[$languageRecord['uid']];

        $adapter = $this->createService();
        $content = $adapter->translate($content, $languageRecord['language_isocode']);
    }

    /**
     * @return AdapterInterface
     */
    protected function createService()
    {
        $extensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['transladder']);
        $service = $extensionConfiguration['service'];

        switch ($service) {
            case 'respekt-bavarian':
                return new RespektEmpireBavarianAdapter();
            case 'google':
                $googleApiKey = $extensionConfiguration['google_api_key'];
                $instance = new GoogleTranslateAdapter(['key' => $googleApiKey]);

                return $instance;
        }
    }
}
