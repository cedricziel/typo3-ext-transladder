# TYPO3 Extension "transladder"

Minimal extension to translate your content through a DataHandler hook.

Target language support:

* bavarian through the great, great [Andreas Hummel / Respekt-empire.de](http://www.respekt-empire.de/Translator/?page=imprint)
* any target language through [Google Translate](https://translate.google.de/)

## Installation

You need to use compose mode. This package requires external libraries.

```
composer require cedricziel/transladder
```

## Configuration

Configure the extension through the ExtensionManager.
You need a [Google Translate API key](https://console.developers.google.com/apis/api/translate.googleapis.com/overview)
if you want to use Google Translate.

## License

GPL2+
