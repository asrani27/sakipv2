<?php

use GuzzleHttp\Client;

function client()
{
    return new Client(['base_uri' => 'https://sipd.go.id/run/serv/']);
}

function headers()
{
    return ['headers' => [
        'Authorization' => 'Bearer a0f9a4fdc6d6c0f9e7e2fe9d296edc0d',
    ]];
}

function get_rpjmd($param)
{
    $res = client()->request('GET', 'get_rpjmd?periode=' . $param . '&kodepemda=6371', headers())->getBody()->getContents();
    return json_decode($res, true);
}

function get_renstra($periode = null, $kodePemda = null, $kodeSkpd = null)
{
    $res = client()->request('GET', 'get_renstra?periode=20162021&kodepemda=6371&kodeskpd=4.01.03.', headers())->getBody()->getContents();
    return json_decode($res, true);
}

function get_ranwal()
{
    $res = client()->request('GET', 'get_ranwal?tahun=2020&kodepemda=6371&kodeskpd=2.10.01.', headers())->getBody()->getContents();
    return json_decode($res, true);
}

function get_rancangan()
{
    $res = client()->request('GET', 'get_rancangan?tahun=2016&kodepemda=6371&kodeskpd=2.10.01.', headers())->getBody()->getContents();
    return json_decode($res, true);
}

function get_rakortek()
{
    $res = client()->request('GET', 'get_rakortek?kodepemda=6371', headers())->getBody()->getContents();
    return json_decode($res, true);
}

function get_mapping_indikator()
{
    $res = client()->request('GET', 'get_mapping_indikator?tahun=2020&kodepemda=6371&kodeskpd=4.01.06.', headers())->getBody()->getContents();
    return json_decode($res, true);
}

function get_mapping()
{
    $res = client()->request('GET', 'get_mapping?kodepemda=6371&kodebidang=2.15.', headers())->getBody()->getContents();
    return json_decode($res, true);
}

function get()
{
    $res = client()->request('GET', 'get?tahun=2020&kodepemda=6371&kodeskpd=2.10.01.', headers())->getBody()->getContents();
    return json_decode($res, true);
}

function api($tahun, $kode_skpd)
{
    $res = client()->request('GET', 'api?tahun=' . $tahun . '&kodepemda=6371&kodeskpd=' . $kode_skpd . '', headers())->getBody()->getContents();
    return json_decode($res, true);
}
