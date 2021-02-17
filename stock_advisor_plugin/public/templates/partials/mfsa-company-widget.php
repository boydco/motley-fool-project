<?php 

// *   Price
// *   Price change
// *   Price change in percentage
// *   52 week range
// *   Beta
// *   Volume Average
// *   Market Capitalisation
// *   Last Dividend (if any, otherwise display “N/A”)

$stockTicker = mfsa_get_stock_ticker();
$stockPriceApi = 'https://financialmodelingprep.com/api/v3/quote/'.$stockTicker.'?apikey=534fe83836431e56d446a2e9b3856981';
$apiUrl = 'https://financialmodelingprep.com/api/v3/profile/'.$stockTicker.'?apikey=534fe83836431e56d446a2e9b3856981';
$response = wp_remote_get($apiUrl);
$responseBody = wp_remote_retrieve_body( $response );
$result = json_decode( $responseBody );
$stockQuoteResponse = wp_remote_get($stockPriceApi);
$stockQuoteBody = wp_remote_retrieve_body( $stockQuoteResponse );
$stockQuoteResult = json_decode( $stockQuoteBody  );


if ( is_array( $result ) && ! is_wp_error( $result ) ) {
	// Work with the $result data
	$stockSymbol = "<strong>".$result[0]->symbol."</strong>";
	$exchange = $result[0]->exchangeShortName;
	$price = $result[0]->price;
	$priceChange = $result[0]->changes;
	$beta = $result[0]->beta;
	$volumeAverage = $result[0]->volAvg;
	$marketCap = $result[0]->mktCap;
	$lastDividend = $result[0]->lastDiv;
	$yearRange = $result[0]->range;
	$priceChangePercentage = $stockQuoteResult[0]->changesPercentage;

	
	echo "<div class='mfsa-company-widget financial-data-widget'>
	<div class='financial-data-inner'>
	<div class='financial-data-inner-title'><span>".$exchange.": </span>
	".$stockSymbol."
	</div>
	<p><span class='label'>Price: </span>$".$price."</p>
	<p><span class='label'>price change: </span>".$priceChange."</p>
	<p><span class='label'>price change percentage: </span>".$priceChangePercentage."%</p>
	<p><span class='label'>beta: </span>".$beta."</p> 
	<p><span class='label'>last dividend: </span>".$lastDividend."</p> 
	<p><span class='label'>volume average: </span>".$volumeAverage."</p> 
	<p><span class='label'>market cap: </span>".$marketCap."</p> 
	<p><span class='label'>year range: </span>".$yearRange."</p>
	</div></div>";
} else {
	// Work with the error
	
	echo "error pulling API";
}

