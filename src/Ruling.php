<?php

declare(strict_types = 1);

namespace App;

use DateInterval;
use DateTimeImmutable;

class Ruling
{

    private string $name;

    private DateTimeImmutable $since;

    private string $description;

    private string $more;

    public function __construct(
        string $name,
        DateTimeImmutable $since,
        string $description,
        string $more
    )
    {
        $this->name = $name;
        $this->since = $since;
        $this->description = $description;
        $this->more = $more;
    }

    public function getRemainingDaysMin(): int
    {
        return $this->getVisibleFrom()->diff(new DateTimeImmutable())->days;
    }

    public function getVisibleFrom(): DateTimeImmutable
    {
        return $this->since->add(new DateInterval('P21D'));
    }

    public function getRemainingDaysMax(): int
    {
        return $this->getVisibleTo()->diff(new DateTimeImmutable())->days;
    }

    public function getVisibleTo(): DateTimeImmutable
    {
        return $this->since->add(new DateInterval('P28D'));
    }

    public function isActive(): bool
    {
        return $this->getVisibleTo() < new DateTimeImmutable();
    }

    public function isStarted(): bool
    {
        return $this->getVisibleFrom() < new DateTimeImmutable() && $this->getVisibleTo() > new DateTimeImmutable();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSince(): DateTimeImmutable
    {
        return $this->since;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getMore(): string
    {
        return $this->more;
    }

    public function isInactive(): bool
    {
        return $this->getVisibleFrom() > new DateTimeImmutable();
    }

    public function getActivePercent()
    {
        $days = $this->getVisibleFrom()->diff(new DateTimeImmutable())->days;
        if ($days === 0) {
            return 0;
        }
        return (int) round($days / 7 * 100);
    }
}
