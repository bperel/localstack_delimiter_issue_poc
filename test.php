<?php
require './vendor/autoload.php';


use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;
use League\Flysystem\MountManager;
use League\Flysystem\Plugin\EmptyDir;
use League\Flysystem\Plugin\ListFiles;

$s3Client = new S3Client([
    'region' => 'eu-central-1',
    'version' => 'latest',
    'endpoint' => "http://localstack:4566",
    'use_path_style_endpoint' => true,
    'credentials' => false
]);
$resources = new MountManager([
    's3' => new Filesystem(new AwsS3Adapter($s3Client, 'mybucket'))
]);
$resources->addPlugin(new EmptyDir());
$resources->addPlugin(new ListFiles());
$resources->emptyDir('s3://');