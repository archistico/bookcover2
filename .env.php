<?php

  $variables = [
      'APP_VERSIONE' => '2.0.0',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>
