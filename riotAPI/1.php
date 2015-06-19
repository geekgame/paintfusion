<?php
 
 
// class pour gérer l'API riot by kindermoumoute
class Riot
{
        private $_apikey;
        private $_server;
           
        public function __construct($apikey,$server)
        {
                $this->_apikey = $apikey;
                $this->setServer($server);
        }
 
 
        public function setServer($server)
        {
                $this->_server = $server;
        }
 
        public function getInfosByNames($summonernames)
        {
                // if summonername correcte
                $temp = $this->request("https://euw.api.pvp.net/api/lol/".$this->_server."/v1.4/summoner/by-name/".$summonernames."?api_key=".$this->_apikey);
                if ($temp)
                return json_decode($temp,true);
                else
                return 0;
        }
 
        public function getRankById($ids)
        {
                $temp = $this->request("https://euw.api.pvp.net/api/lol/".$this->_server."/v2.5/league/by-summoner/".$ids."/entry?api_key=".$this->_apikey);
                if ($temp)
                return json_decode($temp,true);
                else
                return 0;
        }
 
        public function request($url)
        {
                $curl = curl_init();
 
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HEADER, 0);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                curl_close($curl);
                return $response;
        }
}
 
 
// possibilité de testé en fonction du serveur
// liste trouvé ici https://support.riotgames.com/hc/fr/articles/201752814-Noms-d-invocateur-FAQ#h1q4
function bonSummoners($summooos)    
{
  $sums = explode(",", $summooos);
  foreach ($sums as $value) {
      if(!preg_match('/^[0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyzàâÇçèÉéÊêëîïÔôœùûAaEeÓóCcLlNnSsZzZzÄäÉéÖöÜüßÁáÉéÍíÑñÓóÚúÜüΑαΒβΓγΔδΕεΖζΗηΘθΙιΚκΛλΜμΝνΞξΟοΠπΡρΣσςΤτΥυΦφΧχΨψΩω????????????????????Aa âÎî??Ss??TtÀàÈèÉéÌìÍíÒòÓóÙùÚúÁáAaÄäÉéEeEeÍíÓóÔôÚúUuÝýCcdtLlNnRrRrŠšŽž]+$/',$value))
        return 0;
  }
  return 1;
}
 
// fonction qui utilise l'API pour renvoyer des stats des joueurs mis en paramètre
function getStats($sumonners)
{
 
  $RiotAPI = new Riot("3a9a818c-d165-4f0b-96ad-aee0d5f073e7","euw");               //<== ici tu mets ta clé API
  $players = $RiotAPI->getInfosByNames($sumonners);
  $stats = array();
  if($players)
  {
    //print_r($players);
    $ids = "";
    foreach ($players as $name => $player) {
      $stats[$player["id"]] = array("name" => $name,"revision" =>$player["revisionDate"],"level" => $player["summonerLevel"],"icon" => $player["profileIconId"]);
      $ids = $ids.$player["id"].",";
    }
 
    $ranks = $RiotAPI->getRankById(substr($ids,0,-1));  // TODO : gérer le cas de + de 10 joueurs
    if(!empty($ranks))
    {
      foreach ($ranks as $id => $infos) {
        if ($ranks[$id][0]["queue"]=="RANKED_SOLO_5x5") {
          $stats[$id]["tier"] = $ranks[$id][0]["tier"];
          $stats[$id]["division"] = $ranks[$id][0]["entries"][0]["division"];
		  $stats[$id]["lp"] = $ranks[$id][0]["entries"][0]["leaguePoints"];//////////////////////////////////////////////////////////////////
        }
      }
    }
  }
 
  return $stats;
}
 
// ici on utilise $_GET["summoner"] contenant la liste
// des pseudo sous la forme "pseudo1,pseudo2,pseudo3,..."
// jusqu'à 10 pseudos par requête
if (isset($_GET["summoner"]))
{
 
  $sumonners = str_replace(' ', '', $_GET["summoner"]);
  //$sumonners = str_replace('/', '',$sumonners);
  //$sumonners = str_replace('\\', '',$sumonners);
  //$errorsum = bonSummoners($sumonners);
  if (bonSummoners($sumonners))
  {
    $joueurs = getStats($sumonners);
    // $joueurs est un tableau à deux dimensions avec pour clés
    // les id des joueurs et comme sous tableau les infos :
    //  "name","revision" et en option "tier","division"
    // exemple : $joueurs[$id]["name"]
    foreach ($joueurs as $id => $value)
    {
      echo "ID : ".$id."<br />";
      foreach ($value as $info => $valeur) {
        if ($info == "icon") {
          echo "<img src ='http://ddragon.leagueoflegends.com/cdn/5.3.1/img/profileicon/$valeur.png'>";
        }
        else
        {
          echo " ".$info." : ".$valeur;          
        }
      echo "<br />";
       
      }
      echo "<br />";
    }
  }
  else
  {
    echo "Mauvais format de nom d'invocateur !";
  }
}
else
{
  echo "Pas de données";
}
 
 
 
 
?>

