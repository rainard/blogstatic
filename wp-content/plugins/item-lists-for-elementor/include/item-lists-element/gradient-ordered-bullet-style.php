<!-- Start Gradient Ordered Bullet Style -->
<div class="ile-gradient-ordered-bullet-style">
    <ol class="ile-container-holder">
    <?php $alignment = $settings['list_items_number_box_alignment'];
    foreach ($settings['gradient_ordered_item_lists'] as $items => $item) {
        $title = $item['gradient_ordered_list_items_title'];
        $content = $item['gradient_ordered_list_items_content']; ?>
        <li class="ile-content-container ile-number-alignment-<?php echo $alignment; ?>">
            <div class="ile-content-box">
                <h2 class="ile-title"><?php echo $title; ?></h2>
                <p class="ile-content"><?php echo $content; ?></p>
            </div>
        </li><?php
    } ?>
    </ol>
</div>
<!-- End Gradient Ordered Bullet Style -->