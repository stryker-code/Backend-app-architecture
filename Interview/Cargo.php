<?php

namespace App\Http\Controllers;

class UserController
{
    protected array $cargoTransporters = [
        20 => [],
        15 => [],
        7 => [],
        5 => [],
    ];
    protected array $itemsWeight = [5, 5, 7, 7, 10];
    protected array $cargoRouter = [];

    protected int $currentTrackWeight;
    protected int $count = 1;

    public function test()
    {
        $indexFromStartAdd = 1;

        rsort($this->itemsWeight);

        $output = $this->itemsWeight;

        foreach ($this->cargoTransporters as $key => $value) {

            $this->currentTrackWeight = $key;

            $this->processingItemsWeight($this->itemsWeight, $indexFromStartAdd);

            if ($this->cargoRouter) {

                foreach (end($this->cargoRouter) as $value) {
                    unset($this->itemsWeight[$value]);
                }

                $this->cargoTransporters[$this->currentTrackWeight] = $this->cargoRouter[
                    array_key_last($this->cargoRouter)
                ];
            }

            $this->cargoRouter = [];
        }

        dd($output, $this->cargoTransporters, $this->itemsWeight);
    }

    public function processingItemsWeight(array $boxes, int $indexFromStartAdd): void
    {
        $possibleWeightCombo = [];

        $searchingIndexes = [];

        $previousValue = null;

        if ((count($boxes) == 1) && count($this->itemsWeight) != 1) {

            $endKey = key($boxes);

            $boxes = [];

            foreach ($this->itemsWeight as $key => $value) {
                if ($key > $endKey) {
                    $boxes[$key] = $value;
                }
            }

            $indexFromStartAdd = key($boxes) + 1;
        }

        $first = key($boxes);

        foreach ($boxes as $key => $value) {

            if (empty($possibleWeightCombo[$first])) {
                $possibleWeightCombo[$first] = $value;
                $sum = $value;
                $searchingIndexes[] = $first;
            } else {
                $previousValue = $possibleWeightCombo[$first];
                $possibleWeightCombo[$first] += $value;
                $sum = $possibleWeightCombo[$first];
                $searchingIndexes[] = $key;
            }

            if ($sum === $this->currentTrackWeight) {
                $this->cargoRouter[$sum] = $searchingIndexes;
                break;
            }

            if ($sum > $this->currentTrackWeight) {
                array_pop($searchingIndexes);
                $this->cargoRouter[$previousValue] = $searchingIndexes;
                $possibleWeightCombo[$first] -= $value;
            } else {
                $this->cargoRouter[$sum] = $searchingIndexes;
            }

            if (array_key_last($boxes) === $key) {
                unset($boxes[$indexFromStartAdd]);

                $indexFromStartAdd += 1;

                $this->count += 1;

                $this->processingItemsWeight($boxes, $indexFromStartAdd);

            }
        }

        ksort($this->cargoRouter);

        //dd($this->itemsWeight, $possibleWeightCombo, $boxes, $searchingIndexes, $this->cargoRouter);
    }

}
