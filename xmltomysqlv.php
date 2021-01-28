<?php
    $dns = "mysql:dbname=mobiili_projekti;host=localhost";
    $user = "mobiili";
    $password = "projekti";

    $connection = new PDO($dns, $user, $password);
    $connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");

    $affectedRow = 0;
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $sql = "SET SESSION sql_mode = ''";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $xml = simplexml_load_file("/home/mobiili/alko/xl/alko_listav2.xml")
      or die ("Cannot create object");


    foreach ($xml->juoma as $row){
      // echo($row->Numero . "\n");

      $numero = $row->Numero;
      $nimi = $row->Nimi;
      $valmistaja= $row->Valmistaja;
      $pullokoko= $row->Pullokoko;
      $hinta= $row->Hinta;
      $litrahinta= $row->Litrahinta;
      $uutuus = $row->Uutuus;
      $hinnastojkoodi = $row->Hinnastojarjestyskoodi;
      $tyyppi = $row->Tyyppi;
      $alatyyppi = $row->Alatyyppi;
      $erityisryhma = $row->Erityisryhma;
      $oluttyyppi = $row->Oluttyyppi;
      $valmistusmaa = $row->Valmistusmaa;
      $alue = $row->Alue;
      $vuosikerta = $row->Vuosikerta;
      $etiketti = $row->Etikettimerkintöja;
      $huomautus = $row->Huomautus;
      $rypaleet = $row->Rypaleet;
      $luonnehdinta = $row->Luonnehdinta;
      $pakkaustyyppi = $row->Pakkaustyyppi;
      $suljenta = $row->Suljentatyyppi;
      $alkoholi_pros = $row->Alkoholi_prosentti;
      $hapot = $row->Hapot_g_l;
      $sokeri = $row->Sokeri_g_l;
      $kantavierre = $row->Kantavierreprosentti;
      $vari = $row->Vari_EBC;
      $katkerot = $row->Katkerot_EBU;
      $energia = $row->Energia_kcal_100_ml;
      $valikoima = $row->Valikoima;
      $ean = $row->EAN;


      $sql = "INSERT INTO Alko_lista VALUES (0, :numero, :nimi, :valmistaja, :pullokoko, :hinta, :litrahinta, :uutuus, :hinnastojkoodi, :tyyppi, :alatyyppi, :erityisryhma, :oluttyyppi, :valmistusmaa, :alue, :vuosikerta, :etiketti, :huomautus, :rypaleet, :luonnehdinta, :pakkaustyyppi, :suljenta, :alkoholi_pros, :hapot, :sokeri, :kantavierre, :vari, :katkerot, :energia, :valikoima, :ean)";

      $statement = $connection->prepare($sql);
      $statement->execute([
        ':numero' => $numero,
        ':nimi' => $nimi,
        ':valmistaja' => $valmistaja,
        ':pullokoko' => $pullokoko,
        ':hinta' => $hinta,
        ':litrahinta' => $litrahinta,
        ':uutuus' => $uutuus,
        ':hinnastojkoodi' => $hinnastojkoodi,
        ':tyyppi' => $tyyppi,
        ':alatyyppi' => $alatyyppi,
        ':erityisryhma' => $erityisryhma,
        ':oluttyyppi' => $oluttyyppi,
        ':valmistusmaa' => $valmistusmaa,
        ':alue' => $alue,
        ':vuosikerta' => $vuosikerta,
        ':etiketti' => $etiketti,
        ':huomautus' => $huomautus,
        ':rypaleet' => $rypaleet,
        ':luonnehdinta' => $luonnehdinta,
        ':pakkaustyyppi' => $pakkaustyyppi,
        ':suljenta' => $suljenta,
        ':alkoholi_pros' => $alkoholi_pros,
        ':hapot' => $hapot,
        ':sokeri' => $sokeri,
        ':kantavierre' => $kantavierre,
        ':vari' => $vari,
        ':katkerot' => $katkerot,
        ':energia' => $energia,
        ':valikoima' => $valikoima,
        ':ean' => $ean
      ]);

   
      if (! empty($statement)){
        $affectedRow ++;

      } else{

      }
    }

    if ($affectedRow > 0) {
      echo($affectedRow . " records inserted");
  } else {
      echo("No records inserted");
  }

?>