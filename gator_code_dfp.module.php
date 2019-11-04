
  // No ad for bots.

  $url = 'https://api.gator.io/v1/score?';

  // Collect user ip address
  $userip = ip_address();

  // Collect user agent
  $useragent = $_SERVER['HTTP_USER_AGENT'];

  // Collect requested page
  $current_url = url(current_path(), array('absolute' => TRUE, 'query' => drupal_get_query_parameters()));

  // Collect referrer
  $clientreferrer = $_SERVER['HTTP_REFERER'];


  // Store in array
  $querydata = array(
    'accessToken' => '[SUBSTITUTE YOUR GATOR.IO ACCESS TOKEN HERE]',
    'ip' => ip_address(),
    'ua' => $useragent,
    'url' => $current_url,
    'referrer' => $clientreferrer,
  );

  // Convert array to query string
  $query_string = drupal_http_build_query($querydata);

  // Append query string to url
  $url = $url.$query_string;

  // options array
  $options = array(
    'method' => 'GET',
    'data' => http_build_query($querydata),
  );

  // request data from gator
  $result = drupal_http_request($url, $options);

  // convert response JSON to array
  $resultarray = drupal_json_decode($result->data);

  // retrieve botscore value from array
  $botscore = $resultarray['data']['score'];

  // log on watchdog.  for testing, remove when no longer needed
  watchdog('dfp', 'ad log @botscore_value : @userip_value : @current_url_value', array('@botscore_value' => print_r($botscore, TRUE),'@userip_value' => print_r($userip, TRUE),'@current_url_value' => print_r($current_url, TRUE)), WATCHDOG_NOTICE);

  // raise or lower the minimum botscore for your preference
  if ($botscore < 100) {
      return;
    }
