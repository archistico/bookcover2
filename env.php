<?php

  $variables = [
      'APP_VERSIONE' => '2.0.8',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>






