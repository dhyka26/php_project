<?php
function tampil($response)
{
    if (is_array($response)) {
        $temp      = array();
        foreach ($response as $key => $value) {
            $output = implode(',', array_map(
                function ($v, $k) {
                    return sprintf("%s=`%s`", $k, $v);
                },
                $value,
                array_keys($value)
            ));
            $output = $key .  "=>" .  $output . "\n";
            $temp[] = $output;
        }
        return $temp;
    } else {
        return array();
    }
}

?>