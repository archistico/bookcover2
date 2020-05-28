<?php

  $variables = [
      'APP_VERSIONE' => '2.0.17',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>















