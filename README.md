# PMAPIClient

A PHP client library for [Sign-Up.to's Permission Marketing API (PMAPI)](https://dev.sign-up.to/)

## Composer installation

```json
"require": {
    "sut/pmapi": "dev-master"
}
```


## Examples

For full documentation on Sign-Up.to's Permission Marketing API please see their DEV site at: https://dev.sign-up.to/

### Example 1: Add a new subscriber and send an opt-in email 

The following example demonstrates use of the Subscriber helper class to create a new subscriber and send an opt-in email.

```php
require_once __DIR__ . '/vendor/autoload.php';

define('CID', 1); // Company ID
define('UID', 1); // User ID
define('HASH', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); // API access hash

$request = new SuT\PMAPI\Client\Core\Request(new SuT\PMAPI\Client\Core\AuthHash(UID, CID, HASH));

// Define the id of the list we want to add the subscriber to
$listID = 12345;

// Use the Subscriber helper class to create a new subscriber
$subscriber            = new SuT\PMAPI\Client\Helpers\Subscriber($request);
$subscriber->firstname = "John";
$subscriber->lastname  = "Smith";
$subscriber->email     = "example@example.com";
$subscriber->confirmed = false;
$subscriber->list_id   = $listID;
$subscriber->save();
$subscriber->->sendOptInEmail($listID);
```

### Example 2: Returning the latest list

The following example demonstrates working with the Request class to retrieve the latest list.

```php
require_once __DIR__ . '/vendor/autoload.php';

// Define your authentication details, if you don't have any then follow the instructions here: 
// https://dev.sign-up.to/documentation/reference/latest/guides/get-started/
define('CID', 1); // Company ID
define('UID', 1); // User ID
define('HASH', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); // API access hash

// Create a request object based on the hash authentication method.
// Note: authentication will not occur until an API call is made using the PMAPIRequest object.
$request = new SuT\PMAPI\Client\Core\Request(new SuT\PMAPI\Client\Core\AuthHash(UID, CID,HASH));

// Get the most recently created list.
$args = array(
    'sort'    => 'cdate',
    'reverse' => true,
    'count'   => 1,
);

$response = $request->list->get($args);

if ($response->isError)
{
    die("Failed to obtain a collection of lists: {$response->error}\n");
}

$listID           = $response->data[0]['id'];
$listName         = $response->data[0]['name'];
$createdTimestamp = $response->data[0]['cdate']; // All dates are returned as timestamps
$createdDate      = date('r', $createdTimestamp); 

echo "List '$listName' has id '$listID' and was created on $createdDate\n";
```
