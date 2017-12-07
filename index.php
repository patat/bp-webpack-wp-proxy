<?php
  // Parse `webpack manifest file` to get a hold of the hashed assets
  $manifest = [
    'main.css' => null,
    'main.js' => 'main.js'
  ];
  if ($manifest_json = file_get_contents('./dist/manifest.json')) {
    $manifest = json_decode($manifest_json, true);
  }
?>
<html>
  <head>
    <title>Asset Management</title>
    <?php if ($manifest['main.css']): /* no stylesheet in dev */?>
      <link rel="stylesheet" href="<?php echo 'dist/' . $manifest['main.css']; ?>">
    <?php endif; ?>
  </head>
  <body>
    <?php  ?>
    <?php echo "<p>Hi There!!!!!</p>"; ?>
    <script src="<?php echo 'dist/' . $manifest['main.js']; ?>"></script>
  </body>
</html>