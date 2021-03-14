<?php


namespace App\Service;


use App\Entity\Campaign;
use App\Repository\CampaignRepository;
use Doctrine\ORM\EntityManagerInterface;

class CampaignCreate
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;
    /**
     * @var CampaignRepository
     */
    private CampaignRepository $campaignRepository;

    public function __construct(EntityManagerInterface $manager, CampaignRepository $campaignRepository)
    {
        $this->manager = $manager;
        $this->campaignRepository = $campaignRepository;
    }

    public function create(Campaign $campaign)
    {
        $campaign->setCreatedAt(new \DateTime());
        $this->manager->persist($campaign);
        $this->manager->flush();

        return $campaign;
    }

}