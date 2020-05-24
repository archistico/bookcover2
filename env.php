<?php

  $variables = [
      'APP_VERSIONE' => '2.0.5',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>



