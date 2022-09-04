<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait TemplateMessages
{
    public function getTemplates($whats_app_business_account_id)
    {
        $url =  "https://graph.facebook.com/v14.0/$whats_app_business_account_id/message_templates";
        $response = Http::withHeaders($this->headers)->get($url);
        return $response->json();
    }

    public function getTemplate($bot, $template_id)
    {
        $url = "https://graph.facebook.com/v14.0/$template_id";
        $response = Http::get($url, ["access_token" => env('WHATS_APP_TOKEN')]);
        return $response->json();
    }




    public function createTemplate()
    {
    }

    public function updateTemplate()
    {
    }

    public function deleteTemplate()
    {
    }

    public function sendTemplate()
    {
        return $this->buildObject('newupdate', 'en');
    }
}
