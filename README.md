# SchuljahrByInsertTag

Ein Contao 5 Custom-InsertTag, der das aktuelle **Schuljahr in Bayern** zurückgibt.

## Funktionsweise

Das Schuljahr in Bayern beginnt am **1. August** und endet am **31. Juli**.

- **August – Dezember:** Das aktuelle Kalenderjahr ist das Startjahr.
- **Januar – Juli:** Das Vorjahr ist das Startjahr.

Die Auswertung erfolgt in der Zeitzone `Europe/Berlin`.

## Verwendung

| InsertTag | Beispiel-Ausgabe |
|---|---|
| `{{schuljahr_by}}` | `2024/2025` |
| `{{schuljahr_by::kurz}}` | `24/25` |
| `{{schuljahr_by::start}}` | `2024` |
| `{{schuljahr_by::ende}}` | `2025` |

## Installation

### Via Composer

```bash
composer require mstudio-dev/schuljahr-by-insert-tag
```

### Manuelle Installation

1. Paket in das Verzeichnis `packages/schuljahr-by-insert-tag/` kopieren.
2. Bundle in `config/bundles.php` registrieren:

```php
return [
    // ...
    MstudioDev\SchuljahrByInsertTag\SchuljahrByInsertTagBundle::class => ['all' => true],
];
```

3. Symfony-Cache leeren:

```bash
php vendor/bin/contao-console cache:clear
```

## Anforderungen

- PHP >= 8.1
- Contao >= 5.0

## Lizenz

MIT
