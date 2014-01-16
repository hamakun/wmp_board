<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php echo $this->tag->getTitle(); ?>
        <?php echo $this->tag->stylesheetLink('css/bootstrap.min.css'); ?>
    </head>
    <body>
        <?php echo $this->getContent(); ?>
        <?php echo $this->tag->javascriptInclude('js/jquery-2.0.3.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/bootstrap.js'); ?>
    </body>
</html>