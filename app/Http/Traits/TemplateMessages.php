<?php

namespace App\Http\Traits;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

trait TemplateMessages
{
    public function getTemplates($headers, $whats_app_business_account_id)
    {
        $url =  "https://graph.facebook.com/v14.0/$whats_app_business_account_id/message_templates";
        $response = Http::withHeaders($headers)->get($url);
        return $response->json();
    }

    public function getTemplate($bot, $template_id)
    {
        $url = "https://graph.facebook.com/v14.0/$template_id";
        $response = Http::get($url, ["access_token" => env('WHATS_APP_TOKEN')]);
        return $response->json();
    }

    public function saveTemplates($bot, $templates_obj)
    {
        foreach ($templates_obj as $template_obj) {
            $template = Template::where('template_id', $template_obj->id)->first();
            if (!$template) {
                Template::create([
                    'name' => $template_obj->name,
                    'components' => $template_obj->components,
                    'language' => $template_obj->language,
                    'status' => $template_obj->status,
                    'category' => $template_obj->category,
                    'template_id' => $template_obj->id,
                    'bot_id' => $bot->id,
                ]);
            }
        }
    }

    public function createTemplate(Request $request, $headers, $whats_app_business_account_id)
    {
        $components = [
            $this->setHeaderMessageTemplate($request),
            $this->setBodyMessageTemplate($request),
            $this->setFooterMessageTemplate($request)
        ];

        $data = $this->setTemplateObject($components, $request);

        $url =  "https://graph.facebook.com/v14.0/$whats_app_business_account_id/message_templates";

        $response = Http::withHeaders($headers)->post($url, $data);

        return $response;
    }

    public function setHeaderMessageTemplate($request)
    {
        return [
            "type" => "header",
            "format" => "IMAGE",
            "example" => [
                // "header_text" => "jpg image",
                "body_text" => [[""]],
                // "header_url" => [["https://static.remove.bg/remove-bg-web/37843dee2531e43723b012aa78be4b91cc211fef/assets/start-1abfb4fe2980eabfbbaaa4365a0692539f7cd2725f324f904565a9a744f8e214.jpg"]],
                "header_handle" => ["https://static.remove.bg/remove-bg-web/37843dee2531e43723b012aa78be4b91cc211fef/assets/start-1abfb4fe2980eabfbbaaa4365a0692539f7cd2725f324f904565a9a744f8e214.jpg"]


            ]
        ];
    }

    public function setBodyMessageTemplate($request)
    {
        return [
            "type" => "body",
            "text" => $request->body_text_template,

        ];
    }

    public function setFooterMessageTemplate($request)
    {
        return [
            "type" => "footer",
            "text" => $request->footer_text_template,
        ];
    }

    public function setTemplateObject($components, $request)
    {
        return [
            'name' => $request->template_name,
            'category' => $request->template_category,
            'components' => $components,
            'language' => $request->template_language,
        ];
    }
}
