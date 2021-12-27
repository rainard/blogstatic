<?php
if(!class_exists('Fox009_wisdom_Customize_Control')
	&& class_exists('WP_Customize_Control')){

	class Fox009_Wisdom_Customize_Control extends WP_Customize_Control {
		
		public $heading = 'h3';
		public $parameters = array(); 
		
		public function __construct($manager, $id, $args = array()) {
			parent::__construct($manager, $id, $args);
		}

		protected function render_content() {
			$input_id         = '_customize-input-' . $this->id;
			$description_id   = '_customize-description-' . $this->id;
			$describedby_attr = ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : '';
			switch($this->type) {
				case 'link':
					$link_href = $this->parameters['href'];
					$link_target = (!empty($this->parameters['href'])) ? $this->parameters['href'] : '_blank';
					$link_inner = $this->parameters['inner'];
					if(!empty($link_href)&&!empty($link_inner)){
						if(!empty($this->label)){
							echo '<' . esc_html($this->heading) . ' for="' . esc_attr($input_id) . 
								'" class="customize-control-' .	esc_html($this->heading) . '">';
							echo esc_html($this->label);
							echo '</' . esc_html($this->heading) . '>';
						}
						if(!empty($this->description)){
							echo '<p id="' . esc_attr($description_id) . 
								'" class="customize-control-description">';
							echo esc_html($this->description);
							echo '</p>';
						}
						echo '<a href="' . esc_url($link_href) . 
							'" class="customize-control-link" target="' .
							esc_attr($link_target) . '">';
						echo esc_html($link_inner);
						echo '</a>';
					}
					break;
				case 'range':
					if(!empty( $this->label)){
					?>
						<label for="<?php echo esc_attr( $input_id ); ?>" class="customize-control-title">
							<?php echo esc_html( $this->label ); ?>
						</label>
					<?php
					}
					if(!empty( $this->description)){
					?>
						<span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description">
							<?php echo $this->description; ?>
						</span>
					<?php
					}
					?>
					<div class="customize-control-range-container" for="<?php echo esc_attr( $input_id ); ?>">
						<input
							id="<?php echo esc_attr( $input_id ); ?>"
							type="range"
							<?php echo $describedby_attr; ?>
							<?php $this->input_attrs(); ?>
							<?php if ( ! isset( $this->input_attrs['value'] ) ) : ?>
								value="<?php echo esc_attr( $this->value() ); ?>"
							<?php endif; ?>
							<?php $this->link(); ?>
						/>
						<input
							id="<?php echo esc_attr( $input_id ); ?>-text"
							type="text"
							<?php echo $describedby_attr; ?>
							<?php $this->input_attrs(); ?>
							<?php if ( ! isset( $this->input_attrs['value'] ) ) : ?>
								value="<?php echo esc_attr( $this->value() ); ?>"
							<?php endif; ?>
							<?php $this->link(); ?>
						/>
						<span
							id="<?php echo esc_attr( $input_id ); ?>-reset"
							class="range-reset"
							for="<?php echo esc_attr( $input_id ); ?>"
							default="<?php echo $this->setting->default?>"
						>
							<i class="dashicons dashicons-image-rotate"></i>
						</span>
					<?php
					break;
				case 'image-radio':
					if ( empty( $this->choices ) ) {
						return;
					}

					$name = '_customize-radio-' . $this->id;
					?>
					<?php if ( ! empty( $this->label ) ) : ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $this->description ) ) : ?>
						<span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
					<?php endif; ?>
					<div class="customize-control-image-radio-container">
						<?php foreach ( $this->choices as $value => $url ) : ?>
							<label class="customize-inline-block-column" for="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>">
									<input
										id="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"
										class="image-radio"
										type="radio"
										<?php echo $describedby_attr; ?>
										value="<?php echo esc_attr( $value ); ?>"
										name="<?php echo esc_attr( $name ); ?>"
										<?php $this->link(); ?>
										<?php checked( $this->value(), $value ); ?>
									/>
								
									<img src="<?php echo $url; ?>" class="<?php echo $this->value() == $value ? 'checked' : ''; ?>">
							</label>
						<?php endforeach; ?>
					</div>
					<?php
					break;
				case 'checkbox':
					?>
					<label class="customize-control-checkbox-container" for="<?php echo esc_attr( $input_id ); ?>">
						<span class="title customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<?php if ( ! empty( $this->description ) ) : ?>
							<span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
						<?php endif; ?>
						<input
							id="<?php echo esc_attr( $input_id ); ?>"
							<?php echo $describedby_attr; ?>
							type="checkbox"
							value="<?php echo esc_attr( $this->value() ); ?>"
							<?php $this->link(); ?>
							<?php checked( $this->value() ); ?>
						/>
						<span class="customize-control-switch"></span>
					</label>
					<?php
					break;
				case 'sortable':
					if ( empty( $this->choices ) ) {
						return;
					}

					$name = '_customize-sortable-' . $this->id;
					
					?>
					<?php if ( ! empty( $this->label ) ) : ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $this->description ) ) : ?>
						<span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
					<?php endif; ?>
					<input
						id="<?php echo esc_attr( $input_id ); ?>"
						type="text"
						class="customize-control-sortable-input"
						<?php echo $describedby_attr; ?>
						<?php $this->input_attrs(); ?>
						<?php if ( ! isset( $this->input_attrs['value'] ) ) : ?>
							value="<?php echo esc_attr( implode(',', $this->value()) ); ?>"
						<?php endif; ?>
						<?php $this->link(); ?>
					/>
					<ul class="customize-control-sortable-container">
						<?php foreach ( array_merge(array_flip($this->value()), $this->choices) as $value => $label ) : ?>
							<li class="customize-control-sortable-item<?php echo in_array($value, $this->value()) ? ' selected' : ''; ?>" value="<?php echo esc_attr( $value ); ?>">
								<span class="item-selecte">
									<span class="dashicons dashicons-visibility selected-icon"></span>
									<span class="dashicons dashicons-hidden unselected-icon"></span>
								</span>
								<label class="item-label">
									<span class="item-text"><?php echo esc_html( $label ); ?></span>
								</label>
								<span class="up-down">
									<span class="dashicons dashicons-menu"></span>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php
					break;
				case 'separator':
					echo '<hr>';
					break;
				case 'category':
					if(!empty($this->label)){
					?>
						<label for="<?php echo esc_attr($input_id); ?>" class="customize-control-title">
							<?php echo esc_html($this->label); ?>
						</label>
					<?php
					}
					if(!empty($this->description)){
					?>
						<span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description">
							<?php echo $this->description; ?>
						</span>
					<?php
					}
					$dropdown_categories = wp_dropdown_categories(
						array(
							'id'              	=> $input_id,
							'echo'              => false,
							'show_option_none'  => __('All Categories','fox009-wisdom'),
							'option_none_value' => '0',
							'selected'          => $this->value(),
						)
					);
					$dropdown_categories = str_replace('<select', '<select ' . $this->get_link(), $dropdown_categories);
					echo $dropdown_categories;
					break;
				default:
					parent::render_content();
					break;		
								
			}
		}

	}
}