<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FuzzyTimeSeries
{
	  protected $ci;
	  private $data;
	  private $interval;
	  private $D1,$D2;
    private $fuzzy;
    private $fuzzy_logical_relationship_grup;
    private $basis;
    private $log;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function pelatihan($data_latih, $konfigurasi){
	   $result = null;
       if($this->setDataAtribut($data_latih, $konfigurasi)){
       	  $this->setBasis(max($this->data), min($this->data));
	         $this->fuzzy  = $this->hitungInterval();
	         // $this->fuzzy = $this->reDivide($fuzzy_set);
	         $himpunan_fuzzy = $this->tentukanHimpunanFuzzy($this->fuzzy);
	         $fuzzy_logical_relationship = $this->fuzzyLogicalRelationship($himpunan_fuzzy);
	         $this->fuzzy_logical_relationship_grup = $this->fuzzyLogicalRelationshipGroup($fuzzy_logical_relationship,$this->fuzzy);
	         $result = $this->log;
       }else{
          echo "Data atau parameter tidak valid";
       } 
       return $result;   
	}

	private function setBasis($max, $min){
        $range = $max - $min;
        if($range >= 0.1 && $range <= 1.0){
            $this->basis = 0.1;
        }elseif ($range >= 1.1 && $range <= 10) {
        	$this->basis = 1;
        }elseif ($range >= 11 && $range <= 100) {
        	$this->basis = 10;
        }elseif ($range >= 101 && $range <= 1000) {
        	$this->basis = 100;
        }elseif ($range >= 1001 && $range <= 10000) {
        	$this->basis = 1000;
        }elseif ($range >= 10001 && $range <= 100000) {
        	$this->basis = 1000;
        }
	}

	public function forecast($value){
		$forecast_value = null;
        $fuzzy_value;
		if(empty($this->fuzzy) || empty($this->fuzzy_logical_relationship_grup)){
             
             echo "Belum melakukan pelatihan data";

		}else{
           for($i=1;$i<=sizeof($this->fuzzy);$i++){
            $index = "A".$i;
            if($value >= $this->fuzzy[$index][0] && $value < $this->fuzzy[$index][1]){
                 $fuzzy_value = $index;
            }
            else if($i == sizeof($this->fuzzy) && $value < $this->fuzzy["A1"][0]){
                $fuzzy_value = "A1";
            }
            else if($i == sizeof($this->fuzzy) && $value > $this->fuzzy["A".sizeof($this->fuzzy)][1]){
                $fuzzy_value = "A".sizeof($this->fuzzy);
            }

            if(!empty($fuzzy_value)){
               for($j=0;$j<sizeof($this->fuzzy_logical_relationship_grup);$j++){
                    if($fuzzy_value == $this->fuzzy_logical_relationship_grup[$j]["fuzzy"]){
                        $group = $this->fuzzy_logical_relationship_grup[$j]["group"];
                        $sum = 0;
                        for($k=0;$k<sizeof($group);$k++){
                           $sum = $sum + (($this->fuzzy[$group[$k]][0] + $this->fuzzy[$group[$k]][1])/2);
                        }
                        if(sizeof($group) > 0){
                           $forecast_value = $sum / sizeof($group);
                        }else{
                        	$forecast_value = null; // not define in fuzzy group
                        	echo "<br><strong>value in fuzzy group not exist</strong><br>";
                        }
                        
                        break;
                    }
                    
                 }
                 break;
            }
          }
		}
		
        
        return round($forecast_value);
	}

	private function setDataAtribut($data_latih,$konfigurasi){
	   $cond = false;
	   if(sizeof($data_latih) > 0){  //ATAU PERIKSA NILAI D1 DAN D2
	   	  $cond = true;
          $this->data = $data_latih;
          $this->D1 = $konfigurasi["D1"];
          $this->D2 = $konfigurasi["D2"];
	   }
     // $index_min = array_search(min($this->data), $this->data);
     // $index_max = array_search(max($this->data), $this->data);
     // $this->data[$index_min] = min($this->data)-$this->D1;
     // $this->data[$index_max] = max($this->data)+$this->D2;
     // var_dump("test ".(round(14.4)*10)." ori ".$this->data[$index_min]);

     return $cond;
	}

	private function hitungInterval(){       
       $set = [];
       $Dmax = ceil(max($this->data)/10)*10;
       $Dmin = floor(min($this->data)/10)*10;
       $this->interval = abs(round((($Dmax-$Dmin)/$this->basis)));
       // var_dump($Dmin." d-max ".$Dmax);
       for($i=1; $i<=$this->interval; $i++){
          $index = "A".$i;
          if($i == 1){
              $set[$index][0] = $Dmin;
              $set[$index][1] = $Dmin + $this->basis;
          }else{
              $index_before = "A".($i-1);
              $value = 0;
              for($j=0;$j<2;$j++){
              	 if($j == 0){
                    $value = $set[$index_before][1]+1;
                    $set[$index][$j] =$value;
              	 }else if($j == 1){
                    $set[$index][$j] = $value+$this->basis;
              	 }
              }
          }
       }
       $this->log["fuzzy"]= $set;

       for($i=1;$i<=sizeof($set);$i++){
          $index = "A".$i;
          $count = 0;
          for($j=0;$j<sizeof($this->data);$j++){
            if($this->data[$j] >= $set[$index][0] && $this->data[$j] < $set[$index][1]){
               $count++;
            }
          }
          $counting_array[$index]["jumlah"] = $count;
       }
       $this->log["counting"] = $counting_array;

       return $set;
   }

   private function reDivide($fuzzy_set){
       $counting_array = [];
       $new_fuzzy_set = [];
       $counting_array;
       $re_divide;

       for($i=1;$i<=sizeof($fuzzy_set);$i++){
          $index = "A".$i;
          $count = 0;
          for($j=0;$j<sizeof($this->data);$j++){
            if($this->data[$j] >= $fuzzy_set[$index][0] && $this->data[$j] < $fuzzy_set[$index][1]){
               $count++;
            }
          }
          $counting_array[$index]["jumlah"] = $count;
       }
       $this->log["counting"] = $counting_array;

       if($this->interval > 0 ){
          $re_divide = round(sizeof($this->data)/$this->interval);
       }else{
          $re_divide = 0;
       }
       

       $limit_count = 0;
       for($i=1;$i<=sizeof($counting_array);$i++){
          $index = "A".$i;
          if($counting_array[$index]["jumlah"] > $re_divide){
             $limit_count++;
          }
       }
       
       $new_fuzzy_set;
       $i = 1;
       $j = 1;
       while ($j <= ($limit_count+$this->interval)) {
       	 
       	 $index_fuzzy_set = "A".$i;
       	 $index_new_fuzzy_set = "A".$j;
         
         if($counting_array[$index_fuzzy_set]["jumlah"] > $re_divide){
            $new_fuzzy_set[$index_new_fuzzy_set][0] = $fuzzy_set[$index_fuzzy_set][0];
            $new_fuzzy_set[$index_new_fuzzy_set][1] = $new_fuzzy_set[$index_new_fuzzy_set][0]+($this->basis/2);

            $j++;
            $index_new_fuzzy_set = "A".$j;

            $new_fuzzy_set[$index_new_fuzzy_set][0] = $new_fuzzy_set["A".($j-1)][1];
            $new_fuzzy_set[$index_new_fuzzy_set][1] = $new_fuzzy_set[$index_new_fuzzy_set][0]+($this->basis/2);

         }else{
         	$new_fuzzy_set[$index_new_fuzzy_set][0] = $fuzzy_set[$index_fuzzy_set][0];
         	$new_fuzzy_set[$index_new_fuzzy_set][1] = $fuzzy_set[$index_fuzzy_set][1];
         }
         $i++;
         $j++;

       }
       $this->log["redivide"] = $new_fuzzy_set;
       return $new_fuzzy_set;
   }
    
   private function tentukanHimpunanFuzzy($fuzzy_set){
        $himpunan_fuzzy = [];
        for($i=0;$i<sizeof($this->data);$i++){
           for($j=1;$j<=sizeof($fuzzy_set);$j++){
               $index = "A".$j;
               if($this->data[$i] >= $fuzzy_set[$index][0] && $this->data[$i] <= $fuzzy_set[$index][1]){
                   $himpunan_fuzzy[$i]["nilai"] = $this->data[$i];
                   $himpunan_fuzzy[$i]["fuzzy"] = $index;
                   break;
               }else if($j == sizeof($fuzzy_set) && $this->data[$i] < $fuzzy_set["A1"][0]){
                   $himpunan_fuzzy[$i]["nilai"] = $this->data[$i];
                   $himpunan_fuzzy[$i]["fuzzy"] = "A1";
               }else if($j == sizeof($fuzzy_set) && $this->data[$i] >= $fuzzy_set["A".sizeof($fuzzy_set)][1]){
                   $himpunan_fuzzy[$i]["nilai"] = $this->data[$i];
                   $himpunan_fuzzy[$i]["fuzzy"] = "A".sizeof($fuzzy_set);
               }
           } 
        }
        $this->log["himpunan_fuzzy"] = $himpunan_fuzzy;
        return $himpunan_fuzzy;}   
	
   private function fuzzyLogicalRelationship($himpunan_fuzzy){
         $flr = [];
         for($i=0;$i<sizeof($himpunan_fuzzy);$i++){
            if($i != (sizeof($himpunan_fuzzy)-1)){
               $flr[$i]["current_state"] = $himpunan_fuzzy[$i]["fuzzy"];
               $flr[$i]["next_state"] = $himpunan_fuzzy[$i+1]["fuzzy"];
            }       
         }
          $this->log["fuzzy_logical_relationship"] = $flr;
         return $flr;
    }

    private function fuzzyLogicalRelationshipGroup($fuzzy_logical_relationship,$fuzzy_set){
       $flrg= [];
       for($i=0;$i<sizeof($fuzzy_set);$i++){
          $index = "A".($i+1);
          $group = array();
          for($j=0;$j<sizeof($fuzzy_logical_relationship);$j++){
             if($fuzzy_logical_relationship[$j]["current_state"] == $index){
                 array_push($group, $fuzzy_logical_relationship[$j]["next_state"]);
             }
             if($fuzzy_logical_relationship[$j]["next_state"] == $index){
                 array_push($group, $fuzzy_logical_relationship[$j]["current_state"]);
             }
          }
          $flrg[$i]["fuzzy"] = $index;
          $arr_group = array_values(array_unique($group));
          $flrg[$i]["group"] = $arr_group;

          $this->log["fuzzy_logical_relationship_group"] = $flrg;
       }
       if(sizeof($fuzzy_set) == 0){
          $this->log["fuzzy_logical_relationship_group"] = 0;    
       }
       return $flrg;}
}

/* End of file FuzzyTimeSeries.php */
/* Location: ./application/libraries/FuzzyTimeSeries.php */
