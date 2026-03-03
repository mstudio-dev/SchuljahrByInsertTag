<?php

declare(strict_types=1);

namespace MstudioDev\SchuljahrByInsertTag\InsertTag;

use Contao\CoreBundle\DependencyInjection\Attribute\AsInsertTag;
use Contao\CoreBundle\InsertTag\InsertTagResult;
use Contao\CoreBundle\InsertTag\OutputType;
use Contao\CoreBundle\InsertTag\ResolvedInsertTag;
use Contao\CoreBundle\InsertTag\Resolver\InsertTagResolverNestedResolvedInterface;

/**
 * Gibt das aktuelle Schuljahr in Bayern zurück.
 *
 * Das Schuljahr in Bayern beginnt am 1. August und endet am 31. Juli.
 *
 * Verwendung:
 *   {{schuljahr_by}}            → z. B. "2024/2025"
 *   {{schuljahr_by::kurz}}      → z. B. "24/25"
 *   {{schuljahr_by::start}}     → z. B. "2024"
 *   {{schuljahr_by::ende}}      → z. B. "2025"
 */
#[AsInsertTag('schuljahr_by')]
class SchuljahrByInsertTag implements InsertTagResolverNestedResolvedInterface
{
    public function __invoke(ResolvedInsertTag $insertTag): InsertTagResult
    {
        $now = new \DateTimeImmutable('now', new \DateTimeZone('Europe/Berlin'));

        $monat = (int) $now->format('n');
        $jahr  = (int) $now->format('Y');

        // Schuljahr beginnt am 1. August
        // → August–Dezember: aktuelles Jahr ist Startjahr
        // → Januar–Juli:     Vorjahr ist Startjahr
        if ($monat >= 8) {
            $startJahr = $jahr;
            $endeJahr  = $jahr + 1;
        } else {
            $startJahr = $jahr - 1;
            $endeJahr  = $jahr;
        }

        $format = $insertTag->getParameters()->get(0) ?? 'lang';

        return match ($format) {
            'kurz'  => new InsertTagResult(
                substr((string) $startJahr, 2) . '/' . substr((string) $endeJahr, 2),
                OutputType::text
            ),
            'start' => new InsertTagResult((string) $startJahr, OutputType::text),
            'ende'  => new InsertTagResult((string) $endeJahr, OutputType::text),
            default => new InsertTagResult($startJahr . '/' . $endeJahr, OutputType::text),
        };
    }
}
