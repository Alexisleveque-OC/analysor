<?php

namespace App\Controller;

use App\Entity\Campaign;
use App\Form\CampaignType;
use App\Service\CampaignCreate;
use App\Service\CampaignFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampaignController extends AbstractController
{
    /**
     * @Route("/campaign", name="campaign")
     */
    public function index(): Response
    {
        $formCampaign = $this->createForm(CampaignType::class);

        return $this->render('campaign/index.html.twig', [
            'form_campaign' => $formCampaign->createView(),
        ]);
    }

    /**
     * @Route("/campaign/new", name="new_campaign",)
     * @param Request $request
     * @param CampaignCreate $campaignCreate
     * @return Response
     */
    public function createCampaign(Request $request, CampaignCreate $campaignCreate): Response
    {
        $formCampaign = $this->createForm(CampaignType::class);
        $formCampaign->handleRequest($request);

        if ($formCampaign->isSubmitted() && $formCampaign->isValid()) {
            $campaign = $campaignCreate->create($formCampaign->getData());
        }

        return $this->redirectToRoute('one_campaign', [
            'id' => $campaign->getId(),
        ]);
    }

    /**
     * @Route("/campaign/{id}", name="one_campaign",)
     * @Route("/campaign/choice", name="choice_campaign",)
     * @return Response
     */
    public function seeCampaign(Campaign $campaign = null, CampaignFinder $campaignFinder): Response
    {
//mettre un form poour sélectionner la campagne
        if (!$campaign) {
            return $this->render('campaign/readOne.html.twig',[
                'campaign' => $campaign
            ]);
        }

//        $campaign = $campaignFinder->findOne($campaign);

        return $this->render('campaign/readOne.html.twig',[
            'campaign' => $campaign
        ]);
    }
}
