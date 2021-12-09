<!-- Start Alternate Timeline Bullet Style -->
<div class="ile-alternate-timeline-bullet-style">
    <?php $count = 0; 
    foreach ($settings['timeline_item_lists'] as $items => $item) {
        $icon = $item['timeline_list_items_icon']['value'];
        $title = $item['timeline_list_items_title'];
        $content = $item['timeline_list_items_content'];
        $icon_color = $item['timeline_icon_color'];
        $icon_bg_color = $item['timeline_icon_bg_color'];
        $ile_timeline_content = "ile-timeline-right";
        if($count % 2 == 0) { 
            $ile_timeline_content = "ile-timeline-left";  
        } ?>
        <div class="ile-container-holder <?php echo $ile_timeline_content; ?>">
            <div class="ile-timeline-vertical"></div>
            <div class="ile-timeline-horizontal"></div>
            <?php if($item['timeline_list_items_display_icon'] === 'icon') { ?>
            <div class="ile-icon-box" style="background-color:<?php echo $icon_bg_color; ?>">
                <i class="ile-icon <?php echo $icon ?>" style="color:<?php echo $icon_color; ?>; ?>"></i>
            </div>
            <?php } else if($item['timeline_list_items_display_icon'] === 'image') { ?>
                <img src="<?php echo $item['timeline_list_items_image']['url']; ?>" class="ile-image" /><?php
            } ?>
            <div class="ile-content-box">
                <h2 class="ile-title"><?php echo $title; ?></h2>
                <p class="ile-content"><?php echo $content; ?></p>
            </div>
        </div>
        <?php $count = $count +1; } ?>
</div>
<!-- End Alternate Timeline Bullet Style -->