<link href="<?= asset('assets/css/flash.css') ?>" type="text/css" rel="stylesheet">

<div class="flash-messages">
    <?php

    use App\Utilities\FlashMessage;

    foreach ($flash_messages as $fm) : ?>
        <div class='flash-message <?= FlashMessage::getCssClass($fm->type) ?>'>
            <?= $fm->msg ?>
        </div>
    <?php endforeach; ?>
</div>