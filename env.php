<?php

  $variables = [
      'APP_VERSIONE' => '2.0.14',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>












