<?php 

$stockTicker = mfsa_get_stock_ticker();
$apiUrl = 'https://financialmodelingprep.com/api/v3/profile/'.$stockTicker.'?apikey=534fe83836431e56d446a2e9b3856981';
$response = wp_remote_get($apiUrl);
$responseBody = wp_remote_retrieve_body( $response );
$result = json_decode( $responseBody );

if ( is_array( $result ) && ! is_wp_error( $result ) ) {
	// Work with the $result data
	$stockSymbol = "<strong>".$result[0]->symbol."</strong>";
	$companyLogo = "<img src='".$result[0]->image."'/>";
	$companyName = $result[0]->companyName;
	$exchange    = $result[0]->exchangeShortName;
	$description = $result[0]->description;
	$industry    = $result[0]->industry;
	$sector      = $result[0]->sector;
	$ceo         = $result[0]->ceo;
	$websiteUrl  = $result[0]->website;



	echo "<div class='stock-rec-widget'><div class='stock-rec-widget-inner'> ".$companyLogo."<div class='company-title'>".$companyName."  <span class='company-exchange'>(".$exchange.":".$stockSymbol.")</span></div><div class='company-subheader'>CEO: ".$ceo." <br> Sector: ".$sector."</div><div class='company-description'>".$description."</div></div></div>";
} else {
	// Work with the error
	
	echo "error pulling API";
}



if ( ! empty( $instance['title'] ) ) {

	$title = apply_filters( 'widget_title', $instance['title'] );

}

if ( ! empty( $title ) ) {

	echo $before_title . $title . $after_title;

}

?>

