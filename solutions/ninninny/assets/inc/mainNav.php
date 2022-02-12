<?php 
function mainNav(){
    $content = '';

    $navData = array(
        ['id'=>'01', 'title' => 'Solution 1', 'URL' => '01.php'],
        ['id'=>'02', 'title' => 'Solution 2', 'URL' => '02.php'],
        ['id'=>'03', 'title' => 'Solution 3', 'URL' => '03.php'],
    );

    $content .= '<div class="mainNav"><div class="divWrapper"><nav>';

    foreach($navData as $nav):
        $content .= '<a class="nav-'.$nav['id'].'" href="'.$nav['URL'].'">'.$nav['title'].'</a>';
    endforeach;

    $content .= '</nav></div></div>';

    return $content;
}
?>

