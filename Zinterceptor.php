<?php
// Define the Apache module
class ZInterceptor {
    // Function to handle POST requests
    public function handlePostRequest() {
        // Check if it's a POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the POST data
            $postData = file_get_contents('php://input');

            // Check if the letter 'Z' is present in the POST data
            if (strpos($postData, 'Z') !== false) {
                // The letter 'Z' was found, send the response and exit
                $this->sendResponse("The letter 'Z' was found!");
            }
        }
    }

    // Function to send a response and block further processing
    private function sendResponse($message) {
        // Send the response
        echo $message;

        // Block further processing by other handlers
        exit;
    }
}

// Create an instance of the ZInterceptor class
$zInterceptor = new ZInterceptor();

// Intercept and analyze POST requests
$zInterceptor->handlePostRequest();
?>
