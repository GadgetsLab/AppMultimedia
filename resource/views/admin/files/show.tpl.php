<h1><?= $this->e($file->title); ?></h1>
    <?php include 'partial/'.$file->format->type.'.tpl.php'; ?>
<p><?= $this->e($file->description) ?></p>