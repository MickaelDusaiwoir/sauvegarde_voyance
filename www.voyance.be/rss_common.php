<?php
//
//  Fichier commun pour exploiter un flux RSS en PHP
//  Version: 1.3 23/01/2009
//  (C) Copyright Nguyen Ngoc Rao 2008-2009.
//  http://www.asiaflash.com
//
/////////////////////////////////////////////////////////////////////////////////////

   $rss_channel = array();
   $currently_writing = "";
   $main = "";
   $item_counter = 0;
   if (!isset($utf8))
   {
      $utf8 = 0;
   }
   $utf8 = 1 * $utf8;

function get_af_rss($rss)
{
   global $rss_channel;

   $rss_url_prefix = "http://www.asiaflash.com/horoscope/rss_";

   if ((strstr($rss, "<") != false)
       || (strstr($rss, ">") != false)
       || (strstr($rss, "?") != false)
       || (strstr($rss, "..") != false)
       || (strstr($rss, "?") != false)
       || (strstr($rss, "@") != false)
       || (strstr($rss, "=") != false)
       || (strstr($rss, "\\") != false)
       || (strstr($rss, "\"") != false)
       || (strstr($rss, ".xml") == false)
       || (strncmp($rss, $rss_url_prefix, strlen($rss_url_prefix)) != 0)
      )
   {
      echo "URL du flux RSS invalide !\n";
      exit;
   }

   $xml_parser = xml_parser_create();
   xml_set_element_handler($xml_parser, "startElement", "endElement");
   xml_set_character_data_handler($xml_parser, "characterData");
   if (!($fp = @fopen($rss, "r")))
   {
      die("Impossible d'ouvrir le flux RSS !");
   }

   if (isset($target_blank))
   {
      $target_str = " target=\"_blank\"";
   }
   else
   {
      $target_str = "";
   }
   if (isset($item_title_li))
   {
      $item_title_li = "<li>";
   }
   else
   {
      $item_title_li = "";
   }

   while ($data = @fread($fp, 4096))
   {
      if (!xml_parse($xml_parser, $data, feof($fp)))
      {
         die(sprintf("XML erreur : %s ligne %d",
                     xml_error_string(xml_get_error_code($xml_parser)),
                     xml_get_current_line_number($xml_parser)));
      }
   }
   @fclose($fp);
   xml_parser_free($xml_parser);

   // output HTML
   if (isset($rss_channel["LINK"]))
   {
      if (!isset($no_channel_title_center))
      {
         echo "<center>\n";
      }
      echo "<div class=\"rss_channelname\"><a href=\"$rss_channel[LINK]\"" . $target_str . ">";
      if (isset($rss_channel["TITLE"]))
      {
         print(maybe_convert_to_iso_8859($rss_channel["TITLE"]));
      }
      echo "</a></div>\n";
      if (!isset($no_channel_title_center))
      {
         echo "</center>\n";
      }
   }
   else
   {
      if (isset($rss_channel["TITLE"]))
      {
         print ("<center><div class=\"rss_channelname\">" . maybe_convert_to_iso_8859($rss_channel["TITLE"]) . "</div></center>");
      }
   }

   if (isset($rss_channel["ITEMS"]))
   {
      if (count($rss_channel["ITEMS"]) > 0) {
        for($i = 0;$i < count($rss_channel["ITEMS"]);$i++)
        {
          if (isset($rss_channel["ITEMS"][$i]["LINK"]))
          {
             if (!isset($no_item_title_center))
             {
                echo "<center>\n";
             }
             print ("\n<br>$item_title_li<div class=\"rss_itemtitle\"><a href=\"" . maybe_convert_to_iso_8859($rss_channel["ITEMS"][$i]["LINK"]) . "\" class=\"rss_link\"" . $target_str . ">" . maybe_convert_to_iso_8859($rss_channel["ITEMS"][$i]["TITLE"]) . "</a></div>");
             if (!isset($no_item_title_center))
             {
                echo "</center>\n";
             }
          }
          else
          {
             if (!isset($no_item_title_center))
             {
                echo "<center>\n";
             }
             print ("\n<br>$item_title_li<div class=\"rss_itemtitle\">" . maybe_convert_to_iso_8859($rss_channel["ITEMS"][$i]["TITLE"]) . "</div>");
             if (!isset($no_item_title_center))
             {
                echo "</center>\n";
             }
          }
          if (isset($item_title_separator))
          {
             echo "<br>\n";
          }
          print ("<div class=\"rss_itemdescription\">" . maybe_convert_to_iso_8859($rss_channel["ITEMS"][$i]["DESCRIPTION"]) . "</div><br />");
        }
      }
      else
      {
          print ("<b>Pas d'article dans ce flux RSS !</b>");
      }
   }

}

function startElement($parser, $name, $attrs) {
    global $rss_channel, $currently_writing, $main;
    switch($name) {
      case "RSS":
      case "RDF:RDF":
      case "ITEMS":
        $currently_writing = "";
        break;
      case "CHANNEL":
        $main = "CHANNEL";
        break;
      case "IMAGE":
        $main = "IMAGE";
        $rss_channel["IMAGE"] = array();
        break;
      case "ITEM":
        $main = "ITEMS";
        break;
      default:
        $currently_writing = $name;
        break;
    }
}

function endElement($parser, $name) {
    global $rss_channel, $currently_writing, $item_counter;
    $currently_writing = "";
    if ($name == "ITEM") {
      $item_counter++;
    }
}

function characterData($parser, $data) {
  global $rss_channel, $currently_writing, $main, $item_counter;
  if ($currently_writing != "") {
    switch($main) {
      case "CHANNEL":
        if (isset($rss_channel[$currently_writing])) {
          $rss_channel[$currently_writing] .= $data;
        } else {
          $rss_channel[$currently_writing] = $data;
        }
        break;
      case "IMAGE":
        if (isset($rss_channel[$main][$currently_writing])) {
          $rss_channel[$main][$currently_writing] .= $data;
        } else {
          $rss_channel[$main][$currently_writing] = $data;
        }
        break;
      case "ITEMS":
        if (isset($rss_channel[$main][$item_counter][$currently_writing])) {
          $rss_channel[$main][$item_counter][$currently_writing] .= $data;
        } else {
          $rss_channel[$main][$item_counter][$currently_writing] = $data;
        }
        break;
    }
  }
}

function maybe_convert_to_iso_8859($instr)
{
   global $utf8;

   if ($utf8 == 1)
   {
      return utf8_decode($instr);
   }
   else
   {
      return $instr;
   }
}

?>
