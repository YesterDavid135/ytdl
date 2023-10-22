function startDownload() {
    const youtubeLink = document.getElementById("youtubeLink").value;
    const selectedFormat = document.getElementById("format").value;
    const selectedResolution = document.getElementById("resolution").value;

    // Define the video and audio elements
    const videoPlayer = document.getElementById("videoPlayer");
    const audioPlayer = document.getElementById("audioPlayer");
    const videoTitle = document.getElementById("videoTitle");
    const downloadLink = document.getElementById("downloadLink");

    // Define loading and error screens
    const loadingScreen = document.getElementById("loadingScreen");
    const errorScreen = document.getElementById("errorScreen");

    // Hide both players initially
    videoPlayer.style.display = "none";
    audioPlayer.style.display = "none";
    videoTitle.style.display = "none";
    downloadLink.style.display = "none";

    // Show the loading screen
    loadingScreen.style.display = "block";

    // Make an AJAX request to your server to initiate the download
    fetch("/download.php", {
        method: "POST",
        body: JSON.stringify({youtubeLink, format: selectedFormat, resolution: selectedResolution}),
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then((response) => {
            if (response.ok) {
                // The server initiated the download successfully
                return response.text();
            } else {
                console.log(response.text());
                return "Download failed";
            }
        })
        .then((filePath) => {
            // Determine if it's a video or audio file based on the file extension
            videoTitle.style.display = "block";
            videoTitle.innerText = filePath.replace('/downloads/', '');

            if (String(filePath).startsWith("/downloads/")) {
                downloadLink.href = filePath;
                downloadLink.style.display = "block";

                const fileExtension = filePath.split('.').pop().toLowerCase();
                if (fileExtension === "mp4" || fileExtension === "webm") {
                    // It's a video file
                    videoPlayer.src = filePath;
                    videoPlayer.style.display = "block";
                } else if (fileExtension === "mp3" || fileExtension === "m4a") {
                    // It's an audio file
                    audioPlayer.src = filePath;
                    audioPlayer.style.display = "block";
                }
            }

        })
        .catch((error) => {
            console.error("Error:", error);
            // Show the error screen
            errorScreen.style.display = "block";
        })
        .finally(() => {
            // Hide the loading screen
            loadingScreen.style.display = "none";
        });
}
