<?php

  $variables = [
      'APP_VERSIONE' => '2.0.6',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>




