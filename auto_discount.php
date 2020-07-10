<?php
/**
  * Plugin Name:   Add a discount to an Orders programmatically
 * (Using the FEE API - A negative fee)
 *
 */
//New Editing for Discount 2.3
//inpiut Field
function input_cardno() {
    require_once ('inputform.php');
}
add_action( 'woocommerce_cart_actions', 'input_cardno' );
add_action( 'woocommerce_review_order_before_submit','input_cardno' );

//function for database data fetch
function db_scard_number(){
//fetch database deta
global $woocommerce;

global $wpdb;
$table_name=$wpdb->prefix."cardno";
$db_scard=$wpdb->get_results( "SELECT * FROM $table_name ");

//loop

foreach ($db_scard as $wp_res) {
  $id=$wp_res->sl;
  $start_from=$wp_res->start_no;
  $end_from=$wp_res->end_no;

for  ($all_scard=$start_from; $all_scard<=$end_from; $all_scard++){
  //echo $all_scard ."</br>";
  //echo "Here are the Senior Card Numbner " . $all_scard ."<br/>";
  //if ($all_scard==$input_scard_match) {
//check match

//discount_senior_card_user();






  //}
  return $all_scard;
}
}
//end the loop
} // db _scard function end

function function_scard1(){
if (isset($_POST['cardsubmit'])){
  $input_scard=$_POST['senior_card_input'];
//return $input_scard;
global $cart;
db_scard_number($input_scard );
//echo $input_scard;
return $input_scard;
}
else {
$input_scard = "";
//return $input_scard;
}
//$input_scard = "";
//echo $input_scard;

//function for discount
}
$scard_x1=function_scard1();
$scard_x2=db_scard_number();
if ($scard_x1==$scard_x2) {
$fidatok=120;
}
else {
  $fidatok="";
}
if ($fidatok==120) {

  function discount_senior_card_user($cart){
  global $cart;
  wc()->cart->add_fee("Senior Card Descount " , 20);
  //echo "33333333333333333333";
    echo "matched with ttd";
  }
  add_filter('woocommerce_cart_calculate_fees','discount_senior_card_user');

}


//



 ?>
