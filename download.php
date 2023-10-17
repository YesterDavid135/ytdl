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

switch ($format) {
    case "mp4":
    case "webm":
      //  $command = "$ytDlpPath -o 'downloads/%(title)s.%(ext)s' --format $format $youtubeLink 2>&1";
        break;
    case "mp3":
    case "m4a":
       $command = "$ytDlpPath --extract-audio --audio-format $format -o 'downloads/%(title)s.%(ext)s' $youtubeLink";
       $shellCommand = "./download.sh " . escapeshellarg($youtubeLink) . " " . escapeshellarg($format);

}

echo "Link: " . $youtubeLink . "\n";
echo "Format: " . $format . "\n";
echo "Command: " . $command . "\n";
echo "ShellCommand: " . $shellCommand . "\n";

//exec($command, $output, $exitCode);
$output = shell_exec($shellCommand);

//echo "Exit-Code: " . $exitCode . "\n";

print($output);

?>
