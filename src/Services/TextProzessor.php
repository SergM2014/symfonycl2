<?php

declare(strict_types=1);

namespace App\Services;

use DOMDocument;

class TextProzessor
{
    public function parseTags( string $text): array
    {
        preg_match_all('/(\[\w+(\s.+?)?\])(.+?)\[\/\w+\]/i', $text, $output);
        $tags = $output[1];

        foreach ($tags as $tag ) {
            if (strripos($tag, ' ')) {
                 $cleanedTag = stristr($tag, ' ', true);
                 $cleanedTags[] = trim($cleanedTag, '[');
                 continue;
            }
            preg_match('/\w+/i', $tag, $outputArr);
            $cleanedTags[] = $outputArr[0];
        }

        for ($i = 0; $i< count($cleanedTags); $i++) {
            $contentArr[$cleanedTags[$i]] = $output[3][$i];

            preg_match('/"(.*)"/', $output[2][$i], $descriptionArr);

            if (isset($descriptionArr[1])) $descriptionAttrArr[$cleanedTags[$i]] = $descriptionArr[1];  
        }

        return ['content' => $contentArr, 'descriptionAttr' => $descriptionAttrArr];
    }

    public function parseKeys(string $text)
    {
        preg_match_all('/(\S+)\:/i', $text, $output);
        $keysArr = array_unique($output[1]);


        $resultArr = [];
        foreach($keysArr as $item) {
            $exp = $item.":([a-z 0-9 \. \']+)(\s\w+:|$)";
            preg_match_all("/".$exp."/i", $text, $output);

            $resultArr[$item] =  end($output[1]);
        }

        return $resultArr;
    }
}