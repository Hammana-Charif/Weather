<?php


namespace App\Service\Domain;


use App\Entity\City;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

/**
 * Class CityService
 * @package App\Service\Domain
 */
class CityService
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * CityService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param City $city
     */
    public function save(City $city): void
    {
        try {
            $this->entityManager->persist($city);
            $this->entityManager->flush();
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }
}