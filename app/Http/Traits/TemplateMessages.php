<?php

namespace App\Http\Traits;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use stdClass;

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

    public function createSessionUpload($headers, $whats_app_business_account_id)
    {
        $url =  "https://graph.facebook.com/v14.0/362332076097447/uploads";

        $data = [
            'file_length' => '181812',
            'file_name' => 'namenaem',
            'file_type' => 'image/jpeg',
            // 'session_type' => 'attachment'
        ];

        $session_id = Http::withHeaders($headers)->post($url, $data);
        $upload_id = $session_id->json()['id'];
        $url = "https://graph.facebook.com/v14.0/362332076097447/$upload_id";
        $headers['file_name'] = "https://tgtgreenteknoloji.com/whatsapp-assets/img/avatar-0.jpg";
        $uploading_id = Http::withHeaders($headers)->post($url);
        dd($uploading_id->json());
    }

    public function createTemplate(Request $request, $headers, $whats_app_business_account_id)
    {
        return $this->createSessionUpload($headers, $whats_app_business_account_id);
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


        if ($request->header_format == 'text') {
            return [
                "type" => "header",
                "format" => "TEXT",
                'text' => $request->header_text_template
            ];
        }
        $img = file_get_contents(
            'https://tgtgreenteknoloji.com/whatsapp-assets/img/avatar-0.jpg'
        );

        // Encode the image string data into base64
        $data = base64_encode($img);

        if ($request->header_format == 'image') {
            return [
                "type" => "header",
                "format" => "IMAGE",
                "example" => [
                    "header_handle" => ["wamid.HBgMOTcyNTk5OTE2NjcyFQIAEhgUM0VCMDc4Q0M5NjM5M0E0M0M4ODkA"],
                    "header_text" => ["Hello World"],
                    "body_text" => [["Amr Akkram"]],
                    "header_url" => ['https://tgtgreenteknoloji.com/storage/images/1110896826469682.jpg']
                ]
            ];
        }
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
