#!/bin/bash

# Specify the folder path
folder_path="/var/www/html/ytdl/downloads"

# Find and delete files older than 60 minutes
find "$folder_path" -type f -mmin +60 -exec rm {} \;
