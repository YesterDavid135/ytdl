function startDownload() {
    const youtubeLink = document.getElementById("youtubeLink").value;
    const selectedFormat = document.getElementById("format").value;

    // Make an AJAX request to your server to initiate the download
    // You can use the Fetch API or XMLHttpRequest to send the request
    // Here's an example using Fetch:
    console.log(youtubeLink);
    fetch("/ytdl/download.php", {
        method: "POST", // Use POST or GET based on your server-side implementation
        body: JSON.stringify({ youtubeLink, format: selectedFormat }),
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then((response) => {
            if (response.ok) {
                // The server initiated the download successfully
                // You can provide feedback to the user here if needed
            } else {
                // Handle errors, e.g., invalid URL, unavailable format, etc.
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}