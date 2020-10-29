<?php

namespace App\Entity;

use App\Repository\CityRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @Groups("showCity")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $name;

    /**
     * @Groups("showCity")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?float $airQuality;

    /**
     * @Groups("showCity")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?float $fineParticle;

    /**
     * @Groups("showCity")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?float $heavyParticle;

    /**
     * @Groups("showCity")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?float $ozone;

    /**
     * @Groups("showCity")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $datetime;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float|null
     */
    public function getAirQuality(): ?float
    {
        return $this->airQuality;
    }

    /**
     * @param float|null $airQuality
     */
    public function setAirQuality(?float $airQuality): void
    {
        $this->airQuality = $airQuality;
    }

    /**
     * @return float|null
     */
    public function getFineParticle(): ?float
    {
        return $this->fineParticle;
    }

    /**
     * @param float|null $fineParticle
     */
    public function setFineParticle(?float $fineParticle): void
    {
        $this->fineParticle = $fineParticle;
    }

    /**
     * @return float|null
     */
    public function getHeavyParticle(): ?float
    {
        return $this->heavyParticle;
    }

    /**
     * @param float|null $heavyParticle
     */
    public function setHeavyParticle(?float $heavyParticle): void
    {
        $this->heavyParticle = $heavyParticle;
    }

    /**
     * @return float|null
     */
    public function getOzone(): ?float
    {
        return $this->ozone;
    }

    /**
     * @param float|null $ozone
     */
    public function setOzone(?float $ozone): void
    {
        $this->ozone = $ozone;
    }

    /**
     * @return string|null
     */
    public function getDatetime(): ?string
    {
        return $this->datetime;
    }

    /**
     * @param string|null $datetime
     */
    public function setDatetime(?string $datetime): void
    {
        $this->datetime = $datetime;
    }

    public function __toString()
    {
        return $this->airQuality
            . " " . $this->fineParticle
            . " " . $this->heavyParticle
            . " " . $this->ozone;
    }
}
