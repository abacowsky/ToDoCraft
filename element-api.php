<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

Craft::$app->getResponse()->getHeaders()->set('Access-Control-Allow-Origin', '*');

return [
    'endpoints' => [
        'tasks.json' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'task'],
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                        'name' => $entry->title,
                        'url' => $entry->url,
                        'jsonUrl' => UrlHelper::url("tasks/{$entry->id}.json"),
                     //   'summary' => $entry->summary,
                    ];
                },
            ];
        },
//          'tasks/<entryId:\d+>.json' => function($entryId) {0
//              return [
//                  'elementType' => Entry::class,
//                  'criteria' => ['id' => $entryId],
//                 'one' => true,
//              'transformer' => function(Entry $entry) {
//                     return [
//                          'id' => $entry->id,
//                         'name' => $entry->name,
//                          'url' => $entry->url,
//                         'summary' => $entry->summary,
//                          'body' => $entry->body,
//                      ];
//                  },
//              ];
//          },
    ]
 ];