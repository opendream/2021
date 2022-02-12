<?php 
function mainHead(){
    $allMeta = '';
    $allLink = '';

    // viewport
    $allMeta .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';

    // Google Font
    $allLink .= '<link rel="preconnect" href="https://fonts.googleapis.com">';
    $allLink .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    $allLink .= '<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300,500&display=swap" rel="stylesheet">';

    // Stylesheet
    $allLink .= '<link rel="stylesheet" href="assets/css/mainStyle.css">';
    return $allMeta.$allLink; 
}
?>
