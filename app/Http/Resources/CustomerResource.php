<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $values = parent::toArray($request);
        $values['is_admin'] = $this->is_admin ? 'ADMIN' : 'USER';
        $values['deleted'] = $this?->deleted_at === NULL ? 'NO' : 'YES';
        $values['avatar'] = url('storage/' . $this->avatar);
        // $values['created_at'] = date_format($values['created_at'], 'Y-m-d');
        $values['created_at'] = date('d-m-Y', strtotime($this->created_at));
        $values['updated_at'] = date('d-m-Y', strtotime($this->updated_at));
        if ($values['deleted_at'] !== NULL)
            $values['deleted_at'] = date('d-m-Y', strtotime($this->deleted_at));
        unset($values['id'], $values['bio']);//pour supprimer les clés (id,bio) dans l'affichage
        return $values;
        // return [
        //     'name' => $request->customer->name,
        //     'email' => $request->customer->email,
        //     'image' => $request->customer->image,
        //     'is_admin' => $request->customer->is_admin ? 'ADMIN' : 'USER',
        //     'deleted' => $request->customer->deleted_at === NULL ? 'NO' : 'YES',
        //     'all' => [...[parent::toArray($request)]],
        // ];
    }
    // redefinition de la methode collection
    public static function collection($resource)
    {
        $values = parent::collection($resource)->additional([
            'count' => $resource->count(),
        ]);
        return $values;
    }
}
