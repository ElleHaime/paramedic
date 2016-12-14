<?php
if(isset($_POST['valute'])) {
	if(!update_option('settings_saphali_valute', $_POST['valute'] ))
	add_option('settings_saphali_valute', $_POST['valute'] );
	$_POST['settings_saphali_valute_round'] = isset($_POST['settings_saphali_valute_round']) ? $_POST['settings_saphali_valute_round'] : 2;
	if(!update_option('settings_saphali_valute_round', $_POST['settings_saphali_valute_round'] ))
	add_option('settings_saphali_valute_round', $_POST['settings_saphali_valute_round'] );
}
$woocommerce_settings_currensy = $this->woocommerce_settings_currensy;
$cunent_valute = get_option('settings_saphali_valute' , array('USD' => 8.2, 'EUR' => 11) );
$cunent_valute_round = (int) get_option('settings_saphali_valute_round' , 2 );
if( !is_array($cunent_valute) ) $cunent_valute = array('USD' => 8.2, 'EUR' => 11);
?>
<p>Валюта магазина: <?php 
echo $woocommerce_settings_currensy[get_woocommerce_currency()]; ?></p>

	<h2>Дополнительная валюта</h2>
	<p class="two_valute_shop">
	<?php 	$selects = get_option("default_valute_shop_twoo",false); 
		if(!$selects) {
			$selects = '';
		}
	?>
	
	<select name = "two_valute">
	<option value="">Нет дополнительной валюты</option>
	<?php foreach($woocommerce_settings_currensy as $key => $v) { 
		if(!isset( $cunent_valute[$key] )) continue;
	?>
	<option value="<?php echo $key?>"<?php if($selects == $key) { echo 'selected="selected"';} ?>><?php echo $v?></option>
	<?php } ?>
	</select>
	<span></span>
	</p>

	<div class='clear'></div>
	<h2>Курс валют относительно валюты магазина</h2>
	<form action="" method="post">
	<div class="kurs">
		<?php 
		foreach($cunent_valute as $_key => $value) {
			echo '<div id="currensy">Валюта - '.$_key.': <input type="text"  class="valute_curr" name="valute['.$_key.']" value="'.$value.'" /> <span class="remove" style="color: red;cursor: pointer;">Удалить</span></div>';
		}
		?>
		<div class='clear'></div>
		<button class='add_valute'>Добавить еще </button><select name = "add_curr_valute">
	<option value="">-</option>
	<?php foreach($woocommerce_settings_currensy as $key => $v) { ?>
	<option value="<?php echo $key?>"><?php echo $v;?></option>
	<?php } ?>
	</select>
	<div class='clear'></div><br />
	Округление конечной цены: <input type="text" name="settings_saphali_valute_round"  value="<?php echo $cunent_valute_round; ?>"/>
	<br />
	<em>Укажите число. Например, при указании <strong>2</strong> число 1.888888 округлится до 1.89, а при указании <strong>-3</strong> число 18954 округлится до 19000.</em>
	<br />
	<br />
	<input type="submit" class="button alignleft" value="<?php _e('Сохранить', 'saphali-currency' ); ?>"/>
	</div>
	</form>
	<script>
	jQuery("select[name='two_valute']").change(function() {
		jQuery(".two_valute_shop span").text('обработка...');
		var default_valute = jQuery(this).val();
		jQuery.getJSON(
			// NB: using Open Exchange Rates here, but you can use any source!ajax_loader_url
			'<?php echo admin_url('admin-ajax.php');?>?action=woocommerce_ajax_edit_two_valute_&security=<?php echo wp_create_nonce( "edit-currency" );?>&two_valute='+default_valute,
			function(data) {
				// Check money.js has finished loading:
				if ( typeof data !== "undefined" ) {
					if (data === true) {
						jQuery(".two_valute_shop span").text('');
					}
				} 
			}
		);
	});
	jQuery("span.remove").live('click', function(event) {
		jQuery(this).parent().remove();
	});
	jQuery("button.add_valute").live('click', function(event) {
		event.preventDefault();
		var return_ = true;
		jQuery('input.valute_curr').each(function (i,e) {
			if( 'valute['+jQuery('select[name="add_curr_valute"]').val()+']' == jQuery(this).attr('name') ) return_ = false;
		});
		if(return_) {
			if( jQuery('select[name="add_curr_valute"]').val() != '' )
				jQuery(this).parent().find('div.clear:first').before('<div id="currensy">Валюта - <span id="curr">'+jQuery('select[name="add_curr_valute"]').val()+'</span>: <input class="valute_curr" type="text" name="valute['+jQuery('select[name="add_curr_valute"]').val()+']" value="" /> <span class="remove" style="color: red;cursor: pointer;">Удалить</span></div>');
			else
				alert('Укажите валюту!');
		}

	});
	</script>
	<?php 	 ?>