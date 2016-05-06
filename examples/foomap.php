<?php

return [
    [ 'say', function ($args) { echo $args[0]; } ],
    [ 'sum', function ($args) { return array_sum($args); } ],
];
