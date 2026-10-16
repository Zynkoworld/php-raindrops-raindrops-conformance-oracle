<?php

declare(strict_types=1);

function raindrops($num)
{
    $sound =
        function ($divisor) use ($num) {
            return !($num % $divisor);
        };

    $string = $sound(3) ? 'Pling' : '';
    $string .= $sound(5) ? 'Plang' : '';
    $string .= $sound(7) ? 'Plong' : '';

    return $string ? $string : strval($num);
}

$__in = json_decode('[1, 3, 5, 7, 6, 8, 9, 10, 15, 21, 25, 27, 35, 49, 52, 105]', true);
$__out = [];
foreach ($__in as $x) {
  try { $__out[] = ["ok" => true, "v" => raindrops($x)]; }
  catch (\Throwable $e) { $__out[] = ["ok" => false, "e" => get_class($e)]; }
}
echo json_encode(["out" => $__out]);
