
<?php

if ( ! function_exists('extractRelativeUrl')) {

    /**
     * Generate Code
     */
    function extractRelativeUrl(string $url): string
    {
        // Parse the URL and extract the path
        $relativeUrl = parse_url($url, PHP_URL_PATH);

        // Decode the URL-encoded parts
        $relativeUrl = urldecode($relativeUrl);

        return ltrim($relativeUrl, '/\\');
    }
}