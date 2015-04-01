<a href="<?= $options['href'] ?>"
    <?php
        foreach($options['attr'] as $key=>$value){
            $attr = <<<ATTR
{$key}="$value"
ATTR;
            echo $attr;
        }
    ?>
    >
    <?= $name ?>
</a>