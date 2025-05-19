<?php

namespace App\Actions;

use App\Models\Features;
use Illuminate\Support\Facades\Storage;

class FeatureAction
{
    public function create(array $data)
    {
        if (isset($data['image']) && $data['image']) {
            $data['image'] = $this->storeImage($data['image']);
        }

        return Features::create([
            'accommodation_id' => $data['accommodation_id'],
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'image' => $data['image'] ?? null,
            'icon' => $data['icon'] ?? null,
            'type' => $data['type'],
            'status' => $data['status'] ?? 'active',
        ]);
    }
    public function update(Features $feature, array $data)
    {
        if (isset($data['image']) && $data['image']) {
            if ($feature->image) {
                Storage::delete($feature->image);
            }
            
            $data['image'] = $this->storeImage($data['image']);
        }

        $feature->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? $feature->description,
            'image' => $data['image'] ?? $feature->image,
            'icon' => $data['icon'] ?? $feature->icon,
            'type' => $data['type'],
            'status' => $data['status'] ?? $feature->status,
        ]);

        return $feature->fresh();
    }
    public function delete(Features $feature)
    {
        if ($feature->image) {
            Storage::delete($feature->image);
        }
    
        return $feature->delete();
    }

    protected function storeImage($image)
    {
        return $image->store('features', 'public');
    }
}