<?php

namespace App\Services;

use App\Type;

class SamplesGenerator
{
    public function generate(Type $type): array
    {
        $rangeParams = [];
        $typeProperties = $type->typeProperties()->orderBy('property_id')->get();

        foreach ($typeProperties as $typeProperty) {
            $rangeParams[] = [$typeProperty->from, $typeProperty->to];
        }

        return $this->_generate($rangeParams);
    }

    protected function _generate($rangeParams, $rangeParamIndex = 0, $data = [[]])
    {
        if ($rangeParamIndex == count($rangeParams)) {
            return $data;
        }

        $newData = [];
        list($from, $to) = $rangeParams[$rangeParamIndex];
        $step = ($to - $from) * 0.5;

        foreach ($data as $dataItem) {
            for ($current = $from; $current <= $to; $current += $step) {
                $newData[] = array_merge($dataItem, [$current]);
            }
        }

        return $this->_generate($rangeParams, $rangeParamIndex + 1, $newData);
    }
}
