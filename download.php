<?php
// Read the configuration file
$config = parse_ini_file('config.ini');
// Access the yt-dlp-path variable
$ytDlpPath = $config['yt-dlp-path'];

// Retrieve the JSON data sent by the JavaScript
$data = json_decode(file_get_contents("php://input"));

// Extract YouTube link and format
$youtubeLink = $data->youtubeLink;
$format = $data->format;

// Validate input (e.g., check if the URL is valid)

// Use yt-dlp to download the video

if (!filter_var($youtubeLink, FILTER_VALIDATE_URL)) {
    echo "No Valid URL given";
    exit();
}

switch ($format) {
    case "mp4":
    case "webm":
        $command = "$ytDlpPath -o 'downloads/%(title)s.%(ext)s' --format $format " . escapeshellarg($youtubeLink);
        break;
    case "mp3":
    case "m4a":
        $command = "$ytDlpPath --extract-audio --audio-format $format -o 'downloads/%(title)s.%(ext)s' " . escapeshellarg($youtubeLink);
        break;
    default:
        print("Don't mess with my html!");
        exit();
}

exec($command, $output, $exitCode);
if ($exitCode == 0) {

    foreach ($output as $line) {

        if (strpos($line, "." . $format)) {
            $strpos = strpos($line, "downloads/");
            $filename = substr($line, $strpos);
            $filename = str_replace(" has already been downloaded", "", $filename);
            $filename = str_replace(" file is already in target format " . $format, "", $filename);
            print("/" . $filename);
            touch($filename);
            exit();
        }
    }
}

print("Download Failed. \n");
?>
