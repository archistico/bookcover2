<?php

  $variables = [
      'APP_VERSIONE' => '2.0.15',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>













