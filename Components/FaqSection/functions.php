<?php

namespace Flynt\Components\FaqSection;

function getACFLayout(): array
{
    return [
        'name' => 'faqSection',
        'label' => 'FAQ Section',
        'sub_fields' => [
            array(
                'label' => 'Small Title',
                'name' => 'small_title',
                'type' => 'text',
            ),
            array(
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
            ),
            array(
                'label' => 'List',
                'name' => 'list',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                    ),
                    array(
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                        'delay' => 1,
                    ),
                ),
            ),
        ]
    ];
}