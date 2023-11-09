<?php $i = 0; ?>
<div class="qodef-frame-scroll-slider-holder-wrapper">
	<div class="qodef-frame-scroll-slider-holder">
		<div class="qodef-fs-device" <?php dessau_select_inline_style($frame_styles); ?>></div>
		<div class="qodef-fs-inner">
			<div class="qodef-fs-slides swiper-container">
				<div class="swiper-wrapper">
				<?php foreach ($images as $image) { ?>
					<div class="qodef-fs-slide swiper-slide">
							<?php echo wp_get_attachment_image($image['image_id'], 'full'); ?>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="svg-scroll-down">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		  width="850.39px" height="850.39px" viewBox="0 0 850.39 850.39" enable-background="new 0 0 850.39 850.39" xml:space="preserve" fill="#5e5e5e">
		<g>
		 <polyline class="svg-scroll-down-arrow" points="429.303,373.643 421.088,373.643 421.088,615.235 421.088,635.146 398.047,612.105 392.238,617.912 
		  425.196,650.869 458.152,617.912 452.344,612.105 429.303,635.146  "/>
		 <path d="M429.303,569.42c58.983-1.825,106.31-42.722,106.31-92.762V299.37c0-51.197-49.532-92.849-110.417-92.849
		  c-60.886,0-110.419,41.652-110.419,92.849v177.288c0,47.705,43.014,87.105,98.133,92.261v-8.258
		  c-50.58-5.042-89.918-40.777-89.918-84.003V299.37c0-46.669,45.849-84.637,102.205-84.637c56.353,0,102.202,37.968,102.202,84.637
		  v177.288c0,45.529-43.638,82.759-98.095,84.55"/>
		 <path class="svg-scroll-down-circle" d="M458.498,296.433c0-18.366-14.939-33.304-33.305-33.304c-18.363,0-33.302,14.938-33.302,33.304
		  c0,18.362,14.939,33.301,33.302,33.301C443.559,329.734,458.498,314.795,458.498,296.433z M400.104,296.433
		  c0-13.835,11.257-25.092,25.089-25.092c13.836,0,25.089,11.257,25.089,25.092c0,13.834-11.253,25.089-25.089,25.089
		  C411.361,321.522,400.104,310.268,400.104,296.433z"/>
		</g>
		</svg>
	</div>
</div>
