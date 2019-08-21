<?php

namespace ClinchPad\Tests;

/**
 * ClinchPadLists library test cases.
 *
 * @package ClinchPadClient\Tests
 */
class ClinchPadNotes extends \ClinchPad\Resource\ClinchPadNotes
{

    /**
     * @inheritdoc
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @inheritdoc
     */
    public function getNotesForLead($lead_id, $parameters = [])
    {
        parent::getNotesForLead($lead_id, $parameters);

        $response = (object)[
            [
                '_id' => '52778360cce8b441c700023f',
                'content' => 'et magnis dis parturient montes, ...',
                'author' => 'Claire Parson',
                'author_photo_url' => 'https://s3.amazonaws.com/...',
                'user' => (object)[
                    '_id' => '521f26ebcce8b4310e000064',
                    'name' => 'Claire Parson',
                ],
            ]
        ];

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function createNote($lead_id, $user_id, $content, $parameters = [])
    {
        parent::createNote($lead_id, $user_id, $content, $parameters);

        $response = (object)[
            '_id' => '527cc3c7cce8b44a7400000e',
            'content' => 'new note ...',
            'author' => 'Claire Parson',
            'author_photo_url' => 'https://s3.amazonaws.com/...',
            'user' => (object)[
                '_id' => '521f26ebcce8b4310e000064',
                'name' => 'Claire Parson',
            ],
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function updateNote($lead_id, $note_id, $content, $parameters = [])
    {
        parent::updateNote($lead_id, $note_id, $content, $parameters);

        $response = (object)[
            '_id' => $note_id,
            'content' => $content,
            'author' => 'Claire Parson',
            'author_photo_url' => 'https://s3.amazonaws.com/...',
            'user' => (object)[
                '_id' => '521f26ebcce8b4310e000064',
                'name' => 'Claire Parson',
            ],
        ];

        foreach ($parameters as $key => $value) {
            $response->{$key} = $value;
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function deleteNote($lead_id, $note_id)
    {
        parent::deleteNote($lead_id, $note_id);

        $response = (object)[];

        return $response;
    }

}
