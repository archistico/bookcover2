<?php

  $variables = [
      'APP_VERSIONE' => '2.0.9',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>







