<?php

define('END_LINE', '<br>');
define('MENU_SEPARATOR', '-');

$file = file_get_contents('data.txt');
$rows = str_getcsv($file, PHP_EOL);

function getPreparedData(array $rows): array
{
    $data = array();

    foreach ($rows as $row) {
        if (!$row) {
            continue;
        }

        list($next, $previous, $value) = explode('|', $row);

        $data[$previous][$next] = $value;
    }

    return $data;
}

function printCategory($data, $level = 0, $head = 0, $prefix = false)
{
    $prefix .= MENU_SEPARATOR;

    if (empty($data[$level])) {
        $level = $head;
        $prefix = $data['headPrefix'];
    }

    if (empty($data[$head]) && empty($data[$level]) || !$level) {
        $level = 0;
        $head = 0;
        $prefix = false;
    }

    $key = key($data[$level]);

    if (!$key) {
        return false;
    }

    echo $prefix.$data[$level][$key].END_LINE;
    unset($data[$level][$key]);

    if (hasChild($key, $data)) {
        $level = key($data[$key]);
        $prefix .= MENU_SEPARATOR;
        $head = _getHead($head, $key, $data, $prefix);
        echo $prefix.$data[$key][$level].END_LINE;
        unset($data[$key][$level]);
    } else {
        $prefix = substr($prefix, 0, -1);
    }

    printCategory($data, $level, $head, $prefix);
}

function hasChild($key, $data): bool
{
    return array_key_exists($key, $data) && $data[$key];
}

function _getHead($head, $key, &$data, $prefix): int
{
    if (count($data[$key]) > 1) {
        $head = $key;
        $data['headPrefix'] = $prefix;
    }

    return $head;
}

$data = getPreparedData($rows);
printCategory($data);
