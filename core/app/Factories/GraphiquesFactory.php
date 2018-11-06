<?php
namespace App\Factories;

use \Khill\Lavacharts\Lavacharts;
use \Khill\Lavacharts\DataTables\DataFactory;

/**
 *
 */
class GraphiquesFactory
{

  function __construct()
  {
    // code...
  }

  public static function line()
  {
        $stocksTable = \Lava::DataTable();  // Lava::DataTable() if using Laravel

        $stocksTable->addDateColumn('Day of Month')
                    ->addNumberColumn('Projected')
                    ->addNumberColumn('Official');

        // Random Data For Example
        for ($a = 1; $a < 30; $a++) {
            $stocksTable->addRow([
              '2015-10-' . $a, rand(800,1000), rand(800,1000)
            ]);
        }

        $chart = \Lava::LineChart('Stocks', $stocksTable);
        return \Lava::render('LineChart', 'Stocks', 'stock');
  }

  public static function pie($titre, Array $datas, $idGraph)
  {
    $dataTable = \Lava::DataTable();

    $dataTable->addStringColumn('X')
              ->addNumberColumn('Y');
    foreach ($datas as $key => $data) {
      $dataTable->addRow([$key, $data]);
    }
    $pieChart = \Lava::PieChart($titre, $dataTable, [
        'is3D'   => false,
        'slices' => [
          ['offset' => 0,3]
        ],
        'sliceVisibilityThreshold' => 0.1,
        'pieResidueSliceLabel'     => 'Autres',
        'pieStartAngle' => 90,
        'legend' => 'bottom',
    ]);
    $pie = \Lava::render('PieChart', $titre, $idGraph);
    return $pie;
  }

  public static function donut($titre, Array $datas, $idGraph)
  {
    $dataTable = \Lava::DataTable();

    $dataTable->addStringColumn('X')
              ->addNumberColumn('Y');
    foreach ($datas as $key => $data) {
      $dataTable->addRow([$key, $data]);
    }
    $pieChart = \Lava::DonutChart($titre, $dataTable, [
        'is3D'   => false,
        'slices' => [],
        'pieStartAngle' => 90,
        'pieHole' => 0.3,
        'legend' => 'none',
    ]);
    $chart = \Lava::render('DonutChart', $titre, $idGraph);
    return $chart;
  }
}
