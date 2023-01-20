<?php
function directionCheck() {
    $ltr_direction = '<html direction="ltr" dir="ltr" style="direction: ltr">';
    $rtl_direction = '<html direction="rtl" dir="rtl" style="direction: rtl">';
    echo app()->getLocale() == 'ar' ? $rtl_direction : $ltr_direction;
}

function bottomStartDirectionClass() {
    $class = 'bottom-start';
    return app()->getLocale() == 'ar' ? 'bottom-end' : $class;
}

function bottomEndDirectionClass() {
    $class = 'bottom-end';
    return app()->getLocale() == 'ar' ? 'bottom-start' : $class;
}

function rightStartDirectionClass() {
    $class = 'right-start';
    return app()->getLocale() == 'ar' ? 'left-start' : $class;
}

function leftStartDirectionClass() {
    $class = 'left-start';
    return app()->getLocale() == 'ar' ? 'right-start' : $class;
}