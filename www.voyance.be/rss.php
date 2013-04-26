<?php
//
//  Ce fichier exploite un flux RSS
//  Version: 1.3 23/01/2009
//  (C) Copyright Nguyen Ngoc Rao 2008-2009.
//  http://www.asiaflash.com
//
/////////////////////////////////////////////////////////////////////////////////////

   if (!isset($PHP_SELF))
   {
      if (!empty($_REQUEST))
      {
         extract($_REQUEST);
      }
   }

   include("rss_common.php");

   // vérification
   if (!isset($rss))
   {
      echo "Paramètre rss manquant !\n";
      exit;
   }

   // appel de la fonction principale d'exploitation du flux RSS d'AsiaFlash
   get_af_rss($rss);

?>
