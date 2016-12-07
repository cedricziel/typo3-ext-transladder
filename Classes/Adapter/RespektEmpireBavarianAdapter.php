<?php

namespace CedricZiel\Transladder\Adapter;

use Goutte\Client;

class RespektEmpireBavarianAdapter implements AdapterInterface
{
    /**
     * Translates the content to bavarian.
     *
     * @param string $originalContent
     * @param string $targetLanguageIsoCode
     *
     * @return string
     */
    public function translate($originalContent, $targetLanguageIsoCode)
    {
        $client = new Client();

        $crawler = $client->request('GET', 'http://www.respekt-empire.de/Translator/?page=translateEngine');

        $form = $crawler->selectButton('Übersetzen')->form(
            [
                'tr_text' => $originalContent,
            ]
        );
        $crawler = $client->submit($form);

        return $crawler->filter('#translatedtext')->text();
    }
}
