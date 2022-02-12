<?php
function displayArray($array){
    $result = '';
    if(!$array): return 'NULL';
    else:
        foreach($array as $key=>$word):
            if(!$key==0) $result .= ', ';
            $result .= $word;
        endforeach;
        return $result;
    endif;
}
?>