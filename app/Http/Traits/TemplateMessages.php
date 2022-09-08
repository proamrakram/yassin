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
        $header_message = $this->setHeaderMessageTemplate($request);
        $body_message = $this->setBodyMessageTemplate($request);
        $footer_message = $this->setFooterMessageTemplate($request);
        $components = [
            $header_message,
            $body_message,
            $footer_message
        ];

        $data = $this->setTemplateObject($components, "create_new_template");

        $url =  "https://graph.facebook.com/v14.0/$whats_app_business_account_id/message_templates";

        $response = Http::withHeaders($headers)->post($url, $data);

        return $response;
    }

    public function setHeaderMessageTemplate($request)
    {
        return [
            "type" => "header",
            "format" => $request->header_format,
            "text" => $request->header_text_template,
        ];
    }

    public function setBodyMessageTemplate($request)
    {
        return [
            "type" => "body",
            // "format" => $request->body_format,
            "text" => $request->body_text_template,

        ];
    }

    public function setFooterMessageTemplate($request)
    {
        return [
            "type" => "footer",
            "format" => $request->footer_format,
            "text" => $request->footer_text_template,
        ];
    }

    public function setTemplateObject($components, $name)
    {
        return [
            'name' => $name,
            'category' => 'OTP',
            'components' => $components,
            'language' => 'en',
        ];
    }
}
