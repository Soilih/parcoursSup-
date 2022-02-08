<?php

namespace App\Controller\admin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use  App\Repository\FluxSortantRepository;
use Symfony\Component\Validator\Constraints\Count;
use App\Entity\FluxSortant;
use App\Entity\User;

class ChartController extends AbstractController
{
    /**
     * @Route("/admin/chart", name="chart")
     */
    public function index(ChartBuilderInterface $chartBuilder, FluxSortantRepository $fluxSortantRepository): Response
    {
        $dailyResults = $fluxSortantRepository->NombreUserParPays();
       // $dt = $fluxSortantRepository->NombreFlux();
        
        $labels = [];
        $data = [];
        foreach ($dailyResults as $dailyResult) {
            $labels[] = $dailyResult["dt"];
            $data[] =  $dailyResult["c"];
        }
       

        // $data[] = Count( (array) $dailyResult->getPays());
        $chart = $chartBuilder->createChart(Chart::TYPE_BAR);
        $chart->setData([
            'labels' =>  $labels,
            'datasets' => [
                [
                    'label' => 'Nombre etudiant',
                    'backgroundColor' => 'rgb(255, 99, 131)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $data ,
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                   'suggestedMin' => 1,
                   'suggestedMax' => 10,
                ],
            ],
        ]);

        return $this->render('chart/index.html.twig', [
            'chart' => $chart,
        ]);
    }
}

