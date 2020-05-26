<?php

  $variables = [
      'APP_VERSIONE' => '2.0.13',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>











