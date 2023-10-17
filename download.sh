#!/bin/bash

# Check if the required number of arguments are provided
if [ $# -ne 2 ]; then
    echo "Usage: $0 <YouTube_Link> <Video_Format>"
    exit 1
fi



ffmpeg_path=/opt/homebrew/bin/ffmpeg
ffprobe_path=/opt/homebrew/bin/ffprobe
yt_dlp_path=/usr/local/bin/yt-dlp

echo $(date)

# Assign the first parameter (YouTube link) to a variable
link="$1"

# Assign the second parameter (Video format) to a variable
format="$2"

echo $yt_dlp_path;
echo $($ffprobe_path --version)
$ffmpeg_path --version


# Use yt-dlp to download the video in the specified format
case $format in
    mp3 | m4a)
      $yt_dlp_path --extract-audio --audio-format $format -o 'downloads/%(title)s.%(ext)s' $link 2>&1
      ;;
    mp4|webm)
      $yt_dlp_path -o 'downloads/%(title)s.%(ext)s' --format $format --ffmpeg-location $ffmpeg_path --ffprobe-path $ffprobe_path $link
      ;;
esac


# Check if the download was successful
if [ $? -eq 0 ]; then
    echo "Download successful!"
else
    echo "Download failed. Check the YouTube link and video format."
fi
