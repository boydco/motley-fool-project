<?php 

$stockTicker = mfsa_get_stock_ticker();
$apiUrl = 'https://financialmodelingprep.com/api/v3/profile/'.$stockTicker.'?apikey=534fe83836431e56d446a2e9b3856981';
$response = wp_remote_get($apiUrl);
$responseBody = wp_remote_retrieve_body( $response );
$result = json_decode( $responseBody );


if ( is_array( $result ) && ! is_wp_error( $result ) ) {
	// Work with the $result data
    $stockSymbol = "<strong>".$result[0]->symbol."</strong>";
    $logo = "<img class='company-logo-img' src='".$result[0]->image."'/>";
    $description = $result[0]->description;
    $companyName = $result[0]->companyName;
	
    echo "<div class='single-company-content'><div class='company-logo'>".$logo."<h3>".$companyName."</h3></div><div class='company-description'>".$description."</div></div>";
    
} else {

	// Work with the error
	echo "error getting company data from API";
}

