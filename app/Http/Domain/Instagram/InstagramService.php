<?php

namespace App\Http\Domain\Instagram;

use App\Models\Setting;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;

class InstagramService
{

    public function getLatestImages()
    {
//        $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), 'gemouhi', 'p@assW0rd', new Psr16Adapter('Files'));
//        $instagram->login();
//        $nonPrivateAccountMedias = $instagram->getMedias('kevin');
//        var_dump($nonPrivateAccountMedias);
//        echo $nonPrivateAccountMedias[0]->getLink();
        $username = 'gemouhi';
        $password = 'p@assW0rd';
        $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), $username, $password, new Psr16Adapter('Files'));
        $instagram->login();
        $accountMedias = $instagram->getMedias(Setting::find(1)->instagram);
        $images = [];
        for ($i = 0; $i < 10; $i++) {
            if (isset($accountMedias[$i]->getSquareImages()[1]))
                $images[$i] = $accountMedias[$i]->getSquareImages()[1];
            else
            $images[$i] = $accountMedias[1]->getSquareImages()[1];
        }
        return $images;
    }
}
