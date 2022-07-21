
# BUKA SMS API 

A Laravel wrapper for BUKA SMS API


## Installation

Require package

```bash
  composer require marklestermorta/buka-sms-api-laravel
```

Publish Configuration file

```bash
  php artisan vendor:publish --provider="MarkLesterMorta\BukaSMSApi\BukaSMSApiServiceProvider"
```

Add ENV variables

```bash
  BUKAS_SMS_API_KEY=
  BUKAS_SMS_API_SECRET=
  BUKAS_SMS_APP_ID=
```


## Usage/Examples
### Send SMS

```php
  return BukaSMSApi::sendSMS('9*********', "Your Message");
```

### Sample Response

```json
{
  "status": "0",
  "reason": "success",
  "success": "1",
  "fail": "0",
  "array":[
    {
      "msgId": "2108021054011000095",
      "number": "9*********"
    }
  ]
}
```




### Get Balance

```php
   return BukaSMSApi::getBalance();
```

### Sample Response

```json
{
  "status": "0",
  "reason": "success",
  "balance": "99.990000",
  "gift": "50.00000",
  "credit": "0"
}
```
## API Response Reference

### Sending SMS

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `status` | `string` | `”0”means successful,others than 0 means failure ,seeing Status code description` |
| `reason` | `string` | `failure reason description` |
| `success` | `string` | `number of successful submitted numbers` |
| `fail` | `string` | `number of failure submitted numbers` |
| `array` | `JSONArray` | `the number of Successful Submitted Array.` |
| `msgId` | `string` | `submitted numbers id corresponding to platform` |
| `number` | `string` | `submitted numbers` |

### Getting Balance

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `status` | `string` | `”0”means successful,others than 0 means failure ,seeing Status code description` |
| `reason` | `string` | `failure reason description` |
| `balance` | `string` | `actual account balance` |
| `gift` | `string` | `gifted account balance` |
| `credit` | `string` | `credit account balance` |
