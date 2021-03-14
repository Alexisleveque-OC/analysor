<?php


namespace App\Service;


use App\Entity\Campaign;
use App\Repository\CampaignRepository;
use Doctrine\ORM\EntityManagerInterface;

class CampaignFinder
{
    /**
     * @var EntityManagerInterface
     */
    private $manager;
    /**
     * @var CampaignRepository
     */
    private $campaignRepository;

    public function __construct(EntityManagerInterface $manager, CampaignRepository $campaignRepository)
    {
        $this->manager = $manager;
        $this->campaignRepository = $campaignRepository;
    }

    public function findOne($campaign)
    {
        $campaign = $this->campaignRepository->findOneById($campaign);

        return $campaign;
    }
}