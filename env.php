<?php

  $variables = [
      'APP_VERSIONE' => '2.0.2',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>