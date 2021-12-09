<!-- Start Shape Bullet Style -->
<div class="ile-shape-bullet-style" style="direction:<?php echo $settings['list_items_box_column_direction'] ?>;"><?php
foreach ($settings['shape_item_lists'] as $items => $item) {
    $icon = $item['shape_list_items_icon']['value'];
    $title = $item['shape_list_items_title'];
    $content = $item['shape_list_items_content'];
    $icon_box = $item['shape_list_item_icon_style'] ?>
    <div class="ile-container-holder">
        <div class="ile-container-icon-line">
            <div class="ile-icon-box"><?php 
                if($icon_box == 'diamond-icon-style') { ?>
                    <svg  viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.41423 46.528L46.53 1.41421L91.6418 46.528L46.528 91.6418L1.41423 46.528Z" stroke="black" stroke-width="1"/>
                    </svg><?php
                }
                else if($icon_box == 'circle-icon-style') { ?>
                    <svg  viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M56.0851 56.0846C43.6274 68.5424 23.429 68.5428 10.9714 56.0851C-1.4865 43.6273 -1.48583 23.4285 10.9723 10.9709C23.4303 -1.48657 43.6287 -1.4866 56.0861 10.9713C68.5433 23.4291 68.5427 43.6271 56.0851 56.0846Z" stroke="black" stroke-width="1"/>
                    </svg><?php
                }
                else { ?>
                    <svg viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.5 0.5H49.5V49.5H0.5V0.5Z" stroke="black"/>
                    </svg><?php
                }
                if($item['shape_list_items_display_icon'] === 'icon') { ?>
                    <i class="ile-icon <?php echo $icon ?>"></i>
                <?php } ?>
            </div>
            <div class="ile-line"></div>
        </div>
        <div class="ile-content-box">
            <h2 class="ile-title"><?php echo $title; ?></h2>
            <p class="ile-content"><?php echo $content; ?></p>
        </div>
    </div>
    <?php } ?>
</div>
<!-- End Shape Bullet Style -->