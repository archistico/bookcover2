<?php

  $variables = [
      'APP_VERSIONE' => '2.0.12',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>










