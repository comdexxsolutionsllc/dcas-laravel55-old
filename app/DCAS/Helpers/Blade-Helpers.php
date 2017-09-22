<?php

Blade::directive('datetime', function ($expression) {
    return "<?php echo '<time datetime=\'' . with{$expression}->toIso8601String()
      . '\' title=\'' . $expression . '\'>'
      . with{$expression}->diffForHumans() . '</time>' ?>";
});

Blade::directive('plural', function ($expression) {
    $expression = trim($expression, '()');
    list($count, $str, $spacer) = array_pad(preg_split('/,\s*/', $expression), 3, "' '");
    return "<?php echo $count . $spacer . str_plural($str, $count) ?>";
});

