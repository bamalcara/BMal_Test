<?php

function main_menu(){
    return array(
        array(
            'title' => 'Base',
            'url' => base_url('index.php'),
        ),

        array(
            'title' => 'Content',
            'url' => base_url('index.php/content'),
        ),

        array(
            'title' => 'Add',
            'url' => base_url('index.php/add'),
        ),

        array(
            'title' => 'File',
            'url' => base_url('index.php/file'),
        ),
    );

}