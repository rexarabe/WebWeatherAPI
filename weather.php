<!DOCTYPE html>
<html lang="ru">
 <head>

     <title>Weather</title>
     <meta charset="ISO-8859-1">
     <style>
         body{
             color: black;}
     </style>
     <!-- <img src="images.jpg" alt="Prospect Soborny zaporizhzhya"> -->
 </head>
 <body background="https://upload.wikimedia.org/wikipedia/commons/3/39/%D0%9D%D0%B0%D0%B4_%D0%BF%D1%80%D0%BE%D1%81%D0%BF%D0%B5%D0%BA%D1%82%D0%BE%D0%BC_%D0%9C%D0%B5%D1%82%D0%B0%D0%BB%D1%83%D1%80%D0%B3%D1%96%D0%B2.jpg" >
     <?php
       //id of city of Zaporizhzhia from openweathermap.org
       $city_id = 687700;
       //APPID
       $app_id = '94a1d1ee92ba22df6057a1cd5a6a52fd';
       //address file, which has the information about weather of the city
       //it is given with the help id
       $url = "http://api.openweathermap.org/data/2.5/weather?q=Zaporizhzhya&mode=json&units=metric&APPID=94a1d1ee92ba22df6057a1cd5a6a52fd";
       //print url
       //echo $url;
        //Output data about the weather file

       $data = file_get_contents($url) or die ("Unable to open file($url)");

       //print data in a paragraphe
       //echo "<p> $data</p>";

       //decoding the response in the format json
       $arr = json_decode($data);

       //outputs
       echo '<p><b>Населеный пункт</b>:', $arr->{'name'},'</p>';
       echo '<p><b>Координаты: </b></p><br>';
       echo 'Долгота - ', $arr->{'coord'}->{'lon'}, '<br>';
       echo 'Ширина - ', $arr->{'coord'}->{'lat'}, '</p>';
       echo '<p><b>Температура: </b><br>';
       echo 'Минимальная - ', $arr->{'main'}->{'temp_min'}  , '<br>';
       echo 'Максимальная - ', $arr->{'main'}->{'temp_max'}, '</p>';



       ?>
 </body>
</html>