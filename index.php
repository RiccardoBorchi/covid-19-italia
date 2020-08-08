<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Covid-19 Italia</title>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="stylesheet" href="assets/css/style.min.css">
   </head>
   <body>
      <div class="container">
         <?php

         $file_nazionale = 'https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-andamento-nazionale-latest.json';

         $json = file_get_contents($file_nazionale);
         $json_nazionale = json_decode($json, true);

         foreach($json_nazionale as $stato) {
            $nuovi_positivi = $stato['nuovi_positivi'];
            $totale_positivi = number_format($stato['totale_positivi'], 0, ',', '.');
            $variazione_totale_positivi = number_format($stato['variazione_totale_positivi'], 0, ',', '.');
            if($variazione_totale_positivi > 0) {
               $variazione_totale_positivi = '+' . $variazione_totale_positivi;
            }
            $dimessi_guariti = number_format($stato['dimessi_guariti'], 0, ',', '.');
            $deceduti = number_format($stato['deceduti'], 0, ',', '.');
            $totale_casi = number_format($stato['totale_casi'], 0, ',', '.');
            $data = $stato['data'];
         }

         ?>

         <div class="row text-center">
            <div class="col-lg-4 col-12 offset-lg-4">
               <div class="icon-box">
                  <div class="content">
                     <h5 class="icon-title">Nuovi Positivi</h5>
                     <p class="number"><?php echo $nuovi_positivi; ?></p>
                  </div>
               </div>
            </div>
         </div>

         <div class="row text-center my-5">
            <div class="col-lg-4 col-12">
               <div class="icon-box">
                  <div class="content">
                     <h5 class="icon-title">Guariti</h5>
                     <p class="number"><?php echo $dimessi_guariti; ?></p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-12">
               <div class="icon-box">
                  <div class="content">
                     <h5 class="icon-title yellow-color">Positivi Attuali</h5>
                     <p class="number yellow-color"><?php echo $totale_positivi; ?></p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-12">
               <div class="icon-box">
                  <div class="content">
                     <h5 class="icon-title">Deceduti</h5>
                     <p class="number"><?php echo $deceduti; ?></p>
                  </div>
               </div>
            </div>
         </div>

         <div class="row text-center">
            <div class="col-lg-4 col-12 offset-lg-4">
               <div class="icon-box">
                  <div class="content">
                     <h5 class="icon-title">Totale casi</h5>
                     <p class="number"><?php echo $totale_casi; ?></p>
                  </div>
               </div>
            </div>
         </div>

         <p class="text-center my-5">Ultimo aggiornamento: <strong><?php echo date('d/m/Y - H:i', strtotime($data)); ?></strong>
            <br/>
            Fonte: <a href="http://www.salute.gov.it/" target="_blank" rel="noreferrer">Ministero della Salute</a> / <a href="http://www.protezionecivile.gov.it" target="_blank">Protezione Civile</a>
            </br/>
            Licenza dataset: <a href="https://creativecommons.org/licenses/by/4.0/deed.it" target="_blank">CC-BY-4.0</a> (<a href="https://github.com/pcm-dpc/COVID-19/blob/master/LICENSE" target="_blank">Visualizza licenza</a>)
         </p>
      </div>
   </body>
</html>
