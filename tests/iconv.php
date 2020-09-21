<?php
/**
 * alpine is known to have some issues with iconv.
 * the code below must work to conform to other php containers..
 */

function slugify($str, $delimiter = '-'){
    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;
}

echo slugify('my slug');