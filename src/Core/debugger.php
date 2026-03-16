<?php

// if (!function_exists('dump')){
//     function dump(mixed ...$values): void
//     {
//         echo '<pre style="background:#111;color:#00e600;padding:12px;border-radius:8px;overflow:auto">';

//         foreach ($values as $value){
//             // var_dump($value);
//             // die;
//             dumpVal($value);
//         }
//         echo('</pre>');
//     }
// }

if (!function_exists('dd')){
    function dd(mixed ...$values): never
    {
        dump(...$values);
        die(1);
    }
}

// if (!function_exists('dumpVal')){
//     function dumpVal(mixed $value, ?int $ident = 0)
//     {
//         switch (gettype($value)) {
//             case 'array':
//             case 'object':
//                 echo "[";
//                 echo "\n";
//                 $ident .= "   ";
//                 foreach ($value as $id => $val) {
//                     echo($ident."{$id} => ");
//                     dumpVal($val, $ident);
//                 }
//                 echo "\n";

//                 echo "]";
//                 break;
            
//             default:
//                 echo $value;
//                 break;
//         }
//     }
// }