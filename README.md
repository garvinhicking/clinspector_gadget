# clinspector_gadget

Very, very simple TYPO3 console CLI command JSON export

# Usage

* Install as TYPO3 extension: `composer require garvinhicking/clinspector_gadget`
* run `vendor/bin/typo3 clinspector:gadget > output.json`

... did I mention, this is basic?

# Motivation

The TYPO3 `vendor/bin/typo3 list --format=json` command sadly
only exports the "failsafe container" CLI commands and not
all the commands registered by additional extensions.

For that we just use a basic Symfony stub.