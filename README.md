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

### Lokale Entwicklung (Path Repository)

1. `composer.json` der Contao-Installation anpassen:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../pfad/zum/schuljahr-by-insert-tag"
        }
    ]
}
```

2. Paket einbinden:

```bash
composer require mstudio-dev/schuljahr-by-insert-tag:@dev
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
