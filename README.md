This is a POC for issue [localstack/localstack/issues/3613](https://github.com/localstack/localstack/issues/3613).

To test it, pull the repo and run: `docker-compose run --rm php`

Once localstack is launched, the following error message will appear:
```
Fatal error: Uncaught exception 'Aws\S3\Exception\S3Exception' with message 'Error executing "ListObjects" on "http://localstack:4566/mybucket?prefix=&delimiter=%2F&encoding-type=url"; AWS HTTP error: Client error: `GET http://localstack:4566/mybucket?prefix=&delimiter=%2F&encoding-type=url` resulted in a `404
Not Found` response:
{"status": "running"}
 Unable to parse error information from response - Error parsing XML: String could not be parsed as XML'
```

And on the localstack logs the following message will show:
```
Unable to find forwarding rule for host "localstack:4566", path "GET /mybucket?prefix=&delimiter=%2F&encoding-type=url", target header "", auth header "", data "b''"
```
