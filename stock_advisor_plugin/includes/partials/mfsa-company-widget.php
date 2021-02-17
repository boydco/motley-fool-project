<?php 

$apiUrl = 'https://financialmodelingprep.com/api/v3/profile/AAPL?apikey=534fe83836431e56d446a2e9b3856981';
$response = wp_remote_get($apiUrl);
$responseBody = wp_remote_retrieve_body( $response );
$result = json_decode( $responseBody );

if ( is_array( $result ) && ! is_wp_error( $result ) ) {
	// Work with the $result data
	$stockSymbol = "<strong>".$result[0]->symbol."</strong>";
	$companyLogo = "<img src='".$result[0]->symbol."'/>";
	$companyName = $result[0]->companyName;
	$exchange    = $result[0]->exchangeShortName;
	$description = $result[0]->description;
	$industry    = $result[0]->industry;
	$sector      = $result[0]->sector;
	$ceo         = $result[0]->ceo;
	$websiteUrl  = $result[0]->website;

	echo "this is the company widget: ".$companyName."".$companyLogo." !!";
} else {
	// Work with the error
	
	echo "error pulling API";
}


?>
