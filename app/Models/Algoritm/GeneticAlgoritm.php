<?php

namespace App\Models\Algoritm;

class GeneticAlgoritm
{
    private $population;
    private $populationSize;
    private $generations;
    private $mutationRate;
    private $targetValue;

    public function __construct($populationSize, $generations, $mutationRate, $targetValue)
    {
        $this->populationSize = $populationSize;
        $this->generations = $generations;
        $this->mutationRate = $mutationRate;
        $this->targetValue = $targetValue;
        $this->initializePopulation();
    }

    private function fitness($individual)
    {
        return abs($this->targetFunction($individual) - $this->targetValue());
    }

    private function generateIndividual()
    {
        return [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];
    }

    private function targetFunction($individual)
    {
        return $individual[0] + $individual[1] + $individual[2];
    }

    private function targetValue()
    {
        return $this->targetValue;
    }

    private function selectParents($fitnessScores)
    {
        $parents = [];
        for ($i = 0; $i < $this->populationSize; $i++) {
            $parentIndex = array_search(min($fitnessScores), $fitnessScores);
            $parents[] = $this->population[$parentIndex];
            unset($fitnessScores[$parentIndex]);
        }
        return $parents;
    }

    private function crossoverAndMutate($parents)
    {
        $newPopulation = [];

        foreach ($parents as $parent1) {
            $parent2 = $parents[array_rand($parents)];

            // Crossover (misalnya, titik tengah)
            $crossoverPoint = rand(0, count($parent1) - 1);
            $child = array_merge(array_slice($parent1, 0, $crossoverPoint), array_slice($parent2, $crossoverPoint));

            // Mutasi
            if (rand(1, 100) <= $this->mutationRate) {
                $mutatedGene = rand(0, count($child) - 1);
                $child[$mutatedGene] = rand(1, 10);
            }

            $newPopulation[] = $child;
        }

        return $newPopulation;
    }

    private function initializePopulation()
    {
        $this->population = array_map([$this, 'generateIndividual'], range(1, $this->populationSize));
    }

    public function runGeneticAlgorithm()
    {
        for ($generation = 0; $generation < $this->generations; $generation++) {
            $fitnessScores = array_map([$this, 'fitness'], $this->population);

            $bestIndex = array_search(min($fitnessScores), $fitnessScores);
            $bestIndividual = $this->population[$bestIndex];

            $selectedParents = $this->selectParents($fitnessScores);
            $this->population = $this->crossoverAndMutate($selectedParents);

            // echo "Generation " . ($generation + 1) . ": Fitness - " . $this->fitness($bestIndividual) . "\n";
            // echo "Best Individual: " . json_encode($bestIndividual) . "\n";

            if ($this->fitness($bestIndividual) == 0) {
                // echo "Optimal solution found. Stopping the algorithm.\n";
                break;
            }
        }

        return $bestIndividual;
    }
}
