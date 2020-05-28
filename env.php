<?php

  $variables = [
      'APP_VERSIONE' => '2.0.18',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>
















