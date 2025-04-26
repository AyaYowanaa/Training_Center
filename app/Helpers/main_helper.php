<?php



use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\Storage;


if (!function_exists('getMainData')) {

    function getMainData()
    {
        $mdata = \App\Models\Site\SiteData::first();
        return optional($mdata);
    }
}
if (!function_exists('extractVideoId')) {

     function extractVideoId($videoLink)
    {
        // Extract video ID from the YouTube link
        $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $videoLink, $matches);

        // Check if the regex matched and return the video ID or null
        return isset($matches[1]) ? $matches[1] : null;
    }
}

if (!function_exists('formatDateForDisplay')) {


    function formatDateForDisplay($dateTimeStr)
    {
        $dateTime = new DateTime($dateTimeStr);

        $formattedDate = $dateTime->format('d M Y');
        $formattedTime = $dateTime->format('g:ia');
        $formattedTime = strtolower($formattedTime);

        return $formattedDate . ' at ' . $formattedTime;
    }
}
if (!function_exists('formatTimeForDisplay')) {


    function formatTimeForDisplay($dateTimeStr)
    {
        $dateTime = new DateTime($dateTimeStr);

        $formattedTime = $dateTime->format('g:i a');
        $formattedTime = strtolower($formattedTime);

        return  $formattedTime;
    }
}
if (!function_exists('formatDateDayDisplay')) {


    function formatDateDayDisplay($dateTimeStr)
    {
        $dateTime = new DateTime($dateTimeStr);

        $formattedDate = $dateTime->format('d M Y');

        return $formattedDate;
    }
}


if (!function_exists('getFirstLetters')) {
    function getFirstLetters($inputString)
    {
        $words = explode(' ', $inputString);
        $firstLetters = '';

        foreach ($words as $word) {
            if (!empty($word)) {
                $firstLetters .= strtoupper($word[0]);  // Get the first letter and convert to uppercase
            }
        }

        return $firstLetters;
    }

    if (!function_exists('getDefultImageIfile')) {

        function getDefultImageIfile($filename)
        {
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            $image = asset('assets/media/svg/files/blank-image.svg');
            $imagedark = asset('assets/media/svg/files/blank-image-dark.svg');

            $wordExtensions = ["doc", "docx"];
            $xlsExtensions = ["xls", "xlsx", "ods", "csv"];
            if (in_array($extension, $wordExtensions)) {
                $image = asset('assets/media/svg/files/doc.svg');
                $imagedark = asset('assets/media/svg/files/doc-dark.svg');
            } elseif (in_array($extension, $xlsExtensions)) {
                $image = asset('assets/images/files/xls.png');
                $imagedark = asset('assets/images/files/xls.png');

            } elseif ($extension == 'pdf') {
                $image = asset('assets/media/svg/files/pdf.svg');
                $imagedark = asset('assets/media/svg/files/pdf-dark.svg');

            }

            return ['image'=>$image,'imagedark'=>$imagedark];
        }
    }
    if (!function_exists('isImageIfile')) {

        function isImageIfile($filename)
        {
//        $extension = $image->getClientOriginalExtension();
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            $imageExtensions = [
                "jpg", "jpeg", "png", "gif", "bmp", "tiff", "tif", "webp", "svg", "ico", "heic", "heif", "raw", "cr2", "nef", "dng", "xcf", "pcx", "tga"
            ];
            return in_array($extension,$imageExtensions);
        }
    }
    if (!function_exists('getDefultImage')) {

        function getDefultImage()
        {
            return asset('assets/media/avatars/blank.png');
        }
    }

}



