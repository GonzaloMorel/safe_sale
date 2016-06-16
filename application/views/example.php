<div class="col-xs-12 col-sm-9">
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php  foreach($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php  echo $file; ?>" />
            <?php endforeach; ?>
                
            <?php foreach($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>  
            <?php // print_r($data);?>
            <?= $data->menu;?> 
                <hr>
            <?= $data->output; ?>
            
        </div>
    </div>
</div>
