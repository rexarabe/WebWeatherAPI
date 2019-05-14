<?php
/**
 * Created by PhpStorm.
 * User: Abdellah Brahimi
 * Date: 16.04.2019
 * Time: 13:41
 */
echo  '<p>----------------------Старт----------------------</p>';

$mysqli = new mysqli("localhost", "root", "", "weather" );
if ($mysqli->connect_errno){
    echo "Не удалось плдключиться к MySQL:(".$mysqli->connect_errno . ")" . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

//Opening the file with city's code
$filename = 'C:\Users\User\city.list.json\citylist.json';
if (file_exists($filename)){
    $handle = fopen($filename, "r");
    if ($handle){
        while(($buffer = fgets($handle, 4096)) !==false)
        {
            $arr = json_decode($buffer);

            //Request the state of the weather code is not correct json documentation php
            $city_id = $arr->{ "id" };
            $url = "http://api.openweathermap.org/data/2.5/weather?q=Zaporizhzhya&mode=json&units=metric&APPID=94a1d1ee92ba22df6057a1cd5a6a52fd";
            $data = file_get_contents($url); //we get data about the weather

            $arr = json_decode($data);
            echo '<p>',$arr->{"id"},'',$arr->{"main"}->{"temp_min"},'',$arr->{"main"}->{"temp_max"},'</p>';

            $name = $arr->{"name"};
            $t_min= $arr->{"main"}->{"temp_min"};
            $t_max = $arr->{"main"}->{"temp_max"};
            $dt = '19.04.2017';

            $query = "INSERT INTO city(id,name,t_min, t_max,dt) VALUES($city_id,'$name',$t_min, $t_max,'$dt')";

            $mysqli->query($query);
        }
    }
    else
        echo "Error while opening the file $filename";
    fclose($handle);
}
else
    echo "file $filename do not exist";
?>