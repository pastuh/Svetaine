<?php

namespace App\Classes;

class TwitchVideo {

    public function getTwitchVideos() {

        /* Nustatau MAX video puslapyje: 40*/
        $channelsApi = 'https://api.twitch.tv/kraken/streams/?game=theHunter:%20Call%20of%20the%20Wild&limit=40';
        $clientId = config('app.twitch_key');
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_HTTPHEADER => array(
                'Client-ID: ' . $clientId
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $channelsApi //. $channelName
        ));

        /* Isveda JSON */
        $response = curl_exec($ch);
        echo curl_error($ch);
        curl_close($ch);

       /* Konvertuoju JSON i ARRAY */
        $twitch = json_decode($response, true);

        dd( $twitch);

    }
}