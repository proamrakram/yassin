<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SendMessagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'messaging_product' => $this->messaging_product,
            "recipient_type" => $this->recipient_type,
            "to" =>  $this->phone_number,
            "context" => [
                "message_id" => $this->message_id,
            ],
            "type" => $this->type,
            "text" => [
                "preview_url" => $this->preview_url,
                "body" => $this->body,
            ],
        ];
    }
}
