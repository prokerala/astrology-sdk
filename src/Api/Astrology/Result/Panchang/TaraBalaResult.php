<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Panchang;

final class TaraBalaResult
{
    /**
     * @param \Prokerala\Api\Astrology\Result\Element\NakshatraElement[] $nakshatras
     */
    public function __construct(private int $id, private string $name, private string $type, private \DateTimeInterface $start, private \DateTimeInterface $end, private array $nakshatras)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }

    public function getNakshatras(): array
    {
        return $this->nakshatras;
    }
}
