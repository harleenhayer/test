<?php

namespace App\Models;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Data extends \Core\Model
{

    const API_ENDPOINT = "https://rickandmortyapi.com/api/character";

    /**
     * @param $page
     * @return mixed
     */
    public function loadNextPage($page){
        if($page){
            $filteredEndPoint = self::API_ENDPOINT."?page=".$page;
            return $this->getData($filteredEndPoint);
        }

    }

    /**
     * @return mixed
     */
    public function getAllCharacters(){
        $filters = $this->getFilters();
        $filteredEndPoint = self::API_ENDPOINT."?".$filters;
        return $this->getData($filteredEndPoint);
    }

    /**
     * @param $apiendpoint
     * @return mixed
     */
    public function getData($apiendpoint){
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $apiendpoint);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($curl);

        curl_close($curl);
        return json_decode($output);
    }

    /**
     * @return mixed|string
     */
    private function getFilters()
    {
        $arr = explode("?", $_SERVER['REQUEST_URI']);
        return end($arr);
    }
}