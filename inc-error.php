<?php if(array_key_exists("error", $_SESSION)): ?>
        <div class="row" style="margin: 8px; padding: 8px; background: red; text-align: center;">
            <p class="m-auto"><?php print $_SESSION["error"]; unset($_SESSION["error"]); ?></p>
        </div>
<?php endif; ?>

<?php if (array_key_exists("success", $_SESSION)) : ?>
    <div class="row" style="margin: 8px; padding: 12px 0px 0px 24px; font-weight: bold; background: #82E0AA;">
        <p class="m-auto"><?php print $_SESSION["success"];
            unset($_SESSION["success"]); ?></p>
    </div>
<?php endif; ?>