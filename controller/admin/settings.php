<?php

if(isset(explode('/',$path['controller'])[1])) {
    $this_path = explode('/', $path['controller'])[1];
}
else
    $this_path = 'main';

if(isset(explode('_', $this_path)[1]));
    $this_path = explode('_', $this_path)[0];
