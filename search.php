<?php
$url = 'https://api.apify.com/v2/key-value-stores/ZsOpZgeg7dFS1rgfM/records/LATEST?fbclid=IwAR3GxckpaoFIrCb3nsrV2gvmTQ2olRXS7ivwVySuLvMk_XHeFRHuXY8-ryw';
$api =  file_get_contents($url);
$data = json_decode($api, true);
echo json_encode($data['detail'][$_POST['thanhpho']]);