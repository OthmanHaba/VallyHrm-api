<?php

namespace App\Http\Resources;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed> | null
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'children' => $this->getChildren($this->id),
        ];
    }

    private function getChildren($id): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return DepartmentResource::collection(Department::where('parent_id', $id)->get());
    }
}
