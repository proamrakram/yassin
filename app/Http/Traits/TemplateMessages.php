<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait TemplateMessages
{
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

    public function buildObject($name, $language)
    {
        return $template = [
            'name' => $name,
            'components' => $this->makeComponents(),
            'language' => $language,
            // 'namespace' => $namespace
        ];
    }

    public function makeHeaderComponent()
    {
        return [
            'type' => 'header',
            'parameters' => [
                [
                    'type' => 'text',
                    'text' => 'Amro Akram Is On Whatsapp'
                ]
            ]
        ];
    }

    public function makeBodyComponent()
    {
        return [
            'type' => 'body',
            'parameters' => [
                [
                    'type' => 'text',
                    'text' => 'I am Amro Akram'
                ]
            ]
        ];
    }

    public function makeFooterComponent()
    {
        return [
            'type' => 'footer',
            'parameters' => [
                [
                    'type' => 'text',
                    'text' => 'best regards from amro akram'
                ]
            ]
        ];
    }



    public function makeComponents()
    {
        return [
            [
                'type' => 'body', # header or body or footer
                'parameters' => [
                    $this->makeHeaderComponent(),
                    $this->makeBodyComponent(),
                    $this->makeFooterComponent()
                ]
            ]
        ];
    }
}
