<?php

namespace App\Services;

use App\GurbaniRaag;
use App\GurbaniScripture;
use App\GurbaniSource;
use App\GurbaniWriter;
use Carbon\Carbon;
use GuzzleHttp\Client;

class GurbaniNowService
{
    private $url = "https://api.gurbaninow.com/v2/";

    public function getAngData($ang, $source)
    {
        $client = new Client([
            'base_uri' => $this->url,
            'timeout'  => 2.0,
        ]);
        $response = $client->request(
            'GET',
            "ang/$ang/$source"
        );

        $code = $response->getStatusCode();
        if ($code === 200) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public function populateAngData()
    {
        $sources = GurbaniSource::get();
        foreach ($sources as $source) {
            if ($source->identifier === 'G') {
                $tries = 0;
                while($tries <= 5) {
                    $data = $this->getAngData(1, $source->identifier);
                    if (!empty($data['source'])) {
                        $tries = 5;
                    }
                    $tries++;
                }

                for ($i = 0; $i < $data['count']; $i++) {
                    $row = $data['page'][$i]['line'];

                    // save writer details
                    $writer = GurbaniWriter::where('id', $row['writer']['id'])->first();
                    $writerId = null;
                    if (empty($writer) && !empty($row['writer']['id'])) {
                        $writer = GurbaniWriter::create([
                            'id' => $row['writer']['id'],
                            'punjabi' => $row['writer']['akhar'],
                            'unicode' => $row['writer']['unicode'],
                            'english' => $row['writer']['english']
                        ]);
                        $writerId = $writer->id;
                    } elseif(!empty($writer)) {
                        $writerId = $writer->id;
                    }

                    // save raag details
                    $raag = GurbaniRaag::where('id', $row['raag']['id'])->first();
                    $raagId = null;
                    if (empty($raag) && !empty($row['raag']['id'])) {
                        $raag = GurbaniRaag::create([
                            'id' => $row['raag']['id'],
                            'punjabi' => $row['raag']['akhar'],
                            'unicode' => $row['raag']['unicode'],
                            'english' => $row['raag']['english'],
                            'ang_from' => $row['raag']['startang'],
                            'ang_to' => $row['raag']['endang'],
                            'info_english' => $row['raag']['raagwithpage']
                        ]);
                        $raagId = $raag->id;
                    } elseif(!empty($raag)) {
                        $raagId = $raag->id;
                    }

                    GurbaniScripture::insert([
                        'gurmukhi' => empty($row['gurmukhi']['akhar']) ? null : $row['gurmukhi']['akhar'],
                        'gurmukhi_unicode' => empty($row['gurmukhi']['unicode']) ? null : $row['gurmukhi']['unicode'],
                        'punjabi' => empty($row['translation']['punjabi']['default']['akhar']) ? null : $row['translation']['punjabi']['default']['akhar'],
                        'punjabi_unicode' => empty($row['translation']['punjabi']['default']['unicode']) ? null : $row['translation']['punjabi']['default']['unicode'],
                        'devanagari' => empty($row['transliteration']['devanagari']['text']) ? null : $row['transliteration']['devanagari']['text'],
                        'english' => empty($row['translation']['english']['default']) ? null : $row['translation']['english']['default'],
                        'spanish' => empty($row['translation']['spanish']) ? null : $row['translation']['spanish'],
                        'transliteration' => empty($row['english']['text']) ? null : $row['english']['text'],
                        'first_letters' => empty($row['firstletters']['akhar']) ? null : $row['firstletters']['akhar'],
                        'first_letters_unicode' => empty($row['firstletters']['unicode']) ? null : $row['firstletters']['unicode'],
                        'ang' => empty($row['pageno']) ? null : $row['pageno'],
                        'pankti' => empty($row['lineno']) ? null : $row['lineno']
                    ]);
                    return;
                }
                dump($data);
            }
        }
    }
}