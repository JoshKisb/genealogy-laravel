<?php

namespace App\Http\Livewire;

use App\Models\Person;
use Livewire\Component;

class DescendantChartComponent extends Component
{
    public $descendantsData = [];

    /**
     * Mounts the component and retrieves the descendants data.
     */
    public function mount()
    {
        try {
            $rawData = Person::all()->toArray();
            $this->descendantsData = $this->processDescendantData($rawData);
        } catch (\Exception $e) {
            // Handle errors, such as logging or setting an error state
            \Log::error('Failed to retrieve or process descendants data: ' . $e->getMessage());
            $this->descendantsData = [];
        }
    }

    private function processDescendantData($data)
    {

        $tree = [];
        foreach ($data as $item) {
            if (!isset($tree[$item['id']])) {
                $tree[$item['id']] = ['id' => $item['id'], 'name' => $item['name'], 'children' => []];
            }
            if ($item['parent_id']) {
                $tree[$item['parent_id']]['children'][] = &$tree[$item['id']];
            }
        }
        return array_filter($tree, function ($item) {
            return empty($item['parent_id']);
        });












    }

    public function render()
    {
        return view('livewire.descendant-chart-component', ['descendantsData' => $this->descendantsData]);
    }
}
