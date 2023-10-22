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
$resolution = $data->resolution;
$validFormats = [
    '18',
    '22',
    '137+140',
    '264+140',
    '313+140',
    'best',
];

//Validate Resolution Input
if (!in_array($resolution, $validFormats)) {
    echo "Don't mess with my html!";
    exit();
}


// Validate input URL
if (!filter_var($youtubeLink, FILTER_VALIDATE_URL)) {
    echo "No Valid URL given";
    exit();
}

//Prepare Download Command
switch ($format) {
    case "mp4":
    case "webm":
        $command = "$ytDlpPath -o 'downloads/%(title)s" . $resolution . ".%(ext)s' --format $resolution " . escapeshellarg($youtubeLink);
        break;
    case "mp3":
    case "m4a":
        $command = "$ytDlpPath --extract-audio --audio-format $format -o 'downloads/%(title)s.%(ext)s' " . escapeshellarg($youtubeLink);
        break;
    default:
        print("Don't mess with my html!");
        exit();
}

//Execute download command and download video
exec($command, $output, $exitCode);
if ($exitCode == 0) {

    foreach ($output as $line) {
        //Get Video Name and relative url
        if (strpos($line, "." . $format)) {
            $strpos = strpos($line, "downloads/");
            $filename = substr($line, $strpos);
            $filename = str_replace(" has already been downloaded", "", $filename);
            $filename = str_replace(" file is already in target format " . $format, "", $filename);
            $filename = str_replace("137+140.f137.mp4", "137+140.mp4", $filename);
            print("/" . $filename);
            touch($filename); //Update Timestamp for deletion
            exit();
        }
    }
}

print("Download Failed or Requested resolution is not available. \n");
?>
