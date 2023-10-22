# YouTube Downloader Installation Guide

This guide will help you set up your YouTube downloader website using PHP and yt-dlp on your web server. The website is
hosted at yt.ydavid.ch and allows users to download YouTube videos by entering a link and selecting a video format.

## Installation

Follow these steps to install the YouTube downloader website:

1. **Clone the Repository:**

   Clone this repository to your web server using Git:

   ```shell
   git clone https://github.com/YesterDavid135/ytdl.git
   ```

2. **Install Web Server**

   Install PHP and a Webserver like nginx or Apache on your Computer and start it


3. **Install Required Libraries**

   Install yt-dlp for downloading and FFmpeg for file conversion.

   [yt-dlp Installation](https://github.com/yt-dlp/yt-dlp#installation) <br>
   [fmmpeg Installation](https://ffmpeg.org/download.html)


4. **Set the yt-dlp Path**

   Rename [config.example.ini](config.example.ini) to config.ini and configure the correct path to the yt-dlp
   executable.

5. **Access the Site and have fun**

## Usage

1. In the Input Field - Enter the URL of a media file from platforms like YouTube, Tiktok, or other social media
   platforms.
2. Select the desired file Format from the first Dropdown Menu
3. Select the desired Resolution from the second Dropdown Menu
4. Click "Download"
5. Wait for the Download to process
6. Preview the File and Download it

